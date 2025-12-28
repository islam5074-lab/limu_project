@extends('layouts.app')

@section('content')
<div style="
    max-width:1100px;     /* توسعة الكارت */
    margin:80px auto;
    padding:40px;
    background:#fff;
    border-radius:15px;
    box-shadow:0 8px 25px rgba(0,0,0,0.15);
">

    {{-- صورة دائرية --}}
    <div style="text-align:center;margin-bottom:25px;">
        <img src="{{ asset('images/header-center.png') }}"
             alt="Login Image"
             style="
                width:180px;
                height:180px;
                border-radius:50%;      /* يجعلها دائرية */
                object-fit:cover;       /* يحافظ على الشكل */
                border:5px solid #2c3e50;
             ">
    </div>

    <h2 style="
        text-align:center;
        margin-bottom:60px;
        font-size:28px;
        letter-spacing:1px;
    ">
        Admin Login
    </h2>

    @if(session('error'))
        <p style="color:red;text-align:center;margin-bottom:15px;">
            {{ session('error') }}
        </p>
    @endif

    <form method="POST" action="{{ route('admin.adminCheckLogin') }}"
          style="max-width:500px;margin:auto;">
        @csrf

        <div style="margin-bottom:20px;">
            <input type="email" name="email" placeholder="Email"
                   required
                   style="
                        width:100%;
                        padding:12px;
                        border-radius:6px;
                        border:1px solid #ccc;
                   ">
        </div>

        <div style="margin-bottom:25px;">
            <input type="password" name="password" placeholder="Password"
                   required
                   style="
                        width:100%;
                        padding:12px;
                        border-radius:6px;
                        border:1px solid #ccc;
                   ">
        </div>

        <button type="submit"
                style="
                    width:100%;
                    padding:12px;
                    background:#2c3e50;
                    color:#fff;
                    border:none;
                    border-radius:6px;
                    font-size:16px;
                    cursor:pointer;
                ">
            Login
        </button>
    </form>
</div>
@endsection
