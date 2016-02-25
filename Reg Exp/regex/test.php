<?php
require_once('regexTool.class.php');
$regx=new regexTool();
//$regx->setFixMode('U');
$r=$regx->isMobile('151145273');
show($r);

function show($var=null,$isdump=false){
	$func=$isdump?'var_dump':'print_r';
	if(empty($var)){
		echo "null";
	}elseif(is_array($var)||is_object($var)){
		//array,object
		echo "<pre>";
		$func($var);
		echo "</pre>";
	}else{
		//string,int,float...
		$func($var);
	}
}
?>