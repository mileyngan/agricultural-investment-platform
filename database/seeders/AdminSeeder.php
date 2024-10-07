<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        if (!User::where('email', 'admio@example.com')->exists()) {
            User::create([
                'name' => 'Default Admin',
                'email' => 'admio@example.com',
                'password' => Hash::make('securepassword'),
                'role' => 'admin',
            ]);
        }
    }
}