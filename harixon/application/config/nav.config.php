<?php
	$config['nav'] = array(
		array(
			'name' => '首页',
			'url' => '',
			'active' => array()
		),
		array(
			'name' => '新闻中心',
			'url' => 'news/newslist?type=1',
			'active' => array('newslist','newsdetail'),
			'list' => array(
				array(
					'name' => '公司新闻',
					'url' => 'news/newslist?type=1',
					'active' => array('newslist','newsdetail'),
					'active_type' => '1',
				),
				array(
					'name' => '行业新闻',
					'url' => 'news/newslist?type=2',
					'active' => array('newslist','newsdetail'),
					'active_type' => '2',
				)
			)
		),
		array(
			'name' => '产品中心',
			'url' => 'product/productlist',
			'active' => array('productlist','productdetail')
		),
		array(
			'name' => '行业解决方案',
			'url' => 'schema/schemalist',
			'active' => array('schemalist','schemadetail')
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
			'active' => array('productlist','productedit')
		),
		array(
			'name' => '行业解决方案',
			'url' => 'backmanage/schemalist',
			'active' => array('schemalist','schemaedit')
		),
		array(
			'name' => '关于我们',
			'url' => 'backmanage/aboutedit',
			'active' => array('about')
		)
	)
?>