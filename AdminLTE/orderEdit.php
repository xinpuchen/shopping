<?php include("./header.php"); ?>

<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">编辑订单</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-danger" onClick="print()">打印订单</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php
                            $id=$_GET['id'];
                            $sql=mysqli_query($conn,"select * from tb_dingdan where id='".$id."'");
                            $info=mysqli_fetch_array($sql);
                        ?>
                        <form class="form-horizontal" name="form1" method="post" action="./php/saveorder.php?id=<?php echo $info['id'];?>">
                            <table class="table table-bordered table-hover text-c">
                                <thead>
                                    <tr>
                                        <th colspan="9">&nbsp;&nbsp;&nbsp;&nbsp;编辑物流</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="va-m">订单编号：</td>
                                        <td class="va-m"><?php echo $info['dingdanhao'];?></td>
                                        <td class="va-m">订单状态</td>
                                        <td class="va-m">
                                            <select class="form-control" name="state">
                                                <option value="">请选择</option>
                                                <option value="已收款" <?php if($info['zt']=='已收款'){echo 'selected';}?>>已收款</option>
                                                <option value="已发货" <?php if($info['zt']=='已发货'){echo 'selected';}?>>已发货</option>
                                                <option value="已收货" <?php if($info['zt']=='已收货'){echo 'selected';}?>>已收货</option>
                                            </select>
                                        </td>
                                        <td><input type="submit" value="修 改" class="btn btn-danger btn-sm"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <table class="table table-bordered table-hover text-c">
                            <thead>
                                <tr>
                                    <th colspan="7">&nbsp;&nbsp;&nbsp;&nbsp;商品信息</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>商品名称</td>
                                    <td>数量</td>
                                    <td>市场价</td>
                                    <td>会员价</td>
                                    <td>成交价</td>
                                    <td>折扣</td>
                                    <td>合计</td>
                                </tr>
                                <?php
                                $array=explode("@",$info['spc']);
                                $arraysl=explode("@",$info['slc']);
                                $total=0;
                                for($i=0;$i<count($array)-1;$i++)
                                    {
                                    if($array[$i]!="")
                                    {
                                    $sql1=mysqli_query($conn,"select * from tb_shangpin where id='".$array[$i]."'");
                                    $info1=mysqli_fetch_array($sql1);
                                    $total=$total+$info1['huiyuanjia']*$arraysl[$i];
                                ?>
                                <tr>
                                    <td><?php echo $info1['mingcheng'];?></td>
                                    <td><?php if($info1['shuliang']<0) echo "售完"; else echo $arraysl[$i];?></td>
                                    <td><?php echo $info1['shichangjia'];?></td>
                                    <td><?php echo $info1['huiyuanjia'];?></td>
                                    <td><?php echo $info1['huiyuanjia'];?></td>
                                    <td><?php echo ceil(($info1['huiyuanjia']/$info1['shichangjia'])*100);?>%</td>
                                    <td><?php echo $info1['huiyuanjia']*$arraysl[$i];?></td>
                                </tr>
                            <?php
                                }
                            }
                            ?> 
                            <tr><td colspan="9">合计：<?php echo $total;?>&nbsp;元&nbsp;</td></tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered table-hover text-c" style="margin-top:30px;">
                            <thead>
                                <tr>
                                    <th colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;收货人信息</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>收货人姓名：</td>
                                    <td><?php echo $info['shouhuoren'];?></td>
                                    <td>详细地址：</td>
                                    <td><?php echo $info['dizhi'];?></td>
                                </tr>
                                <tr>
                                    <td>邮　　编：</td>
                                    <td><?php echo $info['youbian'];?></td>
                                    <td>电　　话：</td>
                                    <td><?php echo $info['tel'];?></td>
                                </tr>
                                <tr>
                                    <td>电子邮件：</td>
                                    <td><?php echo $info['email'];?></td>
                                    <td>送货方式：</td>
                                    <td><?php echo $info['shff'];?></td>
                                </tr>
                                <tr>
                                    <td>留言：</td>
                                    <td colspan="3"><?php echo $info['leaveword'];?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="margin:10px 20px 10px 0"><input type="button" class="btn btn-danger btn-md pull-right" onClick="javascript:history.back();" value="返 回"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include("./footer.php"); ?>