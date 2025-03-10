<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'starmin',
            'email' => 'starlight@admin.com',
            'password' => Hash::make('starlight25'), // Password admin
            'role' => 'admin', // Role admin
        ]);
    }
}
