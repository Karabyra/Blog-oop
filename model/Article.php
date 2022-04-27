<?php
declare(strict_types=1);

namespace model;

class Article{
    public function __construct()
    {
    
    }
    public function getAticle(): array
    {
        return json_decode(file_get_contents('db/articles.json'), true);
    }

    public 	function addArticle(string $title, string $content) : bool{
		$articles = getArticles();

		$lastId = end($articles)['id'];
		$id = $lastId + 1;

		$articles[$id] = [
			'id' => $id,
			'title' => $title,
			'content' => $content
		];

		saveArticles($articles);
		return true;
	}

    public 	function editArticle(array $arrayArt) : bool{
		$articles = getArticles();

		$articles[$arrayArt['id']] = [
			'id' => $arrayArt['id'],
			'title' => $arrayArt['title'],
			'content' => $arrayArt['content']
		];

		saveArticles($articles);
		return true;
	}
    public function removeArticle(int $id) : bool{
		$articles = getArticles();

		if(isset($articles[$id])){
			unset($articles[$id]);
			saveArticles($articles);
			return true;
		}
		
		return false;
	}

    public 	function saveArticles(array $articles) : bool{
		file_put_contents('db/articles.json', json_encode($articles));
		return true;
	}

}

