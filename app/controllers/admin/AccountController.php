<?php
class AccountController extends BaseController{
	//检验用户时候认证过、
	public function postCheckauth(){
		$id = Input::get('id');
		$userinfo = User::where('id',$id)->first();
		$data=array();
		if(isset($userinfo->is_auth) && $userinfo->is_auth==2){
			$data['result']='00';
			$data['backurl']=url('user/');
		}else{
			$data['result']='01';
		}
		return ;
	}
	//全部用户列表
	public function getList(){
		$users = User::where('openid','!=','9')->orderBy('ctime','desc')->paginate(15);
		return View::make('admin.accountlist',array('users'=>$users,'name'=>'全部用户列表'));
	}
	//认证用户列表
	public function getAuthlist(){
		$users = User::where('openid','!=','9')->where('is_auth','2')->orderBy('ctime','desc')->paginate(15);	
		return View::make('admin.accountlist',array('users'=>$users,'name'=>'认证提交用户列表'));
	}
	//未认证注册提交用户列表
	public function getNoauthlist(){
		$users = User::where('openid','!=','9')->where('is_auth','1')->where('profession','!=','0')->orderBy('ctime','desc')->paginate(15);
		return View::make('admin.accountlist',array('users'=>$users,'name'=>'未认证提交用户列表'));
	}
	//认证不通过的用户列表
	public function getNopasslist(){
		$users = User::where('openid','!=','9')->where('is_auth','3')->orderBy('ctime','desc')->paginate(15);
		return View::make('admin.accountlist',array('users'=>$users,'name'=>'未认证提交用户列表'));
	}
	//注册提示用户列表（资料填写不完整的）
	public function getBuguserlist(){
		$users = User::where('openid','!=','9')->where('is_auth','1')->where('profession' , '0')->orderBy('ctime','desc')->paginate(15);
		return View::make('admin.accountlist',array('users'=>$users,'name'=>'注册提示用户列表'));
	}
	
	public function getAdd(){
		return View::make('admin.addaccount')->with('tablename','添加用户');
	}
	public function getEdit($id){
		$accountinfo=User::where('id',$id)->first();
		$accountinfo->profession = explode(",",$accountinfo->profession);
		return View::make('admin.editaccount')->with('tablename','编辑用户')->with('accountinfo',$accountinfo);
	}
	//发送短信通知
	public function getSendmessage($phone,$message){
		$clapi  = new ChuanglanSmsApi();
		$RemindMsg = Config::get('message.RemindMsg');
		$result = $clapi->sendSMS($phone, $message,'true');
		$result = $clapi->execResult($result);
		$res=array();
		if(isset($result[1])){
			$mess=$RemindMsg[$result[1]];
			$res['result'] = '00';
		}else{
			$mess = "发生错误";
			$res['result'] = '01';
		}
		//return json_encode($res);
	}
	public function postSave(){
		$authcontent = Input::get('authcontent','【花男花女】请上传您的身份证和照片');
		$id = Input::get('id','id');
		$nackname = Input::get('nickname');
		//$profession = Input::get('profession');
		$birthday = Input::get('birthday');
		$sex = Input::get('sex');
		$phone = Input::get('phone');
		$wechat = Input::get('wechat');
		$qq = Input::get('qq');
		$appearanceFee = Input::get('appearanceFee');
		$needGlod = Input::get('needGlod');
		$height = Input::get('height');
		$weight = Input::get('weight');
		$signature = Input::get('signature');
		$hobby = Input::get('hobby');
		$is_auth = Input::get('is_auth');
		$school = Input::get('school');
		$photo=array();
		if(Input::hasFile('photo')){
			for($i=0;$i<count(Input::file('photo'));$i++){
				if(Input::file('photo')[$i]){
					$filename="/uploads/photo/".$id;
					$destinationPath=public_path().$filename;
					$realname = $_FILES['photo']['name'][$i];
					$type = pathinfo($realname, PATHINFO_EXTENSION);
					$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
					Input::file('photo')[$i]->move($destinationPath, $name);
					$photo[] = 'uploads/photo/'.$id.'/'.$name;
				}
			}
		}
		$videoPic = '';
		if(Input::hasFile('videoPic')){
			$filename="/uploads/video/".$id;
			$destinationPath=public_path().$filename;
			$realname = $_FILES['videoPic']['name'];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			Input::file('videoPic')->move($destinationPath, $name);
			$videoPic = 'uploads/video/'.$id.'/'.$name;
		}
		$videoUrl = '';
		if(Input::hasFile('video')){
			$filename="/uploads/video/".$id;
			$destinationPath=public_path().$filename;
			$realname = $_FILES['video']['name'];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			Input::file('video')->move($destinationPath, $name);
			$videoUrl = 'uploads/video/'.$id.'/'.$name;
		}
		
		$data=array();
		$data['nickname']=$nackname;
		//$data['profession']=$profession;
		$data['birthday']=$birthday;
		$data['sex']=$sex;
		
	
		$data['appearanceFee']=$appearanceFee;
		$data['needGlod']=$needGlod;
		$data['height']=$height;
		$data['weight']=$weight;
		$data['signature']=$signature;
		$data['hobby']=$hobby;
		if($is_auth != '3'){
			$data['is_auth']=$is_auth;
		}else{
			$data['auth_img']='';
			$data['is_auth']=$is_auth;
		}
		
		$data['school']=$school;
		if(count($photo)){
			$photo = json_encode($photo);
			$data['photo']=$photo;
		}
		if($videoUrl){
			$data['videoUrl']=$videoUrl;
		}
		if($videoPic){
			$data['videoPic']=$videoPic;
		}
		//dd($data);
		if(is_numeric($id)){
			User::where('id',$id)->update($data);
			if($is_auth==2){
				$message="【花男花女】文化演艺社交平台通过您的实名认证，您现在就可以进入平台约见演艺圈与企业界的美女、帅哥、boss，丰富人脉圈，并有机会参加才艺展示、商演活动与高端商务聚会，提升自我价值，实现人生梦想。";
				$this->getSendmessage($phone,$message);
			}elseif($is_auth==3){
				$this->getSendmessage($phone,$authcontent);
			}
		}else{
			User::insert($data);
		}
		return Redirect::to('account/list');
	}
	
	public function getDelete($id){
		$url = url('account/list');
		$affectedRows = User::where('id', '=', $id)->delete();
		if($affectedRows){
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
	//用户的充值消费列表
	public function getConsume(){
		$orders = Order::where('flag','1')->orderBy('ctime','desc')->get()->toArray();
		if(count($orders)){
			foreach($orders as $key=>$v){
				$uid = $v['uid'];
				$info = User::where('id',$uid)->select('nickname','phone')->first();
				$v['nickname'] = isset($info->nickname)?$info->nickname:'';
				$v['phone'] = isset($info->phone)?$info->phone:'';
				$orders[$key] = $v;
			}
		}
		return View::make('admin.consume')->with('orders',$orders);
	}
	
}