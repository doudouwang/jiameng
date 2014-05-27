<?php
//if(isset($_GET['hid'])&isset($_GET['uid'])&isset($_SERVER['HTTP_REFERER'])){
if(isset($_GET['hid'])&isset($_GET['uid'])){
	//header(sprintf("Location: %s", "http://www.zhenyoua.com"));
	$url = "http://www.zhenyoua.com";
	//echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=$url\">";
	$uid = $_GET['uid'];
	$hid = $_GET['hid'];
	
	//if(strpos($_SERVER['HTTP_REFERER'],'www.egou.com')){
		setcookie("u",$uid,time()+3600,"/","www.zhenyoua.com",0);
		setcookie("h",$hid,time()+3600,"/","www.zhenyoua.com",0);
		echo "<script>window.location =\"$url\";</script>";
		//echo "<a id='rr' href='$url' style='display:none;'></a><script>document.getElementById('rr').click();</script>";
	//}
}
?>