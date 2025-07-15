<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('user')->get();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'dob'      => 'required|date',
            'gender'   => 'required|string',
            'phone'    => 'required|string',
        ]);

        // Create user with role "patient"
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => 'patient',
        ]);

        // Create patient profile
        Patient::create([
            'user_id' => $user->id,
            'dob'     => $request->dob,
            'gender'  => $request->gender,
            'phone'   => $request->phone,
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name'   => 'required|string',
            'email'  => 'required|email|unique:users,email,' . $patient->user_id,
            'dob'    => 'required|date',
            'gender' => 'required|string',
            'phone'  => 'required|string',
        ]);

        // Update associated user details
        $patient->user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        // Update patient details
        $patient->update([
            'dob'    => $request->dob,
            'gender' => $request->gender,
            'phone'  => $request->phone,
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
