@extends('front.base')

@section('content')
<script type="text/javascript" src="/xinjs/timeline.js"></script>
<div class="main taoxi">
    <div class="breadcrumb"><a href="<?php  echo url(Config::get('city.'.$tenantsinfo->city,'北京')).'?shoptype='.$tenantsinfo->shoptype;  ?>">{{$city}}{{$tenantsinfo->shoptype}}</a>&gt;&gt;<a href="{{url('detail')}}/{{$info->tenantsId}}">{{$name}}</a>&gt;&gt; {{$txname}} </div>
    <div class="pic-box">
    	<?php if(isset($tenantsinfo->isVip) && $tenantsinfo->isVip=='2'){ ?>
    	<div class="huiyuan"></div>
		<?php }?>
        <div class="pic lft">
            <div class="ban" id="demo1">
                <div class="ban2" id="ban_pic1">
                    <ul>
                    	<?php if(isset($info->cover) && count($info->cover)){ 
                    		foreach($info->cover as $v){
                    	?>
                        <li><a href="javascript:void;"><img src="{{ asset($v) }}" alt=""/></a></li>
                        <?php }}?>
                    </ul>
                </div>
                <div class="min_pic">
                    <div class="num clearfix" id="ban_num1">
                        <ul>
                        <?php if(isset($info->cover) && count($info->cover)){ 
                    		foreach($info->cover as $v){
                    	?>
                        <li><a href="javascript:void;"><img src="{{ asset($v) }}" alt=""/></a></li>
                        <?php }}?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="txt-box rgt">
            <h3 class="fB">{{$info->setName}}</h3>
            <div class="price">¥<span class="fB">{{$info->currentPrice}}</span><em>参考价：<i>{{$info->price}}</i>元</em></div>
            <div class="cons">
            <a href=" <?php if(isset($tenantsinfo->isVip) && $tenantsinfo->isVip==2 && $tenantsinfo->pcadvurl){ echo $tenantsinfo->pcadvurl; }else{ echo "javascript:void;"; }?>" class="lft txtCtr fB"   <?php if(isset($tenantsinfo->isVip) && $tenantsinfo->isVip==2 && $tenantsinfo->pcadvurl){  }else{ echo 'data-reveal-id="myModal" data-animation="fade"'; }?> >咨询套餐</a>
                <span class="lft">{{$tenantsinfo->phone}}</span>
            </div>
            <div class="gift">
                <span>营业时间</span>
                <p>周一到周日 全天</p>
            </div>
            <div class="package">
                <span>套餐特色：</span>
                <div class="txt">
                   {{$info->taoxiexplain}}
                </div>
            </div>
        </div>
    </div>

    <div class="view">
        <div class="slideTxtBox">
        <div class="infoTab" id="infoTab" style="position: static; top: 0px;">
            <div class="tit">
                <ul>
                    <li class="cur t1"><a href="#d_tab1">套餐详情</a></li>
                    <li class="t1"><a href="#d_tab2">图文详情</a></li>
                   
                </ul>
                <div class="tc" id="tc_01" style="display:none">{{$name}}            <a href=" <?php if(isset($tenantsinfo->isVip) && $tenantsinfo->isVip==2 && $tenantsinfo->pcadvurl){ echo $tenantsinfo->pcadvurl; }else{ echo "javascript:void;"; }?>" <?php if(isset($tenantsinfo->isVip) && $tenantsinfo->isVip==2 && $tenantsinfo->pcadvurl){  }else{ echo 'data-reveal-id="myModal" data-animation="fade"'; }?> >咨询套餐</a>
