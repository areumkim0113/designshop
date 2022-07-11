
    <?php include_once("includes/header.php");?> 

    <title>Design Shop</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="pages/list/css/list.css">

    <?php include_once("includes/tui-css-link.php");?>
    <?php include_once("includes/tui-js-path.php");?>  

    <script defer src="pages/list/components/date_picker.js"></script>
    <script defer src="pages/list/grid/listGrid.js"></script>
    
    <body>
        <section class="mainIndex"> 
            <div class="title"><i class="fa-light fa-ballot"></i>전체 업무 목록</div>   
                <div class="searchBar">
                    <select name="search" class="searchSel">
                        <option value = "task_title">업무명</option>
                        <option value = "design_ch">채널</option>
                        <option value = "task_status">진행상태</option>
                        <option value = "updatedate">등록일시</option>
                    </select>   
                    <input type="text" id="searchInput">
                    <select class="channelSel" style="display:none">    
                        <option value = "1300k">1300K</option>    
                        <option value = "29cm">29cm</option>
                        <option value = "artbox">아트박스</option>
                        <option value = "kakao">카카오톡</option>
                        <option value = "10x10">텐바이텐</option>
                    </select>
                    <select class="statusSel" style="display:none">
                        <option value = "Wait">대기중</option>
                        <option value = "Error">등록오류</option>
                        <option value = "Done">완료</option>
                    </select>
                    <div class="datepicker" style="display:none">
                        <div class="tui-datepicker-input tui-datetime-input tui-has-focus">
                            <input type="text" id="datepicker-input" aria-label="Date-Time" style="z-index:5;">
                            <span class="tui-ico-date" style="z-index:5;"></span>
                        </div>
                        <div id="wrapper" style="margin-top: -1px;"></div>
                    </div>      
                    <button button type="button" class="btn searchBtnIndex">검색</button>
                    <button button type="button" class="btn uploadBtn">신규 업무 등록</button>      
                </div>
                <div>
                    <button button type="button" class="btn delectBtnIndex">업무 삭제</button>
                </div>  
                <div id="grid" style="width:80%; margin:auto;"></div> 
        </section>  
    </body>
    <script src="pages/list/function/list_page.js"></script>
</html>