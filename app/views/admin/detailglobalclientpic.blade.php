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

                        <form class="form-horizontal seperator"  action="{{ url('shop/saveclientpic') }}" method="post" id="loginForm" enctype="multipart/form-data" />
                           
                           
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">客片名称</label>
                                        <input class="span4" id="username" disabled="disabled" type="text" name='picName' value="<?php if(isset($tenantspicinfo->picName)){ echo $tenantspicinfo->picName; }?>" /><div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">客片图:</label>
                                       <?php if(isset($tenantspicinfo->cover)){
					                    			foreach($tenantspicinfo->cover as $v){
					                    		?>
                                       <img src="{{asset($v)}}" alt="" class="image marginR10" style="width:150;" />  
                                       <?php }}?> 
                                        <div><font color='red'></font></div>
                                    </div>
                                </div>
                            </div>
                    	</form>
                    	
                            

                            
                            
                            
                            
                           
                        
                      
                    </div><!-- End .span12 -->

                </div><!-- End .row-fluid -
                
            </div><!-- End contentwrapper -->
        </div>
@stop
