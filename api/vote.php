<?php
include_once "db.php";
$id     = $_POST['item'];
$option = $Que->find($id);
$option['vote']++;
$Que->save($option);

to("../index.php?do=result&id={$option['main_id']}");
