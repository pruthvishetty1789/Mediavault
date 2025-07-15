<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\LabReportController;

// -----------------------------
// 🔓 Public Routes (For Testing / Development Only)
// -----------------------------
Route::apiResource('doctors', DoctorController::class);
Route::apiResource('patients', PatientController::class);
Route::apiResource('appointments', AppointmentController::class);
Route::apiResource('records', MedicalRecordController::class);
Route::apiResource('labs', LabReportController::class);

// -----------------------------
// 🔐 Auth Routes (JWT)
// -----------------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// JWT-protected routes
// Uncomment below when you're ready for auth
/*
Route::middleware('auth:api')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('doctors', DoctorController::class);
    Route::apiResource('patients', PatientController::class);
    Route::apiResource('appointments', AppointmentController::class);
    Route::apiResource('records', MedicalRecordController::class);
    Route::apiResource('labs', LabReportController::class);
});
*/
