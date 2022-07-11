<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include_once($_SERVER["DOCUMENT_ROOT"]."/login/session.php");?>

    <nav>
        <ul class="menu">
            <li><p>안녕하세요. <?php echo $user_name?>(<?php echo $user_id?>)님</p></li>
            <li><a href="/login/logout.php">로그아웃</a></li>
        </ul>
    </nav>  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&family=Jua&family=Kirang+Haerang&display=swap" rel="stylesheet">
    
</head>
