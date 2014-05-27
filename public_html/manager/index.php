<?php
require_once('admin_inc.php');

$router = @$_GET['m'];
$params = explode('^', @$_GET['p']);

$m = explode('.', $router);

$controller = $m[0] == ''?'index':$m[0];
$method     = (isset($m[1]) && $m[1] != '') ?$m[1]:'index';


$controller_file = ADMINPATH.'controllers/'.  strtolower($controller).'.php';

if(!file_exists($controller_file)){
	show_404();
}

include_once(ADMINPATH.'admin_class.php');
include_once($controller_file);

$class_name = $controller."_controller";

$CLASS = new $class_name;

if(!method_exists($CLASS, $method) || strpos($method, '_')===0){
	show_404();
}

$CLASS->_setRouter($controller, $method);

call_user_func(array($CLASS, $method), $params);
