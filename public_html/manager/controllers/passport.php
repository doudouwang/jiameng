<?php if(!defined('ADMINPATH')){die();}
class Passport_controller extends Admin_controller {
	public function login()
	{
		$data['backurl'] = @urldecode($_GET['backurl']);
		if (isset($_POST['username'])) {
			if ($this->admin->_checkLogin(@$_POST['username'], @$_POST['password'])) {
				$this->_goBack();
			}else{
				$data['error'] ="用户名或密码错误";
				$this->_display('login',$data);
			}
		} else {
			$this->_display('login', $data);
		}
	}

	public function logout()
	{
		$this->admin->logout();
		$this->_redirect('index', 'index');
	}

}