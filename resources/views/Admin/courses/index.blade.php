@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">




<div class="container mt-4">
    <h2>Courses List</h2>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-success mb-3">Add Course</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                
                <th>Course Sympol</th>
                <th>Name</th>
                <th>Course Unit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                
                <td>{{ $course->symbol }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->unit }}</td>
                
                <td>
                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
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
