<?php
error_reporting(0);
$adminname=$_GET['adminname'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除管理员信息</title>
</head>
<body>
</body>
</html>
<?php
	$sql="delete from admin where adminname='".$adminname."'";
	$result=mysql_query($sql);
	if($result)
	{
		echo "<script>";
		echo "alert('删除成功！');";
		echo "location.href='admincontrol.php'"; 
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('错误,删除失败！');";
		echo "location.href='admincontrol.php'"; 
		echo "</script>";
	}
?>