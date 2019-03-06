<?php
  error_reporting(0);
  require('./connect.php');
  if (isset($_POST['submit'])) { 
  $account = $_POST["account"];
  $password = $_POST["password"]; 
  $name = $_POST["username"]; 
  $telephone = $_POST["telephone"]; 
  $email = $_POST["email"]; 
  $identification =$_POST["identification"];
  $comment = $_POST["comment"];
  $sql = "SELECT * FROM shop Where account = '$account'";
  $query=mysql_query($sql);
  $form_description = $_POST['form_description'];
  $form_data_name = $_FILES['form_data']['name'];
  $form_data_size = $_FILES['form_data']['size'];
  $form_data_type = $_FILES['form_data']['type'];
  $form_data = $_FILES['form_data']['tmp_name'];
  $flag = '0';
  $data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
  $rows=mysql_num_rows($query);
  if( $rows > 0){
  echo "<script>alert('此账号已经注册！重新填写');window.location.href='shopregister.html'</script>";}
  else{
	  $insertsql ="INSERT INTO shop (account, password, name, telephone, 
            email, comment,description,bin_data,filename,filesize,filetype,flag) VALUES ('$account', '$password', '$name', '$telephone',  '$email','$comment','$form_description','$data','$form_data_name','$form_data_size','$form_data_type','$flag')";
  }
   if (!(mysql_query($insertsql))){
   echo mysql_error();}
  }
			 
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>新增账号成功</title>
  </head>
  <body bgcolor="#FFFFFF">      
    <p align="center">恭喜您已经注册成功了，请等待管理员审核！！您的资料如下：（请勿按重新刷新按钮）<br>
      账号：<font color="#FF0000"><?php echo $account ?></font><br>
      密码：<font color="#FF0000"><?php echo $password ?></font><br>       
      请记下您的账号及密码，然后<a href="./index.html">登录网站</a>
    </p>
  </body>
</html>