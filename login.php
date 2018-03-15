<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>登陆</title>
        <script src="common/jquery.js" type="text/javascript"></script>
        <link href="https://cdn.bootcss.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="css/reset.css" rel="stylesheet" type="text/css" />
        <link href="css/indexAndlogin.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
    <div class="login">
        <form class="form-inline" role="form">
            <div class="form-group">
                <label  for="user-login">用户名</label>
                <input type="number" class="form-control" id="user-login">
            </div>
            <div class="form-group">
                <label  for="pwd-login">密码</label>
                <input type="password" class="form-control" id="pwd-login">
            </div>
            <button type="submit" class="btn btn-default">登陆</button>
        </form>
        <div class="reg"><a href="register.php" target="_blank">没有账号？点此注册</a></div>
    </div>


    </body>
</html>
