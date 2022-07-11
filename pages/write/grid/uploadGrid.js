

    const uploadGrid = new tui.Grid({
        el: document.getElementById('uploadGrid'),
        scrollX: true,
        scrollY: true, 
        rowHeaders: [
            {type:'checkbox'},
            {type:'rowNum'}
        ],
        columns: [
            {
            header: '등록일',
            name: 'wdate',
            filter: 'text',
            sortable: true,
            sortingType: 'desc',
            align: 'center',
            width: 80,
            formatter(value){
                const val = value.value;
                const date = val.slice(0,10);
                return ` ${date}`;
            }
            },
            {
            header: '판매자 상품 코드',
            name: 'c_sale_cd',
            align: 'center',
            width: 145
            },
            {
            header: '카테고리',
            name: 'pa_sol_cate_name',
            filter: 'text',
            sortable: true,
            sortingType: 'desc',
            align: 'center',
            width: 80
            },
            {
            header: '상품명',
            name: 'shop_sale_name',
            align: 'center',
            width: 500
            }
        ],
        pageOptions:{
            useClient: true,
            perPage:30
        },
    });

    tui.Grid.applyTheme('default',{

        row: {
            hover:{
                background: '#ccc'
            }
        }
    });

    //데이터 리로드 이벤트 : 로우키 리셋을 위함
    uploadGrid.on('uncheckAll',()=>{
            let newData = uploadGrid.getData();
            uploadGrid.resetData(newData);
            uploadGrid.restore();
        });
