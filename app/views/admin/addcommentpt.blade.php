@extends('admin.base')

@section('content')
 
<div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                  
                </div>
                <div class="row-fluid">

                    <div class="span12">

                        <div class="page-header">
                            <h4>{{ $name }}</h4>
                        </div>

                        <form class="form-horizontal seperator"  action="{{ url('commentpt/saveshop') }}" method="post" id="loginForm" enctype="multipart/form-data" />
                            <input class="span4" id="username" type="hidden" name='tenantsId' value="<?php if(isset($info->tenantsinfo)){ echo $info->tenantsinfo->id; } ?>" />
                            <input class="span4" id="username" type="hidden" name='id' value="<?php if(isset($info->id)){ echo $info->id; } ?>" />
                    		<input class="span4" id="username" type="hidden" name='setId' value="<?php if(isset($info->setinfo)){ echo $info->setinfo->id; } ?>" />
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户名称:</label>
                                        <input class="span4" id="username" disabled="disabled"  type="text"  value="<?php if(isset($info->tenantsinfo->name)){ echo $info->tenantsinfo->name; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">此次消费价格:</label>
                                        <input class="span4" id="username" type="text" name='currentPrice' value="<?php if(isset($info->price)) echo $info->price;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户打分分数 范围(1-100)分:</label>
                                        <input class="span4" id="username" type="text" name='score' value="<?php if(isset($info->score)) echo $info->score;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">打分理由:</label>
                                        <input class="span4" id="username" type="text" name='merits' value="<?php if(isset($info->merits)) echo $info->merits;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <!-- 
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户优点:</label>
                                        <input class="span4" id="username" type="text" name='merits' value="<?php if(isset($info->merits)) echo $info->merits;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户缺点:</label>
                                        <input class="span4" id="username" type="text" name='defect' value="<?php if(isset($info->defect)) echo $info->defect;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">总体评价:</label>
                                        <input class="span4" id="username" type="text" name='totailty' value="<?php if(isset($info->totailty)) echo $info->totailty;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             -->
                    		
                            <div class="form-row row-fluid comment">
                                <div class="span12">
                                    <div class="row-fluid">
               							<div class="up-pic">
									        <div class="title"><em class="red">*</em>单据证明</div>
									        <div class="pic-box" id="ImgRegin">
									            <?php if(isset($info->documentary)){
					                    			foreach($info->documentary as $v){
					                    		?>
									            <div class="pic lft" style="display:block;">
	                								<div class="close">
														<input type="hidden" name="documentary[]" value="{{$v}}" id="user_bill" />
													</div>
	                								<img id="upload_img2" width="120px" src="{{asset($v)}}">
	            								</div>
									            <?php }}?>
									        </div>
									        <script type="text/html" id="ImgTemp">
												@{{each list}}
												<div class="pic lft">
	                								<div class="close">
														<input type="hidden" name="documentary[]" value="@{{$value}}" id="user_bill" />
													</div>
	                								<img id="upload_img2" width="120px" src="http://ceshi.youbangkeyi.com/@{{$value}}">
	            								</div>
												@{{/each}}
												</script>
									        
									          <div style="margin-top:20px;">点击上传单据：<input class="weui-uploader__input" multiple="multiple" id="photo_file" type="file" accept="image/*" onchange="SeleImg(this);"/></div>
									   	</div>
                                    </div>
                                </div>
                            </div>
                          
                             <div class="form-row row-fluid comment">
                                <div class="span12">
                                    <div class="row-fluid">
               							<div class="up-pic">
									        <div class="title"><em class="red">*</em>婚纱照片查看:</div>
									        <div class="pic-box" id="ImgPhotoRegin">
									            <?php if(isset($info->photo)){
					                    			foreach($info->photo as $v){
					                    		?>
									            <div class="pic lft" style="display:block;">
	                								<div class="close">
														<input type="hidden" name="photo[]" value="{{$v}}" id="user_bill" />
													</div>
	                								<img id="upload_img2" width="120px" src="{{asset($v)}}">
	            								</div>
									              <?php }}?>
									        </div>
									        <script type="text/html" id="ImgPhotoTemp">
												@{{each list}}
												<div class="pic lft">
	                								<div class="close">
														<input type="hidden" name="photo[]" value="@{{$value}}" id="user_bill" />
													</div>
	                								<img id="upload_img2" width="120px" src="http://ceshi.youbangkeyi.com/@{{$value}}">
	            								</div>
												@{{/each}}
												</script>
									        
									          <div style="margin-top:20px;">点击上传婚纱照片：<input class="weui-uploader__input" multiple="multiple"  id="photo_file" type="file" accept="image/*" onchange="SelePhotoImg(this);"/></div>
									   	</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">上传的个人头像（非必须）:</label>
                                  		<img src="{{asset($info->headimg)}}" alt="" class="image marginR10" style="width:120px;height:120px;" />   
                                        <input type="file" name="headimg[]"  multiple="multiple"/>
               
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">姓名:</label>
                                  		<input class="span4" id="username" type="text" name='name' value="<?php if(isset($info->name)) echo $info->name;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">手机号:</label>
                                  		<input class="span4" id="username" type="text" name='phone' value="<?php if(isset($info->phone)) echo $info->phone;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span2" for="checkboxes">评论时间</label>
                                                    <div class="span4">
                                                        <input name="created" type="text" id="datepicker" value="<?php if(isset($info->created)) echo date('Y-m-d H:i:s',$info->created);?>" />
                                                        <font color='red'><?php echo $errors->first('shijian'); ?></font>
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
		   	 function SeleImg(ObjectDom){
		   		 var FormObj = new FormData();
		   		 var files = event.target.files;
		            for (var index = 0; index < files.length; index ++)
		            {
			            console.log('长度'+files.length);
		                var file = files[index];
		   				EXIF.getData(file, function() {       
		   					 FormObj.append("photo[]", file);
		   					 SubmitImgAjax(FormObj);
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
		           ImgHttp.open("post", "http://ceshi.youbangkeyi.com/commentpt/savedanju", true);
		           ImgHttp.send(FormObj);
		   	};

		  //选择图片(婚纱照片)
		   	 function SelePhotoImg(ObjectDom){
		   		 var FormObj = new FormData();
		   		 var files = event.target.files;
		            for (var index = 0; index < files.length; index ++)
		            {
		                var file = files[index];
		   				EXIF.getData(file, function() {       
		   					 FormObj.append("photo[]", file);
		   					SubmitImgPhotoAjax(FormObj);
		   			    }); 
		            };
		   	 };
		   	//上传图片文件（单据证明）
		    function SubmitImgPhotoAjax(FormObj){
		   		var ImgHttp = new XMLHttpRequest();
		   		ImgHttp.onload = function(event){
		   			var TempObj = JSON.parse(event.target.responseText || "{}");
		           		if(TempObj.result == "00")
		           		{
		           			$("#ImgPhotoRegin").append(template("ImgPhotoTemp", TempObj || []));
		           			$('.close').click(function(){
		           				$(this).parent().remove();
		           			});
		           		}else{
		           			$("#MarkBox").text("照片超过规定大小,上传失败");
		           		};
		           		setTimeout(function(){ layer.closeAll(); }, 1500);
		   		};
		           ImgHttp.open("post", "http://ceshi.youbangkeyi.com/commentpt/savepingphoto", true);
		           ImgHttp.send(FormObj);
		   	};
        </script>
@stop