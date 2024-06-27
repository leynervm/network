<?php

namespace App\Http\Livewire\Admin\Equipos;

use App\Models\Network;
use Livewire\Component;

class CreateEquipo extends Component
{

    public $descripcion, $type, $price, $mac;
    public $open = false;
    public $network;

    public function mount(Network $network)
    {
        $this->network = $network;
    }

    protected function rules()
    {
        return [
            'descripcion' => ['required', 'string', 'min:3'],
            'type' => ['required', 'string'],
            'price' => ['required', 'string', 'numeric', 'min:0', 'decimal:0,2'],
            'mac' => ['nullable', 'string', 'min:3'],
        ];
    }

    public function render()
    {
        return view('livewire.admin.equipos.create-equipo');
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->resetExcept(['network', 'equipo']);
            $this->resetValidation();
        }
    }

    public function save()
    {
        $validateData = $this->validate();
        $this->network->equipos()->create($validateData);
        $this->network->refresh();
        $this->emitTo('admin.equipos.show-equipos-network', 'render');
        $this->resetExcept(['network', 'equipo']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('toast', toastJson('Equipo registrado correctamente'));
    }
}
