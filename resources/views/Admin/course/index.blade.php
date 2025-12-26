<x-layout title="Courses">

<style>
    h1 {
        margin-bottom: 15px;
    }

    .add-btn {
        display: inline-block;
        margin-bottom: 20px;
        padding: 8px 15px;
        background: #2c3e50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }

    .course-card {
        background: #fff;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 6px;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
        max-width: 600px;
    }

    .course-row {
        display: flex;
        margin-bottom: 8px;
    }

    .course-row strong {
        width: 120px;
    }

    .actions a,
    .actions button {
        margin-right: 10px;
        padding: 5px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }

    .edit-btn {
        background: #3498db;
        color: white;
    }

    .delete-btn {
        background: #e74c3c;
        color: white;
    }
</style>

<h1>Courses</h1>

<a href="{{ route('admin.courses.create') }}" class="add-btn">➕ Add Course</a>

@foreach($courses as $course)
<div class="course-card">

    <div class="course-row">
        <strong>Name:</strong> {{ $course->name }}
    </div>

    <div class="course-row">
        <strong>Symbol:</strong> {{ $course->symbol }}
    </div>

    <div class="course-row">
        <strong>Unit:</strong> {{ $course->unit }}
    </div>

    <div class="actions">
        <a href="{{ route('admin.courses.edit', $course) }}" class="edit-btn">✏️ Edit</a>

        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('Are you sure?')">❌ Delete</button>
        </form>

    </div>
@endforeach

</x-layout>
