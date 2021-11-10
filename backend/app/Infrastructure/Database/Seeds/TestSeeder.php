<?php

namespace Infrastructure\Database\Seeds;

use Domain\User\Entities\User;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();
    }
}
