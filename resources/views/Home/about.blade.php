@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Hero sub-header */
    .page-header {
        background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        color: white;
        padding: 60px 0;
        margin-bottom: 50px;
        margin-top: -20px;
        border-radius: 0 0 30px 30px;
    }
    .mission-box {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        height: 100%;
        border-top: 5px solid #0d6efd;
        transition: transform 0.3s;
    }
    .mission-box:hover {
        transform: translateY(-5px);
    }
    .stat-circle {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: #f8f9fa;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        border: 4px solid #e9ecef;
    }
    .about-img {
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
</style>

<div class="page-header text-center">
    <div class="container">
        <h1 class="fw-bold display-5">About Our University</h1>
        <p class="lead opacity-75">Shaping the future through excellence in education and innovation.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="images/image.png" alt="University Campus" class="img-fluid about-img">
        </div>
        <div class="col-lg-6 ps-lg-5">
            <h6 class="text-uppercase text-primary fw-bold letter-spacing-2">Since 2007</h6>
            <h2 class="fw-bold mb-4 display-6">A Legacy of Academic Excellence</h2>
            <p class="text-muted lead mb-4">
                LIMU University has been at the forefront of higher education for two decades. We are dedicated to providing a world-class learning environment that fosters critical thinking, creativity, and leadership.
            </p>
            <p class="text-muted">
                Our campus is home to a diverse community of scholars and students from around the globe, all united by a shared passion for knowledge and discovery. We pride ourselves on our state-of-the-art facilities and our commitment to student success.
            </p>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <div class="col-md-4">
            <div class="mission-box text-center">
                <div class="icon-box mb-3 text-primary">
                    <i class="fas fa-rocket fa-3x"></i>
                </div>
                <h3 class="fw-bold mb-3">Our Mission</h3>
                <p class="text-muted">To empower students with the knowledge and skills necessary to thrive in a rapidly changing world, contributing positively to society.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mission-box text-center" style="border-color: #198754;">
                <div class="icon-box mb-3 text-success">
                    <i class="fas fa-eye fa-3x"></i>
                </div>
                <h3 class="fw-bold mb-3">Our Vision</h3>
                <p class="text-muted">To be a globally recognized institution known for research excellence, academic integrity, and inclusive community engagement.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mission-box text-center" style="border-color: #ffc107;">
                <div class="icon-box mb-3 text-warning">
                    <i class="fas fa-heart fa-3x"></i>
                </div>
                <h3 class="fw-bold mb-3">Our Values</h3>
                <p class="text-muted">Integrity, Excellence, Diversity, and Innovation are the pillars that guide our every action and decision.</p>
            </div>
        </div>
    </div>
</div>
@endsection
