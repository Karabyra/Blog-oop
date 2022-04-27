<?php


function dump($item)
{
    echo "<pre>";
    print_r($item);
    echo "<pre>";
}


function autoloadMainClasses($class_name)
{
    $class_name = str_replace('\\','/', $class_name);
    include  $class_name . '.php';
    if(!@include_once $class_name . '.php'){
        throw new \Exception('Не верное имя файла для подключения -'.$class_name);
    }
}

spl_autoload_register('autoloadMainClasses');

