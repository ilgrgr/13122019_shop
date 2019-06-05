<?php
session_start();
if (!isset($_SESSION['cartCount'])) {
    $_SESSION['cartCount']=0;
}

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/dest/style.css">
    <title><?=$title?></title>
</head>