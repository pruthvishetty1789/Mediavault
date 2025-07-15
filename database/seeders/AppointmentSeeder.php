<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\User;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        Appointment::create([
            'doctor_id' => User::where('email', 'doctor@example.com')->first()->id,
            'patient_id' => User::where('email', 'patient@example.com')->first()->id,
            'appointment_time' => now()->addDays(2),
            'status' => 'confirmed',
            'notes' => 'Initial consultation for chest pain.'
        ]);
    }
}
