<?php

namespace App\Http\Livewire\Admin\Marcas;

use App\Models\Marca;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateMarca extends Component
{

    public $open;
    public $name;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'unique:marcas,name']
        ];
    }


    public function render()
    {
        return view('livewire.admin.marcas.create-marca');
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset();
            $this->resetValidation();
        }
    }

    public function save()
    {

        $validateData =  $this->validate();
        DB::beginTransaction();
        try {
            Marca::create($validateData);
            DB::commit();
            $this->resetValidation();
            $this->reset();
            $this->dispatchBrowserEvent('toast', toastJson('Marca registrado correctamente'));
            $this->emitTo('admin.marcas.show-marcas', 'render');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar antena', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }
}
