<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CourseService;
use App\DTOs\CourseDTO;

class CourseController extends Controller
{
    private CourseService $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    // READ
    public function index()
    {
        $courses = $this->service->getAll();
        return view('courses.index', compact('courses'));
    }

    // CREATE (form)
    public function create()
    {
        return view('courses.create');
    }

    // STORE
    public function store(Request $request)
    {
        $dto = CourseDTO::fromRequest($request);
        $this->service->create($dto);

        return redirect()->route('courses.index');
    }

    // EDIT (form)
    public function edit($id)
    {
        $course = $this->service->find($id);
        return view('courses.edit', compact('course'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $dto = CourseDTO::fromRequest($request);
        $this->service->update($id, $dto);

        return redirect()->route('courses.index');
    }

    // DELETE
    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('courses.index');
    }
}
