<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRoles extends Component
{
    use WithPagination;

    protected $listeners = ['render'];

    public $search = '';
    public $role;
    public $role_name = '';
    public $selectedPermissions = [];

    public $open_edit = false;
    public $open_view = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit(Role $role)
    {
        if ($role->name === 'admin') {
            $this->dispatchBrowserEvent('alert', alertJson('Rol Protegido', 'El rol de Administrador cuenta con todos los permisos del sistema de forma permanente y no puede ser modificado.', 'info'));
            return;
        }

        $this->role = $role;
        $this->role_name = $role->name;
        $this->selectedPermissions = $role->permissions()->pluck('name')->toArray();
        $this->resetValidation();
        $this->open_edit = true;
    }

    public function view(Role $role)
    {
        $this->role = $role;
        $this->open_view = true;
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
            $this->selectedPermissions = array_values(array_diff($this->selectedPermissions, $tablePerms));
        } else {
            $this->selectedPermissions = array_values(array_unique(array_merge($this->selectedPermissions, $tablePerms)));
        }
    }

    public function update()
    {
        if ($this->role->name === 'admin') {
            $this->dispatchBrowserEvent('alert', alertJson('Acción no permitida', 'Los permisos y configuración del rol Administrador están protegidos y no pueden modificarse.', 'warning'));
            $this->open_edit = false;
            return;
        }

        $this->validate([
            'role_name' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('roles', 'name')->ignore($this->role->id),
            ],
        ], [
            'role_name.required' => 'El nombre del rol es obligatorio.',
            'role_name.unique' => 'Este nombre de rol ya está en uso.',
        ]);

        DB::beginTransaction();
        try {
            $this->role->update([
                'name' => strtolower(trim($this->role_name)),
            ]);

            $this->role->syncPermissions($this->selectedPermissions);

            DB::commit();

            $this->dispatchBrowserEvent('toast', toastJson('Rol y permisos actualizados correctamente'));
            $this->open_edit = false;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatchBrowserEvent('alert', alertJson('Error al actualizar rol', $e->getMessage(), 'error'));
        }
    }

    public function delete($id)
    {
        $roleToDelete = Role::find($id);

        if (!$roleToDelete) {
            $this->dispatchBrowserEvent('alert', alertJson('No encontrado', 'El rol seleccionado no existe.', 'error'));
            return;
        }

        if ($roleToDelete->name === 'admin') {
            $this->dispatchBrowserEvent('alert', alertJson('Acción denegada', 'El rol de Administrador principal no puede ser eliminado por seguridad del sistema.', 'error'));
            return;
        }

        try {
            // Desvincular de usuarios y permisos
            $roleToDelete->syncPermissions([]);
            $roleToDelete->delete();

            $this->dispatchBrowserEvent('toast', toastJson('Rol eliminado correctamente'));
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al eliminar', $e->getMessage(), 'error'));
        }
    }

    public function render()
    {
        $roles = Role::withCount(['permissions', 'users'])
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . trim($this->search) . '%');
            })
            ->orderBy('id', 'asc')
            ->paginate(10);

        $permissionsByTable = Permission::orderBy('table_name')->orderBy('name')->get()->groupBy('table_name');

        return view('livewire.admin.roles.show-roles', compact('roles', 'permissionsByTable'));
    }
}
