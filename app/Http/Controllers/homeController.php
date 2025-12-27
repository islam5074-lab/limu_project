<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Professor;
use App\Models\Department;

class homeController extends Controller
{
     public function index()
    {
        // show summary counts on the home page
        $counts = [
            'students' => Student::count(),
            'courses' => Course::count(),
            'professors' => Professor::count(),
            'departments' => Department::count(),
        ];

        return view('Home.index', compact('counts'));
    }
    public function about()
    {
        return view('Home.about');
    }
    public function contact()
    {
        return view('Home.contact');
    }
}
