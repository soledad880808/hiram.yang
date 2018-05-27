        <div class="main-content news-list">
            <ul>
            <?php
                foreach($newslist as $key => $value){
                    echo '<li><i class="icon"></i><a href="' . base_url('news/newsdetail?id=' . $value['id'] . '&type=' . $value['type']) . '">' . $value['title'] . '</a><span class="time">' . date('Y-m-d',$value['updated']) . '</span></li>';
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
    .news-list {
        color: #888;
    }
    .news-list ul {
        padding-bottom: 20px;
    }
    .news-list ul li{
        display: block;
        padding-top: 20px;
        padding-bottom: 4px;
        border-bottom: 1px dotted #d0d0d0;
        position: relative;
    }
    .news-list ul li i{
        display: inline-block;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #104A7C;
        margin-right: 6px;
        position: relative;
        top:-2px;
    }
    .news-list ul li a{
        font-size: 14px;
    }
    .news-list ul li a:hover{
        color:  #104A7C;
    }
    .news-list ul li .time{
    position: absolute;
    right: 0px;
    top:24px;
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