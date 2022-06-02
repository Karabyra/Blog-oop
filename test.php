<?php
include('setting.php');



use core\System;
use model\Article;

$art = new Article;

$path = 'v_header';
$articles = $art->getAllArticle();
System::render($path,$articles);
