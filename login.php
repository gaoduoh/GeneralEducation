<?php session_start();  //设置缓存
include('conn.php');


if(isset($_POST['submit'])){
    //get the values from the form
    $UserName=$_POST['user'];
    $Password=$_POST['password'];
    if($UserName==""){
        echo "<script type='text/javascript'>alert('输入用户名');window.location='login.php';</script>";
    }
    if($Password==""){
        echo "<script type='text/javascript'>alert('输入密码');window.location='login.php';</script>";
    }
    $validate="Select * from student where `id`='$UserName' and `password`='$Password'";
    $result=mysql_query($validate);
    $hashed_password=MD5($Password);
    $row=mysql_fetch_row($result);
    if($row)
    {
        $_SESSION['user']=$UserName;
        echo "<script type='text/javascript'>alert('登陆成功');window.location='student.php';</script>";
    }
    else
    {
        echo "<script type='text/javascript'>alert('密码错误');window.location='login.php';</script>";
    }
}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>登陆</title>
        <script src="common/jquery.js" type="text/javascript"></script>
        <!-- <link href="https://cdn.bootcss.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->
        <link href="common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="common/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

        <link href="css/reset.css" rel="stylesheet" type="text/css" />
        <link href="css/indexAndlogin.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
    <div class="login">
        <form class="form-inline" role="form" method="post">
            <div class="form-group">
                <label  for="user-login">用户名</label>
                <input type="number" name="user" class="form-control" id="user-login">
            </div>
            <div class="form-group">
                <label  for="pwd-login">密码</label>
                <input type="password" name="password" class="form-control" id="pwd-login">
            </div>
            <button type="submit" name="submit" class="btn btn-default">登陆</button>
        </form>
        <div class="reg"><a href="register.php" target="_blank">没有账号？点此注册</a></div>
    </div>


    </body>
</html>
