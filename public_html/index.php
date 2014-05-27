<?php
require_once('inc.php');
assign_page(generateMeta('index'));

$CATEGORY = new Category();
$cats_gallery = $CATEGORY->getCatsGallery();
$all_cats = $CATEGORY->getAllCategories();
$smarty->assign('cats_gallery', $cats_gallery);
$smarty->assign('all_cats', $all_cats);

//判断来源
$notice_1="";
$notice_2="";

//if(isset($_COOKIE["h"])&isset($_COOKIE["u"])&isset($_SERVER['HTTP_REFERER'])){
if(isset($_COOKIE["h"])&isset($_COOKIE["u"])){
	//if(strpos($_SERVER['HTTP_REFERER'],'www.zhenyoua.com')){
		$u = $_COOKIE["u"];
		$h = $_COOKIE["h"];
		$k = md5("index".strtoupper($u).strtoupper($h).date('Y-m-d').config_item('key'));
		setcookie("k",$k,time()+3600,"/",config_item('domain'),0);
		if(is_forbiden_ip()){
			$notice_1="为支持本站,请大家多点击一下本站页面.";
		}else{
			if(rand(1,10)<=2){
				$notice_1="为支持本站,请大家顺手点一下广告.<br>";
				$notice_2="进入广告页面后，请大家停留2秒钟，再点击一下该网站其他页面.";
			}else{
				$notice_1="为支持本站,请大家多点击一下本站页面.";
			}
		}
	//}
}
$smarty->assign('notice_1', $notice_1);
$smarty->assign('notice_2', $notice_2);

$ad=config_item('index');
$smarty->assign('ad0', $ad[0]);
$smarty->assign('tpl', 'index');
$smarty->display('main.tpl');
?>