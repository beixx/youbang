@extends('front.base')
@section('content')
<div class="shop-index main">
<div class="info-box">
    <?php if(isset($info->isVip) && $info->isVip==2){ ?>
	<div class="huiyuan"></div>
	<?php }?>
        <div class="ban-box">
        <div class="txt lft">
            <h2><a href="{{url('detail')}}/{{$info->id}}">{{$info->name}}</a></h2>
            <p>人均消费：<span class="red">¥{{$info->person_price}}</span><em>|</em>地址：{{$info->address}}.</p>
        </div>
        <div class="btn rgt">
            第<i>1</i>名<em>({{$info->city}})</em>
        </div>
    </div>
        <div class="comment_list comment">
            <div class="msg txtCtr">温馨提示：关于{{$info->name}}的点评仅供参考，不做为预定及评判商家好坏的依据</div>
                <dl>
                    <dd>
                        <img src="{{asset($commentdetail->headimg)}}"/>
                    </dd>
                    <dt>
					<div class="pf <?php if($commentdetail->score>0){ ?>red<?php } ?> txtCtr fB" <?php if($commentdetail->score<0){ ?> style="color:#008844" <?php } ?>>+<br>{{$commentdetail->score}}</div>  
                    <div class="name">
                        <span>{{$commentdetail->name}}</span><em>{{date('Y-m-d',$commentdetail->created)}}</em>
                    </div>
                  
                    <div class="com_info">
                        <span class="y3 txtCtr">打榜理由</span>
                        <p>{{$commentdetail->totailty}}</p>
                    </div>
                    <div class="pinglunimg">
                    <?php if(count($commentdetail->documentary)){
                    	foreach($commentdetail->documentary as $v){
                    ?>
          
                                                    <img   src="{{asset($v)}}" data-img="{{asset($v)}}"/>
                                                    <?php }}?>
                                              
                                        <?php if(count($commentdetail->photo)){
                    	foreach($commentdetail->photo as $v){
                    ?>
                                                    <img  title="" src="{{asset($v)}}" data-img="{{asset($v)}}"/>
                                              
                       <?php }}?>                             
                                            
                    
                    </div>
                    </dt>
                </dl>
            </div>
        </div>
    </div>

@stop