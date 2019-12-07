<?php

use Carbon\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Factory(\App\User::class, 50)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
