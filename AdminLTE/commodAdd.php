<?php include("./header.php"); ?>
<div class="content-wrapper">
    <section class="content">
<!-- 登录模态框 -->
<div class="modal fade" id="addTypeModel" tabindex="-1" role="dialog" aria-labelledby="addTypeModel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">添加商品类型</h4>
			</div>
			<div class="modal-body">
				<div class="row">
                        <script>
                        function chkinput(form){
                            if(form.leibie.value==""){
                                alert('请输入新增商品类别名!');
                                form.leibie.select();
                                return(false);
                                }
                                return(true);
                            }
                        </script>
					<div class="col-xs-12">
						<form class="form-horizontal" name="form1" method="post" action="./php/saveaddType.php" onSubmit="return chkinput(this);">
							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-1">
                                    <input type="text" name="leibie" class="form-control" size="40" placeholder="类别名称"autofocus>
								</div>
                                <div col-sm-1><input name="submit" type="submit" class="btn btn-danger" value="添 加"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> 添加商品</h3>
                        <div class="box-tools pull-right">
                            <a  href='javascript:(0)' data-toggle='modal' data-target='#addTypeModel' class="btn btn-danger" roal="button"><i class="fa fa-plus" aria-hidden="true"></i> 添加商品类型</a>
                        </div>
                    </div>
                    <div class="box-body">
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
                        <form class="form-horizontal" name="form1"  enctype="multipart/form-data" method="post" action="./php/saveCommodAdd.php" onSubmit="return chkinput(this)">
                            <table class="table table-bordered table-hover text-c">
                                <tbody>
                                    <tr>
                                        <td class="va-m">商品名称：</td>
                                        <td class="va-m"><input type="text" name="mingcheng" size="25"class="form-control" placeholder="商品名称"></td>
                                        <td class="va-m">上市时间：</td>
                                        <td class="va-m"><input type="text" name="addtime" class="form-control" placeholder="上市时间"></td>
                                        <td class="va-m">市场价：</td>
                                        <td class="va-m"><input type="text" name="shichangjia" size="10"class="form-control" placeholder="市场价"></td>
                                    </tr>
                                    <tr>
                                        <td class="va-m">会员价：</td>
                                        <td class="va-m"><input type="text" name="huiyuanjia" size="10"class="form-control" placeholder="会员价"></td>
                                        <td class="va-m">商品数量：</td>
                                        <td class="va-m"><input type="text" name="shuliang" class="form-control" size="20" placeholder="商品数量"></td>
                                        <td class="va-m">商品等级：</td>
                                        <td class="va-m">
                                            <select name="dengji" class="form-control">
                                            <option value="精品" selected>精品</option>
                                            <option value="一般">一般</option>
                                            <option value="二手">二手</option>
                                            <option value="淘汰">淘汰</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="va-m">商品品牌：</td>
                                        <td class="va-m"><input type="text" name="pinpai" class="form-control" size="20" placeholder="商品品牌"></td>
                                        <td class="va-m">商品型号：</td>
                                        <td class="va-m"><input type="text" name="xinghao" class="form-control" size="20" placeholder="商品型号"></td>
                                        <td class="va-m">是否推荐：</td>
                                        <td>
                                            <select name="tuijian" class="form-control" >
                                                <option value=1 selected>是</option>
                                                <option value=0>否</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="va-m">商品类型：</td>
                                        <td class="va-m">
                                        <?php
                                            $sql=mysqli_query($conn,"select * from tb_type order by id desc");
                                            $info=mysqli_fetch_array($sql);
                                            if($info==false){
                                            echo "请先添加商品类型!";
                                            }else{
                                            ?>
                                            <select name="typeid" class="form-control">
                                            <?php
                                            do{
                                            ?>
                                            <option value=<?php echo $info['id'];?>><?php echo $info['typename'];?></option>
                                            <?php
                                            }
                                            while($info=mysqli_fetch_array($sql));
                                            ?>  
                                            </select>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="va-m">商品图片：</td>
                                        <td class="va-m" colspan="3"><input type="hidden" name="MAX_FILE_SIZE" value="2000000"><input name="upfile" type="file" class="" id="upfile"></td>
                                    </tr>
                                    <tr>
                                        <td class="va-m">商品简介：</td>
                                        <td class="va-m" colspan="5"><textarea name="jianjie" cols="156" rows="3" placeholder="商品简介"></textarea></td>
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