<?php
$mysql_server_name='localhost:3306';
$mysql_username='root';
$mysql_password='12345678';
$mysql_database='demo';
$conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
mysql_query("set names UTF-8");
mysql_select_db($mysql_database,$conn);
?>