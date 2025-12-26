<?php

namespace App\Services;

use App\Models\Course;
use App\DTOs\CourseDTO;

class CourseService
{
    public function getAll()
    {
        return Course::all();
    }

    public function find(int $id): Course
    {
        return Course::findOrFail($id);
    }

    public function create(CourseDTO $dto): void
    {
        Course::create([
            'name'   => $dto->name,
            'symbol' => $dto->symbol,
            'unit'   => $dto->unit,
        ]);
    }

    public function update(int $id, CourseDTO $dto): void
    {
        $course = Course::findOrFail($id);

        $course->update([
            'name'   => $dto->name,
            'symbol' => $dto->symbol,
            'unit'   => $dto->unit,
        ]);
    }

    public function delete(int $id): void
    {
        Course::findOrFail($id)->delete();
    }
}
