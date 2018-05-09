<?php
	function qp( $name , $filters = '' , $default = '' ){
		$str = isset($_REQUEST[$name]) ? $_REQUEST[$name] :'';
		if( $filters == '' && $default == '' ){
			return $str;
		}
		if( $filters ){
			$filters = explode( ',' , $filters);
			foreach($filters as $filter){
				if( function_exists($filter) ){
					$str = $filter($str);
				}
				else{
					if( filter_id($filter) ){
						//filter函数支持的类型
						$options = array();
						//如果是string，不对单引号进行编码
						if($filter == 'string'){
							$options = array( 'flags' => FILTER_FLAG_NO_ENCODE_QUOTES );
						}
						$str = filter_var($str , filter_id($filter) , $options );
						if(false === $str) {
							return $default;
						}
					}
					else{
						//自定义类型
					}
				}
			}
		}
		return $str;
	}

	function showpage($curpage,$pagesize,$total)
	{
		if($total < 1)
		{
			return '';
		}
		parse_str($_SERVER['QUERY_STRING'],$param);
		unset($param['pageno']);
		$query_str = http_build_query($param);
		$base_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?';
		$totalpage = ceil($total/$pagesize);
		if(!empty($query_str))
		{
			$base_url .= $query_str;
		}
		/*$from_num = ($curpage-1)*$pagesize+1;
		$to_num = $curpage*$pagesize;
		if($to_num > $total){
			$to_num = $total;
		}
		$html = '<div class="row"><div class="col-sm-5"><div class="dataTables_info" role="status" aria-live="polite">Showing ' . $from_num . ' to ' . $to_num . ' of ' . $total . ' entries</div></div>';*/
		$html = '<div class="row">';
		$html .= '<div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers"><ul class="pagination">';
		if($curpage==1)
		{
			$html .= '<li class="paginate_button previous disabled"><a href="javascript:void(0)" aria-label="Previous"><span aria-hidden="true">Previous</span></a></li>';
		}
		else
		{
			$html .= '<li class="paginate_button previous"><a href="' . $base_url . '&pageno=' . ($curpage-1) . '" aria-label="Previous"><span aria-hidden="true">Previous</span></a></li>';
		}
		if($curpage <= 6){
			$startpage = 1;
			if($totalpage >= 10){
				$endpage = 10;
			}else{
				$endpage = $totalpage;
			}
		}elseif($curpage >= ($totalpage - 5)){
			if($totalpage >= 10){
				$startpage = $totalpage - 9;
			}else{
				$startpage = 1;
			}
			$endpage = $totalpage;
		}else{
			$startpage = $curpage - 5;
			$endpage = $curpage + 4;
		}
		for($i=$startpage;$i<=$endpage;$i++){
			if($curpage == $i)
			{
				$html .=' <li class="paginate_button active"><a href="">' . $i . '</a></li>';
			}
			else
			{
				$html .='<li class="paginate_button"><a href="' . $base_url . '&pageno=' . $i . '">' . $i . '</a></li>';
			}
		}
		if($curpage == $totalpage || $totalpage==1){
			$html .= '<li class="paginate_button next disabled"><a href="javascript:void(0)" aria-label="Next"><span aria-hidden="true">Next</span></a></li>';
		}else{
			$html .= '<li class="paginate_button next"><a href="' . $base_url . '&pageno=' . ($curpage+1) . '" aria-label="Next"><span aria-hidden="true">Next</span></a></li>';
		}
		$html .= '</ul></div></div></div>';
		return $html;
	}