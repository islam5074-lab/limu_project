<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DepartmentService;
use App\DTO\DepartmentDTO;

class departmentController extends Controller
{
    protected $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    // عرض كل الأقسام
    public function index()
    {
        $departments = $this->departmentService->getAll();
        return view('admin.departments.index', compact('departments'));
    }

    // صفحة الإنشاء
    public function create()
    {
        return view('admin.departments.create');
    }

    // تخزين قسم جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $dto = new DepartmentDTO($request->name);
        $this->departmentService->create($dto);

        return redirect()->route('admin.departments.index')
                         ->with('success', 'Department created successfully');
    }

    // صفحة التعديل
    public function edit($id)
    {
        $department = $this->departmentService->findById($id);
        return view('admin.departments.edit', compact('department'));
    }

    // تحديث القسم
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $dto = new DepartmentDTO($request->name);
        $this->departmentService->update($id, $dto);

        return redirect()->route('admin.departments.index')
                         ->with('success', 'Department updated successfully');
    }

    // حذف القسم
    public function destroy($id)
    {
        $this->departmentService->delete($id);

        return redirect()->route('admin.departments.index')
                         ->with('success', 'Department deleted successfully');
    }
}
