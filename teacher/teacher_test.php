<?php session_start();  //设置缓存
ini_set('error_reporting', 'E_ALL ^ E_NOTICE');//屏蔽非关键性错误
header("Content-type: text/html; charset=utf-8"); //设置网页编码
include('../conn.php');
mysqli_query($conn,'set names utf8');

$validate="Select * from ge_teacher where `pk_teacher`= '${_SESSION["id"]}'";
$result = mysqli_query($conn,$validate);
$row = mysqli_fetch_array($result);
$name = $row['name'];

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人中心</title>
    <script src="../common/jquery.js" type="text/javascript"></script>
    <!-- <link href="https://cdn.bootcss.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->
    <link href="../common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../common/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="../css/reset.css" rel="stylesheet" type="text/css" />
    <link href="../css/common.css" rel="stylesheet" type="text/css" />


</head>

<body>
<div class="main clearfix">
    <div class="header clearfix">
        <img class="logo" src="../images/logo.png" />
        <p class="title">计算机通识教育<br />自主学习平台</p>
    </div>
    <div class="content clearfix">
        <p class="welcome"><a href="../index.php">首页</a><span>&gt;&gt</span><span><span><?php echo "$name" ?></span>老师，欢迎你！</span><a href="../loginout.php">退出</a></p>
        <div class="function clearfix">
            <div class="col-sm-3 col-xs-3 co-md-3 col-lg-3">
                <p class="self">个人中心</p>
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="teacher_personal.php">个人信息</a></li>
                    <li role="presentation"><a href="teacher_password.php">修改密码</a></li>
                    <li role="presentation"><a href="teacher_homework.php">作业管理</a></li>
                    <li role="presentation"><a href="teacher_upload.php">资料上传</a></li>
                    <li role="presentation"><a href="teacher_discuss.php">发布问题</a></li>
                    <li role="presentation" class="active"><a href="teacher_test.php">自主测试</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-xs-9 co-md-9 col-lg-9">
                <p style="font-size:20px;font-weight: 900;color:#ff0000">此处实现教师发布测试</p>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>


</body>

</html>