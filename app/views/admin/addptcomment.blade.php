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

                        <form class="form-horizontal seperator"  action="{{ url('commentpt/saveadd') }}" method="post" id="loginForm" enctype="multipart/form-data" />
                            <input class="span4" id="username" type="hidden" name='tenantsId' value="{{$tenantsId}}" />
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">此次消费价格:</label>
                                        <input class="span4" id="username" type="text" name='currentPrice' value="" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户打分分数 范围(1-100)分:</label>
                                        <input class="span4" id="username" type="text" name='score' value="" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户优点:</label>
                                        <input class="span4" id="username" type="text" name='merits' value="" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户缺点:</label>
                                        <input class="span4" id="username" type="text" name='defect' value="" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                             
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">总体评价:</label>
                                        <input class="span4" id="username" type="text" name='totailty' value="" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                    		
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">单据证明:</label>
                                  		<img src="" alt="" class="image marginR10" style="width:120px;height:120px;" />   
                                        <input type="file" name="documentary[]"  multiple="multiple"/>
               
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">婚纱照片查看:</label>
                                  		<img src="" alt="" class="image marginR10" style="width:120px;height:120px;" />   
                                        <input type="file" name="photo[]"  multiple="multiple"/>
               
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">上传的个人头像（非必须）:</label>
                                  		<img src="" alt="" class="image marginR10" style="width:120px;height:120px;" />   
                                        <input type="file" name="headimg[]"  multiple="multiple"/>
               
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">姓名:</label>
                                  		<input class="span4" id="username" type="text" name='name' value="" />
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">手机号:</label>
                                  		<input class="span4" id="username" type="text" name='phone' value="" />
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
