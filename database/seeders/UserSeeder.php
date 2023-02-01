<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Support Monkey',
            'email' => 'info@codingmonkeys.nl',
            'email_verified_at' => now(),
            'password' => Hash::make('bananas101'),
            'is_admin' => 1,
            'remember_token' => Str::random(10),
        ]);
    }
}
