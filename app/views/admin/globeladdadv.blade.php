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

                        <form class="form-horizontal seperator"  action="{{ url('shop/globelsaveadv') }}" method="post" id="loginForm" enctype="multipart/form-data" />
                           
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
                                        		<option value="1" <?php if(isset($info->position) && $info->position=='1') echo "selected=selected";?>>首页榜单banner</option>
                                        		<option value="2" <?php if(isset($info->position) && $info->position=='2') echo "selected=selected";?>>定制榜单banner</option>
                                        		<option value="3" <?php if(isset($info->position) && $info->position=='3') echo "selected=selected";?>>商户顶部banner广告</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
							 <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">广告投放类别</label>
                                        <select name="advtype">
                                        		<option value="1" <?php if(isset($info->advtype) && $info->advtype=='1') echo "selected=selected";?>>婚纱摄影</option>
                                        		<option value="2" <?php if(isset($info->advtype) && $info->advtype=='2') echo "selected=selected";?>>婚礼策划</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">广告投放城市</label>
                                        <select name="city">
                                        		<option value="beijing" <?php if(isset($info->city) && $info->city=='beijing') echo "selected=selected";?>>北京</option>
												<option value="tianjin" <?php if(isset($info->city) && $info->city=='tianjin') echo "selected=selected";?>>天津</option>
												<option value="shenyang" <?php if(isset($info->city) && $info->city=='shenyang') echo "selected=selected";?>>沈阳</option>
												<option value="dalian" <?php if(isset($info->city) && $info->city=='dalian') echo "selected=selected";?>>大连</option>
												<option value="haierbin" <?php if(isset($info->city) && $info->city=='haierbin') echo "selected=selected";?>>哈尔滨</option>
												<option value="shijiazhuang" <?php if(isset($info->city) && $info->city=='shijiazhuang') echo "selected=selected";?>>石家庄</option>
												<option value="shanghai" <?php if(isset($info->city) && $info->city=='shanghai') echo "selected=selected";?>>上海</option>
												<option value="hangzhou" <?php if(isset($info->city) && $info->city=='hangzhou') echo "selected=selected";?>>杭州</option>
												<option value="xiamen" <?php if(isset($info->city) && $info->city=='xiamen') echo "selected=selected";?>>厦门</option>
												<option value="nanjing" <?php if(isset($info->city) && $info->city=='nanjing') echo "selected=selected";?>>南京</option>
												<option value="suzhou" <?php if(isset($info->city) && $info->city=='suzhou') echo "selected=selected";?>>苏州</option>
												<option value="wuxi" <?php if(isset($info->city) && $info->city=='wuxi') echo "selected=selected";?>>无锡</option>
												<option value="ningbo" <?php if(isset($info->city) && $info->city=='ningbo') echo "selected=selected";?>>宁波</option>
												<option value="fuzhou" <?php if(isset($info->city) && $info->city=='fuzhou') echo "selected=selected";?>>福州</option>
												<option value="qingdao" <?php if(isset($info->city) && $info->city=='qingdao') echo "selected=selected";?>>青岛</option>

												<option value="hefei" <?php if(isset($info->city) && $info->city=='hefei') echo "selected=selected";?>>合肥</option>

												<option value="chengdu" <?php if(isset($info->city) && $info->city=='chengdu') echo "selected=selected";?>>成都</option>

												<option value="chongqing" <?php if(isset($info->city) && $info->city=='chongqing') echo "selected=selected";?>>重庆</option>

												<option value="changsha" <?php if(isset($info->city) && $info->city=='changsha') echo "selected=selected";?>>长沙</option>
												<option value="zhengzhou" <?php if(isset($info->city) && $info->city=='zhengzhou') echo "selected=selected";?>>郑州</option>
												<option value="xian" <?php if(isset($info->city) && $info->city=='xian') echo "selected=selected";?>>西安</option>
												<option value="wuhan" <?php if(isset($info->city) && $info->city=='wuhan') echo "selected=selected";?>>武汉</option>
												<option value="guangzhou" <?php if(isset($info->city) && $info->city=='guangzhou') echo "selected=selected";?>>广州</option>
												<option value="shenzhen" <?php if(isset($info->city) && $info->city=='shenzhen') echo "selected=selected";?>>深圳</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">广告类型</label>
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