</div>
            </div>
        </div>
            
            <div id="d_tab1" class="J_item hi-50"></div>
            <div class="bd">
                <div class="txt-box">
                    {{$info->detail}}

                <div id="d_tab2" class="J_item hi-50"></div>
                    <div class="img">
                    <?php if(isset($info->picDetail) && count($info->picDetail)){ 
                    		foreach($info->picDetail as $v){
                    	?>
                    <p><img src="{{asset($v)}}"></p>
                    <?php }}?>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="dian-tj">
            <div class="title fB">店内推荐</div>
            <ul>
            	<?php 
            		if(count($remmends)){ 
            			foreach($remmends as $v){
        				if(isset($v->cover)){
        					$covers = $v->cover;
        					$cover = $covers[0];
        				}else{
        					$cover = '';
        				}
            	?>
                <li>
                    <a href="{{url('detail')}}/{{$tenantsinfo->id}}/{{$v->id}}"  tt="{{$v->id}}"><img src="{{asset($cover)}}">
                    <h4>{{$v->setName}}</h4></a>
                    <div class="price">
                        <span class="red">¥{{$v->currentPrice}}</span><em>原价 <i>¥{{$v->price}}</i></em>
                    </div>
                    <div class="tag">
                    	<?php if(isset($v->kind)){ 
                    			foreach($v->kind as $t){
                    		?>
                        <a href="javascript:void(0);">{{$t}}</a>
                        <?php }}?>
                    </div>
                </li>
                <?php }}?>
            </ul>
        </div>
    </div>
</div>
<div id="myModal" class="reveal-modal">
    <div class="title">
        <h1 class="txtCtr">有榜，免费为您提供1对1服务</h1>
        <div class="txt txtCtr"><em></em><span class="fB">品质服务，百万新人的共同选择</span><em></em></div>
    </div>
    <a class="close-reveal-modal">&#215;</a>
    <div class="login">
    	<form method="post" action="{{url('index/saveseek')}}" onSubmit="return false;">
        <div class="input">
            <input type="text" name="" value="" placeholder="姓名" id="name">
        </div>
        <div class="input">
            <input type="text" name="" value="" placeholder="手机" id="phone">
            <input type="hidden" name="souce" value="1" id="source" >
            <input type="hidden" name="tenantsId" value="{{$info->tenantsId}}" id="tenantsId" >
        </div>
        <div class="submit pcsubmit" id="submit">
            <input type="submit" name="" value="确定">
        </div>
        <div class="msg">确定提交，表示已阅读并同意<a href="/shuoming.html" target="_blank">《有榜服务条款》</a></div>
        </form>
    </div>
</div>
<div class="proMsg"></div>
<script src="{{asset('xinjs/pic_tab.js')}}"></script>
<script type="text/javascript">
	$('.pcsubmit').click(function(){
		var tenantsId = $('#tenantsId').val();
		var name = $('#name').val();
		var phone = $('#phone').val();
		var source = 1;
		if(!name){
			alert('姓名必填');
			return false;		
		}
		if(!phone){
			alert('手机必填');
			return false;
		}
		if(phone){
			 if(!(/^1[34578]\d{9}$/.test(phone))){ 
			        alert("手机号码有误，请重填");  
			        return false; 
			  } 
		}
		$.ajax({
			url: "http://ceshi.youbangkeyi.com/index/saveview",
			type: "post",
			dataType: "json",
			data: {'tenantsId': tenantsId,'name': name,'phone': phone,'source':source},
			success: function(data){
				console.log(data);
				if(data.result=='00'){
					alert('预约成功');
					location.reload();
				}
			}
		});
	 });
    $('#demo1').banqh({
        box:"#demo1",//总框架
        pic:"#ban_pic1",//大图框架
        pnum:"#ban_num1",//小图框架
        autoplay:false,//是否自动播放
        interTime:5000,//图片自动切换间隔
        delayTime:400,//切换一张图片时间
        pop_delayTime:400,//弹出框切换一张图片时间
        order:0,//当前显示的图片（从0开始）
        picdire:true,//大图滚动方向（true为水平方向滚动）
        mindire:true,//小图滚动方向（true为水平方向滚动）
        min_picnum:5,//小图显示数量
        pop_up:true//大图是否有弹出框
    })
     
	$('.detail').click(function(){
		var flag = 'detail'+$(this).attr('tt');
		$('#'+flag).submit();
	})
	$('.t1').click(function(){
		$('.t1').removeClass('cur');
		$(this).toggleClass("cur");
	});
</script>
</script>
@stop