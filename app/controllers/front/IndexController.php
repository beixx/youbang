<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET, POST, OPTIONS, DELETE");
header("Access-Control-Allow-Headers:DNT,X-Mx-ReqToken,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type, Accept-Language, Origin, Accept-Encoding");
header("Content-type: text/html; charset=utf-8");
class IndexController extends BaseController{
	
	
	/**
	 * 首页
	 */
	public function getIndex()
	{
		$page = Input::get('page','1');
		$city = Input::get('city','北京');
		$keyword = Input::get('keyword','');
		$shoptype = Input::get('shoptype','婚纱摄影');
		$size = 20;
		$index = ($page-1)*20;
		$tenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','!=','2')->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->orderBy('praise_num','desc')->orderBy('bad_num','asc')->orderBy('brand_search_order','desc')->get();

		$oneinfo = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','2')->where('name', 'like', '%'.$keyword.'%')->orderBy('praise_num','desc')->orderBy('bad_num','asc')->orderBy('brand_search_order','desc')->first();

		$count = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->orderBy('praise_num','desc')->orderBy('bad_num','asc')->orderBy('brand_search_order','desc')->count();
		$allpages = ceil($count/20);
		//dd($tenants->toArray());
		$ctime = time();
		$advinfo = Yfcadv::where('type','1')->where('position','1')->where('endTime','>',$ctime)->first();
		if(isset($advinfo->id)){
			$advinfo = $advinfo->toArray();
		}else{
			$advinfo = array();
		}
		$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('name', 'like', '%'.$keyword.'%')->skip(0)->take(50)->orderBy('praise_num','desc')->orderBy('bad_num','asc')->orderBy('brand_search_order','desc')->get();
		if(count($tenants)){
			foreach($tenants as $key=>$v){
				if($v->isVip == 2){
					$taoxis = Yfctenantsset::where('tenantsId',$v->id)->orderBy('recommend','asc')->get();
					
					if(count($taoxis)){
						foreach($taoxis as $k=>$t){
							if($t->cover){
								$t->cover = json_decode($t->cover,true);
							}
							$taoxis[$k] = $t;
						}
					}
					$v->taoxis = $taoxis;
					$tenants[$key] = $v;
				}
			}
		}
		if($shoptype=="婚纱摄影"){
			return View::make('front.index')->with('tenants',$tenants)->with('oneinfo',$oneinfo)->with('allpages',$allpages)->with('city',$city)->with('dbtenants',$dbtenants)->with('advinfo',$advinfo);
		}else{
			return View::make('front.cehua')->with('tenants',$tenants)->with('oneinfo',$oneinfo)->with('allpages',$allpages)->with('city',$city)->with('dbtenants',$dbtenants)->with('advinfo',$advinfo);
		}
		
	}
	/**
	 * 条件搜索

	public function getSearch(){
		$page = Input::get('page','1');
		$city = Input::get('city','北京');
		$keyword = Input::get('keyword','');
		$size = 20;
		$index = ($page-1)*20;
		$tenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->orderBy('isVip','desc')->orderBy('praise_num','desc')->orderBy('bad_num','asc')->orderBy('brand_search_order','desc')->get();
		$count = Yfctenants::where('city', 'like', '%'.$city.'%')->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->orderBy('praise_num','desc')->orderBy('bad_num','asc')->orderBy('brand_search_order','desc')->orderBy('isVip','desc')->count();
		$allpages = ceil($count/20);
		//dd($tenants->toArray());

		$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('name', 'like', '%'.$keyword.'%')->skip(0)->take(50)->orderBy('isVip','desc')->orderBy('praise_num','desc')->orderBy('bad_num','asc')->orderBy('brand_search_order','desc')->get();
		if(count($tenants)){
			foreach($tenants as $key=>$v){
				if($v->isVip == 2){
					$taoxis = Yfctenantsset::where('tenantsId',$v->id)->orderBy('recommend','asc')->get();
					if(count($taoxis)){
						foreach($taoxis as $k=>$t){
							if($t->cover){
								$t->cover = json_decode($t->cover,true);
							}
							$taoxis[$k] = $t;
						}
					}
					$v->taoxis = $taoxis;
					$tenants[$key] = $v;
				}
			}
		}
		return View::make('front.search')->with('tenants',$tenants)->with('allpages',$allpages)->with('city',$city)->with('dbtenants',$dbtenants);
	}
		 */
	/**
	 * 套系列表
	 */
	public function getTenantsetlist(){
		return View::make('front.taoxilist');
	}
	/**
	 * 套系详情
	 */
	public function getTenantsetdetail(){
		return View::make('front.detailtaoxi');
	}
	/**
	 * 评论详情
	 */
	public function getCommentdetail(){
		return View::make('front.commentdetail');
	}
	/**
	 * 推荐首页
	 */
	public function getRecommend(){
		return View::make('front.recommend');
	}
	/**
	 * 套系欣赏
	 */
	public function getTenantsee(){
		return View::make('front.seetaoxi');
	}
	/**
	 * 好评
	 */
	public function getGoogscomment(){
		$res = array();
		$page = Input::get('page','1');
		$size = 20;
		$index = ($page-1)*$size;
		$id = Input::get('id');
		if(!$id){
			$res['result'] = '01';
			return json_encode($res);
		}else{
			$goods = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','>=',15)->skip($index)->take($size)->orderBy('created','desc')->get();
			if(count($goods)){
				$comments = $goods->toArray();
				foreach($comments as $key=>$v){
					$v['headimg'] = json_decode($v['headimg']);
					$v['documentary'] = json_decode($v['documentary'],true);
					$v['photo'] = json_decode($v['photo'],true);
					$v['created'] = date('Y-m-d H:i:s', $v['created']);
					$comments[$key] = $v;
				}
				$res['result'] = '00';
				$res['list'] = $comments;
			}else{
				$res['result'] = '01';
			}
			return json_encode($res);
		}
	}
	/**
	 * 差评
	 */
	public function getBadcomment(){
		$res = array();
		$page = Input::get('page','1');
		$size = 20;
		$index = ($page-1)*$size;
		$id = Input::get('id');
		if(!$id){
			$res['result'] = '01';
			return json_encode($res);
		}else{
			$bads = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','<',0)->skip($index)->take($size)->orderBy('created','desc')->get();
			if(count($bads)){
				$comments = $bads->toArray();
				foreach($comments as $key=>$v){
					$v['headimg'] = json_decode($v['headimg']);
					$v['documentary'] = json_decode($v['documentary'],true);
					$v['photo'] = json_decode($v['photo'],true);
					$v['created'] = date('Y-m-d H:i:s', $v['created']);
					$comments[$key] = $v;
				}
				$res['result'] = '00';
				$res['list'] = $comments;
			}else{
				$res['result'] = '01';
			}
			return json_encode($res);
		}
	}
	/**
	 * 中评
	 */
	public function getZhongcomment(){
		$res = array();
		$page = Input::get('page','1');
		$size = 20;
		$index = ($page-1)*$size;
		$id = Input::get('id');
		if(!$id){
			$res['result'] = '01';
			return json_encode($res);
		}else{
			$averages = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','>=',0)->where('score','<',15)->skip($index)->take($size)->orderBy('created','desc')->get();
			if(count($averages)){
				$comments = $averages->toArray();
				foreach($comments as $key=>$v){
					$v['headimg'] = json_decode($v['headimg']);
					$v['documentary'] = json_decode($v['documentary'],true);
					$v['photo'] = json_decode($v['photo'],true);
					$v['created'] = date('Y-m-d H:i:s', $v['created']);
					$comments[$key] = $v;
				}
				$res['result'] = '00';
				$res['list'] = $comments;
			}else{
				$res['result'] = '01';
			}
			return json_encode($res);
		}
	}
	/**
	 * 有图
	 */
	public function getHastu(){
		$res = array();
		$page = Input::get('page','1');
		$size = 20;
		$index = ($page-1)*$size;
		$id = Input::get('id');
		if(!$id){
			$res['result'] = '01';
			return json_encode($res);
		}else{
			$haspics = Yfctenantscommentdetail::where('tenantsId',$id)->where('photo','!=','')->skip($index)->take($size)->orderBy('created','desc')->get();
			if(count($haspics)){
				$comments = $haspics->toArray();
				foreach($comments as $key=>$v){
					$v['headimg'] = json_decode($v['headimg']);
					$v['documentary'] = json_decode($v['documentary'],true);
					$v['photo'] = json_decode($v['photo'],true);
					$v['created'] = date('Y-m-d H:i:s', $v['created']);
					$comments[$key] = $v;
				}
				$res['result'] = '00';
				$res['list'] = $comments;
			}else{
				$res['result'] = '01';
			}
			return json_encode($res);
		}
	}
	/**
	 * 晒单
	 */
	public function getShaidan(){
		$res = array();
		$page = Input::get('page','1');
		$size = 20;
		$index = ($page-1)*$size;
		$id = Input::get('id');
		if(!$id){
			$res['result'] = '01';
			return json_encode($res);
		}else{
			$hasdans = Yfctenantscommentdetail::where('tenantsId',$id)->where('documentary','!=','')->skip($index)->take($size)->orderBy('created','desc')->get();
			if(count($hasdans)){
				$comments = $hasdans->toArray();
				foreach($comments as $key=>$v){
					$v['headimg'] = json_decode($v['headimg']);
					$v['documentary'] = json_decode($v['documentary'],true);
					$v['photo'] = json_decode($v['photo'],true);
					$v['created'] = date('Y-m-d H:i:s', $v['created']);
					$comments[$key] = $v;
				}
				$res['result'] = '00';
				$res['list'] = $comments;
			}else{
				$res['result'] = '01';
			}
			return json_encode($res);
		}
	}
	/*
	 * 搜索排行榜 type=1综合榜单，type=2品牌榜单，type=3价格榜单，type=4好评榜单，type=5全国榜单
	 */
	public function postSearch(){
		
		$res = array();
		$type = Input::get('type','1');
		$page = Input::get('page','1');
		$city = Input::get('city','北京');
		$pycity = Config::get('city.'.$city);
		$keyword = Input::get('keyword','');
		$shoptype = Input::get('shoptype','婚纱摄影');
		$size = 20;
		$index = ($page-1)*20;
		if($type==1){
			$tenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('spread','!=','2')->where('shoptype',$shoptype)->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->orderBy('order_city','asc')->get();
			$tenants2 = array();
			if(count($tenants)==20){
				$temp1 = $tenants->toArray();
				$index = $temp1[19]['order_city'];
				$tenants2 = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','!=','2')->where('name', 'like', '%'.$keyword.'%')->where('order_city','>',$index)->take(80)->orderBy('order_city','asc')->get();
			}
			$oneinfo = Yfctenants::where('city', 'like', '%'.$city.'%')->where('spread','2')->where('shoptype',$shoptype)->where('name', 'like', '%'.$keyword.'%')->orderBy('order_city','asc')->first();

			$count = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->count();
		}else if($type==2){
			$tenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('spread','!=','2')->where('shoptype',$shoptype)->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->orderBy('price_order','asc')->get();
			$tenants2 = array();
			if(count($tenants)==20){
				$temp1 = $tenants->toArray();
				$index = $temp1[19]['price_order'];
				$tenants2 = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','!=','2')->where('name', 'like', '%'.$keyword.'%')->where('price_order','>',$index)->take(80)->orderBy('price_order','asc')->get();
			}
			$oneinfo = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','2')->where('name', 'like', '%'.$keyword.'%')->orderBy('price_order','asc')->first();

			$count = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->count();
		}else if($type==4){
			$tenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('spread','!=','2')->where('shoptype',$shoptype)->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->orderBy('praise_order','asc')->get();
			$tenants2 = array();
			if(count($tenants)==20){
				$temp1 = $tenants->toArray();
				$index = $temp1[19]['praise_order'];
				$tenants2 = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','!=','2')->where('name', 'like', '%'.$keyword.'%')->where('praise_order','>',$index)->take(80)->orderBy('praise_order','asc')->get();
			}
			$oneinfo = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','2')->where('name', 'like', '%'.$keyword.'%')->orderBy('praise_order','asc')->first();

			$count = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->count();
		}
		$ctime = time();
		if($shoptype = '婚纱摄影'){
			$advinfo = Yfcadv::where('type','1')->where('position','1')->where('advtype','1')->where('city', 'like', '%'.$pycity.'%')->where('endTime','>',$ctime)->first();
		}else{
			$advinfo = Yfcadv::where('type','1')->where('position','1')->where('advtype','2')->where('city', 'like', '%'.$pycity.'%')->where('endTime','>',$ctime)->first();
		}
		if(isset($advinfo->id)){
			$advinfo = $advinfo->toArray();
		}else{
			$advinfo = array();
		}
		
		$allpages = ceil($count/20);
		
		if(count($tenants)){
			foreach($tenants as $key=>$v){
				if($v->isVip == 2){
					$taoxis = Yfctenantsset::where('tenantsId',$v->id)->select('id','setName','price','currentPrice','cover')->orderBy('recommend','asc')->get()->toArray();
					$v->taoxis = $taoxis;
					$tenants[$key] = $v;
				}
			}
			
			if(count($tenants2)){
				foreach($tenants2 as $key=>$v){
					if($v->isVip == 2){
						$taoxis = Yfctenantsset::where('tenantsId',$v->id)->orderBy('recommend','asc')->get();
						if(count($taoxis)){
							foreach($taoxis as $k=>$t){
								if($t->cover){
									$t->cover = json_decode($t->cover,true);
								}
								$taoxis[$k] = $t;
							}
						}
						$v->taoxis = $taoxis;
						$tenants2[$key] = $v;
					}
				}
				$tenants2 = $tenants2->toArray();
			}
			
			if(isset($oneinfo->id)){
				$oneinfo = $oneinfo->toArray();
			}else{
				$oneinfo = array();
			}
			$res['advinfo'] = $advinfo;
			$res['result'] = '00';
			$res['list'] = $tenants->toArray();
			$res['oneinfo'] = $oneinfo;
			$res['type'] = $type;
			$res['tenants2'] = $tenants2;
		}else{
			$res['result'] = '01';
		}
		$res['allpages'] = $allpages;
		return json_encode($res);
	}
	
