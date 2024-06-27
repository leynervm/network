<?php

namespace App\Http\Livewire\Admin\Equipos;

use App\Models\Equipo;
use App\Models\Network;
use Livewire\Component;

class ShowEquiposNetwork extends Component
{

    public $network, $equipo;
    public $open = false;

    protected $listeners = ['render'];


    protected function rules()
    {
        return [
            'equipo.descripcion' => ['required', 'string', 'min:3'],
            'equipo.type' => ['required', 'string'],
            'equipo.price' => ['required', 'string', 'numeric', 'min:0', 'decimal:0,2'],
            'equipo.mac' => ['nullable', 'string', 'min:3'],
        ];
    }

    public function mount(Network $network)
    {
        $this->network = $network;
        $this->equipo = new Equipo();
    }

    public function render()
    {
        return view('livewire.admin.equipos.show-equipos-network');
    }

    public function edit(Equipo $equipo)
    {
        $this->resetExcept(['network', 'equipo']);
        $this->resetValidation();
        $this->equipo = $equipo;
        $this->open = true;
    }

    public function update()
    {
        $this->validate();
        $this->equipo->save();
        $this->network->refresh();
        $this->resetExcept(['network', 'equipo']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('toast', toastJson('Equipo actualizado correctamente'));
    }

    public function delete(Equipo $equipo)
    {
        $equipo->delete();
        $this->network->refresh();
        $this->dispatchBrowserEvent('toast', toastJson('Equipo eliminado correctamente'));
    }
}
