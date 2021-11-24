<?php

namespace Infrastructure\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            array(
                'name' => 'superadmin',
                'guard_name' => 'web',
                'description' => json_encode([
                    "uz"=>"Super Administrator",
                    "ru"=>"Супер Администратор",
                    "en"=>"Super Administrator"
                ])

            ),
            array(
                'name' => 'admin',
                'guard_name' => 'web',
                'description' => json_encode([
                    "uz"=>"Administrator",
                    "ru"=>"дминистратор",
                    "en"=>"Administrator"
                ])

            ),
            array(
                'name' => 'editor',
                'guard_name' => 'web',
                'description' => json_encode([
                    "uz"=>"Taxrirlovchi",
                    "ru"=>"Редактор",
                    "en"=>"Editor"
                ])
            ),
            array(
                'name' => 'user',
                'guard_name' => 'web',
                'description' => json_encode([
                    "uz"=>"Foydalanuvchi",
                    "ru"=>"Ползавитель",
                    "en"=>"User"
                ])
            ),
        );
        DB::table('roles')->insert($roles);
    }
}
