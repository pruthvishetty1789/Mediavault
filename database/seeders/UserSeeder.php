<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Doctors
        User::factory()->create([
            'name' => 'Dr. John Smith',
            'email' => 'doctor@example.com',
            'password' => Hash::make('password'),
        ]);

        // Patients
        User::factory()->create([
            'name' => 'Alice Johnson',
            'email' => 'patient@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
