<?php
require_once('inc.php');

$encoder = new clsNewUrl();
//分发请求

$url = array();
$id = isset($_GET['top_cat_id']) && $_GET['top_cat_id']!=0? $_GET['top_cat_id']: NULL;
$id = isset($_GET['sub_cat_id']) && $_GET['sub_cat_id']!=0? $_GET['sub_cat_id']: $id;

if(isset($id)){
	$url[] = "c$id";
}

if(isset($_GET['invest'])){
	$url[] = "i$_GET[invest]";
}

if(isset($_GET['keyword']) && trim($_GET['keyword'])!=''){
	$url[] = "k".$encoder->encode($_GET['keyword']).".html";
}else{
	$url[] = "/";
}

$url = implode("/", $url);

if($url != ""){
	$url = "/".$url;
}

$url = str_replace("//", "/", $url);

header("location:$url", false, 301);
exit;