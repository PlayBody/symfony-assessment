<?php

namespace App\Model;

class Triangle extends Shape
{
    private $a;
    private $b;
    private $c;

    public function __construct(float $a, float $b, float $c)
    {
        parent::__construct("triangle");
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function basicParams(): array
    {
        return [
            "a" => $this->a,
            "b" => $this->b,
            "c" => $this->c,
        ];
    }

    public function getA(): float
    {
        return $this->a;
    }

    public function getB(): float
    {
        return $this->b;
    }

    public function getC(): float
    {
        return $this->c;
    }

    public function calculateSurface(): float
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    public function calculateCircumference(): float
    {
        return $this->a + $this->b + $this->c;
    }
}