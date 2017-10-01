<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php if(isset($title)){ echo $title; }else{ echo '婚纱摄影'; }?></title>
    <meta name="Description" content="<?php if(isset($desc)){ echo $desc; }else{ echo '婚纱摄影'; }?>">
    <meta name="Keywords" content="<?php if(isset($keyword)){ echo $keyword; }else{ echo '婚纱摄影'; }?>">
    <link rel="stylesheet" href="/xincss/style1.css">
    <link rel="stylesheet" href="/xincss/dateRange.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="/xinjs/main.js"></script>
    <script type="text/javascript" src="/xinjs/jquery.SuperSlide.2.1.1.js" ></script>
    <script type="text/javascript" src="/xinjs/template.js"></script>
	<script type="text/javascript" src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
	<script type="text/javascript" src="http://tajs.qq.com/stats?sId=63774616" charset="UTF-8"></script>
</head>
<body>
<header>
    <div class="main">
        <div class="lft logo"><a href="{{asset($pycity)}}/sheying"><img alt="有榜" src="{{asset('xinimage/logo.png')}}"></a> </div>  
       <div class="city">
	<ul class="nav-main">
		<li id="li-1" class="txtCtr "><font class="area1" id="area" tt="{{$pycity}}">{{$city}}</font><span>[切换]</span></li>            </ul>          
  <!--隐藏盒子-->            <div id="box-1" class="hidden-box hidden-loc-index">          
  <h3>当前所在的地区：<span class="area2">{{$city}}</span></h3>                
  <p class="quyu">华北东北</p>                <p>                    
  <a href="/beijing">北京</a>
  <a href="/tianjin">天津</a>
  <a href="/shenyang">沈阳</a>
  <a href="/dalian">大连</a>
  <a href="/haierbin">哈尔滨</a>
  <a href="/shijiazhuang">石家庄</a></p>
  <p class="quyu">华东地区</p>                
  <p>                    
  <a href="/shanghai">上海</a>
  <a href="/hangzhou">杭州</a>
  <a href="/xiamen">厦门</a>
  <a href="/nanjing">南京</a>
  <a href="/suzhou">苏州</a>
  <a href="/wuxi">无锡</a>
  <a href="/ningbo">宁波</a>
  <a href="/fuzhou">福州</a>
  <a href="/qingdao">青岛</a>
  <a href="/hefei">合肥</a></p>
  <p class="quyu">中部西部</p>
  <p>                  
  <a href="/chengdu">成都</a>
  <a href="/chongqing">重庆</a>
  <a href="/changsha">长沙</a>
  <a href="/zhengzhou">郑州</a>
  <a href="/xian">西安</a>
  <a href="/wuhan">武汉</a></p>
  <p class="quyu">华南地区</p>
  <p>                
   <a href="/guangzhou">广州</a>
   <a href="/shenzhen">深圳</a></p>        
       </div>       
        </div>
   <nav>                      
    <a href="/{{$pycity}}/sheying">首页</a>
            <a href="/{{$pycity}}/sheying">婚纱摄影</a>
            <a href="/{{$pycity}}/hunli">婚礼策划</a>
            <a rel="nofollow" href="http://youbangkeyi.mikecrm.com/IBLzKFT"  target="_blank">商户入驻</a>
            <a href="/guize.html"  target="_blank">榜单规则</a>  </nav> 
                <div class="search"><ul><form id="search_form" action="/search/index" method="get" onsubmit="return false;"><li class="li1" style="position: relative;"><input type="text" name="keyword" placeholder="搜索商家" value="" id="search_keyword" autocomplete="off"><button type="submit" id="submit"><svg viewBox="0 0 16 16" class="Icon Icon--search" width="16" height="16" aria-hidden="true" style="height: 16px; width: 16px;"><title></title><g><path d="M12.054 10.864c.887-1.14 1.42-2.57 1.42-4.127C13.474 3.017 10.457 0 6.737 0S0 3.016 0 6.737c0 3.72 3.016 6.737 6.737 6.737 1.556 0 2.985-.533 4.127-1.42l3.103 3.104c.765.46 1.705-.37 1.19-1.19l-3.103-3.104zm-5.317.925c-2.786 0-5.053-2.267-5.053-5.053S3.95 1.684 6.737 1.684 11.79 3.95 11.79 6.737 9.522 11.79 6.736 11.79z"></path></g></svg></button></li></form></ul></div>
    </div>
