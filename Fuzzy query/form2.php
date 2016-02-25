<?php
$keywords=isset($_GET['keywords'])?trim($_GET['keywords']):'';
//连接数据库
$con=@mysql_connect('localhost','root','root');
mysql_select_db('db');
mysql_query('set names utf8');

$sql="select * from code where name like '%{$keywords}%' ";
$result=mysql_query($sql);
$users=array();

if(!empty($keywords)){
	//对用户名进行关键词高亮
	while($row=mysql_fetch_assoc($result)){
		$row['name']=str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['name']);
		$users[]=$row;
	}
}
print_r($users);

//课后作业
//基础作业：开发一个站内新闻搜索功能（根据用户输入的标题查询相关新闻）
//扩展作业：站内新闻搜索功能（用户可以输入关键词进行搜索，多个关键词以空格或逗号隔开）
/*
*提示：
*1、获取关键字
*2、对关键字进行分割
*3、拼接SQL语句
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>php模糊查询技术案例之PHP用户查询器</h1>
	<form action="" method="">
		用户名：<input type="text" name="keywords" value="" /><br />
				    <input type="submit" value="提交查询" />
	</form>
	<?php
		if($keywords){
			echo '<h2>查询关键辞：'.$keywords.'&nbsp;的结果</h2>';
		}
		if($users){
			echo '<table width="500" border="1" cellpadding="5">';
			echo '<tr bgcolor="orange"><th>用户名</th><th>名字</th><th>数量</th></tr>';
			foreach ($users as $key => $value) {
				echo '<tr>';
				echo '<td>'.$value['id'].'</td>';
				echo '<td>'.$value['name'].'</td>';
				echo '<td>'.$value['num'].'</td>';
				echo '</tr>';
			}
			echo '</table>';
		}else{
			echo '没有查询到相关用户';
		}
	?>
</body>
</html>