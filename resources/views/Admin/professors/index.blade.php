@extends('layouts.app')

@section('title', 'Professors')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2>Professors List</h2>
    <a href="{{ route('admin.professors.create') }}" class="btn btn-success mb-3">Add Professor</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($professors as $professor)
            <tr>
                
                <td>{{ $professor->name }}</td>
                <td>{{ $professor->email }}</td>
                <td>{{ $professor->department->name ?? '' }}</td>
                <td>
                    <a href="{{ route('admin.professors.edit', $professor->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.professors.destroy', $professor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        </thead>
        
            @endforeach
        </tbody>
    </table>
</div>
@endsection
