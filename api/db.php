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
// all
function all(...$arg){
    $sql="SELECT * FROM $this->table ";
    if(!empty($arg[0])){
        if(is_array($arg[0])){
            $where=$this->a2s($arg[0]);
            $sql=$sql . " WHERE " . join(" && ",$where);
        }else{
            $sql.=$arg[0];
        }
        if(!empty($arg[1])){
            $sql= $sql . $arg[1];
        }
        return $this->fetchAll($sql);
    }

}

// find
function find($id){
    $sql="SELECT * FROM $this->table ";

    if(is_array($id)){
        $where=$this->a2s($id);
        $sql=$sql." WHERE " . join(" && ",$where);
    }else{
        $sql=$sql . " WHERE `id`='$id' ";
    }
    return $this->fetchOne($sql);
}


// save

// del
function del($id){
    $sql="DELETE FROM $this->table ";

    if(is_array($id)){
        $where=$this->a2s($id);
        $sql=$sql . " WHERE " . join(" && ",$where);
    }else{
        $sql=" WHERE `id`='$id' ";
    }
    return $this->pdo->exec($sql);
}

// a2s
function a2s($array){
    $tmp=[];
    foreach($array as $key => $value){
        $tmp[]="`$key`='$value'";
    }
    return $tmp;
}

}



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