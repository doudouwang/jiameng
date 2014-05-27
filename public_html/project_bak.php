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

$ad[0]="<script language=\"javascript\" type=\"text/javascript\">
	yigao_width = 336;
	yigao_height = 280;
	yigao_sid = \"cd2553293f76c503\";
	yigao_msid = \"aa24b1e9962dabca\";
	yigao_uid = 79904;
	yigao_zid = 144214;
	yigao_pid = 15;
	yigao_type = 1;
	yigao_adamount = 1;
	yigao_cols = 1;
</script>";
$ad[1]="<script language=\"javascript\" type=\"text/javascript\">
	yigao_width = 336;
	yigao_height = 280;
	yigao_sid = \"f9588a25bb712acc\";
	yigao_msid = \"b5167e0102854a93\";
	yigao_uid = 79904;
	yigao_zid = 144213;
	yigao_pid = 15;
	yigao_type = 1;
	yigao_adamount = 1;
	yigao_cols = 1;
</script>";
$ad[2]="<script language=\"javascript\" type=\"text/javascript\">
	yigao_width = 336;
	yigao_height = 280;
	yigao_sid = \"4eb34aa10b445d84\";
	yigao_msid = \"e8d456c1e9b2066a\";
	yigao_uid = 79904;
	yigao_zid = 144125;
	yigao_pid = 15;
	yigao_type = 1;
	yigao_adamount = 1;
	yigao_cols = 1;
</script>";
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
		$onload="<script type=\"text/javascript\" src=\"/js/q.js\"></script>";
		$onload=$onload."<script type=\"text/javascript\">var id='$a';var h='$h';var k='$k';</script>";
		$smarty->assign('onload', $onload);
	}
}
$smarty->assign('ad0', $ad[$t%3]);
$smarty->assign('ad1', $ad[($t+1)%3]);
$smarty->assign('ad2', $ad[($t+2)%3]);

$smarty->assign('style', "style=\"margin-left: ".$r."px\"");


$smarty->display('main.tpl');
