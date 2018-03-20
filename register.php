<?php session_start();  //设置缓存
include('conn.php');
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>注册</title>
        <script src="common/jquery.js" type="text/javascript"></script>
        <!-- <link href="https://cdn.bootcss.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->
        <link href="common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="common/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

        <link href="css/reset.css" rel="stylesheet" type="text/css" />
        <link href="css/indexAndlogin.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="register">
            <form  class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="user" class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="user" placeholder="请输入学号">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="请输入姓名">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="请输入密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="repeatPassword" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="repeatPassword" placeholder="请再次输入密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class=" col-sm-2 control-label">电子邮箱</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="请输入电子邮箱">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">联系方式</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="phone" pattern="^[1][3,4,5,7,8][0-9]{9}$" placeholder="请输入联系方式">
                    </div>
                </div>
                <button type="submit" class="btn btn-default regis" >注册</button>
            </form>
        </div>
    </body>
</html>



