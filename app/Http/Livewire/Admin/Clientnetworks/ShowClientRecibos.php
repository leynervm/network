<?php

namespace App\Http\Livewire\Admin\Clientnetworks;

use App\Models\Formapay;
use App\Models\Network;
use App\Models\Recibo;
use App\Models\Seriepago;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ShowClientRecibos extends Component
{

    use WithPagination;

    public $open = false;
    public $openpay = false;

    public $network, $recibo, $client_id, $date, $seriepago_id, $amount = 0, $total = 0, $descuento = 0, $month;
    public $seriecompleta = 'SELECCIONAR...';

    public $formapay_id, $codetransferencia, $detalle;

    public $searchmonth = '';

    protected $queryString = [
        'searchmonth' => [
            'except' => '',
            'as' => 'mes'
        ]
    ];

    protected function rules()
    {
        return [
            // 'date' => ['required', 'date'],
            'month' => [
                'required', 'date',
                Rule::unique('recibos', 'month')->where('network_id', $this->network->id)
            ],
            'amount' => ['required', 'numeric', 'decimal:0,2', 'min:0', 'gt:0'],
            'seriecompleta' => ['required', 'string', 'min:6', 'unique:recibos,seriecompleta'],
            // 'descuento' => ['required', 'numeric', 'decimal:0,2', 'min:0'],
            // 'total' => ['required', 'numeric', 'decimal:0,2', 'min:0'],
            'seriepago_id' => ['required', 'integer', 'min:1', 'exists:seriepagos,id'],
            // 'client_id' => ['required', 'integer', 'min:1', 'exists:clients,id'],
            'network.id' => ['required', 'integer', 'min:1', 'exists:networks,id'],
        ];
    }

    public function mount(Network $network)
    {
        $this->network = $network;
        $this->recibo = new Recibo();
    }

    public function render()
    {
        $formapays = Formapay::orderBy('id', 'asc')->get();
        $seriepagos = Seriepago::orderBy('id', 'asc')->get();
        $recibos = Recibo::with('payment')->where('network_id', $this->network->id);
        if (trim($this->searchmonth) != '') {
            $recibos->where('month', $this->searchmonth);
        }
        $recibos = $recibos->orderBy('month', 'desc')->paginate();
        return view('livewire.admin.clientnetworks.show-client-recibos', compact('recibos', 'seriepagos', 'formapays'));
    }

    public function updatingSearchmonth()
    {
        $this->resetPage();
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->resetExcept(['network', 'recibo']);
            $this->resetValidation();
            $this->month = now('America/Lima')->format('Y-m');
            $amount = $this->network->price;

            if (Carbon::parse($this->network->date)->format('Y-m') == Carbon::parse($this->month)->format('Y-m')) {
                if (!Carbon::parse($this->network->date)->isSameDay(Carbon::parse($this->network->date)->copy()->firstOfMonth())) {
                    $amount =  amountDays($this->network->date, now('America/Lima'), $amount);
                }
            }
            $this->amount = $amount;
        }
    }

    public function updatedSeriepagoId($value)
    {
        $this->reset(['seriecompleta']);
        if ($value) {
            $seriepago = Seriepago::find($value);
            if ($seriepago) {
                $this->seriecompleta = $seriepago->serie . '-' . $seriepago->contador + 1;
            }
        }
    }

    public function updatedMonth($value)
    {
        if ($value) {
            $amount = $this->network->price;
            if (Carbon::parse($this->network->date)->format('Y-m') == Carbon::parse($value)->format('Y-m')) {
                if (!Carbon::parse($this->network->date)->isSameDay(Carbon::parse($this->network->date)->copy()->firstOfMonth())) {
                    $amount =  amountDays($this->network->date, now('America/Lima'), $amount);
                }
            }
            $this->amount = $amount;
        }
    }

    public function save()
    {

        $this->client_id = $this->network->client_id;
        $validateData = $this->validate();

        // $amount = $this->network->price;
        // if (Carbon::parse($this->network->date)->format('Y-m') == Carbon::parse($this->month)->format('Y-m')) {
        //     $amount =  amountDays($this->network->date, now('America/Lima'), $amount);
        // }

        DB::beginTransaction();
        try {
            $recibo = $this->network->recibos()->create([
                'date' => now('America/Lima'),
                'vencimiento' => Carbon::parse($this->month)->endOfMonth()->format('Y-m-d'),
                'month' => $this->month,
                'amount' => $this->amount,
                'seriecompleta' => $this->seriecompleta,
                'descuento' => 0,
                'total' => $this->amount,
                'seriepago_id' => $this->seriepago_id,
                'client_id' => $this->network->client_id,
            ]);
            $recibo->seriepago->contador = $recibo->seriepago->contador + 1;
            $recibo->seriepago->save();
            DB::commit();
            $this->network->refresh();
            $this->resetExcept(['network', 'recibo']);
            $this->resetValidation();
            $this->dispatchBrowserEvent('toast', toastJson('Recibo generado correctamente'));
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar recibo de pago', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function pay(Recibo $recibo)
    {
        $this->resetValidation();
        $this->reset(['detalle', 'codetransferencia', 'formapay_id', 'recibo']);
        $this->recibo = $recibo;
        $this->openpay = true;
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
            DB::commit();
            $this->network->refresh();
            $this->dispatchBrowserEvent('toast', toastJson('Recibo pagado correctamente'));
            $this->resetValidation();
            $this->reset(['detalle', 'codetransferencia', 'formapay_id', 'openpay', 'descuento']);
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
                $this->network->refresh();
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
            $this->network->refresh();
            $this->dispatchBrowserEvent('toast', toastJson('Recibo eliminado correctamente'));
            $this->resetValidation();
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al eliminar recibo', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }
}
