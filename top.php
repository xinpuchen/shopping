<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>电子商务网</title>
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./lib/BeAlert-master/BeAlert.css">
    <link rel="stylesheet" href="./css/style.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="./lib/jquery/jquery-2.1.4.min.js"></script>
</head>
<?php
   include("conn/conn.php");
?>
<body>
<!-- 登录模态框 -->
<div class="modal fade" id="loginModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">用户登录</h4>
			</div>
			<div class="modal-body">
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
						$('#loginTop').addClass('hidden');
						$('#loginBottom').removeClass('hidden');
						// window.open("openfindpwd.php");
					}
				</script>
				<div class="row" id="loginTop">
					<div class="col-xs-12">
						<form class="form-horizontal" name="form2" method="post" action="chkuser.php" onSubmit="return chkuserinput(this)">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">用户：</label>
								<div class="col-sm-9">
									<input type="text" name="username" size="19" class="form-control" id="" placeholder="用户" autofocus>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">密码：</label>
								<div class="col-sm-9">
									<input type="password" name="userpwd" size="19" class="form-control" id="" placeholder="密码">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">验证：</label>
								<div class="col-sm-9">
									<input type="text" name="yz" size="10"  class="form-control" id="" placeholder="验证码">
									<?php
										$num=intval(mt_rand(1000,9999));
										for($i=0;$i<4;$i++){
										echo "<img src=images/code/".substr(strval($num),$i,1).".gif>";
										}
									?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2 col-sm-offset-7">
									<a href="#" onclick="openfindpwd()" real="button">找回密码</a>
								</div>
								<div class="col-sm-2">
									<input type="hidden" value="<?php echo $num;?>" name="num">
									<input name="submit" type="submit" class="btn btn-danger" value="登 录">
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row hidden" id="loginBottom">
					<div class="col-xs-12">
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 注册模态框 -->
<div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">注 册</h4>
			</div>
			<div class="modal-body">
				<div class="row" id="agreexy">
					<div class="col-xs-10 col-xs-offset-1">
						<ul>
							<li>欢迎您注册为本论坛的用户,作为论坛用户必须要遵守以下协议:</li>
							<br>
							<li>1、不得违反国家的法律法规。</li>
							<li>2、诚实进行商品交易。</li>
							<li>3、管理员有权删除您的信息,留言等。</li>
							<li>4、不得发表不文明的言论。</li><br>
						</ul>
					</div>
					<div class="col-xs-4 col-xs-offset-7">
						<a class="btn btn-default" href="index.php" data-dismiss="modal">我不同意</a>&nbsp;&nbsp;
						<a class="btn btn-danger" href="#" onclick="hiddenAgree();">我同意</a>
					</div>
				</div>
				<div class="row hidden" id="agreezc">
					<div class="col-xs-12">
						<form class="form-horizontal" name="form1" method="post" action="savereg.php" onSubmit="return chkinput(this)">
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">用户昵称：</label>
								<div class="col-sm-8">
									<input type="text" name="usernc" size="25" class="form-control" id="usernc" onblur="chknc($(this).val())" placeholder="用户昵称">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">注册密码：</label>
								<div class="col-sm-8">
									<input type="password" name="p1" size="25" class="form-control" id="" placeholder="注册密码">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">确认密码：</label>
								<div class="col-sm-8">
									<input type="password" name="p2" size="25" class="form-control" id="" placeholder="确认密码">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">E - mail：</label>
								<div class="col-sm-8">
									<input type="text" name="email" size="25" class="form-control" id="" placeholder="E-mail">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">QQ 号码：</label>
								<div class="col-sm-8">
									<input type="text" name="qq" size="25"  class="form-control" id="" placeholder="QQ号码">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">邮政编码：</label>
								<div class="col-sm-8">
									<input type="text" name="yb" size="25" class="form-control" id="" placeholder="邮政编码">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">联系电话：</label>
								<div class="col-sm-8">
									<input type="text" name="tel" size="25" class="form-control" id="" placeholder="联系电话">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">真实姓名：</label>
								<div class="col-sm-8">
									<input type="text" name="truename" size="25" class="form-control" id="" placeholder="真实姓名">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">身份证号：</label>
								<div class="col-sm-8">
									<input type="text" name="sfzh" size="25" class="form-control" id="" placeholder="身份证号">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">家庭住址：</label>
								<div class="col-sm-8">
									<input type="text" name="dizhi" size="25" class="form-control" id="" placeholder="家庭住址">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">密码提示：</label>
								<div class="col-sm-4">
									<select name="ts1" class="form-control">
										<option selected value=1>请选择问题</option>
										<option value="您的生日">您的生日</option>
										<option value="你的爱好">你的爱好</option>
										<option value="您母亲的名字">您母亲的名字</option>
										<option value="您父亲的名字">您父亲的名字</option>
										<option value="您最喜欢的花">您最喜欢的花</option>
									</select>
								</div>
								<div class="col-sm-4">
									<input type="text" name="ts2" size="15" class="form-control" id="" placeholder="其它问题">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">提示答案：</label>
								<div class="col-sm-8">
									<input type="text" name="tsda" size="25" class="form-control" id="" placeholder="提示答案">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2 col-sm-offset-7">
									<input name="reset" type="reset" class="btn btn-default" value="重 置">
								</div>
								<div class="col-sm-2">
									<input name="submit2" type="submit" class="btn btn-danger" value="注 册">
								</div>
							</div>
						</form>
					</div>
				</div>
				
	<script>
	function chknc(nc){
		var xmlhttp;
		if(window.ActiveXObject){
			xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
		}else{
			xmlhttp=new XMLHttpRequest();
		}
		xmlhttp.open("GET","chkusernc.php?nc="+nc,true);
		xmlhttp.onreadystatechange=function(){
		console.log(xmlhttp.readystate);
			// if(xmlhttp.readystate==4 && xmlhttp.status==200){
			if(xmlhttp.status==200){
				var msg=xmlhttp.responseText;
				if(msg==1){
					alert("该昵称已被使用！");
					$("input[name='usernc']").val("");

				}
			}
		}
		xmlhttp.send(null);
	}
	function chkinput(form){
		if(form.usernc.value==""){
			alert("请输入昵称!");
			form.usernc.select();
			return(false);
		}
		if(form.p1.value==""){
			alert("请输入注册密码!");
			form.p1.select();
			return(false);
		}
		if(form.p2.value==""){
			alert("请输入确认密码!");
			form.p2.select();
			return(false);
		}	
		if(form.p1.value.length<6){
			alert("注册密码长度应大于6!");
			form.p1.select();
			return(false);
		}	
		if(form.p1.value!=form.p2.value){
			alert("密码与重复密码不同!");
			form.p1.select();
			return(false);
		}
		if(form.email.value==""){
			alert("请输入电子邮箱地址!");
			form.email.select();
			return(false);
		}
		if(form.email.value.indexOf('@')<0){
			alert("请输入正确的电子邮箱地址!");
			form.email.select();
			return(false);
		}
		if(form.tel.value==""){
			alert("请输入联系电话!");
			form.tel.select();
			return(false);
		}
		if(form.truename.value==""){
			alert("请输入真实姓名!");
			form.truename.select();
			return(false);
		}
		if(form.sfzh.value==""){
			alert("请输入身份证号!");
			form.sfzh.select();
			return(false);
		}
		if(form.dizhi.value==""){
			alert("请输入家庭住址!");
			form.dizhi.select();
			return(false);
		}
		if(form.tsda.value==""){
			alert("请输密码提示答案!");
			form.tsda.select();
			return(false);
		}
		if((form.ts1.value==1)&&(form.ts2.value=="")){
			alert("请选择或输入密码提示答案!");
			form.ts2.select();
			return(false);
		}
		return(true);
	}
	function hiddenAgree(){
		$('#agreexy').addClass('hidden');
		$('#agreezc').removeClass('hidden');
	}
	</script>			
			</div>
		</div>
	</div>
