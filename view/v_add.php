<div class="form">
		<form method="post">
			Title:<br>
			<input type="text" name="title" value="<?=$filds['title']?>"><br>
			Content:<br>
			<input type="text" name="content" value="<?=$filds['content']?>"><br>
			
				<select name='category'>
				<?foreach($categoryes as $category): ?>
					<option value=<?=$category['id_category']?>><?= $category['category']?></option>
				<? endforeach;?>
				</select>
			<button>Send</button>
			<p><?=$fildsValidate['err'] ?? ''?></p>
		</form>
</div>
Form or message here
<hr>
<a href="/">Move to main page</a>