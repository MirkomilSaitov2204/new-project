<?php

namespace Infrastructure\Database\Seeds;

use Domain\Permission\Entities\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Permission::firstOrCreate([
            'name' => 'users'
        ]);
        Permission::firstOrCreate([
            'parent_id' => $user->id,
            'name' => 'user_create'
        ]);

        Permission::firstOrCreate([
            'parent_id' => $user->id,
            'name' => 'user_update'
        ]);

        Permission::firstOrCreate([
            'parent_id' => $user->id,
            'name' => 'user_delete'
        ]);

        Permission::firstOrCreate([
            'parent_id' => $user->id,
            'name' => 'user_show'
        ]);
        //////////////////////////////////////////////////////////////////

        $permission = Permission::firstOrCreate([
            'name' => 'permissions'
        ]);

        Permission::firstOrCreate([
            'parent_id' => $permission->id,
            'name' => 'permission_create'
        ]);

        Permission::firstOrCreate([
            'parent_id' => $permission->id,
            'name' => 'permission_update'
        ]);

        Permission::firstOrCreate([
            'parent_id' => $permission->id,
            'name' => 'permission_delete'
        ]);
        //////////////////////////////////////////////////////////////////

        $role = Permission::firstOrCreate([
            'name' => 'roles'
        ]);

        Permission::firstOrCreate([
            'parent_id' => $role->id,
            'name' => 'role_create'
        ]);

        Permission::firstOrCreate([
            'parent_id' => $role->id,
            'name' => 'role_update'
        ]);

        Permission::firstOrCreate([
            'parent_id' => $role->id,
            'name' => 'role_delete'
        ]);

        Permission::firstOrCreate([
            'parent_id' => $role->id,
            'name' => 'role_show'
        ]);
    }
}
