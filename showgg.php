<?php
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
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
				<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 公告</h3>
			</div>
			<div class="panel-body row">
			<?php
				$id=$_GET['id'];
				$sql=mysqli_query($conn,"select * from tb_gonggao where id='".$id."'");
				$info=mysqli_fetch_array($sql);
				include("function.php");
			?>
			<table class="table table-bordered table-hover text-c">
				<tbody>
					<tr>
						<td>公告主题：</td>
						<td><?php echo unhtml($info['title']);?></td>
					</tr>
					<tr>
						<td>发布时间：</td>
						<td><?php echo $info['time'];?></td>
					</tr>
					<tr>
						<td>公告内容：</td>
						<td><?php echo unhtml($info['content']);?></td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<?php
 include("bottom.php");
?>