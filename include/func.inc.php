<?php

function config_item($key){
	$config = load_config();
	return isset($config[$key])?$config[$key]:FALSE;
}

function load_config(){
	static $cfg = null;
	if($cfg != null){
		return $cfg;
	}
	include_once(INCPATH.'config.php');
	@include_once(INCPATH.'config.'.ENVIRONMENT.'.php');
	$cfg = $config;
	unset($config);
	return $cfg;
}

// 显示模板
function D($token){
	echo Component::Show($token);
}

function __autoload($classname){
	$path = INCPATH.'/class.'.strtolower($classname).".php";
	include_once($path);
}

function show_404($page=''){
	header('HTTP/1.1 404 Not Found');
	$tpl = APPPATH.'views/error/error_404.php';
	if(file_exists($tpl)){
		include_once $tpl;
	}else{
		echo "404 NOT FOUND.";
	}
	exit;
}

function is_browser(){
	$agent = isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
	if(preg_match("#(MSIE|Mozilla|Chrome|Opera|Safari|Webkit)#", $agent)){
		return TRUE;
	}
	return FALSE;
}

function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	$ckey_length = 4;
	$key = md5($key ? $key : AUTH_KEY);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya . md5($keya . $keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for ($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for ($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for ($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if ($operation == 'DECODE') {
		if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc . str_replace('=', '', base64_encode($result));
	}
}
/**
 * 
 * 取得用户的真实ip,即使通过nginx
 */
function get_real_ip(){
	$ip=false;
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
		for ($i = 0; $i < count($ips); $i++) {
			if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
				$ip = $ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}
function is_forbiden_ip($ip){
	$forbiden_ips = config_item('ad_forbiden_ips');
	$single_ips = $forbiden_ips['single'];
	if(in_array($ip,$single_ips)){
		return true;
	}
	$section_ips = $forbiden_ips['section'];
	foreach ($section_ips as $section_ip){
		preg_match("/^(\d+\.\d+\.\d+\.\d+)/i",$section_ip, $matches);
		$ip_c_l = ip2long($ip);
		$ip_s_l = ip2long($matches[0]);
		$ip_e_l = ip2long($matches[1]);
		if(($ip_c_l<$ip_e_l && $ip_c_l>$ip_s_l) || ($ip_c_l<$ip_s_l && $ip_c_l>$ip_e_l)){
			break;
			return true;
		}
	}
	return false;
}