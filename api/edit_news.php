<?php
include_once "db.php";
if(isset($_POST['id'])){
    foreach($_POST['id'] as $key => $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $New->del($id);
        }else{
            $row=$New->find($id);
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $New->save($row);
        }
    }
}

to("../admin.php?do=news");