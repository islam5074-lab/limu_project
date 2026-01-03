<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - University Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        body {
            background-color: #f0f2f5;
            background-image: url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(44, 62, 80, 0.7);
            backdrop-filter: blur(5px);
            z-index: 1;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 2;
            padding: 40px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header .icon-wrapper {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 20px;
            box-shadow: 0 10px 20px rgba(13, 110, 253, 0.3);
        }
        .login-header h3 {
            font-weight: 700;
            color: #2c3e50;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            background: #f8f9fa;
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.15);
            border-color: #8daeeb;
            background: white;
        }
        .btn-login {
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            font-size: 16px;
            letter-spacing: 0.5px;
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            border: none;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
            display: block;
            color: #6c757d;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }
        .back-link:hover {
            color: #0d6efd;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-header">
        <div class="icon-wrapper">
            <i class="fas fa-user-shield"></i>
        </div>
        <h3>Admin Access</h3>
        <p class="text-muted">Please enter your credentials</p>
    </div>

    @if(session('error'))
        <div class="alert alert-danger text-center py-2" style="font-size: 0.9rem;">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.adminCheckLogin') }}">
        @csrf
        
        <div class="mb-3">
            <label class="form-label text-muted fw-bold small">EMAIL ADDRESS</label>
            <div class="input-group">
                <span class="input-group-text border-0 bg-transparent ps-0">
                    <i class="fas fa-envelope text-primary"></i>
                </span>
                <input type="email" name="email" class="form-control" placeholder="name@example.com" required autofocus>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label text-muted fw-bold small">PASSWORD</label>
            <div class="input-group">
                <span class="input-group-text border-0 bg-transparent ps-0">
                    <i class="fas fa-lock text-primary"></i>
                </span>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-login">
                Sign In
            </button>
        </div>

        <a href="{{ route('home.index') }}" class="back-link">
            <i class="fas fa-arrow-left me-1"></i> Back to Home
        </a>
    </form>
</div>

</body>
</html>
