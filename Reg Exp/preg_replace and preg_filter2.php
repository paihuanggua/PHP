<?php
$pattern=array('/[0123]/','/[456]/','/[789]/');
$subject=array('www','qq2qq','bb23r58');
$replacement=array('斗','图','秒杀');
$str1=preg_replace($pattern, $replacement, $subject);
$str2=preg_filter($pattern, $replacement, $subject);
show($str1);
echo "<hr />";
show($str2);

function show($var=null){
	if(empty($var)){
		echo "null";
	}elseif(is_array($var)||is_object($var)){
		//array,object
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}else{
		//string,int,float...
		echo $var;
	}
}
?>