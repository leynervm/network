<?php

namespace App\Http\Livewire\Admin\Spliters;

use App\Models\Olt;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;


class CreateSpliter extends Component
{

    public $olt;
    public $open = false;
    public $name, $code, $outs;
    public $allspliters = false;

    public function rules()
    {
        return [
            'name' => [
                'nullable', Rule::requiredIf(!$this->allspliters),
                'string', 'min:3',
                Rule::unique('spliters', 'name')->where('olt_id', $this->olt->id)
            ],
            'code' => [
                'nullable', Rule::requiredIf(!$this->allspliters),
                'string', 'min:1',
                Rule::unique('spliters', 'code')->where('olt_id', $this->olt->id)
            ],
            'outs' => [
                'required', 'integer', 'min:1'
            ],
        ];
    }

    public function mount(Olt $olt)
    {
        $this->olt = $olt;
    }

    public function render()
    {
        return view('livewire.admin.spliters.create-spliter');
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['name', 'code', 'outs']);
            $this->resetValidation();
        }
    }

    public function save()
    {
        $letters = Olt::ABCDARIO;
        $validateData = $this->validate();
        DB::beginTransaction();
        try {

            if ($this->olt->outs - count($this->olt->spliters) <= 0) {
                $this->dispatchBrowserEvent('alert', alertJson('LIMITE DE PUERTOS ALCANZADO !', 'Se alcanzó el límite de puertos para registrar nuevo spliter', 'info'));
                return false;
            }

            if ($this->allspliters) {
                $disponibles = $this->olt->outs - count($this->olt->spliters);
                for ($i = 0; $i < $disponibles; $i++) {
                    $j = 1;
                    // $k = 0;
                    do {
                        $code = $j;
                        $exists = $this->olt->spliters()->where('code', trim($code))->exists();
                        $j++;
                        // $k++;
                    } while ($exists);

                    $this->olt->spliters()->create([
                        'name' => 'SPLITER ' . $code,
                        'code' => $code,
                        'outs' => $this->outs
                    ]);
                }
            } else {
                $this->olt->spliters()->create($validateData);
            }

            DB::commit();
            $this->olt->refresh();
            $this->dispatchBrowserEvent('toast', toastJson('OLT registrado correctamente'));
            $this->emitTo('admin.spliters.show-spliters', 'render');
            $this->resetValidation();
            $this->reset(['name', 'code', 'outs', 'open']);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar OLT', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }
}
