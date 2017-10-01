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

                        <form class="form-horizontal seperator"  action="{{ url('shop/savetaoxi') }}" method="post" id="loginForm" enctype="multipart/form-data" />
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">套系名称</label>
                                        <input class="span4" id="username" type="text" disabled="disabled" name='setName' value="<?php if(isset($info->setName)){ echo $info->setName; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">套系价格(原价)</label>
                                        <input class="span4" id="username" type="text" disabled="disabled" name='price' value="<?php if(isset($info->price)){ echo $info->price; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">套系价格(现价)</label>
                                        <input class="span4" id="username" type="text" disabled="disabled" name='currentPrice' value="<?php if(isset($info->currentPrice)){ echo $info->currentPrice; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                              <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="normal">套系特色简介:</label>
                                        <div class="span4 controls">
                                            <div><?php if(isset($info->item)){ echo $info->item; }?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">套系封面图:</label>
                                         <?php if(isset($info->cover)){
											foreach($info->cover as $v){
                                        ?>
                                        <img src="<?php  echo asset($v); ?>" alt="" class="image marginR10" style="width:120px;height:120px;" />   
                    					<?php }}?>
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">套系类型:</label>
                                       <div><?php if(isset($info->kind)){ echo $info->kind; }?></div>
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid" >
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="normal">套系详情:</label>
                                        <div class="span4 controls">
                                        	<div><?php if(isset($info->detail)){ echo $info->detail; }?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">套系图片(1):</label>
                                        <?php if(isset($info->picDetail)){
											foreach($info->picDetail as $v){
                                        ?>
                                        <img src="<?php  echo asset($v); ?>" alt="" class="image marginR10" style="width:120px;height:120px;" />   
                    					<?php }}?>
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
