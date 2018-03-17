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
         <?php 
		    $sql=mysqli_query($conn,"select * from tb_type order by id desc");
		    $info=mysqli_fetch_object($sql);
			if($info==false){
			  echo "本站暂无商品!";
			}else{
			  do{			    
				  echo "<span class=''><a href='showfenlei.php?id=".$info->id."'>".$info->typename."&nbsp;</a> | </span>";
			   }while($info=mysqli_fetch_object($sql)); 
		    }
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 商品分类</h3>
			</div>
			<div class="panel-body row">
			
			<?php
				if(!isset($_GET['id'])){
					$sql=mysqli_query($conn,"select * from tb_type order by id desc limit 0,1");
					$info=mysqli_fetch_array($sql);
					$id=$info['id'];
				}else{
					$id=$_GET['id'];
				}
				$sql1=mysqli_query($conn,"select * from tb_type where id=".$id."");
				$info1=mysqli_fetch_array($sql1);
				$sql=mysqli_query($conn,"select count(*) as total from tb_shangpin where typeid='".$id."' order by addtime desc ");
				$info=mysqli_fetch_array($sql);
				$total=$info['total'];
				if($total==0){
					echo "<div align='center'>本站暂无该类产品!</div>";
				}else{
			?>

			<?php
			$pagesize=3;
			if ($total<=$pagesize){
				$pagecount=1;
			} 
			if(($total%$pagesize)!=0){
				$pagecount=intval($total/$pagesize)+1;
			}else{
				$pagecount=$total/$pagesize;
			}
			if(!isset($_GET['page'])){
				$page=1;
			}else{
				$page=intval($_GET['page']);
			}
			$sql1=mysqli_query($conn,"select * from tb_shangpin where typeid=".$id." order by addtime desc limit ".($page-1)*$pagesize.",$pagesize ");
			while($info1=mysqli_fetch_array($sql1))
			{
		  ?>
		  
		  <?php
			 if($info1['tupian']==""){
			   echo "暂无图片!";
			 }else{
			?>
			<div class="col-md-3"><a href="lookinfo.php?id=<?php echo $info1['id'];?>"><img width="150" height="150" border="0" src="<?php echo $info1['tupian'];?>"></a></div>
              <?php
			 }
		?>
							<div class="col-md-5">
								<p>商品名称：<a href="lookinfo.php?id=<?php echo $info1['id'];?>"><?php echo $info1['mingcheng'];?></a></p>
								<p>商品品牌：<?php echo $info1['pinpai'];?></p>
								<p>商品型号：<?php echo $info1['xinghao'];?></p>
								<p>商品简介：<?php echo $info1['jianjie'];?></p>
								<p>上市日期：<?php echo $info1['addtime'];?></p>
							</div>
							<div class="col-md-4" style="margin-bottom:20px;">
								<p>剩余数量：<?php echo $info1['shuliang'];?></p>
								<p>商品等级：<?php echo $info1['dengji'];?></p>
								<p>商场价：<?php echo $info1['shichangjia'];?>元</p>
								<p>会员价：<?php echo $info1['huiyuanjia'];?>元</p>
								<p>折扣：<?php echo (@ceil(($info1['huiyuanjia']/$info1['shichangjia'])*100))."%";?></p>
								<p><a class="btn btn-danger btn-xs" href="addgouwuche.php?id=<?php echo $info1['id'];?>"><i class="fa fa-plus" aria-hidden="true"></i> 加入购物车</a></p>
							</div>
					<?php
						}
					?>
					<!-- <div class="col-md-6 col-md-offset-6">本站共有推荐产品&nbsp;<?php echo $total;?>&nbsp;件&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;件&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页 -->
				<?php
					// if($page>=2){
				?>
						<!-- <a href="showtuijian.php?page=1" title="首页"> 9 </a> <a href="showtuijian.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="前一页"> 7 </a> -->
				<?php
					// }
					// if($pagecount<=4){
					// 	for($i=1;$i<=$pagecount;$i++){
				?>
						<!-- <a href="showtuijian.php?page=<?php echo $i;?>"><?php echo $i;?></a> -->
				<?php
					// 	}
					// }else{
					// 	for($i=1;$i<=4;$i++){	 
				?>
						<!-- <a href="showtuijian.php?page=<?php echo $i;?>"><?php echo $i;?></a> -->
				<?php 
						// }
				?>
						<!-- <a href="showtuijian.php?page=<?php echo $page-1;?>" title="后一页"> 8 </a> <a href="showtuijian.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"> : </a></div> -->
				<?php 
					// }
				}
				?>


			</div>
		</div>
	</div>
</div>
<?php
 include("bottom.php");
?>