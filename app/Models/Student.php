<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $fillable = [
        'stNo',
        'name',
        'email',
        'password',
        'avg',
        'status'
    ];

    // Provide a virtual attribute `student_id` that maps to the DB column `stNo`.
    // This lets existing views or code that access `$student->student_id` keep working.
    public function getStudentIdAttribute()
    {
        return $this->attributes['stNo'] ?? null;
    }

    public function setStudentIdAttribute($value)
    {
        $this->attributes['stNo'] = $value;
    }
}

