<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\LabReportController;



Route::get('/', function () {
    return view('welcome');
});

// Resource routes for Blade UI
Route::resource('appointments', AppointmentController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('patients', PatientController::class);
Route::resource('records', MedicalRecordController::class);
Route::resource('labs', LabReportController::class);
