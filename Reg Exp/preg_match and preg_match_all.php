<?php

$pattern='/[0-9]/';
$subject='w3d4dg3dfg45yaf3sxvf342';
$m1=$m2=array();
$t1=preg_match($pattern, $subject,$m1);
$t2=preg_match_all($pattern, $subject,$m2);
show($m1);
echo "<hr />";
show($m2);
echo "<hr />";
show($t1.'||'.$t2);



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