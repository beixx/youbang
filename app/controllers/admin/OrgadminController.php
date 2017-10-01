<?php
class OrgadminController extends BaseController{
	//全部机构
	public function getList(){
		$companys = Company::paginate(15);
		return View::make('admin.orglist',array('companys'=>$companys));
	}
	//审核通过的
	public function getAuthlist(){
		$companys = Company::where('is_pass','3')->paginate(15);
		return View::make('admin.orglist',array('companys'=>$companys));
	}
	//待审核的
	public function getNoauthlist(){
		$companys = Company::where('is_pass','1')->orWhere('is_pass','2')->paginate(15);
		return View::make('admin.orglist',array('companys'=>$companys));
	}
	//审核不通过的
	public function getNolist(){
		$companys = Company::where('is_pass','4')->paginate(15);
		return View::make('admin.orglist',array('companys'=>$companys));
	}
	//机构审核
	public function getEdit($id){
		$activeinfo = Company::where('id','=',$id)->first();
		return View::make('admin.addorg')->with('activeinfo',$activeinfo);
	}
	//机构审核通过发送提醒通知
	public function getSendmessage($clientId,$orgId){
		$clientinfo = User::where('id',$clientId)->first();
		$openid = $clientinfo->openid;
		$nackname = $clientinfo->nickname;
		$url = "http://www.huanannv.com/huanannv/institution_detail.html?id=$orgId";
		$pdata = array();
		$pdata['touser']= $openid;
		$pdata['template_id']="N3_fv64Rt48yjx1YByXOc8XcKh-WySE6wLvhqJpXCd8";
		$pdata['url']=$url;
		$pdata['topcolor']="#FF0000";
		$pdata['data'] = array('first'=>array('value'=>'您好,您提交的机构入驻资料已通过审核','color'=>'#173177'),'keyword1'=>array('value'=>'发布机构审核','color'=>'#173177'),'keyword2'=>array('value'=>date('Y-m-d H:i:s',time()),'color'=>'#173177')
				,'keyword3'=>array('value'=>$nackname,'color'=>'#173177'),'keyword4'=>array('value'=>'审核通过','color'=>'#173177'),'remark'=>array('value'=>'感谢您的支持！祝您生活愉快，万事如意！','color'=>'#173177'));
		$appid = "wx33f652c33bd2312c";
		$secret = "6d308b1bb820f417170c080ea241c836";
		$Pushmessage = new OrderPush($appid,$secret);
		$res = $Pushmessage->doSend($pdata);
	}
	//机构审核通过发送提醒通知
	public function getSendmessageno($clientId,$orgId,$cause){
		$clientinfo = User::where('id',$clientId)->first();
		$openid = $clientinfo->openid;
		$nackname = $clientinfo->nickname;
		//$url = "javascript:void(0)";
		$pdata = array();
		$pdata['touser']= $openid;
		$pdata['template_id']="4-B2wDsKfTNCoQ2oQQWx5cizeRi-Zto3VLg-4suQrgo";
		//$pdata['url']=$url;
		$pdata['topcolor']="#FF0000";
		$pdata['data'] = array('first'=>array('value'=>'您好,您提交的机构资料未通过审核','color'=>'#173177'),'keyword1'=>array('value'=>'发布机构审核不通过','color'=>'#173177'),'keyword2'=>array('value'=>$cause,'color'=>'#173177')
				,'remark'=>array('value'=>'感谢您的支持！祝您生活愉快，万事如意！','color'=>'#173177'));
		$appid = "wx33f652c33bd2312c";
		$secret = "6d308b1bb820f417170c080ea241c836";
		$Pushmessage = new OrderPush($appid,$secret);
		$res = $Pushmessage->doSend($pdata);
	}
	//机构审核保存
	public function postSave(){
		$id = Input::get('id');
		$name = Input::get('name','');
		$profile = Input::get('profile','');
		$is_pass = Input::get('is_pass','');
		$type = Input::get('type');
		$data=array();
		$data['name'] = $name;
		$data['profile'] = $profile;
		$data['is_pass'] = $is_pass;
		if($type=='1'){
			$start = date('Y-m-d',time());
			$end = date("Y-m-d",strtotime("+6 month",strtotime($start)));
			$end = strtotime($end);
			$start = time();
		}
		if($type=='2'){
			$start = date('Y-m-d',time());
			$end = date("Y-m-d",strtotime("+1 year",strtotime($start)));
			$end = strtotime($end);
			$start = time();
		}
		$data['start'] = $start;
		$data['end'] = $end;
		$res = Company::where('id',$id)->update($data);
		$url = url('company/list');
		if($res){
			if($is_pass=='3'){
				$companyinfo = Company::where('id',$id)->first();
				$clientId = $companyinfo->uid;
				$this->getSendmessage($clientId,$id);
			}else if($is_pass=='4'){
				$companyinfo = Company::where('id',$id)->first();
				$clientId = $companyinfo->uid;
				$cause = Input::get('cause','');
				$this->getSendmessageno($clientId,$id,$cause);
			}
			echo "<script type='text/javascript'>
			alert('机构审核成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('机构审核失败');
			window.location.href='$url';
			</script>";
		}
	}
	//机构删除
	public function getDel($id){
		$url = url('company/list');
		$affectedRows = Company::where('id',$id)->delete();
		if($affectedRows){
			echo "<script type='text/javascript'>
			alert('删除机构成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('删除机构失败');
			window.location.href='$url';
			</script>";
		}
	}
	
}