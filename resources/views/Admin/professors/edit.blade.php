<x-layout title="Edit Professor">

<form method="POST" action="{{ route('admin.professors.update', $professor) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $professor->name) }}" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $professor->email) }}" required>
    </div>

    <div class="mb-3">
        <label>Department</label>
        <select name="depId" class="form-control" required>
            <option value="">Select department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ old('depId', $professor->depId) == $department->id ? 'selected' : '' }}>{{ $department->name ?? $department->symbol ?? 'Department '.$department->id }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Password (leave blank to keep current)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button class="btn btn-success">Update</button>
</form>

</x-layout>
