<?php
class Admin extends Core{
	public function __construct(){
		parent::__construct();
		$this->users = config_item('users');
	}

	public function isLogin(){
		if(isset($_SESSION['admin_info'])){
			return TRUE;
		}else{
			return $this->_checkCookie();
		}
	}

	public function logout(){
		$this->_clearCookie();
		unset($_SESSION['admin_info']);
	}

	public function _login($id){
		$_SESSION['admin_info'] = $this->users[$id];
	}

	public function _clearCookie(){
		setcookie("AUTH", '', -1);
	}
	public function _setCookie($id, $password){
		setcookie("AUTH", authcode("$id\t$password", 'ENCODE'), time() + 3600 * 24 * 30);
	}

	public function _checkCookie(){
		if(!isset($_COOKIE['AUTH'])){
			return FALSE;
		}	
		$auth = $_COOKIE['AUTH'];
		list($id, $password) = explode("\t",authcode($_COOKIE['AUTH'], 'DECODE'));
		if($this->_checkPassword($id, $password)){
			$this->_login($id);
			return TRUE;
		}else{//验证密码失败
			$this->_clearCookie();
			return FALSE;
		}
	}

	public function _checkPassword($id, $password){
		if($this->users[$id]['password'] == $password){
			return TRUE;
		}
		return FALSE;
	}

	public function _checkLogin($name, $password){
		foreach($this->users as $id => $user){
			if($user['name'] == $name && $user['password'] == $password){
				$this->_login($id);
				$this->_setCookie($id, $password);
				return TRUE;
			}
		}
		return FALSE;
	}
}