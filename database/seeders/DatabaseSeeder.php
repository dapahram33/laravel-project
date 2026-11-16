<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@perpus.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Buat Akun User / Pemakai
        User::create([
            'name' => 'Dhafa Pemakai',
            'email' => 'user@perpus.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}