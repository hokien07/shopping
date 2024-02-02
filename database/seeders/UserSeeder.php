<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            "first_name" => 'Admin',
            "last_name" => 'Admin',
            "phone" => Str::random(10),
            "type" => 1,
            "email" => 'admin@example.com',
            "password" => Hash::make('password'),
        ]);
    }
}
