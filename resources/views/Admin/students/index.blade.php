@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif


<div class="container mt-4">
    <h2>students List</h2>
    <a href="{{ route('admin.students.create') }}" class="btn btn-success mb-3">Add Student</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                
                <th>student ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
              
                
                <td>
                    <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-primary btn-sm">details</a>
                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display:inline;">
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
