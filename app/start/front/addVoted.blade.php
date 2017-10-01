@extends('front.base')
<script type="text/javascript" src="{{asset('xinjs/layer.js')}}" ></script>
<script type="text/javascript" src="{{asset('xinjs/uploadImage.js')}}"></script>
<script type="text/javascript" src="{{asset('xinjs/exif.js')}}"></script>
@section('content')
<div class="main shop-index">
<?php if(isset($tenantinfo->isVip) && $tenantinfo->isVip=='2'){ echo '<div class="huiyuan"></div>'; } ?>
    <div class="ban-box">
        <div class="txt lft">
            <h2><a href="{{ url('detail') }}/{{$tenantinfo->id}}">{{$tenantinfo->name}}</a></h2>
            <p>人均消费：¥{{$tenantinfo->person_price}}<em>|</em>地址：{{$tenantinfo->address}}</p>
        </div>
        <div class="btn rgt">
            第<i>{{$tenantinfo->order_city}}</i>名<em></em>
        </div>
    </div>
<div class="comment">
    <div class="tips">
        点评和打分都将是其他网友的参考依据，并影响该商户在榜单中的排名。<br>
        请发布真实、客观的个人消费体验评价。如您遇到威逼、利诱及优惠等干扰而发布的点评或并非本人体验的虚假、恶意点评，则打分视为违规。
    </div>
<!--评分-->
		<form action="{{url('index/savevote')}}" enctype="multipart/form-data" method="post" onSubmit="return checkform();">
		  <input type="hidden" name="id" id="storeId" value="{{$tenantinfo->id}}">
		  <input type="hidden" name="city" id="city" value="{{$city}}">
       <div class="User_ratings User_grade" id="div_fraction0">
            <div class="title"><em class="red">*</em>总体打分<span>（<span id="title0">0</span>）</span></div>
            <div class="ratings_bars">
                <div class="scale" id="bar0">
                    <div style="width: 429px;"></div>
                    <span id="btn0" style="left: 429px;"></span>
                </div>
                <div class="num txtCtr">
                    <span class="bars_10 fu lft"><em>-30</em>分</span>
                    <span class="bars_10 c"><em>0</em></span>
                    <span class="bars_10 red rgt"><em>30</em>分</span>
                    <input type="hidden" name="score" id="pingfen">    
                </div>
            </div>
        </div>
