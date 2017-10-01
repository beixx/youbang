<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php if(isset($title)){ echo $title; }else{ echo '婚纱摄影'; }?></title>
    <meta name="Keywords" content="<?php if(isset($desc)){ echo $desc; }else{ echo '婚纱摄影'; }?>">
    <meta name="Description" content="<?php if(isset($keyword)){ echo $keyword; }else{ echo '婚纱摄影'; }?>">
    <link rel="stylesheet" href="/xincss/style1.css">
    <link rel="stylesheet" href="/xincss/dateRange.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
    <script type="text/javascript" src="/xinjs/jquery.reveal.js"></script>
    <script type="text/javascript" src="/xinjs/main.js"></script>
    <script type="text/javascript" src="/xinjs/dateRange.js"></script>
    <script type="text/javascript" src="/xinjs/jquery.SuperSlide.2.1.1.js" ></script>
    <script type="text/javascript" src="/xinjs/template.js"></script>
	<script type="text/javascript" src="/xinjs/zepto.min.js"></script>
</head>
<body>
<header>
    <div class="main">
        <div class="lft logo"><a href="{{asset('city')}}/{{$pycity}}/sheying"><img alt="有榜" src="{{asset('xinimage/logo.png')}}"></a> </div>  
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
    <a href="{{asset($pycity)}}/sheying">首页</a>
            <a href="{{asset($pycity)}}/sheying">婚纱摄影</a>
            <a href="{{asset($pycity)}}/hunli">婚礼策划</a>
            <a rel="nofollow" href="http://youbangkeyi.mikecrm.com/IBLzKFT"  target="_blank">商户入驻</a>
            <a href="/guize.html"  target="_blank">榜单规则</a></nav>
                <div class="search"><ul><form id="search_form" action="/search/index" method="get" onsubmit="return false;"><li class="li1" style="position: relative;"><input type="text" name="keyword" placeholder="搜索商家" value="" id="search_keyword" autocomplete="off"><button type="submit" id="submit"><svg viewBox="0 0 16 16" class="Icon Icon--search" width="16" height="16" aria-hidden="true" style="height: 16px; width: 16px;"><title></title><g><path d="M12.054 10.864c.887-1.14 1.42-2.57 1.42-4.127C13.474 3.017 10.457 0 6.737 0S0 3.016 0 6.737c0 3.72 3.016 6.737 6.737 6.737 1.556 0 2.985-.533 4.127-1.42l3.103 3.104c.765.46 1.705-.37 1.19-1.19l-3.103-3.104zm-5.317.925c-2.786 0-5.053-2.267-5.053-5.053S3.95 1.684 6.737 1.684 11.79 3.95 11.79 6.737 9.522 11.79 6.736 11.79z"></path></g></svg></button></li></form></ul></div>
    </div>
</header>
  @yield('content')
<footer class="txtCtr">
<div class="tuijian">
<h3>{{$city}}优选机构<span>(按综合实力排序)</span></h3>
<ul>
<?php if(isset($dbtenants) && count($dbtenants)){
		foreach($dbtenants as $v){
?>
<li>
<a target="_blank" href="{{url('detail')}}/{{$v->id}}">{{$v->name}}</a>
</li>
<?php }} ?>

</ul>
</div>
<div class="foot">
        <div class="foots">
        <span><a href="/about.html">关于有榜</a>|<a target="_blank" href="http://youbangkeyi.mikecrm.com/E09npdx">商务合作</a>|<a href="/mianze.html">免责说明</a>|<a href="/shuoming.html">服务说明</a>|<a href="#">营业执照</a>|<a target="_blank" href="http://youbangkeyi.mikecrm.com/zJDl6sd">投诉建议</a>|<a target="_blank" href="http://youbangkeyi.mikecrm.com/QTsqDmZ">CEO信箱</a></span>
        © 2017 有榜 （youbangkeyi.com） 版权所有   京ICP备08107937号-1 北京智慧元素科技有限公司
        </div>
        </div>
    </footer>
<script type="text/javascript">
     			var nothingTemp = '<div id="nomore" class="NoMore"><p>暂无更多数据哦</p></div>';
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
			
			
			$('.active').click(function(){
				var type=$(this).attr('tt');
				var city = $('#area').text();
				 $.ajax({
	 					url: "{{ url('index/search') }}",
	 					type: "post",
	 					dataType: "json",
	 					data: {'type': type,'city': city},
	 					success: function(data){
	 						if(data.result=='00'){
	 							$('#fenye').css('display','block');
	 							$("#main").html(template("maintemp",data));	
		 					}else{
		 						$('#fenye').css('display','none');
		 						$("#main").html(nothingTemp);
				 			}
	 					}
	 			});
			});
			
</script>
</body>
</html>