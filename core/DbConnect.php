<?php
declare(strict_types=1);

namespace core;
use PDO;

class DbConnect
{
    public function __construct()
    {
    
    }
	public function dbInstance() : PDO{
		static $db;	
		if($db === null){
			$db = new PDO('mysql:host=localhost;dbname=blogs', 'root', '', [
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]);
			
			$db->exec('SET NAMES UTF8');
		}
		
		return $db;
	}
    public function dbErrors()
    {
        
    }
}