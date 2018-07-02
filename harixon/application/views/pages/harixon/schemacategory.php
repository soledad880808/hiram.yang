        <div class="main-content product-list">
            <?php
                $i = 0;
                foreach($categorylist as $key => $value){
                    if($i%3 == 0){
                        echo '<ul class="clearfix">';
                    }
                    echo '<li><div class="box">';
                    echo '<a class="timage" href="' . base_url('schema/schemalist?type=' . $value['id']) . '">';
                    echo '<img src="' . $value['pic'] . '"></a>';
                    echo '<h4 class="title"><p>' . $value['name'] . '</p></h4>';
                    echo '<p class="tjustify">' . $value['describe'] . '</p>';
                    echo '</div></li>';
                    if($i%3 == 2){
                        echo '</ul>';
                    }
                    $i++;
                }
            ?>
            </ul>
            <div id="kkpager"></div>
        </div>
    </div>
</div>
<input type="hidden" id="total" value="<?php echo $total?>">
<input type="hidden" id="pageno" value="<?php echo $pageno?>">
<input type="hidden" id="pagetotal" value="<?php echo $pagetotal?>">
<style>
    .product-list {
        margin-top: 10px;
    }
    .tjustify {
        padding-top: 10px;
        color: #888;
        line-height: 22px;
    }
    .product-list ul li {
        display: block;
        float: left;
        width: 33.33333%;
    }
    .box{
        padding:5px 20px 30px 0;
    }
    .timage img {
        width: 100%;
        height: 105px;
        display: block;
        background: url(../img/bg-slider-bottom.png) 0 0 repeat;
        padding: 7px;
        margin: 0 0 15px 0;
    }
    .title{
        font-size: 20px;
        color: #104A7C;
    }
</style>
<script>
    var pageno = $('#pageno').val(),
        total = $('#total').val(),
        pagetotal = $('#pagetotal').val();
    //生成分页
    //有些参数是可选的，比如lang，若不传有默认值
    kkpager.generPageHtml({
        pno: pageno,
        //总页码
        total: pagetotal,
        //总数据条数
        totalRecords: total,
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