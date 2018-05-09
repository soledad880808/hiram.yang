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
			'name' => '行业解决方案',
			'url' => 'schema',
			'active' => array('schema')
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

	$config['_back_left'] = array(
		array(
			'name' => '新闻中心',
			'url' => 'backmanage/newslist',
			'active' => array('newslist','newsedit')
		),
		array(
			'name' => '联系我们',
			'url' => 'backmanage/contactedit',
			'active' => array('contactedit')
		),
		array(
			'name' => '产品中心',
			'url' => 'backmanage/productlist',
			'active' => array('productlist')
		)
	)
?>