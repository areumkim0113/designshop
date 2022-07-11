//upload page 관련된 js

$(function () {

  // --------사용자가 입력한 값 db에 저장하기
  $(".saveBtn").click(function(){

    var title = $("#titleInput").val();
    var tableData = uploadGrid.getData();

    if (title == "") {
      alert("업무명을 입력해주세요.");
      return;
    }else if(tableData == ""){
      alert("등록할 상품을 선택해주세요.");
      return;
    }

    var channel = $(".channelSel option:selected").val();
    var time = $(".uploadTimeSel option:selected").val();

    var data = { title: title, tableData: tableData, channel: channel, time:time };
    var sendData = JSON.stringify(data);

    var url = "../../db/insert.php"

    dbSave(url,sendData);
    
  })

  // ------db저장 후 파이썬 스크립트 
  $(".submitBtn").click(function(){
    var title = $("#titleInput").val();
    var tableData = uploadGrid.getData();
  
    if (title == "") {
      alert("업무명을 입력해주세요.");
      return;
    }else if(tableData == ""){
      alert("등록할 상품을 선택해주세요.");
      return;
    }
  
    var channel = $(".channelSel option:selected").val();
    var data = { title: title, tableData: tableData, channel: channel };
    var sendData = JSON.stringify(data);
    
    var url = "../../db/insert_python.php";
    
    dbSave(url,sendData);


  })

  function dbSave(url,sendData){
    $.ajax({
      url: url,
      type: "POST",
      data: sendData,
      success: function (data) {
        alert(data)
        location.href = "../../index.php";
      },
      error: function (jqXHR) {
        console.log(jqXHR.textStatus);
      },
    });
  }

}); 

