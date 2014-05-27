<?php
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

$t=rand(1,3);
$r=rand(0,200);
$a=$t%3;
//判断来源
if(isset($_COOKIE["k"])&isset($_COOKIE["u"])&isset($_COOKIE["h"])){
	$u = $_COOKIE["u"];
	$h = $_COOKIE["h"];
	$k = $_COOKIE["k"];
	$key = md5("list".strtoupper($u).strtoupper($h).date('Y-m-d').config_item('key'));
	if($k==$key){
		$k = md5(strtoupper($u).strtoupper($h).date('Y-m-d').config_item('key'));
		setcookie("k1",$k,time()+3600,"/project/",config_item('domain'),0);
		$onload="<script type=\"text/javascript\">
					timeoutId = setTimeout(show_qian('$a'),5000);
					window.onload=function(){
						clearTimeout(timeoutId);
						if(!show){
							show_qian('$a');
						}
					}
				</script>";
		$smarty->assign('onload', $onload);
	}
	$smarty->assign('s', '?u'.$u.'h'.$h);
}
$ad=config_item('ad');
$smarty->assign('ad0', $ad[$t%3]);
$smarty->assign('ad1', $ad[($t+1)%3]);
$smarty->assign('ad2', $ad[($t+2)%3]);

$smarty->assign('style', "style=\"margin-left: ".$r."px\"");



$smarty->display('main.tpl');
