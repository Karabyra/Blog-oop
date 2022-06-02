<div class="form">
		<form method="post">
			Name:<br>
			<input type="text" name="title" value="<?=$article['title']?>"><br>
			Phone:<br>
			<input type="text" name="content" value="<?=$article['content']?>"><br>
            <select name='category'>
                <?foreach($categoryes as $category): ?>
					<option value=<?=$category['id_category']?>><?= $category['category']?></option>
				<? endforeach;?>
            </select>
			<button>Send</button>
			<p><?=$err=''?></p>
		</form>
</div>
Form or message here
<hr>
<a href="?c=index">Move to main page</a>