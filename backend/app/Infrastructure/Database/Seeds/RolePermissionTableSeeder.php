<?php

namespace Infrastructure\Database\Seeds;

use App\Domain\Role\Entities\Role;
use Domain\Permission\Entities\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::findByName('superadmin');
        $roleAdmin      = Role::findByName('admin');

        $permissions = Permission::all();

        $roleAdmin->syncPermissions($permissions);
        $roleSuperAdmin->syncPermissions($permissions);
    }
}
