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
				<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 订单查询</h3>
			</div>
			<div class="panel-body row">
				<script language="javascript">
					function chkinput3(form){
						if((form.username.value=="")&&(form.ddh.value=="")){
							alert("请输入下订单人或订单号");
							form.username.select();
							return(false);
						}
						return(true);
					}
				</script>
				<div class="col-sm-12">
					<form class="form-horizontal" name="form3" method="post" action="finddd.php" onSubmit="return chkinput3( this)">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">订&nbsp;&nbsp;&nbsp;单&nbsp;&nbsp;&nbsp;号：</label>
							<div class="col-sm-9">
								<input type="text" name="ddh" size="25" class="form-control" placeholder="订单号">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">下单人姓名：</label>
							<div class="col-sm-9">
								<input name="username" type="text" id="username" size="25" class="form-control" placeholder="下订单人姓名">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2 col-sm-offset-9 text-r">
								<input type="hidden" value="show_find" name="show_find">
								<input name="submit2" type="submit" class="btn btn-danger" value="查 找">
							</div>
						</div>
					</form>
				</div>
				<?php
				if(isset($_POST['show_find']) && $_POST['show_find']!=""){
					$username=trim($_POST['username']);
					$ddh=trim($_POST['ddh']);
					if($username==""){
						$sql=mysqli_query($conn,"select * from tb_dingdan where dingdanhao='".$ddh."'");
					}
					elseif($ddh==""){
						$sql=mysqli_query($conn,"select * from tb_dingdan where xiadanren='".$username."'");
					}
					else{
						$sql=mysqli_query($conn,"select * from tb_dingdan where xiadanren='".$username."'and dingdanhao='".$ddh."'");
					}
					$info=mysqli_fetch_array($sql);
					if($info==false){
						echo "<div class='col-sm-6 col-sm-offset-4'>对不起,没有查找到该订单!</div>";    
					}
					else{
				?>
					<table>
						<tr>
							<td width="77" height="25" bgcolor="#FFFFFF"><div align="center">订单号</div></td>
							<td width="77" bgcolor="#FFFFFF"><div align="center">下单用户</div></td>
							<td width="77" bgcolor="#FFFFFF"><div align="center">订货人</div></td>
							<td width="77" bgcolor="#FFFFFF"><div align="center">金额总计</div></td>
							<td width="77" bgcolor="#FFFFFF"><div align="center">付款方式</div></td>
							<td width="77" bgcolor="#FFFFFF"><div align="center">收款方式</div></td>
							<td width="77" bgcolor="#FFFFFF"><div align="center">订单状态</div></td>
							</tr>
				<?php
					do{
				?>
							<tr>
								<td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['dingdanhao'];?></div></td>
								<td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['xiadanren'];?></div></td>
								<td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['shouhuoren'];?></div></td>
								<td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['total'];?></div></td>
								<td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['zfff'];?></div></td>
								<td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['shff'];?></div></td>
								<td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['zt'];?></div></td>
							</tr>
				<?php
					}while($info=mysqli_fetch_array($sql));
				?>
			  </table>
			  <?php
					}
				}
			?>
			</div>
		</div>
	</div>
</div>
<?php
 include("bottom.php");
?>