</header>
<div class="focus">
<div class="bg"></div>
    <div class="index">
    <h1 class="paitit">{{$city}}婚纱摄影 TOP100榜单</h1>
    <div class="text">实时监测全国<span class="blue">170,000+</span>商户的全网用户品牌搜索、评论等数据维度<br />
利用人工智能分析算法获得该榜单。</div>
        <div class="form rgt">
        <div class="txt txtCtr"><span>根据您的需求，定制专属榜单</span>已为3457人提供定制榜单服务</div>
            <div class="sewvmain">
                <div class="tb"></div>
                <div class="sewv">
                    <div class="sewvtop"><span id="customized_name">婚纱摄影</span><em><img src="{{asset('xinimage/icon26.png')}}"></em></div>
                    <ul class="sewvbm">
                        <h3></h3>
                        <li class="cur xq1">婚纱摄影</li>
                        <li class="xq1">婚礼策划</li>
                    </ul>
                </div>
                <div class="sewv">
                    <div class="sewvtop"><span id="style">选择风格</span><em><img src="{{asset('xinimage/icon26.png')}}"></em></div>
                    <ul class="sewvbm" style="left: -124px">
                        <h3></h3>
                        <li class="xq2">小清新</li>
                        <li class="xq2">韩式</li>
                        <li class="xq2">欧美大气</li>
                        <li class="xq2">个性</li>
                        <li class="xq2">复古</li>
                        <li class="xq2">性感</li>
                    </ul>
                </div>
            </div>
            <div class="input">
                <input type="text" id="budget" name="budget" placeholder="您的预算">
                <input type="text" id="phone" name="phone" placeholder="您的手机">
                <input type="text" id="name" name="name" placeholder="您的姓名">
            </div>
            <div class="submit txtCtr"><a href="javascript:void(0)">立即定制</a> </div>
        </div>
    </div>
</div>
<div class="index" style="margin-top:-50px;z-index: 999;">
    <div class="tab txtCtr hd">
        <ul>
            <li class="active" tt="1">综合榜单</li>
            <li class="active" tt="2">品牌榜单</li>
            <li class="active" tt="4">好评榜单</li>
        </ul>
    </div>
<div class="bd">
<div class="i-list">
<div class="time-box">
        <div class="time lft">
            <div>
                    <span style="
    font-size:18px;
    color: #999;
">2017年7月9日（周四）</span>
                </div>
                <div id="datePicker1"></div>
            <p>更新时间：<em>2017-02-24  09:22:35</em></p>
        </div>
        <div class="txt lft">
<span class="blue">200+ </span>个覆盖城市<br /><span class="blue">120,000+ </span>家婚嫁商户
        </div>
        <div class="txt lft">
<span class="blue">10 </span>个数据采集渠道 <br /><span class="blue">18 </span>个数据统计维度
        </div>
                <div class="txt lft">
<span class="blue">40,000 </span>对结婚新人<br /><span class="blue">500万+ </span>用户真实点评
        </div>
        <div class="rgt share">
                <!-- JiaThis Button BEGIN -->
                <div class="jiathis_style">
                    <a class="jiathis_button_weixin"></a>
                    <a class="jiathis_button_qzone"></a>
                    <a class="jiathis_button_cqq"></a>
                    <a class="jiathis_button_tsina"></a>
                </div>
                <script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
                <!-- JiaThis Button END -->
        </div>
    </div>
