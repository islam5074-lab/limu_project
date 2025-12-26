<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class departmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments=Department::all();
        return view('admin.departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->validate([
            'name'=>['required','unique:departments,name'],
            'symbol'=>['required']
        ]);
        Department::create($input);
        return redirect()->route('admin.departments.index')->with('success','department is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('admin.departments.details',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $input=$request->validate([
            'name'=>['required','unique:departments,name'],
            'symbol'=>['required']
        ]);
        $department->update($input);
        return redirect()->route('admin.departments.index')->with('success','department is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
            return redirect()->route('admin.departments.index')->with('success','department is deleted successfully');

    }
}
