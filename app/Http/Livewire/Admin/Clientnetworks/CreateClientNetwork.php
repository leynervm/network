<?php

namespace App\Http\Livewire\Admin\Clientnetworks;

use App\Models\Antena;
use App\Models\Boxnav;
use App\Models\Client;
use App\Models\Olt;
use App\Models\Portboxnav;
use App\Models\Spliter;
use App\Models\Ubigeo;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateClientNetwork extends Component
{

    public $open = false;

    public $date, $code, $portnumber, $descripcion, $type, $price, $direccion,
        $client_id, $ubigeo_id, $telefono, $codigo_slp, $location;
    
    public $latitude, $longitude, $zoom = 14;

    public $antena_id;
    public $document, $name;
    public $olt_id = '', $spliter_id = '',
        $boxnav_id = '', $portboxnav_id;

    public $spliters = [];
    public $boxnavs = [];
    public $portboxnavs = [];

    public $addequipament = false;
    public $equipos = [];
    public $id_equipo, $descripcionequipo, $tipoentrega, $mac;
    public $priceequipo = 0;

    protected function rules()
    {
        return [
            'date' => ['required', 'date'],
            'document' => [
                'required', 'numeric', 'regex:/^(?:\d{8}|\d{11})$/',
            ],
            'name' => ['required', 'string', 'min:6'],
            'codigo_slp' => ['nullable', 'string', 'max:255', 'unique:networks,codigo_slp'],
            'telefono' => ['nullable', 'numeric', 'regex:/^\d{9}$/'],
            'location' => ['required', 'string', 'min:3', 'max:255'],
            'descripcion' => ['nullable', 'string', 'min:10'],
            'portnumber' => ['nullable', 'string'],
            'type' => ['required', 'string'],
            'price' => ['required', 'numeric', 'decimal:0,2'],
            'direccion' =>  ['required', 'string', 'min:6'],
            'latitude' => ['required', 'string'],
            'longitude' => ['required', 'string'],
            'zoom' => ['nullable', 'numeric'],
            'client_id' => ['required', 'integer', 'min:1', 'exists:clients,id'],
            'ubigeo_id' => ['nullable', 'integer', 'min:1', 'exists:ubigeos,id'],
            'antena_id' => [
                'nullable',
                Rule::requiredIf(!validarFibra($this->type)),
                'integer', 'min:1', 'exists:antenas,id'
            ],
            'olt_id' => [
                'nullable',
                Rule::requiredIf(validarFibra($this->type)),
                'integer', 'min:1', 'exists:olts,id'
            ],
            'spliter_id' => [
                'nullable',
                Rule::requiredIf(validarFibra($this->type)),
                'integer', 'min:1', 'exists:spliters,id'
            ],
            'boxnav_id' => [
                'nullable',
                Rule::requiredIf(validarFibra($this->type)),
                'integer', 'min:1', 'exists:boxnavs,id'
            ],
            'portboxnav_id' => [
                'nullable',
                Rule::requiredIf(validarFibra($this->type)),
                'integer', 'min:1', 'exists:portboxnavs,id'
            ],
            'equipos' => [
                'nullable', Rule::requiredIf($this->addequipament), 'array',
            ]
        ];
    }

    public function mount()
    {
        $this->date = now('America/Lima')->format('Y-m-d');
    }



    public function render()
    {
        $ubigeos = Ubigeo::orderBy('ubigeo', 'asc')->get();
        $olts = Olt::with(['spliters.boxnavs.portboxnavs.network'])->get();
        $antenas = Antena::orderBy('id', 'asc')->get();
        return view('livewire.admin.clientnetworks.create-client-network', compact('ubigeos', 'olts', 'antenas'));
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->resetValidation();
            $this->resetExcept(['open']);
            $this->date = now('America/Lima')->format('Y-m-d');
        }
    }

    public function updatedType($value)
    {
        if (validarFibra($value)) {
            $this->reset(['antena_id']);
        } else {
            $this->reset([
                'olt_id', 'spliter_id', 'boxnav_id', 'portboxnav_id',
                'spliters', 'boxnavs', 'portboxnavs', 'portnumber'
            ]);
        }
    }

    public function selectOlt($id)
    {
        if ($this->olt_id == $id) {
            $this->reset([
                'olt_id', 'spliter_id', 'boxnav_id', 'portboxnav_id',
                'spliters', 'boxnavs', 'portboxnavs', 'portnumber'
            ]);
            return;
        }
        $this->olt_id = $id;
        $this->reset([
            'spliter_id', 'boxnav_id', 'portboxnav_id',
            'boxnavs', 'portboxnavs', 'portnumber'
        ]);
        $this->spliters = Olt::find($id)->spliters;
    }

    public function selectSpliter($id)
    {
        if ($this->spliter_id == $id) {
            $this->reset([
                'spliter_id', 'boxnav_id', 'portboxnav_id',
                'boxnavs', 'portboxnavs', 'portnumber'
            ]);
            return;
        }
        $this->spliter_id = $id;
        $this->reset([
            'boxnav_id', 'portboxnav_id',
            'portboxnavs', 'portnumber'
        ]);
        $this->boxnavs = Spliter::find($id)->boxnavs;
    }

    public function selectBoxnav($id)
    {
        if ($this->boxnav_id == $id) {
            $this->reset([
                'boxnav_id', 'portboxnav_id',
                'portboxnavs', 'portnumber'
            ]);
            return;
        }
        $this->boxnav_id = $id;
        $this->reset(['portboxnav_id', 'portnumber']);
        $this->portboxnavs = Boxnav::find($id)->portboxnavs()->with('network')->get();
    }

    public function selectPort($id)
    {
        $port = Portboxnav::find($id);
        if ($port && $port->network()->exists()) {
            $this->dispatchBrowserEvent('alert', alertJson('Puerto no disponible', 'El puerto seleccionado ya se encuentra ocupado.', 'error'));
            return;
        }
        $this->portboxnav_id = $id;
        if ($port) {
            $this->portnumber = $port->code;
        }
    }

    public function updatedOltId($value)
    {
        $this->reset([
            'spliters', 'boxnavs', 'portboxnavs',
            'spliter_id',  'boxnav_id', 'portboxnav_id'
        ]);
        if ($value) {
            $this->spliters = Olt::find($value)->spliters;
        }
    }

    public function updatedSpliterId($value)
    {
        $this->reset([
            'boxnavs', 'portboxnavs', 'boxnav_id', 'portboxnav_id'
        ]);
        if ($value) {
            $this->boxnavs = Spliter::find($value)->boxnavs;
        }
    }

    public function updatedBoxnavId($value)
    {
        $this->reset(['portboxnavs', 'portboxnav_id', 'portnumber']);
        if ($value) {
            $this->portboxnavs = Boxnav::find($value)->portboxnavs()->with('network')->get();
        }
    }

    public function updatedPortboxnavId($value)
    {
        if ($value) {
            $this->portnumber = Portboxnav::find($value)->code;
        }
    }

    public function save()
    {

        $this->document = trim($this->document);
        $this->name = trim($this->name);
        $this->telefono = trim($this->telefono);
        $this->codigo_slp = trim($this->codigo_slp) === '' ? null : trim($this->codigo_slp);

        $client = Client::withWhereHas('networks', function ($query) {
            $query->activos();
        })->where('document', $this->document)->first();

        if ($client) {
            if (count($client->networks) > 0) {
                $this->dispatchBrowserEvent('alert', alertJson('CLIENTE YA CUENTA CON SERVICIO REGISTRADO', 'Cliente registrado y con servicio activo.', 'info'));
                return false;
            }
        }

        if (is_null($this->client_id)) {
            $exists = Client::where('document', $this->document)->exists();
            if ($exists) {
                $this->client_id = Client::where('document', $this->document)->first()->id ?? null;
            } else {
                $cliente = Client::create([
                    'document' => $this->document,
                    'name' => $this->name,
                ]);
                $this->client_id = $cliente->id;
            }
        }

        $validateData = $this->validate();
        DB::beginTransaction();
        try {

            if (validarFibra($this->type)) {
                $portboxnav = Portboxnav::find($this->portboxnav_id);
                if ($portboxnav->network()->exists()) {
                    $this->dispatchBrowserEvent('alert', alertJson('Puerto no se encuentra DISPONIBLE', 'El puerto de la caja NAV ya se encuentra ocupado.', 'error'));
                    return false;
                }
                $this->portnumber = $portboxnav->code;
                $network = $portboxnav->network()->create($validateData);
            } else {
                $antena = Antena::find($this->antena_id);
                $network = $antena->networks()->create($validateData);
            }
            $code = 'CI000' . $network->id;
            $code++;
            $network->code = $code;
            $network->save();
            if ($this->addequipament) {
                foreach ($this->equipos as $item) {
                    $network->equipos()->create([
                        'descripcion' => $item['descripcionequipo'],
                        'price' => $item['priceequipo'],
                        'mac' => $item['mac'],
                        'type' => $item['tipoentrega'],
                    ]);
                }
            }
            DB::commit();
            $this->resetValidation();
            $this->reset();
            $this->dispatchBrowserEvent('toast', toastJson('Servicio internet registrado correctamente'));
            $this->emitTo('admin.clientnetworks.show-client-networks', 'render');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar cliente de internet', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function saveequipament()
    {

        $this->id_equipo = uniqid();
        $validateData = $this->validate([
            'id_equipo' => [
                'required'
            ],
            'descripcionequipo' => [
                'required', 'string', 'min:3'
            ],
            'tipoentrega' => [
                'required', 'string',
            ],
            'mac' => [
                'nullable', 'string', 'min:8', 'digits:8'
            ],
            'priceequipo' => [
                'required', 'numeric', 'min:0', 'decimal:0,2'
            ],
        ]);

        $this->equipos[] = $validateData;
        $this->reset([
            'id_equipo', 'descripcionequipo', 'tipoentrega', 'priceequipo', 'mac'
        ]);
    }

    public function delete($id_equipo)
    {
        $this->equipos = array_filter($this->equipos, function ($item) use ($id_equipo) {
            return $item['id_equipo'] !== $id_equipo;
        });
    }

    public function buscar()
    {
        $this->validate([
            'document' => ['required', 'numeric']
        ]);

        $response = getCliente($this->document);
        if ($response->success) {
            $this->name = $response->name;
            $this->client_id = $response->client_id;
        } else {
            $this->name = '';
            $this->client_id = null;
            $this->addError('document', $response->mensaje);
        }
    }
}
