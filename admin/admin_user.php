<?php session_start();  //设置缓存
ini_set('error_reporting', 'E_ALL ^ E_NOTICE');//屏蔽非关键性错误
header("Content-type: text/html; charset=utf-8"); //设置网页编码
include('../conn.php');
mysqli_query($conn,'set names utf8');

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
                            <li role="presentation" class="active"><a href="admin_user.php">角色管理</a></li>
                            <li role="presentation"><a href="admin_homework.php">作业管理</a></li>
                            <li role="presentation"><a href="admin_data.php">资料管理</a></li>
                            <li role="presentation"><a href="admin_discuss.php">问题管理</a></li>
                            <li role="presentation"><a href="admin_test.php">自测管理</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9 col-xs-9 co-md-9 col-lg-9">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active"><a href="#teacher" data-toggle="tab">教师管理</a></li>
                            <li><a href="#student" data-toggle="tab">学生管理</a></li>

                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="teacher">
                                <?php
                                $pagesize=1;
                                $teacher_res=mysqli_query($conn,"Select count(*) from ge_teacher");
                                $teacher_myrow =  mysqli_fetch_array($teacher_res);
                                $teacher_numrows=$teacher_myrow[0];
                                $teacher_pages=intval($teacher_numrows/$pagesize);

                                if   ($teacher_numrows%$pagesize)
                                    $teacher_pages++;
                                if (isset($_GET['teacher_page'])){
                                    $teacher_page = $_GET['teacher_page'];
                                }else{
                                    $teacher_page = 1;
                                }
                                if($teacher_page<1){
                                    $teacher_page = 1;
                                }
                                if($teacher_page>=$teacher_pages){
                                    $teacher_page = $teacher_pages;
                                }
                                $teacher_offset=$pagesize*($teacher_page-1);
//                                echo $teacher_page;
//                                echo $teacher_offset;
                                $teacher_res=mysqli_query($conn,"Select * from ge_teacher limit $teacher_offset,$pagesize");
                                if   ($teacher_myrow   =   mysqli_fetch_array($teacher_res))
                                {
                                $i=0;
                                ?>
                                <table cellspacing=0 bordercolordark=#FFFFFF width="95%" bordercolorlight=#000000 border=1 align="center" cellpadding="2">
                                    <tr bgcolor="#6b8ba8" style="color:#FFFFFF">
                                        <td width="10%" align="center" valign="bottom" height="19">工号</td>
                                        <td width="10%" align="center" valign="bottom">姓名</td>

                                    </tr>
                                    <?php
                                    do   {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td   width="10%"   bgcolor="#E6F2FF"><?php   echo   $teacher_myrow['number'];?> </td>
                                            <td   width="5%"   bgcolor="#E6F2FF"><?php   echo   $teacher_myrow['name'];?> </td>
                                        </tr>
                                        <?php
                                    }
                                    while   ($teacher_myrow   =   mysqli_fetch_array($teacher_res));
                                    echo   "</table>"   ;
                                    }
                                    echo   "<div   align='center'>共有".$teacher_pages."页(".$teacher_page."/".$teacher_pages.")<br>";
                                    for   ($i=1;$i<=$teacher_pages;$i++)
                                        echo   "<a   href='admin_user.php?page=".$i."'>第".$i   ."页</a>     ";
                                    echo   "<form   action='admin_user.php'   method='get'>";
                                    $first=1;
                                    $prev=$teacher_page-1;
                                    $next=$teacher_page+1;
                                    $last=$teacher_pages;

                                    echo   "<a class='teacher_page' href='admin_user.php?teacher_page=".$first."'>首页</a> ";
                                    echo   "<a  class='teacher_page' href='admin_user.php?teacher_page=".$prev."'>上一页</a>";


                                    echo   "<a  class='teacher_page' href='admin_user.php?teacher_page=".$next."'>下一页</a>";
                                    echo   "<a  class='teacher_page' href='admin_user.php?teacher_page=".$last."'>尾页</a>";


                                    echo   "</form>";
                                    echo   "</div>";
                                    ?>
                            </div>
                            <div class="tab-pane fade" id="student">
                                <?php
                                $pagesize=1;
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
                                <table cellspacing=0 bordercolordark=#FFFFFF width="95%" bordercolorlight=#000000 border=1 align="center" cellpadding="2">
                                    <tr bgcolor="#6b8ba8" style="color:#FFFFFF">
                                        <td width="10%" align="center" valign="bottom" height="19">学号</td>
                                        <td width="10%" align="center" valign="bottom">姓名</td>
                                        <td width="5%" align="center" valign="bottom">班级</td>

                                    </tr>
                                    <?php
                                    do   {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td   width="10%"   bgcolor="#E6F2FF"><?php   echo   $student_myrow['number'];?> </td>
                                            <td   width="5%"   bgcolor="#E6F2FF"><?php   echo   $student_myrow['name'];?> </td>
                                            <td   width="40%"   bgcolor="#E6F2FF"><?php   echo   $student_myrow['class'];?>  </td>
                                        </tr>
                                        <?php
                                    }
                                    while   ($student_myrow   =   mysqli_fetch_array($student_res));
                                    echo   "</table>"   ;
                                    }
                                    echo   "<div   align='center'>共有".$student_pages."页(".$student_page."/".$student_pages.")<br>";
                                    for   ($i=1;$i<=$student_pages;$i++)
                                        echo   "<a   href='admin_user.php?page=".$i."'>第".$i   ."页</a>     ";
                                    echo   "<form   action='admin_user.php'   method='get'>";
                                    $first=1;
                                    $prev=$student_page-1;
                                    $next=$student_page+1;
                                    $last=$student_pages;

                                    echo   "<a class='student_page'  href='admin_user.php?student_page=".$first."'>首页</a>     ";
                                    //echo "page is:";
                                    //echo "$page";
                                    echo   "<a  class='student_page' href='admin_user.php?student_page=".$prev."'>上一页</a>     ";


                                    echo   "<a class='student_page'  href='admin_user.php?student_page=".$next."'>下一页</a>     ";
                                    echo   "<a class='student_page'  href='admin_user.php?student_page=".$last."'>尾页</a>     ";


                                    echo   "</form>";
                                    echo   "</div>";
                                    ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="footer"></div>
        </div>


    <script>
        $(document).ready(function(){
            $(".teacher_page").click(function(){
                $("#myTab li").removeClass("active");
                $("#myTabContent>div").removeClass("active");
                $("#myTabContent>div").removeClass("in");
                $("#myTab li:eq(0)").addClass("active");
                $("#myTabContent>div:eq(0)").addClass("active");
                $("#myTabContent>div:eq(0)").addClass("in");
            });

            $(".student_page").click(function(){
                $("#myTab li").removeClass("active");
                $("#myTabContent>div").removeClass("active");
                $("#myTabContent>div").removeClass("in");
                $("#myTab li:eq(1)").addClass("active");
                $("#myTabContent>div:eq(1)").addClass("active");
                $("#myTabContent>div:eq(1)").addClass("in");
            });
        });
    </script>

    </body>

</html>