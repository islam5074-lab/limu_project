<?php

namespace App\DTO;

class StudentDTO
{
    public $name;
    public $email;
    public $student_id;

    public function __construct($name, $email, $student_id)
    {
        $this->name = $name;
        $this->email = $email;
        $this->student_id = $student_id;
    }
}
