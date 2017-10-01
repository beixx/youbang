<?php
use Illuminate\Support\Facades\Redirect;
class CommentptController extends BaseController{
	
	/**
	 * 保存图片单据
	 */
	public function postSavedanju(){
		$res = array();
		$imageurls = array();
		$images = Input::file('photo');
		if(count($images)){
			foreach($images as $key=>$v){
				$realname = $_FILES['photo']['name'][$key];
				$type = pathinfo($realname, PATHINFO_EXTENSION);
				$filename="/uploads/shanghu/";
				$destinationPath=public_path().$filename;
				$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
				$v->move($destinationPath, $name);
				$imageurl = 'uploads/shanghu'.'/'.$name;
				$imageurls[] = $imageurl;
			}
			$res['list'] = $imageurls;
			$res['result'] = '00';
			return json_encode($res);
		}else{
			$res['message']='图片上传失败';
			$res['result']='01';
			return json_encode($res);
		}
	}
	/**
	 * 保存婚纱照片
	 */
	public function postSavepingphoto(){
		$res = array();
		$imageurls = array();
		$images = Input::file('photo');
		if(count($images)){
			foreach($images as $key=>$v){
				$realname = $_FILES['photo']['name'][$key];
				$type = pathinfo($realname, PATHINFO_EXTENSION);
				$filename="/uploads/shanghu/";
				$destinationPath=public_path().$filename;
				$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
				$v->move($destinationPath, $name);
				$imageurl = 'uploads/shanghu'.'/'.$name;
				$imageurls[] = $imageurl;
			}
			$res['list'] = $imageurls;
			$res['result'] = '00';
			return json_encode($res);
		}else{
			$res['message']='图片上传失败';
			$res['result']='01';
			return json_encode($res);
		}
	}
	//自平台审核通过
	public function getAccept($id){
		$update = array();
		$update['flag'] = 3;
		$res = Yfctenantscommentdetail::where('id',$id)->update($update);
		$url = url('commentpt/list');
		if($res){
			echo "<script type='text/javascript'>
			alert('审核成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('审核失败');
			window.location.href='$url';
			</script>";
		}
	}
	//评论列表
	public function getList(){
		$comments = Yfctenantscommentdetail::where('source','0')->orderBy('id','desc')->paginate(15);
		if(count($comments)){
			foreach($comments as $key=>$v){
					$id = $v->tenantsId;
					$setId = $v->setId;
					$tenantsinfo = Yfctenants::where('id',$id)->first();
					$setinfo = Yfctenantsset::where('id',$setId)->first();
					$v->tenantsinfo = $tenantsinfo;
					$v->setinfo = $setinfo;
					$comments[$key] = $v;
			}
		}
		return View::make('admin.commentptlist',array('comments'=>$comments,'name'=>'自平台评论打分管理'));
	}
	//驳回入口
	public function getRebut($id){
		$commentinfo = Yfctenantscommentdetail::where('id',$id)->first();
		return View::make('admin.rebut')->with('commentinfo',$commentinfo)->with('name','驳回评论');
	}
	//保存驳回内容
	public function getRebutsave(){
		$id = Input::get('id');
		$deletereason = Input::get('deletereason');
		if(!$id){
			return Redirect::back();
		}
		$data = array();
		$data['deletereason'] = $deletereason;
		$data['flag'] = 2;
		Yfctenantscommentdetail::where('id',$id)->update($data);
		return Redirect::to('commentpt/list');
	}
	//保存商户评论的编辑
	public function postSaveshop(){
		$id = Input::get('id');
		$price = Input::get('currentPrice');
		$score = Input::get('score');
		$merits = Input::get('merits');
		$defect = Input::get('defect');
		$totailty = Input::get('totailty');
		$documentary = Input::get('documentary');
		$photo = Input::get('photo');
		$headimg = Input::file('headimg');
		$pname = Input::get('name');
		$phone = Input::get('phone');
		$created = Input::get('created','');
		if($created){
			$created = strtotime($created);
		}
		if(!$id){
			return Redirect::back();
		}
		$data = array();
		if($created){
			$data['created'] = $created;
		}
		if($price){
			$data['price'] = $price;
		}
		if($score){
			$data['score'] = $score;
		}
		if($merits){
			$data['merits'] = $merits;
		}
		if($defect){
			$data['defect'] = $defect;
		}
		if($totailty){
			$data['totailty'] = $totailty;
		}
		if($pname){
			$data['name'] = $pname;
		}
		if($phone){
			$data['phone'] = $phone;
		}
		if($documentary && count($documentary)){
			$documentary = json_encode($documentary);
			$data['documentary'] = $documentary;
		}
		if($photo && count($photo) && $photo[0]){
			$photo = json_encode($photo);
			$data['photo'] = $photo;
		}
		if($headimg && count($headimg) && $headimg[0]){
			$imageurls3 = array();
			foreach($headimg as $key=>$v){
				$realname = $_FILES['headimg']['name'][$key];
				$type = pathinfo($realname, PATHINFO_EXTENSION);
				$filename="/uploads/user/";
				$destinationPath=public_path().$filename;
				$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
				$v->move($destinationPath, $name);
				$imageurl = 'uploads/user'.'/'.$name;
				$imageurls3 = $imageurl;
			}
			$data['headimg'] = json_encode($imageurls3);
		}
		Yfctenantscommentdetail::where('id',$id)->update($data);
		return Redirect::to('commentpt/list');
	}
	//根据商户添加评论
	public function getAdd($id){
		return View::make('admin.addptcomment')->with('name','增加评论')->with('tenantsId',$id);
	}
	//添加对商户的评论
	public function postSaveadd(){
		$id = Input::get('tenantsId');
		$price = Input::get('currentPrice');
		$score = Input::get('score');
		$merits = Input::get('merits');
		$defect = Input::get('defect');
		$totailty = Input::get('totailty');
		$documentary = Input::file('documentary');
		$photo = Input::file('photo');
		$headimg = Input::file('headimg');
		$pname = Input::get('name');
		$phone = Input::get('phone');
		$imageurls1 = array();
		foreach($documentary as $key=>$v){
			$realname = $_FILES['photo']['name'][$key];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$filename="/uploads/user/";
			$destinationPath=public_path().$filename;
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			$v->move($destinationPath, $name);
			$imageurl = 'uploads/user'.'/'.$name;
			$imageurls1[] = $imageurl;
		}
		$documentary = json_encode($imageurls1);
		$imageurls2 = array();
		foreach($photo as $key=>$v){
			$realname = $_FILES['photo']['name'][$key];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$filename="/uploads/user/";
			$destinationPath=public_path().$filename;
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			$v->move($destinationPath, $name);
			$imageurl = 'uploads/user'.'/'.$name;
			$imageurls2[] = $imageurl;
		}
		$photo = json_encode($imageurls2);
		$imageurls3 = array();
		foreach($headimg as $key=>$v){
			$realname = $_FILES['photo']['name'][$key];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$filename="/uploads/user/";
			$destinationPath=public_path().$filename;
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			$v->move($destinationPath, $name);
			$imageurl = 'uploads/user'.'/'.$name;
			$imageurls3 = $imageurl;
		}
		$headimg = json_encode($imageurls3);
		$data = array();
		$data['price'] = $price;
		$data['score'] = $score;
		$data['merits'] = $merits;
		$data['defect'] = $defect;
		$data['totailty'] = $totailty;
		$data['documentary'] = $documentary;
		$data['photo'] = $photo;
		$data['headimg'] = $headimg;
		$data['name'] = $pname;
		$data['phone'] = $phone;
		$data['tenantsId'] = $id;
		$data['source'] = 0;
		$res = Yfctenantscommentdetail::insert($data);
		return Redirect::to('commentpt/list');
	}
	//根据商户名称搜索评论
	public function getSearchres(){
		$name = Input::get('name','');
		$source = Input::get('source','0');
		if($source == '0'){
			$tenantsinfo = Yfctenants::where('name', 'like', '%'.$name.'%')->where('source','0')->first();
		}else{
			$tenantsinfo = Yfctenants::where('name', 'like', '%'.$name.'%')->where('source','!=','0')->first();
		}
		
		if(isset($tenantsinfo->id) && $name){
			$comments = Yfctenantscommentdetail::where('tenantsId',$tenantsinfo->id)->paginate(15);
			if(count($comments)){
				foreach($comments as $key=>$v){;
					$setId = $v->setId;
					$setinfo = Yfctenantsset::where('id',$setId)->first();
					$v->tenantsinfo = $tenantsinfo;
					$v->setinfo = $setinfo;
					$comments[$key] = $v;
				}
			}
			return View::make('admin.commentlist',array('comments'=>$comments,'name'=>'评论管理'));
		}else{
			return Redirect::back();
		}
		
	}
	//编辑对商户的评论
	public function getEditui($id){
		$info = Yfctenantscommentdetail::where('id',$id)->first();
		if(!isset($info->id) || !$info->id){
			return Redirect::back();
		}
		$info->documentary = json_decode($info->documentary,true);
		$info->headimg = json_decode($info->headimg,true);
		$info->photo = json_decode($info->photo,true);
		$setId = $info->setId;
		$setinfo = Yfctenantsset::where('id',$setId)->first();
		$info->setinfo = $setinfo;
		$tenantsinfo = Yfctenants::where('id',$info->tenantsId)->first();
		$info->tenantsinfo = $tenantsinfo;
		return View::make('admin.addcommentpt')->with('info',$info)->with('name','评论内容');
	}
	//删除商户的评论
	public function getDelcomment($id){
		Yfctenantscommentdetail::where('id',$id)->delete();
		return Redirect::to('commentpt/list');
	}
	
}