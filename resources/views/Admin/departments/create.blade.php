@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<h2>Create Department</h2>

<form action="{{ route('admin.departments.store') }}" method="POST">
    @csrf

    <label>Department Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}"><br><br>

    <label>Symbol:</label><br>
    <input type="text" name="symbol" value="{{ old('symbol') }}"><br><br>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
