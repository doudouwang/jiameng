<?php
session_start();
require_once('inc.php');
//判断来源
if(isset($_SESSION['step']) & strpos($_SESSION['step'],'orward_index')){
	$_SESSION['step'] = 'forward_index_list';
}
$query_string = $_SERVER['QUERY_STRING'];
$request_uri = $_SERVER['REQUEST_URI'];
$encoder = new clsNewUrl();

$GET = array();

if(strpos($request_uri, "?") !== FALSE){
	$x = explode("?", $request_uri, 2);
	$query_string = $x[0];
	parse_str($x[1], $_GET);
}

$args = explode('/', $query_string);

foreach($args as $v){
	if(preg_match("#^c(\d+)$#", $v)){
		$_GET['id'] = intval(str_replace("c","", $v));
	}elseif(preg_match("#^i(\d+)$#", $v)){
		$_GET['invest'] = intval(str_replace("i", "",$v));
	}elseif(preg_match("#^k(.+)\.html$#", $v)){
		$_GET['keyword'] = $encoder->decode(preg_replace("/^k(.*)\.html/", "$1",$v));
	}elseif($v != ''){
		//show_404('nihao');
	}
}


$id = intval(@$_GET['id']);

$CATEGORY = new Category();
$SEARCH = new Search();

$info = $CATEGORY->find($id);

$condition = array();
$query = "";
$key = '';

if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
	$query = $_GET['keyword'];
	$key = $_GET['keyword'];
	$condition['query'] = $_GET['keyword'];
}

$nav = $query==""?"":" &gt; 搜索“{$query}”";

if($info == FALSE){
	$title = $query==""?"全部项目":$query;
}elseif($info['father_id'] == 0){//一级分类
	$condition['father_id'] = $id;
	$nav = " &gt; ".
		"<a href='/c$info[cat_id]/'>".$info['name']."</a>". $nav;
	$title = $info['name'];
	$key = $info['name'];
}else{//二级分类
	$father_info = $CATEGORY->find($info['father_id']);
	$condition['cat_id'] = $id;
	$nav = " &gt; ".
		"<a href='/c$father_info[cat_id]/'>".$father_info['name']."</a> &gt; ".
		"<a href='/c$info[cat_id]/'>".$info['name']."</a>".  $nav;
	$title = $info['name'];
	$key = $info['name'];
}


$nav = $nav==""?" &gt; 全部项目":$nav;

$page = (int)@$_GET['page']<1?1:(int)@$_GET['page'];
$page_size = 10 ;
$page = ($page*$page_size)>=1000?1:$page;

$SEARCH->setLimits($page, $page_size);

$ret = $SEARCH->getProjects($condition, NULL);

if(isset($ret['error'])){
	die('发生错误');
}

$total = $ret['count'];

$total_page  = ceil( $total / $page_size );
$page = $page > $total_page ? ( $total_page==0 ? 1 : $total_page ) : $page;

assign_page(generateMeta('list', $title));

$options = array('page' => $page,
		'total_page' => $total_page,
		'base_url' => $query_string."?page=#PAGE#",
		'page_size' => $page_size,
);

$PAGER = new Pager($options);
$smarty->assign("pages", $PAGER->gen());
$smarty->assign('name', $title);
$smarty->assign('nav', $nav);
$smarty->assign('key', $key);
$smarty->assign('topnav', 'list');
$smarty->assign('ret', $ret['ret']);
$smarty->assign('count', $total);
$smarty->assign('tpl', 'list');

$ad=config_item('ad');
$t=rand(1,3);
$smarty->assign('ad0', $ad[$t%3]);
$smarty->assign('ad1', $ad[($t+1)%3]);
$smarty->assign('ad2', $ad[($t+2)%3]);

$smarty->display('main.tpl');
