<?php
declare(strict_types=1);
use logs\Logs;
use model\Article;
use model\Validate;
include_once('functions.php');	
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
    $editArticle['title'] = $_POST['title'] ?? '';
    $editArticle['content'] = $_POST['content'] ?? '';
    $editArticle['id_category'] = $_POST['category'] ?? '';
    $editArticle = $validate->trimArrayString($editArticle);
    dump($editArticle);
    if($validate->checkError($editArticle)){
        echo 'Exception';
        exit;
    }
    else{
        $arrayLogs= [
            'user' => 'ip address =>' . $_SERVER['REMOTE_ADDR']. ';',
            "edit" => 'edit to arrticle;',
         ];
        $log->createLogs($arrayLogs);

    }
}
?>
<div class="form">
		<form method="post">
			Name:<br>
			<input type="text" name="title" value="<?=$article['title']?>"><br>
			Phone:<br>
			<input type="text" name="content" value="<?=$article['content']?>"><br>
            <select name='category'>
                <?foreach($categoryes as $category): ?>
					<option value=<?=$category['id_category']?>><?= $category['category']?></option>
				<? endforeach;?>
            </select>
			<button>Send</button>
			<p><?=$err=''?></p>
		</form>
</div>
Form or message here
<hr>
<a href="index.php">Move to main page</a>