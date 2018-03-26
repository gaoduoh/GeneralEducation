<?php session_start();
ini_set('error_reporting', 'E_ALL ^ E_NOTICE');
header("Content-type: text/html; charset=utf-8");
session_destroy();
echo "<script type='text/javascript'>window.location.href='index.php';</script>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="css/css.css" rel="stylesheet" type="text/css" />
</head>

<body></body></html>