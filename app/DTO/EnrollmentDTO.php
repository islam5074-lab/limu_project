<?php

namespace App\DTO;

class EnrollmentDTO
{
    public int $student_id;
    public int $course_id;
    public int $professor_id;
    public ?float $mark;

    public function __construct(array $data)
    {
        $this->student_id = $data['student_id'];
        $this->course_id = $data['course_id'];
        $this->professor_id = $data['professor_id'];
        $this->mark = $data['mark'] ?? null; // <- null إذا لم تدخل قيمة
    }
}
