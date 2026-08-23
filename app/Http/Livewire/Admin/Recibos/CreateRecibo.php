<?php

namespace App\Http\Livewire\Admin\Recibos;

use App\Models\Network;
use App\Models\Seriepago;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateRecibo extends Component
{
    public $open = false;
    public $seriepago_id, $month, $type;
    public $ubigeo_id = '';
    public $locations = [];

    protected function rules()
    {
        return [
            'month' => ['required', 'date'],
            'seriepago_id' => ['required', 'integer', 'min:1'],
            'type' => ['required', 'string'],
        ];
    }

    public function mount() {}

    public function render()
    {
        $seriepagos = Seriepago::orderBy('id', 'asc')->get();
        return view('livewire.admin.recibos.create-recibo', compact('seriepagos'));
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset();
            $this->resetValidation();
            $this->month = now('America/Lima')->format('Y-m');
            $ubigeoIds = \App\Models\Network::whereNotNull('ubigeo_id')->distinct()->pluck('ubigeo_id')->toArray();
            $ubigeos = \App\Models\Ubigeo::whereIn('id', $ubigeoIds)->orderBy('distrito', 'asc')->get();
            $this->locations = $ubigeos->pluck('distrito', 'id')->toArray();
        }
    }

    public function updatedType($value)
    {
        $this->ubigeo_id = '';
    }

    // public function updatedMonth($value)
    // {
    //     $this->reset(['vencimiento']);
    //     if ($value) {
    //         $this->vencimiento = Carbon::parse($value)->endOfMonth()->format('Y-m-d');
    //     }
    // }

    public function save()
    {
        $validateData = $this->validate();
        DB::beginTransaction();
        try {
            $query = Network::activos()
                ->whereDoesntHave('recibos', function ($q) {
                    $q->where('month', $this->month);
                })
                ->where('status', Network::ACTIVO);

            if (trim($this->type) != 'TODOS' && trim($this->type) != 'todos') {
                $query->where('type', $this->type);
            }

            if (!empty($this->ubigeo_id)) {
                $query->where('ubigeo_id', $this->ubigeo_id);
            }

            $networks = $query->get();

            if (count($networks) > 0) {
                foreach ($networks as $item) {
                    $amount = $item->price;
                    if (Carbon::parse($item->date)->format('Y-m') == Carbon::parse($this->month)->format('Y-m')) {
                        if (!Carbon::parse($item->date)->isSameDay(Carbon::parse($item->date)->copy()->firstOfMonth())) {
                            $amount = amountDays($item->date, now('America/Lima'), $amount);
                        }
                    }

                    $seriepago = Seriepago::find($this->seriepago_id);
                    $seriecompleta = $seriepago->serie . '-' . $seriepago->contador + 1;

                    $item->recibos()->create([
                        'date' => now('America/Lima'),
                        'vencimiento' => Carbon::parse($this->month)->endOfMonth()->format('Y-m-d'),
                        'month' => $this->month,
                        'amount' => $amount,
                        'seriecompleta' => $seriecompleta,
                        'descuento' => 0,
                        'total' => $amount,
                        'seriepago_id' => $this->seriepago_id,
                        'client_id' => $item->client_id,
                    ]);

                    $item->status = Network::SUSPENDIDO;
                    $item->save();

                    $seriepago->contador = $seriepago->contador + 1;
                    $seriepago->save();
                }

                DB::commit();
                $this->reset();
                $this->resetValidation();
                $this->emitTo('admin.recibos.show-recibos', 'render');
                $this->dispatchBrowserEvent('toast', toastJson('Recibos generado correctamente'));
            } else {
                $this->dispatchBrowserEvent('alert', alertJson('No se encontraron resultados', 'No existen clintes de internet para generar recibos del mes seleccionado', 'info'));
            }
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar recibo de pago', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }
}
