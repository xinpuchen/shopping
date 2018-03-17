<?php
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
?>
<?php
include("top.php");
include("function.php");
$spid=isset($_GET['spid'])?$_GET['spid']:"";
$id=$_GET['id'];
?>
<link href="css/style.css" rel="stylesheet">
<div class="row" style="margin-top:10px;">
	<div class="col-sm-3" style="width:260px;margin-right:5px;">
		<?php include("left.php");?>
	</div>
	<div class="col-sm-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 商品评论</h3>
			</div>
			<div class="panel-body row">
			<?php
				$sql=mysqli_query($conn,"select count(*) as total from tb_pingjia where spid='".$_GET['id']."'");
				$info=mysqli_fetch_array($sql);
				$total=$info['total'];
				if($total==0)
				{
					echo "&nbsp;&nbsp;&nbsp;&nbsp;本商品暂无评论信息!";
				}
				else
				{
					$pagesize=8;
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
						$sql1=mysqli_query($conn,"select * from tb_pingjia where spid='".$_GET['id']."' order by time desc limit ".($page-1)*$pagesize.",$pagesize ");
						while($info1=mysqli_fetch_array($sql1))
						{
					?>
					<table class="table table-bordered table-hover text-c">
							<tbody>
								<tr>
									<td>商品名称：</td>
									<td>		
									<?php 
										$spid=$info1['spid'];
										$sql2=mysqli_query($conn,"select mingcheng from tb_shangpin where id=".$spid."");
										$info2=mysqli_fetch_array($sql2);
										echo $info2['mingcheng'];
									?>
									</td>
									<td>评论者：</td>
									<td>
									<?php 
										$spid=$info1['userid'];
										$sql3=mysqli_query($conn,"select name from tb_user where id=".$spid."");
										$info3=mysqli_fetch_array($sql3);
										echo $info3['name'];
									?>
									</td>
									<td>评论时间：</td>
									<td><?php echo $info1['time'];?></td>
								</tr>
								<tr>
									<td>评论主题：</td>
									<td colspan="5"><?php echo unhtml($info1['title']);?></td>
								</tr>
								<tr>
									<td>评论内容：</td>
									<td colspan="5"><?php echo unhtml($info1['content']);?></td>
								</tr>
								<tr>
									<?php
									}
									?>
									<td colspan="9">本站共有该商品评论&nbsp;
								  <?php
									echo $total;
									?>
									&nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
									<?php
									if($page>=2)
									{
									?>
									<a href="showpl.php?page=1" title="首页"><font face="webdings"> 9 </font></a> <a href="showpl.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>&spid=<?php echo $spid;?>&id=<?php echo $id;?>" title="前一页"><font face="webdings"> 7 </font></a>
									<?php
									}
									if($pagecount<=4){
										for($i=1;$i<=$pagecount;$i++){
									?>
									<a href="showpl.php?page=<?php echo $i;?>&spid=<?php echo $spid;?>&id=<?php echo $id;?>"><?php echo $i;?></a>
									<?php
										}
									}else{
									for($i=1;$i<=4;$i++){	 
									?>
									<a href="showpl.php?page=<?php echo $i;?>&spid=<?php echo $spid;?>&id=<?php echo $id;?>"><?php echo $i;?></a>
									<?php }?>
									<a href="showpl.php?page=<?php echo $page-1;?>&spid=<?php echo $spid;?>&id=<?php echo $id;?>" title="后一页"><font face="webdings"> 8 </font></a> <a href="editgoods.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>&spid=<?php echo $spid;?>&id=<?php echo $id;?>" title="尾页"><font face="webdings"> : </font></a>
									<?php }?>
									</td>
								</tr>
							</tbody>
							<?php }?>
					</table>
			</div>
		</div>
	</div>
</div>
<?php
 include("bottom.php");
?>