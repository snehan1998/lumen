<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'role_id' => 1,
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'Doe',
            'role_id' => 2,
            'email' => 'doe@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
