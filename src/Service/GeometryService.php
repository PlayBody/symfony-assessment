<?php

namespace App\Service;

use App\Model\Circle;
use App\Model\Shape;
use App\Model\Triangle;

class GeometryService
{
    public function __construct()
    {
    }

    public function sumSurfaceTwo(Shape $a, Shape $b): float
    {
        return $this->sumSurface([$a, $b]);
    }
    
    public function sumCircumferenceTwo(Shape $a, Shape $b): float
    {
        return $this->sumCircumference([$a, $b]);
    }

    public function sumSurface(array $shapes): float
    {
        $sum = 0;
        foreach ($shapes as $shape) {
            $sum += $shape->calculateSurface();
        }
        return $sum;
    }

    public function sumCircumference(array $shapes) : float 
    {
        $sum = 0;
        foreach ($shapes as $shape) {
            $sum += $shape->calculateCircumference();
        }
        return $sum;
    }
}