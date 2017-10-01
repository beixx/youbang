<?php
class AdminController extends BaseController{
	//用户的验证
	public function postCheckuser(){
		$username = Input::get('username');
		$password = Input::get('password');
		if(Auth::attempt(array('name' => $username, 'password' => $password))){
			//$userinfo = User::where('name',$username)->first()->toArray();
			//Session::put('userinfo',$userinfo);
			return Redirect::to('comment/list');
		}else{
			return Redirect::to('admin')->with('error','用户名或密码输入错误');
		}
	}
	
	//用户退出
	public function getLogout(){
		Auth::logout();
		return Redirect::to('admin');
	}
	
	public function getIndex(){
		return View::make('admin.index');
	}
}