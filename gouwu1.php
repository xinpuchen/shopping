<?php
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
session_start();
if(!isset($_SESSION['username'])){
   echo "<script>alert('请先登录，后购物!');history.back();</script>";
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
				<h3 class="panel-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 我的购物车</h3>
			</div>
			<div class="panel-body">
				<?php
				if(isset($_GET['qk']) && $_GET['qk']=="yes"){
					$_SESSION['producelist']="";
				$_SESSION['quatity']=""; 
				}
				$arraygwc=explode("@",isset($_SESSION['producelist'])?$_SESSION['producelist']:"");
				$s=0;
				for($i=0;$i<count($arraygwc);$i++){
					$s+=intval($arraygwc[$i]);
				}
				if($s==0 ){
							echo"您的购物车为空";
				}
				else{ 
				?>
				<table class="table table-bordered table-hover text-c>
					<form class="form-horizontal" name="form1" method="post" action="gouwu1.php">
						<thead>
							<tr>
								<th class="text-c">商品名称</th>
								<th class="text-c">数量</th>
								<th class="text-c">市场价</th>
								<th class="text-c">会员价</th>
								<th class="text-c">折扣</th>
								<th class="text-c">小计</th>
								<th class="text-c">操作</th>
							</tr>
						</thead>
						<?php
						$total=0;
						$array=explode("@",$_SESSION['producelist']);
						$arrayquatity=explode("@",$_SESSION['quatity']);
						while(list($name,$value)=each($_POST)){
							for($i=0;$i<count($array)-1;$i++){
								if(($array[$i])==$name){
								$arrayquatity[$i]=$value;  
								}
							}
						}
						$_SESSION['quatity']=implode("@",$arrayquatity);
						
						for($i=0;$i<count($array)-1;$i++){ 
						$id=$array[$i];
						$num=$arrayquatity[$i];
						
						if($id!=""){
						$sql=mysqli_query($conn,"select * from tb_shangpin where id='".$id."'");
						$info=mysqli_fetch_array($sql);
						$total1=$num*$info['huiyuanjia'];
						$total+=$total1;
						$_SESSION["total"]=$total;
					?>
						<tbody class="text-c">
							<tr>
								<td><?php echo $info['mingcheng'];?></td>
								<td><input type="number" name="<?php echo $info['id'];?>" style="width:50px;margin:0 auto;" value=<?php echo $num;?>></td>
								<td><?php echo $info['shichangjia'];?>元</td>
								<td><?php echo $info['huiyuanjia'];?>元</td>
								<td><?php echo @(ceil(($info['huiyuanjia']/$info['shichangjia'])*100))."%";?></td>
								<td><?php echo $info['huiyuanjia']*$num."元";?></td>
								<td><a href="removegwc.php?id=<?php echo $info['id']?>">移除</a></td>
							</tr>
						</tbody>
						<?php
						}
						}
					?>
						<tfoot class="text-c">
							<tr>
								<td>总计：</td>
								<td><?php echo $total.'元';?></td>
								<td></td>
								<td></td>
								<td><input name="submit2" type="submit" class="btn hidden" value="更改商品数量"></td>
								<td><a href="gouwu1.php?qk=yes">清空购物车</a></td>
								<td><a href="gouwu2.php">去收银台</a></td>
							</tr>
						</tfoot>
						<?php
						}
						?>
					</form>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
 include("bottom.php");
?>