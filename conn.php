<?php
ini_set('error_reporting', 'E_ALL ^ E_NOTICE');//屏蔽非关键性错误
header("Content-type: text/html; charset=utf-8"); //设置网页编码
$dbhost = 'localhost:3306';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = '12345678';          // mysql用户名密码
$mysql_database='generaleducation';//数据库名
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$mysql_database);
//mysqli_query($conn,'set names utf-8');
if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}
?>