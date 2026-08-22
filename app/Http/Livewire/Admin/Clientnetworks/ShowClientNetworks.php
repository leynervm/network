<?php

namespace App\Http\Livewire\Admin\Clientnetworks;

use App\Models\Antena;
use App\Models\Boxnav;
use App\Models\Network;
use App\Models\Olt;
use App\Models\Portboxnav;
use App\Models\Spliter;
use App\Models\Ubigeo;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientNetworksExport;

class ShowClientNetworks extends Component
{
    use WithPagination;

    public $open = false;
    public $network;
    public $client_id = null;
    public $client_name = '';
    public $client_document = '';
    public $typetoggle;

    public $antena_id;
    public $olt_id = '',
        $spliter_id = '',
        $boxnav_id = '',
        $portboxnav_id,
        $portnumber;

    public $actual_olt_id = null;
    public $actual_spliter_id = null;
    public $actual_boxnav_id = null;
    public $actual_port_id = null;
    public $actual_antena_id = null;

    public $spliters = [];
    public $boxnavs = [];
    public $portboxnavs = [];

    public $search = '';
    // public $searchmonth = '';
    public $searchtype = '';
    public $searchstatus = '';
    public $searchlocation = '';

    protected $listeners = ['render'];
    protected $queryString = [
        // 'searchmonth' => [
        //     'except' => '', 'as' => 'mes'
        // ],
        'search' => [
            'except' => '',
            'as' => 'buscar',
        ],
        'searchtype' => [
            'except' => '',
            'as' => 'tipo-servicio',
        ],
        'searchstatus' => [
            'except' => '',
            'as' => 'estado',
        ],
        'searchlocation' => [
            'except' => '',
            'as' => 'lugar',
        ],
    ];

