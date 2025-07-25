<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('123'),
            'last_login_at' => now(),
        ]);
        // User::create([
        //     'username' => 'admin',
        //     'password' => '123',
        //     'last_login_at' => now(),
        // ]);
    }
}
