<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'appointment_time',
        'status',
        'notes',
    ];

    // ✅ Relationship with Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // ✅ Relationship with Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