    protected function rules()
    {
        return [
            'client_name' => ['required', 'string', 'min:3'],
            'network.codigo_slp' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('networks', 'codigo_slp')->ignore($this->network->id),
            ],
            'network.telefono' => ['required', 'numeric', 'regex:/^\d{9}$/'],
            'network.location' => ['required', 'string', 'min:3', 'max:255'],
            'network.type' => ['required', 'string'],
            'network.price' => ['required', 'numeric', 'decimal:0,2'],
            'network.direccion' => ['required', 'string', 'min:6'],
            'network.latitude' => ['required', 'string'],
            'network.longitude' => ['required', 'string'],
            'network.zoom' => ['nullable', 'numeric'],
            'network.ubigeo_id' => ['nullable', 'integer', 'min:1', 'exists:ubigeos,id'],
            'antena_id' => ['nullable', Rule::requiredIf(!validarFibra($this->network->type)), 'integer', 'min:1', 'exists:antenas,id'],
            'olt_id' => ['nullable', Rule::requiredIf(validarFibra($this->network->type)), 'integer', 'min:1', 'exists:olts,id'],
            'spliter_id' => ['nullable', Rule::requiredIf(validarFibra($this->network->type)), 'integer', 'min:1', 'exists:spliters,id'],
            'boxnav_id' => ['nullable', Rule::requiredIf(validarFibra($this->network->type)), 'integer', 'min:1', 'exists:boxnavs,id'],
            'portboxnav_id' => ['nullable', Rule::requiredIf(validarFibra($this->network->type)), 'integer', 'min:1', 'exists:portboxnavs,id'],
        ];
    }

    public function mount()
    {
        $this->network = new Network();
    }

    private function getClientNetworksQueryBuilder()
    {
        $clientnetworks = Network::with([
            'networkable' => function (\Illuminate\Database\Eloquent\Relations\MorphTo $morphTo) {
                $morphTo->morphWith([
                    \App\Models\Portboxnav::class => ['boxnav.spliter.olt'],
                ]);
            },
            'client',
            'ubigeo'
        ])->withWhereHas('client', function ($query) {
            if (trim($this->search) !== '') {
                $query->where('document', 'like', '%' . $this->search . '%')->orWhere('name', 'like', '%' . $this->search . '%');
            }
        });
        if (trim($this->searchtype) !== '') {
            $clientnetworks->where('type', $this->searchtype);
        }
        if (trim($this->searchstatus) !== '') {
            $clientnetworks->where('status', $this->searchstatus);
        }
        if (trim($this->searchlocation) !== '') {
            $clientnetworks->where('location', $this->searchlocation);
        }
        return $clientnetworks->orderBy('date', 'desc');
    }

    public function render()
    {
        $ubigeos = Ubigeo::orderBy('ubigeo', 'asc')->get();
        $olts = Olt::with(['spliters.boxnavs.portboxnavs.network'])->get();
        $antenas = Antena::orderBy('id', 'asc')->get();
        $locations = Network::activos()->whereNotNull('location')->where('location', '!=', '')->distinct()->orderBy('location', 'asc')->pluck('location')->toArray();
        $clientnetworks = $this->getClientNetworksQueryBuilder()->paginate();
        return view('livewire.admin.clientnetworks.show-client-networks', compact('clientnetworks', 'ubigeos', 'olts', 'antenas', 'locations'));
    }

    public function exportExcel()
    {
        $query = $this->getClientNetworksQueryBuilder();
        return Excel::download(new ClientNetworksExport($query), 'clientes-internet-' . now()->format('YmdHis') . '.xlsx');
    }

    public function exportPdf()
    {
        // Set dynamic limits for heavy data
        ini_set('memory_limit', '1024M');
        set_time_limit(300);

        // Get matching networks without pagination
        $clientnetworks = $this->getClientNetworksQueryBuilder()->get();

        $pdf = PDF::setPaper('a4', 'portrait')
                  ->loadView('admin.clientnetworks.export-pdf', compact('clientnetworks'));

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'clientes-internet-' . now()->format('YmdHis') . '.pdf');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSearchtype()
    {
        $this->resetPage();
    }

    public function updatingSearchstatus()
    {
        $this->resetPage();
    }

    public function updatingSearchlocation()
    {
        $this->resetPage();
    }

    public function edit(Network $network)
    {
        $this->resetExcept(['network']);
        $this->resetValidation();
        $this->network = $network;
        $this->client_id = $network->client_id;
        $this->client_name = $network->client ? $network->client->name : '';
        $this->client_document = $network->client ? $network->client->document : '';
        $this->typetoggle = $this->network->isFibra() ? '0' : '1';

        $this->actual_olt_id = null;
        $this->actual_spliter_id = null;
        $this->actual_boxnav_id = null;
        $this->actual_port_id = null;
        $this->actual_antena_id = null;

        if ($network->networkable) {
            if ($network->isSatelital()) {
                $this->antena_id = $network->networkable_id;
                $this->actual_antena_id = $network->networkable_id;
            } else {
                $this->olt_id = $network->networkable->boxnav->spliter->olt_id ?? null;
                $this->actual_olt_id = $this->olt_id;
                $this->spliters = Olt::find($this->olt_id)->spliters ?? [];
                $this->spliter_id = $network->networkable->boxnav->spliter_id ?? null;
                $this->actual_spliter_id = $this->spliter_id;
                $this->boxnavs = Spliter::find($this->spliter_id)->boxnavs ?? [];
                $this->boxnav_id = $network->networkable->boxnav_id ?? null;
                $this->actual_boxnav_id = $this->boxnav_id;
                $this->portboxnavs = Boxnav::find($this->boxnav_id)->portboxnavs()->with('network')->get() ?? [];
                $this->portboxnav_id = $this->network->networkable_id;
                $this->actual_port_id = $this->network->networkable_id;
            }
        }
        $this->open = true;
    }

    public function update()
    {
        $this->network->telefono = trim($this->network->telefono);
        $this->network->codigo_slp = trim($this->network->codigo_slp) === '' ? null : trim($this->network->codigo_slp);
        $this->validate();
        DB::beginTransaction();
        try {
            if ($this->client_id) {
                $client = \App\Models\Client::find($this->client_id);
                if ($client) {
                    $client->name = trim($this->client_name);
                    $client->save();
                }
            }

            if ($this->network->isFibra()) {
                if ($this->network->networkable_id !== $this->portboxnav_id) {
                    $portboxnav = Portboxnav::find($this->portboxnav_id);
                    if ($portboxnav->network()->exists() && $this->portboxnav_id != $this->actual_port_id) {
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

    public function updatedNetwork($name, $value)
    {
        if ($name === 'type') {
            $this->reset(['antena_id', 'olt_id', 'spliter_id', 'boxnav_id', 'portboxnav_id', 'portnumber', 'spliters', 'boxnavs', 'portboxnavs']);
        }
    }

    public function updatedNetworkType($value)
    {
        $this->reset(['antena_id', 'olt_id', 'spliter_id', 'boxnav_id', 'portboxnav_id', 'portnumber', 'spliters', 'boxnavs', 'portboxnavs']);
    }

    public function selectOlt($id)
    {
        if ($this->olt_id == $id) {
            $this->reset(['olt_id', 'spliter_id', 'boxnav_id', 'portboxnav_id', 'spliters', 'boxnavs', 'portboxnavs', 'portnumber']);
            return;
        }
        $this->olt_id = $id;
        $this->reset(['spliter_id', 'boxnav_id', 'portboxnav_id', 'boxnavs', 'portboxnavs', 'portnumber']);
        $this->spliters = Olt::find($id)->spliters;
    }

    public function selectSpliter($id)
    {
        if ($this->spliter_id == $id) {
            $this->reset(['spliter_id', 'boxnav_id', 'portboxnav_id', 'boxnavs', 'portboxnavs', 'portnumber']);
            return;
        }
        $this->spliter_id = $id;
        $this->reset(['boxnav_id', 'portboxnav_id', 'portboxnavs', 'portnumber']);
        $this->boxnavs = Spliter::find($id)->boxnavs;
    }

    public function selectBoxnav($id)
    {
        if ($this->boxnav_id == $id) {
            $this->reset(['boxnav_id', 'portboxnav_id', 'portboxnavs', 'portnumber']);
            return;
        }
        $this->boxnav_id = $id;
        $this->reset(['portboxnav_id', 'portnumber']);
        $this->portboxnavs = Boxnav::find($id)->portboxnavs()->with('network')->get();
    }

    public function selectPort($id)
    {
        $port = Portboxnav::find($id);
        if ($port && $port->network()->exists() && $id != $this->actual_port_id) {
            $this->dispatchBrowserEvent('alert', alertJson('Puerto no disponible', 'El puerto seleccionado ya se encuentra ocupado.', 'error'));
            return;
        }
        $this->portboxnav_id = $id;
        if ($port) {
            $this->portnumber = $port->code;
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

    public function delete(Network $network)
    {
        if (get_class($network->networkable) == Portboxnav::class) {
            // dd($network->networkable->status);
        }

        // $network->networkable_id = null;
        // $network->networkable_type = null;
        $network->delete();
        $this->dispatchBrowserEvent('toast', toastJson('Eliminado correctamente'));
    }
}
