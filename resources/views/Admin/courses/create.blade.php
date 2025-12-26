<x-layout title="Add Course">

<h1>Add New Course</h1>

<form method="POST" action="{{ route('admin.courses.store') }}">
    @csrf

    <div style="margin-bottom:10px;">
        <label>Course Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div style="margin-bottom:10px;">
        <label>Course Symbol</label><br>
        <input type="text" name="symbol" value="{{ old('symbol') }}" required>
    </div>

    <div style="margin-bottom:10px;">
        <label>Course Unit</label><br>
        <input type="number" name="unit" value="{{ old('unit') }}" required>
    </div>

    <button type="submit">Save Course</button>
</form>

<br>

<a href="{{ route('admin.courses.index') }}">⬅ Back to Courses</a>

</x-layout>
