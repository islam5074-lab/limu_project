@extends('layouts.app')

@section('content')

<h1>Add New Course</h1>

<form method="POST" action="/courses">
    @csrf

    <div style="margin-bottom:10px;">
        <label>Course Name</label><br>
        <input type="text" name="name" required>
    </div>

    <div style="margin-bottom:10px;">
        <label>Course Symbol</label><br>
        <input type="text" name="symbol" required>
    </div>

    <div style="margin-bottom:10px;">
        <label>Course Unit</label><br>
        <input type="number" name="unit" required>
    </div>

    <button type="submit">Save Course</button>
</form>

<br>

<a href="/courses">⬅ Back to Courses</a>

@endsection
