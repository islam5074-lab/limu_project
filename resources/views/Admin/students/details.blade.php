@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Student Details</h3>
    </div>

    <div class="card-body">
        <p><strong>ID:</strong> {{ $student->id }}</p>
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>

        <p>
            <strong>Department:</strong>
            {{ $student->department->name ?? 'N/A' }}
        </p>

        <p><strong>Created At:</strong> {{ $student->created_at }}</p>
    </div>

    <div class="card-footer">
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
            Back
        </a>
    </div>
</div>

@endsection
