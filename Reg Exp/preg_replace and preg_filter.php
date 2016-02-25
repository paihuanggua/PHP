<?php

$pattern='/[0-9]/';
$subject='wef234s4stre5se4se2342';
$replacement='斗图';
$str=preg_replace($pattern, $replacement, $subject);
$str2=preg_filter($pattern, $replacement, $subject);
show($str);
echo "<hr />";
show($str2);

//str_replace(search, replace, subject)自己看





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