<?php

namespace App\Http\Livewire\Admin\Antenas;

use App\Models\Antena;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAntenas extends Component
{

    use WithPagination;

    protected $listeners = ['render'];

    public $antena;
    public $open = false;

    protected function rules()
    {
        return [
            'antena.name' => ['required', 'string', 'min:3', 'unique:antenas,name,' . $this->antena->id],
            'antena.direccion' => ['nullable', 'string', 'min:3']
        ];
    }

    public function mount()
    {
        $this->antena = new Antena();
    }

    public function render()
    {
        $antenas = Antena::orderBy('id', 'asc')->paginate();
        return view('livewire.admin.antenas.show-antenas', compact('antenas'));
    }

    public function edit(Antena $antena)
    {
        $this->resetValidation();
        $this->resetExcept(['antena']);
        $this->antena = $antena;
        $this->open = true;
    }

    public function update()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $this->antena->save();
            DB::commit();
            $this->resetValidation();
            $this->resetExcept(['antena']);
            $this->dispatchBrowserEvent('toast', toastJson('Antena actualizado correctamente'));
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al actualizar antena', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function delete(Antena $antena)
    {
        if (count($antena->networks) > 0) {
            $this->dispatchBrowserEvent('alert', alertJson('No se pudo eliminar antena', 'La antena contiene registros vinculados a clientes', 'info'));
            return false;
        }
        $antena->delete();
        $this->dispatchBrowserEvent('toast', toastJson('Antena eliminado correctamente'));
    }
}
