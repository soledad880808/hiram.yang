        <div class="main-content product-list">
            <ul>
                <li>
                    <div>
                        <a href="<?php echo base_url('product/productdetail')?>">
                            <img src="./img/ssi.png" alt="">
                            <p>产品名称产品名称产品名称</p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="<?php echo base_url('product/productdetail')?>">
                            <img src="./img/ssi.png" alt="">
                            <p>产品名称产品名称产品名称</p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="<?php echo base_url('product/productdetail')?>">
                            <img src="./img/ssi.png" alt="">
                            <p>产品名称产品名称产品名称</p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="<?php echo base_url('product/productdetail')?>">
                            <img src="./img/ssi.png" alt="">
                            <p>产品名称产品名称产品名称</p>
                        </a>
                    </div>
                </li>
            </ul>
            <div id="kkpager"></div>
        </div>
    </div>
</div>
<style>
    .product-list {
        color: #888;
    }

    .product-list ul li {
        float: left;
        width: 33.3333%;
        box-sizing: border-box;
        padding-right: 10px;
        margin-bottom: 20px;
    }

    .product-list ul li img {
        width: 90%;
        height: 130px;
        background: url('http://lase.de/templates/lase/images/stripline.png') 0 0 repeat;
        padding: 7px;
    }

    .product-list ul li a {
        display: block;
        overflow: hidden;
        font-size: 16px;
        white-space: nowrap;
        text-overflow: ellipsis;
        color: #104A7C;
        text-align: center;
    }
    .product-list ul li a:hover{
        opacity: .8;
    }
    .product-list ul li p{
        padding-top: 10px;
    }
</style>
<script>
    //生成分页
    //有些参数是可选的，比如lang，若不传有默认值
    kkpager.generPageHtml({
        pno: 10,
        //总页码
        total: 20,
        //总数据条数
        totalRecords: 100,
        //链接前部
        hrefFormer: 'demo',
        //链接尾部
        hrefLatter: '.html',
        isGoPage: false,
        getLink: function (n) {
            return this.hrefFormer + this.hrefLatter + "?pno=" + n;
        }, mode: 'click',//默认值是link，可选link或者click
        click: function (n) {
            this.selectPage(n);
            return false;
        }
    });
</script>