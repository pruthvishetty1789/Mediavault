<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    // A user can be a doctor

     protected $fillable = [
        'name',
        'email',
        'password',
        'role', // if you're storing user roles like 'doctor', 'patient', etc.
    ];
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    // A user can be a patient
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
}
