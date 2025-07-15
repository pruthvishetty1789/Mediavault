@extends('layouts.app')

@section('content')
    <h3>Patient Details</h3>
    <p><strong>Name:</strong> {{ $patient->user->name }}</p>
    <p><strong>DOB:</strong> {{ $patient->dob }}</p>
    <p><strong>Gender:</strong> {{ $patient->gender }}</p>
    <p><strong>Address:</strong> {{ $patient->address }}</p>
    <p><strong>Phone:</strong> {{ $patient->phone }}</p>
@endsection