<!--表单-->
	    <div class="text-input">
	        <div class="title"><em class="red">*</em>评分理由</div>
	        <textarea name="content" id="content" cols="45" rows="5" placeholder="评价下摄影师造型师、服装款式、拍摄基地和服务等，帮助更多会员做出明智选择哦！" style="resize:none"></textarea>
	    </div>
	    <div class="up-pic">
	        <div class="title"><em class="red">*</em>单据证明</div>
	        <div class="pic-box" style="width:910px;" id="ImgRegin">
	            
	        </div>
	        <script type="text/html" id="ImgTemp">
				@{{each list}}
				<div class="pic lft">
	                <div class="close">
						<input type="hidden" name="user_bill[]" value="@{{$value}}" id="user_bill" />
					</div>
	                <img id="upload_img2" src="http://ceshi.youbangkeyi.com/@{{$value}}">
	            </div>
				@{{/each}}
			</script>
	        <div class="up">
	            <a href="javascript:void(0);" class="file txtCtr lft"><span class="lft fB">+</span>
					<i class="lft">选择文件</i>
	                <input class="weui-uploader__input"  id="photo_file" type="file" multiple="multiple"  onchange="SeleImg(this);"/>
	            </a>
	            <em class="lft">为了能够证明真实性，请您上传单据，图片不超过1M</em>
	        </div>
	   	</div>

    	<div class="up-pic">
	        <div class="title"><em class="red">*</em>上传照片</div>
	        <div class="pic-box" style="width:910px;" id="photoRegin">
	            
	            
	        </div>
	        <script type="text/html" id="photoTemp">
				@{{each list}}
				<div class="pic lft" >
	                <div class="close"> <input type="hidden" name="user_photo[]" value="@{{$value}}" id="user_photo" /> </div>
	                <img id="photo_img" src="http://ceshi.youbangkeyi.com/@{{$value}}">
	            </div>
				@{{/each}}
			</script>
			
			
	        <div class="up">
	            <a href="javascript:void(0);" class="file txtCtr lft"><span class="lft fB">+</span><i class="lft">上传图片</i>
	                 <input class="weui-uploader__input"  id="photo_file" type="file" multiple="multiple"  onchange="SelePhoto(this);"/>
	            </a>
	            <em class="lft">可以上传多张照片，单张图片不超过1M</em>
	        </div>
    	</div>

	    <div class="up-face">
	        <div class="title">上传个人头像</div>
	        <input type="hidden" name="user_head" value="" id="photo_head" />
	        <div style="margin-left:20px;margin-bottom:20px;" id="headimgRegin"></div>
	        <script type="text/html" id="headimgTemp">
				@{{each list}}
				<img id="head_img" src="http://ceshi.youbangkeyi.com/@{{$value}}" width="140" height="100" >
				<input type="hidden" name="headimg" value="@{{$value}}" id="user_head" />
				@{{/each}}
			</script>
	        <a href="javascript:void(0);" class="file txtCtr lft fB">+
	             <input class="weui-uploader__input"  id="head" type="file"  onchange="SeleHeadimg(this);"/>
	        </a>
	    </div>
		<div class="text-input">
	        <div class="title"><em class="red">*</em>消费金额</div>
	        <input type="text" value="" name="price" class="input" id="price">
	    </div>
	    <div class="contact">
	        <div class="title"><em class="red">*</em>联系方式</div>
	        <dl>
	            <dt class="lft">姓名：</dt>
	            <dd class="lft"><input type="text" value="" name="userName" class="input" id="userName"></dd>
	        </dl>
	        <dl>
	            <dt class="lft">手机：</dt>
	            <dd class="lft"><input type="text" value="" name="phone" class="input" id="phone"></dd>
	        </dl>
	        <p>为了验证评论是由本人填写，并非商家行为，我们保证您的手机号绝对不会泄露。(部分评论会进行电话核实）</p>
	    </div>

	    <div class="submit">
	        <input type="submit" value="提 交" class="txtCtr">
	    </div>
        <div class="J_item hi-50"></div>
        </form>
</div></div>
<script type="text/javascript" src="{{ asset('xinjs/template.js') }}"></script>
<script type="text/javascript" src="{{ asset('xinjs/zepto.min.js') }}"></script>
<script type="text/javascript">
//模糊搜索商家
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
			
	// 打分
    scale = function (btn, bar, title) {
        this.btn = document.getElementById(btn);
        this.bar = document.getElementById(bar);
        this.title = document.getElementById(title);
        this.step = this.bar.getElementsByTagName("DIV")[0];
        this.init();
    };
    scale.prototype = {
        init: function () {
            var f = this, g = document, b = window, m = Math;
            f.btn.onmousedown = function (e) {
                var x = (e || b.event).clientX;
                var l = this.offsetLeft;
                var max = f.bar.offsetWidth - this.offsetWidth;
                g.onmousemove = function (e) {
                    var thisX = (e || b.event).clientX;
                    var to = m.min(max, m.max(-2, l + (thisX - x)));
                    f.btn.style.left = to + 'px';
                    f.ondrag(m.round(m.max(0, to / max) * 100), to);
                    b.getSelection ? b.getSelection().removeAllRanges() : g.selection.empty();
                };
                g.onmouseup = new Function('this.onmousemove=null');
            };
        },
        ondrag: function (pos, x) {
            this.step.style.width = Math.max(0, x) + 'px';
            var tot = parseInt(pos / 1.65 - 30);
            $("#pingfen").val(tot);
            if(tot > 0){
            	this.title.innerHTML ='+'+ tot + '';
            }else{
				this.title.innerHTML ='<font color="#51c987">'+ tot + '</font>';
				
            }
            
        }
    }
    new scale('btn0', 'bar0', 'title0');

   
     //选择图片(单据证明)
	 function SeleImg(ObjectDom){
		 var FormObj = new FormData();
		 var files = event.target.files;
		 var len = 0;
         for (var index = 0; index < files.length; index ++)
         {
             var file = files[index];
             console.log(file);
				EXIF.getData(file, function() { 
	   				len++;    
					 FormObj.append("photo[]", files[len-1]);
					 if(len==files.length){
						 SubmitImgAjax(FormObj);
		   			}
					
			    }); 
         };
	 };
	//上传图片文件（单据证明）
    function SubmitImgAjax(FormObj){
		var ImgHttp = new XMLHttpRequest();
		ImgHttp.onload = function(event){
			var TempObj = JSON.parse(event.target.responseText || "{}");
        		if(TempObj.result == "00")
        		{
        			$("#ImgRegin").append(template("ImgTemp", TempObj || []));
        			$('.close').click(function(){
        				$(this).parent().remove();
        			});
        		}else{
        			$("#MarkBox").text("照片超过规定大小,上传失败");
        		};
        		setTimeout(function(){ layer.closeAll(); }, 1500);
		};
        ImgHttp.open("post", "http://ceshi.youbangkeyi.com/index/savedanju", true);
        ImgHttp.send(FormObj);
	};

	//选择图片(上传照片)
	 function SelePhoto(ObjectDom){
		 var FormObj = new FormData();
		 var files = event.target.files;
		 var len = 0;
         for (var index = 0; index < files.length; index ++)
         {
             var file = files[index];
             console.log(file);
				EXIF.getData(file, function() { 
	   				len++;    
					 FormObj.append("photo[]", files[len-1]);
					 if(len==files.length){
						 SubmitPhotoAjax(FormObj);
		   			}
					
			    }); 
         };
	 };
	//上传图片文件（上传照片）
   function SubmitPhotoAjax(FormObj){
		var ImgHttp = new XMLHttpRequest();
		
		ImgHttp.onload = function(event){
			var TempObj = JSON.parse(event.target.responseText || "{}");
       		if(TempObj.result == "00")
       		{
       			$("#photoRegin").append(template("photoTemp", TempObj || []));
       			$('.close').click(function(){
       				$(this).parent().remove();
       			});
       		}else{
       			$("#MarkBox").text("照片超过规定大小,上传失败");
       		};
       		setTimeout(function(){ layer.closeAll(); }, 1500);
		};
       ImgHttp.open("post", "http://ceshi.youbangkeyi.com/index/savephoto", true);
       ImgHttp.send(FormObj);
	};


	//选择图片(上传个人头像)
	 function SeleHeadimg(ObjectDom){
		 var FormObj = new FormData();
		 var files = event.target.files;
       for (var index = 0; index < files.length; index ++)
       {
           var file = files[index];
				EXIF.getData(file, function() {       
					 FormObj.append("photo[]", file);
					 SubmitHeadimgAjax(FormObj);
			    }); 
       };
	 };
	//上传图片文件（上传个人头像）
  function SubmitHeadimgAjax(FormObj){
		var ImgHttp = new XMLHttpRequest();
		
		ImgHttp.onload = function(event){
			var TempObj = JSON.parse(event.target.responseText || "{}");
      		if(TempObj.result == "00")
      		{
      			$("#headimgRegin").html(template("headimgTemp", TempObj || []));
      		}else{
      			$("#MarkBox").text("照片超过规定大小,上传失败");
      		};
      		setTimeout(function(){ layer.closeAll(); }, 1500);
		};
      ImgHttp.open("post", "http://ceshi.youbangkeyi.com/index/saveheadimg", true);
      ImgHttp.send(FormObj);
	};

	function checkform(){
		if(!$('#pingfen').val()){
			alert('打分不能为空');
			return false;
		}
		if(!$('#content').val()){
			alert('评分理由不能为空');
			return false;
		}
		if(!$('#user_bill').val()){
			alert('单据证明不能为空');
			return false;
		}
		if(!$('#user_photo').val()){
			alert('用户图片不能为空');
			return false;
		}
		if(!$('#user_head').val()){
			alert('用户头像不能为空');
			return false;
		}
		if(!$('#userName').val()){
			alert('用户姓名不能为空');
			return false;
		}
		if(!$('#phone').val()){
			alert('用户电话不能为空');
			return false;
		}else{
			var phone = $('#phone').val();
		    if(!(/^1[34578]\d{9}$/.test(phone))){ 
		        alert("手机号码有误，请重填");  
		        return false; 
		    } 
		}
		return true;
	}
   </script>
@stop
