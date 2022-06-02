<?php
namespace core;

class System{
    static public function render(string $path, array &$articles = [])
    {
        $fullPath = "view/$path.php";
        extract($articles);
        include($fullPath);
    }
}