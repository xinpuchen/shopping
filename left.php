<?php 
include("Conn/conn.php");
?>
<div class="panel panel-danger hidden" style="border-color:#d9534f;">
		<div class="panel-heading" style="background-color:#d9534f;color:#fff;">
			<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 用户登录</h3>
		</div>
		<div class="panel-body">
			<script language="javascript">
				function chkuserinput(form){
				if(form.username.value==""){
					alert("请输入用户名!");
					form.username.select();
					return(false);
				}		
				if(form.userpwd.value==""){
					alert("请输入用户密码!");
					form.userpwd.select();
					return(false);
				}	
				if(form.yz.value==""){
					alert("请输入验证码!");
					form.yz.select();
					return(false);
				}	
				return(true);				 
				}
				function openfindpwd(){
				// window.open("openfindpwd.php","newframe","left=200,top=200,width=200,height=100,menubar=no,toolbar=no,location=no,scrollbars=no,location=no");
				}
			</script>
			<form class="form-horizontal" name="form2" method="post" action="chkuser.php" onSubmit="return chkuserinput(this)">
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">用户：</label>
					<div class="col-sm-8">
						<input type="text" name="username" size="19" class="form-control" id="" placeholder="用户">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">密码：</label>
					<div class="col-sm-8">
						<input type="password" name="userpwd" size="19" class="form-control" id="" placeholder="密码">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">验证：</label>
					<div class="col-sm-8">
						<input type="text" name="yz" size="10"  class="form-control" id="" placeholder="">
						<?php
							$num=intval(mt_rand(1000,9999));
							for($i=0;$i<4;$i++){
							echo "<img src=images/code/".substr(strval($num),$i,1).".gif>";
							}
						?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="hidden" value="<?php echo $num;?>" name="num">
						<a href="agreereg.php">注册</a>&nbsp;&nbsp;<a href="javascript:openfindpwd()">找回密码</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-default btn-sm" value="登 录">
					</div>
				</div>
			</form>
		</div>
</div>
<div class="panel panel-danger" style="border-color:#d9534f;">
		<div class="panel-heading" style="background-color:#d9534f;color:#fff;">
			<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 商城公告</h3>
		</div>
		<div class="panel-body">
			<?php
				$sql=mysqli_query($conn,"select * from tb_gonggao order by time desc limit 0,5");
				$info=mysqli_fetch_array($sql);
				if($info==false){
			?>
			<p>本站暂无公告</p>
			<?php
				}
				else{
					do{
			?>
			<p>
				<a href="showgg.php?id=<?php echo $info['id'];?>">
				<?php 
					echo substr($info['title'],0,24);
					if(strlen($info['title'])>24){
					echo "...";
					} 
				?>
				</a>
                  <?php
						}
					while($info=mysqli_fetch_array($sql));
					}
				?>
			</p>
		</div>
</div>
<div class="panel panel-danger" style="border-color:#d9534f;">
		<div class="panel-heading" style="background-color:#d9534f;color:#fff;">
			<h3 class="panel-title"><i class="fa fa-link" aria-hidden="true"></i> 友情链接</h3>
		</div>
		<div class="panel-body">
			<?php
				$sql=mysqli_query($conn,"select * from tb_links order by id desc limit 0,5");
				$info=mysqli_fetch_array($sql);
				if($info==false){
			?>
			<p>本站暂无友情链接!</p>
			<?php
				}
				else{
				do{
			?>
			<p>
				<a href="<?php echo $info['linkurl'];?>" target="_blank">
				<?php 
					echo substr($info['linkname'],0,24);
					if(strlen($info['linkname'])>24){
					echo "...";
					} 
				?>
				</a>
				<?php
						}
					while($info=mysqli_fetch_array($sql));
					}
				?>
			</p>
		</div>
</div>