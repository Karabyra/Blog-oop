<?php
	declare(strict_types=1);
	include_once('functions.php');
	$isSend = false;
	$err = '';

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$title = trim($_POST['name']);
		$content = trim($_POST['phone']);
		addArticle($title,$content);
		
		if($title === '' || $content === ''){
			$err = 'Заполните все поля!';
		}
		else if(mb_strlen($title, 'UTF8') < 2){
			$err = 'Имя не короче 2 символов!';
		}
		else{
			$dt = date("Y-d-m H:i:s");
			$mainBody = "Date: $dt\nPhone: $content\nName: $title";
			mail('1@1.ru', 'New app on site', $mainBody);
			$isSend = true;
		}
	}
	else{
		$title = '';
		$content = '';
	}

?>
<div class="form">
	<? if($isSend): ?>
		<p>Your app is done!</p>
	<? else: ?>
		<form method="post">
			Name:<br>
			<input type="text" name="name" value="<?=$title?>"><br>
			Phone:<br>
			<input type="text" name="phone" value="<?=$content?>"><br>
			<button>Send</button>
			<p><?=$err?></p>
		</form>
	<? endif; ?>
</div>
Form or message here
<hr>
<a href="index.php">Move to main page</a>