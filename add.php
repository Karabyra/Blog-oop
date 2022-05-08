<?php
	declare(strict_types=1);
	use model\Validate;
	use logs\Logs;
	use model\Article;
	include_once('functions.php');
	include_once('setting.php');
	$validete = new Validate;
	$log = new Logs;
	$art = new Article;
	$filds = ['title' =>  '','content' => ''];
	$categoryes = $art->getAllCategories();
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$filds['title'] = $_POST['title']??"";
		$filds['content'] = $_POST['content']?? "";
		$filds['id_category'] = $_POST['category']?? "";
		$fildsValidate = $validete->trimArrayString($filds);	
		if($fildsValidate['title'] === '' || $fildsValidate['content'] === ''){
			$filds['err'] = 'Заполните все поля!';
		}
		else if(mb_strlen($fildsValidate['title'] , 'UTF8') < 2){
			$fildsValidate['err'] = 'Имя не короче 2 символов!';
		}
		else{
			$arrayLog = ['user' => 'ip address =>' . $_SERVER['REMOTE_ADDR'].';'];
		
			$log->createLogs($arrayLog);
			header('Location:index.php');
			$art->AddArticle($filds);
		
		}
	}

?>
<div class="form">
		<form method="post">
			Title:<br>
			<input type="text" name="title" value="<?=$filds['title']?>"><br>
			Content:<br>
			<input type="text" name="content" value="<?=$filds['content']?>"><br>
			
				<select name='category'>
				<?foreach($categoryes as $category): ?>
					<option value=<?=$category['id_category']?>><?= $category['category']?></option>
				<? endforeach;?>
				</select>
			<button>Send</button>
			<p><?=$fildsValidate['err'] ?? ''?></p>
		</form>
</div>
Form or message here
<hr>
<a href="index.php">Move to main page</a>