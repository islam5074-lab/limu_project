<?php
namespace App\Services;

use App\Models\Enrollment;
use App\DTO\EnrollmentDTO;

class EnrollmentService
{
    public function create(EnrollmentDTO $data): Enrollment
    {
        return Enrollment::create([
            'student_id' => $data->student_id,
            'course_id' => $data->course_id,
            'professor_id' => $data->professor_id,
            'mark' => $data->mark, // null أو القيمة المدخلة
        ]);
    }

    public function update(Enrollment $enrollment, EnrollmentDTO $data): bool
    {
        return $enrollment->update([
            'student_id' => $data->student_id,
            'course_id' => $data->course_id,
            'professor_id' => $data->professor_id,
            'mark' => $data->mark,
        ]);
    }
}
