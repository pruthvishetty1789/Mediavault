<?php
namespace App\Http\Controllers;

use App\Models\LabReport;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LabReportController extends Controller
{
    public function index()
    {
        $labReports = LabReport::with('patient.user')->get();
        return view('labs.index', compact('labReports'));
    }

    public function create()
    {
        $patients = Patient::with('user')->get();
        return view('labs.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'report_type' => 'required|string',
            'file' => 'required|file|mimes:pdf,jpg,png',
            'notes' => 'nullable|string',
        ]);

        $path = $request->file('file')->store('lab_reports');

        LabReport::create([
            'patient_id' => $request->patient_id,
            'report_type' => $request->report_type,
            'file_path' => $path,
            'notes' => $request->notes,
        ]);

        return redirect()->route('labs.index')->with('success', 'Lab report uploaded successfully.');
    }

    public function show(LabReport $lab)
    {
        $lab->load('patient.user');
        return view('labs.show', compact('lab'));
    }

    public function edit(LabReport $lab)
    {
        $patients = Patient::with('user')->get();
        return view('labs.edit', compact('lab', 'patients'));
    }

    public function update(Request $request, LabReport $lab)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'report_type' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,jpg,png',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('file')) {
            Storage::delete($lab->file_path);
            $lab->file_path = $request->file('file')->store('lab_reports');
        }

        $lab->update([
            'patient_id' => $request->patient_id,
            'report_type' => $request->report_type,
            'file_path' => $lab->file_path,
            'notes' => $request->notes,
        ]);

        return redirect()->route('labs.index')->with('success', 'Lab report updated.');
    }

    public function destroy(LabReport $lab)
    {
        Storage::delete($lab->file_path);
        $lab->delete();

        return redirect()->route('labs.index')->with('success', 'Lab report deleted.');
    }
}
