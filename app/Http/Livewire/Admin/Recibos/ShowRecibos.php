<?php

namespace App\Http\Livewire\Admin\Recibos;

use App\Models\Formapay;
use App\Models\Network;
use App\Models\Recibo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RecibosExport;

class ShowRecibos extends Component
{

    use WithPagination;

    protected $listeners = ['render'];
    protected $queryString = [
        'searchmonth' => [
            'except' => '', 'as' => 'mes'
        ],
        'search' => [
            'except' => '', 'as' => 'buscar'
        ],
        'searchtype' => [
            'except' => '', 'as' => 'tipo-recibo'
        ],
        'searchstatus' => [
            'except' => '', 'as' => 'estado-pago'
        ],
        'searchlocation' => [
            'except' => '', 'as' => 'lugar'
        ]
    ];

    public $detalle, $codetransferencia, $formapay_id, $recibo;
    public $open = false;
    public $descuento = 0;

    public $search = '';
    public $searchmonth = '';
    public $searchtype = '';
    public $searchstatus = '';
    public $searchlocation = '';

    public function mount()
    {
        $this->recibo = new Recibo();
    }

    private function getRecibosQueryBuilder()
    {
        $recibos = Recibo::with([
            'client',
            'payment.formapay',
            'network.ubigeo',
            'network.networkable' => function (\Illuminate\Database\Eloquent\Relations\MorphTo $morphTo) {
                $morphTo->morphWith([
                    \App\Models\Portboxnav::class => ['boxnav.spliter.olt'],
                ]);
            }
        ])->withWhereHas('network', function ($query) {
            if (trim($this->searchtype) !== '') {
                $query->where('type', $this->searchtype);
            }
            if (trim($this->searchlocation) !== '') {
                $query->where('ubigeo_id', $this->searchlocation);
            }
        });
        if (trim($this->search) !== '') {
            $recibos->where('seriecompleta', 'like', $this->search);
        }
        if (trim($this->searchmonth) !== '') {
            $recibos->where('month', $this->searchmonth);
        }
        
        if (trim($this->searchstatus) !== '') {
            if ($this->searchstatus == 'PAGADO') {
                $recibos->has('payment');
            } elseif ($this->searchstatus == 'PENDIENTE') {
                $recibos->doesntHave('payment');
            }
        }

        return $recibos->orderBy('date', 'desc')->orderBy('month', 'desc');
    }

    public function render()
    {
        $ubigeoIds = \App\Models\Network::whereNotNull('ubigeo_id')->distinct()->pluck('ubigeo_id')->toArray();
        $ubigeos = \App\Models\Ubigeo::whereIn('id', $ubigeoIds)->orderBy('distrito', 'asc')->get();
        $locations = $ubigeos->pluck('distrito', 'id')->toArray();
        $recibos = $this->getRecibosQueryBuilder()->paginate();
        $formapays = Formapay::orderBy('id', 'asc')->get();
        return view('livewire.admin.recibos.show-recibos', compact('recibos', 'formapays', 'locations'));
    }

    public function exportExcel()
    {
        $query = $this->getRecibosQueryBuilder();
        return Excel::download(new RecibosExport($query), 'recibos-' . now()->format('YmdHis') . '.xlsx');
    }

    public function exportPdf()
    {
        // Set dynamic limits for heavy data
        ini_set('memory_limit', '1024M');
        set_time_limit(300);

        // Get the matching receipts without pagination limits
        $recibos = $this->getRecibosQueryBuilder()->get();

        $pdf = PDF::setPaper('a4', 'portrait')
                  ->loadView('admin.recibos.export-pdf', compact('recibos'));

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'recibos-' . now()->format('YmdHis') . '.pdf');
    }

    public function pay(Recibo $recibo)
    {
        $this->resetValidation();
        $this->reset(['detalle', 'codetransferencia', 'formapay_id', 'recibo']);
        $this->recibo = $recibo;
        $this->descuento = $recibo->descuento;
        $this->open = true;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSearchmonth()
    {
        $this->resetPage();
    }

    public function updatedSearchstatus()
    {
        $this->resetPage();
    }

    public function updatedSearchlocation()
    {
        $this->resetPage();
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->resetExcept(['recibo']);
            $this->resetValidation();
        }
    }

    public function savepayment()
    {

        $this->codetransferencia = trim(mb_strtoupper($this->codetransferencia, "UTF-8"));
        $this->validate([
            'codetransferencia' => ['nullable', 'string', 'min:3', 'unique:payments,codetransferencia'],
            'formapay_id' => ['required', 'integer', 'min:1', 'exists:formapays,id'],
            'descuento' => ['required', 'numeric', 'min:0', 'decimal:0,2'],
            'recibo.id' =>  ['required', 'integer', 'min:1', 'exists:recibos,id'],
        ]);

        DB::beginTransaction();
        try {
            $this->recibo->payment()->create([
                'date' => now('America/Lima'),
                'month' => $this->recibo->month,
                'amount' => $this->recibo->amount - $this->descuento,
                'codetransferencia' => $this->codetransferencia,
                'detalle' => $this->detalle,
                'formapay_id' => $this->formapay_id
            ]);
            $this->recibo->descuento = $this->descuento;
            $this->recibo->total = $this->recibo->amount - $this->descuento;
            $this->recibo->save();

            if ($this->recibo->network) {
                $this->recibo->network->status = Network::ACTIVO;
                $this->recibo->network->save();
            }

            DB::commit();
            $this->dispatchBrowserEvent('toast', toastJson('Recibo pagado correctamente'));
            $this->resetValidation();
            $this->reset(['detalle', 'codetransferencia', 'formapay_id', 'open', 'descuento']);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar pago de recibo', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function deletepayment(Recibo $recibo)
    {
        DB::beginTransaction();
        try {
            if ($recibo->payment) {
                $recibo->total = $recibo->amount;
                $recibo->descuento = 0;
                $recibo->save();
                $recibo->payment->delete();
                DB::commit();
                $this->dispatchBrowserEvent('toast', toastJson('Pago anulado correctamente'));
                $this->resetValidation();
            }
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al anular pago de recibo', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function deleterecibo(Recibo $recibo)
    {
        DB::beginTransaction();
        try {
            if ($recibo->payment) {
                $recibo->payment->delete();
            }
            $recibo->delete();
            DB::commit();
            $this->dispatchBrowserEvent('toast', toastJson('Recibo eliminado correctamente'));
            $this->resetValidation();
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al eliminar recibo', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }
}
