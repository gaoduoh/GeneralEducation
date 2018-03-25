<?php session_start();  //设置缓存
ini_set('error_reporting', 'E_ALL ^ E_NOTICE');//屏蔽非关键性错误
header("Content-type: text/html; charset=utf-8"); //设置网页编码
include('../conn.php');
mysqli_query($conn,'set names utf8');

$validate="Select * from ge_student where `name`= '${_SESSION["name"]}'";
$result = mysqli_query($conn,$validate);
$row = mysqli_fetch_array($result);
$name = $row['name'];
$number = $row['number'];
$sex = $row['sex'];
$email = $row['email'];
$phone = $row['phone'];


?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人中心</title>
    <script src="common/jquery.js" type="text/javascript"></script>
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
            <p class="welcome"><a href="../index.php">首页</a><span>&gt;&gt</span><span><span><?php echo "${_SESSION["name"]}" ?></span>同学，欢迎你！</span><a href="#">退出</a></p>
            <div class="function clearfix">
                <div class="col-sm-3 col-xs-3 co-md-3 col-lg-3">
                    <p class="self">个人中心</p>
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation" class="active"><a href="student_personal.php">个人信息</a></li>
                        <li role="presentation"><a href="student_password.php">修改密码</a></li>
                        <li role="presentation"><a href="student_homework.php">作业管理</a></li>
                        <li role="presentation"><a href="student_download.php">资料下载</a></li>
                        <li role="presentation"><a href="student_discuss.php">问题讨论</a></li>
                        <li role="presentation"><a href="student_test.php">自测系统</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-xs-9 co-md-9 col-lg-9">
                    <div class="information">
                        <p><span>学号：</span><span><?php echo "$number" ?></span></p>
                        <p><span>姓名：</span><span><?php echo "$name" ?></span></p>
                        <p><span>性别：</span><span><?php echo "$sex" ?></span></p>
                        <p><span>邮箱：</span><span><?php echo "$email" ?></span></p>
                        <p><span>联系方式：</span><span><?php echo "$phone" ?></span></p>
                    </div>
                    <div class="fixInformation">修改信息</div>
                    <form method = "GET" class="changeInformation" >
                        <div><label>学号：</label><label><?php echo "$number" ?></label></div>
                        <div><label>姓名：</label><label><?php echo "$name" ?></label></div>
                        <div><label>性别：</label><input type="radio" name="sex" value="男" checked>男<input type="radio" name="sex" value="女">女</div>
                        <div><label>邮箱：</label><label><?php echo "$email" ?></label></div>
                        <div><label>联系方式：</label><label><?php echo "$phone" ?></label></div>
                        <button type="submit" name="submit">确认修改</button>
                        <button type="button" name="cancel">取消修改</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="footer"></div>
    </div>


</body>

</html>