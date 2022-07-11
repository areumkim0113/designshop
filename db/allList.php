<?php


include_once("../db/dbConnect.php");

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

$sql="";

//검색값이 있다면
if(isset($_GET['type'])){

    $sql="";
    
    //검색값이 등록일이라면
    if($_GET['type'] == 'updatedate'){
       
        $val = $_GET['value'];  

        $sql = "SELECT * FROM work_list WHERE DATE_FORMAT(regdate, '%Y-%m-%d') = '$val' ORDER BY updatedate desc";

    }else{
        $column = $_GET['type'];
        $val = $_GET['value'];  
    
        $sql = "select * from work_list where $column = '$val' order by updatedate desc";
    }
    
}else{

    $sql = "select * from work_list order by updatedate desc";

}

$result = mysqli_query($con,$sql);
$list = array();

while($row = mysqli_fetch_array($result)){

    // print_r($row);

    $t=new stdClass();
    $t->task_id = $row['task_id'];
    $t->task_title = $row['task_title'];
    $t->updatedate = substr($row['updatedate'],0,10);
    $t->design_ch = $row['design_ch'];
    $t-> task_status = $row['task_status'];
    $t-> product_count = $row['product_count'];
    $list[] = $t;
    unset($t);

}

mysqli_close($con);

$result = array("result"=>true, "data"=>$data=array("contents"=>$list));
echo json_encode($result, JSON_UNESCAPED_UNICODE);


?>