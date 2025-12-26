<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Professor;
use App\Models\Student;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function index()
    {
        $students=Student::count();
        $courses=Course::count();
        $professors=Professor::count();
        $enrollment=Enrollment::count();
        return view('admin.dashboard.index',compact(['courses','professors','students','enrollment']));
    }
}
