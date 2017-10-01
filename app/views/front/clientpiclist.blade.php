@extends('front.base')
@section('content')
<div class="shop-index main taoxi">
<div class="info-box dianpu">
	<?php if(isset($info->isVip) && $info->isVip==2){ ?>
	<div class="huiyuan"></div>
	<?php }?>
	<div class="ban-box">
        <div class="txt lft">
            <h2><a href="{{url('detail')}}/{{$info->id}}">{{$info->name}} 案例</a></h2>
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
                        	<?php if(count($recommpics)){
								foreach($recommpics as $v){
							?>
                            <li>
                                <div class="pic"><a href="{{asset('kpdetail')}}/{{$v->id}}"><img src="{{asset($v->firstcover[0])}}"/></a></div>
                                <div class="title"><a href="{{asset('kpdetail')}}/{{$v->id}}">{{$v->picName}}</a></div>
								<?php if(count($v->picStyle)){ ?>
                                <div class="tag">
                                <?php 
                                		foreach($v->picStyle as $t){
                                	?>
                                    <a href="javascript:void(0);">{{$t}}</a>
                                    <?php }?>
                                </div>
                                <?php }?>
                            </li>
                           <?php }}?>
                        </ul>
                    </div><!-- ulWrap End -->
                </div><!-- bd End -->
            </div><!-- multipleColumn End -->
        </div> </div> </div>



@stop