</div>
<!-- 页首 -->
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<a href="index.php"><img style="width:230px;" src="images/logo.jpg" alt="logo"></a>
		</div>
		<div class="col-md-9">
			<div class="row" style="padding-right:30px;">
				<div class="col-sm-3 col-sm-offset-9 text-r">
					<?php
						if(isset($_SESSION['username']) && $_SESSION['username']!=""){
							echo "<a href='javascriptusername:(0)'><i class='fa fa-user-circle-o fa-fw'></i> $_SESSION[username]</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='logout.php'><i class='fa fa-sign-out fa-fw'></i> 注销 </a>";
						}else{
							echo "<a href='#' data-toggle='modal' data-target='#loginModel'>你好！请登录</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' data-toggle='modal' data-target='#regModal' style='color:#d9534f;'>免费注册</a>";
						}
					?>
				</div>
				<div class="col-sm-10" style="margin-top:40px;">
					<form name="form" method="post" action="findsp.php">
						<div class="input-group">
							<input type="text" name="name" class="form-control" placeholder="请输入产品名称 · · ·">
							<input type="hidden" name="jdcz" value="jdcz">
							<div class="input-group-btn">
								<button name="submit" type="submit" class="btn btn-danger" style="display:inline;"><i class="fa fa-search" aria-hidden="true"></i></button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-2 text-r" style="margin:40px 0 60px 0;">
					<button name="button" type="button" class="btn btn-danger" onclick="javascript:window.location='highfind.php';">高级搜索</button>
				</div>
				<div class="row">
					<div class="col-sm-11 menu">
						<a href="index.php">首 页</a>
						<a href="shownew.php">最 新</a>
						<a href="showtuijian.php">推 荐</a>
						<a href="showhot.php">热 门</a>
						<a href="showfenlei.php">分 类</a>
						<a href="finddd.php">订单查询</a>
						<a href="usercenter.php">用户中心</a>
						<a href="gouwu1.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;我的购物车</a>
					</div>
				</div>
			</div>
		</div>
	</div>