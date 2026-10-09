<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;

    protected $listeners = ['render'];

    public $search = '';
    public $roleFilter = '';

    // Edit modal
    public $open_edit = false;
    public $user;
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $selectedRoles = [];

    // View permissions modal
    public $open_view = false;
    public $user_to_view;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingRoleFilter()
    {
        $this->resetPage();
    }

    public function edit(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
        $this->password_confirmation = '';
        $this->selectedRoles = $user->roles()->pluck('name')->toArray();
        $this->resetValidation();
        $this->open_edit = true;
    }

    public function view(User $user)
    {
        $this->user_to_view = $user;
        $this->open_view = true;
    }

    public function update()
    {
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user->id),
            ],
            'selectedRoles' => 'required|array|min:1',
        ];

        if (!empty($this->password)) {
            $rules['password'] = 'required|string|min:6|confirmed';
        }

        $this->validate($rules, [
            'name.required' => 'El nombre completo es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'selectedRoles.required' => 'Debe asignar al menos un rol.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ]);

        DB::beginTransaction();
        try {
            $data = [
                'name' => trim($this->name),
                'email' => strtolower(trim($this->email)),
            ];

            if (!empty($this->password)) {
                $data['password'] = Hash::make($this->password);
            }

            // Protección: Sólo admin@gmail.com puede tener el rol admin
            if ($this->user->email === 'admin@gmail.com') {
                if (!in_array('admin', $this->selectedRoles)) {
                    $this->selectedRoles[] = 'admin';
                }
            } else {
                // Ningún otro usuario puede tener o recibir el rol admin
                $this->selectedRoles = array_values(array_diff($this->selectedRoles, ['admin']));
                if (empty($this->selectedRoles)) {
                    $this->selectedRoles = ['tecnico'];
                }
            }

            $this->user->update($data);
            $this->user->syncRoles($this->selectedRoles);

            DB::commit();

            $this->dispatchBrowserEvent('toast', toastJson('Usuario actualizado correctamente'));
            $this->open_edit = false;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatchBrowserEvent('alert', alertJson('Error al actualizar', $e->getMessage(), 'error'));
        }
    }

    public function delete($id)
    {
        if ($id == auth()->id()) {
            $this->dispatchBrowserEvent('alert', alertJson('Acción no permitida', 'No puedes eliminar tu propia cuenta de usuario en sesión.', 'error'));
            return;
        }

        $userToDelete = User::find($id);
        if (!$userToDelete) {
            $this->dispatchBrowserEvent('alert', alertJson('No encontrado', 'El usuario seleccionado ya no existe.', 'error'));
            return;
        }

        if ($userToDelete->email === 'admin@gmail.com' || $userToDelete->hasRole('admin')) {
            $this->dispatchBrowserEvent('alert', alertJson('Acción no permitida', 'El usuario Administrador principal (admin@gmail.com) está protegido y no puede ser eliminado.', 'error'));
            return;
        }

        try {
            $userToDelete->syncRoles([]);
            $userToDelete->syncPermissions([]);
            $userToDelete->delete();

            $this->dispatchBrowserEvent('toast', toastJson('Usuario eliminado correctamente'));
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', alertJson('Error al eliminar', $e->getMessage(), 'error'));
        }
    }

    public function render()
    {
        $users = User::with('roles')
            ->when($this->search, function ($query) {
                $search = trim($this->search);
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->when($this->roleFilter, function ($query) {
                $query->whereHas('roles', function ($q) {
                    $q->where('name', $this->roleFilter);
                });
            })
            ->orderBy('id', 'asc')
            ->paginate(10);

        $allRoles = Role::orderBy('name')->get();

        return view('livewire.admin.users.show-users', compact('users', 'allRoles'));
    }
}
