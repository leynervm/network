<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\PermissionRegistrar;

class Role extends SpatieRole
{
    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'guard_name',
    ];

    protected static function booted()
    {
        static::deleting(function ($role) {
            if ($role->name === 'admin') {
                throw new \Exception('El rol admin está protegido por el sistema y no puede ser eliminado.');
            }
        });
    }

    /**
     * A role belongs to users.
     */
    public function users(): BelongsToMany
    {
        return $this->morphedByMany(
            User::class,
            'model',
            config('permission.table_names.model_has_roles'),
            app(PermissionRegistrar::class)->pivotRole,
            config('permission.column_names.model_morph_key')
        );
    }
}
