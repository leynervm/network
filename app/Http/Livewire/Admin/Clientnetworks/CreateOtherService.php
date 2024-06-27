<?php

namespace App\Http\Livewire\Admin\Clientnetworks;

use App\Models\Network;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateOtherService extends Component
{

    public $network;
    public $open = false;

    public $date, $descripcion, $price;

    protected function rules()
    {
        return [
            'date' => ['required', 'date'],
            'descripcion' => [
                'required', 'string', 'min:6',
                Rule::unique('otherservices', 'descripcion')->where('network_id', $this->network->id)
            ],
            'price' => ['required', 'numeric', 'decimal:0,2', 'min:0'],
            'network.id' => ['required', 'integer', 'min:1', 'exists:networks,id']
        ];
    }

    public function mount(Network $network)
    {
        $this->network = $network;
    }

    public function render()
    {
        return view('livewire.admin.clientnetworks.create-other-service');
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->resetExcept(['network']);
            $this->resetValidation();
        }
    }

    public function save()
    {
        $this->date = now('America/Lima');
        $this->descripcion = trim($this->descripcion);
        $validateData = $this->validate();
        DB::beginTransaction();
        try {
            $this->network->otherservices()->create($validateData);
            DB::commit();
            $this->resetExcept(['network']);
            $this->resetValidation();
            $this->dispatchBrowserEvent('toast', toastJson('Registrado correctamente'));
            $this->emitTo('admin.clientnetworks.show-other-services', 'render');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar otros servicios de internet', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function delete()
    {
        DB::beginTransaction();
        try {
            $this->network->delete();
            DB::commit();
            $this->dispatchBrowserEvent('toast', toastJson('Eliminado correctamente'));
           return redirect()->route('dashboard');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar otros servicios de internet', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }
}
