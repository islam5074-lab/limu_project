@extends('layouts.app')

@section('content')

<h1>Edit Course</h1>

<form method="POST" action="{{ route('admin.courses.update', $course) }}">
    @csrf
    @method('PUT')

    <div style="margin-bottom:10px;">
        <label>Course Name</label><br>
        <input type="text" name="name" value="{{ old('name', $course->name) }}" required>
    </div>

    <div style="margin-bottom:10px;">
        <label>Course Symbol</label><br>
        <input type="text" name="symbol" value="{{ old('symbol', $course->symbol) }}" required>
    </div>

    <div style="margin-bottom:10px;">
        <label>Course Unit</label><br>
        <input type="number" name="unit" value="{{ old('unit', $course->unit) }}" required>
    </div>

    <button type="submit">Update Course</button>
</form>

<br>

<a href="{{ route('admin.courses.index') }}">⬅ Back to Courses</a>

@endsection
