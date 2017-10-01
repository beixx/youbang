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
                                    </h4>
                                </div>
                                <div class="content noPad">
                                    <table class="responsive table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>商户名称</th>
                                            <th>商户联系方式</th>
                                            <th>预约看店姓名</th>
                                            <th>预约看店手机号</th>
                                            <th>预约看店时间</th>
                                            <th>预约看店来源</th>
                                            <th>回访状态</th>
                                            <th>操作</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                         <?php foreach($spokeviews as $info){?>
                                          <tr>
                                          	<td><?php if(isset($info->tenantsinfo->name)){ echo $info->tenantsinfo->name; }?></td>
                                          	<td><?php if(isset($info->tenantsinfo->phone)){ echo $info->tenantsinfo->phone; }?></td>
                                            <td><?php if($info->name){ echo $info->name; }?></td>
                                            <td><?php if($info->phone){ echo $info->phone; }?></td>
                                            <td><?php if(isset($info->ctime) && $info->ctime){ echo date('Y-m-d H:i:s', $info->ctime); }?></td>
                                            <td><?php if(isset($info->source)){ if($info->source==1){ echo "套系"; }else if($info->source==2){ echo "推荐榜单"; }else if($info->source==3){ echo "客片"; }else if($info->source==4){ echo "客户页面"; }  }?></td>
                                            <td><?php if(isset($info->visitState)){ if($info->visitState==1){ echo "已回访"; }else if($info->visitState==2){ echo "未回访"; } }?></td>
                                            <td>
                                                <div class="controls center">
                                                    <a href="{{ url('appointment/edit/') }}/{{ $info->id }} " title="编辑" class="tip"><span>编辑</span></a>
                                                   <?php $userinfo = Session::get('userinfo');  if($userinfo['type']==1){ ?> <a href="{{ url('appointment/delete/') }}/{{ $info->id }} " title="删除" class="tip" class="del" onclick="return check();"><span>删除</span></a><?php } ?>
                                                </div>
                                            </td>
                                          </tr>
                                          <?php }?>
                                        </tbody>
                                    </table>
                                    
                                </div>
 				<div class="center"><?php echo $spokeviews->links(); ?></div>
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