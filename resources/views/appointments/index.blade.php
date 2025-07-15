@extends('layouts.app')

@section('content')
    <h3>Appointments</h3>
    <a href="{{ route('appointments.create') }}" class="btn btn-success mb-3">Add Appointment</a>

    <ul class="list-group">
        @foreach($appointments as $appointment)
            <li class="list-group-item">
                <strong>Doctor:</strong> {{ $appointment->doctor->user->name ?? 'N/A' }}<br>
                <strong>Patient:</strong> {{ $appointment->patient->user->name ?? 'N/A' }}<br>
                <strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('d M Y, h:i A') }}<br>
                <strong>Status:</strong> {{ ucfirst($appointment->status) }}<br>
                <strong>Notes:</strong> {{ $appointment->notes }}
                <div class="mt-2">
                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
