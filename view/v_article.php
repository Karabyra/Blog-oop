
<div class="content">
	<div class="article">
				<h2><?=$articles['title']?></h1>
                    <div>
                        <p><?=$articles['content']?></p>
                    </div>
     </div>
     <div class="link">
	 <a href="?c=delete&id=<?=$articles['id_article']?>">Remove</a>	
	 <a href="?c=edit&id=<?=$articles['id_article']?>">edit</a>
     <a href="?c=index">Move to main page</a>
     </div>			
</div>