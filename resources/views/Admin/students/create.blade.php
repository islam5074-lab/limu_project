@extends('layouts.app')

@section('content')
<h2>Create New Student</h2>

{{-- عرض الأخطاء --}}
@if ($errors->any())
    <div style="color: red; margin-bottom: 12px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li> {{-- يظهر "taken" لو موجود --}}
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.students.store') }}">
    @csrf

    <div style="margin-bottom: 12px;">
        <label for="student_id">Student ID:</label><br>
        <input type="text" id="student_id" name="student_id" value="{{ old('student_id') }}" required>
    </div>

    <div style="margin-bottom: 12px;">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <div style="margin-bottom: 12px;">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    </div>

    <button type="submit">Save</button>
</form>

<a href="{{ route('admin.students.index') }}" style="display:inline-block; margin-top:12px;">Back to Students</a>
@endsection
