<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'create',
            'read',
            'update',
            'delete',
            'view users',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);
        $guestRole = Role::create(['name' => 'guest']);

        // Assign permissions to admin role
        $adminRole->givePermissionTo($permissions); // Admin can do all actions

        // Assign permissions to editor role
        $editorPermissions = [
            'create',
            'read',
            'update',
            'delete',
        ];
        $editorRole->givePermissionTo($editorPermissions); // Editor can do all actions except view users

        // Assign read permission to guest role
        $guestRole->givePermissionTo('read'); // Guest can only read
    }
}
