<?php session_start();  //设置缓存
include('conn.php');
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>华侨大学计算机通识教育自主学习平台</title>
    <script src="common/jquery.js" type="text/javascript"></script>
    <!-- <link href="https://cdn.bootcss.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->
    <link href="common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="common/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/common.css" rel="stylesheet" type="text/css" />
    <link href="css/indexAndlogin.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <div class="main clearfix">
        <div class="header clearfix">
            <img class="logo" src="images/logo.png" />
            <p class="title">计算机通识教育<br />自主学习平台</p>
        </div>
        <ul class="nav nav-pills choose">
          <li class="active"><a href="#">首页</a></li>
          <li><a href="#">学校概况</a></li>
          <li><a href="#">公告</a></li>
          <li><a href="#">资料下载</a></li>
          <li><a href="login.php" target="_blank">登陆</a></li>
        </ul>

        <div class="content">首页内容</div>
        <div class="footer">页脚内容</div>
    </div>

    <script>
        $(document).ready(function(){
           $(".choose li").click(function(){
                $(".choose li").removeClass("active");
                $(this).addClass("active");
           });
        });
    </script>


</body>

</html>