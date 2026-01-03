@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<h2>Create Enrollment</h2>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('admin.enrollments.store') }}">
    @csrf

    <label>Student:</label>
    <select name="student_id" required>
        <option value="">-- Select Student --</option>
        @foreach($students as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>

    <label>Course:</label>
    <select name="course_id" required>
        <option value="">-- Select Course --</option>
        @foreach($courses as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>

    <label>Professor:</label>
    <select name="professor_id" required>
        <option value="">-- Select Professor --</option>
        @foreach($professors as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('admin.enrollments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
