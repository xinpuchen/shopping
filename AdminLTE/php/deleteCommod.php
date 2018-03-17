<?php
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
 include("./conn.php");
 while(list($name,$value)=each($_POST))
  {
      $sql=mysqli_query($conn,"select tupian from tb_shangpin where id='".$value."'");
	  $info=mysqli_fetch_array($sql);
	  if($info['tupian']!="")
	  {
	     @unlink(substr($info['tupian'],6,(strlen($info['tupian'])-6)));
		
	  }
	  $sql1=mysqli_query($conn,"select * from tb_dingdan ");
	  while($info1=mysqli_fetch_array($sql1))
	  {  $id1=$info1['id'];
	     $array=explode("@",$info1['spc']);
	     for($i=0;$i<count($array);$i++){
	        if($array[$i]==$value)
			 {
			   mysqli_query($conn,"delete from tb_dingdan where id='".$id1."'");
			 }
	      }
	  }
      mysqli_query($conn,"delete from tb_shangpin where id='".$value."'");
	  mysqli_query($conn,"delete from tb_pingjia where spid='".$value."'");
  }
 header("location:../commod.php"); 
?>