<?php
require('inc.php');
error_reporting(E_ALL);

$test = new Search();

$ret = $test->getProjects(array(
	'father_id' => 3,
	'cat_id' => 54
));


if(isset($_GET['hello'])){
	print_r($_SERVER);
}else{
	$url = "http://www.jm.com/test.php?hello=1";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Accept: application/json;',
	));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$html = curl_exec($ch);
	echo $html;
}