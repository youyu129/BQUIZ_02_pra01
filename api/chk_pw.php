<?php
include_once "db.php";
$chk=$User->count($_POST);
if($chk){
    echo $chk;
    $_SESSION['login']=$_POST['acc'];
}else{
    echo 0;
}
?>