@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Course</h1>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Course Title</label>
            <x-form-input 
                type="text" 
                name="title" 
                placeholder="Enter course title" 
            />
        </div>

        <div class="mb-3">
            <label>Course Code</label>
            <x-form-input 
                type="text" 
                name="code" 
                placeholder="CS101" 
            />
        </div>

        <x-button type="submit">
            Create Course
        </x-button>
    </form>
</div>
@endsection
