<?php

class BaseController extends Controller {
	
	
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	//温馨提示
	public function getTishi($message,$url){
			echo '<html>';
			echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
			echo "<SCRIPT language=Javascript> alert('$message');
			window.location.href='$url';
			</SCRIPT>";
			echo '</html>';
			exit();
	}
	/**
	 * json转义
	 */
	public function jsonCN($data) {
		if(is_array($data)) {
			foreach($data as &$v) {
				$v = urlencode($v);
			}
		}else {
			$data = urlencode($data);
		}
		return $data;
	}
}