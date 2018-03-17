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
				<h3 class="panel-title"><i class="fa fa-search" aria-hidden="true"></i> 高级搜索</h3>
			</div>
			<div class="panel-body">
				<script language="javascript">
					function chkinput1(form){
						if(form.name.value==""){
							alert("请输入关键字!");
							form.name.select();
							return(false);
						}
						if(form.jg.value==""){
							alert("请输入商品价格!");
							form.jg.select();
							return(false);
						}
						return(true);
					}
				</script>
				<form class="form-horizontal" name="form1" method="post" action="findsp.php" onSubmit="return chkinput1(this)">
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">关 键&nbsp;字:</label>
						<div class="col-sm-9">
							<input type="text" name="userpwd" size="19" class="form-control" id="name" placeholder="关键字">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">会员价格:</label>
						<div class="col-sm-4">
							<select name="dx" class="form-control">
								<option selected value="-1">小于</option>
								<option value="0">等于</option>
								<option value="1">大于</option>
							</select>
						</div>
						<div class="col-sm-5">
							<select name="jg" class="form-control">
								<option selected value=500>500</option>
								<option value=1000>1000</option>
								<option value=200>2000</option>
								<option value=5000>5000</option>
								<option value=10000>10000</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">商品类别:</label>
						<div class="col-sm-4">
							<select name="lb" class="form-control">
							<?php
								$sql=mysqli_query($conn,"select * from tb_type order by id desc");
								$info=mysqli_fetch_array($sql);
								if($info==false){
									echo " <option>本站暂无商品类别</option>";
								}else{ 
								do{
							?>
									<option value=<?php echo $info['id'];?>><?php echo $info['typename'];?></option>
									<?php
								}while($info=mysqli_fetch_array($sql));
							}
							?>
							</select>
						</div>
						<label for="" class="col-sm-2 control-label">模&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;糊:</label>
						<div class="col-sm-4" style="margin-top:8px;">
							<input type="checkbox" name="mh" class="" checked>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-9 text-r">
							<input type="submit" name="submit2" class="btn btn-danger" value="开始查找">
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