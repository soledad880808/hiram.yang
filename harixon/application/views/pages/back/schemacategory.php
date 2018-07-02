<section class="content-header">
	<h1>
	    <small>行业解决方案分组</small>
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
						<th>分组名称</th>
						<th>排序</th>
						<th>是否首页推荐</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?PHP
					if(!empty($schemacategory)){
						foreach($schemacategory as $key => $value){
							echo '<tr>';
							echo '<td>' . $value['id'] . '</td>';
							echo '<td>' . $value['name'] . '</td>';
							echo '<td>' . $value['order'] . '</td>';
							echo '<td>' . ($value['is_index'] == 1 ? '是' : '否') . '</td>';
							echo '<td><a href="' . base_url('backmanage/schemacategoryedit?id=' . $value['id']) . '">编辑</a>|<a href="javascript:void(0)" class="J-del" value="' . $value['id'] . '">删除</a></td>';
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
			url = domain + 'backmanage/delschemacategory';
		var param = {
			'id':id
		}
		sconfirm('确认删除该条行业解决方案分组？',function(){
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
		location.href = domain + 'backmanage/schemacategoryedit';
	});
</script>