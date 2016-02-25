<?php
$keywords_get=$_GET;
$keywords_post=$_POST;
$keywords_request=$_REQUEST;
$keywords=isset($_GET['keywords'])?trim($_GET['keywords']):'';
echo "<hr />";
print_r($keywords_get) ;
echo "<hr />";
print_r($keywords_post);
echo "<hr />";
print_r($keywords_request);
echo "<hr />";
echo "查询关键字:".$keywords;

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

</body>
</html>