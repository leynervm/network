<?php

namespace App\Http\Livewire\Admin\Olts;

use App\Models\Olt;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateOlt extends Component
{

    public $open = false;
    public $name, $outs;


    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'min:3', 'unique:olts,name'
            ],
            'outs' => [
                'required', 'integer', 'min:1'
            ],
        ];
    }

    public function render()
    {
        return view('livewire.admin.olts.create-olt');
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
        $validateData = $this->validate();
        DB::beginTransaction();
        try {
            $olt = Olt::create($validateData);
            // for ($i = 0; $i < $this->outs; $i++) {
            //     $olt->spliters()->create([
            //         'name' => '' . Olt::ABCDARIO[$i],
            //         'code' => Olt::ABCDARIO[$i],
            //         'outs' => $this->outs
            //     ]);
            // }
            DB::commit();
            $this->dispatchBrowserEvent('toast', toastJson('OLT registrado correctamente'));
            $this->emitTo('admin.olts.show-olts', 'render');
            $this->resetValidation();
            $this->reset();
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar OLT', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }
}
