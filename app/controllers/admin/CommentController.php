<?php
class CommentController extends BaseController{
	//评论列表
	public function getList(){
		$comments = Yfctenantscommentdetail::where('source','!=','0')->orderBy('id','desc')->paginate(15);
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
		return View::make('admin.commentlist',array('comments'=>$comments,'name'=>'评论管理'));
	}
	//根据商户搜索评论
	public function getSearch(){
		$source = Input::get('source','');
		return View::make('admin.search')->with('name','根据商户搜索评论')->with('source',$source);
	}
	//根据商户名称搜索评论
	public function getSearchres(){
		$source = Input::get('source','');
		$name = Input::get('name','');
		$tenantsinfo = Yfctenants::where('name', 'like', '%'.$name.'%')->first();
		if(isset($tenantsinfo->id) && $name){
			if($source == '0'){
				$comments = Yfctenantscommentdetail::where('tenantsId',$tenantsinfo->id)->where('source','0')->orderBy('id','desc')->paginate(15);
			}else{
				$comments = Yfctenantscommentdetail::where('tenantsId',$tenantsinfo->id)->where('source','!=','0')->orderBy('id','desc')->paginate(15);
			}
			
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
		$setId = $info->setId;
		$setinfo = Yfctenantsset::where('id',$setId)->first();
		$info->setinfo = $setinfo;
		$tenantsinfo = Yfctenants::where('id',$info->tenantsId)->first();
		$info->tenantsinfo = $tenantsinfo;
		return View::make('admin.addcomment')->with('info',$info)->with('name','评论内容');
	}
	//保存商户的评论
	public function postSaveshop(){
		$id = Input::get('id');
		$tenantsId = Input::get('tenantsId');
		$setId = Input::get('setId');
		
		$shopname = Input::get('shopname');
		$source = Input::get('source');
		$created = Input::get('created');
		$name = Input::get('name');
		$score = Input::get('score');
		$conent = Input::get('conent');
		$price = Input::get('price');
		$addscore = Input::get('addscore');
		$addreasons = Input::get('addreasons');
		$data = array();
		$picture='';
		if(Input::hasFile('picture')){
			$filename="/uploads/logo/";
			$destinationPath=public_path().$filename;
			$realname = $_FILES['picture']['name'];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			Input::file('picture')->move($destinationPath, $name);
			$picture = 'uploads/logo'.'/'.$name;
			$data['picture'] = $picture;
		}
		$data['source'] = $source;
		$data['created'] = strtotime($created);
		$data['name'] = $name;
		$data['score'] = $score;
		$data['conent'] = $conent;
		$data['addscore'] = $addscore;
		$data['addreasons'] = $addreasons;
		Yfctenantscommentdetail::where('id',$id)->update($data);
		$shopdata = array();
		$shopdata['name'] = $shopname;
		if($tenantsId){
			$res = Yfctenants::where('id',$tenantsId)->update($shopdata);
		}
		$setdata = array();
		$setdata['currentPrice'] = $price;
		if($setId){
			Yfctenantsset::where('id',$setId)->update($setdata);
		}
		return Redirect::back();
	}
	//删除商户的评论
	public function getDelcomment($id){
		Yfctenantscommentdetail::where('id',$id)->delete();
		return Redirect::to('comment/list');
	}
	
}