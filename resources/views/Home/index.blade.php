@extends('layouts.app')

@section('content')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Hero Section */
    .hero-section {
        background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.8)), url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 0;
        margin-top: -20px; /* Offset default layout margin if needed */
        margin-bottom: 50px;
        border-radius: 0 0 50px 50px;
        text-align: center;
    }
    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    .hero-subtitle {
        font-size: 1.25rem;
        margin-bottom: 40px;
        color: rgba(255,255,255,0.9);
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    /* Stats Section */
    .stats-card {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        text-align: center;
        transition: transform 0.3s ease;
        border-bottom: 4px solid transparent;
    }
    .stats-card:hover {
        transform: translateY(-5px);
    }
    .stats-card.student-border { border-color: #3498db; }
    .stats-card.course-border { border-color: #2ecc71; }
    .stats-card.prof-border { border-color: #f1c40f; }
    .stats-card.dept-border { border-color: #9b59b6; }

    .stats-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: #2c3e50;
    }
    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
    }
    .stats-label {
        color: #7f8c8d;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 1px;
    }

    /* Features Section */
    .feature-box {
        padding: 30px;
        background: #f8f9fa;
        border-radius: 12px;
        height: 100%;
        transition: 0.3s;
    }
    .feature-box:hover {
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .feature-icon-wrapper {
        width: 60px;
        height: 60px;
        background: #e1effe;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        color: #0d6efd;
        font-size: 1.5rem;
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1 class="hero-title">Welcome to LIMU Portal</h1>
        <p class="hero-subtitle">Your gateway to academic excellence. Manage student records, enrollments, and academic resources seamlessly in one place.</p>
        <div class="d-flex justify-content-center gap-3">
            @auth('admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i> Go to Dashboard
                </a>
            @else
                <a href="{{ route('admin.login') }}" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold text-dark">
                    <i class="fas fa-sign-in-alt me-2"></i> Login
                </a>
            @endauth
        </div>
    </div>
</div>

<div class="container mb-5">
    <!-- Stats Row -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="stats-card student-border">
                <i class="fas fa-user-graduate stats-icon" style="color:#3498db;"></i>
                <div class="stats-number">{{ $counts['students'] ?? 0 }}</div>
                <div class="stats-label">Active Students</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card course-border">
                <i class="fas fa-book stats-icon" style="color:#2ecc71;"></i>
                <div class="stats-number">{{ $counts['courses'] ?? 0 }}</div>
                <div class="stats-label">Courses Offered</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card prof-border">
                <i class="fas fa-chalkboard-teacher stats-icon" style="color:#f1c40f;"></i>
                <div class="stats-number">{{ $counts['professors'] ?? 0 }}</div>
                <div class="stats-label">Expert Professors</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card dept-border">
                <i class="fas fa-building stats-icon" style="color:#9b59b6;"></i>
                <div class="stats-number">{{ $counts['departments'] ?? 0 }}</div>
                <div class="stats-label">Departments</div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="row align-items-center mt-5 mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h2 class="fw-bold mb-4" style="color: #2c3e50;">Why Choose LIMU Portal?</h2>
            <p class="text-muted mb-4">Our platform provides comprehensive tools for university management, ensuring a smooth academic experience for both faculty and students.</p>
            
            <div class="d-flex align-items-start mb-4">
                <div class="feature-icon-wrapper">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <div class="ms-3">
                    <h5 class="fw-bold">Digital Management</h5>
                    <p class="text-muted mb-0">Streamline enrollment processes and record-keeping digitally.</p>
                </div>
            </div>

            <div class="d-flex align-items-start">
                <div class="feature-icon-wrapper" style="background: #fdf2f2; color: #e02424;">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="ms-3">
                    <h5 class="fw-bold">Secure Access</h5>
                    <p class="text-muted mb-0">Robust security for student data and academic records.</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <!-- Decorative Image / Placeholder -->
            <img src="images/content-bg.png" alt="University Life" class="img-fluid rounded-4 shadow-lg">
        </div>
    </div>
</div>
@endsection
