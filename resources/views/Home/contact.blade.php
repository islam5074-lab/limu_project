@extends('layouts.app')

@section('content')
<div style="max-width:900px;margin:50px auto;padding:25px;background:#fff;border-radius:10px;box-shadow:0 4px 15px rgba(0,0,0,0.1);">

    <h1 style="text-align:center;margin-bottom:30px;">Contact Us</h1>

    <p style="text-align:center;font-size:16px;margin-bottom:20px;">
        Have questions or need assistance? Reach out to us using the form below or follow us on social media.
    </p>

    {{-- الفورم --}}
    <form method="POST" action="#">
        @csrf
        <div style="margin-bottom:15px;">
            <input type="text" name="name" placeholder="Your Name" required style="width:100%;padding:10px;">
        </div>
        <div style="margin-bottom:15px;">
            <input type="email" name="email" placeholder="Your Email" required style="width:100%;padding:10px;">
        </div>
        <div style="margin-bottom:15px;">
            <textarea name="message" placeholder="Your Message" required style="width:100%;padding:10px;height:120px;"></textarea>
        </div>
        <button type="submit" style="width:100%;padding:10px;background:#2c3e50;color:#fff;border:none;border-radius:5px;">Send Message</button>
    </form>

    {{-- أيقونات التواصل الاجتماعي --}}
    <div style="text-align:center;margin-top:30px;">
        <h3>Follow Us</h3>
        <div style="margin-top:15px;font-size:24px;">
            <a href="https://www.facebook.com/share/1D4HxTeEi9/?mibextid=wwXIfr" style="margin:0 10px;color:#2c3e50;"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.tiktok.com/@limu.ly?_r=1&_t=ZM-92bi4JHaXCF" style="margin:0 10px;color:#2c3e50;"><i class="fab fa-tiktok"></i></a>
            <a href="https://www.instagram.com/limu.ly?igsh=MW80b3NnNnhpbWF4bg==" style="margin:0 10px;color:#2c3e50;"><i class="fab fa-instagram"></i></a>
           
        </div>
    </div>

</div>

{{-- تحميل أيقونات FontAwesome --}}
@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
@endpush

@endsection
