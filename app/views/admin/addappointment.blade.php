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

                        <form class="form-horizontal seperator"  action="{{ url('appointment/save') }}" method="post" id="loginForm" enctype="multipart/form-data" />
                            <input class="span4" id="username" type="hidden" name='id' value="<?php if(isset($info->id)){ echo $info->id; } ?>" />
                            <div class="form-row row-fluid" >
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">预约店铺名字:</label>
                                        <input class="span4" id="username" type="text" name='shopname' value="<?php if(isset($info->tenantsinfo)) echo $info->tenantsinfo->name;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">预约看店姓名:</label>
                                        <input class="span4" id="username" type="text" name='name' value="<?php if(isset($info->name)) echo $info->name;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">预约看店手机号:</label>
                                        <input class="span4" id="username" type="text" name='phone' value="<?php if(isset($info->phone)) echo $info->phone;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span2" for="checkboxes">预约看店时间(精确到秒例如2015-10-15 16:15:30)</label>
                                                    <div class="span4">
                                                        <input style="height: 30px;" name="ctime" type="text"  value="<?php if(isset($info->ctime)){ echo date('Y-m-d H:i:s',$info->ctime); }?>" />
                                                        <font color='red'></font>
                                                    </div>
                                                    
                                                </div>
                                            </div>  
                             </div>
                              
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">回访状态</label>
                                        <select name="visitState" id="visitstate">
                                        	<option value="2" <?php if(isset($info->visitState) && $info->visitState=='2') echo "selected=selected";?>>未回访</option>
                                        	<option value="1" <?php if(isset($info->visitState) && $info->visitState=='1') echo "selected=selected";?>>已回访</option>
                                        </select>
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid" id="visitcontent">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">回访状态</label>
                                        <textarea name="visitContent"  cols="20" rows="10"><?php if(isset($info->visitContent)) echo $info->visitContent;?></textarea>
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">预约看店来源:</label>
                                        <select name="source">
                                        	<option value="1" <?php if(isset($info->source)){ if($info->source==1){ echo "selected"; } }?>>PC套系</option>
                                        	<option value="2" <?php if(isset($info->source)){ if($info->source==2){ echo "selected"; } }?>>PC推荐榜单</option>
                                        	<option value="3" <?php if(isset($info->source)){ if($info->source==3){ echo "selected"; } }?>>PC客片</option>
                                        	<option value="4" <?php if(isset($info->source)){ if($info->source==4){ echo "selected"; } }?>>PC商户页面</option>
                                        	<option value="5" <?php if(isset($info->source)){ if($info->source==5){ echo "selected"; } }?>>移动端套系</option>
                                        	<option value="6" <?php if(isset($info->source)){ if($info->source==6){ echo "selected"; } }?>>移动端推荐榜单</option>
                                        	<option value="7" <?php if(isset($info->source)){ if($info->source==7){ echo "selected"; } }?>>移动端客片</option>
                                        	<option value="8" <?php if(isset($info->source)){ if($info->source==8){ echo "selected"; } }?>>移动端商户页面</option>
                                        </select>
                                       
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">推荐者姓名:</label>
                                        <input class="span4" id="username" type="text" name='recommname' value="<?php if(isset($info->recommname)) echo $info->recommname;?>" />
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
