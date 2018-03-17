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
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					<li data-target="#carousel-example-generic" data-slide-to="3"></li>
					<li data-target="#carousel-example-generic" data-slide-to="4"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active">
					<img src="./images/carousel-1" alt="carousel-1">
					<div class="carousel-caption"></div>
					</div>
					<div class="item">
					<img src="./images/carousel-2" alt="carousel-2">
					<div class="carousel-caption"></div>
					</div>
					<div class="item">
					<img src="./images/carousel-3" alt="carousel-3">
					<div class="carousel-caption"></div>
					</div>
					<div class="item">
					<img src="./images/carousel-4" alt="carousel-4">
					<div class="carousel-caption"></div>
					</div>
					<div class="item">
					<img src="./images/carousel-5" alt="carousel-5">
					<div class="carousel-caption"></div>
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 推荐商品</h3>
			</div>
			<div class="panel-body row">
				<?php
					$sql=mysqli_query($conn,"select * from tb_shangpin where tuijian=1 order by addtime desc limit 0,1");
					$info=mysqli_fetch_array($sql);
					if($info==false){
						echo "本站暂无推荐商品!";
					}
					else{
				?>
				<?php
					if(trim($info['tupian']=="")){
					echo "暂无图片";
					}
					else{
				?>
				<div class="col-xs-3"><img src="<?php echo $info['tupian'];?>" width="150" height="150" border="0"></div>
				<?php
					}
				?>
				<div class="col-xs-3">
					<p><?php echo $info['mingcheng'];?></p>
					<p>市场价：<?php echo $info['shichangjia'];?></p>
					<p>会员价：<?php echo $info['huiyuanjia'];?></p>
					<p>剩余数量：                                
					<?php 
						if($info['shuliang']>0)
						{
						echo $info['shuliang'];
						}
						else
						{
						echo "已售完";
						}
					?></p> 
					<div class="row"><div class="col-xs-12"><a class="btn btn-default btn-xs" href="lookinfo.php?id=<?php echo $info['id'];?>" role="button">查看详情</a>&nbsp;<a class="btn btn-danger btn-xs" href="addgouwuche.php?id=<?php echo $info['id'];?>" role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 加入购物车</a></div></div>
				</div>
				<?php
					}
				?>
				<?php
					$sql=mysqli_query($conn,"select * from tb_shangpin where tuijian=1 order by addtime desc limit 1,1");
					$info=mysqli_fetch_array($sql);
					if($info==true)
					{
				?>
				<?php
					if(trim($info['tupian']=="")){
					echo "暂无图片";
					}
					else{
				?>
				<div class="col-xs-3"><img src="<?php echo $info['tupian'];?>" width="150" height="150" border="0"></div>
				<?php
					}
				?>
				<div class="col-xs-3">
					<p><?php echo $info['mingcheng'];?></p>
					<p>市场价：<?php echo $info['shichangjia'];?></p>
					<p>会员价：<?php echo $info['huiyuanjia'];?></p>
					<p>剩余数量：                                
					<?php 
						if($info['shuliang']>0)
						{
						echo $info['shuliang'];
						}
						else
						{
						echo "已售完";
						}
					?></p> 
					<div class="row"><div class="col-xs-12"><a class="btn btn-default btn-xs" href="lookinfo.php?id=<?php echo $info['id'];?>" role="button">查看详情</a>&nbsp;<a class="btn btn-danger btn-xs" href="addgouwuche.php?id=<?php echo $info['id'];?>" role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 加入购物车</a></div></div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 最新商品</h3>
			</div>
			<div class="panel-body">
				<?php
					$sql=mysqli_query($conn,"select * from tb_shangpin order by addtime desc limit 0,1");
					$info=mysqli_fetch_array($sql);
					if($info==false){
					echo "本站暂无推荐产品!";
				}
				else{
				?>
				<?php
					if(trim($info['tupian']=="")){
					echo "暂无图片";
				}
				else{
				?>
					<div class="col-xs-3"><img src="<?php echo $info['tupian'];?>" width="150" height="150" border="0"></div>
					<?php
						}
				?>
				<div class="col-xs-3">
					<p><?php echo $info['mingcheng'];?></p>
					<p>市场价：<?php echo $info['shichangjia'];?></p>
					<p>会员价：<?php echo $info['huiyuanjia'];?></p>
					<p>剩余数量：                                
					<?php 
						if($info['shuliang']>0)
						{
						echo $info['shuliang'];
						}
						else
						{
						echo "已售完";
						}
					?></p> 
					<div class="row"><div class="col-xs-12"><a class="btn btn-default btn-xs" href="lookinfo.php?id=<?php echo $info['id'];?>" role="button">查看详情</a>&nbsp;<a class="btn btn-danger btn-xs" href="addgouwuche.php?id=<?php echo $info['id'];?>" role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 加入购物车</a></div></div>
				</div>
				<?php
					}
				?>
				<?php
					$sql=mysqli_query($conn,"select * from tb_shangpin order by addtime desc limit 1,1");
					$info=mysqli_fetch_array($sql);
					if($info==true)
					{
				?>
				<?php
					if(trim($info['tupian']=="")){
					echo "暂无图片";
				}
				else{
				?>
					<div class="col-xs-3"><img src="<?php echo $info['tupian'];?>" width="150" height="150" border="0"></div>
					<?php
						}
				?>
				<div class="col-xs-3">
					<p><?php echo $info['mingcheng'];?></p>
					<p>市场价：<?php echo $info['shichangjia'];?></p>
					<p>会员价：<?php echo $info['huiyuanjia'];?></p>
					<p>剩余数量：                                
					<?php 
						if($info['shuliang']>0)
						{
						echo $info['shuliang'];
						}
						else
						{
						echo "已售完";
						}
					?></p> 
					<div class="row"><div class="col-xs-12"><a class="btn btn-default btn-xs" href="lookinfo.php?id=<?php echo $info['id'];?>" role="button">查看详情</a>&nbsp;<a class="btn btn-danger btn-xs" href="addgouwuche.php?id=<?php echo $info['id'];?>" role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 加入购物车</a></div></div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 热门商品</h3>
			</div>
			<div class="panel-body">
			<?php
				$sql=mysqli_query($conn,"select * from tb_shangpin order by cishu desc limit 0,1");
				$info=mysqli_fetch_array($sql);
				if($info==false){
				echo "本站暂无推荐产品!";
			}
			else{
			?>
			<?php
				if(trim($info['tupian']=="")){
				echo "暂无图片";
			}
			else{
			?>
				<div class="col-xs-3"><img src="<?php echo $info['tupian'];?>" width="150" height="150" border="0"></div>
				<?php
					}
			?>
			<div class="col-xs-3">
				<p><?php echo $info['mingcheng'];?></p>
				<p>市场价：<?php echo $info['shichangjia'];?></p>
				<p>会员价：<?php echo $info['huiyuanjia'];?></p>
				<p>剩余数量：                                
				<?php 
					if($info['shuliang']>0)
					{
					echo $info['shuliang'];
					}
					else
					{
					echo "已售完";
					}
				?></p> 
				<div class="row"><div class="col-xs-12"><a class="btn btn-default btn-xs" href="lookinfo.php?id=<?php echo $info['id'];?>" role="button">查看详情</a>&nbsp;<a class="btn btn-danger btn-xs" href="addgouwuche.php?id=<?php echo $info['id'];?>" role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 加入购物车</a></div></div>
			</div>
			<?php
				}
			?>
			<?php
			  $sql=mysqli_query($conn,"select * from tb_shangpin order by cishu desc limit 1,1");
			  $info=mysqli_fetch_array($sql);
			  if($info==true)
			  {
			?>
			<?php
				if(trim($info['tupian']=="")){
				echo "暂无图片";
			}
			else{
			?>
				<div class="col-xs-3"><img src="<?php echo $info['tupian'];?>" width="150" height="150" border="0"></div>
				<?php
					}
			?>
			<div class="col-xs-3">
				<p><?php echo $info['mingcheng'];?></p>
				<p>市场价：<?php echo $info['shichangjia'];?></p>
				<p>会员价：<?php echo $info['huiyuanjia'];?></p>
				<p>剩余数量：                                
				<?php 
					if($info['shuliang']>0)
					{
					echo $info['shuliang'];
					}
					else
					{
					echo "已售完";
					}
				?></p> 
				<div class="row"><div class="col-xs-12"><a class="btn btn-default btn-xs" href="lookinfo.php?id=<?php echo $info['id'];?>" role="button">查看详情</a>&nbsp;<a class="btn btn-danger btn-xs" href="addgouwuche.php?id=<?php echo $info['id'];?>" role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 加入购物车</a></div></div>
			</div>
			<?php
				}
			?>
			</div>
		</div>
	</div>
</div>
<?php
 include("bottom.php");
?>
