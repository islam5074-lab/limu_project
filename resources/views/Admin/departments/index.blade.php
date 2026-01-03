@extends('layouts.app')

@section('title', 'Departments')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2>Departments List</h2>
    <a href="{{ route('admin.departments.create') }}" class="btn btn-success mb-3">Add Department</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                
                <th>Department Name</th>
                <th>Symbol</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                
                <td>{{ $department->name }}</td>
                <td>{{ $department->symbol }}</td>
                <td>
                    <a href="{{ route('admin.departments.edit', $department->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        </thead>
        <tbody>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
