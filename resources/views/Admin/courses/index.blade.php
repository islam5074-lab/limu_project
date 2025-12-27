@extends('layouts.app')

@section('content')

<h1>Courses</h1>

<a href="{{ route('admin.courses.create') }}" class="add-btn">➕ Add Course</a>

@if($courses->count())
    <table style="width:100%;border-collapse:collapse;background:#fff;border-radius:6px;overflow:hidden;">
        <thead style="background:#f5f5f5;text-align:left;">
            <tr>
                <th style="padding:8px;border-bottom:1px solid #eee;">Name</th>
                <th style="padding:8px;border-bottom:1px solid #eee;">Symbol</th>
                <th style="padding:8px;border-bottom:1px solid #eee;">Unit</th>
                <th style="padding:8px;border-bottom:1px solid #eee;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td style="padding:8px;border-bottom:1px solid #fafafa;">{{ $course->name }}</td>
                <td style="padding:8px;border-bottom:1px solid #fafafa;">{{ $course->symbol }}</td>
                <td style="padding:8px;border-bottom:1px solid #fafafa;">{{ $course->unit }}</td>
                <td style="padding:8px;border-bottom:1px solid #fafafa;">
                    <a href="{{ route('admin.courses.edit', $course) }}" class="edit-btn">✏️ Edit</a>

                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">❌ Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div>No courses yet.</div>
@endif

@endsection
