
    const grid = new tui.Grid({
        el: document.getElementById('grid'),
        data: {
            api: {
            readData: { url: 'db/allList.php', method: 'GET' }
            },
        }, 
        scrollX: true,
        scrollY: true, 
        rowHeaders: [
            {type:'checkbox'},
            {type:'rowNum'}
        ],
        columns: [
            {
            header: '업무아이디',
            name: 'task_id',
            hidden: true
            },
            {
            header: '업무명',
            name: 'task_title',
            width: 450,
            align: 'center',
            formatter(value) {
                const title = value.value;
                const task_id = value.row['task_id'];

                const work_status = value.row['task_status'];
                
                // 업무상태에 따라서 다른 페이지로 연결
                if(work_status == "Wait"){
                    return `<a href="pages/modify/progress.php?task_id=${task_id}" >${title}</a>`;
                }else if(work_status == "Done" || work_status == "Error"){
                    return `<a href="pages/read/read.php?task_id=${task_id}" >${title}</a>`;
                }else if(work_status == "Running"){
                    return `${title}`;
                }
            },
            },
            {
            header: '등록일',
            name: 'updatedate',
            filter: 'text',
            sortable: true,
            sortingType: 'desc',
            align: 'center',
            width: 250
            },
            {
            header: '채널명',
            name: 'design_ch',
            filter: 'text',
            sortable: true,
            sortingType: 'desc',
            align: 'center',
            width: 250,
            formatter(value){

                const val = value.value;
                
                if(val=='10x10'){
                    const channel = '텐바이텐';
                    return `${channel}`;
                }else if(val=='1300k'){
                    const channel = '1300K';
                    return `${channel}`;
                }else if(val=='kakao'){
                    const channel = '카카오톡';
                    return `${channel}`;
                }else if(val=='artbox'){
                    const channel = '아트박스';
                    return `${channel}`;
                }else if(val=='29cm'){
                    const channel = '29cm';
                    return `${channel}`;
                }
            }},
            {
            header: '등록된 상품 개수',
            name: 'product_count',
            align: 'center',
            width: 150
            },
            {
            header: '진행상태',
            name: 'task_status',
            filter: 'text',
            sortable: true,
            sortingType: 'desc',
            align: 'center',
            width: 180,
            formatter(value){

                const val = value.value;

                if(val=='Wait'){
                    const status = '대기중';
                    return `${status}`;
                }else if(val=='Error'){
                    const status = '등록오류';
                    return `${status}`;
                }else if(val=='Done'){
                    const status = '완료';
                    return `${status}`;
                }else if(val=='Running'){
                    const status = '등록진행중';
                    return `${status}`;
                }
            }}
        ],
        pageOptions:{
            useClient: true,
            perPage:15
        }
    });

    tui.Grid.applyTheme('default',{

        row: {
            hover:{
                background: '#ccc'
            }
        }
    });

    

    

    