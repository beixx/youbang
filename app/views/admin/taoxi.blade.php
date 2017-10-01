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
                                        <button style="float:right;width:100px;margin-top:-6px;"><a href="{{url('shop/addtaoxi')}}/{{$id}}">添加套系</a></button>
                                    </h4>
                                </div>
                                <div class="content noPad">
                                    <table class="responsive table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>套系名称</th>
                                            <th>套系风格</th>
                                            <th>操作</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                         <?php foreach($taoxis as $info){?>
                                          <tr>
                                          	<td><?php if(isset($info->setName)){ echo $info->setName; }?></td>
                                          	<td><?php if(isset($info->kind)){ $kind = json_decode($info->kind,true); foreach($kind as $v){ if($v){ echo $v.','; } } }?></td>
                                            <td>
                                                <div class="controls center">
                                                	<a href="{{ url('shop/taoxiedit/') }}/{{ $info->id }}?tenantsId={{$id}}" title="套系编辑" class="tip" ><span>套系编辑</span></a>
                                      				<a href="{{ url('shop/clientpiclist/') }}/{{ $info->id }}?tenantsId={{$id}}" title="客片列表" class="tip" ><span>客片列表</span></a>
                                                    <a href="{{ url('shop/taoxidel/') }}/{{ $info->id }}?tenantsId={{$id}}" title="删除" class="tip" class="del" onclick="return check();"><span>删除</span></a>
                                                </div>
                                            </td>
                                          </tr>
                                          <?php }?>
                                        </tbody>
                                    </table>
                                    
                                </div>
 				<div class="center"><?php echo $taoxis->links(); ?></div>
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