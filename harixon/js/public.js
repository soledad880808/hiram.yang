function success(msg){
	swal('',msg,'success');
}

function error(msg){
	swal('',msg,'error');
}

function confirm(msg,callback){
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

function showPage(curpage,totalpage){
	if(totalpage == 0){
		return '';
	}
	curpage = parseInt(curpage);
	totalpage = parseInt(totalpage);
	var page = '<div class="row page_div">';
	page += '<div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers"><ul class="pagination">';
	if(curpage==1){
		page += '<li class="paginate_button previous disabled"><a href="javascript:void(0)" aria-label="Previous"><span aria-hidden="true">Previous</span></a></li>';
	}else{
		var lastpage = curpage-1;
		page += '<li class="paginate_button previous"><a href="javascript:void(0)" class="data-page"  data-page="' + lastpage + '" aria-label="Previous"><span aria-hidden="true">Previous</span></a></li>';
	}
	if(curpage <= 6){
		var startpage = 1;
		if(totalpage >= 10){
			var endpage = 10;
		}else{
			var endpage = totalpage;
		}
	}else{ 
		if(curpage >= (totalpage - 5)){
			if(totalpage >= 10){
				var startpage = totalpage - 9;
			}else{
				var startpage = 1;
			}
			var endpage = totalpage;
		}else{
			var startpage = curpage - 5;
			var endpage = curpage + 4;
		}
	}
	for(var i=startpage;i<=endpage;i++){
		if(curpage == i){
			page += '<li class="paginate_button active"><a href="">' + i + '</a></li>';
		}else{
			page += '<li class="paginate_button"><a data-page="' + i + '" class="data-page" href="javascript:void(0)">' + i + '</a></li>';
		}
	}
	if(curpage == totalpage || totalpage==1){
		page += '<li class="paginate_button next disabled"><a href="javascript:void(0)" aria-label="Next"><span aria-hidden="true">Next</span></a></li>';
	}else{
		var nextpage = curpage+1;
		page += '<li class="paginate_button next"><a href="javascript:void(0)" class="data-page" data-page="' + nextpage + '" aria-label="Next"><span aria-hidden="true">Next</span></a></li>';
	}
	page += '</ul></div></div></div>';
	return page;
}