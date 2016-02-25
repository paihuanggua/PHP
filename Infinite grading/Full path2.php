<?php
require_once('db.php');
function getPathCate($cateid){
	$sql="select *,concat(path,',',id) fullpath from likecate where id={$cateid} ";
	$res=mysql_query($sql);
	$row=mysql_fetch_assoc($res);
	$ids=$row['fullpath'];
	$sql="select * from likecate where id in ($ids) order by id asc";
	$res=mysql_query($sql);
	$result=array();
	while($row=mysql_fetch_assoc($res)){
		$result[]=$row;
	}
	return $result;
};


function displayCatePath($cateid,$url="cate.php?cid="){
	$res=getPathCate($cateid);
	$str='';
	foreach ($res as $key => $value) {
		$str.="<a href='{$url}{$value['id']}'>{$value['catename']}</a>>";
	}
	return $str;
} 

echo displayCatePath(4,'cate.php?page=1&id=');
?>