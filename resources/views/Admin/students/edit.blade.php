@extends('layouts.app')

@section('content')

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
			<button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update Student</button>
			<a href="{{ route('admin.students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
		</div>
	</form>
</div>

@endsection
