<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LabReport;
use App\Models\User;

class LabReportSeeder extends Seeder
{
    public function run(): void
    {
        LabReport::create([
            'patient_id' => User::where('email', 'patient@example.com')->first()->id,
            'title' => 'ECG Report',
            'file_path' => 'lab_reports/ecg_report.pdf'
        ]);
    }
}
