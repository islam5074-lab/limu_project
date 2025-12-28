@extends('layouts.app')

@section('content')
<div style="max-width:1200px;margin:50px auto;">

    <h1 style="margin-bottom:30px;">Admin Dashboard</h1>

    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">

        {{-- Students --}}
        <div style="background:#2c3e50;color:#fff;padding:25px;border-radius:12px;text-align:center;">
            <h3>Students</h3>
            <h1>{{ $studentsCount }}</h1>
        </div>

        {{-- Courses --}}
        <div style="background:#2c3e50;color:#fff;padding:25px;border-radius:12px;text-align:center;">
            <h3>Courses</h3>
            <h1>{{ $coursesCount }}</h1>
        </div>

        {{-- Professors --}}
        <div style="background:#2c3e50;color:#fff;padding:25px;border-radius:12px;text-align:center;">
            <h3>Professors</h3>
            <h1>{{ $professorsCount }}</h1>
        </div>

        {{-- Departments --}}
        <div style="background:#2c3e50;color:#fff;padding:25px;border-radius:12px;text-align:center;">
            <h3>Departments</h3>
            <h1>{{ $departmentsCount }}</h1>
        </div>

    </div>

</div>
@endsection
