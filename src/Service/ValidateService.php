<?php

namespace App\Service;

use Exception;

class ValidateService
{
    public function __construct()
    {
    }

    public static function tryValidGeometryValues(mixed ...$values) : array
    {
        $results = [];
        foreach($values as $value){
            if(!is_numeric($value)){
                throw new Exception("The value must be number. but ".$value);
            }
            $value = floatval($value);
            if($value > 0){
                $results[] = $value;
            } else {
                throw new Exception("The value must be positive. but ".$value);
            }
        }
        return $results;
    }
}