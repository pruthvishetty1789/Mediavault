@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Lab Report</h2>
    <form action="{{ route('labs.update', $labReport->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Patient</label>
            <select name="patient_id" class="form-control">
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $labReport->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $labReport->title }}">
        </div>
        <div class="mb-3">
            <label>Replace File (optional)</label>
            <input type="file" name="file_path" class="form-control">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
