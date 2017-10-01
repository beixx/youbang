<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET, POST, OPTIONS, DELETE");
header("Access-Control-Allow-Headers:DNT,X-Mx-ReqToken,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type, Accept-Language, Origin, Accept-Encoding");
class ModelController extends BaseController{
	//品牌列表
	public function getList(){
		$models = Modelt::paginate(15);
		return View::make('admin.modellist',array('models'=>$models));
	}
	
	//编辑品牌
	public function getEdit($id){
		$modelinfo = Modelt::where('id',$id)->first();
		return View::make('admin.addmodel')->with('modelinfo',$modelinfo);
	}
   //编辑品牌
	public function getAdd(){
		return View::make('admin.addmodel');
	}
	//品牌活动保存
	public function postSave(){
		$data = array();
		$id = Input::get('id','');
		$name = Input::get('name','');
		$data['name'] = $name;
		$flag = Input::get('flag','1');
		$data['flag'] = $flag;
		$contact = Input::get('contact','');
		$data['contact'] = $contact;
		$type = Input::get('type','');
		$data['type'] = $type;
		$sex = Input::get('sex','');
		$data['sex'] = $sex;
		$height = Input::get('height','');
		$data['height'] = $height;
		$weight = Input::get('weight','');
		$data['weight'] = $weight;
		$measurements = Input::get('measurements','');
		$data['measurements'] = $measurements;
		$profession = Input::get('profession','');
		$data['profession'] = $profession;
		$praiseNums = Input::get('praiseNums','');
		$data['praiseNums'] = $praiseNums;
		$province = Input::get('province','');
		if($province){
			$data['province'] = $province;
		}
		$city = Input::get('city','');
		if($city){
			$data['city'] = $city;
		}
		$age = Input::get('age','20');
		$data['age'] = $age;
		$box1 = Input::get('box1','');
		$box2 = Input::get('box2','');
		$box3 = Input::get('box3','');
		$box4 = Input::get('box4','');
		$box5 = Input::get('box5','');
		$box6 = Input::get('box6','');
		$box7 = Input::get('box7','');
		$box8 = Input::get('box8','');
		$box9 = Input::get('box9','');
		$box10 = Input::get('box10','');
		$worktype = '';
		if($box1){
			$worktype = $worktype.','.$box1;
		}
		if($box2){
			$worktype = $worktype.','.$box2;
		}
		if($box3){
			$worktype = $worktype.','.$box3;
		}
		if($box4){
			$worktype = $worktype.','.$box4;
		}
		if($box5){
			$worktype = $worktype.','.$box5;
		}
		if($box6){
			$worktype = $worktype.','.$box6;
		}
		if($box7){
			$worktype = $worktype.','.$box7;
		}
		if($box8){
			$worktype = $worktype.','.$box8;
		}
		if($box9){
			$worktype = $worktype.','.$box9;
		}
		if($box10){
			$worktype = $worktype.','.$box10;
		}
		if($worktype){
			$data['worktype'] = $worktype;
		}
		$hair = Input::get('hair');
		if($hair){
			$data['hair'] = $hair;
		}
		$shoulder = Input::get('shoulder');
		if($shoulder){
			$data['shoulder'] = $shoulder;
		}
		$shoeSize = Input::get('shoeSize');
		if($shoeSize){
			$data['shoeSize'] = $shoeSize;
		}
		$signContract = Input::get('signContract');
		if($signContract){
			$data['signContract'] = $signContract;
		}
		$shootingScale = Input::get('shootingScale');
		if($shootingScale){
			$data['shootingScale'] = $shootingScale;
		}
		$dqtime = Input::get('dqtime');
		if($dqtime){
			$data['dqtime'] = json_encode($dqtime);
		}
		$chargeday = Input::get('chargeday');
		if($chargeday){
			$data['chargeday'] = $chargeday;
		}
		
		$chargechang = Input::get('chargechang');
		if($chargechang){
			$data['chargechang'] = $chargechang;
		}
		
		$chargehour = Input::get('chargehour');
		if($chargehour){
			$data['chargehour'] = $chargehour;
		}
		
		$chargejian = Input::get('chargejian');
		if($chargejian){
			$data['chargejian'] = $chargejian;
		}
		
		$wechat = Input::get('wechat');
		if($wechat){
			$data['wechat'] = $wechat;
		}
		
		$experience = Input::get('experience','');
		if($experience){
			$data['experience'] = $experience;
		}
		$videopic='';
		if(Input::hasFile('videopic')){
			$filename="/uploads/model/";
			$destinationPath=public_path().$filename;
			$realname = $_FILES['videopic']['name'];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			Input::file('videopic')->move($destinationPath, $name);
			$videopic = 'uploads/model'.'/'.$name;
			$data['videopic'] = asset($videopic);
		}
		
		$videourl='';
		if(Input::hasFile('videourl')){
			$filename="/uploads/model/";
			$destinationPath=public_path().$filename;
			$realname = $_FILES['videourl']['name'];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			Input::file('videourl')->move($destinationPath, $name);
			$videourl = 'uploads/model'.'/'.$name;
			$data['videourl'] = asset($videourl);
		}
		
		$url = url('model/list');
		$firstphoto='';
		if(Input::hasFile('firstphoto')){
			$filename="/uploads/model/";
			$destinationPath=public_path().$filename;
			$realname = $_FILES['firstphoto']['name'];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			Input::file('firstphoto')->move($destinationPath, $name);
			$firstphoto = 'uploads/model'.'/'.$name;
			$data['firstphoto'] = asset($firstphoto);
		}
		$photo=array();
		if(count(Input::hasFile('photo'))){
			foreach(Input::file('photo') as $key=>$v){
				if(isset($_FILES['photo']['name'][$key]) && $_FILES['photo']['name'][$key]){
					$filename="/uploads/model/";
					$destinationPath=public_path().$filename;
					$realname = $_FILES['photo']['name'][$key];
					$type = pathinfo($realname, PATHINFO_EXTENSION);
					$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
					$v->move($destinationPath, $name);
					$pic = 'uploads/model'.'/'.$name;
					$photo[] = asset($pic);
				}
			}	
		}
		if(count($photo)){
			$data['photo'] = json_encode($photo);
		}
		if($id){
			$res = Modelt::where('id',$id)->update($data);
			if($res){
				echo "<script type='text/javascript'>
				alert('模特编辑成功');
				window.location.href='$url';
				</script>";
			}else{
				echo "<script type='text/javascript'>
				alert('模特编辑失败');
				window.location.href='$url';
				</script>";
			}
			
		}else{
			$res = Modelt::insert($data);
			if($res){
				echo "<script type='text/javascript'>
				alert('模特添加成功');
				window.location.href='$url';
				</script>";
			}else{
				echo "<script type='text/javascript'>
				alert('模特添加失败');
				window.location.href='$url';
				</script>";
			}
		}	
	}
	//品牌删除
	public function getDelete($id){
		$url = url('model/list');
		$affectedRows = Modelt::where('id',$id)->delete();
		if($affectedRows){
			echo "<script type='text/javascript'>
			alert('删除模特成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('删除模特失败');
			window.location.href='$url';
			</script>";
		}
	}
	
	//获取model的列表
	public function getModellist(){
		$res = array();
		$type = Input::get('type','');
		$province = Input::get('province','');
		$city = Input::get('city','');
		$worktype = Input::get('worktype',array());
		$models = Modelt::select('id','name','firstphoto','praiseNums','type','contact');
		$page = Input::get('page','1');
		$maxage = Input::get('maxage','100');
		$minage = Input::get('minage','0');
		$pagesize = 6;
		$index = $pagesize*($page-1);
		$models = $models->where('age','>=',$minage);
		$models = $models->where('age','<=',$maxage);
		if($type){
			$models = $models->where('type',$type);
		}
		if($province){
			$models = $models->where('province', 'like', "%$province%");;
		}
		if($city){
			$models = $models->where('city', 'like', "%$city%");;
		}
		if(count($worktype)){
		//	$str = '';
			foreach($worktype as $v){
				if($v){
					$models = $models->Where('worktype', 'like', "%$v%");
				}
			}
			
		}
		$sumModels = $models;
		$sum = $sumModels->count();
		$totalpage = ceil($sum/$pagesize);
		$models = $models->orderBy('praiseNums','desc')->skip($index)->take($pagesize)->get();
		if(count($models)){
			$models = $models->toArray();
			$res['result'] = '00';
			$res['message'] = '获取列表成功';
			$res['list'] = $models;
			$res['totalpage'] = $totalpage;
		}else{
			$res['result'] = '01';
			$res['message'] = '暂无数据';
		}
		return json_encode($res);
	}
	//获取model的详情
	public function getModeldetail(){
		$res = array();
		$id = Input::get('id');
		$modelinfo = Modelt::where('id',$id)->first();
		if(isset($modelinfo->photo) && $modelinfo->photo){
			$modelinfo->photo = json_decode($modelinfo->photo,true);
		}
		if(isset($modelinfo->dqtime) && $modelinfo->dqtime){
			$modelinfo->dqtime = json_decode($modelinfo->dqtime,true);
		}
		$parise = $modelinfo->praiseNums;
		$parise = (int)$parise + 1;
		$data['praiseNums'] = $parise;
		Modelt::where('id',$id)->update($data);
		if(isset($modelinfo->id)){
			$modelinfo = $modelinfo->toArray();
			$res['result'] = '00';
			$res['message'] = '获取详情成功';
			$res['list'] = $modelinfo;
		}else{
			$res['result'] = '01';
			$res['message'] = '暂无数据';
		}
		return json_encode($res);
	}
}