@extends('layouts.app')

@section('content')

<h1>Create Student</h1>

@if ($errors->any())
    <div style="color:#b71c1c;margin-bottom:12px;">
        <strong>There were some problems with your input:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.students.store') }}" style="margin-bottom:20px;">
    @csrf

    <div style="margin-bottom:10px;">
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div style="margin-bottom:10px;">
        <label>Email (optional)</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div style="margin-bottom:10px;">
        <label>Student ID (optional)</label><br>
        <input type="text" name="student_id" value="{{ old('student_id') }}">
        <div style="font-size:12px;color:#666;">Leave empty to auto-generate an ID.</div>
    </div>

    <button type="submit">Save Student</button>
    <a href="{{ route('admin.students.index') }}" style="margin-left:8px;">⬅ Back to Students</a>
</form>

<h2>Recent Students</h2>

@if($students->count())
    <table style="width:100%;border-collapse:collapse;background:#fff;border-radius:6px;overflow:hidden;">
        <thead style="background:#f5f5f5;text-align:left;">
            <tr>
                <th style="padding:8px;border-bottom:1px solid #eee;">Name</th>
                <th style="padding:8px;border-bottom:1px solid #eee;">Email</th>
                <th style="padding:8px;border-bottom:1px solid #eee;">Student ID</th>
                <th style="padding:8px;border-bottom:1px solid #eee;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td style="padding:8px;border-bottom:1px solid #fafafa;">{{ $student->name }}</td>
                    <td style="padding:8px;border-bottom:1px solid #fafafa;">{{ $student->email }}</td>
                    <td style="padding:8px;border-bottom:1px solid #fafafa;">{{ $student->student_id ?? $student->stNo }}</td>
                    <td style="padding:8px;border-bottom:1px solid #fafafa;">
                        <a href="{{ route('admin.students.edit', $student) }}" style="margin-right:8px;">✏️ Edit</a>

                        <form action="{{ route('admin.students.destroy', $student) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">❌ Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top:12px">{{ $students->links() }}</div>
@else
    <div>No students yet.</div>
@endif

@endsection
