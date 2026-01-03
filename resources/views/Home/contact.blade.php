@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .contact-header {
        background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        color: white;
        padding: 60px 0;
        margin-bottom: 50px;
        margin-top: -20px;
        border-radius: 0 0 30px 30px;
    }
    .contact-info-card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        height: 100%;
        display: flex;
        align-items: center;
    }
    .contact-icon {
        width: 60px;
        height: 60px;
        background-color: #eef2ff;
        color: #4f46e5;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-right: 20px;
        flex-shrink: 0;
    }
    .form-card {
        background: #ffffff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }
    .map-container {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        height: 100%;
        min-height: 400px;
    }
</style>

<div class="contact-header text-center">
    <div class="container">
        <h1 class="fw-bold display-5">Get in Touch</h1>
        <p class="lead opacity-75">Have questions? We'd love to hear from you.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="contact-info-card">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Our Location</h5>
                    <p class="text-muted mb-0">Bealoun, Benghazi City, Libya</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-info-card">
                <div class="contact-icon" style="background-color: #ecfdf5; color: #10b981;">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Phone Number</h5>
                    <p class="text-muted mb-0">+218 944595617</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-info-card">
                <div class="contact-icon" style="background-color: #fffbeb; color: #f59e0b;">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Email Address</h5>
                    <p class="text-muted mb-0">info@limu.edu.ly</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Contact Form -->
        <div class="col-lg-7">
            <div class="form-card">
                <h3 class="fw-bold mb-4">Send us a Message</h3>
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">YOUR NAME</label>
                            <input type="text" class="form-control bg-light border-0 py-3" placeholder="Husam Ahmed">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold">YOUR EMAIL</label>
                            <input type="email" class="form-control bg-light border-0 py-3" placeholder="husam@example.com">
                        </div>
                        <div class="col-12">
                            <label class="form-label text-muted small fw-bold">SUBJECT</label>
                            <input type="text" class="form-control bg-light border-0 py-3" placeholder="How can we help?">
                        </div>
                        <div class="col-12">
                            <label class="form-label text-muted small fw-bold">MESSAGE</label>
                            <textarea class="form-control bg-light border-0 py-3" rows="5" placeholder="Write your message here..."></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="button" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Map -->
        <div class="col-lg-5">
            <div class="map-container">
                <!-- Using a static map image placeholder for professional look without API key issues -->
                <div style="background-color: #e9ecef; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; flex-direction: column; color: #6c757d;">
                    <i class="fas fa-map-marked-alt fa-3x mb-3"></i>
                    <h5 class="fw-bold">Google Maps Placeholder</h5>
                    <p class="px-3 text-center"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
