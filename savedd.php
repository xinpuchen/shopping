<?php
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
session_start();//初始化session变量
include("conn/conn.php");//连接数据库文件
$sql=mysqli_query($conn,"select * from tb_user where name='".$_SESSION['username']."'");
$info=mysqli_fetch_array($sql);//检索用户数据表中的信息
$dingdanhao=date("YmjHis").$info['id'];//订单号=当前日期时间+用户的id号
$spc=$_SESSION['producelist'];//将用户购买的商品名称串赋给变量$spc
$slc= $_SESSION['quatity'];//将用户购买的商品数量串赋给变量$slc
$shouhuoren=$_POST['name2'];//获取收货人姓名
$sex=$_POST['sex'];//获取收货人性别
$dizhi=$_POST['dz'];//获取收货人地址
$youbian=$_POST['yb'];//获取收货人邮编
$tel=$_POST['tel'];//获取收货人电话
$email=$_POST['email'];//获取收货人E-mail地址
$shff=$_POST['shff'];//获取送货方式
$zfff=$_POST['zfff'];//获取支付方式
if(trim($_POST['ly'])==""){//如果用户留言为空
   $leaveword="";//则将$leaveword变量设为空
 }
 else{//否则获取用户的留言信息
   $leaveword=$_POST['ly'];
 }
 $xiadanren=$_SESSION['username'];//获取下单人名称，即当前用户
 $time=date("Y-m-j H:i:s");//获取系统当前时间
 $zt="未作任何处理";
 $total=$_SESSION['total'];//获取购物车内所有商品的累计金额
 mysqli_query($conn,"insert into tb_dingdan(dingdanhao,spc,slc,shouhuoren,sex,dizhi,youbian,tel,email,shff,zfff,leaveword,time,xiadanren,zt,total) values ('$dingdanhao','$spc','$slc','$shouhuoren','$sex','$dizhi','$youbian','$tel','$email','$shff','$zfff','$leaveword','$time','$xiadanren','$zt','$total')"); //将信息添加到tb_dingdan表
//  header("location:gouwu2.php?dingdanhao=$dingdanhao");//重新定位到收银台
 header("location:gouwu1.php");//重新定位到收银台
 ?>
