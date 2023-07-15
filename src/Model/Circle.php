<?php

namespace App\Model;

class Circle extends Shape
{
    private $radius;

    public function __construct(float $radius)
    {
        parent::__construct("circle");
        $this->radius = $radius;
    }

    public function basicParams(): array
    {
        return [
            "radius" => $this->radius,
        ];
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function calculateSurface(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function calculateCircumference(): float
    {
        return pi() * $this->radius * 2;
    }
}