<?php
error_reporting(0);
session_start();
$username=$_SESSION['username'];
$number=$_GET['articleid'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>分享圈收藏</title>
	</head>
	<body>
	</body>
</html>
<?php
 include("../Connections/myconn.php");
 mysql_select_db("music");
 mysql_query('set names utf8');
if(isset($_SESSION['username']))
 {
	$sql="select * from user where username='".$username."'";
 }
 else
 {
	echo "<script>alert('您还未登录，请登录!');location.href='../login.php';</script>";
 }     

$sql="select * from collect where kind=0 and username='".$username."' and number='".$number."'";
$result=mysql_query($sql);
if(mysql_num_rows($result)>0)
{
	echo "<script>";
	echo " var r=confirm('取消收藏？！');";
	echo "</script>";

	if ($r!=true)
	{
		$sql="delete from collect where kind=0 and username='".$username."' and number='".$number."'";
		$result=mysql_query($sql);
		if($result)
		{
			$sql="select * from usarticle where articleid='".$number."'"; 
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$collect=$row['collect']-1; 
			$sql="update usarticle set collect='".$collect."' where articleid='".$number."'";
	 		$result=mysql_query($sql);
	 		if($result)
	 		{
	     		echo "<script>";
				echo "alert('已成功取消收藏，谢谢！');";
				echo "location.href='javascript:history.go(-1);'"; 
				echo "</script>";
        	}
     		else
	     		echo "<script>alert('数据未更新,取消收藏失败，请联系管理员，谢谢！');location.href='javascript:history.go(-1)';</script>;";	
		}
		else
		{
			echo "<script>";
			echo "alert('数据未插入，取消收藏失败,请联系管理员，谢谢！');";
			echo "location.href='javascript:history.go(-1);'";  
			echo "</script>";
		}
	}
	else
	{
		echo "<script>";
		echo "location.href='javascript:history.go(-1);'";  
		echo "</script>";
	}
}
else
{
	$sql="select * from usarticle where articleid='".$number."'"; 
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$tjrname=$row['username'];
	$name=$row['name'];
	$img=$row['articleimg']; 
	$collect=$row['collect']+1; 
 	$sql="insert into collect (username,tjrname,number,name,img,kind) values('".$username."','".$tjrname."','".$number."','".$name."','".$img."','0')";
	$result=mysql_query($sql);
 	if($result)
 	{
		$sql="update usarticle set collect='".$collect."' where articleid='".$number."'";
	 	$result=mysql_query($sql);
	 	if($result)
	 	{
	     	echo "<script>alert('已成功收藏，谢谢！');location.href='javascript:history.go(-1)';</script>;";
        }
     	else
	     	echo "<script>alert('收藏失败，请联系管理员，谢谢！');location.href='javascript:history.go(-1)';</script>;";			
	}
	else
    	echo "<script>alert('收藏失败，请联系管理员，谢谢！');location.href='javascript:history.go(-1)';</script>;";	
}
?>