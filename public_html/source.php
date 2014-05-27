<?php
$null = array(
	'1185',
	'2854',
	'2917'
);
$i = rand(1, 3389);
if($i==1185||$i==2854||$i==2917){
	$i=1;
}
echo "<script>window.location =\"/project/".$i.".html\";</script>";
