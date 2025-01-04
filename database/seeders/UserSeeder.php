<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'zlhm378@gmail.com',
            'password' => Hash::make('123809'),
        ]);
        
        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
