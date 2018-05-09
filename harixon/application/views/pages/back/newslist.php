<section class="content-header">
	<h1>
	    <small>新闻列表</small>
	</h1>
</section>
<section class="content">
	<div class="box">
    	<div class="box-header">
    		<button id="J-add" class="btn btn-info pull-right">添加</button>
    	</div>
		<div class="box-body">
			<table class="table table-bordered table-striped" style="table-layout:fixed">
				<thead>
					<tr>
						<th>id</th>
						<th>新闻标题</th>
						<th>内容</th>
						<th>更新时间</th>
						<th>创建时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?PHP
					if(!empty($newslist)){
						foreach($newslist as $key => $value){
							echo '<tr>';
							echo '<td>' . $value['id'] . '</td>';
							echo '<td>' . $value['title'] . '</td>';
							echo '<td><a href="' . base_url('backmanage/newscontent?id=' . $value['id']) . '" >查看</a></td>';
							echo '<td>' . date('Y-m-d H:i:s',$value['updated']) . '</td>';
							echo '<td>' . date('Y-m-d H:i:s',$value['created']) . '</td>';
							echo '<td><a href="' . base_url('backmanage/newsedit?id=' . $value['id']) . '">编辑</a></td>';
						}
					}
				?>
				</tbody>
			</table>
			<?php echo $showpage;?>
		</div>
	</div>
</section>
<div id="J-content-div" style="display:none;" class="pop-up">
	<div class="row">
		<div class="col-xs-12" id="J-content">
		</div>
	</div>
</div>
<script>
	$('.J-show-content').click(function(){
		$('#J-content').text($(this).attr('value'));
		artDialog({
			title: '新闻内容',
			show: true,
			content: $('#J-content-div')[0],
			lock:true,
			ok: true,
			cancel: false
		});
	});

	$('#J-add').click(function(){
		location.href = domain + 'backmanage/newsedit';
	});
</script>