<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // << هذا لازم
use App\Models\Student;
use App\Models\Course;
use App\Models\Professor;
use App\Models\Department;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard', [
            'studentsCount'    => Student::count(),
            'coursesCount'     => Course::count(),
            'professorsCount'  => Professor::count(),
            'departmentsCount' => Department::count(),
        ]);
    }
}
