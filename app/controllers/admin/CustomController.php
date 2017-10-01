<?php
class CustomController extends BaseController{
	//定制列表
	public function getList(){
		$infos = Yfccustomized::orderBy('id','desc')->paginate(15);
		return View::make('admin.customlist',array('infos'=>$infos,'name'=>'定制列表'));
	}
	//编辑定指标
	public function getEdit($id){
		$info = Yfccustomized::where('id',$id)->first();
		return View::make('admin.addcustom',array('info'=>$info,'name'=>'编辑定制'));
	}
	//保存编辑
	public function postSave(){
		$data = array();
		$id = Input::get('id');
		if(!$id){
			return Redirect::back();
		}
		$customized_name = Input::get('customized_name','');
		$style = Input::get('style','');
		$budget = Input::get('budget');
		$phone = Input::get('phone');
		$name = Input::get('name');
		$city = Input::get('city');
		$linkurl = Input::get('linkurl');
		$visitState = Input::get('visitState');
		$visitContent = Input::get('visitContent','');
		if($customized_name){
			$data['customized_name'] = $customized_name;
		}
		if($style){
			$data['style'] = $style;
		}
		if($budget){
			$data['budget'] = $budget;
		}
		if($phone){
			$data['phone'] = $phone;
		}
		if($name){
			$data['name'] = $name;
		}
		if($city){
			$data['city'] = $city;
		}
		if($linkurl){
			$data['linkurl'] = $linkurl;
		}
		if($visitState){
			$data['visitState'] = $visitState;
		}
		$data['visitContent'] = $visitContent;
		$res = Yfccustomized::where('id',$id)->update($data);
		$url = url('custom/list');
		if($res){
			echo "<script type='text/javascript'>
			alert('编辑成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('编辑失败');
			window.location.href='$url';
			</script>";
		}
	}
	//删除定制
	public function getDelete($id){
		$res = Yfccustomized::where('id',$id)->delete();
		$url = url('custom/list');
		if($res){
			echo "<script type='text/javascript'>
			alert('删除成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('删除失败');
			window.location.href='$url';
			</script>";
			}
	}
}