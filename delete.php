<?php
	use logs\Logs;
	use model\Article;
	include_once('functions.php');		
	include_once('setting.php');
	$art = new Article;
	$log = new Logs;
	$id = (int)$_GET['id'] ?? "";
	$arrayLogs= [
		'user' => 'ip address =>' . $_SERVER['REMOTE_ADDR']. ';',
		"delete" => 'Delet to arrticle;',
	 ];
	$art->removeArticle($id);
	$log->createLogs($arrayLogs);
?>
Message about result
<hr>
<a href="index.php">Move to main page</a>