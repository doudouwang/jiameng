<?php
session_start();
require_once('inc.php');
$id = intval($_GET['id']);


$PROJECT = new Project();

$info = $PROJECT->find($id,"P.*, C1.name as cat_name, C2.cat_id as parent_id, C2.name as parent_name");

if($info == FALSE){
	show_404();
}

$nav = " <font color='#a5acb2'>&gt;</font> <font color='#4d4d4d'><a href='/c$info[parent_id]/'>$info[parent_name]</a> &gt; <a href='/c$info[cat_id]/'>$info[cat_name]</a> &gt; $info[name]</a></font>";

assign_page(generateMeta('project', $info['name']));

$images = $PROJECT->getPics($id);

$smarty->assign('images', $images);
$smarty->assign('info', $info);
$smarty->assign('nav', $nav);
$smarty->assign('tpl', 'project');
$qdindex = -1;
if(isset($_SESSION['step']) & strpos($_SESSION['step'],'orward_index_list')){
	$_SESSION['step'] = 'forward_index_list_project';
	$t=rand(1,3);
	$qdindex=$t%3;
	$_SESSION["key"] = md5(strtoupper($_SESSION["uid"]).strtoupper($_SESSION["hid"]).date('Y-m-d').config_item('key'));
}
$smarty->assign('qdindex', $qdindex);
$ad=config_item('ad');
$smarty->assign('ad0', $ad[$t%3]);
$smarty->assign('ad1', $ad[($t+1)%3]);
$smarty->assign('ad2', $ad[($t+2)%3]);

$smarty->display('main.tpl');
