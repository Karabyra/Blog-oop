<?php
	declare(strict_types=1);

	use core\Validate;
	use logs\Logs;
	use model\Article;

	$log = new Logs;
	$art = new Article;
	$filds = ['title' =>  '','content' => ''];
	$categoryes = $art->getAllCategories();
	$hasPost ='';
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		// разобратся с копипастом
		$filds['title'] = $_POST['title']??"";
		$filds['content'] = $_POST['content']?? "";
		$filds['id_category'] = $_POST['category']?? "";
		$fildsValidate = Validate::trimArrayString($filds);	
		// добавить проверку
		if($fildsValidate['title'] === '' || $fildsValidate['content'] === ''){
			$fildsValidate['err'] = 'Заполните все поля!';
		}
		else if(mb_strlen($fildsValidate['title'] , 'UTF8') < 5){
			$fildsValidate['err'] = 'Имя не короче 2 символов!';
		}
		else{
			$arrayLog = ['user' => 'ip address =>' . $_SERVER['REMOTE_ADDR'].';'];
		
			$log->createLogs($arrayLog);
			header('Location:/');
			$art->AddArticle($filds);
			$hasPost = true;
		}
	}
  include('view/v_add.php');
