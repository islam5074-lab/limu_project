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

    // List all enrollments
    
    public function index()
    {  
        $enrollments = Enrollment::with(['student', 'course', 'professor'])->get();
        return view('admin.enrollments.index', compact('enrollments'));
    }

    // Show create form
    public function create()
    {
        $students = Student::pluck('name', 'id');
        $courses = Course::pluck('name', 'id');
        $professors = Professor::pluck('name', 'id');

        return view('admin.enrollments.create', compact('students', 'courses', 'professors'));
    }

    // Store new enrollment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'professor_id' => 'required|exists:professors,id',
        ]);

        // Direct create to ensure data persistence
        Enrollment::create([
            'student_Id' => $validated['student_id'],
            'course_Id' => $validated['course_id'],
            'professor_Id' => $validated['professor_id'],
            'mark' => 0, // Default mark
        ]);

        return redirect()->route('admin.enrollments.index')->with('success', 'تم الحفظ بنجاح');
    }

    // Show edit form
    public function edit(Enrollment $enrollment)
    {
        $students = Student::pluck('name', 'id');
        $courses = Course::pluck('name', 'id');
        $professors = Professor::pluck('name', 'id');

        return view('admin.enrollments.edit', compact('enrollment', 'students', 'courses', 'professors'));
    }

    // Update enrollment
    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'professor_id' => 'required|exists:professors,id',
        ]);

        $enrollment->update([
            'student_Id' => $validated['student_id'],
            'course_Id' => $validated['course_id'],
            'professor_Id' => $validated['professor_id'],
            // Keep existing mark or update if field exists
            'mark' => $request->mark ?? $enrollment->mark, 
        ]);

        return redirect()->route('admin.enrollments.index')->with('success', 'تم التحديث بنجاح');
    }

    // Delete enrollment
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('admin.enrollments.index')
                         ->with('success', 'تم الحذف بنجاح');
    }
}
