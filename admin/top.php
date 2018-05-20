<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>音悦分享后台管理中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
<link href="css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/global.js"></script>
</head>
<body>
<div id="dcHead">
 <div id="head">
  <div class="logo"><a href="frist.php"><img src="images/dclogo.gif" alt="logo"></a></div>
  <div class="nav">
   <ul>
    <li class="M"><a href="JavaScript:void(0);" class="topAdd">新建</a>
     <div class="drop mTopad"><a href="addarticle.php">文章</a><a href="adduser.php">用户</a><a href="addadmin.php">管理员</a><a href="#"></a> </div>
    </li>
    <li><a href="../front/index.php" target="_blank">前端首页</a></li>
   </ul>
   <ul class="navRight">
    <li class="M noLeft"><a href="JavaScript:void(0);">管理员<?php echo $_SESSION['adminname'];?>你好^-^</a>
     <div class="drop mUser">
      <a href="editadminself.php?adminname=<?php echo $_SESSION['adminname'];?>">编辑我的个人资料</a>
     </div>
    </li>
    <li class="noRight"><a href="index.php">退出</a></li>
   </ul>
  </div>
 </div>
</div>
</body>
</html>