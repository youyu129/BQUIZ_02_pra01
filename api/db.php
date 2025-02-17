<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
    protected $dsn="mysql:host=localhost;charset:utf8;dbname=db0202";
    protected $pdo;
    protected $talbe;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    } 
}

// all
// find
// save
// del

function q($sql){
    $dsn="mysql:host=localhost;charset:utf8;dbname=db0202";
    $pdo=new PDO($dsn,'root','');
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:".$url);
}



?>