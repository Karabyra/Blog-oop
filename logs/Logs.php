<?php

namespace logs;

class Logs
{
    public function createLogs( array $array) : bool
    {
        $dt = "DATE ->" . date("Y-d-m H:i:s") . "\n";
        $array[] = $dt;
       return file_put_contents('logs/logs.txt', $array,FILE_APPEND);
    }

    public function getLogs():array
    {    
        return $array = file('logs/logs.txt');       
    }
}