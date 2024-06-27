<?php

namespace App\Http\Livewire\Admin\Clientnetworks;

use App\Models\Antena;
use App\Models\Boxnav;
use App\Models\Mufa;
use App\Models\Network;
use App\Models\Olt;
use App\Models\Oltport;
use App\Models\Portboxnav;
use App\Models\Spliter;
use App\Models\Ubigeo;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ShowClientNetworks extends Component
{

    use WithPagination;

    public $open = false;
    public $network;
    public $typetoggle;

    public $antena_id;
    public $olt_id = '', $spliter_id = '',
        $boxnav_id = '', $portboxnav_id, $portnumber;

    public $spliters = [];
    public $boxnavs = [];
    public $portboxnavs = [];

    public $search = '';
    // public $searchmonth = '';
    public $searchtype = '';

    protected $listeners = ['render'];
    protected $queryString = [
        // 'searchmonth' => [
        //     'except' => '', 'as' => 'mes'
        // ],
        'search' => [
            'except' => '', 'as' => 'buscar'
        ],
        'searchtype' => [
            'except' => '', 'as' => 'tipo-servicio'
        ]
    ];



    protected function rules()
    {
        return [
            'network.descripcion' => ['required', 'string', 'min:10'],
            'network.type' => ['required', 'string'],
            'network.price' => ['required', 'numeric', 'decimal:0,2'],
            'network.direccion' =>  ['required', 'string', 'min:6'],
            'network.ubigeo_id' => ['nullable', 'integer', 'min:1', 'exists:ubigeos,id'],
            'antena_id' => [
                'nullable',
                Rule::requiredIf(!validarFibra($this->network->type)),
                'integer', 'min:1', 'exists:antenas,id'
            ],
            'olt_id' => [
                'nullable',
                Rule::requiredIf(validarFibra($this->network->type)),
                'integer', 'min:1', 'exists:olts,id'
            ],
            'spliter_id' => [
                'nullable',
                Rule::requiredIf(validarFibra($this->network->type)),
                'integer', 'min:1', 'exists:spliters,id'
            ],
            'boxnav_id' => [
                'nullable',
                Rule::requiredIf(validarFibra($this->network->type)),
                'integer', 'min:1', 'exists:boxnavs,id'
            ],
            'portboxnav_id' => [
                'nullable',
                Rule::requiredIf(validarFibra($this->network->type)),
                'integer', 'min:1', 'exists:portboxnavs,id'
            ]
        ];
    }


    public function mount()
    {
        $this->network = new Network();
    }

    public function render()
    {
        $ubigeos = Ubigeo::orderBy('ubigeo', 'asc')->get();
        $olts = Olt::with('spliters')->get();
        $antenas = Antena::orderBy('id', 'asc')->get();
        $clientnetworks = Network::withWhereHas('client', function ($query) {
            if (trim($this->search) !== '') {
                $query->where('document', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            }
        });
        if (trim($this->searchtype) !== '') {
            $clientnetworks->where('type', $this->searchtype);
        }
        $clientnetworks = $clientnetworks->orderBy('date', 'desc')->paginate();
        return view('livewire.admin.clientnetworks.show-client-networks', compact('clientnetworks', 'ubigeos', 'olts', 'antenas'));
    }

    public function edit(Network $network)
    {
        $this->resetExcept(['network']);
        $this->resetValidation();
        $this->network = $network;
        $this->typetoggle = $this->network->isFibra() ? '0' : '1';

        if ($network->networkable) {
            if ($network->isSatelital()) {
                $this->antena_id = $network->networkable_id;
            } else {
                $this->olt_id = $network->networkable->boxnav->spliter->olt_id;
                $this->spliters = Olt::find($this->olt_id)->spliters;
                $this->spliter_id = $network->networkable->boxnav->spliter_id;
                $this->boxnavs = Spliter::find($this->spliter_id)->boxnavs;
                $this->boxnav_id = $network->networkable->boxnav_id;
                $this->portboxnavs = Boxnav::find($this->boxnav_id)->portboxnavs;
                $this->portboxnav_id = $this->network->networkable_id;
            }
        }
        $this->open = true;
    }

    public function update()
    {

        $this->validate();
        DB::beginTransaction();
        try {

            if ($this->network->isFibra()) {
                if ($this->network->networkable_id !== $this->portboxnav_id) {
                    $portboxnav = Portboxnav::find($this->portboxnav_id);
                    if ($portboxnav->network()->exists()) {
                        $this->dispatchBrowserEvent('alert', alertJson('Puerto no se encuentra DISPONIBLE', 'El puerto de la caja NAV ya se encuentra ocupado.', 'error'));
                        return false;
                    }
                    $this->portnumber = $portboxnav->code;
                    $this->network->networkable_id = $this->portboxnav_id;
                }
            } else {
                $this->network->networkable_id = $this->antena_id;
            }
            $this->network->save();
            DB::commit();
            $this->resetValidation();
            $this->resetExcept(['network']);
            $this->dispatchBrowserEvent('toast', toastJson('Servicio internet actualizado correctamente'));
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al actualizar cliente de internet', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function updatedOltId($value)
    {
        $this->reset([
            'spliters', 'boxnavs', 'portboxnavs',
            'spliter_id', 'boxnav_id', 'portboxnav_id'
        ]);
        if ($value) {
            $this->spliters = Olt::find($value)->spliters;
        }
    }

    public function updatedSpliterId($value)
    {
        $this->reset([
            'boxnavs', 'portboxnavs',
            'boxnav_id', 'portboxnav_id'
        ]);
        if ($value) {
            $this->boxnavs = Spliter::find($value)->boxnavs;
        }
    }

    public function updatedBoxnavId($value)
    {
        $this->reset([
            'portboxnavs', 'portboxnav_id'
        ]);
        if ($value) {
            $this->portboxnavs = Boxnav::find($value)->portboxnavs;
        }
    }

    public function updatedPortboxnavId($value)
    {
        if ($value) {
            $this->portnumber = Portboxnav::find($value)->code;
        }
    }

    public function suspender(Network $network)
    {
        $network->status = Network::SUSPENDIDO;
        $network->save();
        $this->dispatchBrowserEvent('toast', toastJson('Servicio internet suspendido correctamente'));
    }

    public function reconectar(Network $network)
    {
        $network->status = Network::ACTIVO;
        $network->save();
        $this->dispatchBrowserEvent('toast', toastJson('Servicio internet reconectado correctamente'));
    }
}
