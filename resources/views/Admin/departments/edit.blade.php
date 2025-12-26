@extends('layouts.app')

@section('content')

<h2>Edit Department</h2>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Department Name:</label><br>
    <input type="text" name="name" value="{{ old('name', $department->name) }}"><br><br>

    <label>Symbol:</label><br>
    <input type="text" name="symbol" value="{{ old('symbol', $department->symbol) }}"><br><br>

    <button type="submit">Update</button>
    <a href="{{ route('admin.departments.index') }}">Cancel</a>
</form>

@endsection
