<?php
	include_once('functions.php');
	use model\Article;
	include_once('setting.php');
	try{
		$Atc = new Article;	
		$id = (int)($_GET['id'] ?? '');
		$articles = $Atc->getArticle($id);
	}
	catch(Exception $e)
	{

	}

?>
<div class="content">
	<? if($articles): ?>
		<div class="article">
			<h1><?=$articles['title']?></h1>
			<div><?=$articles['content']?></div>
			<hr>
			<a href="delete.php?id=<?=$articles['id_article']?>">Remove</a>
			<hr>
			<a href="edit.php?id=<?=$articles['id_article']?>">edit</a>
		</div>
	<? else: ?>
		<div class="e404">
			<h1>Страница не найдена!</h1>
		</div>
	<? endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>