<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>电子商务后台管理系统</title>
    <link rel="stylesheet" href="./lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./lib/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="./lib/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="./lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./lib/BeAlert-master/BeAlert.css">
    <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="./dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="./dist/css/style.css">
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="login_bg">
    <noscript><h1>您的浏览器禁止了JS的使用，请在前往解除限制，展现最优显示效果</h1></noscript>
    <div class="container">
        <div class="row" style="margin-top: 80px;color:#fff;">
            <div class="col-lg-12 text-c">
                <h1><b>电子商务 </b><span style="font-size:32px;">后台管理系统</span></h1>
            </div>
            <div class="col-lg-12 text-c" style="margin: 30px 0 20px;">
                <h2>管理员登录</h2><br>
                <h5>欢迎您</h5>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4">
                        <form class="form-horizontal" name="form1" method="post" action="./php/chkadmin.php" onSubmit="return chkinput(this)">
                            <div class="form-group">
                                <input type="text" name="name" size="14" maxlength="20" class="form-control" placeholder="User">
                            </div>
                            <div class="form-group">
                                <input type="password" name="pwd" size="14" maxlength="20" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>
                                        <input type="checkbox"> 记住我
                                </label>
                                <span class="list hidden" style="float:right;">账号或密码错误</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-block"> 登 录 </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <script src="./lib/jquery/dist/jquery-3.0.0.min.js"></script>
    <script src="./lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./lib/fastclick/lib/fastclick.js"></script>
    <script src="./lib/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="./lib/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="./lib/BeAlert-master/BeAlert.js"></script>
    <script src="./dist/js/adminlte.min.js"></script>
    <script src="./dist/js/demo.js"></script>
    <script src="./dist/js/common.js"></script>
	<script>
		function chkinput(form){
			if(form.name.value==""){
			alert("请输入用户名!");
			form.name.select();
			return(false);
		}
		if(form.pwd.value==""){
			alert("请输入用户密码!");
			form.pwd.select();
			return(false);
		}
		return(true);
		}
	</script>
</body>

</html>