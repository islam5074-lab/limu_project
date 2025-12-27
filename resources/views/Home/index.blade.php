@extends('layouts.app')

@section('content')
<div class="py-5 text-center bg-light rounded mb-4">
	<div class="container">
		<h1 class="display-4">Welcome to the University Portal</h1>
		<p class="lead text-muted">Manage students, courses, professors and enrollments from the admin panel.</p>
		<p>
			<a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg">Go to Dashboard</a>
		</p>
	</div>
</div>

<div class="row g-3">
	<div class="col-md-3">
		<div class="card text-white bg-primary h-100">
			<div class="card-body">
				<h5 class="card-title">Students</h5>
				<p class="card-text display-6">{{ $counts['students'] ?? 0 }}</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-white bg-success h-100">
			<div class="card-body">
				<h5 class="card-title">Courses</h5>
				<p class="card-text display-6">{{ $counts['courses'] ?? 0 }}</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-white bg-warning h-100">
			<div class="card-body">
				<h5 class="card-title">Professors</h5>
				<p class="card-text display-6">{{ $counts['professors'] ?? 0 }}</p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card text-white bg-secondary h-100">
			<div class="card-body">
				<h5 class="card-title">Departments</h5>
				<p class="card-text display-6">{{ $counts['departments'] ?? 0 }}</p>
			</div>
		</div>
	</div>
</div>
@endsection
