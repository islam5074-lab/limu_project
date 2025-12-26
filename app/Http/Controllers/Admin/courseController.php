<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name'   => ['required','unique:courses,name'],
            'symbol' => ['required','unique:courses,symbol'],
            'unit'   => ['required', 'numeric']
        ]);

        Course::create($input);
        return redirect()->route('admin.courses.index')->with('success', 'Course is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.courses.details', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $input = $request->validate([
            'name'   => ['required','unique:courses,name,'],
            'symbol' => ['required','unique:courses,symbol'],
            'unit'   => ['required','numeric']
        ]);

        $course->update($input);
        return redirect()->route('admin.courses.index')->with('success', 'Course is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course is deleted successfully');
    }
}

