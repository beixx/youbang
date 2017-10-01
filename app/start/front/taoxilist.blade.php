@extends('front.base')

@section('content')
<div class="shop-index main taoxi">
<div class="info-box dianpu">
	<?php if(isset($info->isVip) && $info->isVip=='2'){ echo '<div class="huiyuan"></div>'; } ?>
	<div class="ban-box">
        <div class="txt lft">
            <h2><a href="{{url('detail')}}/{{$info->id}}">{{$info->name}} 套系</a></h2>
            <p>人均消费：¥{{$info->person_price}}<em>|</em>地址：{{$info->address}}</p>
        </div>
        <div class="btn1 rgt">
   
            <a href=" <?php if(isset($info->isVip) && $info->isVip==2 && $info->pcadvurl){ echo $info->pcadvurl; }else{ echo "javascript:void;"; }?>" class="lft txtCtr fB"   <?php if(isset($info->isVip) && $info->isVip==2 && $info->pcadvurl){  }else{ echo 'data-reveal-id="myModal" data-animation="fade"'; }?> >咨询商家</a>
        </div>
    </div>
        <div class="jxuan">
            <div class="multipleColumn">
                <div class="bd">
                    <div class="ulWrap">

                        <ul class="taoxi"><!-- 把每次滚动的n个li放到1个ul里面 -->
                        	<?php if(count($sets)){
                        			foreach($sets as $v){
                        				if(isset($v->cover)){
                        					$covers = $v->cover;
                        					$cover = $covers[0];
                        				}else{
                        					$cover = '';
                        				}
                        		?>
                              <li>
                                <div class="pic " tt="{{$v->id}}"><a href="{{url('detail')}}/{{$info->id}}/{{$v->id}}"><img src="{{asset($cover)}}"/></a></div>
                                <div class="title " tt="{{$v->id}}"><a href="{{url('detail')}}/{{$info->id}}/{{$v->id}}">{{$v->setName}}</a></div>
                                <div class="price">
                                    <span class="red">¥{{$v->currentPrice}}</span><em>原价 ¥{{$v->price}}</em>
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
                    </div><!-- ulWrap End -->
                </div><!-- bd End -->
            </div><!-- multipleColumn End -->
        </div> </div> </div>


	<script type="text/javascript">
		$('.detail').click(function(){
			var flag = 'detail'+$(this).attr('tt');
			$('#'+flag).submit();
		})
	</script>
   @stop