	/*
	 * 查看店铺详情
	 * 
	 */
	public function getDetail($id){
		$tenantinfo = Yfctenants::where('id',$id)->first();
		$city = $tenantinfo->city;
		Session::put('city',$city);
		$tenantdatas = Yfctenantsdata::where('tenants_id',$id)->get();
		$tenantsets = Yfctenantsset::where('tenantsId',$id)->orderBy('recommend','asc')->skip(0)->take(8)->get();
		
		foreach($tenantsets as $key=>$v){
			if(isset($v->kind) && $v->kind){
				$v->kind = json_decode($v->kind,true);
			}
			if(isset($v->cover) && $v->cover){
				$v->cover = json_decode($v->cover,true);
			}
			if(isset($v->picDetail) && $v->picDetail){
				$v->picDetail = json_decode($v->picDetail,true);
			}
			$tenantsets[$key] = $v;
		}
		$countsets = Yfctenantsset::where('tenantsId',$id)->count();
		$setnums = ceil($countsets/8);
		$tenantpics = Yfctenantspic::where('tenantsId', $id)->skip(0)->take(8)->get();
		foreach($tenantpics as $k => $t){
			if(isset($t->cover) && $t->cover){
				$t->cover = json_decode($t->cover,true);
			}
			if(isset($t->firstcover) && $t->firstcover){
				$t->firstcover = json_decode($t->firstcover,true);
			}
			if(isset($t->picStyle) && $t->picStyle){
				$t->picStyle = json_decode($t->picStyle,true);
			}
			$tenantpics[$k] = $t;
		}
		$countpics = Yfctenantspic::where('tenantsId',$id)->count();
		$picnums = ceil($countpics/4);
		
		$comments = Yfctenantscommentdetail::where('tenantsId',$id)->skip(0)->take(20)->orderBy('created','desc')->get();
		$counts = Yfctenantscommentdetail::where('tenantsId',$id)->count();
		$allpages = ceil($counts/20);
		$goods = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','>=',15)->count();
		$averages = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','>=',0)->where('score','<',15)->count();
		$bads = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','<',0)->count();
		$haspics = Yfctenantscommentdetail::where('tenantsId',$id)->where('photo','!=','')->count();
		$hasdans = Yfctenantscommentdetail::where('tenantsId',$id)->where('documentary','!=','')->count();
		$searchs = Yfcdaysearch::take(30)->where('tenantsId',$id)->orderBy('id','desc')->get();
		$searchinfo =  Yfcdaysearch::where('tenantsId',$id)->orderBy('id','desc')->first();
		$ctime = time();
		if($tenantinfo->isVip==2){
			$advinfo = Yfcadv::where('type','2')->where('position','3')->where('tenantsId',$id)->where('endTime','>',$ctime)->first();
		}else{
			$advinfo = Yfcadv::where('type','1')->where('position','3')->where('endTime','>',$ctime)->first();
		}
		return View::make('front.shop', array('tenantinfo' => $tenantinfo,'tenantdatas'=>$tenantdatas,'tenantsets'=>$tenantsets,'advinfo'=>$advinfo,'countsets'=>$countsets,'tenantpics'=>$tenantpics,'countpics'=>$countpics,
				'setnums'=>$setnums,'picnums'=>$picnums,'searchinfo'=>$searchinfo,'comments'=>$comments,'counts'=>$counts,'allpages'=>$allpages,'goods'=>$goods,'averages'=>$averages,'bads'=>$bads,'haspics'=>$haspics,'hasdans'=>$hasdans,'city'=>$city,'searchs'=>$searchs ));
				
	}	
	
