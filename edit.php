<?php
declare(strict_types=1);

include_once('functions.php');	
include_once('setting.php');	

$isSend = false;
$err = '';
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $arrayArticlles = getArticles();   
    $articlle  = $arrayArticlles[$_GET['id']] ?? '';
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $articlle['title']= trim($_POST['title']);
    $articlle['content'] = trim($_POST['content']);
    $articlle['id'] = (int)$_GET['id']??'';
    
    if($articlle['title'] === '' || $articlle['content'] === ''){
        $err = 'Заполните все поля!';
    }
    else if(mb_strlen($articlle['title'], 'UTF8') < 2){
        $err = 'Имя не короче 2 символов!';
    }
    else{
        $dt = date("Y-d-m H:i:s");
        $mainBody = "Date: $dt\nPhone: {$articlle['title']}\nName:{$articlle['title']}";
        mail('1@1.ru', 'New app on site', $mainBody);
        $isSend = true;      
        editArticle($articlle);
    }
    $articlle['title'] ='';
    $articlle['content'] ='';
}

?>
<div class="form">
	<? if($isSend): ?>
		<p>Your app is done!</p>
	<? else: ?>
		<form method="post">
			Name:<br>
			<input type="text" name="title" value="<?=$articlle['title']?>"><br>
			Phone:<br>
			<input type="text" name="content" value="<?=$articlle['content']?>"><br>
			<button>Send</button>
			<p><?=$err?></p>
		</form>
	<? endif; ?>
</div>
Form or message here
<hr>
<a href="index.php">Move to main page</a>