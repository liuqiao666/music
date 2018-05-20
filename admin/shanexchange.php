<?php
error_reporting(0);
$username=$_GET['username'];
$number=$_GET['number'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除积分兑换信息</title>
</head>
<body>
</body>
</html>
<?php
	//1.连接数据库
	include("../Connections/myconn.php");
	//2.选择数据库
	mysql_select_db("music");
	$sql="delete from intexchange where number='".$number."' and username='".$username."'";
	$result=mysql_query($sql);	
	if($result)
	{
		echo "<script>";
		echo "alert('删除成功！');";
		echo "location.href='exchange.php'"; 
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('错误,删除失败！');";
		echo "location.href='exchange.php'"; 
		echo "</script>";
	}
?>