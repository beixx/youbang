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

                        <form class="form-horizontal seperator"  action="{{ url('shop/saveadv') }}" method="post" id="loginForm" enctype="multipart/form-data" />
                           
                            <input class="span4" id="username" type="hidden" name='id' value="{{ $id }}" />
                    		<input class="span4" id="username" type="hidden" name='advid' value="<?php if(isset($info->id)) echo $info->id;?>" />
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="normal">广告代码:</label>
                                        <div class="span4 controls">
                                             <script id="editor" type="text/plain" style="width:800px;height:500px;" name="content"><?php if(isset($info->content)) echo $info->content;?></script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">开始时间例如（2017-8-8 10:10:30）</label>
                                        <input class="span4" id="username" type="text" name='startTime' value="<?php if(isset($info->startTime)) echo date('Y-m-d H:i:s',$info->startTime);?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">结束时间例如（2017-8-8 10:10:30）</label>
                                        <input class="span4" id="username" type="text" name='endTime' value="<?php if(isset($info->endTime)) echo date('Y-m-d H:i:s',$info->endTime);?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">广告投放位置</label>
                                        <select name="position">
                                        		<option value="3" <?php if(isset($info->position) && $info->position=='3') echo "selected=selected";?>>商户顶部广告</option>
                                        		
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">广告投放位置</label>
                                        <select name="flag">
                                        		<option value="1" <?php if(isset($info->flag) && $info->flag=='1') echo "selected=selected";?>>pc端</option>
                                        		<option value="2" <?php if(isset($info->flag) && $info->flag=='2') echo "selected=selected";?>>手机端</option>
                                        		
                                        </select>
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
var bt=baidu.template;
var Result = {};
Result['list'] = QYtype;
//最简使用方法
var html=bt('optionlist',Result);
//渲染
document.getElementById('sel').innerHTML=html;
</script>
@stop