
	<div class="articles">
		<? foreach($articles as $article): ?>
			<div class="article">
				<h2><?=$article['title']?></h2>
				<p><?=$article['dt_create']?></p>
				<a href="?c=article&id=<?=$article['id_article']?>">Read more</a>
			</div>
		<? endforeach; ?>
	</div>