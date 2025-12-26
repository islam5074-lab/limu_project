<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class ProfessorDTO
{
    public string $name;
    public string $email;

    public function __construct(string $name, string $email)
    {
        $this->name  = $name;
        $this->email = $email;
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->input('name'),
            $request->input('email')
        );
    }
}
