<x-layout title="Students">

<a href="{{ route('admin.students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add New Student</a>

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
<td class="border px-2 py-1">
<a href="{{ route('admin.students.edit', $student->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
<form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="inline-block delete-form" style="display:inline;">
@csrf
@method('DELETE')
<button type="button" class="bg-red-600 text-white px-2 py-1 rounded delete-btn" data-id="{{ $loop->iteration }}" data-name="{{ $student->name }}">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>

<script>
	// Attach confirmation to delete buttons: show student No. and name
	document.addEventListener('DOMContentLoaded', function () {
		document.querySelectorAll('.delete-btn').forEach(function (btn) {
			btn.addEventListener('click', function (e) {
				var id = btn.getAttribute('data-id');
				var name = btn.getAttribute('data-name');
				var message = 'Are you sure you want to delete student #' + id + ' - ' + name + '? This action cannot be undone.';
				if (confirm(message)) {
					var form = btn.closest('form');
					if (form) form.submit();
				}
			});
		});
	});
</script>

</x-layout>
