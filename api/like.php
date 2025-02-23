<?php

include_once "db.php";

$chk=$Good->count(['news'=>$_POST['id'],'user'=>$_SESSION['login']]);
if($chk>0){
    $Good->del(['news'=>$_POST['id'],'user'=>$_SESSION['login']]);
}else{
    $Good->save(['news'=>$_POST['id'],'user'=>$_SESSION['login']]);
}