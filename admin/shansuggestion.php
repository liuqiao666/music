<?php
error_reporting(0);
$username=$_GET['username'];
$message=$_GET['message'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除用户评论信息</title>
</head>
<body>
</body>
</html>
<?php
	//1.连接数据库
	include("../Connections/myconn.php");
	//2.选择数据库
	mysql_select_db("music");
	$sql="delete from opinion where username='".$username."' and message='".$message."'";
	$result=mysql_query($sql);	
	if($result)
	{
		echo "<script>";
		echo "alert('删除成功！');";
		echo "location.href='suggestion.php'"; 
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('错误,删除失败！');";
		echo "location.href='suggestion.php'"; 
		echo "</script>";
	}
?>