	/**
	 * 店铺详情的精选套系分页
	 */
	public function getDetailtaoxi(){
		$res = array();
		$id = Input::get('id','');
		$page = Input::get('page','2');
		if(!$id){
			$res['result'] = '01';
			return json_encode($res);
		}
		$size = 8;
		$index = ($page-1)*$size;
		$tenantsets = Yfctenantsset::where('tenantsId',$id)->select('id','setName','price','currentPrice','cover','kind')->skip($index)->take($size)->get()->toArray();
		$tenantinfo = Yfctenants::where('id',$id)->first()->toArray();
		foreach($tenantsets as $key=>$v){
			if(isset($v['kind']) && $v['kind']){
				$v['kind'] = json_decode($v['kind'],true);
			}
			if(isset($v['cover']) && $v['cover']){
				$covers = json_decode($v['cover'],true);
				$v['cover'] = $covers[0];
			}
			if(isset($v['picDetail']) && $v['picDetail']){
				$v['picDetail'] = json_decode($v['picDetail'],true);
			}
			$tenantsets[$key] = $v;
		}
		$res['list'] = $tenantsets;
		$res['info'] = $tenantinfo;
		$res['result'] = '00';
		return json_encode($res);
	}
	/**
	 * 店铺详情的真实客户的分页
	 */
	public function getDetailclients(){
		$res = array();
		$id = Input::get('id','');
		$page = Input::get('page','2');
		if(!$id){
			$res['result'] = '01';
			return json_encode($res);
		}
		$size = 4;
		$index = ($page-1)*$size;
		$tenantpics = Yfctenantspic::where('tenantsId',$id)->skip($index)->take($size)->get()->toArray();
		foreach ($tenantpics as $key=>$t){
			if(isset($t['cover']) && $t['cover']){
				$covers = json_decode($t['cover'],true);
				$t['cover'] = $covers[0];
				
			}
			if(isset($t['firstcover']) && $t['firstcover']){
				$t['firstcover'] = json_decode($t['firstcover'],true);
			}
			if(isset($t['picStyle']) && $t['picStyle']){
				$t['picStyle'] = json_decode($t['picStyle'],true);
			}
			$tenantpics[$key] = $t;
		}
		$res['list'] = $tenantpics;
		$res['result'] = '00';
		return json_encode($res);
	}
	/**
	 * 对店铺的评价
	 */
	public function getVote(){
		$city = Input::get('city','北京');
		$id = Input::get('id');
		$tenantinfo = Yfctenants::where('id',$id)->first();
		return View::make('front.addVoted')->with('city',$city)->with('id',$id)->with('tenantinfo',$tenantinfo);
	}
	/**
	 * 评价列表页
	 */
	public function getVotelist($id){
		$city = Input::get('city','北京');
		$pycity =  Config::get('city.'.$city,'beijing');
		if(Session::has('city')){
			$city = Session::get('city');
		}
		$id = Input::get('id');
		if(Session::has('id')){
			$id = Session::get('id');
		}
		$tenantinfo = Yfctenants::where('id',$id)->first();
		$page = Input::get('page','1');
		$size=20;
		$index = ($page-1)*$size;
		$comments = Yfctenantscommentdetail::where('tenantsId',$id)->orderBy('created','desc')->paginate(20);
		$counts = Yfctenantscommentdetail::where('tenantsId',$id)->count();
		$allpages = ceil($counts/20);
		$goods = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','>=',15)->count();
		$averages = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','>=',0)->where('score','<',15)->count();
		$bads = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','<',0)->count();
		$haspics = Yfctenantscommentdetail::where('tenantsId',$id)->where('photo','!=','')->count();
		$hasdans = Yfctenantscommentdetail::where('tenantsId',$id)->where('documentary','!=','')->count();
		return View::make('front.indexvote')->with('pycity',$pycity)->with('city',$city)->with('id',$id)->with('tenantinfo',$tenantinfo)->with('comments',$comments)->with('goods',$goods)->with('averages',$averages)->with('bads',$bads)->with('haspics',$haspics)->with('hasdans',$hasdans)->with('allpages',$allpages);
	}
	/**
	 * 评价的保存
	 */
	public function postSavevote(){
		$data = array();
		$city = Input::get('city');
		$id = Input::get('id');//商家的id
		$score = Input::get('score');//评分
		$virtue = Input::get('virtue');//优点
		$defect = Input::get('defect');//缺点
		$content = Input::get('content');//总体
		$user_bill = Input::get('user_bill');//单据证明(数据类型是数组)
		$photo = Input::get('user_photo');//用户照片(数据类型是数组)
		$head = Input::get('headimg');//用户头像
		$username = Input::get('userName');//用户名称
		$phone = Input::get('phone');//用户名称
		$price = Input::get('price');//消费金额
		if($score<0){
			$data['type'] = 3;
		}else if($score>=15){
			$data['type'] = 1;
		}else{
			$data['type'] = 2;
		}
		$data['score'] = $score;
		$data['merits'] = $virtue;
		$data['defect'] = $defect;
		$data['totailty'] = $content;
		$data['documentary'] = json_encode($user_bill);
		$data['headimg'] = json_encode($head);
		$data['photo'] = json_encode($photo);
		$data['name'] = $username;
		$data['phone'] = $phone;
		$data['tenantsId'] = $id;
		$data['created'] = time();
		$data['source'] = 0;
		$data['created'] = time();
		$data['price'] = $price;
		Yfctenantscommentdetail::insert($data);
		$url = url('votelist').'/'.$id;
		echo '<html>';
			echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
			echo "<SCRIPT language=Javascript> alert('打榜成功');
			window.location.href='$url';
			</SCRIPT>";
			echo '</html>';
			exit();
	}
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
	 * 保存图片单据
	 */
	public function postSavephoto(){
		$res = array();
		$imageurls = array();
		$images = Input::file('photo');
		if(count($images)){
			foreach($images as $key=>$v){
				$realname = $_FILES['photo']['name'][$key];
				$type = pathinfo($realname, PATHINFO_EXTENSION);
				$filename="/uploads/user/";
				$destinationPath=public_path().$filename;
				$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
				$v->move($destinationPath, $name);
				$imageurl = 'uploads/user'.'/'.$name;
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
	 * 保存用户头像  WLGBZ-D2Y3P-SSBDA-LLPKT-5T6RJ-BZFF7
	 */
	public function postSaveheadimg(){
		$res = array();
		$imageurls = array();
		$images = Input::file('photo');
		if(count($images)){
			foreach($images as $key=>$v){
				$realname = $_FILES['photo']['name'][$key];
				$type = pathinfo($realname, PATHINFO_EXTENSION);
				$filename="/uploads/user/";
				$destinationPath=public_path().$filename;
				$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
				$v->move($destinationPath, $name);
				$imageurl = 'uploads/user'.'/'.$name;
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
	 * 保存预约看店记录
	 */
	public function postSaveorder(){
		$res = array();
		$data = array();
		$name = Input::get('name');
		$phone = Input::get('phone');
		$tenantsId = Input::get('tenantsId');
		$data['name'] = $name;
		$data['phone'] = $phone;
		$data['tenantsId'] = $tenantsId;
		$backres = Yfcbespokeview::insert($data);
		if($backres){
			$res['result'] = '00';
		}else{
			$res['result'] = '01';
		}
		return json_encode($res);
	}
	/**
	 * 加载更多评论
	 */
	public function postMorecomment(){
		$res = array();
		$id = Input::get('id');
		$page = Input::get('page');
		if(!$id){
			$res['result'] = '01';
			return json_encode($res);
		}
		$size=20;
		$index = ($page-1)*$size;
		$comments = Yfctenantscommentdetail::where('tenantsId',$id)->skip($index)->take($size)->orderBy('created','desc')->get()->toArray();
		if(count($comments)){
			foreach($comments as $key=>$v){
				$v['headimg'] = json_decode($v['headimg']);
				$v['documentary'] = json_decode($v['documentary'],true);
				$v['photo'] = json_decode($v['photo'],true);
				$v['created'] = date('Y-m-d H:i:s', $v['created']);
				$comments[$key] = $v;
			}
			$res['result'] = '00';
			$res['list'] = $comments;
		}else{
			$res['result'] = '01';
		}
		return json_encode($res);
	}
	/**
	 * 跳转到定制页面
	 */
	public function postCustom(){
		$sty = Input::get('style','');
		$city = Input::get('city','');
		$style = explode(',',$sty);
		$name = Input::get('name','');
		$price = Input::get('price','');
		$shoptype = Input::get('customized_name','婚纱摄影');
		$styles = Yfcstyle::whereIn('name',$style)->select('tenantsId')->get();
		$search = array();
		if(count($styles)){
			$styles = $styles->toArray();
			$ids = array();
			foreach($styles as $v){
				$ids[] = $v['tenantsId'];
			}
			$ctime = time();
			$ids = array_unique($ids);
			$res = Yfctenants::whereIn('id',$ids)->where('isVip','2')->where('spread','1')->where('endSpreadTime','>',$ctime)->where('shoptype',$shoptype)->where('city',$city)->get();
			$dbtenants = Yfctenants::whereIn('id',$ids)->where('isVip','2')->where('spread','1')->where('endSpreadTime','>',$ctime)->where('shoptype',$shoptype)->where('city',$city)->skip(0)->take(50)->get();
			if(count($res)){
				$search = $res;
				foreach($search as $k=>$info){
					$tenantsId = $info->id;
					$sets = Yfctenantsset::where('tenantsId',$tenantsId)->get();
					if(count($sets)){
						foreach($sets as $key=>$v){
							if($v->cover){
								$v->cover = json_decode($v->cover,true);
							}
							if($v->picDetail){
								$v->picDetail = json_decode($v->picDetail,true);
							}
							if($v->kind){
								$v->kind = json_decode($v->kind,true);
							}
							$sets[$key] = $v;
						}
					}else{
						$sets = array();
					}
					$info->sets = $sets;
					$search[$k] = $info;
				}
			}
		}else{
			$styles = array();
		}
		dd($search->toArray());
		return View::make('front.recommend')->with('city',$city)->with('name',$name)->with('price',$price)->with('style',$sty)->with('search',$search)->with('dbtenants',$dbtenants);
	}
	/**
	 * 规则
	 */
	public function getRegular(){
		$city = Input::get('city','北京');
		$pycity = Config::get('city.'.$city,'beijing');
		return View::make('front.guizhe')->with('city',$city)->with('pycity',$pycity);
	}
	/**
	 * 套系详情
	 */
	public function postDetailtx(){
		$name = Input::get('name');
		$city = Input::get('city','北京');
		$txname = Input::get('txname');
		$txid = Input::get('txid');
		$phone = Input::get('phone');
		$tenantsId = Input::get('tenantsId');
		$tenantsinfo = Yfctenants::where('id',$tenantsId)->first();
		$info = Yfctenantsset::where('id',$txid)->first();
		$remmends = Yfctenantsset::where('id','!=',$txid)->skip(0)->take(8)->get();
		if(count($remmends)){
			foreach($remmends as $key=>$v){
				if($v->cover){
					$v->cover = json_decode($v->cover,true);
				}
				if($v->picDetail){
					$v->picDetail = json_decode($v->picDetail,true);
				}
				if($v->kind){
					$v->kind = json_decode($v->kind,true);
				}
				$remmends[$key] = $v;
			}
		}
		if($info->cover){
			$info->cover = json_decode($info->cover,true);
		}
		if($info->picDetail){
			$info->picDetail = json_decode($info->picDetail,true);
		}
		if($info->kind){
			$info->kind = json_decode($info->kind,true);
		}
		return View::make('front.detailtaoxi')->with('tenantsId',$tenantsId)->with('city',$city)->with('tenantsinfo',$tenantsinfo)->with('txname',$txname)->with('phone',$phone)->with('name',$name)->with('info',$info)->with('remmends',$remmends);
	}
	/**
	 * 保存咨询的信息
	 * 
	 */
	public function postSaveseek(){
		$res = array();
		$data=array();
		$name = Input::get('name');
		$phone = Input::get('phone');
		$source = Input::get('source');
		$ctime = Input::get('ctime');
		$visitState = 2;
		$tenantsId = Input::get('tenantsId');
		$data['name'] = $name;
		$data['phone'] = $phone;
		$data['source'] = $source;
		$data['ctime'] = $ctime;
		$data['visitState'] = $visitState;
		$data['tenantsId'] = $tenantsId;
		$result = Yfcbespokeview::insert($data);
		if($result){
			$res['result'] = '00';
		}else{
			$res['result'] = '01';
		}
		return json_encode($res);
	}
	
	/*
	 * 套系列表
	 */
	public function getTxlist($id){
		$sets = Yfctenantsset::where('tenantsId',$id)->orderBy('recommend','asc')->get();
		$info = Yfctenants::where('id',$id)->first();
		if(count($sets)){
			foreach($sets as $key=>$v){
				if($v->cover){
					$v->cover = json_decode($v->cover,true);
				}
				if($v->picDetail){
					$v->picDetail = json_decode($v->picDetail,true);
				}
				if($v->kind){
					$v->kind = json_decode($v->kind,true);
				}
				$sets[$key] = $v;
			}
		}else{
			$sets = array();
		}
		return View::make('front.taoxilist')->with('sets',$sets)->with('info',$info)->with('city',$info->city);
	}
	/*
	 * 客片详情
	 */
	
	public function getClientdetailpic($id){
		$city = Session::get('city');
		$picinfo = Yfctenantspic::where('id',$id)->first();
		if(isset($picinfo->cover) && $picinfo->cover){
			$picinfo->cover = json_decode($picinfo->cover,true);
		}
		$tenantsId = $picinfo->tenantsId;
		$info = Yfctenants::where('id',$tenantsId)->first();
		$recommpics = Yfctenantspic::where('id','!=',$id)->where('tenantsId',$tenantsId)->orderBy('marknums','desc')->take(4)->get();
		foreach($recommpics as $key=>$v){
			$v->firstcover = json_decode($v->firstcover,true);
			$recommpics[$key] = $v;
		}
		return View::make('front.clientpicdetail')->with('city',$city)->with('picinfo',$picinfo)->with('info',$info)->with('tenantsId',$tenantsId)->with('recommpics',$recommpics);
	}
	/*
	 * 客片列表
	 */
	public function getClientlistpic($tenantsId){
		$city = Session::get('city');
		$recommpics = Yfctenantspic::where('tenantsId',$tenantsId)->get();
		foreach($recommpics as $key=>$v){
			if($v->firstcover){
				$v->firstcover = json_decode($v->firstcover,true);
			}
			if($v->kind){
				$v->kind = json_decode($v->kind,true);
			}
			$recommpics[$key] = $v;
		}
		$info = Yfctenants::where('id',$tenantsId)->first();
		return View::make('front.clientpiclist')->with('city',$city)->with('info',$info)->with('tenantsId',$tenantsId)->with('recommpics',$recommpics);
	}
	/**
	 * 保存预约店铺的信息
	 */
	public function postSaveview(){
		$res = array();
		$tenantsId = Input::get('tenantsId');
		$phone = Input::get('phone');
		$name = Input::get('name');
		$source = Input::get('source');
		$data = array();
		$data['tenantsId'] = $tenantsId;
		$data['phone'] = $phone;
		$data['name'] = $name;
		$data['source'] = $source;
		$result = Yfcbespokeview::insert($data);
		if($result){
			$res['result'] = '00';
		}else{
			$res['result'] = '01';
		}
		return json_encode($res);
	}
	
	
	
	
	
	
	
	
	
	
	
	
}