@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lab Report Details</h2>
    <p><strong>Patient:</strong> {{ $labReport->patient->user->name }}</p>
    <p><strong>Title:</strong> {{ $labReport->title }}</p>
    <p><strong>Uploaded File:</strong> 
        <a href="{{ asset('storage/' . $labReport->file_path) }}" target="_blank">Download/View</a>
    </p>
</div>
@endsection
