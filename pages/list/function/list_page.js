// list page와 관련된 js

$(function(){

    // 검색 기능
    $(".searchBtnIndex").click(function(){
        
        var select = $(".searchSel option:selected").val();
        var value = "";
        switch(select){
    
            case "task_title":
                var value = $("#searchInput").val();
                break;  
    
            case "design_ch":
                var value = $(".channelSel option:selected").val();
                break;  
    
            case "task_status":
                var value = $(".statusSel option:selected").val();
                break;
    
            case "updatedate":
                var date = datepicker.getDate();
                var today = JSON.stringify(date);
                var value = today.slice(1,11); 
                break;  
        }

        if(value==""){
            alert("검색어를 입력해주세요.");
            return;
        }
    
        var data = {type:select,value:value};
        grid.readData(1,data,true);

    }) //searchBtn 이벤트 end

    //select 값의 따라 다른 선택지 보여주기
    $(".searchSel").change(function(){
        var select = $(".searchSel option:selected").val();

        switch(select){
            case "design_ch":
                $(".channelSel").show();
                $(".statusSel").hide();
                $("#searchInput").hide();
                $(".datepicker").hide();
                break;
    
            case "task_status":
                $(".channelSel").hide();
                $(".statusSel").show();
                $("#searchInput").hide();
                $(".datepicker").hide(); 
                break;
    
            case "task_title":
                $(".statusSel").hide();
                $(".channelSel").hide();
                $("#searchInput").show();
                $(".datepicker").hide();
                break;
    
            case "updatedate":
                $(".statusSel").hide();
                $(".channelSel").hide();
                $("#searchInput").hide();
                $(".datepicker").css("display","inline-block");
                $(".datepicker").show();
                break;
        }


    }) //searchSel 이벤트 end

    // db에서 업무 삭제하기
    $(".delectBtnIndex").click(function(){

        let rowkey = grid.getCheckedRowKeys();
    
        if(Object.keys(rowkey).length === 0){
            alert("삭제할 업무를 선택해주세요.");
            return;
        }
    
        if(confirm("업무를 삭제하시겠습니까?") == true){
            let value = Object.values(rowkey);
            let task_id = [];
            
            for(let i=0; i<value.length; i++){
                let val = grid.getValue(value[i], 'task_id');
                task_id[i] = val;
            }
    
            let sendData = JSON.stringify(task_id);
    
            $.ajax({
                url: "./db/delete.php",
                type: "POST",
                data: sendData,
                success: function (data) {
                location.href = "./index.php";
                },
                error: function (jqXHR) {
                console.log(jqXHR.textStatus);
                },
            });
        }

    }) //deleteBtn 이벤트 end

    $(".uploadBtn").click(function(){
        location.href = "pages/write/upload.php";
    })

})

