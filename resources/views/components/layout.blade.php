<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>body{font-family: Arial,Helvetica,sans-serif;background:#f4f6f8;padding:20px} .container{max-width:1100px;margin:0 auto}</style>
    @stack('styles')
</head>
<body>

<div class="container">
    <header style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
        <h2 style="margin:0">{{ $title ?? 'Dashboard' }}</h2>
        <div>
            @if(session('success'))<span style="color:green">{{ session('success') }}</span>@endif
            @if(session('error'))<span style="color:red">{{ session('error') }}</span>@endif
        </div>
    </header>

    <div style="display:flex;gap:20px;align-items:flex-start">
        <aside style="width:220px">
            @include('components.admin-sidebar')
        </aside>

        <main style="flex:1;background:#fff;padding:20px;border-radius:6px;box-shadow:0 2px 6px rgba(0,0,0,0.05)">
            {{ $slot }}
        </main>
    </div>

</div>

@stack('scripts')
</body>
</html>
