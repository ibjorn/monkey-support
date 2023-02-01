<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Response;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserSeeder::class);

        User::factory(250)
            ->hasTickets(3)
            ->create();

        User::factory(50)
        ->hasTickets(11)
        ->create();

        Response::factory(400)
            ->create();
    }
}
