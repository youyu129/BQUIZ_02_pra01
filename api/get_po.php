<?php
include_once "db.php";
$id=$_POST['id'];
$row=$New->find($id);
echo $row['text'];