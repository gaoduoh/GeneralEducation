<?php session_start();  //设置缓存
ini_set('error_reporting', 'E_ALL ^ E_NOTICE');//屏蔽非关键性错误
header("Content-type: text/html; charset=utf-8"); //设置网页编码
include('conn.php');


if(isset($_POST['submit'])){
    //get the values from the form
    $UserName=$_POST['user'];
    $Password=$_POST['password'];
    if($UserName==""){
        echo "<script type='text/javascript'>alert('请输入用户名');window.location='login.php';</script>";
    }
    if($Password==""){
        echo "<script type='text/javascript'>alert('请输入密码');window.location='login.php';</script>";
    }
    mysqli_query($conn,'set names utf8');

    $validate_student="Select * from ge_student where `number`='$UserName' and `password`='$Password'";
    $result_student = mysqli_query($conn,$validate_student);
    $row_student = mysqli_fetch_array($result_student);
    $id_student = $row_student['pk_student'];

    $validate_teacher="Select * from ge_teacher where `number`='$UserName' and `password`='$Password'";
    $result_teacher = mysqli_query($conn,$validate_teacher);
    $row_teacher = mysqli_fetch_array($result_teacher);
    $id_teacher = $row_teacher['pk_teacher'];

    $validate_admin="Select * from ge_admin where `name`='$UserName' and `password`='$Password'";
    $result_admin = mysqli_query($conn,$validate_admin);
    $row_admin = mysqli_fetch_array($result_admin);



    if($row_student){
        $_SESSION['id']= $id_student;
        echo "<script type='text/javascript'>window.location='student/student_personal.php';</script>";
    } else if($row_teacher){
        $_SESSION['id']=$id_teacher;
        echo "<script type='text/javascript'>window.location='teacher/teacher_personal.php';</script>";
    }else if($row_admin){
        echo "<script type='text/javascript'>window.location='admin/admin_user_tea.php';</script>";
    }else {
        echo "<script type='text/javascript'>alert('用户名或密码错误');window.location='login.php';</script>";
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
                <input type="text" name="user" class="form-control" id="user-login">
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
