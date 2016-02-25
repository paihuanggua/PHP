<?php
//preg_grep只匹配不替换
$pattern='/[0-9]/';
$subject=array('www','qq2qq','bb23r58');
$arr=preg_grep($pattern, $subject);
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