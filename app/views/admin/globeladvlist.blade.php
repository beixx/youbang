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
                                        <button style="float:right;width:120px;margin-top:-6px;"><a href="{{url('shop/globeladdadv')}}">添加全局广告位</a></button>
                                    </h4>
                                </div>
                                <div class="content noPad">
                                    <table class="responsive table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>广告内容</th>
                                            <th>广告位置</th>
                                            <th>开始时间</th>
                                            <th>结束时间</th>
                                            <th>广告类型</th>
											<th>广告类别</th>
                                            <th>操作</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                         <?php foreach($advs as $info){?>
                                          <tr>
                                          	<td><?php if(isset($info->content)){ echo $info->content; }?></td>
                                          	<td><?php if(isset($info->position)){
                                          		if($info->position==1){
                                          			echo "榜单置顶广告";
                                          		}else if($info->position=2){
                                          			echo "定制页面置顶广告";
                                          		}
                                					
                                          	}?></td>
                                          	<td><?php if(isset($info->startTime)){ echo date('Y-m-d H:i:s',$info->startTime); }?></td>
                                          	<td><?php if(isset($info->endTime)){ echo date('Y-m-d H:i:s',$info->endTime); }?></td>
                                          	<td><?php if(isset($info->flag)){ if($info->flag==1){ echo "pc端广告"; }else if($info->flag==2){ echo "手机端广告"; } }?></td>
											<td><?php if(isset($info->advtype)){ if($info->advtype==1){ echo "婚纱摄影"; }else if($info->advtype==2){ echo "婚礼策划"; } }?></td>
                                            <td>
                                                <div class="controls center">
                                      				 <a href="{{ url('shop/globeleditadv/') }}/{{ $info->id }}" title="编辑" class="tip" ><span>编辑</span></a>
                                                    <a href="{{ url('shop/globaldeladv/') }}/{{ $info->id }}" title="删除" class="tip" class="del" onclick="return check();"><span>删除</span></a>
                                                </div>
                                            </td>
                                          </tr>
                                          <?php }?>
                                        </tbody>
                                    </table>
                                    
                                </div>
 				<div class="center"><?php echo $advs->links(); ?></div>
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