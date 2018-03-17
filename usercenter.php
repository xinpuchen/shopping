<?php
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
session_start();
if(!isset($_SESSION['username'])){
  echo "<script>alert('您还没有登录,请先登录!');history.back();</script>";
  exit;
 }
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
				<h3 class="panel-title"><i class="fa fa-user-circle-o fa-fw"></i> <?php echo $_SESSION['username'];?>的所有信息</h3>
			</div>
			<div class="panel-body row">
			<script language="javascript">
				function chkinput1(form) {
					if(form.email.value==""){
						alert("电子邮箱不能为空!");
						form.email.select();
						return(false);
					}
					if(form.email.value.indexOf('@')<0){
						alert("电子邮箱输入错误!");
						form.email.select();
						return(false);
					}
					if(form.truename.value==""){
						alert("真实姓名不能为空!");
						form.truename.select();
						return(false);
					}
					if(form.sfzh.value==""){
						alert("身份证号不能为空!");
						form.sfzh.select();
						return(false);
					}
					if(form.tel.value==""){
						alert("联系电话不能为空!");
						form.tel.select();
						return(false);
					} 
					if(form.dizhi.value==""){
						alert("联系地址不能为空!");
						form.dizhi.select();
						return(false);
					}
					return(true);
				}
			</script>
			
			<form class="form-horizontal" name="form1" method="post" action="changeuser.php" onsubmit="return chkinput1(this)">
                <?php
					$sql=mysqli_query($conn,"select * from tb_user where name='".$_SESSION['username']."'");
					$info=mysqli_fetch_array($sql);
				?>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称：</label>
					<div class="col-sm-9" style="padding-top:6px;">
						<?php echo $_SESSION['username'];?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">真实姓名：</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="truename" size="25" value="<?php echo $info['truename'];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">E - mail：</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="email" size="25" value="<?php echo $info['email'];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">QQ 号码：</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="qq" size="25" value="<?php echo $info['qq'];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">联系电话：</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="tel" size="25" value="<?php echo $info['tel'];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">家庭住址：</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="dizhi" size="25" value="<?php echo $info['dizhi'];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">邮政编码：</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="youbian" size="25" value="<?php echo $info['youbian'];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">身份证号：</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="sfzh" size="25" value="<?php echo $info['sfzh'];?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-9">
						<input class="btn btn-danger" name="submit2" type="submit" value="更改">
				  		<input class="btn" name="reset" type="reset" value="取消">
					</div>
				</div>
              </form>
			</div>
		</div>
	</div>
</div>
<?php
 include("bottom.php");
?>
