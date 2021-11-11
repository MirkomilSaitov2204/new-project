<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Database\Seeds\PermissionTableSeeder;
use Infrastructure\Database\Seeds\TestSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionTableSeeder::class);

    }
}
