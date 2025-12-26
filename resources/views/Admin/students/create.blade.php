@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow p-6 rounded">
<h2 class="text-xl font-bold mb-4">Create New Student</h2>

@if ($errors->any())
<div class="bg-red-100 p-3 mb-4">
<ul class="list-disc pl-5">
@foreach ($errors->all() as $error)
<li class="text-red-700">{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

</div>

<!-- Reformatted form: table layout -->
<div class="max-w-2xl mx-auto bg-white shadow p-6 rounded mt-6">
<h3 class="text-lg font-semibold mb-3">Add Student </h3>
<form action="{{ route('admin.students.store') }}" method="POST">
	@csrf
	<table class="w-full">
		<tr>
			<td class="py-2 px-2 w-1/3"><label for="name" class="font-semibold">Name</label></td>
			<td class="py-2 px-2"><input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border px-3 py-2 rounded" required></td>
		</tr>
		<tr>
			<td class="py-2 px-2"><label for="email" class="font-semibold">Email <span class="text-sm text-gray-500"></span></label></td>
			<td class="py-2 px-2"><input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full border px-3 py-2 rounded"></td>
		</tr>
		<tr>
			<td class="py-2 px-2"><label for="student_id" class="font-semibold">Student ID <span class="text-sm text-gray-500"></span></label></td>
			<td class="py-2 px-2"><input type="text" name="student_id" id="student_id" value="{{ old('student_id') }}" class="w-full border px-3 py-2 rounded"></td>
		</tr>
		<tr>
			<td></td>
			<td class="py-3 px-2">
				<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create Student</button>
				<a href="{{ route('admin.students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</a>
			</td>
		</tr>
	</table>
	
</form>
</div>


@endsection
