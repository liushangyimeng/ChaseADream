<?php
	session_start();
	$username = $_SESSION["account"];
	$_SESSION = array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),'',time()-4200,'/');
	}
	session_destroy();
?>
<html>
	<head>
	<meta charset="utf8">
	<title>退出系统</title>
	</head>
    <body>
		<p><?php echo $username ?>再见：</p>
		<p><a href="login.html">重新登录</a></p>
		<p><a href="index.html">返回首页</a></p>
	</body>
</html>