@extends('layouts.app')

@section('content')

<div class="card" style="padding: 20px; border:1px solid #ddd; border-radius:6px; max-width:500px; margin:auto;">
    <div class="card-header" style="margin-bottom:12px;">
        <h3>Student Details</h3>
    </div>

    <div class="card-body">
    
    <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Department:</strong> {{ $student->department->name ?? 'software engineerng' }}</p>
    <p><strong>Created At:</strong> {{ $student->created_at->format('Y-m-d H:i') }}</p>

    </div>

    <div class="card-footer" style="margin-top:12px;">
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary" style="padding:6px 12px; background:#ccc; border-radius:4px; text-decoration:none; color:#000;">
            Back
        </a>
    </div>
</div>

@endsection

