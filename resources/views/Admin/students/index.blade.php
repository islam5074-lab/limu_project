@extends('layouts.app')

@section('content')

<a href="{{ route('admin.students.create') }}"
   class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
   Add New Student
</a>

<table class="table-auto border-collapse border border-gray-300 w-full">
	<thead>
	<tr>
		<th class="border px-2 py-1">No.</th>
		<th class="border px-2 py-1">Name</th>
		<th class="border px-2 py-1">Email</th>
		<th class="border px-2 py-1">Student ID</th>
		<th class="border px-2 py-1">Actions</th>
	</tr>
	</thead>
	<tbody>
	@foreach($students as $student)
		<tr>
			<td class="border px-2 py-1">{{ $loop->iteration }}</td>
			<td class="border px-2 py-1">{{ $student->name }}</td>
			<td class="border px-2 py-1">{{ $student->email }}</td>
			<td class="border px-2 py-1">{{ $student->stNo }}</td>
			<td class="border px-2 py-1 space-x-1">

				<a href="{{ route('admin.students.show', $student->id) }}"
				   class="bg-blue-500 text-white px-2 py-1 rounded">
				   Details
				</a>

				<a href="{{ route('admin.students.edit', $student->id) }}"
				   class="bg-yellow-500 text-white px-2 py-1 rounded">
				   Edit
				</a>

				<form action="{{ route('admin.students.destroy', $student->id) }}"
					  method="POST"
					  class="inline-block">
					@csrf
					@method('DELETE')
					<button type="submit"
							class="bg-red-600 text-white px-2 py-1 rounded"
							onclick="return confirm('Are you sure?')">
						Delete
					</button>
				</form>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

@endsection
