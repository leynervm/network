<?php

namespace App\Http\Livewire\Admin\Spliters;

use App\Models\Boxnav;
use App\Models\Olt;
use App\Models\Oltport;
use App\Models\Portboxnav;
use App\Models\Spliter;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ShowSpliters extends Component
{

    public $olt, $spliter, $boxnav;
    public $open = false;
    public $openspliter = false;
    public $openedit = false;
    public $openport = false;

    public $name, $code, $outs;
    public $editname, $editcode, $editouts;
    public $allports = false;
    public $oldspliterouts;
    public $codeport;
    public $selectedPort;



    protected $listeners = ['render'];

    public function mount(Olt $olt)
    {
        $this->olt = $olt;
        $this->spliter = new Spliter();
        $this->boxnav = new Boxnav();
    }

    public function rules()
    {
        return [
            'spliter.name' => [
                'required', 'string', 'min:3',
                Rule::unique('spliters', 'name')->where('olt_id', $this->olt->id)->ignore($this->spliter->id)
            ],
            'spliter.outs' => [
                'required', 'integer', 'min:1',
                // 'gte:' . $this->oldspliterouts
            ],
        ];
    }

    public function render()
    {
        return view('livewire.admin.spliters.show-spliters');
    }


    public function addbooxnav(Spliter $spliter, $port = null)
    {
        $this->spliter = $spliter;
        $this->selectedPort = $port;
        $this->open = true;
    }

    public function saveboxnav()
    {
        if (!$this->allports) {
            $this->name = 'NAP ' . $this->code;
        }
        $validateData =  $this->validate([
            'name' => [
                'nullable', Rule::requiredIf(!$this->allports), 'string', 'min:3'
            ],
            'code' => [
                'nullable', Rule::requiredIf(!$this->allports), 'string', 'min:1'
            ],
            'outs' => [
                'required', 'integer', 'min:1'
            ],
        ]);

        DB::beginTransaction();
        try {
            if (count($this->spliter->boxnavs) >= $this->spliter->outs) {
                $this->dispatchBrowserEvent('alert', alertJson('LÍMITE DE SALIDAS  ALCANZADO !', 'Límite de puertos de CAJA NAP alcanzado.', 'info'));
                return false;
            }

            if ($this->allports) {
                for ($p = 1; $p <= $this->spliter->outs; $p++) {
                    $exists = $this->spliter->boxnavs()->where('splitter_port', $p)->exists();
                    if ($exists) {
                        continue;
                    }

                    $j = 1;
                    do {
                        $code = trim($this->spliter->code) . '-' . $p;
                        $existsCode = $this->spliter->boxnavs()->where('code', trim($code))->exists();
                        if ($existsCode) {
                            $code = trim($this->spliter->code) . '-' . $p . '-' . $j;
                            $existsCode = $this->spliter->boxnavs()->where('code', trim($code))->exists();
                        }
                        $j++;
                    } while ($existsCode);

                    $boxnav = $this->spliter->boxnavs()->create([
                        'name' => 'NAP ' . $code,
                        'code' => $code,
                        'outs' => $this->outs,
                        'splitter_port' => $p,
                    ]);

                    for ($k = 0; $k < $boxnav->outs; $k++) {
                        $boxnav->portboxnavs()->create([
                            'code' => 'PORT-' . ($k + 1),
                        ]);
                    }
                }
            } else {
                $portToUse = null;
                if ($this->selectedPort !== null && $this->selectedPort !== '') {
                    $portToUse = (int)$this->selectedPort + 1;
                } else {
                    for ($p = 1; $p <= $this->spliter->outs; $p++) {
                        if (!$this->spliter->boxnavs()->where('splitter_port', $p)->exists()) {
                            $portToUse = $p;
                            break;
                        }
                    }
                }

                if ($portToUse === null) {
                    $this->dispatchBrowserEvent('alert', alertJson('LÍMITE DE SALIDAS  ALCANZADO !', 'Límite de puertos de CAJA NAP alcanzado.', 'info'));
                    return false;
                }

                if ($this->spliter->boxnavs()->where('splitter_port', $portToUse)->exists()) {
                    $this->dispatchBrowserEvent('alert', alertJson('PUERTO OCUPADO !', 'El puerto seleccionado ya tiene una CAJA NAP vinculada.', 'info'));
                    return false;
                }

                $validateData['splitter_port'] = $portToUse;
                $boxnav = $this->spliter->boxnavs()->create($validateData);
                for ($i = 0; $i < $boxnav->outs; $i++) {
                    $boxnav->portboxnavs()->create([
                        'code' => 'PORT-' . ($i + 1),
                    ]);
                }
            }
            DB::commit();
            $this->resetValidation();
            $this->reset(['name', 'code', 'outs', 'open', 'selectedPort']);
            $this->olt->refresh();
            $this->dispatchBrowserEvent('toast', toastJson('CAJA NAP registrado correctamente'));
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al registrar CAJA NAP', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function editbox(Boxnav $boxnav)
    {
        $this->boxnav = $boxnav;
        $this->editcode = $boxnav->code;
        $this->editname = $boxnav->name;
        $this->editouts = $boxnav->outs;
        $this->resetValidation();
        $this->openedit = true;
    }

    public function updateboxnav()
    {

        $validateData =  $this->validate([
            'editname' => ['required', 'string', 'min:3'],
            'editcode' => ['required', 'string', 'min:1'],
            'editouts' => ['required', 'integer', 'min:1'],
        ]);

        DB::beginTransaction();
        try {
            if (count($this->boxnav->portboxnavs) > $this->boxnav->outs) {
                $this->dispatchBrowserEvent('alert', alertJson('LÍMITE DE SALIDAS  ALCANZADO !', 'Límite de puertos de CAJA NAP alcanzado.', 'info'));
                return false;
            }

            if ($this->editouts < count($this->boxnav->portboxnavs)) {
                $take = $this->boxnav->outs - $this->editouts;
                $this->boxnav->portboxnavs()->doesntHave('network')
                    ->orderBy('id', 'desc')->take($take)->delete();
            }

            $this->boxnav->name = $this->editname;
            $this->boxnav->code = $this->editcode;
            $this->boxnav->outs = $this->editouts;
            $this->boxnav->save();
            DB::commit();
            $this->reset(['editname', 'editcode', 'editouts', 'openedit']);
            $this->resetValidation();
            $this->olt->refresh();
            $this->dispatchBrowserEvent('toast', toastJson('CAJA NAP actualizado correctamente'));
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al actualizar CAJA NAP', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function delete(Spliter $spliter)
    {
        DB::beginTransaction();
        try {
            $spliter->delete();
            DB::commit();
            $this->dispatchBrowserEvent('toast', toastJson('Spliter eliminado correctamente'));
            $this->olt->refresh();
            $this->resetValidation();
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al eliminar spliter', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }


    public function deleteboxnav(Boxnav $boxnav)
    {
        DB::beginTransaction();
        try {
            $boxnav->delete();
            DB::commit();
            $this->dispatchBrowserEvent('toast', toastJson('Caja NAP eliminado correctamente'));
            $this->olt->refresh();
            $this->resetValidation();
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al eliminar caja NAP', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function editspliter(Spliter $spliter)
    {
        $this->spliter = $spliter;
        $this->oldspliterouts = $spliter->outs;
        $this->resetValidation();
        $this->openspliter = true;
    }

    public function updatespliter()
    {

        if (count($this->spliter->boxnavs) > $this->spliter->outs) {
            $this->dispatchBrowserEvent('alert', alertJson('LIMITE DE PUERTOS INFERIOR A LAS CAJAS NAV REGISTRADAS !', 'Cantidad de cajas nav registradas supera a la cantidad de salidas', 'info'));
            return false;
        }
        $this->validate();
        $this->spliter->save();
        $this->olt->refresh();
        $this->dispatchBrowserEvent('toast', toastJson('Spliter actualizado correctamente'));
        $this->resetValidation();
        $this->reset(['openspliter']);
    }

    public function openmodalport(Boxnav $boxnav)
    {
        $this->boxnav = $boxnav;
        $this->resetValidation(['codeport']);
        $this->reset(['codeport']);
        $this->openport = true;
    }

    public function saveport()
    {

        $this->codeport = trim($this->codeport);
        $this->validate([
            'codeport' => [
                'required', 'string', 'min:4', 'max:12',
                Rule::unique('portboxnavs', 'code')->where('boxnav_id', $this->boxnav->id)
            ]
        ]);

        DB::beginTransaction();
        try {
            $this->boxnav->portboxnavs()->create([
                'code' => $this->codeport
            ]);
            DB::commit();
            $this->olt->refresh();
            $this->dispatchBrowserEvent('toast', toastJson('Puerto CAJA NAP registrado correctamente'));
            $this->resetValidation();
            $this->reset(['codeport', 'openport']);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al eliminar caja NAP', $e->getMessage(), 'error'));
            DB::rollBack();
        }
    }

    public function deleteportbox(Portboxnav $portboxnav)
    {

        if ($portboxnav->network) {
            $this->dispatchBrowserEvent('alert', alertJson('PUERTO ESTA OCUPADO !', 'El puerto de la caja NAP está vinculado a un cliente', 'info'));
            return false;
        } else {
            $portboxnav->delete();
            $this->olt->refresh();
            $this->dispatchBrowserEvent('toast', toastJson('Eliminado correctamente'));
        }
    }
}
