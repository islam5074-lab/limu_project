@extends('layouts.app')

@section('content')
<div style="max-width:1000px;margin:50px auto;padding:25px;background:#fff;border-radius:10px;box-shadow:0 4px 15px rgba(0,0,0,0.1);">

    <h1 style="text-align:center;margin-bottom:60px;">About Us</h1>

    <div style="display:flex;flex-wrap:wrap;gap:30px;align-items:center;justify-content:center;">
        {{-- الصورة --}}
        <div style="flex:1;min-width:300px;text-align:center;">
            <img src="{{ asset('images/image.png') }}" 
                 alt="About Us" 
                 style="width:100%;max-width:400px;border-radius:12px;box-shadow:0 4px 10px rgba(0,0,0,0.1);">
        </div>

        {{-- النص --}}
        <div style="flex:1;min-width:300px;">
            <p style="font-size:16px;line-height:1.8;">
                Welcome to our academic management platform! This system allows administrators to manage students, courses, professors, and departments efficiently.
            </p>
            <p style="font-size:16px;line-height:1.8;">
                Our mission is to simplify academic management and provide a clear overview of all educational activities. 
                With this platform, you can track enrollments, courses, and staff performance with ease.
            </p>
            <p style="font-size:16px;line-height:1.8;">
                We strive to make your administrative work faster, easier, and more reliable, while keeping all your data secure and organized.
            </p>
        </div>
    </div>
</div>
@endsection
