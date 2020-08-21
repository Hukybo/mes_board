<?php
header('Content-Type:text; charset=utf-8');
//连接数据库
require ('./mysqli_connect.php');
//接收从index.php文件传过来的值
$mes_act = $_GET['mes_act'];

/*        置顶         */
//如果接收的字符串是'settop'，对留言置顶
if($mes_act == 'settop'){
    //接收mes_id
    $mes_id = $_GET['mes_id'];
    //将mes_top的值修改为"1"
    $sql = "UPDATE mes SET mes_top=1 WHERE mes_id=$mes_id";
    //将上一步的操作结果返回
    $result = mysqli_query($link, $sql);
    //如果成功跳转到主页，失败报错
    if($result){
        header('Location: index.php');
    } else {
        echo '置顶失败！<br>';
        echo mysqli_error($link).'<br>';
        echo '<a href="./index.php">回到首页！</a>';
    }
}
/*        取消置顶         */
//如果接收的字符串是'canceltop'，对留言取消置顶
if($mes_act == 'canceltop'){
    //接收mes_id
    $mes_id = $_GET['mes_id'];
    //将mes_top的值设置为"0"
    $sql = "UPDATE mes SET mes_top=0 WHERE mes_id=$mes_id";
    //将上一步的操作结果返回
    $result = mysqli_query($link, $sql);
    //如果成功跳转到主页，失败报错
    if($result){
        header('Location: index.php');
    } else {
        echo '取消置顶失败！<br>';
        echo mysqli_error($link).'<br>';
        echo '<a href="./index.php">回到首页！</a>';
    }
}
/*        举报         */
//如果接收的字符串是'report'，对留言举报
if($mes_act == 'report'){
    //接收mes_id
    $mes_id = $_GET['mes_id'];
    //将mes_report设置为"1"
    $sql = "UPDATE mes SET mes_report=1 WHERE mes_id=$mes_id";
    //将上一步的操作结果返回
    $result = mysqli_query($link, $sql);
    //如果成功跳转到首页，失败报错
    if($result){
        echo '<script>alert("举报已提交给管理员，此条消息将被隐藏！");location.href="./index.php";</script>';
    } else {
        echo '举报失败！<br>';
        echo mysqli_error($link).'<br>';
        echo '<a href="./index.php">回到首页！</a>';
    }
}
/*        点赞         */
//如果接收的字符串是'praise'，对留言点赞
if($mes_act == 'praise'){
    //接收mes_id
    $mes_id = $_GET['mes_id'];
    //将mes_praise的值+1
    $sql = "UPDATE mes SET mes_praise=mes_praise+1 WHERE mes_id=$mes_id";
    //将上一步的操作结果返回
    $result = mysqli_query($link, $sql);
    //如果成功跳转到首页，失败报错
    if($result){
        header('Location: index.php');
    } else {
        echo '点赞失败！<br>';
        echo mysqli_error($link).'<br>';
        echo '<a href="./index.php">回到首页！</a>';
    }
}