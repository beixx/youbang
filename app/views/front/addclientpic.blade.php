@extends('admin.base')
@extends('admin.base')
@section('content')
 
<div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    

                </div><!-- End .heading-->

                <!-- Build page from here: -->
                <div class="row-fluid">

                    <div class="span12">

                        <div class="page-header">
                            <h4>{{ $name }}</h4>
                        </div>

                        <form class="form-horizontal seperator"  action="{{ url('shop/saveclientpic') }}" method="post" id="loginForm" enctype="multipart/form-data" />
                           
                            <input class="span4" id="username" type="hidden" name='tenantsId' value="{{ $tenantsId }}" />
                            <input class="span4" id="username" type="hidden" name='taoxiId' value="{{ $taoxiId }}" />
                    		 <input class="span4" id="username" type="hidden" name='id' value="<?php if(isset($info->id)) echo $info->id; ?>" />
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">客片名称</label>
                                        <input class="span4" id="username" type="text" name='picName' value="<?php if(isset($info->picName)) echo $info->picName; ?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-row row-fluid comment">
                                <div class="span12">
                                    <div class="row-fluid">
               							<div class="up-pic">
									        <div class="title"><em class="red">*</em>客片图:</div>
									        <div class="pic-box" id="ImgCoverRegin">
									            <?php if(isset($info->cover)){
					                    			foreach($info->cover as $v){
					                    		?>
									            <div class="pic lft" style="display:block;">
	                								<div class="close">
														<input type="hidden" name="cover[]" value="{{$v}}" id="user_bill" />
													</div>
	                								<img id="upload_img2" width="120px" src="{{asset($v)}}">
	            								</div>
									              <?php }}?>
									        </div>
									        <script type="text/html" id="ImgCoverTemp">
												@{{each list}}
												<div class="pic lft">
	                								<div class="close">
														<input type="hidden" name="cover[]" value="@{{$value}}" id="user_bill" />
													</div>
	                								<img id="upload_img2" width="120px" src="http://ceshi.youbangkeyi.com/@{{$value}}">
	            								</div>
												@{{/each}}
												</script>
									        
									          <div style="margin-top:20px;">点击上传套系封面图：<input class="weui-uploader__input"  multiple="multiple" id="photo_file" type="file" accept="image/*" onchange="SeleCoverImg(this);"/></div>
									   	</div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid" >
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="normal">客片说明:</label>
                                        <div class="span4 controls">
                                        	<textarea cols="30" rows="5" name="explain"><?php if(isset($info->explain)) echo $info->explain; ?></textarea>
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                             
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">客片风格:</label>
                                       <?php foreach($styles as $v){ ?>
                                       <input type="checkbox" name="picStyle[]" value="{{$v->name}}" <?php if(isset($info->picStyle) && count($info->picStyle)){ foreach($info->picStyle as $t){ if($t==$v->name){ echo "checked=checked"; } }  }?>>{{$v->name}}
                                       <?php }?>
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                         
                         <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">客片关注数:</label>
                                        <input class="span4" id="username" type="text" name='marknums' value="<?php if(isset($info->marknums)) echo $info->marknums; ?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">客片来源:(1,2,3,4不同的数值对应不同的渠道来源)</label>
                                        <input class="span4" id="username" type="text" name='source' value="<?php if(isset($info->source)) echo $info->source; ?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid comment">
                                <div class="span12">
                                    <div class="row-fluid">
               							<div class="up-pic">
									        <div class="title"><em class="red">*</em>客片封面图:</div>
									        <div class="pic-box" id="ImgFirstCoverRegin">
									            <?php if(isset($info->firstcover)){
					                    			foreach($info->firstcover as $key=>$v){
					                    				if($key=0){
					                    		?>
									            <div class="pic lft" style="display:block;">
	                								<div class="close">
														<input type="hidden" name="cover[]" value="{{$v}}" id="user_bill" />
													</div>
	                								<img id="upload_img2" width="120px" src="{{asset($v)}}">
	            								</div>
									              <?php }}}?>
									        </div>
									        <script type="text/html" id="ImgFirstCoverTemp">
												@{{each list}}
												<div class="pic lft">
	                								<div class="close">
														<input type="hidden" name="firstcover[]" value="@{{$value}}" id="user_bill" />
													</div>
	                								<img id="upload_img2" width="120px" src="http://ceshi.youbangkeyi.com/@{{$value}}">
	            								</div>
												@{{/each}}
												</script>
									        
									          <div style="margin-top:20px;">点击上传套系封面图：<input class="weui-uploader__input" multiple="multiple"  id="photo_file" type="file" accept="image/*" onchange="SeleFirstCoverImg(this);"/></div>
									   	</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">        
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="form-actions">
                                        <div class="span2"></div>
                                        <div class="span4 controls">
                                            <button type="submit" class="btn btn-info marginR10">保存</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            
                    	</form>
                    	
                            

                            
                            
                            
                            
                           
                        
                      
                    </div><!-- End .span12 -->

                </div><!-- End .row-fluid -
                
            </div><!-- End contentwrapper -->
        </div>
        
        <script type="text/javascript">
        $('.close').click(function(){
				$(this).parent().remove();
			});
        	//选择图片(单据证明)
		   	 function SeleCoverImg(ObjectDom){
		   		 var FormObj = new FormData();
		   		 var files = event.target.files;
		            for (var index = 0; index < files.length; index ++)
		            {
		                var file = files[index];
		   				EXIF.getData(file, function() {       
		   					 FormObj.append("photo[]", file);
		   					 SubmitCoverAjax(FormObj);
		   			    }); 
		            };
		   	 };
		   	//上传图片文件（单据证明）
		    function SubmitCoverAjax(FormObj){
		   		var ImgHttp = new XMLHttpRequest();
		   		ImgHttp.onload = function(event){
		   			var TempObj = JSON.parse(event.target.responseText || "{}");
		           		if(TempObj.result == "00")
		           		{
		           			$("#ImgCoverRegin").append(template("ImgCoverTemp", TempObj || []));
		           			$('.close').click(function(){
		           				$(this).parent().remove();
		           			});
		           		}else{
		           			$("#MarkBox").text("照片超过规定大小,上传失败");
		           		};
		           		setTimeout(function(){ layer.closeAll(); }, 1500);
		   		};
		           ImgHttp.open("post", "http://ceshi.youbangkeyi.com/commentpt/savedanju", true);
		           ImgHttp.send(FormObj);
		   	};

		  //选择图片(单据证明)
		   	 function SeleFirstCoverImg(ObjectDom){
		   		 var FormObj = new FormData();
		   		 var files = event.target.files;
		            for (var index = 0; index < files.length; index ++)
		            {
		                var file = files[index];
		   				EXIF.getData(file, function() {       
		   					 FormObj.append("photo[]", file);
		   					 SubmitFirstCoverAjax(FormObj);
		   			    }); 
		            };
		   	 };
		   	//上传图片文件（单据证明）
		    function SubmitFirstCoverAjax(FormObj){
		   		var ImgHttp = new XMLHttpRequest();
		   		ImgHttp.onload = function(event){
		   			var TempObj = JSON.parse(event.target.responseText || "{}");
		           		if(TempObj.result == "00")
		           		{
		           			$("#ImgFirstCoverRegin").html(template("ImgFirstCoverTemp", TempObj || []));
		           			$('.close').click(function(){
		           				$(this).parent().remove();
		           			});
		           		}else{
		           			$("#MarkBox").text("照片超过规定大小,上传失败");
		           		};
		           		setTimeout(function(){ layer.closeAll(); }, 1500);
		   		};
		           ImgHttp.open("post", "http://ceshi.youbangkeyi.com/commentpt/savedanju", true);
		           ImgHttp.send(FormObj);
		   	};
        </script>
@stop
