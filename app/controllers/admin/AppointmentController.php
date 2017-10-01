<?php
class AppointmentController extends BaseController{
	//预约看店记录列表
	public function getList(){
		$spokeviews = Yfcbespokeview::orderBy('id','desc')->paginate(15);
		if(count($spokeviews)){
			foreach($spokeviews as $key=>$v){
				$id = $v->tenantsId;
				$tenantsinfo = Yfctenants::where('id',$id)->first();
				$v->tenantsinfo = $tenantsinfo;
				$spokeviews[$key] = $v;
			}
		}
		return View::make('admin.appointmentlist',array('spokeviews'=>$spokeviews,'name'=>'预约看店记录列表'));
	}
	//添加预约看店记录
	public function getAdd(){
		return View::make('admin.addappointment')->with('name','添加预约看店记录');
	}
	//编辑预约看店记录
	public function getEdit($id){
		$info = Yfcbespokeview::where('id',$id)->first();
		if(isset($info->tenantsId)){
			$tenantsinfo = Yfctenants::where('id',$info->tenantsId)->first();
			$info->tenantsinfo = $tenantsinfo;
		}
		return View::make('admin.addappointment')->with('name','编辑预约看店记录')->with('info',$info);
	}
	//添加预约看店记录
	public function postSave(){
		$id = Input::get('id','');
		$shopname = Input::get('shopname','');
		$name = Input::get('name','');
		$phone = Input::get('phone','');
		$ctime = Input::get('ctime','');
		$source = Input::get('source','');
		$recommname = Input::get('recommname',''); 
		$visitState = Input::get('visitState','');
		$visitContent = Input::get('visitContent','');
		$data=array();
		
		if($shopname){
			$info = Yfctenants::where('name', 'like', '%'.$shopname.'%')->first();
			if(isset($info->id)){
				$data['tenantsId'] = $info->id;
			}
		}
		$data['visitState'] = Input::get('visitState','');
		if($data['visitState']==1){
			$data['visitContent'] = Input::get('visitContent','');
		}else{
			$data['visitContent'] = '';
		}
		
		if($name){
			$data['name'] = $name;
		}
		if($phone){
			$data['phone'] = $phone;
		}
		if($ctime){
			$data['ctime'] = strtotime($ctime);
		}
		if($source){
			$data['source'] = $source;
		}
		if($recommname){
			$data['recommname'] = $recommname;
		}
		$url = url('appointment/list');
		if($id){
			$res = Yfcbespokeview::where('id',$id)->update($data);
			if($res){
				echo "<script type='text/javascript'>
				alert('预约看店记录编辑成功');
				window.location.href='$url';
				</script>";
			}else{
				echo "<script type='text/javascript'>
				alert('预约看店记录编辑成功');
				window.location.href='$url';
				</script>";
			}
		}else{
			$res =Yfcbespokeview::insert($data);
			if($res){
				echo "<script type='text/javascript'>
				alert('预约看店记录添加成功');
				window.location.href='$url';
				</script>";
			}else{
				echo "<script type='text/javascript'>
				alert('预约看店记录添加失败');
				window.location.href='$url';
				</script>";
			}
		}
	}
	//活动删除
	public function getDelete($id){
		$url = url('appointment/list');
		$affectedRows = Yfcbespokeview::where('id',$id)->delete();
		if($affectedRows){
			echo "<script type='text/javascript'>
			alert('删除预约看店记录成功');
			window.location.href='$url';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('删除预约看店记录失败');
			window.location.href='$url';
			</script>";
		}
	}
	
}