<?php
	include_once('functions.php');
	use model\Article;
	include_once('setting.php');
	try{
		$Atc = new Article;
		$articles = $Atc->getAticle();
		$id = (int)($_GET['id'] ?? '');
		$post = $articles[$id] ?? null;
		$hasPost = ($post !== null);
	}
	catch(Exception $e)
	{

	}

?>
<div class="content">
	<? if($hasPost): ?>
		<div class="article">
			<h1><?=$post['title']?></h1>
			<div><?=$post['content']?></div>
			<hr>
			<a href="delete.php?id=<?=$id?>">Remove</a>
			<hr>
			<a href="edit.php?id=<?=$id?>">edit</a>
		</div>
	<? else: ?>
		<div class="e404">
			<h1>Страница не найдена!</h1>
		</div>
	<? endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>