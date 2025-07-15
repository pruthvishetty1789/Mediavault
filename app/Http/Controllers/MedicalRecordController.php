<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $records = MedicalRecord::with(['doctor.user', 'patient.user'])->get();
        return view('records.index', compact('records'));
    }

    public function create()
    {
        $doctors = Doctor::with('user')->get();
        $patients = Patient::with('user')->get();
        return view('records.create', compact('doctors', 'patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        MedicalRecord::create($request->all());

        return redirect()->route('records.index')->with('success', 'Medical record added.');
    }

    public function show(MedicalRecord $record)
    {
        $record->load(['doctor.user', 'patient.user']);
        return view('records.show', compact('record'));
    }

    public function edit(MedicalRecord $record)
    {
        $doctors = Doctor::with('user')->get();
        $patients = Patient::with('user')->get();
        return view('records.edit', compact('record', 'doctors', 'patients'));
    }

    public function update(Request $request, MedicalRecord $record)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $record->update($request->all());

        return redirect()->route('records.index')->with('success', 'Medical record updated.');
    }

    public function destroy(MedicalRecord $record)
    {
        $record->delete();
        return redirect()->route('records.index')->with('success', 'Medical record deleted.');
    }
}
