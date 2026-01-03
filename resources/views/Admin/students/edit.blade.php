@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="max-w-lg mx-auto bg-white shadow p-6 rounded">
	<h2 class="text-xl font-bold mb-4">Edit Student</h2>

	<form action="{{ route('admin.students.update', $student->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="mb-4">
			<label class="block font-semibold mb-1">Student Name</label>
			<input type="text" name="name" value="{{ old('name', $student->name) }}" class="w-full border px-3 py-2 rounded" required>
		</div>

		<div class="mb-4">
			<label class="block font-semibold mb-1">Email</label>
			<input type="email" name="email" value="{{ old('email', $student->email) }}" class="w-full border px-3 py-2 rounded" required>
		</div>

		<div class="mb-4">
			<label class="block font-semibold mb-1">Student ID</label>
			<input type="text" name="student_id" value="{{ old('student_id', $student->stNo) }}" class="w-full border px-3 py-2 rounded" required>
		</div>

		<div class="flex gap-3">
			<button type="submit" class="btn btn-success">Update Student</button>
			<a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Cancel</a>
		</div>
	</form>
</div>

@endsection
