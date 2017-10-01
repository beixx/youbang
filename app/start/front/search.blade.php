@extends('front.base')
@section('content')
<div class="tsm">
<div class="tsmt">{{$city}}  {{$keyword}}  相关搜索</div>
<div class="tsmd">有榜为您找到相关结果{{$count}}个</div>
</div>
<div class="index">
<div class="bd" style="padding:0;">
<div class="i-list">
<div class="list" style="margin:0;">
        <ul>
        	<?php if(count($tenants)){ 
          		foreach($tenants as $key=>$v){
          			if($v->isVip==1){
          	?>
             <li>
                <div class="num lft">
                    <?php if($key<=3){ ?>
						<em class="txtCtr">{{$v->order_city}}<span>TOP</span></em>
					<?php }else{ ?>
						<em class="txtCtr">{{$v->order_city}}<span>TOP</span></em>
					<?php }?>
                    <div class="txtCtr <?php if($v->is_up==1){ echo 's1'; }else if($v->is_up==2){ echo 's2'; }else{ echo 's3'; }?> txt"><?php if($v->is_up==0){ ?>持平<?php }elseif($v->is_up==1){ ?>上升<?php echo $v->is_up_num.'位'; }else if($v->is_up==2){ ?>下降<?php  echo $v->is_up_num.'位'; }?></div>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <a href="{{url('detail')}}/{{$v->id}}"><img src="{{asset($v->cover)}}"></a>
                        <div class="txt">
                            <h3><a href="{{url('detail')}}/{{$v->id}}">{{$v->name}}</a> </h3>
                            <div class="t1">人均消费：<span class="red">¥{{$v->person_price}}</span></div>
                            <div class="t2"><span>{{$v->address}}</span></div>
                            <div class="t3"><span>品牌搜索<em>{{$v->brand_search_num}}</em>次</span><span>全网好评<em>{{$v->praise_num}}</em>条</span><span>全网差评<em>{{$v->bad_num}}</em>条</span></div>
                            <div class="tool">
                                <em class="txtCtr blue">{{$v->heat_index}}</em>
                                <div class="tooltip txtCtr">指数</div>
                            </div>
                            <div class="hot txtCtr">
                                <a href="http://ceshi.youbangkeyi.com/dafen/{{$pycity}}/{{$v->id}}">打榜</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
             <?php }else if($v->isVip==2){ ?>
            <li>
            	<div class="huiyuan"></div>
                <div class="num lft">
                    <?php if($key<=3){ ?>
						<em class="txtCtr">{{$v->order_city}}<span>TOP</span></em>
					<?php }else{ ?>
						<em class="txtCtr">{{$v->order_city}}<span>TOP</span></em>
					<?php }?>
                    <div class="txtCtr <?php if($v->is_up==1){ echo 's1'; }else if($v->is_up==2){ echo 's2'; }else{ echo 's3'; }?> txt"><?php if($v->is_up==0){ ?>持平<?php }elseif($v->is_up==1){ ?>上升<?php echo $v->is_up_num.'位'; }else if($v->is_up==2){ ?>下降<?php  echo $v->is_up_num.'位'; }?></div>
                </div>
                <div class="pic-txt">
                    <div class="txt-box">
                        <div class="txt">
                            <h3><a href="{{url('detail')}}/{{$v->id}}">{{$v->name}}</a> </h3>
                            <div class="t1">人均消费：<span class="red">¥{{$v->person_price}}</span></div>
                            <div class="t2"><span>{{$v->address}}</span></div>
                            <div class="t3"><span>品牌搜索<em>{{$v->brand_search_num}}</em>次</span><span>全网好评<em>{{$v->praise_num}}</em>条</span><span>全网差评<em>{{$v->bad_num}}</em>条</span></div>
                            <div class="tool">
                                <em class="txtCtr blue">{{$v->heat_index}}</em>
                                <div class="tooltip txtCtr">指数</div>
                            </div>
                            <div class="hot txtCtr">
                               <a href="http://ceshi.youbangkeyi.com/dafen/{{$pycity}}/{{$v->id}}">打榜</a>
                            </div>
                        </div>
                    </div>
                    <div class="pic-box">
                        <div class="leftLoop">
                            <div class="bd">
                                <ul>
                                	<?php if(isset($v->taoxis) && count($v->taoxis)){
                                			foreach($v->taoxis as $key=>$t){
                                				if($key<4){
                                					if(count($t->cover)){
                                						$covers = $v->cover;
                                						$cover = $covers[0];
                                					}
                                		?>
                                    <li>
                                        <div class="pic"><a href="{{url('detail')}}/{{$v->id}}/{{$t->id}}"><img src="{{asset($cover)}}" /></a></div>
                                        <div class="title"><a href="">{{$t->setName}}</a></div>
                                        <div class="price">
                                            <span class="red">¥{{$t->currentPrice}}</span><em>原价 <i>¥{{$t->price}}</i></em>
                                        </div>
                                    </li>
                                     <?php }}}?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
			 <?php }}}else{?>
      		<div id="nomore" style="width:100%;text-align: center;padding: 150px 0;">
				<p>如果您查找商户在这里没有展示，说明该商户没有进入该城市前100名。</p>
			</div>
      		<?php }?>
        </ul>
    </div>
</div>
    </div>
</div>
@stop