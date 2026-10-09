<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Permisos agrupados por tabla / módulo en español
        $permissionsByTable = [
            'Usuarios' => [
                ['name' => 'admin.users.index', 'description' => 'Listar y buscar usuarios'],
                ['name' => 'admin.users.create', 'description' => 'Crear nuevos usuarios'],
                ['name' => 'admin.users.edit', 'description' => 'Editar usuarios y cambiar contraseñas'],
                ['name' => 'admin.users.delete', 'description' => 'Eliminar usuarios'],
            ],
            'Roles' => [
                ['name' => 'admin.roles.index', 'description' => 'Listar roles y permisos del sistema'],
                ['name' => 'admin.roles.create', 'description' => 'Crear nuevos roles'],
                ['name' => 'admin.roles.edit', 'description' => 'Editar roles y asignar permisos'],
                ['name' => 'admin.roles.delete', 'description' => 'Eliminar roles'],
            ],
            'OLTs' => [
                ['name' => 'admin.olts.index', 'description' => 'Listar OLTs'],
                ['name' => 'admin.olts.create', 'description' => 'Crear OLT'],
                ['name' => 'admin.olts.edit', 'description' => 'Editar OLT'],
                ['name' => 'admin.olts.delete', 'description' => 'Eliminar OLT'],
                ['name' => 'admin.olts.show', 'description' => 'Ver detalle y puertos OLT'],
            ],
            'Splitters' => [
                ['name' => 'admin.spliters.index', 'description' => 'Listar Splitters'],
                ['name' => 'admin.spliters.create', 'description' => 'Crear Splitters'],
                ['name' => 'admin.spliters.edit', 'description' => 'Editar Splitters'],
                ['name' => 'admin.spliters.delete', 'description' => 'Eliminar Splitters'],
            ],
            'Cajas NAP' => [
                ['name' => 'admin.boxnavs.index', 'description' => 'Listar Cajas NAP'],
                ['name' => 'admin.boxnavs.create', 'description' => 'Crear Cajas NAP'],
                ['name' => 'admin.boxnavs.edit', 'description' => 'Editar Cajas NAP'],
                ['name' => 'admin.boxnavs.delete', 'description' => 'Eliminar Cajas NAP'],
            ],
            'Puertos NAP' => [
                ['name' => 'admin.portboxnavs.index', 'description' => 'Ver puertos de Cajas NAP'],
                ['name' => 'admin.portboxnavs.edit', 'description' => 'Modificar estado de puertos'],
            ],
            'Antenas' => [
                ['name' => 'admin.antenas.index', 'description' => 'Listar Antenas'],
                ['name' => 'admin.antenas.create', 'description' => 'Crear Antenas'],
                ['name' => 'admin.antenas.edit', 'description' => 'Editar Antenas'],
                ['name' => 'admin.antenas.delete', 'description' => 'Eliminar Antenas'],
            ],
            'Clientes' => [
                ['name' => 'admin.clients.index', 'description' => 'Listar Clientes'],
                ['name' => 'admin.clients.create', 'description' => 'Registrar Clientes'],
                ['name' => 'admin.clients.edit', 'description' => 'Editar Clientes'],
                ['name' => 'admin.clients.delete', 'description' => 'Eliminar Clientes'],
            ],
            'Redes' => [
                ['name' => 'admin.networks.index', 'description' => 'Listar Conexiones de Red'],
                ['name' => 'admin.networks.create', 'description' => 'Crear Conexiones de Red'],
                ['name' => 'admin.networks.edit', 'description' => 'Editar Conexiones de Red'],
                ['name' => 'admin.networks.delete', 'description' => 'Eliminar Conexiones de Red'],
                ['name' => 'admin.networks.show', 'description' => 'Ver Detalle de Red / Recibos'],
            ],
            'Recibos' => [
                ['name' => 'admin.recibos.index', 'description' => 'Listar Recibos'],
                ['name' => 'admin.recibos.create', 'description' => 'Generar Recibos'],
                ['name' => 'admin.recibos.edit', 'description' => 'Editar Recibos'],
                ['name' => 'admin.recibos.delete', 'description' => 'Eliminar o anular Recibos'],
                ['name' => 'admin.recibos.print', 'description' => 'Imprimir Recibo PDF'],
            ],
            'Pagos' => [
                ['name' => 'admin.payments.index', 'description' => 'Listar Pagos'],
                ['name' => 'admin.payments.create', 'description' => 'Registrar Pagos'],
                ['name' => 'admin.payments.edit', 'description' => 'Editar Pagos'],
                ['name' => 'admin.payments.delete', 'description' => 'Eliminar Pagos'],
            ],
            'Productos' => [
                ['name' => 'admin.products.index', 'description' => 'Listar Productos'],
                ['name' => 'admin.products.create', 'description' => 'Crear Productos'],
                ['name' => 'admin.products.edit', 'description' => 'Editar Productos'],
                ['name' => 'admin.products.delete', 'description' => 'Eliminar Productos'],
            ],
            'Marcas' => [
                ['name' => 'admin.marcas.index', 'description' => 'Listar Marcas'],
                ['name' => 'admin.marcas.create', 'description' => 'Crear Marcas'],
                ['name' => 'admin.marcas.edit', 'description' => 'Editar Marcas'],
                ['name' => 'admin.marcas.delete', 'description' => 'Eliminar Marcas'],
            ],
            'Equipos' => [
                ['name' => 'admin.equipos.index', 'description' => 'Listar Equipos'],
                ['name' => 'admin.equipos.create', 'description' => 'Crear Equipos'],
                ['name' => 'admin.equipos.edit', 'description' => 'Editar Equipos'],
                ['name' => 'admin.equipos.delete', 'description' => 'Eliminar Equipos'],
            ],
            'Series de Pago' => [
                ['name' => 'admin.seriepagos.index', 'description' => 'Listar Series de Pago'],
                ['name' => 'admin.seriepagos.create', 'description' => 'Crear Series de Pago'],
                ['name' => 'admin.seriepagos.edit', 'description' => 'Editar Series de Pago'],
                ['name' => 'admin.seriepagos.delete', 'description' => 'Eliminar Series de Pago'],
            ],
            'Formas de Pago' => [
                ['name' => 'admin.formapays.index', 'description' => 'Listar Formas de Pago'],
                ['name' => 'admin.formapays.create', 'description' => 'Crear Formas de Pago'],
                ['name' => 'admin.formapays.edit', 'description' => 'Editar Formas de Pago'],
                ['name' => 'admin.formapays.delete', 'description' => 'Eliminar Formas de Pago'],
            ],
            'Reportes' => [
                ['name' => 'admin.reports.index', 'description' => 'Ver Reportes Generales del Sistema'],
            ],
            'Notificaciones Yape' => [
                ['name' => 'admin.yape.notifications', 'description' => 'Ver Webhook y Notificaciones Yape'],
                ['name' => 'admin.yape.delete', 'description' => 'Eliminar Notificaciones Yape'],
            ],
        ];

        $allPermissionInstances = [];

        foreach ($permissionsByTable as $table => $permissions) {
            foreach ($permissions as $item) {
                $permission = Permission::updateOrCreate(
                    [
                        'name' => $item['name'],
                        'guard_name' => 'web',
                    ],
                    [
                        'table_name' => $table,
                        'description' => $item['description'],
                    ]
                );
                $allPermissionInstances[] = $permission;
            }
        }

        // 1. Rol Super Admin (Acceso total a todos los módulos y permisos)
        $roleAdmin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $roleAdmin->syncPermissions(Permission::all());

        // 2. Rol Técnico (Módulos técnicos y de red: OLT, Splitters, Cajas NAP, Puertos NAP, Antenas, Clientes, Redes, Equipos, Marcas, Productos)
        $roleTecnico = Role::firstOrCreate(['name' => 'tecnico', 'guard_name' => 'web']);
        $tecnicoPermissions = Permission::whereIn('table_name', [
            'OLTs', 'Splitters', 'Cajas NAP', 'Puertos NAP', 'Antenas', 'Clientes', 'Redes', 'Equipos', 'Marcas', 'Productos'
        ])->get();
        $roleTecnico->syncPermissions($tecnicoPermissions);

        // 3. Rol Asistente (Módulos administrativos, cobranzas y atención: Clientes, Recibos, Pagos, Series de Pago, Formas de Pago, Reportes, Notificaciones Yape y consulta)
        $roleAsistente = Role::firstOrCreate(['name' => 'asistente', 'guard_name' => 'web']);
        $asistentePermissions = Permission::whereIn('table_name', [
            'Clientes', 'Recibos', 'Pagos', 'Series de Pago', 'Formas de Pago', 'Reportes', 'Notificaciones Yape'
        ])->orWhereIn('name', [
            'admin.networks.index', 'admin.networks.show', 'admin.products.index'
        ])->get();
        $roleAsistente->syncPermissions($asistentePermissions);

        // Eliminar roles obsoletos no contemplados (ej. cajero, supervisor) si existían
        $obsoleteRoles = Role::whereNotIn('name', ['admin', 'tecnico', 'asistente'])->get();
        foreach ($obsoleteRoles as $oldRole) {
            $oldRole->syncPermissions([]);
            $oldRole->delete();
        }

        // Asignar rol admin EXCLUSIVAMENTE al usuario admin@gmail.com
        $adminUser = User::where('email', 'admin@gmail.com')->first();
        if ($adminUser) {
            $adminUser->syncRoles(['admin']);
        }

        // Remover rol admin de cualquier otro usuario si lo tenía
        $otherUsers = User::where('email', '!=', 'admin@gmail.com')->get();
        foreach ($otherUsers as $user) {
            if ($user->hasRole('admin')) {
                $user->roles()->detach($roleAdmin->id);
            }
        }

        // Asignar rol técnico al usuario eliceo@gmail.com
        $eliceoUser = User::where('email', 'eliceo@gmail.com')->first();
        if ($eliceoUser && !$eliceoUser->hasRole('tecnico')) {
            $eliceoUser->assignRole('tecnico');
        }
    }
}
