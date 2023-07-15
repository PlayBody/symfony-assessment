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

    public function sumSurface(Shape ...$shapes): float
    {
        $sum = 0;
        foreach ($shapes as $shape) {
            $sum += $shape->calculateSurface();
        }
        return $sum;
    }

    public function sumCircumference(Shape ...$shapes) : float 
    {
        $sum = 0;
        foreach ($shapes as $shape) {
            $sum += $shape->calculateCircumference();
        }
        return $sum;
    }
}