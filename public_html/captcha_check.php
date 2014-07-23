<?php
	session_start();
	$code = $_REQUEST['code'];
	$captcha = $_SESSION['captcha'];
	$uid = $_SESSION['uid'];
	$hid = $_SESSION['hid'];
	$key = $_SESSION['key'];
	$error = json_encode(array('r'=>'error','c'=>$captcha,'cc'=>$code));
	$success = json_encode(array('r'=>'http://www.egou.com/club/qiandao/qiandao.htm?hid='.$hid."&k=".$key));
	if (empty($code) || empty($captcha) || $code != $captcha) {
		echo $error;
	} else {
		echo $success;
	}

	unset($_SESSION['step']);
	unset($_SESSION['uid']);
	unset($_SESSION['hid']);
	unset($_SESSION['key']);
    unset($_SESSION['captcha']);
?>
