@extends('layouts.app')

@section('content')

<h2>Departments List</h2>

<a href="{{ route('admin.departments.create') }}">Add New Department</a>

<table border="1" cellpadding="10" cellspacing="0" style="margin-top: 10px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Department Name</th>
            <th>Symbol</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->symbol }}</td>
                <td>
                    <a href="{{ route('admin.departments.edit', $department->id) }}">Edit</a>

                    <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
