<?php
	declare(strict_types=1);

	use model\Article;
	use logs\Logs;
	include_once('setting.php');
	include_once('functions.php');
	
try{
	$Arc = new Article;
	$articles = $Arc->getAllArticle();
}	
catch(Exception $e)
{
	 echo $e->getMessage();
}


	

?>
<a href="add.php">Add article</a>
<hr>
<div class="articles">
	<? foreach($articles as $article): ?>
		<div class="article">
			<h3><?=$article['title']?></h3>
			<a href="article.php?id=<?=$article['id_article']?>">Read more</a>
		</div>
	<? endforeach; ?>
</div>
	