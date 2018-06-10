<section class="content-header">
	<h1>
	    <small>行业解决方案列表</small>
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
						<th>标题</th>
						<th>标题图片</th>
						<th>内容</th>
						<th>更新时间</th>
						<th>创建时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?PHP
					if(!empty($schemalist)){
						foreach($schemalist as $key => $value){
							echo '<tr>';
							echo '<td>' . $value['id'] . '</td>';
							echo '<td>' . $value['title'] . '</td>';
							echo '<td><a href="javascript:void(0)" value="' . $value['title_pic'] . '" class="J-show-titlepic">查看</a></td>';
							echo '<td><a href="' . base_url('backmanage/schemacontent?id=' . $value['id']) . '" >查看</a></td>';
							echo '<td>' . date('Y-m-d H:i:s',$value['updated']) . '</td>';
							echo '<td>' . date('Y-m-d H:i:s',$value['created']) . '</td>';
							echo '<td><a href="' . base_url('backmanage/schemaedit?id=' . $value['id']) . '">编辑</a>|<a href="javascript:void(0)" class="J-del" value="' . $value['id'] . '">删除</a></td>';
						}
					}
				?>
				</tbody>
			</table>
			<?php echo $showpage;?>
		</div>
	</div>
</section>
<div id="J-img-div" style="display:none;" class="pop-up">
	<div class="row">
		<img id="J-img" src="">
	</div>
</div>
<script>
	$('.J-show-titlepic').click(function(){
		$('#J-img').attr('src',$(this).attr('value'));
		artDialog({
			title: '标题图片',
			show: true,
			content: $('#J-img-div')[0],
			lock:true,
			ok: true,
			cancel: false
		});
	});

	$('.J-del').click(function(){
		var id = $(this).attr('value'),
			url = domain + 'backmanage/delschema';
		var param = {
			'id':id
		}
		sconfirm('确认删除该条解决方案？',function(){
			ajaxRequest(url,param,function(obj){
				if(obj.code == 1){
					location.reload();
				}else{
					error(obj.desc);
				}
			});
		});
	});

	$('#J-add').click(function(){
		location.href = domain + 'backmanage/schemaedit';
	});
</script>