@extends('front.base')
@section('content')
<style type="text/css">
.recomm {
    padding-bottom: 30px;
    margin: 0px auto 0;
}
</style>
<div class="tsm">
<div class="tsmt" style="    font-size: 22px;
    font-weight: 700;padding-top:36px;width:1000px; margin:0 auto;
">榜单定制完成</div>
<div class="tsmd" style="    font-size:12px;
  width:1000px; margin:0 auto;    line-height:35px;
">hi，{{$name}}：{{$city}}地区，消费在{{$price}}元左右，风格包含{{$style}}的定制榜单已经生成！</div>
</div>
<div class="recomm" style="margin:0px auto 0;background:#FFF;">
    <ul>
    	<?php 
    			if(isset($oneinfo->id) && $oneinfo->id){
    	?>	
    			
    		<li>
                 <div class="num lft">
                     <em class="txtCtr">{{$oneinfo->order_city}}<span style="padding-top:15px;">AD</span></em>
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
                                <a href="/dafen/{{$pycity}}/{{$oneinfo->id}}">打榜</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>	
    	<?php }?>
    	<?php if(count($search)){
    		foreach($search as $key=>$info){
				if($key==2){
					if(isset($advinfo->content) && $advinfo->content){
		?>
		<div class="guanggao">{{$advinfo->content}}</div>
		<?php
			}}
			if ($info->isVip==1){
    	?>
       <li>
            <div class="num lft">
                <?php if($key<=3){ ?>
						<em class="txtCtr">{{$key+1}}<span>TOP</span></em>
					<?php }else{ ?>
						<em class="txtCtr">{{$key+1}}<span>TOP</span></em>
					<?php }?>
            </div>
            <div class="pic-txt">
                <div class="txt-box">
                    <a href="{{url('detail')}}/{{$info->id}}"><img src="{{asset($info->cover)}}"></a>
                    <div class="txt">
                        <h3><a href="{{url('detail')}}/{{$info->id}}">{{$info->name}}
					</a> </h3>
                        <div class="t1">人均消费：<span class="red">¥{{$info->person_price}}</span></div>
                        <div class="t2">{{$info->address}}</div>
                        <div class="t3"><span>品牌搜索<em>{{$info->brand_search_num}}</em>次/天</span><span>全网好评<em>{{$info->praise_num}}</em>条</span><span>全网差评<em>{{$info->bad_num}}</em>条</span></div>
                        <div class="tool">
                            <em class="txtCtr blue">{{$info->heat_index}}</em>
                            <div class="tooltip txtCtr" title="">指数</div>
                        </div>
						<div class="hot txtCtr">
                                <a href="/dafen/{{$pycity}}/{{$info->id}}">打榜</a>
                            </div>
                    </div>
                </div>
            </div>
        </li>
      <?php }else if($info->isVip==2){?>
        <li>
          <div class="huiyuan"></div>
            <div class="num lft">
                <?php if($key<=3){ ?>
						<em class="txtCtr">{{$key+1}}<span>TOP</span></em>
					<?php }else{ ?>
						<em class="txtCtr">{{$key+1}}<span>TOP</span></em>
					<?php }?>
            </div>
            <div class="pic-txt">
                <div class="txt-box">
                    <div class="txt">
                        <h3><a href="{{url('detail')}}/{{$info->id}}">{{$info->name}}</a> </h3>
                        <div class="t1">人均消费：<span class="red">¥{{$info->person_price}}</span></div>
                        <div class="t2">{{$info->address}}</div>
                        <div class="t3"><span>品牌搜索<em>{{$info->brand_search_num}}</em>次/天</span><span>全网好评<em>{{$info->praise_num}}</em>条</span><span>全网差评<em>{{$info->bad_num}}</em>条</span></div>
                        <div class="tool">
                            <em class="txtCtr blue">{{$info->heat_index}}</em>
                            <div class="tooltip txtCtr" title="">指数</div>
                        </div>
						<div class="hot txtCtr">
                               <a href="/dafen/{{$pycity}}/{{$info->id}}">打榜</a>
                            </div>
                    </div>
                </div>
                <?php if(count($info->sets)){  ?>
                <div class="pic-box">
                    <div id="auto1" class="leftLoop">
                        <div class="bd">
                            <div class="tempWrap"><ul>
                            	<?php foreach($info['sets'] as $key => $t){
									
                            		if($key<4){
                            		?>
                                <li>
                                    <div class="pic" tt="{{$t->id}}"><a href="{{url('detail')}}/{{$info->id}}/{{$t->id}}"><img src="<?php $covers = $t->cover; echo asset($covers[0]);?>"></a></div>
                                    <div class="txm" tt="{{$t->id}}"><a href="{{url('detail')}}/{{$info->id}}/{{$t->id}}">{{$t->setName}}</a></div>
                                    <div class="price">
                                        <span class="red">¥{{$t->currentPrice}}</span><em>原价 ¥{{$t->price}}</em>
                                    </div>
                                    <div class="tag">
                                    	<?php if(isset($t->kind) && count($t->kind)){
                                    			foreach($t->kind as $v){
                                    		?>
                                        <a>{{$v}}</a>
                                        <?php }}?>
                                    </div>
                                </li>
                               <?php }}?>
                            </ul></div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </li>
          <?php }}}?>
    </ul>
</div>
<script type="text/javascript">
	$('.detail').click(function(){
		var flag = 'detail'+$(this).attr('tt');
		$('#'+flag).submit();
	})
</script>
@stop