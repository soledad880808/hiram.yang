<?php
	$config['nav'] = array(
		array(
			'name' => '首页',
			'url' => '',
			'active' => array()
		),
		array(
			'name' => '关于我们',
			'url' => 'about/introduction',
			'active' => array('introduction','newslist','newsdetail','certificate','cooperate','provision'),
			'list' => array(
				array(
					'name' => '公司介绍',
					'url' => 'about/introduction',
					'active' => array('introduction')
				),
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
				),
				array(
					'name' => '质量证书',
					'url' => 'about/certificate',
					'active' => array('certificate')
				),
				array(
					'name' => '合作伙伴',
					'url' => 'about/cooperate',
					'active' => array('cooperate'),
				),
				array(
					'name' => '条件与条款',
					'url' => 'about/provision',
					'active' => array('provision'),
				),
			),
		),
		array(
			'name' => '行业解决方案',
			'url' => 'schema/schemacategory',
			'active' => array('schemacategory','schemalist','schemadetail'),
			'has_db' => 1
		),
		array(
			'name' => '产品中心',
			'url' => 'product/productcategory',
			'active' => array('productcategory','productlist','productdetail'),
			'has_db' => 1
		),
		array(
			'name' => '联系我们',
			'url' => 'contact/contacts',
			'active' => array('contacts','join'),
			'list' => array(
				array(
					'name' => '联系方式',
					'url' => 'contact/contacts',
					'active' => array('contacts')
				),
				array(
					'name' => '加入我们',
					'url' => 'contact/join',
					'active' => array('join'),
				),
			)
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
			'name' => '产品分组',
			'url' => 'backmanage/productcategory',
			'active' => array('productcategory','productcategoryedit')
		),
		array(
			'name' => '产品中心',
			'url' => 'backmanage/productlist',
			'active' => array('productlist','productedit')
		),
		array(
			'name' => '行业解决方案分组',
			'url' => 'backmanage/schemacategory',
			'active' => array('schemacategory','schemacategoryedit')
		),
		array(
			'name' => '行业解决方案',
			'url' => 'backmanage/schemalist',
			'active' => array('schemalist','schemaedit')
		),
		array(
			'name' => '关于我们',
			'url' => 'backmanage/aboutedit',
			'active' => array('aboutedit')
		),
		array(
			'name' => '加入我们',
			'url' => 'backmanage/joinedit',
			'active' => array('joinedit')
		),
		array(
			'name' => '条件与条款',
			'url' => 'backmanage/provisionedit',
			'active' => array('provisionedit')
		)
	)
?>