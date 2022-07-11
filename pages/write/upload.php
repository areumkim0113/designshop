
<?php include_once("../../includes/header.php");?> 
<title>Register</title>
<link rel="stylesheet" href="../../css/common.css">
<link rel="stylesheet" href="css/upload.css">

<?php include_once("../../includes/tui-css-link.php");?>
<?php include_once("../../includes/tui-js-path.php");?>  

<script defer src="components/date_picker_edate.js"></script>
<script defer src="components/date_picker_sdate.js"></script>
<script defer src="grid/uploadGrid.js"></script>
<script defer src="grid/searchGrid.js"></script>

<body>
    <section>
        <div class="border">
            <div>
                <button type="button" class="btn listBtn" >목록 보기</button>
            </div>
            <div class="title">신규 등록</div>
            <div class="main">
                <figure class="container">
                    <div class="title">상품 검색</div>
                        <?php include_once("../../components/search_bar.php");?>
                        <button button type=button class="btn addBtn">상품 추가</button>
                        <button button type=button class="btn changeBrand" style="margin-left:4px"><a href="/api/change_brand.php">브랜드 변경</a></button>
                        <div style="width:100%;">
                            <div id="searchGrid" style="width:97%; height:500px; overflow:auto; margin-left:auto; margin-right:auto;"></div>
                        </div>  
                </figure>

                <figure class="container">
                    <div class="title">상품 등록</div>
                    <div class="uploadBar"> 
                        <div>
                            <label for=""  style="margin-right:36px;">업무명</label>
                            <input type="text" id="titleInput" size=60 maxlength=40 placeholder='업무명은 40자까지 입력가능합니다.'>
                        </div>
                        <div>
                            <label for="" style="margin-right:36px;">채널명</label>
                            <select name="channel" class="channelSel">
                                <option value = "1300k">1300K</option>    
                                <option value = "29cm">29cm</option>
                                <option value = "artbox">아트박스</option>
                                <option value = "kakao">카카오톡</option>
                                <option value = "10x10">텐바이텐</option>
                            </select>
                        </div>
                    </div>
                    <button button type=button class="btn deleteBtn">상품 삭제</button>
                    <div style="width:100%;">
                        <div id="uploadGrid" style="width:97%; height:500px; overflow:auto; margin-left:auto; margin-right:auto"></div>
                    </div>
                    <div class="submitBar">
                        <button button type=button class="btn saveBtn" >임시 저장</button> 
                        <button button type=button class="btn submitBtn" >업무 등록</button> 
                    </div>
                </figure> 
            </div> 
        </div>    
    </section>
    <script src="function/upload_page.js"></script>
    <script src="function/search.js"></script>
</body>
</html>