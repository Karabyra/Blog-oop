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
    public function checkError(array $filds) :bool
    {   
        if($filds['title'] === '' || $filds['content'] === ''){
           return true;
        }
        else if(mb_strlen($filds['title'], 'UTF8') < 2){
            return true;
        }
        else{
            return false;
        }
    }
}
