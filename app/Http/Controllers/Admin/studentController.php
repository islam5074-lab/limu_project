<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StudentService;
use App\DTO\StudentDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentController extends Controller
{
    protected StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the students.
     */
    public function index()
    {
        $students = $this->studentService->getAll();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Display the specified student (DETAILS).
     */
    public function show($id)
    {
        try {
            $student = $this->studentService->findById($id);
            return view('admin.students.details', compact('student'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('admin.students.index')
                ->with('error', 'Student not found.');
        }
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'nullable|email|unique:students,email',
            'student_id' => 'nullable|string|unique:students,stNo',
        ]);

        $dto = new StudentDTO(
            $request->name,
            $request->email,
            $request->student_id
        );

        $this->studentService->create($dto);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit($id)
    {
        try {
            $student = $this->studentService->findById($id);
            return view('admin.students.edit', compact('student'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('admin.students.index')
                ->with('error', 'Student not found.');
        }
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:students,email,' . $id,
            'student_id' => 'required|string|unique:students,stNo,' . $id,
        ]);

        $dto = new StudentDTO(
            $request->name,
            $request->email,
            $request->student_id
        );

        $this->studentService->update($id, $dto);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy($id)
    {
        try {
            $this->studentService->delete($id);

            return redirect()
                ->route('admin.students.index')
                ->with('success', 'Student deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('admin.students.index')
                ->with('error', 'Student not found.');
        }
    }
}
