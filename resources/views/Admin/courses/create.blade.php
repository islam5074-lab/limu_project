@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<h1>Add New Course</h1>

<form method="POST" action="{{ route('admin.courses.store') }}">
    @csrf

    <div style="margin-bottom:10px;">
        <label>Course Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div style="margin-bottom:10px;">
        <label>Course Symbol</label><br>
        <input type="text" name="symbol" value="{{ old('symbol') }}" required>
    </div>

    <div style="margin-bottom:10px;">
        <label>Course Unit</label><br>
        <input type="number" name="unit" value="{{ old('unit') }}" required>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancel</a>
</form>




@endsection
