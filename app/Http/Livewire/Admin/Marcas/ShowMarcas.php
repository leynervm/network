<?php

namespace App\Http\Livewire\Admin\Marcas;

use App\Models\Marca;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMarcas extends Component
{

    use WithPagination;

    protected $listeners = ['render'];

    public $marca;
    public $open = false;

    protected function rules()
    {
        return [
            'marca.name' => [
                'required', 'string', 'min:3',
                Rule::unique('marcas', 'name')->ignore($this->marca->id)
            ],
        ];
    }

    public function mount()
    {
        $this->marca = new Marca();
    }

    public function render()
    {
        $marcas = Marca::orderBy('name', 'asc')->paginate();
        return view('livewire.admin.marcas.show-marcas', compact('marcas'));
    }


    public function edit(Marca $marca)
    {
        $this->resetValidation();
        $this->resetExcept(['antena']);
        $this->marca = $marca;
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

    public function delete(Marca $marca)
    {
        $marca->delete();
        $this->dispatchBrowserEvent('toast', toastJson('Marca eliminado correctamente'));
    }
}
