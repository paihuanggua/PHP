<?php
	if(isset($_REQUEST['authcode'])){
		session_start();
		//echo $_REQUEST['authcode'];
		//echo $_SESSION['authcode'];
		if(strtolower($_REQUEST['authcode'])==$_SESSION['authcode']){
			echo '<font color="#0000CC">输入正确</font>';
		}else{
			echo '<font color="#CC0000">输入错误</font>';
		}
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>确认验证码</title>
</head>
<body>
	<form action="form.php" method="post">
		<p>
			验证码图片：
			<img id="img1" border="1" src="captcha4.php?r=<?php echo rand();?>" width="100" height="30">
			<a href="javascript:;" onclick="document.getElementById('img1').src='captcha4.php?r='+Math.random() ">换一个</a>
		</p>
		<p>请输入图片的内容：<input type="text" name="authcode" value=""></p>
		<p><input type="submit" value="提交" style="padding:6px 20px;"></p>
	</form>
</body>
</html>