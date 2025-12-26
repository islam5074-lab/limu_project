<x-layout title="Add Professor">

<form method="POST" action="{{ route('admin.professors.store') }}">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label>Department</label>
        <select name="depId" class="form-control" required>
            <option value="">Select department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ old('depId') == $department->id ? 'selected' : '' }}>{{ $department->name ?? $department->symbol ?? 'Department '.$department->id }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-success">Save</button>
</form>

</x-layout>
