<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\User;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::create([
            'user_id' => User::where('email', 'doctor@example.com')->first()->id,
            'specialization' => 'Cardiologist',
            'phone' => '9998887777',
            'clinic_address' => '123 Heartbeat Road, Bangalore'
        ]);
    }
}
