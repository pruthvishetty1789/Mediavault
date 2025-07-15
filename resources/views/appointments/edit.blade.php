@extends('layouts.app')

@section('content')
    <h3>Edit Appointment</h3>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf @method('PUT')

        <label>Doctor</label>
        <select name="doctor_id" class="form-control my-2">
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ $doctor->id == $appointment->doctor_id ? 'selected' : '' }}>
                    {{ $doctor->user->name }}
                </option>
            @endforeach
        </select>

        <label>Patient</label>
        <select name="patient_id" class="form-control my-2">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}" {{ $patient->id == $appointment->patient_id ? 'selected' : '' }}>
                    {{ $patient->user->name }}
                </option>
            @endforeach
        </select>

        <label>Appointment Time</label>
        <input type="datetime-local" name="appointment_time" class="form-control my-2"
               value="{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('Y-m-d\TH:i') }}">

        <label>Status</label>
        <select name="status" class="form-control my-2">
            @foreach(['confirmed', 'pending', 'cancelled'] as $status)
                <option value="{{ $status }}" {{ $appointment->status == $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>

        <label>Notes</label>
        <textarea name="notes" class="form-control my-2">{{ $appointment->notes }}</textarea>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
@endsection
