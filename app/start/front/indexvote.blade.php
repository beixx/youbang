@extends('front.base')

@section('content')
<div class="shop-index main">
    <div class="breadcrumb"><a href="{{asset($pycity)}}/sheying">首页</a>&gt;&gt;<a href="{{asset('detail')}}/{{$id}}">{{$tenantinfo->name}}</a>&gt;&gt; 点评列表 </div>
<div class="info-box">
        <div class="comment_list">
            <div class="title fB">网友点评</div>

                <div class="dp-type">
                    <a href="" class="all leibie" tt="0">全部</a><a href="javascript:void(0)" class="leibie" tt='1'>好评<em>（{{$goods}}）</em></a><a href="javascript:void(0)" class="leibie" tt='3'>中评<em>（{{$averages}}）</em></a><a href="javascript:void(0)" class="leibie" tt='2'>差评<em>（{{$bads}}）</em></a><a href="javascript:void(0)" class="leibie" tt='4'>有图<em>（{{$haspics}}）</em></a><a href="javascript:void(0)" class="leibie" tt='5'>晒单<em>（{{$hasdans}}）</em></a>
                    <div class="db txtCtr"><a href="http://ceshi.youbangkeyi.com/dafen/{{$pycity}}/{{$tenantinfo->id}}">点评打榜</a> </div>
                </div>
            <div class="msg txtCtr">温馨提示：关于北京爱度婚纱摄影室的点评仅供参考，不做为预定及评判商家好坏的依据</div>
            	<div id="commentlist">
                <?php if(count($comments)){
                		foreach($comments as $v){
                			$headimg = json_decode($v->headimg);
                	?>
                <dl>
                    <dd>
                        <img src="{{asset($headimg)}}"/>
                    </dd>
                    <dt>
					<a href="{{url('dianping')}}/{{$tenantinfo->id}}/{{$v->id}}">
					<div class="pf <?php if($v->score>0){ ?>red<?php } ?> txtCtr fB" <?php if($v->score<0){ ?> style="color:#008844" <?php } ?>>+<br>{{$v->score}}</div>  
                    <div class="name">
                        <span>{{$v->name}}</span><em>{{date('Y-m-d H:i:s',$v->created)}}</em>
                    </div>
                    <div class="com_info">
                       <span class="y3 txtCtr">打榜理由</span>                       
						<p>{{$v->totailty}}</p> 
                    </div>
                    <div class="img">
                    	<?php if(isset($v->documentary) && $v->documentary){ 
                    				$documentary = json_decode($v->documentary);
                    				foreach($documentary as $v){
                    		?>
                    	<a href="javascript:;"><img src="{{asset($v)}}"/></a>
                    	<?php }}?>
                    </div>
					</a>
                    </dt>
                </dl>
                <?php }}?>
                </div>
            </div>
            <script type="text/html" id="commentlistTemp">
				@{{each list}}
				<dl>
                    <dd>
                        <img src="http://ceshi.youbangkeyi.com/@{{$value.headimg}}"/>
                    </dd>
                    <dt>
					<a href="{{url('dianping')}}/{{$tenantinfo->id}}/@{{$value.id}}">
					 <div class="pf @{{if $value.score>0}} red @{{/if}} txtCtr fB" @{{if $value.score<0}} style="color:#008844" @{{/if}}>+<br>@{{$value.score}}</div> 
                    <div class="name">
                        <span>@{{$value.name}}</span><em>@{{$value.created}}</em>
                    </div>
                    <div class="com_info">
                        <span class="y3 txtCtr">打榜理由</span>                       
						<p>@{{$value.totailty}}</p> 
                    </div>
                    <div class="img">
                    	@{{each $value.documentary}}
                    	<a href="javascript:;"><img src="http://ceshi.youbangkeyi.com/@{{$value}}"/></a>
                    	@{{/each}}
                    </div>
					</a>
                    </dt>
                </dl>
				@{{/each}}
			</script>
            <div class="more txtCtr" id="more" tt="{{$allpages}}" dd="1"><div style="margin-bottom:20px;"><a href="javascript:void(0);">点击加载更多评论</a></div></div>
        </div>
    </div>
 
<script type="text/javascript" src="{{ asset('xinjs/template.js') }}"></script>
<script type="text/javascript" src="{{ asset('xinjs/zepto.min.js') }}"></script>
<script type="text/javascript">
$('#submit').click(function(){
	var keyword = $('#search_keyword').val();
	var city = $('#area').text();
	var url = "{{ url('index/index') }}?city="+city+"&keyword="+keyword;
	location.href=url;
});

$('.cy').click(function(){
		$('#area').html($(this).html());
		$('.area2').html($(this).html());
		var type=$("li").filter(".on").attr('tt');
		var city = $(this).html();
		var url = "{{ url('index/index') }}?city="+city;
		location.href=url;
})
		//加载更多评论
		$('#more').click(function(){
			$('#more').css('display','block');
			var allcommentpage = $('#more').attr('tt');//总页数
			var currentcommentpage = $('#more').attr('dd');//当前页码
			var id = $('#tenantId').val();
			if(currentcommentpage<allcommentpage){
				$('#more').attr('dd',parseInt(currentcommentpage)+1);
				$.ajax({
 					url: "{{ url('index/morecomment') }}",
 					type: "post",
 					dataType: "json",
 					data: {'id': id,'page': parseInt(currentcommentpage)+1},
 					success: function(data){
 						if(data.result=='00'){
	 						var temphtml = $("#commentlist").html();
	 						var allhtml = temphtml+template("commentlistTemp",data);
 							$("#commentlist").html(allhtml);	
	 					}
 					}
 				});
			}else{
				alert('暂无更多数据');
				var temphtml = $("#commentlist").html();
				$("#commentlist").html(temphtml);
			}
		})
		
		$('.leibie').click(function(){
			var type = $(this).attr('tt');
			if(type==1){
				var gourl = "http://ceshi.youbangkeyi.com/index/googscomment";
			}else if(type==2){
				var gourl = "http://ceshi.youbangkeyi.com/index/badcomment";
			}else if(type==3){
				var gourl = "http://ceshi.youbangkeyi.com/index/zhongcomment";
			}else if(type==4){
				var gourl = "http://ceshi.youbangkeyi.com/index/hastu";
			}else if(type==5){
				var gourl = "http://ceshi.youbangkeyi.com/index/shaidan";
			}else{
				var gourl = "http://ceshi.youbangkeyi.com/index/morecomment";
			}
			var id = {{$id}};
			$.ajax({
					url: gourl,
					type: "get",
					dataType: "json",
					data: {'id': id,'page': 1},
					success: function(data){
						console.log(data);
						if(data.result=='00'){
							if(type!=0){
								$('#more').css('display','none');
							}else{
								$('#more').css('display','block');
							}
							$("#commentlist").html(template("commentlistTemp",data));	
 						}
					}
			});
		})
		
		
 </script>
@stop
  