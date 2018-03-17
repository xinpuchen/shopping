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

<?php
    session_start();
    if(!isset($_SESSION['name'])){
    echo "<script>alert('您还没有登录,请先登录!');location:./login.php;</script>";
    exit;
    }
    include("./php/conn.php");
?>

<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="index.php" class="logo">
                <span class="logo-mini"><b>jd</b></span>
                <span class="logo-lg"><b>电子商务</b>后台管理系统</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <?php
                            if(isset($_SESSION['name']) && $_SESSION['name']!=""){
                                echo "<li><a href='javascript:(0)'><i class='fa fa-user-circle-o fa-fw'></i>$_SESSION[name]</a></li>";
                                echo "<li><a href='logout.php'><i class='fa fa-sign-out fa-fw'></i> 注销 </a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="treeview">
                        <a href="orderSelect.php">
                        <i class="fa fa-search"></i><span> 订单查询</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="order.php">
                        <i class="fa fa-list-ul"></i><span> 订单管理</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li class=" treeview">
                        <a href="commod.php">
                            <i class="fa fa-laptop"></i><span> 商品管理</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="notice.php">
                        <i class="fa fa-volume-down"></i><span> 公告管理</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="comment.php">
                            <i class="fa fa-book"></i><span> 评论管理</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="user.php">
                            <i class="fa fa-user"></i><span> 用户管理</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>