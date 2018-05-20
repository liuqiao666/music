<?php
error_reporting(0);
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除首页幻灯图片信息</title>
</head>
<body>
</body>
</html>
<?php
//1.连接数据库
	include("../Connections/myconn.php");
//2.选择数据库
	mysql_select_db("music");
	$sql="delete from start where id='".$id."'";
	$result=mysql_query($sql);
	if($result)
	{
		echo "<script>";
		echo "alert('删除成功！');";
		echo "location.href='start.php'"; 
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('错误,删除失败！');";
		echo "location.href='start.php'"; 
		echo "</script>";
	}
?>