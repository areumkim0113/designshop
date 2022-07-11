
    const grid = new tui.Grid({
        el: document.getElementById('searchGrid'),
        data: {
            api: {
            readData: { url: '../../api/plto_api.php', method: 'GET' }
            },
        }, 
        scrollX: true,
        scrollY: true, 
        rowHeaders: ['checkbox'],
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
            header: '이미지',
            name: 'image',
            align: 'center',
            width: '70',
            formatter(value){
                const url = value.row['sale_img_url'];
                const image_title = value.row['sale_img1'];

                const image_url = url+image_title;

                return `<a href="${image_url}" target="_blank"><img src="${image_url}" width=30 height=30></a>`;
            }
            },
            {
            header: '이미지주소',
            name: 'sale_img_url',
            align: 'center',
            hidden: true
            },
            {
            header: '이미지 이름',
            name: 'sale_img1',
            align: 'center',
            hidden: true
            },
            {
            header: '판매자 상품 코드',
            name: 'c_sale_cd',
            align: 'center',
            width: 'auto'
            },
            {
            header: '카테고리',
            name: 'sol_cate_no',
            filter: 'text',
            sortable: true,
            sortingType: 'desc',
            align: 'center',
            width: 'auto',
            formatter(value){

                const val = value.value;

                if(val=='267022'){
                    const cate = '가방 및 레더 파우치';
                    return `${cate}`;
                }else if(val=='228228'){
                    const cate = '돗자리';
                    return `${cate}`;
                }else if(val=='228215'){
                    const cate = '레더노트';
                    return `${cate}`;
                }else if(val=='228213'){
                    const cate = '레더코스터';
                    return `${cate}`;
                }else if(val=='228205'){
                    const cate = '마우스패드';
                    return `${cate}`;
                }else if(val=='228195'){
                    const cate = '머그컵';
                    return `${cate}`;
                }else if(val=='330071'){
                    const cate = '맨투맨';
                    return `${cate}`;
                }else if(val=='228203'){
                    const cate = '목걸이지갑';
                    return `${cate}`;
                }else if(val=='228219'){
                    const cate = '무릎담요';
                    return `${cate}`;
                }else if(val=='228225'){
                    const cate = '바란스';
                    return `${cate}`;
                }else if(val=='266354'){
                    const cate = '반팔티셔츠';
                    return `${cate}`;
                }else if(val=='228221'){
                    const cate = '발매트';
                    return `${cate}`;
                }else if(val=='228230'){
                    const cate = '비치타월';
                    return `${cate}`;
                }else if(val=='506633'){
                    const cate = '셔츠/남방';
                    return `${cate}`;
                }else if(val=='228233'){
                    const cate = '스티커';
                    return `${cate}`;
                }else if(val=='228189'){
                    const cate = '아트벽시계';
                    return `${cate}`;
                }else if(val=='228201'){
                    const cate = '여권케이스';
                    return `${cate}`;
                }else if(val=='228199'){
                    const cate = '엽서북';
                    return `${cate}`;
                }else if(val=='308836'){
                    const cate = '에어팟버즈';
                    return `${cate}`;
                }else if(val=='267021'){
                    const cate = '웰컴키트 및 테이블 텐트';
                    return `${cate}`;
                }else if(val=='248013'){
                    const cate = '이불베개';
                    return `${cate}`;
                }else if(val=='411539'){
                    const cate = '일반쿠션';
                    return `${cate}`;
                }else if(val=='228193'){
                    const cate = '종이포스터';
                    return `${cate}`;
                }else if(val=='226411'){
                    const cate = '캔버스액자';
                    return `${cate}`;
                }else if(val=='228209'){
                    const cate = '캘린더';
                    return `${cate}`;
                }else if(val=='228231'){
                    const cate = '쿠션커버';
                    return `${cate}`;
                }else if(val=='228197'){
                    const cate = '텀블러';
                    return `${cate}`;
                }else if(val=='228191'){
                    const cate = '패브릭포스터';
                    return `${cate}`;
                }else if(val=='228187'){
                    const cate = '폰악세서리';
                    return `${cate}`;
                }else if(val=='228181'){
                    const cate = '폰케이스';
                    return `${cate}`;
                }
            }
            },
            {
            header: '상품명',
            name: 'shop_sale_name',
            filter: 'text',
            sortable: true,
            sortingType: 'desc',
            align: 'center',
            width: 500
            }
        ],
        pageOptions:{
            useClient: true,
            perPage:30
        }
    });

    tui.Grid.applyTheme('default',{

        row: {
            hover:{
                background: '#ccc'
            }
        }
    });
