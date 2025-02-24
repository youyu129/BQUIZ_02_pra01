<?php

include_once "db.php";
$news = $New->find($_POST['id']);
$chk  = $Good->count(['news' => $_POST['id'], 'user' => $_SESSION['login']]);
if ($chk > 0) {
    $Good->del(['news' => $_POST['id'], 'user' => $_SESSION['login']]);
    $news['likes']--;
} else {
    $Good->save(['news' => $_POST['id'], 'user' => $_SESSION['login']]);
    $news['likes']++;
}

$New->save($news);
