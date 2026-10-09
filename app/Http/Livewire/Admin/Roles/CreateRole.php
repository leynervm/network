<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateRole extends Component
{
    public $open = false;
    public $name = '';
    public $selectedPermissions = [];

    protected $rules = [
        'name' => 'required|string|min:3|max:100|unique:roles,name',
        'selectedPermissions' => 'nullable|array',
    ];

    protected $messages = [
        'name.required' => 'El nombre del rol es obligatorio.',
        'name.unique' => 'Ya existe un rol con este nombre.',
        'name.min' => 'El nombre debe tener al menos 3 caracteres.',
    ];

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['name', 'selectedPermissions']);
            $this->resetValidation();
        }
    }

    public function selectAll()
    {
        $this->selectedPermissions = Permission::pluck('name')->toArray();
    }

    public function unselectAll()
    {
        $this->selectedPermissions = [];
    }

    public function toggleTablePermissions($tableName)
    {
        $tablePerms = Permission::where('table_name', $tableName)->pluck('name')->toArray();
        $allPresent = count(array_intersect($tablePerms, $this->selectedPermissions)) === count($tablePerms);

        if ($allPresent) {
            // Remove them
            $this->selectedPermissions = array_values(array_diff($this->selectedPermissions, $tablePerms));
        } else {
            // Add them
            $this->selectedPermissions = array_values(array_unique(array_merge($this->selectedPermissions, $tablePerms)));
        }
    }

    public function save()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $role = Role::create([
                'name' => strtolower(trim($this->name)),
                'guard_name' => 'web',
            ]);

            if (!empty($this->selectedPermissions)) {
                $role->syncPermissions($this->selectedPermissions);
            }

            DB::commit();

            $this->dispatchBrowserEvent('toast', toastJson('Rol creado con éxito'));
            $this->emitTo('admin.roles.show-roles', 'render');
            $this->reset(['name', 'selectedPermissions', 'open']);
            $this->resetValidation();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatchBrowserEvent('alert', alertJson('Error al crear rol', $e->getMessage(), 'error'));
        }
    }

    public function render()
    {
        $permissionsByTable = Permission::orderBy('table_name')->orderBy('name')->get()->groupBy('table_name');
        return view('livewire.admin.roles.create-role', compact('permissionsByTable'));
    }
}
