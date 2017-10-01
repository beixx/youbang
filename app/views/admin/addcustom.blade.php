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

                        <form class="form-horizontal seperator"  action="{{ url('custom/save') }}" method="post" id="loginForm" enctype="multipart/form-data" />
                            <input class="span4" id="username" type="hidden" name='id' value="<?php if(isset($info->id)){ echo $info->id; } ?>" />
                            <div class="form-row row-fluid" >
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">类型:</label>
                                        <input class="span4" id="username" type="text" name='customized_name' value="<?php if(isset($info->customized_name)) echo $info->customized_name;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">风格:</label>
                                        <input class="span4" id="username" type="text" name='style' value="<?php if(isset($info->style)) echo $info->style;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">预算:</label>
                                        <input class="span4" id="username" type="text" name='budget' value="<?php if(isset($info->budget)) echo $info->budget;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span2" for="checkboxes">手机号</label>
                                                    <div class="span4">
                                                        <input style="height: 30px;" name="phone" type="text"  value="<?php if(isset($info->phone)){ echo $info->phone; }?>" />
                                                        <font color='red'></font>
                                                    </div>
                                                    
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
                                        <label class="form-label span2" for="username">城市:</label>
                                        <input class="span4" id="username" type="text" name='city' value="<?php if(isset($info->city)) echo $info->city;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">定制链接:</label>
                                        <input class="span4" id="username" type="text" name='linkurl' value="<?php if(isset($info->linkurl)) echo $info->linkurl;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">回访状态:</label>
                                        <select name="visitState" id="visitstate">
                                        	<option value="2" <?php if(isset($info->visitState) && $info->visitState=='2') echo "selected";?>>未回访</option>
                                        	<option value="1" <?php if(isset($info->visitState) && $info->visitState=='1') echo "selected";?>>已回访</option>
                                        </select>
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid" id="visitcontent">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">回访内容:</label>
			                                 <textarea cols="30" rows="10" name="visitContent"><?php if(isset($info->visitContent)) echo $info->visitContent;?></textarea>       
                                        <div><font color='red'></font></div>
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
	        if($('#visitstate').val() == '1'){
				$('#visitcontent').css('display','block');
			}else{
				$('#visitcontent').css('display','none');
			}

	        $('#visitstate').change(
	                function(){
	        				if($('#visitstate').val() == '1'){
	        					$('#visitcontent').css('display','block');
	            			}else{
	            				$('#visitcontent').css('display','none');
	                		}
	                }
	           );
        </script>
@stop
