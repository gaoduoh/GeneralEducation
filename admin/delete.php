<?php session_start();  //设置缓存
ini_set('error_reporting', 'E_ALL ^ E_NOTICE');//屏蔽非关键性错误
header("Content-type: text/html; charset=utf-8"); //设置网页编码
include('../conn.php');
mysqli_query($conn,"SET NAMES 'utf8'");
$teacher_id = $_GET['teacher_id'];
$student_id = $_GET['student_id'];

if($teacher_id){
	$teacher_sql="delete from ge_teacher where pk_teacher='$teacher_id'";
	$teacher_re=mysqli_query($conn,$teacher_sql);
	echo "<script>alert('删除成功')</script>";
	echo "<script>location.href='admin_user_tea.php'</script>";
}else if($student_id){
	$student_sql="delete from ge_student where pk_student='$student_id'";
	$student_re=mysqli_query($conn,$student_sql);
	echo "<script>alert('删除成功')</script>";
	echo "<script>location.href='admin_user_stu.php'</script>";
}else{
  	echo "<script>alert('删除失败')</script>";
	echo "<script>history.back();</script>";
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
</body>
</html>