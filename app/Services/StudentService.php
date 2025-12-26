<?php

namespace App\Services;

use App\Models\Student;
use App\DTO\StudentDTO;
use Illuminate\Support\Str;

class StudentService
{
    public function getAll()
    {
        return Student::all();
    }

    /**
     * Return paginated students ordered by id.
     */
    public function getPaginated($perPage = 10)
    {
        return Student::orderBy('id')->paginate($perPage);
    }

    public function create(StudentDTO $dto)
    {
        // If client didn't provide a student_id (form field), generate a unique stNo
        $stNo = $dto->student_id;
        if (empty($stNo)) {
            // Try to increment the max numeric stNo if possible, otherwise fallback to time-based id
            $maxStNo = Student::max('stNo');
            if (is_numeric($maxStNo)) {
                $stNo = (string) ((int) $maxStNo + 1);
            } else {
                $stNo = (string) time();
            }
        }

        // If email not provided, create a synthetic unique email based on stNo
        $email = $dto->email ?: ($stNo . '@local.test');

        // Provide a default password if not present (required by migration)
        $password = bcrypt(Str::random(12));

        return Student::create([
            'name' => $dto->name,
            'email' => $email,
            // DB column is `stNo` (migration). Map incoming DTO.student_id -> stNo
            'stNo' => $stNo,
            'password' => $password,
        ]);
    }

    public function findById($id)
    {
        return Student::findOrFail($id);
    }

    public function update($id, StudentDTO $dto)
    {
        $student = $this->findById($id);
        $student->update([
            'name' => $dto->name,
            'email' => $dto->email,
            'stNo' => $dto->student_id,
            
        ]);
        return $student;
    }

    public function delete($id)
    {
        $student = $this->findById($id);
        $student->delete();
    }
}
