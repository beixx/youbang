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

                        <form class="form-horizontal seperator"  action="{{ url('shop/searchresult') }}" method="get" id="loginForm" enctype="multipart/form-data" />
                        
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">商户名称:</label>
                                        <input class="span4" id="username" type="text" name='name' value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span2" for="username">所在城市:</label>
                                        <select name="city">
                                        	<option value="北京">北京</option>
                                        	<option value="天津">天津</option>
                                        	<option value="沈阳">沈阳</option>
                                        	<option value="大连">大连</option>
                                        	<option value="哈尔滨">哈尔滨</option>
                                        	<option value="石家庄">石家庄</option>
                                        	<option value="上海">上海</option>
                                        	<option value="杭州">杭州</option>
                                        	<option value="厦门">厦门</option>
                                        	<option value="南京">南京</option>
                                        	<option value="苏州">苏州</option>
                                        	<option value="无锡">无锡</option>
                                        	<option value="宁波">宁波</option>
                                        	<option value="福州">福州</option>
                                        	<option value="青岛">青岛</option>
                                        	<option value="合肥">合肥</option>
                                        	<option value="成都">成都</option>
                                        	<option value="重庆">重庆</option>
                                        	<option value="长沙">长沙</option>
                                        	<option value="郑州">郑州</option>
                                        	<option value="西安">西安</option>
                                        	<option value="武汉">武汉</option>
                                        	<option value="广州">广州</option>	
                                        	<option value="深圳">深圳</option>	
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
                                            <button type="submit" class="btn btn-info marginR10">搜索</button>
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
