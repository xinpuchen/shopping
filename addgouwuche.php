<?php
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
session_start();
include("conn/conn.php");
if(!isset($_SESSION['username'])){
  echo "<script>alert('请先登录后购物!');history.back();</script>"; ;
 }
$id=strval($_GET['id']);
$sql=mysqli_query($conn,"select * from tb_shangpin where id='".$id."'"); 
$info=mysqli_fetch_array($sql);
if($info['shuliang']<=0){
   echo "<script>alert('该商品已经售完!');history.back();</script>";
 }
$array=explode("@",isset($_SESSION['producelist'])?$_SESSION['producelist']:"");
if(count($array)==1){
  	$_SESSION['producelist']=$_SESSION['producelist'].$id."@";
  	$_SESSION['quatity']=$_SESSION['quatity']."1@";
}
if(count($array)!=1){
	if(!in_array($id,$array)){
	    $_SESSION['producelist']=$_SESSION['producelist'].$id."@";
  		$_SESSION['quatity']=$_SESSION['quatity']."1@";
	}else{
	  	$arrayquatity=explode("@",$_SESSION['quatity']);
		$key=array_search($id,$array);
		$arrayquatity[$key]=$arrayquatity[$key]+1;
		$_SESSION['quatity']=implode("@",$arrayquatity);
	}
}
header("location:gouwu1.php");
?> 