<?php
require_once('../load.php');
header("Content-Type: text/html; charset=UTF-8");
date_default_timezone_set('Asia/Shanghai');

$smarty = new Mysmarty();

function assign_page($tpl = array()){
	global $smarty;
	$CAT = new Category();
	$top_cats = $CAT->getTopcategories();
	$smarty->assign('host', $_SERVER['HTTP_HOST']);
	$smarty->assign('top_cats',$top_cats);
	$smarty->assign('top_cats_options', $CAT->makeOptions($top_cats));
	$smarty->assign('img_domain','http://img0.egou.com/0/club/jm');
	$smarty->assign('date',date('YmdHi'));
	$smarty->assign('forbiden_ip',is_forbiden_ip(get_real_ip()));
	foreach($tpl as $k =>$v){
		$smarty->assign($k, $v);
	}
}
class clsNewUrl {
    private  $codetable = 'abcdefghijk12345678lmnopqrstuvwxyz';
    //private  $codetable = 'xyzabcdwefghiklmnortuvxjpqs87654321';
    public function __construct() {
        $this->codetable = str_split($this->codetable);
    }
    public function encode($str='') {
        if(empty($str)){
            return false;
        }
        $bin = '';
        for($i = 0 ; $i < strlen($str) ; $i++) {
            $tmp = str_pad(decbin(ord($str[$i])),8,'0', STR_PAD_LEFT);
            $bin .=$tmp;
        }
        $len = strlen($bin);
        $group = ceil($len/5);
        $remainder = $bin%5;
        $code = '';
        for($i=0;$i<$len;$i+=5){
            $end = $i+5;
            $flag = false;
            if ($end > $len) {
				$end = ($i + $remainder);
				$flag = true;
			}
			$s = substr($bin, $i, 5);
			if ($flag) {
                $s = str_pad($s,5,'0');
			}
            $s = intval($s,2);
            $a = $this->codetable[$s];
            $code .= $a;
        }
        return $code;
    }
    public function decode($code='') {
        if(empty($code)){
            return false;
        }
        $len = strlen($code);
        $bin = '';
        for($i=0; $i<$len; $i++) {
            $index = array_search($code[$i], $this->codetable);
            $bin .=str_pad(decbin($index),5,'0', STR_PAD_LEFT);
        }
        $bin = substr($bin,0,floor(strlen($bin)/8)*8);
        $str = '';
        foreach(str_split($bin,8) as $v) {
            $str.=chr(bindec($v));
        }
        return $str;
    }
}
/**
 *
 * @param type $page  首页：index, 列表：list, 底层：project
 */
function generateMeta($page = 'index', $key = ''){
	$title = "";
	$keywords = "";
	$description = "";
	switch($page){
		case 'list':
			$title = "{$key}（店）{$key}多少钱 {$key}排行榜";
			$keywords = "{$key}加盟，{$key}加盟费用，{$key}加盟排行榜，{$key}加盟多少钱";
			$description = "{$key}加盟（店）大全提供{$key}加盟的{$key}品牌，{$key}加盟多少钱，{$key}加盟费用，{$key}加盟排行榜，{$key}加盟怎么样，{$key}加盟电话等";
			break;
		case 'project':
			$title = "{$key}加盟（加盟费），{$key}加盟电话，加盟多少钱";
			$keywords = "{$key}加盟，{$key}加盟费，{$key}加盟电话，{$key}加盟多少钱";
			$description = "{$key}加盟大全提供{$key}加盟费用，{$key}加盟电话。{$key}设备费，培训费，代理费，权益金，{$key}加盟特许使用，最新最全最赚钱的加盟项目，{$key}加盟代理";	
			break;
		case 'index':
		default:
			$title = "";
			$keywords = "中国连锁加盟网，中国加盟网，连锁加盟网，全球加盟网";
			$description = "中国连锁加盟网大全，最新招商加盟 2011年加盟好项目 (2012,2013可持续性加盟项目）中国加盟连锁排行榜，中国特许加盟网，全国加盟项目大全";
	}

	return array(
		'title' => $title,
		'keywords' => $keywords,
		'description' => $description,
	);
}