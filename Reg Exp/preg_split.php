<?php
//explode（自己看） 是 preg_split 子集
$pattern='/[0-9]/';
$subject='www4qqq465rr,6rrr';
$arr=preg_split($pattern, $subject);

show($arr);


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