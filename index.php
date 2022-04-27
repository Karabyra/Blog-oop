<?php
	declare(strict_types=1);

	use model\Article;

	include_once('setting.php');
	include_once('functions.php');
	
try{
	$Arc = new Article;
	$articles = $Arc->getAticle();
}	
catch(Exception $e)
{
	 echo $e->getMessage();
}


	

?>
<a href="add.php">Add article</a>
<hr>
<div class="articles">
	<? foreach($articles as $id => $article): ?>
		<div class="article">
			<h2><?=$article['title']?></h2>
			<a href="article.php?id=<?=$id?>">Read more</a>
		</div>
	<? endforeach; ?>
</div>
	