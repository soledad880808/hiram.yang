function success(msg){
	swal('',msg,'success');
}

function error(msg){
	swal('',msg,'error');
}

function sconfirm(msg,callback){
	swal({
		title:'',
		text:msg,
		type:'warning',
        html:true,
		showCancelButton:true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "确定",   
		cancelButtonText: "取消",
		closeOnConfirm: false
	},
	function(isConfirm){
		if(isConfirm){
			callback();
		}
	});
}

function ajaxRequest(url,param,callback)
{
	showLoading(1);
	param = param ? param : {};
	var method = arguments[3] ? arguments[3]: 'post';
		method = method != 'post' && method != 'get' ? 'post' : method;
	var datatype = arguments[4] ? arguments[4] : 'json';
	for (var key in param)
    {
		if(param[key])
		{
			param[key]=param[key].toString();
		}
    }
	var result = {};
	$.ajax({
		type:method,
		url:url,
		data:param,
		dataType:datatype,
		success:function(obj){
			if(obj.code == 5){
				location.href = obj.url;
			}
			callback(obj);
			showLoading(0);
		},
		error:function(XMLHttpRequest, textStatus, errorThrown)
		{
			showLoading(0);
		}
	});
}

function showLoading(flag){
	if(flag==1){
		if(!$('#loading')[0]){
			var html='<div id="loading" style="position:relative;z-index:99999;">';
			html+='<div style="width:100%;height:100%;position:fixed;background:black;top:0;left:0;opacity:0.5;"></div>';
			html+='<div style="position:fixed;width:50%;height:120px;left:25%;right:25%;top:30%;text-align:center;padding-top:60px;border-top-left-radius:20px;border-top-right-radius:20px;">';
			html+='<img src="'+domain+'images/loading.gif"></img>';
			html+='<span style="display:block;margin-top:20px;font-size:16px;">正在载入...</span>';
			html+='</div></div>';
			$(html).appendTo('body');
		}
	}else{
		$('#loading').remove();
	}
}