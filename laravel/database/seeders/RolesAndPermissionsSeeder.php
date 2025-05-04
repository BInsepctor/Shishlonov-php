<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = config('permissions.roles');
        foreach ($roles as $role){
            $role = Role::firstOrCreate(['name' => $role['name']]);

            foreach ($role['permissions'] as $permissionName) {
                $permission = Permission::firstOrCreate(['name' => $permissionName]);
                $role->givePermissionTo($permission);
            }
        }

        $user = User::first();
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
