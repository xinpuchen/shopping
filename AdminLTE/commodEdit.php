<?php include("./header.php"); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> 编辑商品</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool"></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php 
                            $sql1=mysqli_query($conn,"select * from tb_shangpin where id=".$_GET['id']."");
                            $info1=mysqli_fetch_array($sql1);
                        ?>
                        <script language="javascript">
                            function chkinput(form){
                            if(form.mingcheng.value==""){
                                alert("请输入商品名称!");
                                form.mingcheng.select();
                                return(false);
                            }
                            if(form.huiyuanjia.value==""){
                                alert("请输入商品会员价!");
                                form.huiyuanjia.select();
                                return(false);
                            }
                            if(form.shichangjia.value==""){
                                alert("请输入商品市场价!");
                                form.shichangjia.select();
                                return(false);
                            }
                            if(form.dengji.value==""){
                                alert("请输入商品等级!");
                                form.dengji.select();
                                return(false);
                            }
                            if(form.pinpai.value==""){
                                alert("请输入商品品牌!");
                                form.pinpai.select();
                                return(false);
                            }
                            if(form.xinghao.value==""){
                                alert("请输入商品型号!");
                                form.xinghao.select();
                                return(false);
                            }
                            if(form.shuliang.value==""){
                                alert("请输入商品数量!");
                                form.shuliang.select();
                                return(false);
                            }
                            if(form.jianjie.value==""){
                                alert("请输入商品简介!");
                                form.jianjie.select();
                                return(false);
                            }
                            return(true);
                            }
                        </script>
                        <form class="form-horizontal" name="form1"  enctype="multipart/form-data" method="post" action="./php/saveCommodEdit.php?id=<?php echo $_GET['id'];?>" onSubmit="return chkinput(this)">
                            <table class="table table-bordered table-hover text-c">
                                <tbody>
                                    <tr>
                                        <td class="va-m">商品名称：</td>
                                        <td class="va-m"><input type="text" name="mingcheng" size="25"class="form-control" value="<?php echo $info1['mingcheng'];?>" placeholder="商品名称"></td>
                                        <td class="va-m">上市时间：</td>
                                        <td class="va-m"><input type="text" name="addtime" class="form-control" value="<?php echo $info1['addtime'];?>" placeholder="上市时间"></td>
                                        <td class="va-m">市场价：</td>
                                        <td class="va-m"><input type="text" name="shichangjia" size="10"class="form-control" value="<?php echo $info1['shichangjia'];?>" placeholder="市场价"></td>
                                    </tr>
                                    <tr>
                                        <td class="va-m">会员价：</td>
                                        <td class="va-m"><input type="text" name="huiyuanjia" size="10"class="form-control" value="<?php echo $info1['huiyuanjia'];?>" placeholder="会员价"></td>
                                        <td class="va-m">商品类型：</td>
                                        <td class="va-m">
                                        <?php
                                            $sql=mysqli_query($conn,"select * from tb_type order by id desc");
                                            $info=mysqli_fetch_array($sql);
                                            if($info==false){
                                            echo "请先添加商品类型!";
                                            }else{
                                            ?>
                                                <select name="typeid"class="form-control">
                                                <?php
                                            do{
                                            ?>
                                                <option value=<?php echo $info['id'];?> <?php if($info1['typeid']==$info['id']) {echo "selected";}?>><?php echo $info['typename'];?></option>
                                                <?php
                                            }
                                            while($info=mysqli_fetch_array($sql));
                                            ?>
                                                </select>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="va-m">商品等级：</td>
                                        <td class="va-m">
                                            <select name="dengji" class="form-control">
                                            <option value="精品" <?php if(trim($info1['dengji'])=="精品"){echo "selected";}?>>精品</option>
                                            <option value="一般" <?php if(trim($info1['dengji'])=="一般"){echo "selected";}?>>一般</option>
                                            <option value="二手" <?php if(trim($info1['dengji'])=="二手"){echo "selected";}?>>二手</option>
                                            <option value="淘汰" <?php if(trim($info1['dengji'])=="淘汰"){echo "selected";}?>>淘汰</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="va-m">商品品牌：</td>
                                        <td class="va-m"><input type="text" name="pinpai" class="form-control" size="20" value="<?php echo $info1['pinpai'];?>" placeholder="商品品牌"></td>
                                        <td class="va-m">商品型号：</td>
                                        <td class="va-m"><input type="text" name="xinghao" class="form-control" size="20" value="<?php echo $info1['xinghao'];?>" placeholder="商品型号"></td>
                                        <td class="va-m">是否推荐：</td>
                                        <td>
                                            <select name="tuijian" class="form-control" >
                                                <option value=1 <?php if($info1['tuijian']==1) {echo "selected";}?>>是</option>
                                                <option value=0 <?php if($info1['tuijian']==0) {echo "selected";}?>>否</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="va-m">商品数量：</td>
                                        <td class="va-m"><input type="text" name="shuliang" class="form-control" size="20" value="<?php echo $info1['shuliang'];?>" placeholder="商品数量"></td>
                                        <td class="va-m">商品图片：</td>
                                        <td class="va-m" colspan="3"><input type="hidden" name="MAX_FILE_SIZE" value="2000000"><input name="upfile" type="file" class="" id="upfile"></td>
                                    </tr>
                                    <tr>
                                        <td class="va-m">商品简介：</td>
                                        <td class="va-m" colspan="5"><textarea name="jianjie" cols="156" rows="3" class=""><?php echo $info1['jianjie'];?></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-r">
                                <input class="btn btn-default" type="button" value="取消" onclick="history.back();">
                                <input class="btn btn-danger" type="submit" value="更改">
                            </div>
                        </form>
                    </div>
                </div>                    
            </div>
        </div>
    </section>
</div>
<?php include("./footer.php"); ?>