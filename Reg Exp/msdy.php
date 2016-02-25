<?php
//smarty模式单元
$pattern='/^(\w+)\.(\w+)\.com$/';
$subject='www.baidu.com';
$matches=array();
preg_match_all($pattern, $subject, $matches);
show($matches);








function show($var = null, $isdump = false) {
	$func = $isdump ? 'var_dump' : 'print_r';
	if(empty($var)) {
		echo 'null';
	} elseif(is_array($var) || is_object($var)) {
		//array,object
		echo '<pre>';
		$func($var);
		echo '</pre>';
	} else {
		//string,int,float...
		$func($var);
	}
}
?>