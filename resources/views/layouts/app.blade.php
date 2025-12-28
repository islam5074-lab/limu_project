<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>University Portal</title>
<!-- داخل ملف layouts/app.blade.php في قسم <head> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;git add .

            color: #222;
            background: linear-gradient(rgba(255,255,255,0.04), rgba(255,255,255,0.04));
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: url('{{ asset("images/content-bg.png") }}') center/cover no-repeat;
            filter: blur(8px) saturate(1.05);
            transform: scale(1.03);
            z-index: -1;
            pointer-events: none;
        }

        /* Header */
        .site-header {
            position: relative;
            z-index: 10;
            background: #2c3e50;
            color: #fff;
            padding: 12px 0;
        }

        .site-header .container {
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:12px;
            max-width:1200px;
            margin:0 auto;
            padding:0 16px;
        }

        .header-center-img {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            background: #ffffff;
            padding: 4px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.12);
            z-index: 2;
            pointer-events: none;
        }

        .site-header a {
            color:#fff;
            text-decoration:none;
            margin-right:12px;
        }

        #toggleSidebar {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 26px;
            cursor: pointer;
        }

        .layout {
            max-width:1200px;
            margin:18px auto;
            padding:0 16px;
            flex: 1;
            position: relative;
            z-index: 1;
        }

        /* Overlay */
        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.25);
            backdrop-filter: blur(2px);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 15;
        }

        .overlay.show {
            opacity: 1;
            pointer-events: auto;
        }

        /* Sidebar (transparent) */
        .sidebar {
            position: fixed;
            top: 0;
            left: -260px;
            width: 240px;
            height: 100vh;
            padding-top: 80px;

            background: rgba(44, 62, 80, 0.75);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);

            transition: left 0.3s ease;
            z-index: 20;
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 14px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: rgba(255,255,255,0.12);
        }

        .content {
            padding: 20px;
            background: #fff;
            border-radius:6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }

        .admin-area {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .admin-area img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }

        .site-footer {
            background:#fff;
            border-top:1px solid #e9ecef;
            padding:18px 0;
            margin-top: auto;
            position: relative;
            z-index: 1;
        }

        .site-footer .container {
            max-width:1200px;
            margin:0 auto;
            padding:0 16px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            color:#6c757d;
        }
    </style>
</head>

<body>

<!-- Overlay -->
<div class="overlay" id="overlay"></div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <a href="/">Home</a>
     <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.courses.index') }}">Courses</a>
    <a href="{{ route('admin.professors.index') }}">Professors</a>
    <a href="{{ route('admin.students.index') }}">Students</a>
    <a href="{{ route('admin.departments.index') }}">Departments</a>
    <a href="{{ route('admin.enrollments.index') }}">Enrollments</a>
</aside>

<!-- Header -->
<header class="site-header">
    <div class="container">
        <div style="display:flex;align-items:center;gap:12px;">
            <button id="toggleSidebar">☰</button>

            <a href="{{ route('home.index') }}" style="font-weight:700;font-size:18px;">
                Portal limu
            </a>

            <nav style="display:flex;gap:10px;align-items:center">
                <a href="{{ route('home.index') }}">Home</a>
                <a href="{{ route('home.about') }}">About</a>
                <a href="{{ route('home.contact') }}">Contact</a>
            </nav>
        </div>

        <img src="{{ asset('images/header-center.png') }}" alt="Header" class="header-center-img">

        <div class="admin-area">
            @auth('admin')
                <img src="{{ asset('images/imagelog.png') }}" alt="Avatar">
                <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:transparent;color:#fff;border:none;cursor:pointer;">Logout</button>
                </form>
            @else
                <a href="{{ route('admin.login') }}" style="background:rgba(255,255,255,0.12);padding:6px 10px;border-radius:4px;">
                    Login
                </a>
            @endauth
        </div>
    </div>
</header>

<div class="layout">
    <main class="content">
        @yield('content')
    </main>
</div>

<footer class="site-footer">
    <div class="container">
        <div>&copy; {{ date('Y') }} University Portal</div>
    </div>
</footer>

<!-- JS -->
<script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
        toggleBtn.textContent = '☰';
    }

    toggleBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        sidebar.classList.toggle('open');
        overlay.classList.toggle('show');
        toggleBtn.textContent = sidebar.classList.contains('open') ? '✖' : '☰';
    });

    overlay.addEventListener('click', closeSidebar);
</script>

</body>
</html>
