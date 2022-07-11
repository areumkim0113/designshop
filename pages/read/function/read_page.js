

$(function(){

    //url에 있는 work_id를 받아서 read.php로 보내기
    const urlParams = new URL(location.href).searchParams;

    const task_id = { "task_id" : urlParams.get("task_id") };
    readGrid.readData(1, task_id, true);

    $(".listBtn").click(function(){
        location.href = "../../index.php";
    })

})

