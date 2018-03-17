<?php
    include("./header.php");
?>

<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">全部订单</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool"></button>
                        </div>
                    </div>
                    <div class="box-body">
                    <?php
                        $sql=mysqli_query($conn,"select count(*) as total from tb_dingdan ");
                        $info=mysqli_fetch_array($sql);
                        $total=$info['total'];
                        if($total==0){
                            echo "本站暂无订单!";
                        }
                        else{
                            $pagesize=10;
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
                            $sql1=mysqli_query($conn,"select * from tb_dingdan order by time desc limit ".($page-1)*$pagesize.",$pagesize");
                            $info1=mysqli_fetch_array($sql1);
                    ?>
                    <form class="form-horizontal" name="form1" method="post" action="./php/deletedd.php">
                        <table class="table table-bordered table-hover text-c">
                            <thead> 
                                <tr>
                                    <th class="text-c">选择</th>
                                    <th class="text-c">订单号</th>
                                    <th class="text-c">下单人</th>
                                    <th class="text-c">订货人</th>
                                    <th class="text-c">金额总计</th>
                                    <th class="text-c">付款方式</th>
                                    <th class="text-c">收货方式</th>
                                    <th class="text-c">订单状态</th>
                                    <th class="text-c">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                do{
                                    $array=explode("@",$info1['spc']);
                                    $sum=count($array)*20+260;
                                ?>
                                <tr>
                                    <td>
                                        <input class="btn btn-sm btn-default" type="checkbox"  name=<?php echo $info1['id'];?> value="<?php echo $info1['id'];?>">
                                    </td>
                                    <td><?php echo $info1['dingdanhao'];?></td>
                                    <td><?php echo $info1['xiadanren'];?></td>
                                    <td><?php echo $info1['shouhuoren'];?></td>
                                    <td><?php echo $info1['total'];?></td>
                                    <td><?php echo $info1['zfff'];?></td>
                                    <td><?php echo $info1['shff'];?></td>
                                    <td><?php echo $info1['zt'];?></td>
                                    <td>
                                        <a href="orderEdit.php?id=<?php echo $info1['id'];?>" class="btn btn-sm btn-danger" role="button">编 辑</a>
                                    </td>
                                </tr>
                                <?php
                                }while($info1=mysqli_fetch_array($sql1))
                                ?>
                                <tr>                                            
                                    <td>
                                        <input type="hidden" name="page_id" value=<?php echo $page;?>>
                                        <input type="submit" value="删除" class="btn btn-danger btn-sm">
                                    </td>
                                    <td colspan="8">
                                        本站共有订单
                                            <?php
                                            echo $total;
                                            ?>        
                                            &nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
                                            <?php
                                            if($page>=2)
                                            {
                                            ?>
                                            <a href="order.php?page=1" title="首页"><font face="webdings"> 首页 </font></a>
                                            <a href="order.php?id=<?php echo $info1['id'];?>&page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 前一页 </font></a>
                                            <?php
                                            }
                                            if($pagecount<=4){
                                                for($i=1;$i<=$pagecount;$i++){
                                            ?>
                                            <a href="order.php?page=<?php echo $i;?>"><?php echo $i;?></a>
                                            <?php
                                                }
                                            }else{
                                            for($i=1;$i<=4;$i++){	 
                                            ?>
                                            <a href="order.php?page=<?php echo $i;?>"><?php echo $i;?></a>
                                            <?php }?>
                                            <a href="order.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 后一页 </font></a> 
                                            <a href="order.php?id=<?php echo $info1['id'];?>&page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> 尾页 </font></a>
                                            <?php }?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                        }
                        ?>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include("./footer.php"); ?>