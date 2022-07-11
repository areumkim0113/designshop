<?php

include_once("insert.php");

if($result1){

    exec('/usr/bin/python3 /var/www/designshop/python_register/controller/controller.py '.$task_id.' > /dev/null 2>/dev/null &', $output ,$error);
    echo "상품등록이 완료되었습니다.";

}else{
    echo "등록실패";
}

?>