<div class="list">
        <ul id="main">
		<?php if(isset($oneinfo) && isset($oneinfo->id) && $oneinfo->id) {?>
			<li>
                 <div class="num lft">
                     <em class="txtCtr"><span class="zhidingad"></span></em>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <a href="/detail/{{$oneinfo->id}}"><img src="/{{$oneinfo->cover}}"></a>
                        <div class="txt">
                            <h3><a href="/detail/{{$oneinfo->id}}">{{$oneinfo->name}}</a> </h3>
                            <div class="t1">人均消费：<span class="red">¥{{$oneinfo->person_price}}</span></div>
                            <div class="t2"><span>{{$oneinfo->address}}</span></div>
                            <div class="t3"><span>品牌搜索<em>{{$oneinfo->brand_search_num}}</em>次/天</span><span>全网好评<em>{{$oneinfo->praise_num}}</em>条</span><span>全网差评<em>{{$oneinfo->bad_num}}</em>条</span></div>
                            <div class="tool">
                                <em class="txtCtr blue">{{$oneinfo->heat_index}}</em>
                                <div class="tooltip txtCtr">指数</div>
                            </div>
                            <div class="hot txtCtr">
                                <a href="/dafen/{{$pycity}}/{{$oneinfo->id}}" rel="nofollow">打榜</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
			<?php } ?>
			<!--前20条数据的显示-->
		<?php if(count($tenants)){
			foreach($tenants as $key=>$v){
				?>
			<?php if ($key==2 && isset($advinfo['id'])){ ?>
				<div class="guanggao"><?php if(isset($advinfo['id'])){ echo $advinfo['content']; }  ?></div>
			<?php } ?>
			<?php if ($v->isVip==1){ ?>
			<li>
                <div class="num lft">
						<em class="txtCtr"><?php if($type=='1'){ echo $v->order_city; }else if($type=='2'){ echo $v->price_order; }else if($type=='4'){ echo $v->praise_order; } ?><span>TOP</span></em>
                    <div class="txtCtr <?php if($v->is_up==1){ echo 's1'; }else if($v->is_up==2){ echo 's2'; }else{ echo 's3'; }?> txt"><?php if($v->is_up==0){ ?>持平<?php }elseif($v->is_up==1){ ?>上升<?php echo $v->is_up_num.'位'; }else if($v->is_up==2){ ?>下降<?php  echo $v->is_up_num.'位'; }?></div>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <a href="{{url('detail')}}/{{$v->id}}"><img src="/{{$v->cover}}"></a>
                        <div class="txt">
                            <h3><a href="{{url('detail')}}/{{$v->id}}">{{$v->name}}</a></h3>
                            <div class="t1">人均消费：<span class="red">¥{{$v->person_price}}</span></div>
                            <div class="t2"><span>{{$v->address}}</span></div>
                            <div class="t3"><span>品牌搜索<em>{{$v->brand_search_num}}</em>次/天</span><span>全网好评<em>{{$v->praise_num}}</em>条</span><span>全网差评<em>{{$v->bad_num}}</em>条</span></div>
                            <div class="tool">
                                <em class="txtCtr blue">{{$v->heat_index}}</em>
                                <div class="tooltip txtCtr">指数</div>
                            </div>
                            <div class="hot txtCtr">
                                <a href="/dafen/{{$pycity}}/{{$v->id}}" rel="nofollow">打榜</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
			<?php }else if($v->isVip==2){ ?>
			
			<li>
				<div class="huiyuan"></div>
                <div class="num lft">
   						<em class="txtCtr"><?php if($type=='1'){ echo $v->order_city; }else if($type=='2'){ echo $v->price_order; }else if($type=='4'){ echo $v->praise_order; } ?><span>TOP</span></em>
                    <div class="txtCtr <?php if($v->is_up==1){ echo 's1'; }else if($v->is_up==2){ echo 's2'; }else{ echo 's3'; }?> txt"><?php if($v->is_up==0){ ?>持平<?php }elseif($v->is_up==1){ ?>上升<?php echo $v->is_up_num.'位'; }else if($v->is_up==2){ ?>下降<?php  echo $v->is_up_num.'位'; }?></div>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <div class="txt">
                            <h3><a href="{{url('detail')}}/{{$v->id}}">{{$v->name}}</a></h3>
                            <div class="t1">人均消费：<span class="red">¥{{$v->person_price}}</span></div>
                            <div class="t2"><span>{{$v->address}}</span></div>
                            <div class="t3"><span>品牌搜索<em>{{$v->brand_search_num}}</em>次/天</span><span>全网好评<em>{{$v->praise_num}}</em>条</span><span>全网差评<em>{{$v->bad_num}}</em>条</span></div>
                            <div class="tool">
                                <em class="txtCtr blue">{{$v->heat_index}}</em>
                                <div class="tooltip txtCtr">指数</div>
                            </div>
                            <div class="hot txtCtr">
                                <a href="/dafen/{{$pycity}}/{{$v->id}}" rel="nofollow">打榜</a>
                            </div>
                        </div>
                    </div>
                    <div class="pic-box">
                        <div class="leftLoop">
                            <div class="bd">
                                <ul>
									<?php if(isset($v->taoxis) && $v->taoxis){
										foreach($v->taoxis as $k=>$t){
											if($k<4){
									?>
                                    <li>
                                        <div class="pic detail"><a href="/detail/{{$v->id}}/{{$t->id}}"><img alt="{{$t->setName}}" src="/{{$t->cover[0]}}" /></a></div>
                                        <div class="title detail"><a href="/detail/{{$v->id}}/{{$t->id}}">{{$t->setName}}</a></div>
                                        <div class="price">
                                            <span class="red">¥{{$t->currentPrice}}</span><em>原价 <i>¥{{$t->price}}</i></em>
                                        </div>
                                    </li>
									<?php }}} ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
		<?php }}}?>

		<!--20到100条数据的显示-->
		<?php if(count($tenants2)){
			foreach($tenants2 as $key=>$v){
				?>
			<?php if ($v->isVip==1){ ?>
			<li>
                <div class="nump lft">
					<em class="txtCtr <?php if($v->is_up==1){ echo 's1'; }else if($v->is_up==2){ echo 's2'; }else{ echo 's3'; }?>">Top<?php if($type=='1'){ echo $v->order_city; }else if($type=='2'){ echo $v->price_order; }else if($type=='4'){ echo $v->praise_order; } ?></em>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <div class="txt">
                            <h4 class="lft"><a href="{{url('detail')}}/{{$v->id}}">{{$v->name}}</a></h3>
                            <div class="mr40">人均消费：<span class="red">¥{{$v->person_price}}</span></div>
                            <div class="t20"><span>品牌搜索<em>{{$v->brand_search_num}}</em>次/天</span><span>全网好评<em>{{$v->praise_num}}</em>条</span><span>全网差评<em>{{$v->bad_num}}</em>条</span></div>
                            <div class="tl20">
                                <em class="txtCtr blue">{{$v->heat_index}}</em>
                            </div>
                            <div class="hot20 txtCtr">
                                <a href="/dafen/{{$pycity}}/{{$v->id}}" rel="nofollow"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
			<?php }else if($v->isVip==2){ ?>
			
			<li>
				<div class="huiyuan"></div>
                <div class="num lft">
 						<em class="txtCtr"><?php if($type=='1'){ echo $v->order_city; }else if($type=='2'){ echo $v->price_order; }else if($type=='4'){ echo $v->praise_order; } ?><span>TOP</span></em>
                    <div class="txtCtr <?php if($v->is_up==1){ echo 's1'; }else if($v->is_up==2){ echo 's2'; }else{ echo 's3'; }?> txt"><?php if($v->is_up==0){ ?>持平<?php }elseif($v->is_up==1){ ?>上升<?php echo $v->is_up_num.'位'; }else if($v->is_up==2){ ?>下降<?php  echo $v->is_up_num.'位'; }?></div>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <div class="txt">
                            <h3><a href="{{url('detail')}}/{{$v->id}}">{{$v->name}}</a></h3>
                            <div class="t1">人均消费：<span class="red">¥{{$v->person_price}}</span></div>
                            <div class="t2"><span>{{$v->address}}</span></div>
                            <div class="t3"><span>品牌搜索<em>{{$v->brand_search_num}}</em>次/天</span><span>全网好评<em>{{$v->praise_num}}</em>条</span><span>全网差评<em>{{$v->bad_num}}</em>条</span></div>
                            <div class="tool">
                                <em class="txtCtr blue">{{$v->heat_index}}</em>
                                <div class="tooltip txtCtr">指数</div>
                            </div>
                            <div class="hot txtCtr">
                                <a href="/dafen/{{$pycity}}/{{$v->id}}" rel="nofollow">打榜</a>
                            </div>
                        </div>
                    </div>
                    <div class="pic-box">
                        <div class="leftLoop">
                            <div class="bd">
                                <ul>
									
									<?php if(isset($v->taoxis) && $v->taoxis){
										foreach($v->taoxis as $k=>$t){
											if($k<4){
									?>
                                    <li>
                                        <div class="pic detail"><a href="/detail/{{$v->id}}/{{$t->id}}"><img alt="{{$t->setName}}" src="/{{$t->cover[0]}}" /></a></div>
                                        <div class="title detail"><a href="/detail/{{$v->id}}/{{$t->id}}">{{$t->setName}}</a></div>
                                        <div class="price">
                                            <span class="red">¥{{$t->currentPrice}}</span><em>原价 <i>¥{{$t->price}}</i></em>
                                        </div>
                                    </li>
									<?php }}} ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
		<?php }}}?>
	<script id="maintemp" type="text/html">
			@{{if oneinfo && oneinfo.id}}
			<li>
                 <div class="num lft">
                     <em class="txtCtr"><span class="zhidingad"></span></em>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <a href="javascript:void(0);"><img src="http://ceshi.youbangkeyi.com/@{{oneinfo.cover}}"></a>
                        <div class="txt">
                            <h3><a href="http://ceshi.youbangkeyi.com/detail/@{{oneinfo.id}}">@{{oneinfo.name}}</a> </h3>
                            <div class="t1">人均消费：<span class="red">¥@{{oneinfo.person_price}}</span></div>
                            <div class="t2"><span>@{{oneinfo.address}}</span></div>
                            <div class="t3"><span>品牌搜索<em>@{{oneinfo.brand_search_num | formatValue}}</em>次/天</span><span>全网好评<em>@{{oneinfo.praise_num | formatValue}}</em>条</span><span>全网差评<em>@{{oneinfo.bad_num | formatValue}}</em>条</span></div>
                            <div class="tool">
                                <em class="txtCtr blue">@{{oneinfo.heat_index}}</em>
                                <div class="tooltip txtCtr">指数</div>
                            </div>
                            <div class="hot txtCtr">
                                <a href="http://ceshi.youbangkeyi.com/dafen/{{$pycity}}/@{{oneinfo.id}}">打榜</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
			@{{/if}}
			
		<!--前二十条数据的显示-->
		@{{each list as value index && advinfo.content}}
			@{{if index==2 && advinfo.id}}
				<div class="guanggao">@{{advinfo.content}}</div>
			@{{/if}}
			@{{if value.isVip=='1'}}
			<li>
                <div class="num lft">
						<em class="txtCtr">@{{if type=='1'}} @{{value.order_city}} @{{/if}} @{{if type=='2'}} @{{value.price_order}} @{{/if}} @{{if type=='4'}} @{{value.praise_order}} @{{/if}}<span>TOP</span></em>
                    <div class="txtCtr @{{if value.is_up==1}}s1@{{/if}}@{{if value.is_up==2}}s2@{{/if}}@{{if value.is_up==0}}s3@{{/if}}@{{if !value.is_up}}s3@{{/if}} txt">@{{if !value.is_up}}持平@{{/if}}@{{if value.is_up==1}}上升@{{value.is_up_num}}位 @{{/if}}@{{if value.is_up==2}}下降@{{value.is_up_num}}位 @{{/if}}</div>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <a href="{{url('detail')}}/@{{value.id}}"><img src="http://ceshi.youbangkeyi.com/@{{value.cover}}"></a>
                        <div class="txt">
                            <h3><a href="{{url('detail')}}/@{{value.id}}">@{{value.name}}</a> </h3>
                            <div class="t1">人均消费：<span class="red">¥@{{value.person_price}}</span></div>
                            <div class="t2"><span>@{{value.address}}</span></div>
                            <div class="t3"><span>品牌搜索<em>@{{value.brand_search_num | formatValue}}</em>次/天</span><span>全网好评<em>@{{value.praise_num | formatValue}}</em>条</span><span>全网差评<em>@{{value.bad_num | formatValue}}</em>条</span></div>
                            <div class="tool">
                                <em class="txtCtr blue">@{{value.heat_index}}</em>
                                <div class="tooltip txtCtr">指数</div>
                            </div>
                            <div class="hot txtCtr">
                                <a href="http://ceshi.youbangkeyi.com/dafen/{{$pycity}}/@{{value.id}}">打榜</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
			@{{/if}}
			@{{if value.isVip=='2'}}
			<li>
				<div class="huiyuan"></div>
                <div class="num lft">
						<em class="txtCtr">@{{if type=='1'}} @{{value.order_city}} @{{/if}} @{{if type=='2'}} @{{value.price_order}} @{{/if}} @{{if type=='4'}} @{{value.praise_order}} @{{/if}}<span>TOP</span></em>
                       <div class="txtCtr @{{if value.is_up==1}} s1 @{{/if}} @{{if value.is_up==2}} s2 @{{/if}} @{{if !value.is_up}} s3 @{{/if}} txt">@{{if !value.is_up}}持平@{{/if}}@{{if value.is_up==1}}上升@{{value.is_up_num}}位@{{/if}}@{{if value.is_up==2}}下降@{{value.is_up_num}}位@{{/if}}</div>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <div class="txt">
                            <h3><a href="{{url('detail')}}/@{{value.id}}">@{{value.name}}</a> </h3>
                            <div class="t1">人均消费：<span class="red">¥@{{value.person_price}}</span></div>
                            <div class="t2"><span>@{{value.address}}</span></div>
                            <div class="t3"><span>品牌搜索<em>@{{value.brand_search_num | formatValue}}</em>次/天</span><span>全网好评<em>@{{value.praise_num | formatValue}}</em>条</span><span>全网差评<em>@{{value.bad_num | formatValue}}</em>条</span></div>
                            <div class="tool">
                                <em class="txtCtr blue">@{{value.heat_index}}</em>
                                <div class="tooltip txtCtr">指数</div>
                            </div>
                            <div class="hot txtCtr">
                                <a href="http://ceshi.youbangkeyi.com/dafen/{{$pycity}}/@{{value.id}}">打榜</a>
                            </div>
                        </div>
                    </div>
                    <div class="pic-box">
                        <div class="leftLoop">
                            <div class="bd">
                                <ul>
									@{{if value.taoxis}}
									@{{each value.taoxis as v index}}
										@{{if index < 4}}
                                    <li>
                                        <div class="pic " tt="@{{v.id}}"><a href="{{url('detail')}}/@{{value.id}}/@{{v.id}}"><img src="http://ceshi.youbangkeyi.com/@{{v.cover | formatCover}}" /></a></div>
                                        <div class="title " tt="@{{v.id}}"><a href="{{url('detail')}}/@{{value.id}}/@{{v.id}}">@{{v.setName}}</a></div>
                                        <div class="price">
                                            <span class="red">¥@{{v.currentPrice}}</span><em>原价 <i>¥@{{v.price}}</i></em>
                                        </div>
                                    </li>
										@{{/if}}	
									@{{/each}}
                                    @{{/if}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
			@{{/if}}
		@{{/each}}
		
		<!--20-100条数据的显示-->
		@{{each tenants2 as value index && advinfo.content}}
			
			@{{if value.isVip=='1'}}
			<li>
                <div class="nump lft">
					<em class="txtCtr @{{if value.is_up==1}}s1@{{/if}}@{{if value.is_up==2}}s2@{{/if}}@{{if value.is_up==0}}s3@{{/if}}@{{if !value.is_up}}s3@{{/if}}">Top@{{if type=='1'}} @{{value.order_city}} @{{/if}} @{{if type=='2'}} @{{value.price_order}} @{{/if}} @{{if type=='4'}} @{{value.praise_order}} @{{/if}}</em>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <div class="txt">
                            <h4 class="lft"><a href="{{url('detail')}}/@{{value.id}}">@{{value.name}}</a> </h3>
                            <div class="mr40">人均消费：<span class="red">¥@{{value.person_price}}</span></div>
                            <div class="t20"><span>品牌搜索<em>@{{value.brand_search_num | formatValue}}</em>次/天</span><span>全网好评<em>@{{value.praise_num | formatValue}}</em>条</span><span>全网差评<em>@{{value.bad_num | formatValue}}</em>条</span></div>
                            <div class="tl20">
                                <em class="txtCtr blue">@{{value.heat_index}}</em>
                            </div>
                            <div class="hot20 txtCtr">
                                <a href="/dafen/{{$pycity}}/@{{value.id}}"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
			@{{/if}}
			@{{if value.isVip=='2'}}
			<li>
				<div class="huiyuan"></div>
                <div class="num lft">
						<em class="txtCtr">@{{if type=='1'}} @{{value.order_city}} @{{/if}} @{{if type=='2'}} @{{value.price_order}} @{{/if}} @{{if type=='4'}} @{{value.praise_order}} @{{/if}}<span>TOP</span></em>
        <div class="txtCtr @{{if value.is_up==1}} s1 @{{/if}} @{{if value.is_up==2}} s2 @{{/if}} @{{if !value.is_up}} s3 @{{/if}} txt">@{{if !value.is_up}}持平@{{/if}}@{{if value.is_up==1}}上升@{{value.is_up_num}}位@{{/if}}@{{if value.is_up==2}}下降@{{value.is_up_num}}位@{{/if}}</div>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <div class="txt">
                            <h3><a href="{{url('detail')}}/@{{value.id}}">@{{value.name}}</a> </h3>
                            <div class="t1">人均消费：<span class="red">¥@{{value.person_price}}</span></div>
                            <div class="t2"><span>@{{value.address}}</span></div>
                            <div class="t3"><span>品牌搜索<em>@{{value.brand_search_num | formatValue}}</em>次/天</span><span>全网好评<em>@{{value.praise_num | formatValue}}</em>条</span><span>全网差评<em>@{{value.bad_num | formatValue}}</em>条</span></div>
                            <div class="tool">
                                <em class="txtCtr blue">@{{value.heat_index}}</em>
                                <div class="tooltip txtCtr">指数</div>
                            </div>
                            <div class="hot txtCtr">
                                <a href="/dafen/{{$pycity}}/@{{value.id}}">打榜</a>
                            </div>
                        </div>
                    </div>
                    <div class="pic-box">
                        <div class="leftLoop">
                            <div class="bd">
                                <ul>
									@{{if value.taoxis}}
									@{{each value.taoxis as v index}}
										@{{if index < 4}}
                                    <li>
                                        <div class="pic " tt="@{{v.id}}"><a href="{{url('detail')}}/@{{value.id}}/@{{v.id}}"><img src="http://ceshi.youbangkeyi.com/@{{v.cover | formatCover}}" /></a></div>
                                        <div class="title " tt="@{{v.id}}"><a href="{{url('detail')}}/@{{value.id}}/@{{v.id}}">@{{v.setName}}</a></div>
                                        <div class="price">
                                            <span class="red">¥@{{v.currentPrice}}</span><em>原价 <i>¥@{{v.price}}</i></em>
                                        </div>
                                    </li>
										@{{/if}}	
									@{{/each}}
                                    @{{/if}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
			@{{/if}}
		@{{/each}}
		
	</script>
        </ul>
    </div>
    <form action="{{url('user')}}/{{$pycity}}/<?php echo rand(10,1000) ?>" method="get" id="subsubmit">
    	<input type="hidden" id="hiddenstyle" name="style" value=""/>
    	<input type="hidden" id="hiddencity" name="city" value=""/>
    	<input type="hidden" id="hiddenname" name="name" value=""/>
    	<input type="hidden" id="hiddenprice" name="price" value=""/>
		<input type="hidden" id="hiddencustomized_name" name="customized_name" value=""/>
    </form>
    
</div>
</div>
</div>
<script type="text/javascript">jQuery(".index").slide({trigger:"click"});</script>
<footer class="txtCtr">
<div class="foot">
        <div class="foots">
        <span><a href="/about.html">关于有榜</a>|<a target="_blank" href="http://youbangkeyi.mikecrm.com/E09npdx">商务合作</a>|<a href="/mianze.html">免责说明</a>|<a href="/shuoming.html">服务说明</a>|<a href="#">营业执照</a>|<a target="_blank" href="http://youbangkeyi.mikecrm.com/zJDl6sd">投诉建议</a>|<a target="_blank" href="http://youbangkeyi.mikecrm.com/QTsqDmZ">CEO信箱</a></span>
        © 2017 有榜 （youbangkeyi.com） 版权所有   京ICP备08107937号-1 北京智慧元素科技有限公司
        </div>
        </div>
    </footer>
<script type="text/javascript">

				template.helper('formatValue', function(tvalue){
				  if(tvalue != '0' && tvalue){
					return tvalue;
				  }else{
					return '-';
				  }
				});
    $(document).ready(function(){
                //子导航展开收缩
                $(".sewvtop").click(function(){
                    $(this).find("em").removeClass("lbaxztop2").addClass("lbaxztop").parents(".sewv").siblings().children(".sewvtop").find("em").removeClass("lbaxztop").addClass(".lbaxztop2");
                    $(this).next(".sewvbm").toggle().parents(".sewv").siblings().find(".sewvbm").hide();
                });
				//定制服务start
                $('.xq1').click(function(){
					$('.xq1').removeClass('cur');
					$(this).addClass('cur');
                 });
                var str = '';
                 $('.xq2').click(function(){
					//$('.xq2').removeClass('cur');
					$(this).addClass('cur');
					if(str){
						str = str+','+$(this).text();
					}else{
						str = $(this).text();
					}
                 });

 				$('.submit').click(function(){
					var customized_name = $('#customized_name').text();
					var style = str;
					var budget = $('#budget').val();
					var city = $('#area').html();
					if(!budget){
						alert('预算不能为空');
						return false;
					}
					var phone = $('#phone').val();
					if(!phone){
						alert('手机号码不能为空');
						return false;
					}
					if(phone){
						var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
						if(!myreg.test(phone)) 
						{ 
							alert('请输入有效的手机号码！'); 
							return false; 
						} 
					}
					var name = $('#name').val();
					if(!name){
						alert('姓名不能为空');
						return false;
					}
					 $.ajax({
		 					url: "{{ url('order/save') }}",
		 					type: "post",
		 					dataType: "json",
		 					data: {'customized_name': customized_name,'style': style,'budget': budget,'phone': phone,'name': name,'city': city,'linkurl': "{{url('user')}}/{{$pycity}}/<?php echo rand(10,1000) ?>?style="+style+"&city="+city+"&name="+name+"&price="+budget+"&customized_name="+customized_name},
		 					success: function(data){
		 						console.log(data);
		 						if(data.result == "00")
		 						{
		 							var city = $('#area').text();
		 							$('#hiddenstyle').val(style);
		 							$('#hiddencity').val(city);
		 							$('#hiddenname').val(name);
		 							$('#hiddenprice').val(budget);
									$('#hiddencustomized_name').val(customized_name);
		 							$('#subsubmit').submit();
		 						}else{
									alert('定制失败');
			 					};
		 					}
		 			});
 	 			});
                

                 //定制服务end
                /*鼠标离开下拉框关闭*/
                $(".sewv").mouseleave(function(){
                    $(".sewvbm").hide();
                    $(this).children(".sewvtop").find("em").addClass("lbaxztop2");
                });
                
                
                //赋值
                $(".sewvbm>li").click(function(){
                    var selva=$(this).text();
                    $(this).parents(".sewvbm").siblings(".sewvtop").find("span").text(selva);
                    $(this).parent("ul").hide();
                    $(this).parents(".sewv").children(".sewvtop").find("em").addClass("lbaxztop2");
                });
                
            });

  //模糊搜索商家
	$('#submit').click(function(){
		var keyword = $('#search_keyword').val();
		var city = $('#area').text();
		var link = $('#area').attr('tt')
		location.href="http://ceshi.youbangkeyi.com/search/"+link+'?keyword='+keyword;
	});

	$('.cy').click(function(){
		$('#area').html($(this).html());
		$('.area2').html($(this).html());
		var type=$("li").filter(".on").attr('tt');
		var link = $(this).attr('tt')
		$('#area').attr('tt',link);
		location.href="http://ceshi.youbangkeyi.com/"+link;
   })
			//格式化性别，职业
			template.helper("formatCover",function (cover) {
				cover = JSON.parse(cover);
				if(cover){
					return cover[0];
				}else{
					return '';
				}
			});
				var city = $('#area').html();
				/*
				$.ajax({
 					url: "{{ url('index/search') }}",
 					type: "post",
 					dataType: "json",
 					data: {'city': city,'shoptype':'婚纱摄影'},
 					success: function(data){
						console.log(JSON.stringify(data));
 						if(data.result=='00'){
 							$("#main").html(template("maintemp",data));	
							if(data.advinfo){
								$('.guanggao').html(data.advinfo.content);
							}
 							$('.detail').click(function(){
 	 							
 								var flag = 'detail'+$(this).attr('tt');
 								$('#'+flag).submit();
 							})
	 					}else{
	 						$("#main").html(nothingTemp);
			 			}
 					}
 				});
				*/
			$('.active').click(function(){
				var type=$(this).attr('tt');
				var city = $('#area').text();
				 $.ajax({
	 					url: "{{ url('index/search') }}",
	 					type: "post",
	 					dataType: "json",
	 					data: {'type': type,'city': city,'shoptype':'婚纱摄影'},
	 					success: function(data){
	 						if(data.result=='00'){
	 							$('#fenye').css('display','block');
	 							$("#main").html(template("maintemp",data));	
	 							$('.detail').click(function(){
	 								var flag = 'detail'+$(this).attr('tt');
	 								$('#'+flag).submit();
	 							})
								if(data.advinfo){
									$('.guanggao').html(data.advinfo.content);
								}
		 					}else{
		 						$('#fenye').css('display','none');
		 						$("#main").html(nothingTemp);
				 			}
	 					}
	 			});
			});

			$('.detail').click(function(){
					var flag = 'detail'+$(this).attr('tt');
					$('#'+flag).submit();
				})
</script>
</body>
</html>