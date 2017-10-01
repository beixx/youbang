@extends('admin.base')
@section('content')
<div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->
                <div class="heading">
                </div><!-- End .heading-->
    				
                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                    <div class="row-fluid">
                    </div><!-- End .container-fluid -->
                    <div class="row-fluid">
                    </div><!-- End .container-fluid -->
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="box">
                                <div class="title">
                                    <h4>
                                        <span class="icon16 brocco-icon-grid"></span>
                                        <span>{{$name}}</span>
                                        <button style="float:right;width:100px;margin-top:-6px;"><a href="{{url('shop/addshop')}}">添加商户</a></button>
                                        <button style="float:right;width:100px;margin-top:-6px;"><a href="{{url('shop/search')}}">搜索</a></button>
                                    </h4>
                                </div>
                                <div class="content noPad">
                                    <table class="responsive table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>商户名称</th>
                                            <th>商户电话</th>
                                            <th>商户所在城市</th>
                                            <th>商户所在地址</th>
                                            <th>营业时间</th>
                                            <th>操作</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                         <?php foreach($tenants as $info){?>
                                          <tr>
                                          	<td><?php if(isset($info->name)){ echo $info->name; }?></td>
                                            <td><?php if(isset($info->phone)){ echo $info->phone; }?></td>
                                            <td><?php if(isset($info->positionCity)){ echo $info->positionCity; }?></td>
                                            <td><?php if(isset($info->address)){ echo $info->address; }?></td>
                                            <td><?php if(isset($info->business_hours)){ echo $info->business_hours; }?></td>
                                            <td>
                                                <div class="controls center">
                                                
                                                    <a href="{{ url('shop/edit/') }}/{{ $info->id }} " title="编辑" class="tip"><span>编辑</span></a>
                                                   <!-- 
                                                    <a href="{{ url('shop/detail/') }}/{{ $info->id }} " title="详情" class="tip"><span>详情</span></a>
                                                    -->
                                                    <a href="{{ url('shop/style/') }}/{{ $info->id }} " title="风格列表" class="tip" ><span>风格列表</span></a>
                                                    <a href="{{ url('shop/globalclientlist/') }}/{{ $info->id }} " title="客片列表" class="tip" ><span>客片列表</span></a>
                                                    <a href="{{ url('shop/taoxilist/') }}/{{ $info->id }} " title="套系列表" class="tip" ><span>套系列表</span></a>
                                                    <a href="{{ url('shop/advlist/') }}/{{ $info->id }} " title="广告列表" class="tip" ><span>广告列表</span></a> 
                                                    <a href="{{ url('shop/spread/') }}/{{ $info->id }} " title="增加推广" class="tip" ><span>增加推广</span></a> 
                                                   <!--   <a href="{{ url('shop/explain/') }}/{{ $info->id }} " title="增加解释说明" class="tip" ><span>增加商户服务说明</span></a> -->
                                                    <a href="{{ url('shop/delete/') }}/{{ $info->id }} " title="删除" class="tip" class="del" onclick="return check();"><span>删除</span></a>
                                                </div>
                                            </td>
                                          </tr>
                                          <?php }?>
                                        </tbody>
                                    </table>
                                    
                                </div>
 				<div class="center"><?php echo $tenants->links(); ?></div>
                            </div><!-- End .box -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row-fluid -->
    			<!-- Page end here -->
    				
                <div class="modal fade hide" id="myModal1">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span class="icon12 minia-icon-close"></span></button>
                        <h3>Chat layout</h3>
                    </div>
                    <div class="modal-body">
                        <ul class="messages">
                            <li class="user clearfix">
                                <a href="#" class="avatar">
                                    <img src="{{ asset('images/avatar2.jpeg') }}" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Lazar</strong> says:</span>
                                        <span class="time">25 seconds ago</span>
                                    </div>
                                    <p>
                                        Time to go i call you tomorrow.
                                    </p>
                                </div>
                            </li>
                            <li class="admin clearfix">
                                <a href="#" class="avatar">
                                    <img src="{{ asset('images/avatar3.jpeg') }}" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Sugge</strong> says:</span>
                                        <span class="time">just now</span>
                                    </div>
                                    <p>
                                        OK, have a nice day.
                                    </p>
                                </div>
                            </li>

                            <li class="sendMsg">
                                <form class="form-horizontal" action="#" />
                                    <textarea class="elastic" id="textarea" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
                                    <button type="submit" class="btn btn-info marginT10">Send message</button>
                                </form>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                    </div>
                </div>
                
            </div><!-- End contentwrapper -->
        </div>
@stop