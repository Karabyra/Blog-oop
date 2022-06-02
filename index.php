<?php
use core\Validate;
include('setting.php');
try{
    $cname = $_GET['c'] ?? 'index';
    $path = "controllers/$cname.php";
    Validate::isFile($path);
    Validate::checkNameController($cname);   
    include_once("$path");
}
catch(Exception $e)
{
    $err = $e->getMessage();
    include_once('view/v_err.php');
}


