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

                        <form class="form-horizontal seperator"  action="{{ url('shop/save') }}" method="post" id="loginForm" enctype="multipart/form-data" />
                            <input class="span4" id="username" type="hidden" name='id' value="<?php if(isset($info->id)){ echo $info->id; } ?>" />
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户名称:</label>
                                        <input class="span4" id="username" type="text" name='name' value="<?php if(isset($info->name)){ echo $info->name; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
							<div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户类型:</label>
                                        <select name="shoptype">
											<option value="婚纱摄影" <?php if(isset($info->shoptype) && $info->shoptype=='婚纱摄影'){ echo 'selected=selected'; }?>>婚纱摄影</option>
											<option value="婚礼策划" <?php if(isset($info->shoptype) && $info->shoptype=='婚礼策划'){ echo 'selected=selected'; }?>>婚礼策划</option>
										</select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户电话:</label>
                                        <input class="span4" id="username" type="text" name='phone' value="<?php if(isset($info->phone)){ echo $info->phone; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户地址:</label>
                                        <input class="span4" id="username" type="text" name='address' value="<?php if(isset($info->address)){ echo $info->address; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户所在城市:</label>
                                        <input class="span4" id="username" type="text" name='positionCity' value="<?php if(isset($info->positionCity)){ echo $info->city; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">所属商圈:</label>
                                       <input class="span4" id="username" type="text" name='city' value="<?php if(isset($info->city)){ echo $info->positionCity; }?>" /><div><font color='red'></font></div>
                                        
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户服务说明:</label>
                                        <textarea cols="20" rows="3" name='service_note'><?php if(isset($info->service_note)){ echo $info->service_note; }?></textarea>
                                       
                                    </div>
                                </div>
                            </div>
                              <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="normal">商户简介:</label>
                                        <div class="span4 controls">
                                             <script id="editor" type="text/plain" style="width:800px;height:500px;" name="abstract"><?php if(isset($info)) echo $info->abstract;?></script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户logo:</label>
                                  		<img src="<?php if(isset($info->logo)){ echo asset($info->logo); }?>" alt="" class="image marginR10" style="width:120px;height:120px;" />   
                                        <input type="file" name="logo"/>
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户封面:</label>
                                  		<img src="<?php if(isset($info->cover)){ echo asset($info->cover); }?>" alt="" class="image marginR10" style="width:120px;height:120px;" />   
                                        <input type="file" name="cover"/>
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">品牌搜索次数:</label>
                                        <input class="span4" id="username" type="text"  name='brand_search_order' value="<?php if(isset($info->brand_search_order)) echo $info->brand_search_order;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">好评数:</label>
                                        <input class="span4" id="username" type="text"  name='praise_num' value="<?php if(isset($info->praise_num)) echo $info->praise_num;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                           
                           <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">差评数:</label>
                                        <input class="span4" id="username" type="text" name='bad_num'  value="<?php if(isset($info->bad_num)) echo $info->bad_num;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username" >是否持平，上升，下降:</label>
                                        
                                       <?php if(isset($info->is_up)){ if($info->is_up==0){ echo "持平"; }else if($info->is_up==1){ echo "上升"; }else if($info->is_up==2){ echo "下降"; } }?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">是否vip:</label>
                                        <select name="isVip" id="mySelect" >
                                        	<option value="1" <?php if(isset($info->isVip)){ if($info->isVip==1){ echo "selected"; } }?>>不是vip</option>
                                        	<option value="2"  <?php if(isset($info->isVip)){ if($info->isVip==2){ echo "selected"; } }?>>是vip</option>
                                        </select>
                                       
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid" id="startTime">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span2" for="checkboxes">vip开始时间日期的形式例如（2017-5-25）</label>
                                                    <div class="span4">
                                                        <input name="startTime" type="text" value="<?php if(isset($info->startTime)) echo date('Y-m-d',$info->startTime);?>" />
                                                        <font color='red'></font>
                                                    </div>
                                                    
                                                </div>
                                            </div>  
                             </div>
                            
                            <div class="form-row row-fluid" id="endTime">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span2" for="checkboxes">vip结束时间日期的形式例如（2017-5-25）</label>
                                                    <div class="span4">
                                                        <input name="endTime" type="text"  value="<?php if(isset($info->endTime)) echo date('Y-m-d',$info->endTime);?>" />
                                                        <font color='red'></font>
                                                    </div>
                                                    
                                                </div>
                                            </div>  
                             </div>
                             <div class="form-row row-fluid" class="xuanfukuang" id="pc">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="normal">pc端咨询代码:</label>
                                        <div class="span4 controls">
                                        	<textarea cols="30" rows="5" name="pcadv"><?php if(isset($info->pcadv)) echo $info->pcadv;?></textarea>
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid" class="xuanfukuang" id="pcurl">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="normal">pc端咨询代码的url:</label>
                                        <div class="span4 controls">
                                        	<textarea cols="30" rows="5" name="pcadvurl"><?php if(isset($info->pcadvurl)) echo $info->pcadvurl;?></textarea>
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid" class="xuanfukuang" id="model">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="normal">移动端咨询代码:</label>
                                        <div class="span4 controls">
                                        	<textarea cols="30" rows="5" name="modeladv"><?php if(isset($info->modeladv)) echo $info->modeladv;?></textarea>
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid" class="xuanfukuang" id="modelurl">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="normal">移动端咨询代码的url:</label>
                                        <div class="span4 controls">
                                        	<textarea cols="30" rows="5" name="modeladvurl"><?php if(isset($info->modeladvurl)) echo $info->modeladvurl;?></textarea>
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">上升下降数:</label>
                                        <input class="span4" id="username" type="text" name='is_up_num' value="<?php if(isset($info->is_up_num)) echo $info->is_up_num;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">全国排名:</label>
                                        <input class="span4" id="username" type="text" name='order_country'  value="<?php if(isset($info->order_country)) echo $info->order_country;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">城市排名:</label>
                                        <input class="span4" id="username" type="text" name='order_city'  value="<?php if(isset($info->order_city)) echo $info->order_city;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">价格排名:</label>
                                        <input class="span4" id="username" type="text" name='price_order'  value="<?php if(isset($info->price_order)) echo $info->price_order;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">好评排名:</label>
                                        <input class="span4" id="username" type="text" name='praise_order'  value="<?php if(isset($info->praise_order)) echo $info->praise_order;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">人均消费:</label>
                                        <input class="span4" id="username" type="text" name='person_price' value="<?php if(isset($info->person_price)) echo $info->person_price;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">增加商户人气数:</label>
                                        <input class="span4" id="username" type="text" name='is_up_num' value="<?php if(isset($info->is_up_num)){ echo $info->is_up_num; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">每天增加套系数量:</label>
                                        <input class="span4" id="username" type="text" name='day_add_taoxi_nums' value="<?php if(isset($info->day_add_taoxi_nums)){ echo $info->day_add_taoxi_nums; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">每天增加的套系关注数:</label>
                                        <input class="span4" id="username" type="text" name='day_add_taoxi_marks' value="<?php if(isset($info->day_add_taoxi_marks)){ echo $info->day_add_taoxi_marks; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">每天增加的客片数:</label>
                                        <input class="span4" id="username" type="text" name='day_add_client_nums' value="<?php if(isset($info->day_add_client_nums)){ echo $info->day_add_client_nums; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">每天增加的案例关注数:</label>
                                        <input class="span4" id="username" type="text" name='day_add_case_marks' value="<?php if(isset($info->day_add_case_marks)){ echo $info->day_add_case_marks; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">每天百度的搜素数量:</label>
                                        <input class="span4" id="username" type="text" name='baidu_search_nums' value="<?php if(isset($info->baidu_search_nums)){ echo $info->baidu_search_nums; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">每天百度的搜素指数:</label>
                                        <input class="span4" id="username" type="text" name='baidu_flag_nums' value="<?php if(isset($info->baidu_flag_nums)){ echo $info->baidu_flag_nums; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">每天360的搜素数量:</label>
                                        <input class="span4" id="username" type="text" name='san_search_nums' value="<?php if(isset($info->san_search_nums)){ echo $info->san_search_nums; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">每天360的搜素指数:</label>
                                        <input class="span4" id="username" type="text" name='san_flag_nums' value="<?php if(isset($info->san_flag_nums)){ echo $info->san_flag_nums; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">每天搜狗的搜素数量:</label>
                                        <input class="span4" id="username" type="text" name='sougou_search_nums' value="<?php if(isset($info->sougou_search_nums)){ echo $info->sougou_search_nums; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">每天搜狗的搜素指数:</label>
                                        <input class="span4" id="username" type="text" name='sougou_flag_nums' value="<?php if(isset($info->sougou_flag_nums)){ echo $info->sougou_flag_nums; }?>" /><div><font color='red'></font></div>
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
        if($('#mySelect').val() == '2'){
			$('#pc').css('display','block');
			$('#model').css('display','block');
			$('#startTime').css('display','block');
			$('#endTime').css('display','block');
			$('#pcurl').css('display','block');
			$('#modelurl').css('display','block');
		}else{
			$('#pc').css('display','none');
			$('#model').css('display','none');
			$('#startTime').css('display','none');
			$('#endTime').css('display','none');
			$('#pcurl').css('display','none');
			$('#modelurl').css('display','none');
  		}
        $('#mySelect').change(
              function(){
      				if($('#mySelect').val() == '2'){
      					$('#pc').css('display','block');
      					$('#model').css('display','block');
      					$('#startTime').css('display','block');
      					$('#endTime').css('display','block');
      					$('#pcurl').css('display','block');
      					$('#modelurl').css('display','block');
          			}else{
          				$('#pc').css('display','none');
          				$('#model').css('display','none');
          				$('#startTime').css('display','none');
          				$('#endTime').css('display','none');
          				$('#pcurl').css('display','none');
          				$('#modelurl').css('display','none');
              		}
              }
         );
        </script>
@stop
