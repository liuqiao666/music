<?php
error_reporting(0);
include("top.php");
$adminname=$_SESSION['adminname'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>音悦分享后台管理中心</title>
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
<link href="css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/global.js"></script>
</head>
 <?php
 include("../Connections/myconn.php");
 mysql_select_db("music");
 mysql_query('set names utf8');
if($adminname =="")
	echo "<script type='text/javascript'>alert('您还未登录，请登录!');location.href='index.php';</script>";
 ?>
<body>
<?php include("side.php"); ?>
<?php include("content.php"); ?>
<?php include("footer.php"); ?>
</body>
</html>