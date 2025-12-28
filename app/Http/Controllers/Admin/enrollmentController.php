<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use App\Models\Professor;
use App\Services\EnrollmentService;
use App\DTO\EnrollmentDTO;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    protected EnrollmentService $service;

    public function __construct(EnrollmentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $enrollments = Enrollment::all();
        $students = Student::pluck('name', 'id');
        $courses = Course::pluck('name', 'id');
        $professors = Professor::pluck('name', 'id');

        return view('admin.enrollments.index', compact('enrollments', 'students', 'courses', 'professors'));
    }

    public function create()
    {
        $students = Student::pluck('name', 'id');
        $courses = Course::pluck('name', 'id');
        $professors = Professor::pluck('name', 'id');

        return view('admin.enrollments.create', compact('students', 'courses', 'professors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'professor_id' => 'required|exists:professors,id',
        ]);

        $data = new EnrollmentDTO($validated);
        $this->service->create($data);

        return redirect()->route('admin.enrollments.index')->with('success', 'تم الحفظ بنجاح');
    }

    public function edit(Enrollment $enrollment)
    {
        $students = Student::pluck('name', 'id');
        $courses = Course::pluck('name', 'id');
        $professors = Professor::pluck('name', 'id');

        return view('admin.enrollments.edit', compact('enrollment', 'students', 'courses', 'professors'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'professor_id' => 'required|exists:professors,id',
        ]);

        $data = new EnrollmentDTO($validated);
        $this->service->update($enrollment, $data);

        return redirect()->route('admin.enrollments.index')->with('success', 'تم التحديث بنجاح');
    }
}
