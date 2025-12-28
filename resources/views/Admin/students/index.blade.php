@extends('layouts.app')

@section('content')
<h2>Students</h2>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<a href="{{ route('admin.students.create') }}" style="margin-bottom: 12px; display:inline-block;">New Student</a>

<table border="1" cellpadding="10" style="width:100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>#</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @php $i = 1; @endphp
    @forelse($students as $student)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $student->student_id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <a href="{{ route('admin.students.show', $student->id) }}">Details</a> |
                <a href="{{ route('admin.students.edit', $student->id) }}">Edit</a> |
                <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this student?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:none;border:none;color:red;cursor:pointer;">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">No students found</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
