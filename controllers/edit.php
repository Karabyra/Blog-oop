<?php
declare(strict_types=1);

use logs\Logs;
use model\Article;
use core\Validate;
use FFI\Exception;
include_once('setting.php');	


$validate = new Validate;
$log = new Logs;
$art = new Article;
$categoryes = $art->getAllCategories(); 
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id  = (int)$_GET['id'] ?? '';
    $article = $art->getArticle($id);
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
    $editArticle['id_article'] = $_GET['id'] ?? '';
    $editArticle['title'] = $_POST['title'] ?? '';
    $editArticle['content'] = $_POST['content'] ?? '';
    $editArticle['id_category'] = $_POST['category'] ?? '';
    $editArticle = $validate->trimArrayString($editArticle);
    if(!$validate->checkError($editArticle)){
        echo $e->getMessage();
        exit;
    }
    else{
        $art->editArticle($editArticle);
        $arrayLogs= [
            'user' => 'ip address =>' . $_SERVER['REMOTE_ADDR']. ';',
            "edit" => 'edit to arrticle;',
         ];
        $log->createLogs($arrayLogs);
        header('Location:index.php');
    }
}
include('view/v_edit.php');
?>
