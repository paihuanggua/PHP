<?php
require_once('db.php');
function getList($pid=0,&$result=array(),$spac=0){
	$spac=$spac+2;
	$sql="select * from deepcate where pid={$pid}";
	$res=mysql_query($sql);
	while($row=mysql_fetch_assoc($res)){
		$row['catename']=str_repeat('&nbsp;',$spac).'|--'.$row['catename'];
		$result[]=$row;
		getList($row['id'],$result,$spac);
	}
	return $result;
}


function displayCate($pid=0,$selected=1){
	$rs=getList($pid);
	$str="<select name='cate'>";
	foreach ($rs as $key => $value) {
		$selectedstr='';
		if($value['id']==$selected){
			$selectedstr='selected';
		}
		$str.="<option {$selectedstr}>{$value['catename']}</option>";
	}
	return $str.="</select>";
}
echo displayCate(0,3);
?>