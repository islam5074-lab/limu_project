<?php

namespace App\DTO;

class DepartmentDTO
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
