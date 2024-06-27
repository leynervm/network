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
        $client_id, $ubigeo_id;

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
            'document' => ['required', 'numeric',],
            'name' => ['required', 'string', 'min:6'],
            'descripcion' => ['required', 'string', 'min:10'],
            'portnumber' => ['nullable', 'string'],
            'type' => ['required', 'string'],
            'price' => ['required', 'numeric', 'decimal:0,2'],
            'direccion' =>  ['required', 'string', 'min:6'],
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
        $olts = Olt::with('spliters')->get();
        $antenas = Antena::orderBy('id', 'asc')->get();
        return view('livewire.admin.clientnetworks.create-client-network', compact('ubigeos', 'olts', 'antenas'));
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->resetValidation();
            $this->reset();
            $this->date = now('America/Lima')->format('Y-m-d');
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
        $this->reset(['portboxnavs', 'portboxnav_id']);
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

    public function save()
    {

        $this->document = trim($this->document);
        $this->name = trim($this->name);

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
