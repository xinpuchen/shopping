<?php
session_start();
include("conn/conn.php");
$username=$_SESSION['username'];
$sql=mysqli_query($conn,"select * from tb_user where name='".$username."'",$conn);
$info=mysqli_fetch_array($sql);
$id=$info['id'];
mysqli_query($conn,"delete from tb_gowuche where userid=".$id."");
header("location:gouwu1.php");
?>