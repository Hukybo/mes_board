<?php
header('Content-Type:text; charset=utf-8');
//连接数据库
require ('./mysqli_connect.php');
//接收从index.php文件传过来的mes_id
$mes_id = $_GET['mes_id'];
//通过mes_id查询用户的留言信息
$sql = "SELECT * FROM mes WHERE mes_id=$mes_id";
//将上一步对数据库进行查询操作的结果返回并赋值给$result
$result = mysqli_query($link, $sql);
//从结果集中取得某一行作为关联数组，并将值赋给$row
$row = mysqli_fetch_assoc($result);
?>
//修改留言表单，默认值是用户想要修改的留言
<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <title>修改留言</title>
</head>
<body>
    <form action="mes_modify2.php?mes_id=<?php echo $row['mes_id']?>" method="post" >//通过"?"，将mes_id的值传给modify2.php文件
        <p>用户名：<input type="text" name="mes_username" value="<?php echo $row['mes_username'] ?>"/></p>
        <p>留言：<textarea name="mes_content" cols="80" rows="10"><?php echo $row['mes_content'] ?></textarea></p>
        <p><input type="submit" value="修改留言"/></p>
    </form>
</body>
</html>