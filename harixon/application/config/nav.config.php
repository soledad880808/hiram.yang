<?php
	$config['nav'] = array(
		array(
			'name' => '首页',
			'url' => '',
			'active' => array()
		),
		array(
			'name' => '新闻中心',
			'url' => 'news',
			'active' => array('news')
		),
		array(
			'name' => '产品中心',
			'url' => 'product',
			'active' => array('product','productdetail')
		),
		array(
			'name' => '关于我们',
			'url' => 'about',
			'active' => array('about')
		),
		array(
			'name' => '联系我们',
			'url' => 'contact',
			'active' => array('contact')
		)
	);
?>