<?php
header("Content-Type:text/html;charset=UTF-8");
session_start();
require_once('./connect.php');
//error_reporting (0);
$account=$_POST['account'];
$password=$_POST['password'];
$identification =$_POST["identification"];
if($identification == 'shop'){
$sql1 = "select flag from shop where account='{$account}'";
}elseif($identification == 'student'){
	$sql1 = "select flag from student where account='{$account}'";
}
$result = mysql_query($sql1);
$row= mysql_fetch_array($result);
$flag = $row['flag'];
if($flag=='0'){
	echo"<script>alert('正在审核中，请稍后再进行登录！！！');window.location.href='./index.html'</script>";
}elseif($flag == '1'){
echo "ahskdjfkajs";
$sql="select * from $identification where account='{$account}' and password='{$password}' ";
$rst=mysql_query($sql);
$row=mysql_fetch_row($rst);
if($row){
	$_SESSION["account"] =$account;
	$_SESSION["flag"] = $flag;
	$_SESSION['isLogin']=1;
	echo"<script>alert('恭喜您！成功登录....')</script>";
	if($identification == 'shop'){
	header("location:studentdisplay.php");}elseif($identification == 'student'){
		header("location:shopdisplay.php");
	}
}
else{
	echo "<script>alert('账户或者密码错误，请重新登录！！！！');window.location.href='login.html'</script>";
}

}




?>