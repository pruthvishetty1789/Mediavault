<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\User;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        Patient::create([
            'user_id' => User::where('email', 'patient@example.com')->first()->id,
            'dob' => '1995-08-15',
            'gender' => 'female',
            'address' => '456 Peace Street, Mysore',
            'phone' => '9876543210'
        ]);
    }
}
