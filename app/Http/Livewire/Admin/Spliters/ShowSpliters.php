<?php

namespace App\Http\Livewire\Admin\Spliters;

use App\Models\Boxnav;
use App\Models\Olt;
use App\Models\OltPort;
use App\Models\SpliterPort;
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

    // Unified port details edit properties
    public $openEditPortModal = false;
    public $portType; // 'olt', 'spliter', 'boxnav'
    public $editingId; // OltPort/SpliterPort/Portboxnav record ID, or parent ID
    public $editingNumber; // Port number (for olt/spliter)
    public $editingAlias;
    public $editingDireccion;

    public $ponIdx = null;
    public $fiberIdx = null;

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
            'spliter.direccion' => [
                'nullable', 'string', 'max:255'
            ],
            'spliter.outs' => [
                'required', 'integer', 'min:1',
                // 'gte:' . $this->oldspliterouts
            ],
        ];
    }

    public function render()
    {
        $olt = Olt::with([
            'ports',
            'spliters'
        ])->findOrFail($this->olt->id);

        if ($this->ponIdx !== null && isset($olt->spliters[(int)$this->ponIdx])) {
            $selectedSpliter = $olt->spliters[(int)$this->ponIdx];
            $selectedSpliter->load([
                'ports',
                'boxnavs'
            ]);

            if ($this->fiberIdx !== null) {
                $selectedBoxnav = $selectedSpliter->boxnavs->firstWhere('splitter_port', (int)$this->fiberIdx + 1);
                if ($selectedBoxnav) {
                    $selectedBoxnav->load([
                        'portboxnavs.network.client'
                    ]);
                }
            }
        }

        return view('livewire.admin.spliters.show-spliters', compact('olt'));
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

                    // Sync to SpliterPort alias
                    SpliterPort::updateOrCreate(
                        [
                            'spliter_id' => $this->spliter->id,
                            'port_number' => $p,
                        ],
                        [
                            'alias' => $boxnav->name,
                            'direccion' => $boxnav->direccion,
                        ]
                    );

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

                // Sync to SpliterPort alias
                SpliterPort::updateOrCreate(
                    [
                        'spliter_id' => $this->spliter->id,
                        'port_number' => $portToUse,
                    ],
                    [
                        'alias' => $boxnav->name,
                        'direccion' => $boxnav->direccion,
                    ]
                );

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

            // Sync to SpliterPort alias
            if ($this->boxnav->spliter_id && $this->boxnav->splitter_port) {
                SpliterPort::updateOrCreate(
                    [
                        'spliter_id' => $this->boxnav->spliter_id,
                        'port_number' => $this->boxnav->splitter_port,
                    ],
                    [
                        'alias' => $this->boxnav->name,
                        'direccion' => $this->boxnav->direccion,
                    ]
                );
            }
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
            $spliters = Spliter::where('olt_id', $this->olt->id)->get();
            $index = $spliters->pluck('id')->search($spliter->id);
            if ($index !== false) {
                $portNumber = $index + 1;
                OltPort::where([
                    'olt_id' => $this->olt->id,
                    'port_number' => $portNumber,
                ])->delete();
            }

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
            // Delete corresponding SpliterPort alias if exists
            if ($boxnav->spliter_id && $boxnav->splitter_port) {
                SpliterPort::where([
                    'spliter_id' => $boxnav->spliter_id,
                    'port_number' => $boxnav->splitter_port,
                ])->delete();
            }

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
        $spliters = Spliter::where('olt_id', $this->olt->id)->get();
        $index = $spliters->pluck('id')->search($spliter->id);
        if ($index !== false) {
            $portNumber = $index + 1;
            $oltPort = OltPort::where('olt_id', $this->olt->id)->where('port_number', $portNumber)->first();
            if ($oltPort) {
                if ($oltPort->alias && (!$spliter->name || str_starts_with(strtoupper($spliter->name), 'SPLITER'))) {
                    $spliter->name = $oltPort->alias;
                }
                if ($oltPort->direccion && !$spliter->direccion) {
                    $spliter->direccion = $oltPort->direccion;
                }
            }
        }

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

        DB::beginTransaction();
        try {
            $this->spliter->save();

            // Sync to OLT port alias
            $spliters = Spliter::where('olt_id', $this->olt->id)->get();
            $index = $spliters->pluck('id')->search($this->spliter->id);
            if ($index !== false) {
                $portNumber = $index + 1;
                OltPort::updateOrCreate(
                    [
                        'olt_id' => $this->olt->id,
                        'port_number' => $portNumber,
                    ],
                    [
                        'alias' => $this->spliter->name,
                        'direccion' => $this->spliter->direccion,
                    ]
                );
            }
            DB::commit();

            $this->olt->refresh();

            // Dispatch event to update OLT ports display reactively
            $ports = OltPort::where('olt_id', $this->olt->id)->get();
            $this->dispatchBrowserEvent('olt-ports-updated', $ports->keyBy('port_number')->map(fn($p) => ['alias' => $p->alias, 'direccion' => $p->direccion])->toArray());

            $this->dispatchBrowserEvent('toast', toastJson('Spliter actualizado correctamente'));
            $this->resetValidation();
            $this->reset(['openspliter']);
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatchBrowserEvent('alert', alertJson('Error al actualizar Spliter', $e->getMessage(), 'error'));
        }
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



    public function editPortboxnav($portboxnavId)
    {
        $this->portType = 'boxnav';
        $this->editingId = $portboxnavId;
        $this->editingNumber = null;

        $portboxnav = Portboxnav::findOrFail($portboxnavId);
        $this->editingAlias = $portboxnav->alias;
        $this->editingDireccion = $portboxnav->direccion;

        $this->resetValidation();
        $this->openEditPortModal = true;
    }

    public function savePortDetails()
    {
        $this->validate([
            'editingAlias' => 'nullable|string|max:255',
            'editingDireccion' => 'nullable|string|max:65535',
        ]);

        if ($this->portType === 'spliter') {
            SpliterPort::updateOrCreate(
                [
                    'spliter_id' => $this->editingId,
                    'port_number' => $this->editingNumber,
                ],
                [
                    'alias' => $this->editingAlias,
                    'direccion' => $this->editingDireccion,
                ]
            );
            $this->dispatchBrowserEvent('toast', toastJson('Detalles de hilo de Splitter guardados'));
        } elseif ($this->portType === 'boxnav') {
            $portboxnav = Portboxnav::findOrFail($this->editingId);
            $portboxnav->update([
                'alias' => $this->editingAlias,
                'direccion' => $this->editingDireccion,
            ]);
            
            // Sync to SpliterPort if the port is linked to a SpliterPort
            if ($portboxnav->boxnav->spliter_id && $portboxnav->boxnav->splitter_port) {
                SpliterPort::updateOrCreate(
                    [
                        'spliter_id' => $portboxnav->boxnav->spliter_id,
                        'port_number' => $portboxnav->boxnav->splitter_port,
                    ],
                    [
                        'alias' => $this->editingAlias,
                        'direccion' => $this->editingDireccion,
                    ]
                );
            }
            $this->dispatchBrowserEvent('toast', toastJson('Detalles de puerto de Caja NAP guardados'));
        }

        $this->openEditPortModal = false;
        $this->olt->refresh();
    }
}
