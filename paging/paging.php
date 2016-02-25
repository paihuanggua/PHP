<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.page a{
			border: 1px solid #aaaadd;
			text-decoration: none;
			padding: 2px 5px 2px 5px;
			margin: 2px;
		}
		.current{
			background: red;
			border: 1px solid #aaaadd;
			text-decoration: none;
			padding: 2px 5px 2px 5px;
			margin: 2px;
		}
		.disable{
			background: #ccc;
			border: 1px solid #aaaadd;
			text-decoration: none;
			padding: 2px 5px 2px 5px;
			margin: 2px;
		}
		.page .disable{
			border: 1px solid red;
			padding: 2px 5px 2px 5px;
			margin: 2px;
			color: #ddd;
		}
	</style>
</head>
<body>
<?php
$page=$_GET['p']?$_GET['p']:1;
if($page<1){
	$page=1;
}
$host='localhost';
$username='root';
$password='root';
$db='db';
$pageSize=10;
$showPage=5;
$con=mysql_connect($host,$username,$password);
if(!$con){
	echo "数据库连接失败";
	exit;
}
mysql_select_db($db);
mysql_query("set names utf8");

//获取数据总条数
$total_sql="select count(*) from page";
$total_result=mysql_fetch_array(mysql_query($total_sql));
$total=$total_result[0];
//echo $total;

//计算页数
$total_page=ceil($total/$pageSize);
echo $total_page;
if($page>total_page){
	echo "111";
	exit();
	$page=total_page;
}

$sql="select * from page limit ".(($page-1)*$pageSize).",{$pageSize}";
$result=mysql_query($sql);

echo "<div class='conyent'>";
echo "<table border=1 cellspacing=0 width=40%>";
echo "<tr><td>ID</td><td>NAME</td></tr>";
while($row=mysql_fetch_assoc($result)){
	echo "<tr>";
	echo "<td>{$row['id']}</td>";
	echo "<td>{$row['name']}</td>";
	echo "</tr>";
}
echo "</table>";
echo "</div>";
//释放结果，关闭连接
mysql_free_result($result);



if($page>=$total_page){
	$page=1;
}

mysql_close($con);

//显示数据+分页条
$page_banner="<div class='page'>";
//计算偏移量
$pageoffset=($showPage-1)/2;
if($page>1){
	$page_banner.="<a href=' ".$_SERVER['PHP_SELF']."?p=1 '>首页</a>";
	$page_banner.="<a href=' ".$_SERVER['PHP_SELF']."?p=".($page-1)." '>上一页</a>";
}else{
	$page_banner.="<span class='disable'>首页</span>";
	$page_banner.="<span class='disable'>第一页</span>";
}

//初始化数据
$start=1;
$end=$total_page;    
if($total_page>$showPage){
	if($page>$pageoffset+1){
		$page_banner.="···";
	}
	if($page>$pageoffset){
		$start=$page-$pageoffset;
		$end=$total_page>$page+$pageoffset?$page+$pageoffset:$total_page;

	}else{
		$start=1;
		$end=$total_page>$showPage?$showPage:$total_page;
	}
	if($page+$pageoffset>$total_page){
		$start=$start-($page+$pageoffset-$end);
	}
}

for($i=$start;$i<=$end;$i++){
	if($page==$i){
		$page_banner.="<span class='current'>{$i}</span>";
	}else{
		$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$i." '>{$i}</a>";
	}
}
if($total_page>$showPage&&$total_page>$page+$pageoffset){
	$page_banner.="...";
}
if($page<$total_page){
	$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)." '>下一页</a>";
	$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($total_page)." '>尾页</a>";
}else{
	$page_banner.="<span class='disable'>下一页</span>";
	$page_banner.="<span class='disable'>尾页</span>";
}

$page_banner.="共".$total_page."页";
$page_banner.="<form action='paging.php' method='get'>";
$page_banner.="到第<input type='text' size='2' name='p'>页";
$page_banner.="<input type='submit' value='确定'>";
$page_banner.="</form></div>";
echo $page_banner;0  
?>	
</body>
</html>
