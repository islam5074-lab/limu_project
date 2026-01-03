@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<h2>Edit Enrollment</h2>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li style="color:red;">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.enrollments.store') }}">
    @csrf

    <label>Student:</label>
    <select name="student_id" required>
        <option value="">Select student</option>
        @foreach($students as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>

    <label>Course:</label>
    <select name="course_id" required>
        <option value="">Select course</option>
        @foreach($courses as $id => $title)
            <option value="{{ $id }}">{{ $title }}</option>
        @endforeach
    </select>

    <label>Professor:</label>
    <select name="professor_id" required>
        <option value="">Select professor</option>
        @foreach($professors as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>

    

    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.enrollments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
