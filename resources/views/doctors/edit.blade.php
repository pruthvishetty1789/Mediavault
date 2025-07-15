@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Doctor</h2>
    <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $doctor->user->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $doctor->user->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="specialization" class="form-label">Specialization</label>
            <input type="text" name="specialization" value="{{ old('specialization', $doctor->specialization) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $doctor->phone) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Doctor</button>
    </form>
</div>
@endsection
