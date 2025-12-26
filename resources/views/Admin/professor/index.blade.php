@extends('layouts.app')

@section('content')

<h1>Professors</h1>

<a href="/professors/create" class="btn btn-primary mb-3">➕ Add Professor</a>

@foreach($professors as $professor)
<div class="card mb-3 p-3">
    <p><strong>Name:</strong> {{ $professor->name }}</p>
    <p><strong>Email:</strong> {{ $professor->email }}</p>
    <p><strong>Department:</strong> {{ $professor->department }}</p>

    <a href="/professors/{{ $professor->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

    <form action="/professors/{{ $professor->id }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm"
            onclick="return confirm('Delete this professor?')">
            Delete
        </button>
    </form>
</div>
@endforeach

@endsection
