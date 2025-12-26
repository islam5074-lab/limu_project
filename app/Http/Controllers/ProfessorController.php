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
        return view('Admin.Professor.index', compact('professors'));
    }

    public function create()
    {
        return view('Admin.Professor.create');
    }

    public function store(Request $request)
    {
        Professor::create($request->only('name','email','department'));
        return redirect('/professors');
    }

    public function edit(Professor $professor)
    {
        return view('Admin.Professor.edit', compact('professor'));
    }

    public function update(Request $request, Professor $professor)
    {
        $professor->update($request->only('name','email','department'));
        return redirect('/professors');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect('/professors');
    }
}
