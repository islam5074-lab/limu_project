<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>University Portal</title>

        <style>
            body {
                margin: 0;
                font-family: Arial, sans-serif;
                color: #222;
                /* Decorative overlay; the actual image is rendered in a blurred pseudo-element */
                background: linear-gradient(rgba(255,255,255,0.04), rgba(255,255,255,0.04));
                /* Make a column flex container so footer can be pushed to bottom */
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            /* Blurred page-wide background image using a fixed pseudo-element */
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

            /* header */
            .site-header {
                position: relative;
                z-index: 1;
                background: #2c3e50;
                color: #fff;
                padding: 12px 0;
            }
            .site-header .container { display:flex;align-items:center;justify-content:space-between;gap:12px;max-width:1200px;margin:0 auto;padding:0 16px;}

            /* Centered header image (circular) */
            .header-center-img {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                width: 64px;
                height: 64px;
                border-radius: 50%;
                object-fit: cover;
                background: #ffffff;
                padding: 4px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.12);
                z-index: 2;
                pointer-events: none;
            }
            .site-header a{ color:#fff; text-decoration:none; margin-right:12px }

            /* layout */
            /* Main layout should expand to fill available vertical space */
            .layout { display:flex; gap:20px; max-width:1200px; margin:18px auto; padding:0 16px; flex: 1; position: relative; z-index: 1; }

            .sidebar {
                width: 220px;
                background-color: #2c3e50;
                min-height: 60vh;
                padding-top: 20px;
                border-radius:6px;
            }

            .sidebar a {
                display: block;
                color: white;
                padding: 12px 20px;
                text-decoration: none;
            }

            .sidebar a:hover {
                background-color: #34495e;
            }

            .content {
                flex: 1;
                padding: 20px;
                background: #fff;
                border-radius:6px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.04);
            }

            /* footer */
            /* Use auto margin to pin footer to the bottom when content is short */
            .site-footer { background:#fff; border-top:1px solid #e9ecef; padding:18px 0; margin-top: auto; position: relative; z-index: 1; }
            .site-footer .container { max-width:1200px;margin:0 auto;padding:0 16px;display:flex;justify-content:space-between;align-items:center;color:#6c757d }
        </style>
    </head>
    <body>

        <!-- Header -->
        <header class="site-header">
            <div class="container">
                <div style="display:flex;align-items:center;gap:12px;">
                    <a href="{{ route('home.index') }}" style="font-weight:700;font-size:18px;color:#fff"> Portal limu</a>
                    <nav style="display:flex;gap:10px;align-items:center">
                        <a href="{{ route('home.index') }}">Home</a>
                        <a href="{{ route('home.about') }}">About</a>
                        <a href="{{ route('home.contact') }}">Contact</a>
                    </nav>
                </div>
                <!-- Center image inserted here -->
                <img src="{{ asset('images/header-center.png') }}" alt="Header" class="header-center-img">
                <div>
                    <a href="{{ route('admin.dashboard') }}" style="background:rgba(255,255,255,0.12);padding:6px 10px;border-radius:4px;color:#fff;text-decoration:none">Admin</a>
                </div>
            </div>
        </header>

        <div class="layout">
            <!-- Sidebar -->
            <aside class="sidebar" aria-label="Sidebar navigation">
                <a href="/">Home</a>
                <a href="{{ route('admin.courses.index') }}">Courses</a>
                <a href="{{ route('admin.professors.index') }}">Professors</a>
                <a href="{{ route('admin.students.index') }}">Students</a>
                <a href="{{ route('admin.departments.index') }}">Departments</a>
            </aside>

            <!-- Main Content -->
            <main class="content">
                @yield('content')
            </main>
        </div>

        <!-- Footer -->
        <footer class="site-footer">
            <div class="container">
                <div>&copy; {{ date('Y') }} University Portal</div>
                <div>
                    <a href="/">Home</a>
                    <a href="{{ route('home.contact') }}">Contact</a>
                </div>
            </div>
        </footer>

    </body>
    </html>
