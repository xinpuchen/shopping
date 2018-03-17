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
				<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 最新商品</h3>
			</div>
			<div class="panel-body row">
				<?php
					$sql=mysqli_query($conn,"select * from tb_shangpin order by addtime desc limit 0,4"); 
					$info=mysqli_fetch_array($sql);
					if($info==false){
					echo "本站暂无最新产品!";
					} 
					else{ 
						do{
							if($info['tupian']==""){
							echo "暂无图片!";
							}
							else{
							?>
							<div class="col-xs-3"><a href="lookinfo.php?id=<?php echo $info['id'];?>"><img width="150" height="150" border="0" src="<?php echo $info['tupian'];?>"></a></div>
							<?php
							}
							?>
							<div class="col-md-5">
								<p>商品名称：<a href="lookinfo.php?id=<?php echo $info['id'];?>"><?php echo $info['mingcheng'];?></a></p>
								<p>商品品牌：<?php echo $info['pinpai'];?></p>
								<p>商品型号：<?php echo $info['xinghao'];?></p>
								<p>商品简介：<?php echo $info['jianjie'];?></p>
								<p>上市日期：<?php echo $info['addtime'];?></p>
							</div>
							<div class="col-md-4" style="margin-bottom:20px;">
								<p>剩余数量：<?php echo $info['shuliang'];?></p>
								<p>商品等级：<?php echo $info['dengji'];?></p>
								<p>商场价：<?php echo $info['shichangjia'];?>元</p>
								<p>会员价：<?php echo $info['huiyuanjia'];?>元</p>
								<p>折扣：<?php echo (@ceil(($info['huiyuanjia']/$info['shichangjia'])*100))."%";?></p>
								<p><a class="btn btn-danger btn-xs" href="addgouwuche.php?id=<?php echo $info['id'];?>"><i class="fa fa-plus" aria-hidden="true"></i> 加入购物车</a></p>
							</div>
							<?php
					}while($info=mysqli_fetch_array($sql));
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php
 include("bottom.php");
?>