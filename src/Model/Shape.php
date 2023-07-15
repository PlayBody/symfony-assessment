<?php

namespace App\Model;

abstract class Shape
{
    private $type;
    
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    abstract public function isValid(): bool;

    abstract protected function _calculateSurface_(): float;
    abstract protected function _calculateCircumference_(): float;
    abstract protected function _basicParams_(): array;

    public function basicParams(): array
    {
        $result = $this->_basicParams_();
        if($this->isValid()){
            return $result;
        } else {
            return [
                "invalid" => $result, 
            ];
        }
    }
    
    public function calculateSurface(): float
    {
        if(!$this->isValid()){
            return -1;
        }
        return $this->_calculateSurface_();
    }

    public function calculateCircumference(): float
    {
        if(!$this->isValid()){
            return -1;
        }
        return $this->_calculateCircumference_();
    }

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