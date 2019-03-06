<?php
header("Content-Type:text/html;charset=UTF-8");
session_start();
 require('./connect.php');
	if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"]===1){
		echo "<div id=j>";
		echo "<p>当前用户为:".$_SESSION["account"]. "&nbsp;";
		echo "<a href=logout.php>退出</a>&nbsp;&nbsp;";
		echo"<a href=shopdisplay.php>返回首页</a></p>";
		echo"</div>";
	}else{
			header("Location:./login.php");
			exit;
		}
		    $id =$_GET['id'];
			$sql="select account,comment from shop where id='{$id}'";
			$rst= mysql_query($sql);
			$row= mysql_fetch_array($rst);
?>
<html> 
		<head>
			<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />
			<title>display</title>
			<style>
			#j{
				height:100px;
				width:100%;
				background-color:red;
				font-size:20px;
		         font-family:黑体;
				text-align:right;
			}
			</style>
		</head>
		<body>
			<?php
				if ($row){
					echo "用户：";
					echo $row['account'];
					echo "<br/>";
					echo "简介：";
					echo $row['comment'];
				}
			
			?>
		</body>
	</html>