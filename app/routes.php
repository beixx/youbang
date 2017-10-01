<?php
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/**
 * 后台
 */
Route::controller('admin', 'AdminController');
Route::group(array('before' => 'auth'), function()
{

	Route::controller('comment', 'CommentController');
	Route::controller('commentpt', 'CommentptController');
	Route::controller('appointment', 'AppointmentController');
	Route::controller('shop', 'ShopController');
	Route::controller('custom', 'CustomController');
});

/*
 * 前台
 */
 Route::get('{name?}', function($name = 'John')
{
    return $name;
});

Route::controller('index', 'IndexController');
Route::controller('order', 'OrderController');
Route::get('/',function(){
	return Redirect::to('/beijing');
});

		
	
			Route::get('search/{name?}', function($name = null){
				$page = Input::get('page','1');
				$city = Config::get('city.'.$name,'北京');
				$keyword = Input::get('keyword','');
				$size = 20;
				$index = ($page-1)*20;
				$tenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->orderBy('order_city','asc')->get();
				$count = Yfctenants::where('city', 'like', '%'.$city.'%')->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->count();
				$allpages = ceil($count/20);
				if(count($tenants)){
					foreach($tenants as $key=>$v){
						if($v->isVip == 2){
							$taoxis = Yfctenantsset::where('tenantsId',$v->id)->select('id','setName','price','currentPrice','cover')->get();
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
				
				$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->skip(0)->take(50)->orderBy('order_city','asc')->get();
				$title = $keyword.'在'.$city.'的搜索结果-有榜';
				return View::make('front.search')->with('dbtenants',$dbtenants)->with('tenants',$tenants)->with('allpages',$allpages)->with('pycity',$name)->with('count',$count)->with('city',$city)->with('keyword',$keyword)->with('title',$title);
			});
		
		Route::get('user/{name?}', function($name = null)
		{
			return $name;
		});
	
		Route::get('user/{name}/{id}', function($name, $id)
		{
			$sty = Input::get('style','');
			$city = Input::get('city','');
			$style = explode(',',$sty);
			$cname = Input::get('name','');
			$price = Input::get('price','');
			$minprice = ($price-2000) ? ($price-2000) : 0;
			$maxprice = $price+2000;
			$shoptype = Input::get('customized_name','婚纱摄影');
			$styles = Yfcstyle::whereIn('name',$style)->select('tenantsId')->get();
			$search = array();
			$oneinfo = '';
			if(count($styles)){
				$styles = $styles->toArray();
				$ids = array();
				foreach($styles as $v){
					$ids[] = $v['tenantsId'];
				}
				$ctime = time();
				$ids = array_unique($ids);
				$oneinfo = Yfctenants::whereIn('id',$ids)->where('spread','2')->where('person_price','>=',$minprice)->where('person_price','<=',$maxprice)->where('city',$city)->orderBy('heat_index','desc')->first();
				http://ceshi.youbangkeyi.com/$res = Yfctenants::whereIn('id',$ids)->where('spread','1')->where('person_price','>=',$minprice)->where('person_price','<=',$maxprice)->where('shoptype',$shoptype)->where('city',$city)->orderBy('heat_index','desc')->get();
				$res = Yfctenants::whereIn('id',$ids)->where('person_price','>=',$minprice)->where('shoptype',$shoptype)->where('spread','1')->where('person_price','<=',$maxprice)->where('city',$city)->orderBy('heat_index','desc')->get();
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
			$advinfo = '';
			if($shoptype = '婚纱摄影'){
				$advinfo = Yfcadv::where('type','1')->where('position','2')->where('city', 'like', '%'.$name.'%')->where('advtype','1')->where('endTime','>',$ctime)->first();
			}else{
				$advinfo = Yfcadv::where('type','1')->where('position','2')->where('city', 'like', '%'.$name.'%')->where('advtype','2')->where('endTime','>',$ctime)->first();
			}
			
			$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype','like','%'.$shoptype.'%')->skip(0)->take(50)->orderBy('order_city','asc')->get();
			$title = $cname.'的'.$shoptype.'榜单定制页-有榜';
			return View::make('front.recommend')->with('dbtenants',$dbtenants)->with('advinfo',$advinfo)->with('pycity',$name)->with('city',$city)->with('name',$cname)->with('price',$price)->with('style',$sty)->with('search',$search)->with('dbtenants',$dbtenants)->with('title',$title)->with('oneinfo',$oneinfo);
		});
		
		Route::get('dafen/{name}/{id}', function($name, $id){
			$city = Config::get('city.'.$name,'北京');
			$tenantinfo = Yfctenants::where('id',$id)->first();
			$title = $tenantinfo->name.'打分-有榜';
			$shoptype=$tenantinfo->shoptype;
			$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->skip(0)->take(50)->orderBy('order_city','asc')->get();
			return View::make('front.addVoted')->with('dbtenants',$dbtenants)->with('city',$city)->with('id',$id)->with('tenantinfo',$tenantinfo)->with('pycity',$name)->with('title',$title);
		});
		
		Route::get('txlist/{id}', function($id)
		{
			$sets = Yfctenantsset::where('tenantsId',$id)->orderBy('recommend','asc')->get();
			$info = Yfctenants::where('id',$id)->first();
			$city = $info->city;
			$pycity = Config::get('city.'.$city,'beijing');
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
			$shoptype = $info->shoptype;
			$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->skip(0)->take(50)->orderBy('order_city','asc')->get();
			$title = $info->name.'套系大全 ';
			return View::make('front.taoxilist')->with('dbtenants',$dbtenants)->with('pycity',$pycity)->with('title',$title)->with('sets',$sets)->with('info',$info)->with('city',$info->city);
		});
		
		Route::get('kplist/{id}', function($id)
		{
			$recommpics = Yfctenantspic::where('tenantsId',$id)->get();
			foreach($recommpics as $key=>$v){
				if($v->firstcover){
					$v->firstcover = json_decode($v->firstcover,true);
				}
				if($v->kind){
					$v->kind = json_decode($v->kind,true);
				}
				if($v->picStyle){
					$v->picStyle = json_decode($v->picStyle,true);
				}
				$recommpics[$key] = $v;
			}
			$info = Yfctenants::where('id',$id)->first();
			$shoptype = $info->shoptype;
			$dbtenants = Yfctenants::where('shoptype',$shoptype)->skip(0)->take(50)->orderBy('order_city','asc')->get();
			$city = $info->city;
			$pycity = Config::get('city.'.$city,'beijing');
			$title = $info->name.'客片大全';
			return View::make('front.clientpiclist')->with('dbtenants',$dbtenants)->with('title',$title)->with('pycity',$pycity)->with('city',$city)->with('info',$info)->with('tenantsId',$id)->with('recommpics',$recommpics);
		});
		
		Route::get('votelist/{id}',function($id){
			$tenantinfo = Yfctenants::where('id',$id)->first();
			$city = $tenantinfo->city;
			$shoptype = $tenantinfo->shoptype;
			$pycity =  Config::get('city.'.$city,'beijing');
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
			$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->skip(0)->take(50)->orderBy('order_city','asc')->get();
			return View::make('front.indexvote')->with('pycity',$pycity)->with('city',$city)->with('id',$id)->with('tenantinfo',$tenantinfo)->with('dbtenants',$dbtenants)->with('comments',$comments)->with('goods',$goods)->with('averages',$averages)->with('bads',$bads)->with('haspics',$haspics)->with('hasdans',$hasdans)->with('allpages',$allpages);
		});
		Route::get('kpdetail/{id}', function($id)
		{
			$picinfo = Yfctenantspic::where('id',$id)->first();
			if(isset($picinfo->cover) && $picinfo->cover){
				$picinfo->cover = json_decode($picinfo->cover,true);
			}
			$tenantsId = $picinfo->tenantsId;
			$info = Yfctenants::where('id',$tenantsId)->first();
			$city = $info->city;
			$pycity = Config::get('city.'.$city,'beijing');
			$recommpics = Yfctenantspic::where('id','!=',$id)->where('tenantsId',$tenantsId)->orderBy('marknums','desc')->take(4)->get();
			foreach($recommpics as $key=>$v){
				$v->firstcover = json_decode($v->firstcover,true);
				$recommpics[$key] = $v;
				$v->picStyle = json_decode($v->picStyle,true);
			}
			$shoptype = $info->shoptype;
			$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->skip(0)->take(50)->orderBy('order_city','asc')->get();
			$title = $picinfo->picName.' _'.$info->name.'-有榜';
			$desc = '有榜提供'.$info->name.'的'.$picinfo->picName.'客片欣赏！';
			$keyword = $picinfo->picName;
			$picinfo->picStyle = json_decode($picinfo->picStyle,true);
			return View::make('front.clientpicdetail')->with('dbtenants',$dbtenants)->with('title',$title)->with('desc',$desc)->with('keyword',$keyword)->with('pycity',$pycity)->with('city',$city)->with('picinfo',$picinfo)->with('info',$info)->with('tenantsId',$tenantsId)->with('recommpics',$recommpics);
		});
		
		Route::get('{name}/{id}', function($name, $id){
			if($id!='sheying' && $id!="hunli"){
				$tenantinfo = Yfctenants::where('id',$id)->first();
				$city = $tenantinfo->city;
				$pycity = Config::get('city.'.$city,'beijing');
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
				$tenantpics = Yfctenantspic::where('tenantsId', $id)->skip(0)->take(4)->get();
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
				//$goods = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','>=',15)->count();
				//$averages = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','>=',0)->where('score','<',15)->count();
				//$bads = Yfctenantscommentdetail::where('tenantsId',$id)->where('score','<',0)->count();
				//$haspics = Yfctenantscommentdetail::where('tenantsId',$id)->where('photo','!=','')->count();
				//$hasdans = Yfctenantscommentdetail::where('tenantsId',$id)->where('documentary','!=','')->count();
				$searchs = Yfcdaysearch::take(30)->where('tenantsId',$id)->orderBy('id','desc')->get();
				$searchinfo =  Yfcdaysearch::where('tenantsId',$id)->orderBy('id','desc')->first();
				$ctime = time();
				$advinfo = '';
				if($tenantinfo->isVip==2){
					$advinfo = Yfcadv::where('type','2')->where('position','3')->where('tenantsId',$id)->where('endTime','>',$ctime)->first();
				}else{
					if($tenantinfo->shoptype == '婚纱摄影'){
						$advinfo = Yfcadv::where('type','1')->where('position','3')->where('city', 'like', '%'.$pycity.'%')->where('advtype','1')->where('endTime','>',$ctime)->first();
					}else{
						$advinfo = Yfcadv::where('type','1')->where('position','3')->where('city', 'like', '%'.$pycity.'%')->where('advtype','2')->where('endTime','>',$ctime)->first();
					}
				}
				$shoptype = $tenantinfo->shoptype;
				$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->skip(0)->take(50)->orderBy('order_city','asc')->get();
				$title = $tenantinfo->name.' _有榜'.$tenantinfo->shoptype.'行业榜单「第'.$tenantinfo->order_city.'名」';
				$desc = $tenantinfo->name.'在'.$tenantinfo->city.'地区婚纱摄影行业综合排名第{'.$tenantinfo->order_city.'}名，该商户在品牌榜单中排名第{'.$tenantinfo->order_city.'}名，好评榜单中排名第{'.$tenantinfo->order_city.'}名，希望能够帮助您了解到{'.$tenantinfo->name.'}怎么样的问题。';
				$keyword = $tenantinfo->name.', '.$tenantinfo->name.'怎么样, '.$tenantinfo->name.'行业第'.$tenantinfo->order_city.'名';
				return View::make('front.shop', array('tenantinfo' => $tenantinfo,'dbtenants'=>$dbtenants,'title'=>$title,'desc'=>$desc,'keyword'=>$keyword,'pycity' => $pycity,'tenantdatas'=>$tenantdatas,'tenantsets'=>$tenantsets,'advinfo'=>$advinfo,'countsets'=>$countsets,'tenantpics'=>$tenantpics,'countpics'=>$countpics,
						'setnums'=>$setnums,'picnums'=>$picnums,'searchinfo'=>$searchinfo,'comments'=>$comments,'counts'=>$counts,'allpages'=>$allpages,'city'=>$city,'searchs'=>$searchs ));
				
			}else{
				$page = Input::get('page','1');
				$city = Config::get('city.'.$name,'北京');
				$keyword = Input::get('keyword','');
				if($id=='sheying'){
					$shoptype = '婚纱摄影';
				}else{
					$shoptype = '婚礼策划';
				}
				$size = 20;
				$index = ($page-1)*20;
				$tenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','!=','2')->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->orderBy('order_city','asc')->get();
					
				$oneinfo = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','2')->where('name', 'like', '%'.$keyword.'%')->orderBy('order_city','asc')->first();
					
				$count = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->count();
				$allpages = ceil($count/20);
				http://ceshi.youbangkeyi.com/dd($tenants->toArray());
				$ctime = time();
				$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->skip(0)->take(50)->orderBy('order_city','asc')->get();
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
				$tenants2 = array();
				
				if(count($tenants)==20){
					$temp1 = $tenants->toArray();
					$index = $temp1[19]['order_city'];
					$tenants2 = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','!=','2')->where('name', 'like', '%'.$keyword.'%')->where('order_city','>',$index)->take(80)->orderBy('order_city','asc')->get();
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
				}
				
				$title = '「有榜'.$shoptype.'榜单」'.$city.$shoptype.'前十名_'.$city.$shoptype.'排名';
				$desc = '「有榜」依托'.$shoptype.'行业大数据，为您提供实时更新、用户打分的'.$city.$shoptype.'榜单（包含'.$city.$shoptype.'前十名），而且您也可以自由的定制'.$city.$shoptype.'排行榜。';
				$keyword = $city.$shoptype.'前十名,'.$city.$shoptype.'排行榜,'.$city.$shoptype.'排名 ';
				if($shoptype=="婚纱摄影"){
					$advinfo = Yfcadv::where('type','1')->where('position','1')->where('city', 'like', '%'.$name.'%')->where('advtype','1')->where('endTime','>',$ctime)->first();
				}else{
					$advinfo = Yfcadv::where('type','1')->where('position','1')->where('city', 'like', '%'.$name.'%')->where('advtype','2')->where('endTime','>',$ctime)->first();
				}
				
				if(isset($advinfo->id)){
					$advinfo = $advinfo->toArray();
				}else{
					$advinfo = array();
				}
				if($shoptype=="婚纱摄影"){
					return View::make('front.index')->with('tenants2',$tenants2)->with('title',$title)->with('desc',$desc)->with('keyword',$keyword)->with('tenants',$tenants)->with('oneinfo',$oneinfo)->with('allpages',$allpages)->with('city',$city)->with('pycity',$name)->with('dbtenants',$dbtenants)->with('advinfo',$advinfo)->with('type','1');
				}else{
					return View::make('front.cehua')->with('tenants2',$tenants2)->with('title',$title)->with('desc',$desc)->with('keyword',$keyword)->with('tenants',$tenants)->with('oneinfo',$oneinfo)->with('allpages',$allpages)->with('city',$city)->with('pycity',$name)->with('dbtenants',$dbtenants)->with('advinfo',$advinfo)->with('type','1');
				}
			}
		});
		
		Route::get('detail/{id}', function($id)
		{
			
		});
		
		
		
		Route::get('detail/{tid}/{id}', function($tid, $id)
		{
			$tenantsinfo = Yfctenants::where('id',$tid)->first();
			$tenantsId = $tid;
			$name = $tenantsinfo->name;
			$city = $tenantsinfo->city;
			$pycity = Config::get('city.'.$city,'beijing');
			$phone = $tenantsinfo->phone;
			$info = Yfctenantsset::where('id',$id)->first();
			$txname = $info->setName;
			$remmends = Yfctenantsset::where('id','!=',$id)->where('tenantsId',$tenantsId)->skip(0)->take(8)->get();
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
			$shoptype = $tenantsinfo->shoptype;
			$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->skip(0)->take(50)->orderBy('order_city','asc')->get();
			$title =  $txname.' _'.$name.'-有榜 ';
			$desc = '通过有榜预定'.$txname.'原价'.$info->price.'，现价只需'.$info->currentPrice.'，赶快预定，机会难得！';
			$keyword = $txname;
			return View::make('front.detailtaoxi')->with('dbtenants',$dbtenants)->with('title',$title)->with('desc',$desc)->with('keyword',$keyword)->with('pycity',$pycity)->with('tenantsId',$tenantsId)->with('city',$city)->with('tenantsinfo',$tenantsinfo)->with('txname',$txname)->with('phone',$phone)->with('name',$name)->with('info',$info)->with('remmends',$remmends);
		});
		
		
		
		Route::get('dianping/{tid}/{id}', function($tid, $id)
		{
			$info = Yfctenants::where('id',$tid)->first();
			$city = $info->city;
			$pycity = Config::get('city.'.$city,'beijing');
			$commentdetail = Yfctenantscommentdetail::where('id',$id)->first();
			$commentdetail->documentary = json_decode($commentdetail->documentary,true);
			$commentdetail->photo = json_decode($commentdetail->photo,true);
			$commentdetail->headimg = json_decode($commentdetail->headimg,true);
			$key = mb_substr($commentdetail->totailty,0,12,'utf-8');
			$title = $key.'_'.$info->name.'的评论-有榜';
			$desc = mb_substr($commentdetail->totailty,0,35,'utf-8');
			$shoptype = $info->shoptype;
			$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->skip(0)->take(50)->orderBy('order_city','asc')->get();
			return View::make('front.commentdetail')->with('city',$city)->with('pycity',$pycity)->with('title',$title)->with('desc',$desc)->with('commentdetail',$commentdetail)->with('info',$info)->with('dbtenants',$dbtenants);
		});
		
		Route::get('{name?}', function($name = null){
			//综合排名
			$page = Input::get('page','1');
			$city = Config::get('city.'.$name,'北京');
			$keyword = Input::get('keyword','');
			$shoptype = Input::get('shoptype','婚纱摄影');
			$size = 20;
			$index = ($page-1)*20;
			$tenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','!=','2')->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->orderBy('order_city','asc')->get();
			$tenants2 = array();
			
			if(count($tenants)==20){
				$temp1 = $tenants->toArray();
				$index = $temp1[19]['order_city'];
				$tenants2 = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','!=','2')->where('name', 'like', '%'.$keyword.'%')->where('order_city','>',$index)->take(80)->orderBy('order_city','asc')->get();
			}
			
			
			$oneinfo = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('spread','2')->where('name', 'like', '%'.$keyword.'%')->orderBy('order_city','asc')->first();
			$count = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->where('name', 'like', '%'.$keyword.'%')->skip($index)->take($size)->count();
			$allpages = ceil($count/20);
			http://ceshi.youbangkeyi.com/dd($tenants->toArray());
			$ctime = time();
			
			$dbtenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('shoptype',$shoptype)->skip(0)->take(50)->orderBy('order_city','asc')->get();
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
			}
			
			
			$title = '「有榜'.$shoptype.'榜单」'.$city.$shoptype.'前十名_'.$city.$shoptype.'排名';
			$desc = '「有榜」依托'.$shoptype.'行业大数据，为您提供实时更新、用户打分的'.$city.$shoptype.'榜单（包含'.$city.$shoptype.'前十名），而且您也可以自由的定制'.$city.$shoptype.'排行榜。';
			$keyword = $city.$shoptype.'前十名,'.$city.$shoptype.'排行榜,'.$city.$shoptype.'排名 ';
			if($shoptype=="婚纱摄影"){
				$advinfo = Yfcadv::where('type','1')->where('position','1')->where('advtype','1')->where('city', 'like', '%'.$city.'%')->where('endTime','>',$ctime)->first();
				if(isset($advinfo->id)){
					$advinfo = $advinfo->toArray();
				}else{
					$advinfo = array();
				}
				return View::make('front.index')->with('tenants2',$tenants2)->with('title',$title)->with('desc',$desc)->with('keyword',$keyword)->with('tenants',$tenants)->with('oneinfo',$oneinfo)->with('allpages',$allpages)->with('city',$city)->with('pycity',$name)->with('dbtenants',$dbtenants)->with('advinfo',$advinfo)->with('type','1');
			}else{
				$advinfo = Yfcadv::where('type','1')->where('position','1')->where('advtype','2')->where('city', 'like', '%'.$city.'%')->where('endTime','>',$ctime)->first();
				if(isset($advinfo->id)){
					$advinfo = $advinfo->toArray();
				}else{
					$advinfo = array();
				}
				return View::make('front.cehua')->with('tenants2',$tenants2)->with('title',$title)->with('desc',$desc)->with('keyword',$keyword)->with('tenants',$tenants)->with('oneinfo',$oneinfo)->with('allpages',$allpages)->with('city',$city)->with('pycity',$name)->with('dbtenants',$dbtenants)->with('advinfo',$advinfo)->with('type','1');
			}
		});
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		