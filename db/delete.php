<?php

header('Content-Type: text/html; charset=utf-8');
include_once("dbConnect.php");

error_reporting( E_ALL );
ini_set( "display_errors", 1 );


$request_body = file_get_contents('php://input');
$task_id = json_decode($request_body,true);

for($i=0; $i<count($task_id); $i++){
    $sql = "delete from work_list where task_id = '$task_id[$i]'";
    $result = mysqli_query($con,$sql);

    if($result){
        echo "데이터 저장 성공";
    }else{
        echo "데이터 저장 실패";
    }
}

mysqli_close($con); 

?>