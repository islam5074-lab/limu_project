<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = ['student_Id', 'course_Id', 'professor_Id', 'mark'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_Id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_Id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_Id');
    }
}
