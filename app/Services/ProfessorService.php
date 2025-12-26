<?php

namespace App\Services;

use App\Models\Professor;
use App\DTOs\ProfessorDTO;

class ProfessorService
{
    public function getAll()
    {
        return Professor::all();
    }

    public function create(ProfessorDTO $dto)
    {
        return Professor::create([
            'name'  => $dto->name,
            'email' => $dto->email,
        ]);
    }

    public function find(int $id)
    {
        return Professor::findOrFail($id);
    }

    public function update(int $id, ProfessorDTO $dto)
    {
        $professor = Professor::findOrFail($id);

        $professor->update([
            'name'  => $dto->name,
            'email' => $dto->email,
        ]);

        return $professor;
    }

    public function delete(int $id)
    {
        return Professor::findOrFail($id)->delete();
    }
}
