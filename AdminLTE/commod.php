<?php include("./header.php"); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> 全部商品</h3>
                        <div class="box-tools pull-right">
                            <a href="./commodAdd.php" class="btn btn-danger" roal="button"><i class="fa fa-plus" aria-hidden="true"></i> 添加商品</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php
                            $sql=mysqli_query($conn,"select count(*) as total from tb_shangpin ");
                            $info=mysqli_fetch_array($sql);
                            $total=$info['total'];
                            if($total==0){
                            echo "本站暂无商品!";
                            }else{
                        ?>
                        <form class="form-horizontal" name="form1" method="post" action="./php/deleteCommod.php">
                            <table class="table table-bordered table-hover text-c">
                                <thead> 
                                    <tr>
                                        <th class="text-c">选择</th>
                                        <th class="text-c">名称</th>
                                        <th class="text-c">品牌</th>
                                        <th class="text-c">型号</th>
                                        <th class="text-c">剩余</th>
                                        <th class="text-c">市场价</th>
                                        <th class="text-c">会员价</th>
                                        <th class="text-c">卖出</th>
                                        <th class="text-c">加入时间</th>
                                        <th class="text-c">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                        $sql1=mysqli_query($conn,"select * from tb_shangpin order by addtime desc limit ".($page-1)*$pagesize.",$pagesize");
                                        while($info1=mysqli_fetch_array($sql1)){
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="<?php echo $info1['id'];?>" value=<?php echo $info1['id'];?>></td>
                                        <td><?php echo $info1['mingcheng'];?></td>
                                        <td><?php echo $info1['pinpai'];?></td>
                                        <td><?php echo $info1['xinghao'];?></td>
                                        <td><?php if($info1['shuliang']<0) {echo "售完";}else {echo $info1['shuliang'];}?></td>
                                        <td><?php echo $info1['shichangjia'];?></td>
                                        <td><?php echo $info1['huiyuanjia'];?></td>
                                        <td><?php echo $info1['cishu'];?></td>
                                        <td><?php echo $info1['addtime'];?></td>
                                        <td><a class="btn btn-danger btn-xs" href="commodEdit.php?id=<?php echo $info1['id'];?>">更改</a></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    <tr>
                                        <td><input name="submit" type="submit" class="btn btn-danger btn-sm" id="submit" value="删除"></td>
                                        <td colspan="9">本站共有货物&nbsp;
                                        <?php
                                           echo $total;
                                          ?>
                                        &nbsp;&nbsp;件&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;件&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
                                        <?php
                                          if($page>=2){
                                          ?>
                                        <a href="editgoods.php?page=1" title="首页"><font face="webdings"> 9 </font></a> <a href="editgoods.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
                                        <?php
                                          }
                                           if($pagecount<=4){
                                            for($i=1;$i<=$pagecount;$i++){
                                          ?>
                                        <a href="editgoods.php?page=<?php echo $i;?>"><?php echo $i;?></a>
                                        <?php
                                             }
                                           }else{
                                           for($i=1;$i<=4;$i++){	 
                                          ?>
                                        <a href="editgoods.php?page=<?php echo $i;?>"><?php echo $i;?></a>
                                        <?php }?>
                                        <a href="editgoods.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 8 </font></a> <a href="editgoods.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
                                        <?php }?>
                                        </td>
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
    </section>
</div>
<?php include("./footer.php"); ?>