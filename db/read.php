<?php

include_once("../db/dbConnect.php");
header('Content-Type: text/html; charset=utf-8');

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

//임시저정된 데이터를 보여줄 때
//등록오류가 난 후 등록이 안된 상품만 보여줄 때

// db에 저장된 상품정보 가져오기
if(isset($_GET['task_id'])){

    $task_id = $_GET['task_id'];

    $sql = "select result from work_list where task_id = '$task_id'";
    $result = mysqli_query($con,$sql);

    $dataArr = mysqli_fetch_assoc($result);
    $row = json_decode($dataArr['result'],true);
    // print_r($row);

    $product_list = array();

    for($i=0; $i<count($row); $i++){
        $register = $row[$i]['register'];
        
        $list = array();
        if($register != 'Y'){
            
            $c_sale_cd = $row[$i]['c_sale_cd'];
            $shop_sale_name = $row[$i]['shop_sale_name'];
            $sol_cate_no = $row[$i]['sol_cate_no'];
            $wdate = $row[$i]['wdate'];

            $list = array('c_sale_cd'=>$c_sale_cd,'shop_sale_name'=>$shop_sale_name,'sol_cate_no'=>$sol_cate_no,'wdate'=>$wdate);
        
        }else{

            continue;
        }

        $product_list[] = $list; 
    }

    mysqli_close($con);

    $result1 = array("result"=>true, "data"=>$data=array("contents"=>$product_list));
    echo json_encode($result1, JSON_UNESCAPED_UNICODE);

}

?>