@extends('layouts.app')

@section('content')

<h2>Add Professor</h2>

<form method="POST" action="/professors">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Department</label>
        <input type="text" name="department" class="form-control" required>
    </div>

    <button class="btn btn-success">Save</button>
</form>

@endsection
