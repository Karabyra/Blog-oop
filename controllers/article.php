<?php
	declare(strict_types=1);
	
	use model\Article;
	use core\Validate;
	include_once('setting.php');
	
	
	try{
		$Atc = new Article;
		$valid = new Validate;
		$id = ($_GET['id'] ?? '');
		$id = Validate::idValidate($id);
			if($id === 404){
				include ('view/v_err.php');
			}else{	
				$articles = $Atc->getArticle($id);
				$hasMsg = $articles !== null;
				include('view/v_article.php');
		}
	}
	catch(Exception $e)
	{
	
	}
	
?>

