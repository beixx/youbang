<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET, POST, OPTIONS, DELETE");
header("Access-Control-Allow-Headers:DNT,X-Mx-ReqToken,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type, Accept-Language, Origin, Accept-Encoding");
header("Content-type: text/html; charset=utf-8");
class OrderController extends BaseController{
	
	
	/**
	 * 首页
	 */
	public function postSave()
	{
		$res = array();
		$data = array();
		$id = Input::get('id','0');
		$customized_name = Input::get('customized_name');
		$style = Input::get('style');
		$budget = Input::get('budget');
		$phone = Input::get('phone');
		$name = Input::get('name');
		$city = Input::get('city');
		$linkurl = Input::get('linkurl');
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
		$data['visitState'] = 2;
		if($id){
			$updated_at = date('Y-m-d H:i:s',time());
			$data['updated_at'] = $updated_at;
			if(count($data)){
				$result = Yfccustomized::where('id',$id)->update($data);
				$res['result'] = '00';
			}else{
				$res['result'] = '01';
			}
		}else{
			$created_at = date('Y-m-d H:i:s',time());
			$data['created_at'] = $created_at;
			if(count($data)){
				$result = Yfccustomized::insert($data);
				$res['result'] = '00';
			}else{
				$res['result'] = '01';
			}
		}
		return json_encode($res);
	}
	
}