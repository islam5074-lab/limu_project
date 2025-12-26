@extends('layouts.app')

@section('content')

<h2>Create Department</h2>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.departments.store') }}" method="POST">
    @csrf

    <label>Department Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}"><br><br>

    <label>Symbol:</label><br>
    <input type="text" name="symbol" value="{{ old('symbol') }}"><br><br>

    <button type="submit">Save</button>
    <a href="{{ route('admin.departments.index') }}">Cancel</a>
</form>

@endsection
