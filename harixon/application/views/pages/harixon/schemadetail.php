        <div class="main-content news-wrapper">
            <p class="title"><?php echo $schemadetail['title']?></p >
            <span class="info" ><?php echo !empty($schemadetail['published']) ? date('Y年m月d日',$schemadetail['published']) : date('Y年m月d日');?>&nbsp;&nbsp;&nbsp;&nbsp;作者：<?php echo $schemadetail['creator'];?></span>
            <hr style="margin-bottom: 30px;" >
            <div class="fixck"><?php echo $schemadetail['content']?></div>
        </div>
    </div>
</div>
<style>
    .news-wrapper{
        color: #888;
    }
    .news-wrapper p.title{
        font-size: 24px;
        color: #313131;
        text-align: center;
    }
    .news-wrapper .info{
        display:  block;
        text-align:  center;
        margin-top: 10px;
    }
    .news-wrapper .item{
        margin-top: 15px;
    }
</style>