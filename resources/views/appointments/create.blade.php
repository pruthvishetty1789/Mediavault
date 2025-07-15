@extends('layouts.app')

@section('content')
    <h3>Create Appointment</h3>
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf

        <label>Doctor</label>
        <select name="doctor_id" class="form-control my-2">
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
            @endforeach
        </select>

        <label>Patient</label>
        <select name="patient_id" class="form-control my-2">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
            @endforeach
        </select>

        <label>Appointment Time</label>
        <input type="datetime-local" name="appointment_time" class="form-control my-2">

        <label>Status</label>
        <select name="status" class="form-control my-2">
            <option value="confirmed">Confirmed</option>
            <option value="pending">Pending</option>
            <option value="cancelled">Cancelled</option>
        </select>

        <label>Notes</label>
        <textarea name="notes" class="form-control my-2"></textarea>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
