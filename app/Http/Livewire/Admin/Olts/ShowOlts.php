<?php

namespace App\Http\Livewire\Admin\Olts;

use App\Models\Olt;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShowOlts extends Component
{

    use WithPagination;

    public $open = false;
    public $olt;

    public function rules()
    {
        return [
            'olt.name' => [
                'required', 'string', 'min:3', 'unique:olts,name,' . $this->olt->id
            ],
            'olt.outs' => [
                'required', 'integer', 'min:1'
            ],
        ];
    }

    public function mount()
    {
        $this->olt = new Olt();
    }

    protected $listeners = ['render'];

    public function render()
    {
        $olts = Olt::with(['spliters' => function ($query) {
            $query->orderBy('id', 'asc');
        }])->orderBy('id', 'asc')->paginate();
        return view('livewire.admin.olts.show-olts', compact('olts'));
    }

    public function edit(Olt $olt)
    {
        $this->resetExcept(['olt']);
        $this->resetValidation();
        $this->olt = $olt;
        $this->open = true;
    }

    public function update()
    {
        $this->validate();
        if ($this->olt->outs < count($this->olt->spliters)) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al actualizar OLT !','N° de salidas de OLT es menor a la cantidad de spliters registrados.', 'info'));
            return false;
        }
        $this->olt->save();
        $this->dispatchBrowserEvent('toast', toastJson('OLT actualizado correctamente'));
        $this->resetExcept(['olt']);
        $this->resetValidation();
    }

    public function delete(Olt $olt)
    {
        DB::beginTransaction();
        try {
            $olt->delete();
            DB::commit();
            $this->dispatchBrowserEvent('toast', toastJson('OLT eliminado correctamente'));
            $this->resetExcept(['olt']);
            $this->resetValidation();
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al eliminar OLT', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }
}
