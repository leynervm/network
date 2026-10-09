<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Livewire\Livewire;
use Tests\TestCase;

class UserRolePermissionTest extends TestCase
{
    public function test_admin_user_can_access_user_and_role_management()
    {
        $admin = User::where('email', 'admin@gmail.com')->first();
        if (!$admin) {
            $admin = User::first();
            $admin->assignRole('admin');
        }

        $response = $this->actingAs($admin)->get('/admin/users');
        $response->assertStatus(200);

        $response = $this->actingAs($admin)->get('/admin/roles');
        $response->assertStatus(200);

        $response = $this->actingAs($admin)->get('/admin/permissions');
        $response->assertStatus(200);
    }

    public function test_livewire_components_render_successfully()
    {
        $admin = User::where('email', 'admin@gmail.com')->first();
        if (!$admin) {
            $admin = User::first();
            $admin->assignRole('admin');
        }

        $this->actingAs($admin);

        Livewire::test(\App\Http\Livewire\Admin\Users\ShowUsers::class)
            ->assertStatus(200);

        Livewire::test(\App\Http\Livewire\Admin\Users\CreateUser::class)
            ->assertStatus(200);

        Livewire::test(\App\Http\Livewire\Admin\Roles\ShowRoles::class)
            ->assertStatus(200);

        Livewire::test(\App\Http\Livewire\Admin\Roles\CreateRole::class)
            ->assertStatus(200);

        Livewire::test(\App\Http\Livewire\Admin\Permissions\ShowPermissions::class)
            ->assertStatus(200);
    }

    public function test_permissions_are_properly_grouped_by_table()
    {
        $permissions = Permission::all();
        $this->assertNotEmpty($permissions);

        $grouped = $permissions->groupBy('table_name');
        $this->assertArrayHasKey('Usuarios', $grouped->toArray());
        $this->assertArrayHasKey('Roles', $grouped->toArray());
        $this->assertArrayHasKey('OLTs', $grouped->toArray());
        $this->assertArrayHasKey('Recibos', $grouped->toArray());
    }

    public function test_user_without_permissions_is_forbidden()
    {
        $guestUser = User::firstOrCreate(
            ['email' => 'testuser@network.com'],
            ['name' => 'Test Regular User', 'password' => bcrypt('password')]
        );
        $guestUser->syncRoles([]);

        $this->actingAs($guestUser)->get('/admin/users')->assertStatus(403);
        $this->actingAs($guestUser)->get('/admin/roles')->assertStatus(403);
        $this->actingAs($guestUser)->get('/admin/permissions')->assertStatus(403);
    }

    public function test_only_admin_tecnico_and_asistente_roles_exist_with_proper_permissions()
    {
        $roleNames = Role::pluck('name')->sort()->values()->toArray();
        $this->assertEquals(['admin', 'asistente', 'tecnico'], $roleNames);

        $adminRole = Role::where('name', 'admin')->first();
        $this->assertEquals(Permission::count(), $adminRole->permissions()->count());

        $tecnicoRole = Role::where('name', 'tecnico')->first();
        $this->assertGreaterThan(0, $tecnicoRole->permissions()->count());
        $this->assertTrue($tecnicoRole->hasPermissionTo('admin.olts.index'));
        $this->assertFalse($tecnicoRole->hasPermissionTo('admin.users.index'));

        $asistenteRole = Role::where('name', 'asistente')->first();
        $this->assertGreaterThan(0, $asistenteRole->permissions()->count());
        $this->assertTrue($asistenteRole->hasPermissionTo('admin.recibos.index'));
        $this->assertFalse($asistenteRole->hasPermissionTo('admin.users.index'));
    }

    public function test_admin_role_cannot_be_deleted_or_modified_in_livewire()
    {
        $admin = User::where('email', 'admin@gmail.com')->first();
        $adminRole = Role::where('name', 'admin')->first();

        // ShowRoles: Try editing admin role -> should be blocked
        Livewire::actingAs($admin)
            ->test(\App\Http\Livewire\Admin\Roles\ShowRoles::class)
            ->call('edit', $adminRole->id)
            ->assertSet('open_edit', false);

        // ShowUsers: Try removing admin role from admin user -> admin role must persist
        Livewire::actingAs($admin)
            ->test(\App\Http\Livewire\Admin\Users\ShowUsers::class)
            ->call('edit', $admin->id)
            ->set('selectedRoles', ['tecnico']) // attempt to remove admin role
            ->call('update');

        $this->assertTrue($admin->fresh()->hasRole('admin'));
    }

    public function test_admin_role_is_strictly_exclusive_to_admin_gmail_com()
    {
        $admin = User::where('email', 'admin@gmail.com')->first();
        $this->assertTrue($admin->hasRole('admin'));

        // Admin cannot lose admin role
        $admin->removeRole('admin');
        $this->assertTrue($admin->fresh()->hasRole('admin'));

        $otherUser = User::where('email', 'eliceo@gmail.com')->first();
        if (!$otherUser) {
            $otherUser = User::firstOrCreate(
                ['email' => 'other@network.com'],
                ['name' => 'Other User', 'password' => bcrypt('12345678')]
            );
        }

        // Other user cannot be assigned admin role
        $otherUser->assignRole('admin');
        $this->assertFalse($otherUser->fresh()->hasRole('admin'));

        $otherUser->syncRoles(['admin', 'asistente']);
        $this->assertFalse($otherUser->fresh()->hasRole('admin'));
        $this->assertTrue($otherUser->fresh()->hasRole('asistente'));
    }

    public function test_updating_user_roles_works_under_sanctum_guard()
    {
        \Illuminate\Support\Facades\Auth::shouldUse('sanctum');

        $admin = User::where('email', 'admin@gmail.com')->first();
        $eliceo = User::where('email', 'eliceo@gmail.com')->first();

        Livewire::actingAs($admin)
            ->test(\App\Http\Livewire\Admin\Users\ShowUsers::class)
            ->call('edit', $eliceo->id)
            ->set('selectedRoles', ['asistente'])
            ->call('update')
            ->assertHasNoErrors();

        $this->assertTrue($eliceo->fresh()->hasRole('asistente'));
    }
}
