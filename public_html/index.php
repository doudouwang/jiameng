<?php
session_start();
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
if(isset($_SESSION['step']) & strpos($_SESSION['step'],'orward')){
	$_SESSION['step'] = 'forward_index';
	/*if(is_forbiden_ip()){
		$notice_1="为支持本站,请大家多点击一下本站页面.";
	}else{
		if(rand(1,10)<=2){
			$notice_1="为支持本站,请大家顺手多浏览本站页面.<br>";
			$notice_2="项目很多，仅供参考";
		}else{
			$notice_1="为支持本站,请大家多点击一下本站页面.";
		}
	}*/
}
$smarty->assign('notice_1', $notice_1);
$smarty->assign('notice_2', $notice_2);

$ad=config_item('index');
$smarty->assign('ad0', $ad[0]);
$smarty->assign('tpl', 'index');
$smarty->display('main.tpl');
?>
