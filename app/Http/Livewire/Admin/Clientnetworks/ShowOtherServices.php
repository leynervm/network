<?php

namespace App\Http\Livewire\Admin\Clientnetworks;

use App\Models\Network;
use App\Models\Otherservice;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ShowOtherServices extends Component
{

    public $network, $otherservice;
    public $open = false;

    protected $listeners = ['render'];

    protected function rules()
    {
        return [
            'otherservice.descripcion' => [
                'required', 'string', 'min:6',
                Rule::unique('otherservices', 'descripcion')
                    ->where('network_id', $this->network->id)->ignore('network_id', $this->network->id)
            ],
            'otherservice.price' => ['required', 'numeric', 'decimal:0,2', 'min:0'],
        ];
    }

    public function mount(Network $network)
    {
        $this->network = $network;
        $this->otherservice = new Otherservice();
    }

    public function render()
    {
        return view('livewire.admin.clientnetworks.show-other-services');
    }

    public function edit(Otherservice $otherservice)
    {
        $this->resetExcept(['network', 'otherservice']);
        $this->resetValidation();
        $this->otherservice = $otherservice;
        $this->open = true;
    }

    public function update()
    {
        $this->otherservice->descripcion = trim($this->otherservice->descripcion);
        $this->validate();
        DB::beginTransaction();
        try {
            $this->otherservice->save();
            DB::commit();
            $this->network->refresh();
            $this->resetExcept(['network', 'otherservice']);
            $this->resetValidation();
            $this->dispatchBrowserEvent('toast', toastJson('Actualizado correctamente'));
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al actualizar otros servicios de internet', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function delete(Otherservice $otherservice)
    {
        $otherservice->delete();
        $this->network->refresh();
        $this->dispatchBrowserEvent('toast', toastJson('Eliminado correctamente'));
    }
}
