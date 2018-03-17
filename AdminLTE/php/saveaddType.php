<?php
header ( "Content-type: text/html; charset=utf8" ); //设置文件编码格式
$leibie=$_POST['leibie'];
include("./conn.php");
if($leibie!=""&&$leibie!=null){
    $sql=mysqli_query($conn,"select * from tb_type where typename='".$leibie."'");
    $info=mysqli_fetch_array($sql);
    if($info!=false){
     echo"<script>alert('该类型已经存在!');window.location.href='../commodAdd.php';</script>";
    exit;
    }
    mysqli_query($conn,"insert into tb_type(typename) values ('$leibie')");
    echo"<script>alert('添加成功!');window.location.href='../commodAdd.php';location.reload();</script>";
}else{
    echo"<script>alert('类型不能为空!');window.location.href='../commodAdd.php';</script>";
}
?>