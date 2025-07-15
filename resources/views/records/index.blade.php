@extends('layouts.app')

@section('content')
    <h3>All Medical Records</h3>
    <a href="{{ route('records.create') }}" class="btn btn-primary mb-3">Add Record</a>

    <table class="table">
        <thead>
            <tr>
                <th>Doctor</th>
                <th>Patient</th>
                <th>Diagnosis</th>
                <th>Treatment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->doctor->user->name ?? 'N/A' }}</td>
                    <td>{{ $record->patient->user->name ?? 'N/A' }}</td>
                    <td>{{ $record->diagnosis }}</td>
                    <td>{{ $record->treatment }}</td>
                    <td>
                        <a href="{{ route('records.show', $record) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('records.edit', $record) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('records.destroy', $record) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this record?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
