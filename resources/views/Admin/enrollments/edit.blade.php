@extends('layouts.app')

@section('content')
<h2>Edit Enrollment</h2>

<form method="POST" action="{{ route('admin.enrollments.update', $enrollment->id) }}">
    @csrf
    @method('PUT')

    <label>Student:</label>
    <select name="student_id">
        @foreach($students as $id => $name)
            <option value="{{ $id }}" @if($id == $enrollment->student_id) selected @endif>{{ $name }}</option>
        @endforeach
    </select>

    <label>Course:</label>
    <select name="course_id">
        @foreach($courses as $id => $name)
            <option value="{{ $id }}" @if($id == $enrollment->course_id) selected @endif>{{ $name }}</option>
        @endforeach
    </select>

    <label>Professor:</label>
    <select name="professor_id">
        @foreach($professors as $id => $name)
            <option value="{{ $id }}" @if($id == $enrollment->professor_id) selected @endif>{{ $name }}</option>
        @endforeach
    </select>

    <label>Mark:</label>
    <input type="number" name="mark" step="0.01" value="{{ $enrollment->mark }}">

    <button type="submit">Update</button>
</form>
@endsection
