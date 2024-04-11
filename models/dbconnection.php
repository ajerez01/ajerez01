<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'C:/xampp/htdocs/POS/logs/php_log_error.txt');

class dbconnection{

    public static function connect(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "POS";
        
        $link = new PDO("mysql:host=$servername; dbname=$db",$username,$password );
        
        $link->exec("set names utf8");

        return $link;
        
       // $link -> close();
        $link = null;


    }

    
}