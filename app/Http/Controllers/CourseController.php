<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('Admin.courses.index');
    }

    public function create()
    {
        return view('Admin.courses.create');
    }
}
