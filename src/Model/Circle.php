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

    public function isValid(): bool
    {
        if($this->radius <= 0){
            return false;
        }
        return true;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }
    
    protected function _basicParams_(): array
    {
        return [
            "radius" => $this->radius,
        ];
    }

    protected function _calculateSurface_(): float
    {
        return pi() * pow($this->radius, 2);
    }

    protected function _calculateCircumference_(): float
    {
        return pi() * $this->radius * 2;
    }
}