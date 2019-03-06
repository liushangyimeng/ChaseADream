<?php
	 $con=mysql_connect('127.0.0.1','root','');
  
	//选库
	mysql_select_db('dream');

	//字符集
	mysql_query("set character set 'utf8'");
	mysql_query("set names 'utf8'");

?>