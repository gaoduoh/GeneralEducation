<?php session_start();  //设置缓存
ini_set('error_reporting', 'E_ALL ^ E_NOTICE');//屏蔽非关键性错误
header("Content-type: text/html; charset=utf-8"); //设置网页编码
include('../conn.php');
mysqli_query($conn,'set names utf8');


//if(isset($_POST['submit'])){
//     $file_stu=$_FILES['file_stu'];
////print_r($file_stu['name']);die;
//    $ss=substr($file_stu['name'],strrpos($file_stu['name'],'.')+1);//截取后缀名
//    if(($ss!="xls")||($ss!="xlsx")){
//        echo "文件格式不正确";die;
//    }
//    $file=file_get_contents($file_stu['tmp_name']);
//    $arr=explode("\n",$file);
//    array_pop($arr);//去掉最后一个空
//    unset($arr[0]);
//    foreach($arr as &$v){
//        $v=explode("\t",$v);
//        $str=$pdo->query("insert into ge_student(number,name,password) value('$v[1]','$v[2]','$v[3]'");
//    }
//    if($str){
//        echo "导入成功";
//    }else{
//        echo "导入失败";
//    }
//}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>管理中心</title>
        <script src="../common/jquery.js" type="text/javascript"></script>
        <!-- <link href="https://cdn.bootcss.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->
        <link href="../common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../common/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <script src="../common/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="../css/reset.css" rel="stylesheet" type="text/css" />
        <link href="../css/common.css" rel="stylesheet" type="text/css" />
        <link href="../css/admin.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="main clearfix">
            <div class="header clearfix">
                <img class="logo" src="../images/logo.png" />
                <p class="title">计算机通识教育<br />自主学习平台</p>
            </div>
            <div class="content clearfix">
                <p class="welcome"><a href="../index.php">首页</a><span>&gt;&gt</span><span>admin，欢迎你！</span><a href="../loginout.php">退出</a></p>
                <div class="function clearfix">
                    <div class="col-sm-3 col-xs-3 co-md-3 col-lg-3">
                        <p class="self">管理中心</p>
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation" class="active"><a href="admin_user_tea.php">角色管理</a></li>
                            <li role="presentation"><a href="admin_homework.php">作业管理</a></li>
                            <li role="presentation"><a href="admin_data.php">资料管理</a></li>
                            <li role="presentation"><a href="admin_discuss.php">问题管理</a></li>
                            <li role="presentation"><a href="admin_test.php">自测管理</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9 col-xs-9 co-md-9 col-lg-9">
                        <ul class="user-tab clearfix">
                            <li style="background-color:#A89C6B;color:#FFFFFF"><a href="admin_user_tea.php">教师管理</a></li>
                            <li><a href="admin_user_stu.php">学生管理</a></li>

                        </ul>
                        
                        <div class="user-show clearfix">
                            <?php
                            $pagesize=10;
                            $student_res=mysqli_query($conn,"Select count(*) from ge_student");
                            $student_myrow   =   mysqli_fetch_array($student_res);
                            $student_numrows=$student_myrow[0];
                            $student_pages=intval($student_numrows/$pagesize);

                            if   ($student_numrows%$pagesize)
                                $student_pages++;

                            if (isset($_GET['student_page'])){
                                $student_page = $_GET['student_page'];
                            }else{
                                $student_page = 1;
                            }
                            if($student_page<1){
                                $student_page = 1;
                            }
                            if($student_page>=$student_pages){
                                $student_page = $student_pages;
                            }
                            $student_offset=$pagesize*($student_page-1);
    //                                echo $offset;
                            $student_res=mysqli_query($conn,"Select * from ge_student limit $student_offset,$pagesize");
                            if   ($student_myrow   =   mysqli_fetch_array($student_res))
                            {
                            $i=0;
                            ?>

                            <table class="table user-table">
                                <tr bgcolor="#6b8ba8" style="color:#FFFFFF">
                                    <td >学号</td>
                                    <td>姓名</td>
                                    <td>班级</td>
                                    <td></td>

                                </tr>
                                <?php
                                do   {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td ><?php   echo   $student_myrow['number'];?> </td>
                                        <td><?php   echo   $student_myrow['name'];?> </td>
                                        <td><?php   echo   $student_myrow['class'];?>  </td>
                                        <td><a class="user-del" href="delete.php?student_id=<?php echo $student_myrow['pk_student'] ?>" >删除</a></td>
                                    </tr>
                                    <?php
                                }
                                while   ($student_myrow   =   mysqli_fetch_array($student_res));
                                echo   "</table>"   ;
                                }
                                echo   "<div   align='center'>共有".$student_pages."页(".$student_page."/".$student_pages.")<br>";
                                echo   "<form   action='admin_user_stu.php'   method='get'>";
                                $first=1;
                                $prev=$student_page-1;
                                $next=$student_page+1;
                                $last=$student_pages;

                                echo   "<a  href='admin_user_stu.php?student_page=".$first."'>首页</a>";
                                //echo "page is:";
                                //echo "$page";
                                echo   "<a href='admin_user_stu.php?student_page=".$prev."'>上一页</a>     ";


                                echo   "<a  href='admin_user_stu.php?student_page=".$next."'>下一页</a>     ";
                                echo   "<a  href='admin_user_stu.php?student_page=".$last."'>尾页</a>     ";


                                echo   "</form>";
                                echo   "</div>";
                                ?>

                            <div class="user-add clearfix" style="position: relative;">
                                <button class="user-add-bn">添加学生</button>
                                <div class="user-add-bl">
                                    <form method="post">
                                        <input type="file" name="file_stu"/>
                                        <input type="submit" name="submit"/>
                                    </form>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="footer"></div>
        </div>


    

    </body>

</html>