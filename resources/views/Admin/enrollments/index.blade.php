@extends('layouts.app')

@section('content')
<h2>Enrollments</h2>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<a href="{{ route('admin.enrollments.create') }}">New Enrollment</a>

<table border="1" cellpadding="10">
    <tr>
        <th>#</th>
        <th>Student</th>
        <th>Course</th>
        <th>Professor</th>
        <th>Mark</th>
        <th>Actions</th>
    </tr>

    @foreach($enrollments as $key => $enrollment)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $students[$enrollment->student_id] ?? 'N/A' }}</td>
        <td>{{ $courses[$enrollment->course_id] ?? 'N/A' }}</td>
        <td>{{ $professors[$enrollment->professor_id] ?? 'N/A' }}</td>
        <td>{{ $enrollment->mark  }}</td>
        <td>
            <a href="{{ route('admin.enrollments.edit', $enrollment->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
