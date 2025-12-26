@extends('layouts.app')

@section('content')

<h2>Edit Professor</h2>

<form method="POST" action="/professors/{{ $professor->id }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name"
               value="{{ $professor->name }}"
               class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email"
               value="{{ $professor->email }}"
               class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Department</label>
        <input type="text" name="department"
               value="{{ $professor->department }}"
               class="form-control" required>
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection
