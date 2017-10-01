<?php
class SystemadminController extends BaseController{
	//消息列表
	public function getList(){
		$messages = Systemnotice::paginate(15);
		return View::make('admin.sysmessagelist',array('messages'=>$messages));
	}
	
	//编辑消息
	public function getEdit($id){
		$activeinfo = Systemnotice::where('id','=',$id)->first();
		return View::make('admin.addsysmessage')->with('activeinfo',$activeinfo);
	}
	//编辑消息
	public function getAdd(){
		return View::make('admin.addsysmessage');
	}
	
	//消息保存
	public function postSave(){
		$id = Input::get('id','');
		$title = Input::get('title','');
		$type = Input::get('type','');
		$content = Input::get('content','');
		
		$data=array();
		$data['title'] = $title;
		$data['type'] = $type;
		$data['content'] = $content;
		$data['ctime'] = time();
		if($id){
			$res = Systemnotice::where('id',$id)->update($data);
		}else{
			$res = Systemnotice::insert($data);
		}
		
		$url = url('sys/list');
		if($res){
			echo "<script type='text/javascript'>
			alert('消息保存成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('消息保存失败');
			window.location.href='$url';
			</script>";
		}
	}
	//删除消息
	public function getDel($id){
		$url = url('sys/list');
		$affectedRows = Systemnotice::where('id',$id)->delete();
		if($affectedRows){
			echo "<script type='text/javascript'>
			alert('删除活动成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('删除活动失败');
			window.location.href='$url';
			</script>";
		}
	}
	
}