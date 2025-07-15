@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Medical Record Details</h2>

    <p><strong>Patient:</strong> {{ $record->patient->user->name ?? 'N/A' }}</p>
    <p><strong>Doctor:</strong> {{ $record->doctor->user->name ?? 'N/A' }}</p>
    <p><strong>Diagnosis:</strong> {{ $record->diagnosis ?? 'N/A' }}</p>
    <p><strong>Treatment:</strong> {{ $record->treatment ?? 'N/A' }}</p>
</div>
@endsection
