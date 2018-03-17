<?php
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
session_start();
$title=$_POST['title'];
$content=$_POST['content'];
$time=date("Y-m-j");
include("conn/conn.php");

$sql=mysqli_query($conn,"select * from tb_user where name='".$_SESSION[username]."'");
$info=mysqli_fetch_array($sql);
$userid=$info['id'];
mysqli_query($conn,"insert into tb_leaveword (title,content,time,userid) values ('$title','$content','$time','$userid')");
header("location:userleaveword.php");
?>