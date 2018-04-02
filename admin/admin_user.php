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
                                $pagesize=3;
                                $res=mysqli_query($conn,"Select count(*) from ge_teacher");
                                $myrow   =   mysqli_fetch_array($res);
                                $numrows=$myrow[0];
                                $pages=intval($numrows/$pagesize);

                                if   ($numrows%$pagesize)
                                    $pages++;
                                if (isset($_GET['page'])){
                                    //echo "page exist";
                                    $page = $_GET['page'];
                                    //echo "enter if ";
                                }
                                else{
                                    $page = 1;
                                }
                                $offset=$pagesize*($page-1);
                                echo $offset;
                                $res=mysqli_query($conn,"Select * from ge_teacher limit $offset,$pagesize");
                                if   ($myrow   =   mysqli_fetch_array($res))
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
                                            <td   width="10%"   bgcolor="#E6F2FF"><?php   echo   $myrow[1];?> </td>
                                            <td   width="5%"   bgcolor="#E6F2FF"><?php   echo   $myrow[2];?> </td>
                                            <td   width="40%"   bgcolor="#E6F2FF"><?php   echo   $myrow[6];?>  </td>
                                        </tr>
                                        <?php
                                    }
                                    while   ($myrow   =   mysqli_fetch_array($res));
                                    echo   "</table>"   ;
                                    }
                                    echo   "<div   align='center'>共有".$pages."页(".$page."/".$pages.")<br>";
                                    for   ($i=1;$i<=$pages;$i++)
                                        echo   "<a   href='pages.php?page=".$i."'>第".$i   ."页</a>     ";
                                    echo   "<form   action='pages.php'   method='post'>";
                                    $first=1;
                                    $prev=$page-1;
                                    $next=$page+1;
                                    $last=$pages;

                                    echo   "<a   href='pages.php?page=".$first."'>首页</a>     ";
                                    //echo "page is:";
                                    //echo "$page";
                                    echo   "<a   href='pages.php?page=".$prev."'>上一页</a>     ";


                                    echo   "<a   href='pages.php?page=".$next."'>下一页</a>     ";
                                    echo   "<a   href='pages.php?page=".$last."'>尾页</a>     ";


                                    echo   "</form>";
                                    echo   "</div>";
                                    ?>
                            </div>
                            <div class="tab-pane fade" id="student">
                                <?php
                                $pagesize=3;
                                $res=mysqli_query($conn,"Select count(*) from ge_student");
                                $myrow   =   mysqli_fetch_array($res);
                                $numrows=$myrow[0];
                                $pages=intval($numrows/$pagesize);

                                if   ($numrows%$pagesize)
                                    $pages++;
                                if (isset($_GET['page'])){
                                    //echo "page exist";
                                    $page = $_GET['page'];
                                    //echo "enter if ";
                                }
                                else{
                                    $page = 1;
                                }
                                $offset=$pagesize*($page-1);
                                echo $offset;
                                $res=mysqli_query($conn,"Select * from ge_student limit $offset,$pagesize");
                                if   ($myrow   =   mysqli_fetch_array($res))
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
                                            <td   width="10%"   bgcolor="#E6F2FF"><?php   echo   $myrow[1];?> </td>
                                            <td   width="5%"   bgcolor="#E6F2FF"><?php   echo   $myrow[2];?> </td>
                                            <td   width="40%"   bgcolor="#E6F2FF"><?php   echo   $myrow[6];?>  </td>
                                        </tr>
                                        <?php
                                    }
                                    while   ($myrow   =   mysqli_fetch_array($res));
                                    echo   "</table>"   ;
                                    }
                                    echo   "<div   align='center'>共有".$pages."页(".$page."/".$pages.")<br>";
                                    for   ($i=1;$i<=$pages;$i++)
                                        echo   "<a   href='pages.php?page=".$i."'>第".$i   ."页</a>     ";
                                    echo   "<form   action='pages.php'   method='post'>";
                                    $first=1;
                                    $prev=$page-1;
                                    $next=$page+1;
                                    $last=$pages;

                                    echo   "<a   href='pages.php?page=".$first."'>首页</a>     ";
                                    //echo "page is:";
                                    //echo "$page";
                                    echo   "<a   href='pages.php?page=".$prev."'>上一页</a>     ";


                                    echo   "<a   href='pages.php?page=".$next."'>下一页</a>     ";
                                    echo   "<a   href='pages.php?page=".$last."'>尾页</a>     ";


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


<!--    <script>-->
<!--        $(document).ready(function(){-->
<!--            var lis=$("#myTab li");-->
<!--            var divs=$("#myTabContent>div");-->
<!--            if(lis.length!=divs.length) return;-->
<!--            for(var i=0;i<lis.length;i++){-->
<!--                lis[i].id=i;-->
<!--                lis[i].click=function(){-->
<!--                    for(var j=0;j<lis.length;j++){-->
<!--                        divs[j].removeClass("active");-->
<!--                        divs[j].removeClass("in");-->
<!--                    }-->
<!--                    divs[this.id].addClass("active");-->
<!--                    divs[this.id].addClass("in");-->
<!--                }-->
<!--            }-->
<!--        });-->
<!--    </script>-->

    </body>

</html>