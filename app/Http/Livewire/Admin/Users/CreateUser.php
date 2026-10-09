<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $open = false;

    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $selectedRoles = [];

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'selectedRoles' => 'required|array|min:1',
    ];

    protected $messages = [
        'name.required' => 'El nombre completo es obligatorio.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'Ingrese un correo electrónico válido.',
        'email.unique' => 'Este correo electrónico ya está registrado.',
        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe contener al menos 6 caracteres.',
        'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        'selectedRoles.required' => 'Debe seleccionar al menos un rol para el usuario.',
        'selectedRoles.min' => 'Debe seleccionar al menos un rol para el usuario.',
    ];

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['name', 'email', 'password', 'password_confirmation', 'selectedRoles']);
            $this->resetValidation();
        }
    }

    public function save()
    {
        $this->validate();

        // El rol admin es exclusivo de admin@gmail.com y no puede ser asignado a nuevos usuarios
        $validRoles = array_values(array_diff($this->selectedRoles, ['admin']));
        if (empty($validRoles)) {
            $this->addError('selectedRoles', 'Debe seleccionar al menos un rol válido.');
            return;
        }

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => trim($this->name),
                'email' => strtolower(trim($this->email)),
                'password' => Hash::make($this->password),
            ]);

            $user->syncRoles($validRoles);

            DB::commit();

            $this->dispatchBrowserEvent('toast', toastJson('Usuario registrado correctamente'));
            $this->emitTo('admin.users.show-users', 'render');
            $this->reset(['name', 'email', 'password', 'password_confirmation', 'selectedRoles', 'open']);
            $this->resetValidation();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatchBrowserEvent('alert', alertJson('Error al crear usuario', $e->getMessage(), 'error'));
        }
    }

    public function render()
    {
        // El rol admin está reservado exclusivamente y no aparece para nuevos usuarios
        $roles = Role::where('name', '!=', 'admin')->orderBy('name')->get();
        return view('livewire.admin.users.create-user', compact('roles'));
    }
}
