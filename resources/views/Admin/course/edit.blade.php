<x-layout title="Edit Course">

<style>
    .edit-card { max-width: 500px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    .edit-card label { font-weight: bold; }
    .edit-card input { width: 100%; padding: 8px; margin: 5px 0 15px; }
    .edit-card button { background: #2c3e50; color: white; border: none; padding: 8px 20px; border-radius: 4px; }
</style>

<div class="edit-card">
    <h2>Edit Course</h2>

    <form method="POST" action="{{ route('admin.courses.update', $course) }}">
        @csrf
        @method('PUT')
        
        <label>Course Name</label>
        <input type="text" name="name" value="{{ old('name', $course->name) }}" required>

        <label>Course Symbol</label>
        <input type="text" name="symbol" value="{{ old('symbol', $course->symbol) }}" required>

        <label>Course Unit</label>
        <input type="number" name="unit" value="{{ old('unit', $course->unit) }}" required>

        <button type="submit">Update Course</button>
    </form>

    <br>
    <a href="{{ route('admin.courses.index') }}">⬅ Back to Courses</a>
</div>

</x-layout>
<x-layout title="Edit Course">

<style>
    .edit-card {
        max-width: 500px;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .edit-card label {
        font-weight: bold;
    }

    .edit-card input {
        width: 100%;
        padding: 8px;
        margin: 5px 0 15px;
    }

    .edit-card button {
        background: #2c3e50;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 4px;
    }
</style>

<div class="edit-card">
    <h2>Edit Course</h2>

    <!-- IMPORTANT: action فيه ID -->
    <form method="POST" action="{{ route('admin.courses.update', $course) }}">
        @csrf
        @method('PUT')
        
        <label>Course Name</label>
        <input type="text" name="name" value="{{ old('name', $course->name) }}" required>

        <label>Course Symbol</label>
        <input type="text" name="symbol" value="{{ old('symbol', $course->symbol) }}" required>

        <label>Course Unit</label>
        <input type="number" name="unit" value="{{ old('unit', $course->unit) }}" required>

        <button type="submit">Update Course</button>
    </form>
    <br>
    <a href="{{ route('admin.courses.index') }}">⬅ Back to Courses</a>
</div>

</x-layout>
