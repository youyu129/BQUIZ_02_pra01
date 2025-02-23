<?php
include_once "db.php";
// dd($_POST);
// exit();

$Que->save(['text'=>$_POST['subject'],'main_id'=>0,'vote'=>0]);
dd($_POST['subject']);

$subject_id=q("select id from ques where text='{$_POST['subject']}'")[0][0];
// dd($subject_id);
foreach($_POST['options'] as $option){
    // echo "<p>option=" . $option."</p>";
    $Que->save(['text'=>$option,'main_id'=>$subject_id,'vote'=>0]);
}

to("../admin.php?do=que");