<?php
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
session_start();
include("conn/conn.php");
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
				<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 商品信息</h3>
			</div>
			<div class="panel-body row">
              <table class="table table-bordered table-hover text-c">
                <tr>
				  <td rowspan="5" style="padding:10px;width:25%">
					<?php
						$sql=mysqli_query($conn,"select * from tb_shangpin where id=".$_GET['id'].""); 
						$info=mysqli_fetch_object($sql);
						if($info->tupian==""){
							echo "暂无图片";
						}
						else
						{
					?>
					<a href="<?php echo $info->tupian;?>" target="_blank"><img src="<?php echo $info->tupian;?>" title="查看大图" alt="查看大图" width="100%"></a>
					<?php
						}
					?>
				  </td>
                  <td>商品名称：</td>
                  <td><?php echo $info->mingcheng;?></td>
                  <td>入市时间：</td>
                  <td><?php echo $info->addtime;?></td>
                </tr>
                <tr>
                  <td>会员价：</td>
                  <td><?php echo $info->huiyuanjia;?></td>
                  <td>市场价：</td>
                  <td><?php echo $info->shichangjia;?></td>
                </tr>
                <tr>
                  <td>等级：</td>
                  <td><?php echo $info->dengji;?></td>
                  <td>品牌：</td>
                  <td><?php echo $info->pinpai;?></td>
                </tr>
                <tr>
                  <td>型号：</td>
                  <td><?php echo $info->xinghao;?></td>
                  <td>数量：</td>
                  <td><?php echo $info->shuliang;?></td>
                </tr>
                <tr>
                  <td>商品简介：</td>
                  <td colspan="2"><?php echo $info->jianjie;?></td>
				  <td><a class="btn btn-danger btn-sm" href="addgouwuche.php?id=<?php echo $info->id;?>">放入购物车</a></td>
                </tr>
            	</table>
        <?php
	   if(isset($_SESSION['username']) && $_SESSION['username']!="")
	   {
	  
	  ?>
		<form class="form-horizontal" name="form1" method="post" action="savepj.php?id=<?php echo $info->id;?>" onSubmit="return chkinput(this)">
			<table class="table table-bordered table-hover text-c">
				<thead>
					<tr><th colspan="2">发表评论</th></tr>
				</thead>
				<script>
					function chkinput(form){
						if(form.title.value=="")
						{
							alert("请输入评论主题!");
							form.title.select();
							return(false);
						}
						if(form.content.value=="")
						{
							alert("请输入评论内容!");
							form.content.select();
							return(false);
						}
						return(true);
					}
				</script>
				<tbody>
					<tr>
						<td>评论主题：</td>
						<td><input  class="form-control"  type="text" name="title" size="30" placeholder="评论主题"></td>
					</tr>
					<tr>
						<td>评论内容：</td>
						<td><textarea  class="form-control"  name="content" cols="70" rows="10" placeholder="评论内容"></textarea></td>
					</tr>
					<tr>
						<td colspan="2" class="text-r" style="padding-right:30px;"><a href="showpl.php?id=<?php echo $_GET['id'];?>">查看该商品评论</a>&nbsp;&nbsp;&nbsp;&nbsp;<input name="submit2" type="submit" class="btn btn-danger btn-md" value="发表"></td>
					</tr>
				</tbody>
			</table>
		</form>
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