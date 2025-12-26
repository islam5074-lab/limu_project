<x-layout title="Edit Department">

<h2>Edit Department</h2>

<form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Department Name:</label><br>
    <input type="text" name="name" value="{{ old('name', $department->name) }}"><br><br>

    <label>Symbol:</label><br>
    <input type="text" name="symbol" value="{{ old('symbol', $department->symbol) }}"><br><br>

    <button type="submit">Update</button>
    <a href="{{ route('admin.departments.index') }}">Cancel</a>
</form>

</x-layout>
