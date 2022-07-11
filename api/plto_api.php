<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../db/dbConnect.php");

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

$auth_key = "";

$sql = "select value from plto_token";
$result = mysqli_query($con,$sql);
$value = mysqli_fetch_assoc($result);

$token = "";
for($i=0; $i<count($value); $i++){
	$token = $value['value'];
}

if($result){

	$ch = curl_init();

	$head_data1 = array(
	"Content-Type: application/json; charset=utf-8",
	"x-api-key: $auth_key", 
	"Authorization: Token $token"			
	);

	$start = 0;  // 검색 시작 값
	$length = 200; // 조회할 상품 갯수
	$sdate = date("Y-m-d", strtotime('-1 month')); // 검색시작일(0000-00-00)
	$edate = date("Y-m-d"); // 검색종료일(0000-00-00)
	$date_type = "wdate"; // 날짜 검색 타입
	$search_key = ""; // 검색키
	$search_type = "partial"; // 검색타입 -> 완전일치, 부분일치
	$search_word = ""; // 검색어
	$orderby = "wdate desc"; // 정렬
	$shop_cd = "only_mas"; // 마스터 상품만 출력 (빈칸 => 전체 쇼핑몰 상품)
	$onlyNormal = true; 
	$multi_type = "c_sale_cd"; // 멀키검색 키
	$category_code = ""; //
	$multi_search_word = "";
	$sol_cate_no = "";

	// 검색버튼 클릭 시 데이터 넣기
	if(isset($_GET['sdate'])){
		$sdate = $_GET['sdate'];
		$edate = $_GET['edate'];
		$search_word = $_GET['search_word'];
		$sol_cate_no = $_GET['sol_cate_no'];
		// $multi_type = $_GET['multi_type'];
		// $multi_search_word = $_GET['code_value'];
	}

	/* Reqeust	정보 배열화 */
	$body1 = array(
		"start"=> $start,
		"length" => $length,
		"sdate"=> $sdate,
		"edate" => $edate,
		"date_type"=> $date_type,
		"search_key" => $search_key,
		"search_type" => $search_type,
		"search_word" => $search_word,
		"orderby" => $orderby,
		"onlyNormal" => $onlyNormal,
		"shop_cd" => $shop_cd,
		"multi_type" => $multi_type,
		"multi_search_word" => $multi_search_word,
		"sol_cate_no" => $sol_cate_no
	);
	
	$body_json = json_encode($body1, JSON_UNESCAPED_UNICODE,true);

	/* 상품 > 상품 리스트를 가져옵니다. */
	$url1= "https://openapi.playauto.io/api/product/online/list";

	curl_setopt($ch, CURLOPT_URL, $url1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);   
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $head_data1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_SSLVERSION,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body_json);
	curl_setopt($ch, CURLOPT_TIMEOUT, 300);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$json_content1 = curl_exec($ch);
	$product_list = json_decode($json_content1,true);

    //가져온 정보에서 판매자상품코드를 얻기
    $c_sale_cd = array_keys($product_list['results']);

    $result = array();

    // 키값(판매자상품코드)를 이용해 상품 상세 정보 얻기
    for($i=0; $i<count($c_sale_cd); $i++){
        $key = $c_sale_cd[$i];
        $value = $product_list['results'][$key];

        $result[] = $value[0];
    
    } 

    // GRID에 뿌릴 적절한 형태로 바꾸기
    $result_list = array("result"=>true, "data"=>$data=array("contents"=>$result));
    echo json_encode($result_list, JSON_UNESCAPED_UNICODE);            


}else{
	echo "데이터 가져오기 실패";
}

?>