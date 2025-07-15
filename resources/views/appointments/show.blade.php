@extends('layouts.app')

@section('content')
    <h3>Appointment Details</h3>

    <p><strong>Doctor:</strong> 
        {{ $appointment->doctor && $appointment->doctor->user ? $appointment->doctor->user->name : 'N/A' }}
    </p>

    <p><strong>Patient:</strong> 
        {{ $appointment->patient && $appointment->patient->user ? $appointment->patient->user->name : 'N/A' }}
    </p>

    <p><strong>Time:</strong> 
        {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('d M Y, h:i A') }}
    </p>

    <p><strong>Status:</strong> {{ ucfirst($appointment->status) }}</p>
    <p><strong>Notes:</strong> {{ $appointment->notes }}</p>

    <a href="{{ route('appointments.index') }}" class="btn btn-secondary mt-2">Back</a>
@endsection
