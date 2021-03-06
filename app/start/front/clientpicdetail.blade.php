@extends('front.base')
@section('content')
<div class="main details">
    <div class="breadcrumb"><a href="<?php  echo url('city').'/'.Config::get('city.'.$info->city,'北京').'?shoptype='.$info->shoptype;  ?>">{{$city}}{{$info->shoptype}}</a>&gt;&gt;<a href="{{asset('detail')}}/{{$info->id}}">{{$info->name}}</a>&gt;&gt; {{$picinfo->picName}} </div>
    <div class="lft l-box">
        <div class="ban" id="demo1">
            <div class="ban2" id="ban_pic1">
                <div class="prev1" id="prev1"><img src="/xinimage/index_tab_l.png"  alt=""/></div>
                <div class="next1" id="next1"><img src="/xinimage/index_tab_r.png"  alt=""/></div>
                <ul>
                	<?php 
                		if(isset($picinfo->cover) && $picinfo->cover){
                			foreach($picinfo->cover as $v){
                		
                	?>
                    <li><a href="javascript:;"><img src="{{asset($v)}}" alt=""/></a></li>
                    <?php }}?>
                </ul>
            </div>
            <div class="min_pic">
                <div class="prev_btn1" id="prev_btn1"><img src="/xinimage/prev_off.png"  alt=""/></div>
                <div class="num clearfix" id="ban_num1">
                    <ul>
                       <?php 
                		if(isset($picinfo->cover) && $picinfo->cover){
                			foreach($picinfo->cover as $v){
                		
                	?>
                    <li><a href="javascript:;"><img src="{{asset($v)}}" alt=""/></a></li>
                    <?php }}?>
                    </ul>
                </div>
                <div class="next_btn1" id="next_btn1"><img src="/xinimage/next_off.png" /></div>
            </div>
        </div>

        <div class="mhc"></div>

        <div class="pop_up" id="demo2">
            <div class="pop_up_xx"><img src="/xinimage/chacha3.png" width="40" height="40"  alt=""/></div>
            <div class="pop_up2" id="ban_pic2">
                <div class="prev1" id="prev2"><img src="/xinimage/index_tab_l.png"  alt=""/></div>
                <div class="next1" id="next2"><img src="/xinimage/index_tab_r.png"  alt=""/></div>
                <ul>
                    <?php 
                		if(isset($picinfo->cover) && $picinfo->cover){
                			foreach($picinfo->cover as $v){
                		
                	?>
                    <li><a href="javascript:;"><img src="{{asset($v)}}" alt=""/></a></li>
                    <?php }}?>
                </ul>
            </div>
        </div>


    </div>
    <div class="rgt r-box">
        <div class="bor shop">
    <?php if(isset($info->isVip) && $info->isVip==2){ ?>
	<div class="huiyuan"></div>
	<?php }?>
            <div class="title">拍摄商家</div>
            <h3><a href="{{asset('detail')}}/{{$info->id}}">{{$info->name}}</a></h3>
            <p>人均消费：<span class="red">{{$info->person_price}}</span>元</p>
            <div class="ask txtCtr">
            	<a href=" <?php if(isset($info->isVip) && $info->isVip==2 && $info->pcadvurl){ echo $info->pcadvurl; }else{ echo "javascript:void;"; }?>"  <?php if(isset($info->isVip) && $info->isVip==2 && $info->pcadvurl){  }else{ echo 'data-reveal-id="myModal" data-animation="fade"'; }?> >咨询商家</a>
            </div>
         </div>
		<div class="bor share">
            <h3><span>案例风格</span></h3>
		     <div class="tag">
				<?php if(isset($picinfo->picStyle) && $picinfo->picStyle){
					foreach($picinfo->picStyle as $t){
				?>
                 <a href="javascript:void(0);">{{$t}}</a >
				 <?php }} ?>
             </div>
        </div>
        <div class="bor share">
            <h3><span>分享套系</span></h3>
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

        <div class="bor case">
            <div class="title">相似案例</div>
            <ul>
            	<?php 
	            	if(count($recommpics)){
	            		foreach($recommpics as $v){
            	?>
                <li>
                    <a href="{{asset('index/clientdetailpic')}}/{{$v->id}}"><img src="{{asset($v->firstcover[0])}}">
                    <p>{{$v->picName}}</p>
                    </a>
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
        <div class="msg">确定提交，表示已阅读并同意<a href=""> 《有榜服务条款》</a></div>
        </form>
    </div>
</div>
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
        prev_btn:"#prev_btn1",//小图左箭头
        next_btn:"#next_btn1",//小图右箭头
        pop_prev:"#prev2",//弹出框左箭头
        pop_next:"#next2",//弹出框右箭头
        prev:"#prev1",//大图左箭头
        next:"#next1",//大图右箭头
        pop_div:"#demo2",//弹出框框架
        pop_pic:"#ban_pic2",//弹出框图片框架
        pop_xx:".pop_up_xx",//关闭弹出框按钮
        mhc:".mhc",//朦灰层
        autoplay:true,//是否自动播放
        interTime:5000,//图片自动切换间隔
        delayTime:400,//切换一张图片时间
        pop_delayTime:400,//弹出框切换一张图片时间
        order:0,//当前显示的图片（从0开始）
        picdire:true,//大图滚动方向（true为水平方向滚动）
        mindire:true,//小图滚动方向（true为水平方向滚动）
        min_picnum:5,//小图显示数量
        pop_up:true//大图是否有弹出框
    })
</script>

@stop