<?php
error_reporting(0);
$reviewer=$_GET['reviewer'];
$respondent=$_GET['respondent'];
$coment=$_GET['coment'];
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
	$sql="delete from comment where reviewer='".$reviewer."' and respondent='".$respondent."' and coment='".$coment."'";
	$result=mysql_query($sql);	
	if($result)
	{
		echo "<script>";
		echo "alert('删除成功！');";
		echo "location.href='commentscontrol.php'"; 
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('错误,删除失败！');";
		echo "location.href='commentscontrol.php'"; 
		echo "</script>";
	}
?>