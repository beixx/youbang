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

                        <form class="form-horizontal seperator"  action="{{ url('commentpt/rebutsave') }}" method="get" id="loginForm" enctype="multipart/form-data" />
                        	 <input class="span4" id="username" type="hidden" name='id' value="<?php if(isset($commentinfo->id)){ echo $commentinfo->id; } ?>" />
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="normal">驳回内容:</label>
                                        <div class="span4 controls">
                                             <script id="editor" type="text/plain" style="width:800px;height:500px;" name="deletereason"><?php if(isset($commentinfo)) echo $commentinfo->deletereason;?></script>
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
@stop
