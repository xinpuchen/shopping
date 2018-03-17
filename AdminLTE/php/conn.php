<?php
	$conn=mysqli_connect("localhost","root","XXXXXXXX","db_shop") or die("数据库服务器连接错误".mysql_error());
	mysqli_query($conn,"set character set utf8");
	mysqli_query($conn,"set names utf8");
?>
