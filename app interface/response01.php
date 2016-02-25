<?php
$arr=array(
	'id'=>1,
	'name'=>'zhaoguangzhi'
);
echo json_encode($arr);
echo "<hr />";
$data="输出json数据";
$newDate=iconv('utf-8', 'gbk', $data);
echo json_decode($newDate);//json_encode()只返回utf-8的数据所以这里返回null
echo "<hr />";
?>