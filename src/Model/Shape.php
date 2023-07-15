<?php

namespace App\Model;

abstract class Shape
{
    private $type;
    
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    abstract public function calculateSurface(): float;
    abstract public function calculateCircumference(): float;
    abstract public function basicParams(): array;

    public function getType(): string
    {
        return $this->type;
    }

    public function calculate(): array
    {
        return [
            "type" => $this->type,
            ...$this->basicParams(),
            "surface" => $this->calculateSurface(),
            "circumference" => $this->calculateCircumference(),
        ];
    }
}