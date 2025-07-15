@extends('layouts.app')

@section('content')
    <h3>Doctor Details</h3>
    <p><strong>Name:</strong> Dr. {{ $doctor->user->name }}</p>
    <p><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
    <p><strong>Clinic Address:</strong> {{ $doctor->clinic_address }}</p>
    <p><strong>Phone:</strong> {{ $doctor->phone }}</p>
@endsection
