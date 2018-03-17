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
				<h3 class="panel-title"><i class="fa fa-volume-down" aria-hidden="true"></i> 收货人信息</h3>
			</div>
			<div class="panel-body row">
			<script language="javascript">
			function chkinput(form){
				if(form.name.value==""){
					alert("请输入收货人姓名!");
					form.name.select();
					return(false);
					}
					if(form.dz.value==""){
					alert("请输入收货人地址!");
					form.dz.select();
					return(false);
					}
					if(form.yb.value==""){
					alert("请输入收货人邮编!");
					form.yb.select();
					return(false);
					}
					if(form.tel.value==""){
					alert("请输入收货人联系电话!");
					form.tel.select();
					return(false);
					}
					if(form.email.value==""){
					alert("请输入收货人E-mail地址!");
					form.email.select();
					return(false);
					
					}
					if(form.email.value.indexOf("@")<0){
						alert("收货人E-mail地址格式输入错误!");
						form.email.select();
						return(false);
					}
					return(true);
				}
			</script>
            <form class="form-horizontal" name="form1" method="post" action="savedd.php" onSubmit="return chkinput(this)">
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">收货人姓名：</label>
					<div class="col-sm-9">
						<input type="text" name="name2" size="19" class="form-control" id="" placeholder="收货人姓名" autofocus>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</label>
					<div class="col-sm-9">
						<select name="sex">
						<option selected value="男">男</option>
						<option value="女">女</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">邮政编码：</label>
					<div class="col-sm-9">
						<input type="text" name="yb" size="19" class="form-control" id="" placeholder="邮政编码" autofocus>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">联系电话：</label>
					<div class="col-sm-9">
						<input type="text" name="tel" size="19" class="form-control" id="" placeholder="联系电话" autofocus>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">电子邮箱：</label>
					<div class="col-sm-9">
						<input type="text" name="email" size="19" class="form-control" id="" placeholder="电子邮箱" autofocus>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">详细地址：</label>
					<div class="col-sm-9">
						<input type="text" name="dz" size="19" class="form-control" id="" placeholder="详细地址" autofocus>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">送货方式：</label>
					<div class="col-sm-9">
						<select name="shff" id="shff">
							<option selected value="普通平邮">普通平邮</option>
							<option value="特快专递">特快专递</option>
							<option value="送货上门">送货上门</option>
							<option value="个人送货">个人送货</option>
							<option value="E-mail">E-mail</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">支付方式：</label>
					<div class="col-sm-9">
						<select name="zfff" id="zfff">
							<option selected value="建设银行汇款">建设银行汇款</option>
							<option value="交通银行汇款">交通银行汇款</option>
							<option value="邮局汇款">邮局汇款</option>
							<option value="网上支付">网上支付</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">简单留言：</label>
					<div class="col-sm-9">
						<input type="text" name="ly" size="19" class="form-control" id="" placeholder="简单留言" autofocus>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-11 text-r">
						<input type="submit" name="submit2" size="19" class="btn btn-danger" value="提交订单">
					</div>
				</div>
            </form>
			<?php
			if(isset($_GET['dingdanhao']) && $_GET['dingdanhao']!=""){//如果订单号不为空
				$dd=$_GET['dingdanhao'];//获取订单号
				session_start();//初始化session变量
				$array=explode("@",$_SESSION['producelist']);//以子串@作为分割符将字符串分割开来，分割后的一个或多个子串以数组的形式返回
				$sum=count($array)*20+260;//计算窗体的显示高度
				echo" <script language='javascript'>";//JavaScript脚本标识语句开始
				echo" window.open('showdd.php?dd='+'".$dd."','newframe','top=150,left=200,width=600,height=".$sum.",menubar=no,toolbar=no,location=no,scrollbars=no,status=no ')";//在新窗口showdd.php页中输出订单信息
				echo "</script>";//JavaScript脚本标识语句结束
			}
			?>
			</div>
		</div>
	</div>
</div>
<?php
 include("bottom.php");
?>