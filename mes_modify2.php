<?php
header('Content-Type:text; charset=utf-8');
//连接数据库
require ('./mysqli_connect.php');
//接收从modify.php传过来的值
$mes_username = $_POST['mes_username'];
$mes_content = $_POST['mes_content'];
$mes_id = $_GET['mes_id'];
//对数据库进行删除操作
$sql = "UPDATE mes SET mes_username='$mes_username',mes_content='$mes_content' WHERE mes_id=$mes_id";
//将上一步对数据库删除操作的结果返回并赋值给$result
$result = mysqli_query($link, $sql);
//如果成功跳转到主页面，失败报错
if($result){
    echo '<script>alert("恭喜你修改成功！");location.href="./index.php";</script>';
} else {
    echo '修改失败！<br>';
    echo mysqli_error($link);
    echo '<a href="./index.php">回到首页！</a>';
}