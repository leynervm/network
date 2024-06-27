<?php

namespace App\Http\Livewire\Admin\Antenas;

use App\Models\Antena;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateAntena extends Component
{

    public $open;
    public $name, $direccion;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'unique:antenas,name'],
            'direccion' => ['nullable', 'string', 'min:3']
        ];
    }

    public function render()
    {
        return view('livewire.admin.antenas.create-antena');
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset();
            $this->resetValidation();
        }
    }

    public function saveboxnav()
    {

        $validateData =  $this->validate();
        DB::beginTransaction();
        try {
            Antena::create($validateData);
            DB::commit();
            $this->resetValidation();
            $this->reset();
            $this->dispatchBrowserEvent('toast', toastJson('Antena registrado correctamente'));
            $this->emitTo('admin.antenas.show-antenas', 'render');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar antena', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

}
