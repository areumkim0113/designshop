
//한달 전 날짜로 지정
var now = new Date();
var start_date = new Date(now.setMonth(now.getMonth()-1));

var datepicker_s = new tui.DatePicker('#wrapper1', {
            date: start_date,
            input: {
                element: '#datepicker-input1',
                format: 'yyyy-MM-dd'
            }
});
       

