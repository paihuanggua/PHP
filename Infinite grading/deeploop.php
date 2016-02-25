<?php
//1=>function deeploop(&$i=1){
	//1=>echo $i;
//2=>$i=1;
//2=>function deeploop(){
	//2=>global $i;
function deeploop(){
	static $i=1;
	echo $i;
	$i++;
	if($i<10){
		deeploop($i);
	}
}
deeploop();
?>