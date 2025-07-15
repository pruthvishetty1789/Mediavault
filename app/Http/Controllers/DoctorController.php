<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')->get();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|min:6',
            'specialization' => 'required|string',
            'phone'          => 'required|string',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => 'doctor',
        ]);

        Doctor::create([
            'user_id'       => $user->id,
            'specialization'=> $request->specialization,
            'phone'         => $request->phone,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }

    public function edit(Doctor $doctor)
    {
        // Now includes doctor->user->name & email editable
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name'           => 'required|string',
            'email'          => 'required|email|unique:users,email,' . $doctor->user_id,
            'specialization' => 'required|string',
            'phone'          => 'required|string',
        ]);

        // Update the associated user (name & email)
        $doctor->user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        // Update the doctor details
        $doctor->update([
            'specialization' => $request->specialization,
            'phone'          => $request->phone,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
