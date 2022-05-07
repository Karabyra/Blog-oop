<?php

namespace model;

class Validate{

    public function __construct(){}
    public function trimArrayString(array $filds):array
    {
        $resalt = []; 
        foreach($filds as $name =>$value){
            $resalt[$name] = trim($value); 
        }
        return $resalt;
    }
}

$a = new Validate();
