
<?php include_once("../../includes/header.php");?> 
<title>Modify</title>
<link rel="stylesheet" href="../../css/common.css">
<link rel="stylesheet" href="css/progress.css">

<?php include_once("../../includes/tui-css-link.php");?>
<?php include_once("../../includes/tui-js-path.php");?>  

<script defer src="components/date_picker_edate.js"></script>
<script defer src="components/date_picker_sdate.js"></script>
<script defer src="grid/addGrid.js"></script>
<script defer src="grid/searchGrid.js"></script>

<body>
    <?php
    
    include_once("../../db/dbConnect.php");

    $task_id = $_GET["task_id"];
    $sql = "select * from work_list where task_id = '$task_id'";
    $result = mysqli_query($con,$sql);
    
    $data = mysqli_fetch_array($result);
    
    ?>
    <section>
        <div class="border">
        <div>
            <button type="button" class="btn listBtn" >목록 보기</button>
        </div>
            <div class="title">업무 조회</div>
            <div class="main">
                <figure class="container">
                    <div class="title">상품 추가</div>
                    <?php include_once("../../components/search_bar.php");?>
                    <button button type=button class="addBtn btn">상품 추가</button>
                    <div style="width:100%;">
                        <div id="searchGrid" style="width:97%; height:500px; overflow:auto; margin-left:auto; margin-right:auto;"></div>
                    </div>   
                </figure> 
                <figure class="container">
                    <div class="title">현재 대기중인 업무</div>
                    <div class="titleBar">
                        <div class="optionChannel" style="margin-bottom:10px;">
                                <label for="" style="margin-right:45px;">채 널</label>
                                <select id="channel" class="channelSel">
                                    <option value = "1300k">1300K</option>    
                                    <option value = "29cm">29cm</option>
                                    <option value = "artbox">아트박스</option>
                                    <option value = "kakao">카카오톡</option>
                                    <option value = "10x10">텐바이텐</option>
                                </select>
                            </div>
                        <div style="margin-bottom:10px;">
                            <label for="" style="margin-right:10px;">등록일자</label>
                            <input type="text" class="optionInput" id="wdate" value="<?php echo date("Y-m-d"); ?>" readonly>
                        </div>
                        <div class="optionTitle" style="margin-bottom:10px;">
                            <label for="" style="margin-right:25px;">업무명</label>
                            <input type="text" class="optionInput" id="titleInput" value="<?php echo $data['task_title']; ?>" size=60 maxlength=40>
                        </div>
                    </div>
                    <button button type=button class="deleteBtn btn">상품 삭제</button>
                    <div style="width:100%;">
                        <div id="addGrid" style="width:97%; height:500px; overflow:auto; margin-left:auto; margin-right:auto"></div>
                    </div>
                    <button button type=button class= "btn submitBtn">업무 등록</button>  
                </figure>
            </div> 
        </div>   
    </section>
</body>
<script src="function/progress_page.js"></script>
<script src="function/search.js"></script>
<script>
    // db에서 가져온 값으로 select 선택해서 보여주기
     document.getElementById("channel").value = "<?=$data["design_ch"]?>";
</script>
</html>


