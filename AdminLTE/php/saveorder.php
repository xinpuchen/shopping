<?php  
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
include_once('./conn.php');
$state=$_POST['state'];
$zt=$state;
 if($state==""){
    echo "<script>alert('请选择处理状态!');history.back();</script>";
	exit;
  }
 include("conn/conn.php");
 $sql3=mysqli_query($conn,"select * from tb_dingdan where id='".$_GET['id']."'");
 $info3=mysqli_fetch_array($sql3);
 if(trim($info3['zt'])=="未作任何处理"){
 $sql=mysqli_query($conn,"select * from tb_dingdan where id='".$_GET['id']."'");
 $info=mysqli_fetch_array($sql);
 $array=explode("@",$info['spc']);
 $arraysl=explode("@",$info['slc']);
 
 for($i=0;$i<count($array);$i++){
	 $id=$array[$i];
     $num=$arraysl[$i];
      mysqli_query($conn,"update tb_shangpin set cishu=cishu+'".$num."' ,shuliang=shuliang-'".$num."' where id='".$id."'");
    }
  }
 mysqli_query($conn,"update tb_dingdan set zt='".$zt."'where id='".$_GET['id']."'");
 header("location:../order.php");
?>