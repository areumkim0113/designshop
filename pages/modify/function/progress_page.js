// progress page와 관련된 js

$(function(){
    
  //-----progress.php에 work_id에 해당하는 상품 정보 출력하기
  //url에 있는 work_id를 받아서 read.php로 보내기
  const urlParams = new URL(location.href).searchParams;
  const id = urlParams.get("task_id");

  const task_id = { task_id: id };
  addGrid.readData(1, task_id, true);

  //db 저장하기
  $(".submitBtn").click(function(){

    var title = $("#titleInput").val();
    var tableData = addGrid.getData();
    var channel = $(".channelSel option:selected").val();
  
    if(tableData == ""){
      alert("상품을 추가해주세요.");
      return;
    }

    var data = {
      task_id: id,
      title: title,
      tableData: tableData,
      channel: channel,
    };
    var sendData = JSON.stringify(data);
  
    $.ajax({
      url: "../../db/update.php",
      type: "POST",
      data: sendData,
      success: function (data) {
        alert(data);
        location.href = "../../index.php";
      },
      error: function (jqXHR) {
        console.log(jqXHR.textStatus);
      },
    });
  })

})




