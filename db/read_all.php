<?php

include_once("../db/dbConnect.php");
header('Content-Type: text/html; charset=utf-8');

error_reporting( E_ALL );
ini_set( "display_errors", 1 );


// db에 저장된 상품정보 가져오기
if(isset($_GET['task_id'])){

    $task_id = $_GET['task_id'];

    $sql = "select result from work_list where task_id = '$task_id'";
    $result = mysqli_query($con,$sql);

    $dataArr = mysqli_fetch_assoc($result);
    $row = json_decode($dataArr['result']);

    mysqli_close($con);

    $result1 = array("result"=>true, "data"=>$data=array("contents"=>$row));
    echo json_encode($result1,JSON_UNESCAPED_UNICODE);
}

?>

