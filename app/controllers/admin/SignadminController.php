<?php
class SignadminController extends BaseController{
	//艺人模特
	public function getList(){
		$actors = Signed::paginate(15);
		return View::make('admin.signlist',array('actors'=>$actors));
	}
	
	//编辑消息
	public function getEdit($id){
		$activeinfo = Signed::where('id','=',$id)->first();
		return View::make('admin.addsign')->with('activeinfo',$activeinfo);
	}
	//编辑消息
	public function getAdd(){
		return View::make('admin.addsign');
	}
	
	//消息保存
	public function postSave(){
		$id = Input::get('id','');
		$name = Input::get('name','');
		$sex = Input::get('sex','');
		$height = Input::get('height','');
		$weight = Input::get('weight','');
		$measurements = Input::get('measurements','');
		$profession = Input::get('profession','');
		$performing = Input::get('performing','');
		$headimgurl = Input::file('headimgurl','');
		$type = Input::get('type','');
		$photo = Input::file('photo');	
		$data=array();
		$data['name'] = $name;
		$data['sex'] = $sex;
		$data['height'] = $height;
		$data['weight'] = $weight;
		$data['measurements'] = $measurements;
		$data['profession'] = $profession;
		$data['performing'] = $performing;
		$data['type'] = $type;
		$data['ctime'] = time();
		
		$imageurls = array();
		if(count($photo)){
			foreach($photo as $key=>$v){
				if($v){
					$realname = $_FILES['photo']['name'][$key];
					$type = pathinfo($realname, PATHINFO_EXTENSION);
					$filename="/uploads/signed/";
					$destinationPath=public_path().$filename;
					
					$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
					$v->move($destinationPath, $name);
					$imageurl = 'uploads/signed'.'/'.$name;
					$src = asset($imageurl);
					$this->simple_thumb($src, $width = 750, $height = null, "uploads/signed/small_".$name);
					$imageurl = 'uploads/signed'.'/small_'.$name;
					$imageurls[] = asset($imageurl);
				}
			}
		}
		if(count($imageurls)!=0){
			$data['photo'] = json_encode($imageurls);
		}
		$image = '';
		if($headimgurl){
			$filename="/uploads/signed/";
			$destinationPath=public_path().$filename;
			$realname = $_FILES['headimgurl']['name'];
			$type = pathinfo($realname, PATHINFO_EXTENSION);
			$name = md5(date('Y-m-d H:i:s').rand(1,1000)).'.'.$type;
			$headimgurl->move($destinationPath, $name);
			$image = 'uploads/signed'.'/'.$name;
			$src = asset($image);
			$this->simple_thumb($src, $width = 750, $height = null, "uploads/signed/small_".$name);
			$image = 'uploads/signed'.'/small_'.$name;
		}
		if($image){
			$data['headimgurl'] = asset($image);
		}
		if($id){
			$res = Signed::where('id',$id)->update($data);
		}else{
			$res = Signed::insert($data);
		}
		
		$url = url('sign/list');
		if($res){
			echo "<script type='text/javascript'>
			alert('保存成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('保存失败');
			window.location.href='$url';
			</script>";
		}
	}
	//删除消息
	public function getDel($id){
		$url = url('sign/list');
		$affectedRows = Signed::where('id',$id)->delete();
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
	
}