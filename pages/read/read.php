
<?php include_once("../../includes/header.php");?> 
<title>Read</title>
<link rel="stylesheet" href="../../css/common.css">
<link rel="stylesheet" href="css/read.css">

<?php include_once("../../includes/tui-css-link.php");?>
<?php include_once("../../includes/tui-js-path.php");?>  

<script defer src="grid/readGrid.js"></script>
    <body>
        <?php

        include_once("../../db/dbConnect.php");

        $task_id = $_GET["task_id"];
        $sql = "select * from work_list where task_id = '$task_id'";
        $result = mysqli_query($con,$sql);

        $data = mysqli_fetch_array($result);

        if($data['task_status'] == "Done"){
            $val = "display:none";
        }

        ?>        
        <section class="mainIndex">             
            <div>
                <button type="button" class="btn listBtn">목록 보기</button>
            </div>
            <div class="title">업무 조회</div>
            <div class="titleBar">
                <div class="optionChannel" style="margin-bottom:10px;">
                    <label for="" style="margin-right:36px;">채 널</label>
                    <input type="text" class="optionInput1" id="titleInput" value="<?php echo $data['design_ch']; ?>" readonly>
                </div>
                <div>
                    <label for="" style="margin-bottom:10px;">등록일자</label>
                    <input type="text" class="optionInput2" value="<?php echo substr($data['updatedate'],0,10); ?>" readonly>
                </div>
                <div class="optionTitle">
                    <label for="" style="margin-right:16px;">업무명</label>
                    <input type="text" class="optionInput2" id="titleInput" value="<?php echo $data['task_title']; ?>" size=60 maxlength=40 readonly>
                </div>
            </div>
            <div>
                <button type="button" class="btn submitBtnRead" style = '<?php echo $val?>' onclick="location.href='../modify/progress.php?task_id=<?php echo $task_id?>'">업무 재등록</button>
            </div>
            <div id="readGrid" style="width:70%; margin-left:auto; margin-right:auto"></div> 
        </section>  
    </body>
    <script src="function/read_page.js"></script>
</html>

