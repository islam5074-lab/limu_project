<?php
namespace App\Services;

use App\Models\Enrollment;
use App\DTO\EnrollmentDTO;
use Illuminate\Support\Facades\Log;

class EnrollmentService
{
    public function create(EnrollmentDTO $data): Enrollment
    {
        Log::info('Creating Enrollment', (array)$data);
        
        $enrollment = Enrollment::create([
            'student_id' => $data->student_id,
            'course_id' => $data->course_id,
            'professor_id' => $data->professor_id,
            'mark' => $data->mark, // null أو القيمة المدخلة
        ]);

        Log::info('Created Enrollment', $enrollment->toArray());

        return $enrollment;
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
