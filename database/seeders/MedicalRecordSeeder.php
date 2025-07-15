<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalRecord;
use App\Models\User;

class MedicalRecordSeeder extends Seeder
{
    public function run(): void
    {
        MedicalRecord::create([
            'doctor_id' => User::where('email', 'doctor@example.com')->first()->id,
            'patient_id' => User::where('email', 'patient@example.com')->first()->id,
            'diagnosis' => 'Mild Hypertension',
            'prescription' => 'Take 1 tablet of Amlodipine daily',
            'notes' => 'Monitor BP for next 2 weeks'
        ]);
    }
}
