<?php
require ('./mysqli_connect.php');  // 载入php脚本文件
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>留言板</title>
</head>
<body>
    <h2>请提交您留言的表单</h2>
    <form action="mes_insert.php" method="post">
        <p>请输入您的用户名：</p>
        <input type="text" name="mes_username"/>
        <p>请输入您留言内容：</p>
        <textarea name="mes_content" cols="80" rows="10"></textarea>
        <p><input type="submit" value="马上留言" /></p>
    </form>
    <h2>留言内容</h2>
    <hr/>
<?php
//分页
$pagesize = 3;//设置每页显示的留言数量
$page = isset($_GET['page']) ? $_GET['page'] : 1 ; //判断当前的页数，如果不知道就默认是第一页
$sql = "SELECT * FROM mes WHERE mes_report=0 ORDER BY mes_top DESC,mes_id DESC"; //从数据库中查询留言，首先查看置顶留言，再根据id倒序查询留言
$result = mysqli_query($link, $sql); //将上一步对数据库的查询结果返回给$result
$rows_count = mysqli_num_rows($result); //将留言总条数赋值给$rowa_count
$page_count = ceil($rows_count / $pagesize); //计算留言总页数

$start = ($page-1) * $pagesize; //计算当前页数留言从哪条开始输出
$sql .= " LIMIT $start,$pagesize"; //根据上一条sql语句限制留言数量的输出
$result = mysqli_query($link, $sql); //将上一条对数据库的操作重新赋值给$result
//输出已发布的留言，并且显示删除、修改、置顶、举报、点赞等功能
while($row=mysqli_fetch_assoc($result)){
    echo "<p>{$row['mes_id']}# {$row['mes_username']} 于 {$row['mes_time']}说：<br> {$row['mes_content']}";
    //显示删除功能
    echo '<a href="mes_delete.php?mes_id=' . $row['mes_id'] . '">删除 |</a>';
    //显示修改功能
    echo '<a href="mes_modify.php?mes_id=' . $row['mes_id'] . '"> 修改 |</a>';
    //显示置顶功能
    if($row['mes_top']){
        echo '<a href="mes_action.php?mes_act=canceltop&mes_id=' . $row['mes_id'] . '"> 取消置顶 |</a>';
    } else {
        echo '<a onclick="myFunctionTop()" href="mes_action.php?mes_act=settop&mes_id=' . $row['mes_id'] . '"> 置顶 |</a>';
    }
    //显示举报功能
    echo '<a href="mes_action.php?mes_act=report&mes_id=' . $row['mes_id'] . '"> 举报 |</a>';
    //显示点赞功能
    echo '<a href="mes_action.php?mes_act=praise&mes_id=' . $row['mes_id'] . '"> 点赞(' . $row['mes_praise'] . ') </a>';
    echo '</p>';
}
//打印页码数
for($i=1; $i<=$page_count; $i++) {
    echo '<a href="index.php?page='.$i.'">'; //传值给$page
    echo ' ' .$i. ' ';
    echo '</a>'; 
}
?>
</body>
</html>