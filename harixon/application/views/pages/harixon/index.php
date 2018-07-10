<!DOCTYPE html>
<html>

<head>
	<meta content="text/html;charset=utf-8" http-equiv="content-type">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<title>海汭森（上海）工程技术有限公司【官网】</title>
	<meta name="keywords" content="海汭森,线性传感器" />
	<meta name="description" content="海汭森（上海）工程技术有限公司，主要经营技术，注册资本万元，公司是建筑工程业的知名企业，公司坚持诚信、互利，为客户提供最好的服务和最实惠的价格，我公司的办公地址在中国（上海）自由贸易试验区郭守敬路351号2号楼A654-27室，如果您对我们的产品服务有兴趣，请在线咨询或者拨打我们的电话，联系电话是。热诚欢迎各界朋友前来参观、洽谈业务。"
	/>
	<link rel="stylesheet" href="<?php echo base_url();?>css/common.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/index.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fonts/iconfont.css">
	<script src="<?php echo base_url();?>js/jquery-2.1.3.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>css/swiper.min.css">
	<script src="<?php echo base_url();?>js/swiper.min.js"></script>

</head>

<body>
	<div class="header">
		<div class="wrapper">
			<ul class="nav mt20">
			<?php
				foreach($_nav as $key => $value){
					if($value['url'] == ''){
						echo '<li><a href="' . base_url($value['url']) . '" class="active">' . $value['name'] . '</a>';
					}else{
						echo '<li><a href="' . base_url($value['url']) . '">' . $value['name'] . '</a>';
					}
					if(isset($value['list']) || isset($value['has_db'])){
                        echo '<div class="childcontent" style="display: none">';
                        echo '<div class="megacol" style="width:200px"><ul>';
                        if(!isset($value['has_db'])){    
                                foreach($value['list'] as $k => $v){
                                    echo '<li class="mega"><a href="' . base_url($v['url']) . '">' . $v['name'] . '</a></li>';
                                }
                            }else{
                                if($value['name'] == '产品中心'){
                                    $list = $_product_category;
                                    $url = 'product/productlist';
                                }elseif($value['name'] == '行业解决方案'){
                                    $list = $_schema_category;
                                    $url = 'schema/schemalist';
                                }
                                foreach($list as $k => $v){
                                    echo '<li class="mega"><a href="' . base_url($url) . '?type=' . $k . '">' . $v . '</a></li>';
                                }
                            }
                        echo '</ul></div></div>';
                    }
                    echo '</li>';
				}
			?>
				<div class="logo">
					<a href="">
						<img src="<?php echo base_url();?>img/leo_logo_1.png" alt="">
					</a>
				</div>
			</ul>
			<div class="mod-languages">
					<ul class="lang-inline">
						<li class="" dir="ltr">
							<a href="/en/">
								<img src="http://www.lase.de/media/mod_languages/images/en.gif" alt="English (UK)" title="English (UK)"> </a>
						</li>
						<li class="lang-active" dir="ltr">
							<a href="/">
								<img src="http://www.lase.de/media/mod_languages/images/de.gif" alt="Deutsch" title="Deutsch"> </a>
						</li>
					</ul>
			</div>
		</div>
	</div>
	<div class="banner">
		<div class="swiper-container wrapper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img src="<?php echo base_url();?>img/2.png" alt="">
				</div>
				<div class="swiper-slide">
					<img src="<?php echo base_url();?>img/3.png" alt="">
				</div>
			</div>
			<div class="swiper-pagination"></div>

			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
	</div>
	<div class="main wrapper">
		<div class="content mt20 clearfix">
			<div class="float_left news" style="width:30%">
				<div class="moduletable">
					<dl class="item">
						<dt class="title">公司新闻：</dt>
						<?php
							$i = 1;
							foreach($company_newslist as $key => $value){
								$style = '';
								if($i == 1){
									$style = ' style="margin-top:10px"';
								}
								echo '<dd class="con"' . $style . '>';
								echo '<p class="J-news" data-type="' . $value['type'] . '" data-id="' . $value['id'] . '" style="cursor:pointer">' . $value['title'] . '</p>';
								echo '<span class="time">' . (!empty($value['published']) ? date('Y-m-d',$value['published']) : date('Y-m-d')) . '</span>';
								echo '</dd>';
								$i++;
							}
						?>
					</dl>
					<dl class="item mt20">
						<dt class="title">行业新闻：</dt>
						<?php
							$i = 1;
							foreach($industry_newslist as $key => $value){
								$style = '';
								if($i == 1){
									$style = ' style="margin-top:10px"';
								}
								echo '<dd class="con"' . $style . '>';
								echo '<p class="J-news" data-type="' . $value['type'] . '" data-id="' . $value['id'] . '" style="cursor:pointer">' . $value['title'] . '</p>';
								echo '<span class="time">' . (!empty($value['published']) ? date('Y-m-d',$value['published']) : date('Y-m-d')) . '</span>';
								echo '</dd>';
								$i++;
							}
						?>
					</dl>

					<div class="form-model mt20">
						<div class="title">获取联系方式</div>
						<input class="inputbox mt10" type="text" placeholder="地址">
						<input class="inputbox mt10" type="text" placeholder="电话">
						<input class="inputbox mt10" type="text" placeholder="传真">
						<div class="search-box mt10">
							<input class="inputbox" type="text" placeholder="搜索">
							<span class="search-btn">搜索</span>
						</div>
						<div class="btn mt20">获取最新资料</div>
					</div>
				</div>
			</div>
			<div class="float_right product" style="width:70%">
				<h4 class="title">
					<a href="">海汭森的自动化解决方案</a>
				</h4>
				<p class="tjustify">
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp海汭森（上海）工程技术有限公司专注于工业自动化产品的研发、生产、销售和技术服务，为工业自动化设备制造商提供整体解决方案，是中国领先的机器自动化解决方案供应商。公司主要产品包括智能相机、机器视觉系统、工业自动化解决方案、工业人机界面等；广泛应用于钢铁工业、物流和仓储、风能、汽车工业、港口、工程机械等工业领域。随着国内劳动力成本的日益增加，国民经济众多行业对自动化设备和系统的需求将不断增长，公司产品和技术的应用领域亦将更加广泛。
					<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp公司以“为全球客户提供中国人的自动化解决方案”为使命，坚持投入大量资源进行自动化技术平台的研发，并在上海设有研发机构。公司已拥有多项专利和软件著作权。在公司自动化技术平台基础上开发的解决方案，被世界知名跨国公司采用。公司严格按照ISO9001质量体系的要求实行从研发、生产到销售的全面质量管理，以项目管理制的方式保证快速响应客户需求。通过分布全国及海外的经销商网络，为客户提供售前咨询、方案设计、项目实施和售后服务等全方位支持。奉行以客户为导向的理念，通过研究客户需求，挖掘高增长产业与自动化平台的结合机会，充分发挥技术平台价值。
					<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp公司本着“以人为本，追求卓越”的经营理念，“亲和顾客”的价值规范，提倡“快乐工作”，建立“共建共享”的价值分配准则。我们以“自动化创造美好生活”为愿景，最终的目标是为客户创造最大价值。
				</p>
				<div class="product-list">
					<ul class="clearfix">
					<?php
						if(!empty($_schema_index)){
							foreach($_schema_index as $key => $value){
								echo '<li><div class="box">';
								echo '<a class="timage" href="' . base_url('schema/schemalist?type=' . $value['id']) . '"><img src="' . $value['pic'] . '" alt=""></a>';
								echo '<h4 class="title"><a href="">' . $value['name'] . '</a></h4>';
								echo '<p class="tjustify">' . $value['describe'] . '</p></div></li>';
							}
						}
					?>
					</ul>
				</div>
			</div>
		</div>

		<div class="whoChoose">
			<h3 class="mt20">推荐产品</h3>
			<div class="swiper-container wrapper">
				<div class="swiper-wrapper">
				<?php
					if(!empty($_product_index)){
						foreach($_product_index as $key => $value){
							echo '<div class="swiper-slide"><div>';
							echo '<img style="width:95%" src="' . $value['pic'] . '" alt="">';
							echo '<h4>' . $value['name'] . '</h4>';
							echo '<p>' . $value['describe'] . '</p></div></div>';
						}
					}
					if(!empty($_schema_index)){
						$i = 0;
						foreach($_schema_index as $key => $value){
							if($i == 3){
								break;
							}
							echo '<div class="swiper-slide"><div>';
							echo '<img style="width:95%" src="' . $value['pic'] . '" alt="">';
							echo '<h4>' . $value['name'] . '</h4>';
							echo '<p>' . $value['describe'] . '</p></div></div>';
							$i++;
						}
					}
				?>
				</div>

			</div>
			<div class="swiper-pagination"></div>
		</div>
	</div>
	<div class="footer mt20">
		<div class="wrapper clearfix">
		<?php
            foreach($_nav as $key => $value){
                if(!empty($value['url'])){
                    echo '<div class="column">';
                    echo '<h3><a style="color:#104A7C" href="' . base_url($value['url']) . '">' . $value['name'] . '</a></h3>';
                    if(isset($value['list']) || isset($value['has_db'])){
                        echo '<ul class="menu">';
                        if(!isset($value['has_db'])){
                            foreach($value['list'] as $k => $v){
                                echo '<li class="item">';
                                echo '<a href="' . base_url($v['url']) . '">' . $v['name'] . '</a>';
                                echo '</li>';
                            }
                        }else{
                             if($value['name'] == '产品中心'){
                                $list = $_product_category;
                                $url = 'product/productlist';
                            }elseif($value['name'] == '行业解决方案'){
                                $list = $_schema_category;
                                $url = 'schema/schemalist';
                            }
                            foreach($list as $k => $v){
                                echo '<li class="item">';
                                echo '<a href="' . base_url($url) . '?type=' . $k . '">' . $v . '</a>';
                                echo '</li>';
                            }
                        }
                        echo '</ul>';
                    }
                    echo '</div>';
                }       
            }
        ?>
		</div>
		<div class="footer-info wrapper">
			<small>Copyright © 2018 海汭森（上海）工程技术有限公司 All Rights Reserved. </small>
		</div>

	</div>
	<img class="code" src="<?php echo base_url();?>img/liantu.png" alt="">
</body>
<script type="text/javascript">
	$(function () {
		var mySwiper = new Swiper('.banner .swiper-container', {
			direction: 'horizontal',
			autoplay: true,
			pagination: {
				el: '.swiper-container .swiper-pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.swiper-container .swiper-button-next',
				prevEl: '.swiper-container .swiper-button-prev',
				hideOnClick: true,
			},
		})
		var arr = ['工业产品', '行业解决方案']
		var mySwiper2 = new Swiper('.whoChoose .swiper-container', {
			slidesPerView: 3,
			spaceBetween: 30,
			slidesPerGroup: 3,
			loop: true,
			loopFillGroupWithBlank: true,
			pagination: {
				el: '.whoChoose .swiper-pagination',
				clickable: true,
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + arr[index] + '</span>';
				}
			},
		})
	
	
		$(".nav li").hover(function(){
			$(this).find('.childcontent').stop(true, true).slideDown();
		},function(){
			$(this).find('.childcontent').stop(true, true).slideUp();
		})
	});

	$('.J-news').click(function(){
		var id = $(this).data('id'),
			type = $(this).data('type');
			location.href = '<?php echo base_url();?>news/newsdetail?id=' + id + '&type=' + type;
	});
</script>

</html>