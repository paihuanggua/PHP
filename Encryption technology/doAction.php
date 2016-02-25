<?php
$act=$_REQUEST['act'];
$username=$_POST['username'];
$password=md5(md5($_POST['password']));
$con=mysql_connect('localhost','root','root');
mysql_select_db('db');
mysql_query('set names utf8');
if($act=='reg'){
	$sql="insert user(username,password) values('{$username}','{$password}')";
	$res=mysql_query($sql);
	if($res){
		echo "注册成功，3秒钟后跳转到登录页面";
		echo "<meta http-equiv='refresh' content='3;url=login.html'>";
	}else{ 
		echo "注册失败，请重新注册";
		echo "<meta http-equiv='refresh' content='1;url=reg.php'>";
	}
}elseif($act=='login'){
	$sql=" select * from user where username='{$username}' and password='{$password}' ";
	$res=mysql_query($sql);
	$row=mysql_fetch_assoc($res);
	if($row){
		echo "登录成功，3秒钟后跳转到首面";
		echo "<meta http-equiv='refresh' content='3;url=http://www.imooc.com'/>";
	}else{
		echo "登录失败，请重新登录";
		echo "<meta http-equiv='refresh' content='1;url=http://www.login.com'/>";
	}
}
?>