<?php

header('Content-Type: text/html; charset=utf-8');
include_once("dbConnect.php");

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

$request_body = file_get_contents('php://input');
// print_r($request_body);

$db_update = json_decode($request_body,true);

//넘어온 값들을 지정된 변수에 저장하기

$task_id = $db_update["task_id"];
$title = $db_update["title"];
$tableData = $db_update["tableData"];
$channel = $db_update["channel"];


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
// print_r($product_list);

//--------------업무 수정
$sql = "UPDATE work_list SET task_title='$title', design_ch='$channel', product_list='$product_list', product_count='$product_count' WHERE task_id = '$task_id'";
$result = mysqli_query($con,$sql);

if($result){
    exec('/usr/bin/python3 /var/www/designshop/python_register/controller/controller.py '.$task_id.' > /dev/null 2>/dev/null &', $output ,$error);
    echo "상품등록이 완료되었습니다.";

}else{
    echo "업무 수정 실패";
}


mysqli_close($con);




?>

