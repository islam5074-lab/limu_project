<x-layout title="Dashboard">

<div class="row">
    <div class="card p-3 mb-3">
        <h3>Students</h3>
        <p>{{ $students ?? 0 }}</p>
    </div>

    <div class="card p-3 mb-3">
        <h3>Courses</h3>
        <p>{{ $courses ?? 0 }}</p>
    </div>

    <div class="card p-3 mb-3">
        <h3>Professors</h3>
        <p>{{ $professors ?? 0 }}</p>
    </div>

    <div class="card p-3 mb-3">
        <h3>Enrollments</h3>
        <p>{{ $enrollment ?? 0 }}</p>
    </div>
</div>

</x-layout>
