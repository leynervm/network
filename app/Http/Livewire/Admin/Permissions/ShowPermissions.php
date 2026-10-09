<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowPermissions extends Component
{
    public $search = '';
    public $selectedTable = '';
    public $open_create = false;

    // Fields for new permission
    public $name = '';
    public $table_name = '';
    public $description = '';

    protected $rules = [
        'name' => 'required|string|min:3|max:100|unique:permissions,name',
        'table_name' => 'required|string|min:2|max:50',
        'description' => 'required|string|min:3|max:150',
    ];

    protected $messages = [
        'name.required' => 'El identificador del permiso es obligatorio.',
        'name.unique' => 'Ya existe un permiso con este identificador.',
        'table_name.required' => 'El nombre de tabla/módulo es obligatorio.',
        'description.required' => 'La descripción es obligatoria.',
    ];

    public function updatingOpenCreate()
    {
        if ($this->open_create == false) {
            $this->reset(['name', 'table_name', 'description']);
            $this->resetValidation();
        }
    }

    public function savePermission()
    {
        $this->validate();

        try {
            $perm = Permission::create([
                'name' => strtolower(trim($this->name)),
                'table_name' => strtolower(trim($this->table_name)),
                'description' => trim($this->description),
                'guard_name' => 'web',
            ]);

            // Assign to admin role automatically
            $adminRole = Role::where('name', 'admin')->first();
            if ($adminRole) {
                $adminRole->givePermissionTo($perm);
            }

            $this->dispatchBrowserEvent('toast', toastJson('Permiso creado exitosamente'));
            $this->reset(['name', 'table_name', 'description', 'open_create']);
            $this->resetValidation();
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al crear permiso', $e->getMessage(), 'error'));
        }
    }

    public function render()
    {
        $tables = Permission::select('table_name')->distinct()->orderBy('table_name')->pluck('table_name');

        $query = Permission::with('roles')->orderBy('table_name')->orderBy('name');

        if (!empty($this->selectedTable)) {
            $query->where('table_name', $this->selectedTable);
        }

        if (!empty(trim($this->search))) {
            $search = trim($this->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('table_name', 'like', "%{$search}%");
            });
        }

        $permissionsGrouped = $query->get()->groupBy('table_name');
        $totalPermissions = Permission::count();

        return view('livewire.admin.permissions.show-permissions', compact('tables', 'permissionsGrouped', 'totalPermissions'));
    }
}
