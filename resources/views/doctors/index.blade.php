@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Doctors</h2>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Add Doctor</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr><th>Name</th><th>Specialization</th><th>Phone</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->user->name ?? 'N/A' }}</td>
<td>{{ $doctor->specialization }}</td>
<td>{{ $doctor->phone }}</td>

                    <td>
                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete doctor?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
