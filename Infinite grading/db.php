<?php
$db_host='localhost';
$db_user='root';
$db_password='root';
$db_name='db';
$link=mysql_connect($db_host,$db_user,$db_password) or die(mqsql_error());
mysql_select_db($db_name,$link) or die(mqsql_error());
mysql_query('set names utf8')  or die('编码设置错误');
?>