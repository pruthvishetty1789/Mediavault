@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lab Reports</h2>
    <a href="{{ route('labs.create') }}" class="btn btn-primary mb-3">Upload Report</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Report Type</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($labReports as $lab)
                <tr>
                    <td>{{ $lab->patient?->user?->name ?? 'N/A' }}</td>
                    <td>{{ $lab->report_type }}</td>
                    <td><a href="{{ asset('storage/' . $lab->file_path) }}" target="_blank">View</a></td>
                    <td>
                        <a href="{{ route('labs.edit', $lab->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('labs.destroy', $lab->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this report?')">Delete</button>
                        </form>
                        <a href="{{ route('labs.show', $lab->id) }}" class="btn btn-sm btn-info">Details</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No lab reports found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
