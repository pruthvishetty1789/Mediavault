@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patients</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Add Patient</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($patients as $patient)
                <tr>
                    <td>{{ $patient->user->name ?? 'N/A' }}</td>
                    <td>{{ $patient->user->email ?? 'N/A' }}</td>
                    <td>{{ $patient->dob }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->phone }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No patients found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
