<?php
use Illuminate\Support\Facades\Redirect;
class ShopController extends BaseController{
	//全局客片列表
	public function getGlobalclientlist($id){
		$clientpics = Yfctenantspic::where('tenantsId',$id)->orderBy('id','desc')->paginate(15);
		return View::make('admin.globalpiclist')->with('clientpics',$clientpics)->with('name','客片列表')->with('id',$id);
	}
	//增加全局客片
	public function getAddglobalclientpic($id){
		$tenantsId = Input::get('tenantsId','');//商户id
		if(!$tenantsId){
			$tenantsId = $id;
		}
		$styles = Yfcstyle::where('tenantsId',$tenantsId)->get();
		return View::make('admin.addglobalclientpic')->with('name','添加客片')->with('tenantsId',$tenantsId)->with('id',$id)->with('styles',$styles);
	}
	//编辑全局客片
	public function getEditglobalclientpic($id){
		$tenantsId = Input::get('tenantsId');
		$styles = Yfcstyle::where('tenantsId',$tenantsId)->get();
		$info = Yfctenantspic::where('id',$id)->first();
		if(isset($info->cover)){
			$info->cover = json_decode($info->cover,true);
		}
		if(isset($info->firstcover)){
			$info->firstcover = json_decode($info->firstcover,true);
		}
		if(isset($info->picStyle)){
			$info->picStyle = json_decode($info->picStyle,true);
		}
		return View::make('admin.addglobalclientpic')->with('tenantsId',$tenantsId)->with('styles',$styles)->with('name','编辑客片')->with('info',$info);
	}
	//删除客片
	public function getDelglobalclientpic($id){
		$tenantsId = Input::get('tenantsId');
		$url = url('shop/globalclientlist/').'/'.$tenantsId;
		$res = Yfctenantspic::where('id',$id)->delete();
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
	//保存全局客片数量
	public function postSaveglobalclientpic(){
		$data = array();
		$id = Input::get('id');
		$tenantsId = Input::get('tenantsId');
		$picName = Input::get('picName');
		$created_at = time();
		$cover=Input::get('cover');
		$firstcover = Input::get('firstcover');
		$explain = Input::get('explain');
		$picStyle = Input::get('picStyle');
		$marknums = Input::get('marknums');
		$source = Input::get('source');
		
		if($firstcover){
			$data['firstcover'] = json_encode($firstcover);
		}
		if($explain){
			$data['explain'] = $explain;
		}
		if($marknums){
			$data['marknums'] = $marknums;
		}
		if($source){
			$data['source'] = $source;
		}
		if(count($picStyle)){
			$data['picStyle'] = json_encode($picStyle);
		}
		if($created_at){
			$data['created_at'] = $created_at;
		}
		if($cover){
			$data['cover'] = json_encode($cover);
		}
		if($picName){
			$data['picName'] = $picName;
		}
		if($tenantsId){
			$data['tenantsId'] = $tenantsId;
		}
		if($id){
			$res = Yfctenantspic::where('id',$id)->update($data);
			$message = "更新成功";
		}else{
			$res = Yfctenantspic::insert($data);
			$message = "编辑成功";
		}
		
		$url = url('shop/globalclientlist/').'/'.$tenantsId;
		if($res){
			echo "<script type='text/javascript'>
			alert('$message');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('$message');
			window.location.href='$url';
			</script>";
		}
	}
	//客片详情
	public function getDetailglobalclientpic($id){
		$tenantspicinfo = Yfctenantspic::where('id',$id)->first();
		if(isset($tenantspicinfo->cover) && $tenantspicinfo->cover){
			$tenantspicinfo->cover = json_decode($tenantspicinfo->cover,true);
		}
		
		return View::make('admin.detailglobalclientpic')->with('tenantspicinfo',$tenantspicinfo)->with('name','客片详情');
	}
	//商户详情
	public function getDetail($id){
		$info = Yfctenants::where('id',$id)->first();
		
	}
	//商户列表
	public function getList(){
		$tenants = Yfctenants::orderBy('id','desc')->paginate(15);
		return View::make('admin.tenantslist',array('tenants'=>$tenants,'name'=>'店铺列表'));
	}
	//删除商户
	public function getDelete($id){
		$res = Yfctenants::where('id',$id)->delete();
		$url = url('shop/list');
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
	//商户搜索入口
	public function getSearch(){
		return View::make('admin.shopsearch')->with('name','搜索商户');
	}
	//商户搜索
	public function getSearchresult(){
		$city = Input::get('city');
		$name = Input::get('name');
		$tenants = Yfctenants::where('city', 'like', '%'.$city.'%')->where('name', 'like', '%'.$name.'%')->orderBy('id','desc')->paginate(15);
		return View::make('admin.tenantslist',array('tenants'=>$tenants,'name'=>'店铺搜查结果列表'));
	}
	
	
	//编辑商户
	public function getEdit($id){
		$tenantsinfo = Yfctenants::where('id',$id)->first();
		return View::make('admin.editshop')->with('info',$tenantsinfo)->with('name','编辑商户信息');
	}
	//增加商户
	public function getAddshop(){
		return View::make('admin.editshop')->with('name','增加商户');
	}
   //编辑商户
	public function getAdd(){
		return View::make('admin.addbrand');
	}
	
	//保存商户
	public function postSave(){
		$data = array();
		$id = Input::get('id','');
		$isVip = Input::get('isVip','');
		if($isVip==2){
			$pcadv = Input::get('pcadv','');
			$modeladv = Input::get('modeladv','');
			$pcadvurl = Input::get('pcadvurl','');
			$modeladvurl = Input::get('modeladvurl','');
		}else{
			$pcadv = '';
			$modeladv = '';
			$pcadvurl = '';
			$modeladvurl = '';
		}
		$city = Input::get('city');
		$service_note = Input::get('service_note');
		$shopname = Input::get('name','');
		$abstract = Input::get('abstract','');
		$brand_search_order = Input::get('brand_search_order','');
		$praise_num = Input::get('praise_num','');
		$bad_num = Input::get('bad_num','');
		$is_up = Input::get('is_up','');
		$is_up_num = Input::get('is_up_num','');
		$order_country = Input::get('order_country','');
		$order_city = Input::get('order_city','');
		$price_order = Input::get('price_order','');
		$praise_order = Input::get('praise_order','');
		$person_price = Input::get('person_price','');
		$startTime = Input::get('startTime');
		$endTime = Input::get('endTime');
		$phone = Input::get('phone','');
		$address = Input::get('address','');
		$day_add_taoxi_nums = Input::get('day_add_taoxi_nums');
		$day_add_taoxi_marks = Input::get('day_add_taoxi_marks');
		$day_add_client_nums = Input::get('day_add_client_nums');
		$day_add_case = Input::get('day_add_case');
		$day_add_case_marks = Input::get('day_add_case_marks');
		$baidu_search_nums = Input::get('baidu_search_nums');
		$san_search_nums = Input::get('san_search_nums');
		$sougou_search_nums = Input::get('sougou_search_nums');
		$baidu_flag_nums = Input::get('baidu_flag_nums');
		$san_flag_nums = Input::get('san_flag_nums');
		$sougou_flag_nums = Input::get('sougou_flag_nums');
		$positionCity = Input::get('positionCity','');
		$shoptype = Input::get('shoptype','');
		if($positionCity){
			$data['city'] = $positionCity;
		}
		if($city){
			$data['positionCity'] = $city;
		}
		if($day_add_taoxi_nums){
			$data['day_add_taoxi_nums'] = $day_add_taoxi_nums;
		}
		if($day_add_taoxi_marks){
			$data['day_add_taoxi_marks'] = $day_add_taoxi_marks;
		}
		if($day_add_client_nums){
			$data['day_add_client_nums'] = $day_add_client_nums;
		}
		if($day_add_case){
			$data['day_add_case'] = $day_add_case;
		}
		if($day_add_case_marks){
			$data['day_add_case_marks'] = $day_add_case_marks;
		}
		if($baidu_search_nums){
			$data['baidu_search_nums'] = $baidu_search_nums;
		}
		if($san_search_nums){
			$data['san_search_nums'] = $san_search_nums;
		}
		if($sougou_search_nums){
			$data['sougou_search_nums'] = $sougou_search_nums;
		}
		$logo='';
		if(Input::hasFile('logo')){
			$filename="/uploads/logo/";
			$destinationPath=public_path().$filename;
			$realname = $_FILES['logo']['name'];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			Input::file('logo')->move($destinationPath, $name);
			$logo = 'uploads/logo'.'/'.$name;
			$data['logo'] = $logo;
		}
		
		$cover='';
		if(Input::hasFile('cover')){
			$filename="/uploads/cover/";
			$destinationPath=public_path().$filename;
			$realname = $_FILES['cover']['name'];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			Input::file('cover')->move($destinationPath, $name);
			$cover = 'uploads/cover'.'/'.$name;
			$data['cover'] = $cover;
		}
		if($shopname){
			$data['name'] = $shopname;
		}
		if($abstract){
			$data['abstract'] = $abstract;
		}
		if($brand_search_order){
			$data['brand_search_order'] = $brand_search_order;
		}
		if($praise_num){
			$data['praise_num'] = $praise_num;
		}
		if($bad_num){
			$data['bad_num'] = $bad_num;
		}
		if($is_up){
			$data['is_up'] = $is_up;
		}
		if($is_up_num){
			$data['is_up_num'] = $is_up_num;
		}
		if($order_country){
			$data['order_country'] = $order_country;
		}
		if($order_city){
			$data['order_city'] = $order_city;
		}
		if($price_order){
			$data['price_order'] = $price_order;
		}
		if($praise_order){
			$data['praise_order'] = $praise_order;
		}
		if($person_price){
			$data['person_price'] = $person_price;
		}
		if($logo){
			$data['logo'] = $logo;
		}
		if($cover){
			$data['cover'] = $cover;
		}
		if($isVip){
			$data['isVip'] = $isVip;
		}
		if($startTime){
			$data['startTime'] = strtotime($startTime);
		}
		if($endTime){
			$data['endTime'] = strtotime($endTime);
		}
		if($phone){
			$data['phone'] = $phone;
		}
		if($address){
			$data['address'] = $address;
		}
		if($service_note){
			$data['service_note'] = $service_note;
		}
		$baidu_flag_nums = Input::get('baidu_flag_nums');
		$san_flag_nums = Input::get('san_flag_nums');
		$sougou_flag_nums = Input::get('sougou_flag_nums');
		if($baidu_flag_nums){
			$data['baidu_flag_nums'] = $baidu_flag_nums;
		}
		if($san_flag_nums){
			$data['san_flag_nums'] = $san_flag_nums;
		}
		if($sougou_flag_nums){
			$data['sougou_flag_nums'] = $sougou_flag_nums;
		}
		$data['shoptype'] = $shoptype;
		$data['pcadv'] = $pcadv;
		$data['modeladv'] = $modeladv;
		$data['pcadvurl'] = $pcadvurl;
		$data['modeladvurl'] = $modeladvurl;
		$data['created_at'] = time();
		$data['updated_at'] = time();
		$url = url('shop/list');
		if($id){
			$res = Yfctenants::where('id',$id)->update($data);
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
			
		}else{
			$res = Yfctenants::insert($data);
			if($res){
				echo "<script type='text/javascript'>
				alert('添加商户成功');
				window.location.href='$url';
				</script>";
			}else{
			echo "<script type='text/javascript'>
			alert('添加商户失败');
			window.location.href='$url';
			</script>";
				}
		}
	}
	//风格列表
	public function getStyle($id){
		$styles = Yfcstyle::where('tenantsId',$id)->paginate(15);
		return View::make('admin.stylelist')->with('styles',$styles)->with('id',$id)->with('name','风格列表');
	}
	//添加风格
	public function getAddstyle($id){
		return View::make('admin.addstyle')->with('id',$id)->with('name','添加风格');
	}
	//保存风格
	public function postSavestyle(){
		$id = Input::get('id','');
		if(!$id){
			return Redirect::back();
		}
		$name = Input::get('name');
		$data = array();
		$data['name'] = $name;
		$data['tenantsId'] = $id;
		$res = Yfcstyle::insert($data);
		$url = url('shop/style').'/'.$id;
		if($res){
			echo "<script type='text/javascript'>
			alert('添加成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('添加失败');
			window.location.href='$url';
			</script>";
		}
	}
	//删除风格
	public function getDelstyle($id){
		$tenantsId = Input::get('tenantsId');
		$res = Yfcstyle::where('id',$id)->delete();
		$url = url('shop/style').'/'.$tenantsId;
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
	//客片列表
	public function getClientpiclist($id){
		//$id套系id
		$tenantsId = Input::get('tenantsId');//商户id
		$clientpics = Yfctenantspic::where('tenantsId',$tenantsId)->where('setId',$id)->paginate(15);
		return View::make('admin.piclist')->with('id',$id)->with('tenantsId',$tenantsId)->with('clientpics',$clientpics)->with('name','客片列表');
	}
	//添加客片
	public function getAddclientpic($id){
		//$id套系id
		$tenantsId = Input::get('tenantsId');//商户id
		$styles = Yfcstyle::where('tenantsId',$tenantsId)->get();
		return View::make('admin.addclientpic')->with('taoxiId',$id)->with('tenantsId',$tenantsId)->with('styles',$styles)->with('name','添加客片');
	}
	//编辑客片
	public function getEditclientpic($id){
		$tenantsId = Input::get('tenantsId');
		$taoxiId = Input::get('taoxiId');
		$styles = Yfcstyle::where('tenantsId',$tenantsId)->get();
		$info = Yfctenantspic::where('id',$id)->first();
		if(isset($info->cover)){
			$info->cover = json_decode($info->cover,true);
		}
		if(isset($info->firstcover)){
			$info->firstcover = json_decode($info->firstcover,true);
		}
		if(isset($info->picStyle)){
			$info->picStyle = json_decode($info->picStyle,true);
		}
		return View::make('admin.addclientpic')->with('taoxiId',$taoxiId)->with('tenantsId',$tenantsId)->with('styles',$styles)->with('name','编辑客片')->with('info',$info);
	}
	//保存客片
	public function postSaveclientpic(){
		$data = array();
		$tenantsId = Input::get('tenantsId');//商户id
		$taoxiId = Input::get('taoxiId');//套系id
		$picName = Input::get('picName');
		$id = Input::get('id');
		if(!$tenantsId || !$taoxiId){
			return Redirect::back();
		}
		$created_at = time();
		$cover=Input::get('cover');
		$firstcover = Input::get('firstcover');
		$explain = Input::get('explain');
		$picStyle = Input::get('picStyle');
		$marknums = Input::get('marknums');
		$source = Input::get('source');
		
		if($firstcover){
			$data['firstcover'] = json_encode($firstcover);
		}
		if($explain){
			$data['explain'] = $explain;
		}
		if($marknums){
			$data['marknums'] = $marknums;
		}
		if($source){
			$data['source'] = $source;
		}
		if($picStyle){
			$data['picStyle'] = json_encode($picStyle);
		}
		if($tenantsId){
			$data['tenantsId'] = $tenantsId;
		}
		if($taoxiId){
			$data['setId'] = $taoxiId;
		}
		if($created_at){
			$data['created_at'] = $created_at;
		}
		if($cover){
			$data['cover'] = json_encode($cover);
		}
		if($picName){
			$data['picName'] = $picName;
		}
		if($id){
			$res = Yfctenantspic::where('id',$id)->update($data);
			$message = "更新成功";
		}else{
			$res = Yfctenantspic::insert($data);
			$message = "编辑成功";
		}
		
		$url = url('shop/clientpiclist/').'/'.$taoxiId.'?tenantsId='.$tenantsId;
		if($res){
			echo "<script type='text/javascript'>
			alert('$message');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('$message');
			window.location.href='$url';
			</script>";
		}
	}
	//删除客片
	public function getDelclientpic($id){
		$tenantsId = Input::get('tenantsId');//商户id
		$taoxiId = Input::get('taoxiId');//套系id
		$url = url('shop/clientpiclist/').'/'.$taoxiId.'?tenantsId='.$tenantsId;
		$res = Yfctenantspic::where('id',$id)->delete();
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
	//客片详情
	public function getDetailclientpic($id){
		$tenantspicinfo = Yfctenantspic::where('id',$id)->first();
		if(isset($tenantspicinfo->cover) && $tenantspicinfo->cover){
			$tenantspicinfo->cover = json_decode($tenantspicinfo->cover,true);
		}
		return View::make('admin.detailclientpic')->with('tenantspicinfo',$tenantspicinfo)->with('name','客片详情');
	}
	//套系列表
	public function getTaoxilist($id){
		$taoxis = Yfctenantsset::where('tenantsId',$id)->orderBy('id','desc')->paginate(15);
		return View::make('admin.taoxi')->with('id',$id)->with('taoxis',$taoxis)->with('name','套系列表');
	}
	//添加套系
	public function getAddtaoxi($id){
		$styles = Yfcstyle::where('tenantsId',$id)->get();
		return View::make('admin.addtaoxi')->with('id',$id)->with('name','添加套系')->with('styles',$styles);
	}
	//编辑套系
	public function getTaoxiedit($id){
		$info = Yfctenantsset::where('id',$id)->first();
		if(isset($info->cover) && $info->cover){
			$info->cover = json_decode($info->cover,true);
		}
		if(isset($info->picDetail) && $info->picDetail){
			$info->picDetail = json_decode($info->picDetail,true);
		}
		if(isset($info->kind) && $info->kind){
			$info->kind = json_decode($info->kind,true);
		}
		$tenantsId = Input::get('tenantsId');
		$styles = Yfcstyle::where('tenantsId',$tenantsId)->get();
		return View::make('admin.addtaoxi')->with('id',$tenantsId)->with('name','编辑套系')->with('styles',$styles)->with('info',$info);
	}
	//保存套系
	public function postSavetaoxi(){
		$data = array();
		$tenantsId = Input::get('tenantsId');
		$id = Input::get('id','');
		if(!$tenantsId){
			return Redirect::back();
		}else{
			$data['tenantsId'] = $tenantsId;
		}
		$setName = Input::get('setName','');
		$price = Input::get('price','');
		$currentPrice = Input::get('currentPrice','');
		$detail = Input::get('detail','');
		$kind = Input::get('kind','');
		$taoxiexplain = Input::get('taoxiexplain','');
		$recommend = Input::get('recommend','');
		$source = Input::get('source','');
		$marknums = Input::get('marknums','');
		$cover=Input::get('cover');
		$picDetail=Input::get('picDetail');
		if($cover && count($cover)){
			$cover = json_encode($cover);
			$data['cover'] = $cover;
		}
		if($picDetail && count($picDetail)){
			$data['picDetail'] = json_encode($picDetail);
		}
		if($taoxiexplain){
			$data['taoxiexplain'] = $taoxiexplain;
		}
		if($recommend){
			$data['recommend'] = $recommend;
		}
		if($source){
			$data['source'] = $source;
		}
		if($marknums){
			$data['marknums'] = $marknums;
		}
		if($setName){
			$data['setName'] = $setName;
		}
		if($price){
			$data['price'] = $price;
		}
		if($currentPrice){
			$data['currentPrice'] = $currentPrice;
		}
		if($detail){
			$data['item'] = $detail;
		}
		if($kind && count($kind)){
			$data['kind'] = json_encode($kind);
		}
		if($detail){
			$data['detail'] = $detail;
		}
		if($id){
			$message = "编辑套系成功";
			$res = Yfctenantsset::where('id',$id)->update($data);
		}else{
			$message = "添加套系成功";
			$res = Yfctenantsset::insert($data);
		}
		
		$url = url('shop/taoxilist').'/'.$tenantsId;
		if($res){
			echo "<script type='text/javascript'>
			alert('$message');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('$message');
			window.location.href='$url';
			</script>";
		}
	}
	//套系详细
	public function getTaoxidetail($id){
		$info = Yfctenantsset::where('id',$id)->first();
		if(isset($info->picDetail) && $info->picDetail){
			$info->picDetail = json_decode($info->picDetail,true);
		}
		if(isset($info->cover) && $info->cover){
			$info->cover = json_decode($info->cover,true);
		}
		return View::make('admin.taoxidetail')->with('info',$info)->with('name','套系详情');
	}
	//套系删除
	public function getTaoxidel($id){
		$tenantsId = Input::get('tenantsId');
		$res = Yfctenantsset::where('id',$id)->delete();
		$url = url('shop/taoxilist').'/'.$tenantsId;
		if($res){
			echo "<script type='text/javascript'>
			alert('删除套系成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('删除套系失败');
			window.location.href='$url';
			</script>";
			}
	}
	//添加服务说明
	public function getExplain($id){
		$info = Yfctenants::where('id',$id)->first();
		return View::make('admin.addnote')->with('id',$id)->with('name','商户服务说明')->with('info',$info);
	}
	//保存服务说明
	public function postSavenote(){
		$data = array();
		$id = Input::get('tenantsId');
		if(!$id){
			return Redirect::back();
		}
		$service_note = Input::get('service_note');
		$data['service_note'] = $service_note;
		$res = Yfctenants::where('id',$id)->update($data);
		$url = url('shop/list');
		if($res){
			echo "<script type='text/javascript'>
			alert('添加服务说明成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('添加服务说明失败');
			window.location.href='$url';
			</script>";
		}
	}
	//增加店铺的推广
	public function getSpread($id){
		$info = Yfctenants::where('id',$id)->first();
		return View::make('admin.addspread')->with('id',$id)->with('name','设置推广商户')->with('info',$info);
	}
	//保存店铺的推广
	public function postSavespread(){
		$data = array();
		$id = Input::get('tenantsId');
		if(!$id){
			return Redirect::back();
		}
		$spread = Input::get('spread','');
		$startSpreadTime = Input::get('startSpreadTime','');
		$endSpreadTime = Input::get('endSpreadTime','');
		if($spread){
			$data['spread'] = $spread;
		}
		if($startSpreadTime){
			$data['startSpreadTime'] = strtotime($startSpreadTime);
		}
		if($endSpreadTime){
			$data['endSpreadTime'] = strtotime($endSpreadTime);
		}
		$res = Yfctenants::where('id',$id)->update($data);
		$url = url('shop/list');
		if($res){
			echo "<script type='text/javascript'>
			alert('设置推广商户成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('设置推广商户失败');
			window.location.href='$url';
			</script>";
		}
	}
	//广告列表
	public function getAdvlist($id){
		$advs = Yfcadv::where('tenantsId',$id)->where('type','2')->paginate(15);
		return View::make('admin.advlist')->with('advs',$advs)->with('id',$id)->with('name','广告位列表');
	}
	//添加广告位
	public function getAddadv($id){
		return View::make('admin.addadv')->with('id',$id)->with('name','添加广告位');
	}
	//保存商户的广告
	public function postSaveadv(){
		$data = array();
		$id = Input::get('id');
		$advid = Input::get('advid','');
		if(!$id){
			return Redirect::back();
		}else{
			$data['tenantsId'] = $id;
		}
		$content = Input::get('content');
		$startTime = Input::get('startTime');
		$endTime = Input::get('endTime');
		$position = Input::get('position');
		$flag = Input::get('flag','');
		if($content){
			$data['content'] = $content;
		}
		if($startTime){
			$data['startTime'] = strtotime($startTime);
		}
		if($endTime){
			$data['endTime'] = strtotime($endTime);
		}
		if($position){
			$data['position'] = $position;
		}
		if($flag){
			$data['flag'] = $flag;
		}
		$data['type'] = 2;
		if($advid){
			$res = Yfcadv::where('id',$advid)->update($data);
			if($res){
				$message = "商户广告编辑成功";
			}else{
				$message = "商户广告编辑失败";
			}
		}else{
			$res = Yfcadv::insert($data);
			if($res){
				$message = "商户广告添加成功";
			}else{
				$message = "商户广告添加失败";
			}
		}
		$url = url('shop/advlist').'/'.$id;		
		if($res){
			echo "<script type='text/javascript'>
			alert('$message');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('$message');
			window.location.href='$url';
			</script>";
			}
	}
	//编辑商户的广告
	public function getEditadv($id){
		$tenantsId = Input::get('tenantsId');
		$info = Yfcadv::where('id',$id)->first();
		return View::make('admin.addadv')->with('id',$tenantsId)->with('name','编辑广告位')->with('info',$info);
	}
	//删除商户的广告
	public function getDeladv($id){
		$tenantsId = Input::get('tenantsId');
		$res = Yfcadv::where('id',$id)->delete();
		$url = url('shop/advlist').'/'.$tenantsId;
		if($res){
			echo "<script type='text/javascript'>
			alert('删除商户广告成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('删除商户广告失败');
			window.location.href='$url';
			</script>";
			}
	}
	//删除商户的广告
	public function getGlobaldeladv($id){
		$tenantsId = Input::get('tenantsId');
		$res = Yfcadv::where('id',$id)->delete();
		$url = url('shop/globeladvlist').'/'.$tenantsId;
		if($res){
			echo "<script type='text/javascript'>
			alert('删除商户广告成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('删除商户广告失败');
			window.location.href='$url';
			</script>";
			}
	}
	//全局广告列表
	public function getGlobeladvlist(){
		$advs = Yfcadv::where('type','1')->orderBy('id','desc')->paginate(15);
		return View::make('admin.globeladvlist')->with('advs',$advs)->with('name','全局广告位列表');
	}
	//添加全局广告
	public function getGlobeladdadv(){
		return View::make('admin.globeladdadv')->with('name','添加全局广告');
	}
	//编辑全局广告
	public function getGlobeleditadv($id){
		$info = Yfcadv::where('type','1')->where('id',$id)->first();
		return View::make('admin.globeladdadv')->with('name','编辑全局广告')->with('info',$info);
	}
	//保存全局广告
	public function postGlobelsaveadv(){
		$data = array();
		$advid = Input::get('advid','');
		$content = Input::get('content');
		$startTime = Input::get('startTime');
		$endTime = Input::get('endTime');
		$position = Input::get('position');
		$flag = Input::get('flag','');
		$city = Input::get('city','');
		$advtype = Input::get('advtype');
		if($content){
			$data['content'] = $content;
		}
		if($startTime){
			$data['startTime'] = strtotime($startTime);
		}
		if($endTime){
			$data['endTime'] = strtotime($endTime);
		}
		if($position){
			$data['position'] = $position;
		}
		if($flag){
			$data['flag'] = $flag;
		}
		if($city){
			$data['city'] = $city;
		}
		if($advtype){
			$data['advtype'] = $advtype;
		}
		$data['type'] = 1;
		if($advid){
			$res = Yfcadv::where('id',$advid)->update($data);
			if($res){
				$message = "全局广告编辑成功";
			}else{
				$message = "全局广告编辑失败";
			}
		}else{
			$res = Yfcadv::insert($data);
			if($res){
				$message = "全局广告添加成功";
			}else{
				$message = "全局广告添加失败";
			}
		}
		$url = url('shop/globeladvlist');
		if($res){
			echo "<script type='text/javascript'>
			alert('$message');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('$message');
			window.location.href='$url';
			</script>";
			}
	}
}


























