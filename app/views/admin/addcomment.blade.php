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

                        <form class="form-horizontal seperator"  action="{{ url('comment/saveshop') }}" method="post" id="loginForm" enctype="multipart/form-data" />
                            <input class="span4" id="username" type="hidden" name='tenantsId' value="<?php if(isset($info->tenantsinfo)){ echo $info->tenantsinfo->id; } ?>" />
                            <input class="span4" id="username" type="hidden" name='id' value="<?php if(isset($info->id)){ echo $info->id; } ?>" />
                    		<input class="span4" id="username" type="hidden" name='setId' value="<?php if(isset($info->setinfo)){ echo $info->setinfo->id; } ?>" />
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户名称:</label>
                                        <input class="span4" id="username" type="text" name='shopname' value="<?php if(isset($info->tenantsinfo->name)){ echo $info->tenantsinfo->name; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">点评来源:</label>
                                        <select name="source">
                                        	<option value="1" <?php if(isset($info->source)){ if($info->source==1){ echo "selected"; } }?>>web114</option>
                                        	<option value="2" <?php if(isset($info->source)){ if($info->source==2){ echo "selected"; } }?>>婚博会</option>
                                        	<option value="3" <?php if(isset($info->source)){ if($info->source==3){ echo "selected"; } }?>>点评</option>
                                        	<option value="4" <?php if(isset($info->source)){ if($info->source==4){ echo "selected"; } }?>>百合婚礼</option>
                                        	<option value="5" <?php if(isset($info->source)){ if($info->source==5){ echo "selected"; } }?>>婚礼纪</option>
                                        </select>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span2" for="checkboxes">点评时间</label>
                                                    <div class="span4">
                                                        <input style="height: 30px;" name="created" type="text" id="datepicker" value="<?php if(isset($info->created)){ echo date('Y-m-d H:i:s',$info->created); }?>" />
                                                        <font color='red'></font>
                                                    </div>
                                                    
                                                </div>
                                            </div>  
                             </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">点评用户名:</label>
                                        <input class="span4" id="username" type="text" name='name' value="<?php if(isset($info->name)) echo $info->name;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">点评用户头像::</label>
                                        <?php if(isset($info->picture) && $info->picture) { ?>
                                  		<img src="{{asset($info->picture)}}" alt="" class="image marginR10" style="width:120px;height:120px;" /> 
                                  		<?php }?>  
                                        <input type="file" name="picture"/>
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">点评评分:</label>
                                        <input class="span4" id="username" type="text" name='score' value="<?php if(isset($info->score)) echo $info->score;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                         
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="normal">点评内容:</label>
                                        <div class="span4 controls">
                                             <script id="editor" type="text/plain" style="width:800px;height:500px;" name="conent"><?php if(isset($info->conent)) echo $info->conent;?></script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">套系价格:</label>
                                        <input class="span4" id="username" type="text" name='price' value="<?php if(isset($info->setinfo->currentPrice)) echo $info->setinfo->currentPrice;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">平台加分分数:</label>
                                        <input class="span4" id="username" type="text" name='addscore' value="<?php if(isset($info->addscore)) echo $info->addscore;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                    
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">平台加分理由:</label>
                                        <input class="span4" id="username" type="text" name='addreasons' value="<?php if(isset($info->addreasons)) echo $info->addreasons;?>" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">点评内容:</label>
                                        <input class="span4" id="username" type="text" name='conent' value="<?php if(isset($info->conent)) echo $info->conent;?>" />
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
@stop
