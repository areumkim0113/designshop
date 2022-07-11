<?php

header('Content-Type: text/html; charset=utf-8');
include_once("dbConnect.php");

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

$request_body = file_get_contents('php://input');
// print_r($request_body);

$db_inset = json_decode($request_body,true);

//넘어온 값들을 지정된 변수에 저장하기
$title = $db_inset["title"];
$tableData = $db_inset["tableData"];

$channel = $db_inset["channel"];

$list = array();
$product_count = count($tableData);

//tableData에 담긴 정보 따로 저장
for($i=0; $i<count($tableData); $i++){

    $c_sale_cd = $tableData[$i]["c_sale_cd"];
    $shop_sale_name = $tableData[$i]["shop_sale_name"];
    $sol_cate_no = $tableData[$i]["sol_cate_no"];
    $wdate = substr($tableData[$i]["wdate"],0,10);
    $register = "N";
    
    $list[] = array("c_sale_cd"=>$c_sale_cd,"shop_sale_name"=>$shop_sale_name,"sol_cate_no"=>$sol_cate_no,"wdate"=>$wdate, "register"=>$register);
}

$product_list = json_encode($list,JSON_UNESCAPED_UNICODE);


//---------- 오늘 날짜에 등록된 업무 데이터의 개수 조회
$sqlSec = "SELECT * FROM work_list WHERE DATE_FORMAT(regdate, '%Y-%m-%d') = curdate()";
$result = mysqli_query($con,$sqlSec);
$count = mysqli_num_rows($result);

//-----------task_id 생성
$count = sprintf('%03d',$count+1);
$date = date("Ymd");
$task_id = $date.$count;

if($result){
    // ----------업무 등록 
$sqlInto = "INSERT INTO work_list(task_title,design_ch,product_list,result,task_id,task_status,product_count) VALUES ('$title','$channel','$product_list','$product_list','$task_id','Wait','$product_count')";
$result1 = mysqli_query($con,$sqlInto);
    if($result1){
        echo "저장이 성공했습니다.";

    }else{
        echo "저장이 실패했습니다.";
    }

}else{
    echo "task_id 생성 실패";
}

mysqli_close($con); 


?>

