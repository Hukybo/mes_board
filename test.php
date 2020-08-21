<form action="" method="post">
    <select name="host">
        <option value="localhost" selected>localhost</option>
        <option value="127.0.0.1">127.0.0.1</option>
    </select>
    <br><br>
    user:<input type="text" name="user" value=""><br><br>
    pwd :<input type="password" name="pwd" value=""><br><br>
    <input type="submit" value="connent">
    <input type="reset" value="reset">
</form>
<?php 
    error_reporting(~E_ALL);
    $host = $_POST['host'];
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    if(isset($_POST['host']) && isset($_POST['user']) && isset($_POST['pwd'])){
        if(strlen($host)<1 or strlen($user)<1 or strlen($pwd)<1){
            echo "请完善相关数据库链接信息。";
            exit(0);
        }
        $conn = mysqli_connect($host, $user, $pwd) or die("Error-数据库连接失败！");
        if($conn){
            echo "OK—数据库连接成功！";
        }
    }
?>