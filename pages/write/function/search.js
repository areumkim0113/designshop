//플토 search 기능 관련 js

$(function(){

  // searchGrid 검색 기준이 될 사용자 입력값 가져오기
  $(".searchBtn").click(function(){

    grid.clear();

    var date1 = JSON.stringify(datepicker_s.getDate());
    var date2 = JSON.stringify(datepicker_e.getDate());
  
    var s_date = date1.slice(1, 11);
    var e_date = date2.slice(1, 11);
    var product_name = $(".name").val();
    var sol_cate_no = $(".categorySel option:selected").val();
    // var code_cate = $(".codeSel option:selected").val();
    // var code_value = $(".code").val();
  
    var data = {
      sdate: s_date,
      edate: e_date,
      search_word: product_name,
      sol_cate_no: sol_cate_no,
      // multi_type: code_cate,
      // code_value: code_value,
    };

    grid.readData(1, data, true);

  })

  // 날짜 버튼 클릭 시 date_picker 변경
  $(".dateBtn").click(function () {
    var now = new Date();
    var value = $(this).val();
    var start_date = "";

    if (value == "today") {
      start_date = now;
    } else if (value == "1month") {
      start_date = new Date(now.setMonth(now.getMonth() - 1));
    } else if (value == "3month") {
      start_date = new Date(now.setMonth(now.getMonth() - 3));
    } else if (value == "6month") {
      start_date = new Date(now.setMonth(now.getMonth() - 6));
    } else if (value == "1year") {
      start_date = new Date(now.setFullYear(now.getFullYear() - 1));
    } else if (value == "all") {
      start_date = new Date("2021-06-04");
    }

    datepicker_s.setDate(start_date);
  });

  //-----선택한 열 테이블에서 지우기
  $(".deleteBtn").click(function(){

    var rowkey = uploadGrid.getCheckedRowKeys();
    uploadGrid.removeRows(rowkey);

  })

  //-----선택한 열 테이블에 추가하기
  $(".addBtn").click(function(){

    var selData = [];

    //선택한 상품 정보
    var data = grid.getCheckedRows();

    //선택한 상품정보 중 판매자 상품코드만 따로 저장
    for(var i=0; i<Object.keys(data).length; i++){
      const value = Object.values(data[i]);
      selData.push(value[1]);
    }
    
    //선택한 상품정보의 판매자 상품코드 개수만큼 반복
    for(var i=0; i<Object.keys(selData).length; i++){

      //row를 추가할 테이블에서 선택한 판매자 상품코드 있는지 여부 확인
      result = uploadGrid.findRows({c_sale_cd:selData[i]});
  
      // 판매자 상품코드가 없다면 row 추가
      if(result == ''){
        uploadGrid.prependRow(data[i]);

      }else {
        continue;

      }
    }
    grid.uncheckAll();
    uploadGrid.uncheckAll();
  })  

  $(".listBtn").click(function(){
    location.href = "../../index.php";
  })

})
