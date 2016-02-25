<?php
if(is_file('./index.html')&&(time()-filemtime('./index.html')<1200)){
	require_once('./index.html');
}else{
	require_once('./db.php');
	$sql="select * from news where 'category_id'=1 and 'status'=1 limit4 ";
	try{
		$db=Db::getInstance()->connect;
		$result=mysql_query($sql,$db);
		$newList=array();
		while($row=mysql_fetch_assoc($result)){
			$newList[]=$row;
		}
	}catch(Exception $e){

	}
	ob_start();
	require_once('template/index.php');
	$s=ob_get_contents();
	file_put_contents('./index.html', $s);
	ob_clean();
}

?>