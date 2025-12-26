<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class CourseDTO
{
    public string $name;
    public string $symbol;
    public int $unit;

    public function __construct(string $name, string $symbol, int $unit)
    {
        $this->name   = $name;
        $this->symbol = $symbol;
        $this->unit   = $unit;
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->name,
            $request->symbol,
            (int) $request->unit
        );
    }
}
