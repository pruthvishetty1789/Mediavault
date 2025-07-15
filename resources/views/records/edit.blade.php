@extends('layouts.app')

@section('content')
    <h3>Create Medical Record</h3>

    <form action="{{ route('records.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Doctor</label>
            <select name="doctor_id" class="form-control" required>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Patient</label>
            <select name="patient_id" class="form-control" required>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Diagnosis</label>
            <input type="text" name="diagnosis" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Treatment</label>
            <input type="text" name="treatment" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Notes</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
@endsection
