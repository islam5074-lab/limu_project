<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Portal</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #3498db;
            --text-color: #333;
            --bg-color: #f8f9fa;
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            color: var(--text-color);
            background-color: var(--bg-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Custom Header */
        .site-header {
            background: rgba(44, 62, 80, 0.95);
            backdrop-filter: blur(10px);
            padding: 0.5rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
            margin: 0 5px;
            transition: all 0.2s;
            border-radius: 5px;
            padding: 8px 15px !important;
        }

        .nav-link:hover, .nav-link.active {
            color: white !important;
            background: rgba(255,255,255,0.1);
            transform: translateY(-1px);
        }

        /* Center Logo */
        .header-center-logo {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            border: 2px solid rgba(255,255,255,0.2);
            padding: 2px;
            background: white;
            object-fit: cover;
            transition: transform 0.3s;
        }
        .header-center-logo:hover {
            transform: scale(1.1) rotate(5deg);
        }

        /* Sidebar Customization */
        .offcanvas-start {
            background-color: #2c3e50;
            color: white;
        }
        
        .sidebar-link {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: 0.2s;
            border-left: 4px solid transparent;
        }
        
        .sidebar-link:hover {
            background: rgba(255,255,255,0.05);
            color: white;
            border-left-color: var(--accent-color);
        }

        /* Main Content Area */
        .layout {
            flex: 1;
            padding: 20px 0;
        }

        /* Footer */
        .site-footer {
            background: white;
            padding: 20px 0;
            border-top: 1px solid #dee2e6;
            margin-top: auto;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .toggle-btn {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            padding: 5px 12px;
            border-radius: 8px;
            transition: 0.2s;
        }
        .toggle-btn:hover {
            background: rgba(255,255,255,0.1);
            border-color: white;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="site-header">
        <div class="container d-flex align-items-center justify-content-between">
            
            <!-- Left: Toggle & Brand -->
            <div class="d-flex align-items-center gap-3">
                <button class="toggle-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{ route('home.index') }}" class="navbar-brand">
                    LIMU Portal
                </a>
            </div>

           
            <!-- Right: Navigation -->
            <nav class="d-flex align-items-center gap-2">
                <div class="d-none d-md-flex">
                    <a href="{{ route('home.index') }}" class="nav-link">Home</a>
                    <a href="{{ route('home.about') }}" class="nav-link">About</a>
                    <a href="{{ route('home.contact') }}" class="nav-link">Contact</a>
                </div>
                
                @auth('admin')
                    <div class="dropdown ms-2">
                        <button class="btn btn-outline-light dropdown-toggle border-0" type="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/imagelog.png') }}" alt="User" class="rounded-circle" width="32" height="32">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                            <li><h6 class="dropdown-header">Admin User</h6></li>
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt me-2 text-muted"></i> Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('admin.login') }}" class="btn btn-sm btn-light fw-bold ms-2 rounded-pill px-3">
                        Login
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Sidebar (Offcanvas) -->
    <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebarMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold text-white">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0">
            <nav class="d-flex flex-column py-2">
                <a href="{{ route('home.index') }}" class="sidebar-link">
                    <i class="fas fa-home w-25px"></i> Home
                </a>
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                    <i class="fas fa-chart-pie w-25px"></i> Dashboard
                </a>
                <div class="border-top border-secondary my-2 opacity-50"></div>
                <a href="{{ route('admin.students.index') }}" class="sidebar-link">
                    <i class="fas fa-user-graduate w-25px"></i> Students
                </a>
                <a href="{{ route('admin.courses.index') }}" class="sidebar-link">
                    <i class="fas fa-book w-25px"></i> Courses
                </a>
                <a href="{{ route('admin.professors.index') }}" class="sidebar-link">
                    <i class="fas fa-chalkboard-teacher w-25px"></i> Professors
                </a>
                <a href="{{ route('admin.departments.index') }}" class="sidebar-link">
                    <i class="fas fa-building w-25px"></i> Departments
                </a>
                <a href="{{ route('admin.enrollments.index') }}" class="sidebar-link">
                    <i class="fas fa-clipboard-list w-25px"></i> Enrollments
                </a>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="layout">
        <main class="content">
            @yield('content')
        </main>
    </div>

    <footer class="site-footer text-center">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} LIMU University Portal. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
