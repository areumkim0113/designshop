<?php

header('Content-Type: text/html; charset=utf-8');

$con = mysqli_connect("","","","");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>