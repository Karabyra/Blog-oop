<?php
declare(strict_types=1);

namespace model;
use PDO;
use core\Dbconnect;

class Article extends Dbconnect{
    public function __construct()
    { 
    }
	public function AddArticle(array $filds):bool
	{
		$db = $this->dbInstance();
		$sql = "INSERT INTO `articles`( `id_category`, `title`, `content` ) VALUES (:cat,:t,:c)";
		$query = $db->prepare($sql);
		$params = [
			'cat'=> $filds['id_category'],
			't'=> $filds['title'],
			'c'=> $filds['content']
		];
		$query->execute($params);
		return true;
	}
	public function getAllArticle():?array
	{
		$db = $this->dbInstance();	
		$sql = "SELECT * FROM articles ORDER BY dt_create DESC";
		$query = $db->prepare($sql);
		$query->execute();
		$article = $query->fetchAll();
		return is_array($article) ? $article:null;
	}
	
	public function getAllCategories():? array
	{
		$db = $this->dbInstance();	
		$sql = "SELECT * FROM categoryes ";
		$query = $db->prepare($sql);
		$query->execute();
		$article = $query->fetchAll();
		return is_array($article) ? $article : null;
	}
	public function getArticle(int $id): ?array
	{
		$db = $this->dbInstance();	
		$sql = "SELECT * FROM articles WHERE id_article = $id";
		$query = $db->prepare($sql);
		$query->execute();
		$article = $query->fetch();
		return is_array($article) ? $article:null;
	}
	public function removeArticle(int $id):bool
	{
		$db = $this->dbInstance();	
		$sql = "DELETE FROM articles WHERE id_article = $id";
		$query = $db->prepare($sql);
		return $query->execute();

	}
	public function editArticle(array $arr):bool
	{
		$params = [
			'category'=>$arr['id_category'],
			'title'=>$arr['title'],
			'content'=>$arr['content'],
			'id'=>$arr['id_article']
		];
		$db =$this->dbInstance();
		$sql = "UPDATE articles SET id_category=:category,title=:title,content=:content WHERE id_article=:id";
		$query = $db->prepare($sql);
		$query->execute($params);
		return true;
	}

	
}

