@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2>Enrollments List</h2>
    <a href="{{ route('admin.enrollments.create') }}" class="btn btn-success mb-3">Add Enrollment</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                
                <th>Student</th>
                <th>Course</th>
                <th>Professor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <git status
tbody>
            @foreach($enrollments as $enrollment)
            <tr>
                
                <td>{{ $enrollment->student?->name ?? 'N/A' }}</td>
                <td>{{ $enrollment->course?->name ?? 'N/A' }}</td>
                <td>{{ $enrollment->professor?->name ?? 'N/A' }}</td>
                
                <td>
                    <a href="{{ route('admin.enrollments.edit', $enrollment->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
