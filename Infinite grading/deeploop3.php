<?php
require_once('db.php');
function getCatePath($id,&$result=array()){
	$sql="select * from deepcate where id={$id}";
	$rs=mysql_query($sql);
	$row=mysql_fetch_assoc($rs);
	if($row){
		$result[]=$row;
		getCatePath($row['pid'],$result);
	}
	krsort($result);
	return $result;
}

function displayCatePath($cid,$url="cate.php?cid="){
	$res=getCatePath($cid);
	$str='';
	foreach ($res as $key => $value) {
		$str.="<a href='{$url}{$value['id']}'>{$value['catename']}</a>>";
	}
	return $str;
} 

echo displayCatePath(10,'cate.php?page=1&id=');