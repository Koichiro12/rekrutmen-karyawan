<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generating User Level Administrator and User Here
        User::factory()->create([
            'email' => 'admin@admin.com',
            'role' => 'Admin',
            'username' => 'admin',
            'name' => 'Administrator',
            'password' => Hash::make('admin')
        ]); 
    }
}
