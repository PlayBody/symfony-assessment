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

    public function isValid(): bool
    {
        if($this->a <= 0 || $this->b <= 0 || $this->c <= 0){
            return false;
        }
        if($this->a + $this->b <= $this->c || $this->a + $this->c <= $this->b || $this->b + $this->c <= $this->a){
            return false;
        }
        return true;
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
    
    protected function _basicParams_(): array
    {
        return [
            "a" => $this->a,
            "b" => $this->b,
            "c" => $this->c,
        ];
    }

    protected function _calculateSurface_(): float
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    protected function _calculateCircumference_(): float
    {
        return $this->a + $this->b + $this->c;
    }
}