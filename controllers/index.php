<?php
	declare(strict_types=1);

	use model\Article;
	use logs\Logs;
	include_once('setting.php');
	
try{
	$Arc = new Article;
	$articles = $Arc->getAllArticle();
	include('view/v_index.php');
}	
catch(Exception $e)
{
	 echo $e->getMessage();
}


	