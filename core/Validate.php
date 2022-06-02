<?php

namespace core;
use Exception;

class Validate{

    public function __construct(){}
    static public function trimArrayString(array $filds):array
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
           throw new Exception('Заполните все поля');
        }
        else if(mb_strlen($filds['title'], 'UTF8') < 2){
            throw new Exception(' имя не короче двух');
        }
        else{
            return  true;
        }
    }
    static public function idValidate(string $id):int
    {        
         $pattern = '/^[1-9]+\d*/';
        preg_match($pattern,$id,$matches);   
        $res = $matches[0] ??null;
        if($res === null){
            return 404;
        }else{
            return $res;
        }

    }
    static public function isFile(string $path)
    {
        if(!file_exists($path)){
            throw new Exception('Файл не найден');
        }else{
            return true;
        }
    }
    static public function checkNameController(string $name):bool
    {
        $patern = '/^[a-zA-Z1-9-]+$/';
        if((bool)preg_match($patern,$name)){
            return true;
        }else{
            throw new Exception('Неверное имя контоллера');
        }
    }
    // МЕТОД ПРОВЕРКИ МАСИВА add.php
}
