<?php
declare(strict_types=1);

namespace model;
use PDO;


class Article{
    public function __construct()
    {
    
    }
	private function dbInstance() : PDO{
		static $db;	
		if($db === null){
			$db = new PDO('mysql:host=localhost;dbname=blog', 'root', '', [
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]);
			
			$db->exec('SET NAMES UTF8');
		}
		
		return $db;
	}
	public function AddArticle(array $filds):bool
	{
		$db = $this->dbInstance();
		$sql = "INSERT INTO articles (title,content)VALUE(:title,:content)";
		$query = $db->prepare($sql,$filds);

		$query->execute();
		return true;
	}
	public function getAllArticle():array
	{
		$db = $this->dbInstance();	
		$sql = "SELECT * FROM articles ORDER BY dt_create DESC";
		$query = $db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function getArticle(int $id):array
	{
		$db = $this->dbInstance();	
		$sql = "SELECT * FROM articles WHERE id_article = $id";
		$query = $db->prepare($sql);
		$query->execute();
		return $query->fetch();
	}
	public function removeArticle(int $id):bool
	{
		$db = $this->dbInstance();	
		$sql = "DELETE FROM articles WHERE id_article = $id";
		$query = $db->prepare($sql);
		return $query->execute();

	}

	
}

