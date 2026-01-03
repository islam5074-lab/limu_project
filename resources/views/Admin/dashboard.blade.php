@extends('layouts.app')

@section('content')
<!-- Bootstrap CSS for this view -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .dashboard-card {
        border: none;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        color: white;
        height: 100%;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }
    .card-icon {
        font-size: 3.5rem;
        opacity: 0.3;
        position: absolute;
        right: 20px;
        bottom: 10px;
    }
    .card-title {
        font-weight: 600;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .card-count {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 10px 0;
    }
    .card-link {
        text-decoration: none;
        color: rgba(255,255,255,0.8);
        font-size: 0.9rem;
        transition: color 0.2s;
    }
    .card-link:hover {
        color: white;
    }
    
    /* Specific Card Colors */
    .bg-gradient-students {
        background: linear-gradient(135deg, #0061f2 0%, #00ba94 100%);
    }
    .bg-gradient-courses {
        background: linear-gradient(135deg, #1f1c2c 0%, #928DAB 100%);
    }
    .bg-gradient-professors {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    .bg-gradient-departments {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: #1a4134; /* Dark text for contrast */
    }
    .bg-gradient-departments .card-link, 
    .bg-gradient-departments .card-title,
    .bg-gradient-departments .card-icon {
        color: #1a4134;
        opacity: 0.6;
    }
    
    .welcome-header {
        margin-bottom: 2rem;
    }
    .welcome-header h2 {
        font-weight: 300;
        color: #2c3e50;
    }
    .welcome-header h2 span {
        font-weight: 700;
        color: #0d6efd;
    }
</style>

<div class="container py-4">
    <div class="welcome-header">
        <h2>Welcome back, <span>Admin</span></h2>
        <p class="text-muted">Here's what's happening in your university today.</p>
    </div>

    <div class="row g-4">
        <!-- Students Card -->
        <div class="col-md-3">
            <div class="dashboard-card bg-gradient-students p-4 position-relative">
                <div class="card-title">Students</div>
                <div class="card-count">{{ $studentsCount }}</div>
                <i class="fas fa-user-graduate card-icon"></i>
                <a href="{{ route('admin.students.index') }}" class="card-link stretched-link">
                    View list <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <!-- Courses Card -->
        <div class="col-md-3">
            <div class="dashboard-card bg-gradient-courses p-4 position-relative">
                <div class="card-title">Courses</div>
                <div class="card-count">{{ $coursesCount }}</div>
                <i class="fas fa-book card-icon"></i>
                <a href="{{ route('admin.courses.index') }}" class="card-link stretched-link">
                    View list <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <!-- Professors Card -->
        <div class="col-md-3">
            <div class="dashboard-card bg-gradient-professors p-4 position-relative">
                <div class="card-title">Professors</div>
                <div class="card-count">{{ $professorsCount }}</div>
                <i class="fas fa-chalkboard-teacher card-icon"></i>
                <a href="{{ route('admin.professors.index') }}" class="card-link stretched-link">
                    View list <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <!-- Departments Card -->
        <div class="col-md-3">
            <div class="dashboard-card bg-gradient-departments p-4 position-relative">
                <div class="card-title">Departments</div>
                <div class="card-count">{{ $departmentsCount }}</div>
                <i class="fas fa-building card-icon"></i>
                <a href="{{ route('admin.departments.index') }}" class="card-link stretched-link">
                    View list <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
