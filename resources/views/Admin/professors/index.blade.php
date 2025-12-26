<x-layout title="Professors">

<a href="{{ route('admin.professors.create') }}" class="btn btn-primary mb-3">➕ Add Professor</a>

@if($professors->isEmpty())
    <div class="alert alert-info">No professors found.</div>
@else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($professors as $professor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $professor->name }}</td>
                        <td>{{ $professor->email }}</td>
                        <td>{{ $professor->department->name ?? $professor->department->symbol ?? '' }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.professors.edit', $professor) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.professors.destroy', $professor) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this professor?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

</x-layout>
