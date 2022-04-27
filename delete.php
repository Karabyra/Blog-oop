<?php

	include_once('functions.php');		

	$id = $_GET['id'] ?? "";
	removeArticle($id);
?>
Message about result
<hr>
<a href="index.php">Move to main page</a>