<?php
class Admin_controller{
	protected $controller = 'index';
	protected $method = 'index';

	public function __construct(){
		session_start();
		$this->admin = new Admin();
	}

	public function _setRouter($controller, $method){
		$this->controller = $controller;
		$this->method = $method;

		if($this->admin->isLogin() == FALSE 
		   && !in_array($this->controller, array('passport'))
		){
			$this->_redirect('passport', 'login' , 'backurl='.urlencode($_SERVER['REQUEST_URI']));
		}

	}

	public function _redirect($controller, $method, $get='', $params=''){
		$get = $get==''?'':"&".$get;
		$params = $params==''?'':"&p=".$params;
		$location = "location:index.php?m=$controller.$method{$get}{$params}";
		header($location);
		exit;
	}

	public function _goBack(){
		$url = "index.php";
		if(isset($_POST['backurl'])){
			$url = $_POST['backurl'];
		}
		if(preg_match("#^http://#",$url)){
			$url = "index.php";
		}
		$this->_goto($url);
		return;
	}

	public function _goto($url){
		header("location:$url");
		exit;
	}

	public function _display($tpl, $data=array()){
		$smarty = new Mysmarty();
		foreach($data as $key => $item){
			$smarty->assign($key, $item);
		}
		$smarty->display("admin/$tpl.tpl", $data);
	}
}