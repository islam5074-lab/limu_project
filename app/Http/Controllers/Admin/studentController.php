<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StudentService;
use App\DTO\StudentDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class studentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $students = $this->studentService->getAll();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        // Show the create form and a paginated list of students for quick reference
        $students = $this->studentService->getPaginated(10);
        return view('admin.students.create', compact('students'));
    }

    public function store(Request $request)
    {
        // Allow creating with only a name: email and student_id are optional and
        // will be generated server-side if missing.
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'nullable|email|unique:students,email',
            // DB column is `stNo` (see migration), map form `student_id` to that
            'student_id'=>'nullable|string|unique:students,stNo',
        ]);

        $dto = new StudentDTO($request->name, $request->email, $request->student_id);
        $this->studentService->create($dto);

        return redirect()->route('admin.students.index')->with('success','Student created successfully.');
    }

    public function edit($id)
    {
        try {
            $student = $this->studentService->findById($id);
            return view('admin.students.edit', compact('student'));
        } catch (ModelNotFoundException $e) {
            // Redirect to index with friendly message instead of showing a 404
            return redirect()->route('admin.students.index')->with('error', 'Student not found.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:students,email,'.$id,
            // map validation to `stNo` column
            'student_id'=>'required|string|unique:students,stNo,'.$id,
        ]);

        $dto = new StudentDTO($request->name, $request->email, $request->student_id);
        $this->studentService->update($id, $dto);

        return redirect()->route('admin.students.index')->with('success','Student updated successfully.');
    }

    public function destroy($id)
    {
        $this->studentService->delete($id);
        return redirect()->route('admin.students.index')->with('success','Student deleted successfully.');
    }
}
