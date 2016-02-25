<?php
require_once('db.php');
function likecate(){
	$sql="select id,catename,path,concat(path,',',id) as fullpath from likecate order by fullpath asc";
	$res=mysql_query($sql);
	//print_r($res);
	$result=array();
	while($row=mysql_fetch_assoc($res)){
		$deep=count(explode(',', trim($row['fullpath'],',')));
		$row['catename']=str_repeat('&nbsp;&nbsp;', $deep).'|--'.$row['catename'];
		$result[]=$row;
	}
	return $result;
}
$rs=likecate();
echo "<select name='cate'>";
foreach ($rs as $key => $value) {
	echo "<option>{$value['catename']}</option>";
}
echo "</select>";
?>