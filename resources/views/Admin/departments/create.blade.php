<x-layout title="Create Department">

<h2>Create Department</h2>

<form action="{{ route('admin.departments.store') }}" method="POST">
    @csrf

    <label>Department Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}"><br><br>

    <label>Symbol:</label><br>
    <input type="text" name="symbol" value="{{ old('symbol') }}"><br><br>

    <button type="submit">Save</button>
    <a href="{{ route('admin.departments.index') }}">Cancel</a>
</form>

</x-layout>
<x-layout title="Create Department">

<h2>Create Department</h2>

<form action="{{ route('admin.departments.store') }}" method="POST">
    @csrf

    <label>Department Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}"><br><br>

    <label>Symbol:</label><br>
    <input type="text" name="symbol" value="{{ old('symbol') }}"><br><br>

    <button type="submit">Save</button>
    <a href="{{ route('admin.departments.index') }}">Cancel</a>
</form>

</x-layout>
