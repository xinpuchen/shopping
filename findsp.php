<?php
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
session_start();
?>
<?php 
  include("top.php"); 
?>
<link href="css/style.css" rel="stylesheet">
<div class="row" style="margin-top:10px;">
	<div class="col-sm-3" style="width:260px;margin-right:5px;">
		<?php include("left.php");?>
	</div>
	<div class="col-sm-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 搜索结果</h3>
			</div>
			<div class="panel-body row">
      <?php
		 $jdcz=$_POST['jdcz'];
		 $name=$_POST['name'];
		 $mh=isset($_POST['mh'])?$_POST['mh']:"";
		 $dx=isset($_POST['dx'])?$_POST['dx']:"";
		   if($dx=="1"){
			   $dx=">";
			}
			elseif($dx=="-1"){
			    $dx="<";
			 }
		    else{
			    $dx="=";
			 } 
		 $jg=intval(isset($_POST['jg'])?$_POST['jg']:"");
		
		 $lb=isset($_POST['lb'])?$_POST['lb']:"";
		if($jdcz!=""){
	     $sql=mysqli_query($conn,"select * from tb_shangpin where mingcheng like '%".$name."%' order by addtime desc");
		}
		else
		{
		   if($mh=="1"){
			  $sql=mysqli_query($conn,"select * from tb_shangpin where huiyuanjia $dx".$jg." and typeid='".$lb."' and mingcheng like '%".$name."%'");
			
			}
		    else{
			  $sql=mysqli_query($conn,"select * from tb_shangpin where huiyuanjia $dx".$jg." and typeid='".$lb."' and mingcheng = '".$name."'");
			}
		} 
		 $info=mysqli_fetch_array($sql);
		 if($info==false){
		   echo "<script language='javascript'>alert('本站暂无类似产品!');history.go(-1);</script>";
		  } 
		 else{
	?>
	<table class="table table-bordered table-hover text-c">
		<thead>
			<tr>
				<th class="text-c">名称</th>
				<th class="text-c">品牌</th>
				<th class="text-c">市场价</th>
				<th class="text-c">会员价</th>
				<th class="text-c">上市时间</th>
				<th class="text-c">操作</th>
			</tr>
		</thead>
			<?php
	 do{
	?>
		<tbody>
			<tr>
				<td><?php echo $info['mingcheng'];?></td>
				<td><?php echo $info['pinpai'];?></td>
				<td><?php echo $info['shichangjia'];?></td>
				<td><?php echo $info['huiyuanjia'];?></td>
				<td><?php echo $info['addtime'];?></td>
				<td><a href="lookinfo.php?id=<?php echo $info['id'];?>">查看</a> | <a href="addgouwuche.php?id=<?php echo $info['id'];?>">购物</a></td>
			</tr>
		</tbody>
			<?php
		 }while($info=mysqli_fetch_array($sql));
	 }
	?>
	</table>
			</div>
		</div>
	</div>
</div>
<?php
 include("bottom.php");
 ?>