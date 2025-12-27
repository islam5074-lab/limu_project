@extends('layouts.app')

@section('content')

{{-- رسالة النجاح --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1 class="mb-4">Professors List</h1>

<a href="{{ route('admin.professors.create') }}" class="btn btn-primary mb-3">Add New Professor</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($professors as $professor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $professor->name }}</td>
                <td>{{ $professor->email }}</td>
                <td>{{ $professor->department->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.professors.edit', $professor->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.professors.destroy', $professor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No professors found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection

