<?php

namespace App\Services;

use App\Models\Department;
use App\DTO\DepartmentDTO;

class DepartmentService
{
    public function getAll()
    {
        return Department::all();
    }

    public function create(DepartmentDTO $dto)
    {
        return Department::create([
            'name' => $dto->name,
        ]);
    }

    public function findById($id)
    {
        return Department::findOrFail($id);
    }

    public function update($id, DepartmentDTO $dto)
    {
        $department = $this->findById($id);

        $department->update([
            'name' => $dto->name,
        ]);

        return $department;
    }

    public function delete($id)
    {
        $department = $this->findById($id);
        $department->delete();
    }
}
