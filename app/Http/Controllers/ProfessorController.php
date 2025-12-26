<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        return view('admin.professors.index', compact('professors'));
    }

    public function create()
    {
        return view('admin.professors.create');
    }

    public function store(Request $request)
    {
        Professor::create($request->only('name','email','department'));
        return redirect()->route('admin.professors.index')->with('success','Professor is added successfully');
    }

    public function edit(Professor $professor)
    {
        return view('admin.professors.edit', compact('professor'));
    }

    public function update(Request $request, Professor $professor)
    {
        $professor->update($request->only('name','email','department'));
        return redirect()->route('admin.professors.index')->with('success','Professor is updated successfully');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect()->route('admin.professors.index')->with('success','Professor is deleted successfully');
    }
}
