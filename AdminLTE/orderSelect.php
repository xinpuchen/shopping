<?php include("./header.php"); ?>

<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">订单查询</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool"></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" name="form3" method="post" action="orderSelect.php" onSubmit="return chkinput3( this)">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">下单人姓名：</label>
                                <div class="col-sm-3">
                                    <input type="text" name="username" class="form-control" placeholder="下单人姓名"autofocus>
                                </div>
                                <label for="" class="col-sm-1 control-label">订单号：</label>
                                <div class="col-sm-4">
                                    <input type="text" name="ddh" class="form-control" placeholder="订单号">
                                </div>
                                <div class="col-sm-1 text-r">
                                    <input type="hidden" value="show_find" name="show_find">
                                    <input type="submit" class="btn btn-danger btn-md" value="查 找">
                                </div>
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['show_find']) && $_POST['show_find']!=""){
                            $username=trim($_POST['username']);
                            $ddh=trim($_POST['ddh']);
                            if($username==""){
                                $sql=mysqli_query($conn,"select * from tb_dingdan where dingdanhao='".$ddh."'");
                            }
                            else if($ddh==""){
                                $sql=mysqli_query($conn,"select * from tb_dingdan where xiadanren='".$username."'");
                            }
                            else{
                                $sql=mysqli_query($conn,"select * from tb_dingdan where xiadanren='".$username."'and dingdanhao='".$ddh."'");
                            }
                            $info=mysqli_fetch_array($sql);
                            if($info==false){
                                echo "<div algin='center' style='margin-left:100px;color:red;'>对不起,没有查找到该订单!</div>";    
                            }
                            else{
                        ?>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">查看结果</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool"></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover text-c">
                            <thead>
                                <tr>
                                    <th class="text-c">订单号</th>
                                    <th class="text-c">下单人</th>
                                    <th class="text-c">订货人</th>
                                    <th class="text-c">金额总计</th>
                                    <th class="text-c">付款方式</th>
                                    <th class="text-c">收货方式</th>
                                    <th class="text-c">订单状态</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    do{
                                ?>
                                <tr>
                                    <td><?php echo $info['dingdanhao'];?></td>
                                    <td><?php echo $info['xiadanren'];?></td>
                                    <td><?php echo $info['shouhuoren'];?></td>
                                    <td><?php echo $info['total'];?></td>
                                    <td><?php echo $info['zfff'];?></td>
                                    <td><?php echo $info['shff'];?></td>
                                    <td><?php echo $info['zt'];?></td>
                                </tr>
                                <?php
                                    }while($info=mysqli_fetch_array($sql));
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                    }
                    }
                ?>
            </div>
        </div>
    </section>
</div>

<?php include("./footer.php"); ?>