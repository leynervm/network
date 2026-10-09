<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles {
        assignRole as traitAssignRole;
        syncRoles as traitSyncRoles;
        removeRole as traitRemoveRole;
    }

    protected $guard_name = 'web';

    public function guardName(): string
    {
        return 'web';
    }

    /**
     * Override assignRole so only admin@gmail.com can receive the 'admin' role.
     */
    public function assignRole(...$roles)
    {
        if ($this->email !== 'admin@gmail.com') {
            $roles = collect($roles)->flatten()->filter(function ($role) {
                $name = is_string($role) ? $role : ($role->name ?? '');
                return $name !== 'admin';
            })->all();
        }

        return $this->traitAssignRole(...$roles);
    }

    /**
     * Override syncRoles so only admin@gmail.com can have 'admin', and admin@gmail.com never loses it.
     */
    public function syncRoles(...$roles)
    {
        if ($this->email !== 'admin@gmail.com') {
            $roles = collect($roles)->flatten()->filter(function ($role) {
                $name = is_string($role) ? $role : ($role->name ?? '');
                return $name !== 'admin';
            })->all();
        } else {
            $roleNames = collect($roles)->flatten()->map(function ($r) {
                return is_string($r) ? $r : ($r->name ?? '');
            })->all();

            if (!in_array('admin', $roleNames)) {
                $roles[] = 'admin';
            }
        }

        return $this->traitSyncRoles(...$roles);
    }

    /**
     * Override removeRole so admin@gmail.com can never have 'admin' removed.
     */
    public function removeRole($role)
    {
        $name = is_string($role) ? $role : ($role->name ?? '');
        if ($this->email === 'admin@gmail.com' && $name === 'admin') {
            return $this;
        }

        return $this->traitRemoveRole($role);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function accesos()
    {
        return $this->hasMany(Acceso::class);
    }

    public function networks()
    {
        return $this->hasMany(Network::class);
    }

    protected static function booted()
    {
        static::deleting(function ($user) {
            if ($user->email === 'admin@gmail.com' || $user->hasRole('admin')) {
                throw new \Exception('El usuario administrador principal (admin@gmail.com) está protegido por el sistema y no puede ser eliminado.');
            }
        });
    }
}
