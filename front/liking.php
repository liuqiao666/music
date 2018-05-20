<?php
error_reporting(0);
session_start();
$username=$_SESSION['username'];
$coment=$_GET['coment'];
$articleid=$_GET['articleid'];
$kind=$_GET['kind'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>评论点赞</title>
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

$sql="select * from thumbs where coment='".$coment."' and articleid='".$articleid."' and kind='".$kind."'";
$result=mysql_query($sql);
if(mysql_num_rows($result)>0)
{
	echo "<script>";
	echo " var r=confirm('取消点赞？！');";
	echo "</script>";

	if ($r!=true)
	{
		$sql="delete from thumbs where coment='".$coment."' and articleid='".$articleid."' and kind='".$kind."'";
		$result=mysql_query($sql);
		if($result)
		{
			$sql="select * from comment where coment='".$coment."' and articleid='".$articleid."' and kind='".$kind."'";
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$dzlike=$row['dzlike']-1; 
			$sql="update comment set dzlike='".$dzlike."' where coment='".$coment."' and articleid='".$articleid."' and kind='".$kind."'";
	 		$result=mysql_query($sql);
	 		if($result)
	 		{
	     		echo "<script>";
				echo "alert('已成功取消点赞，谢谢！');";
				echo "location.href='javascript:history.go(-1);'"; 
				echo "</script>";
        	}
     		else
	     		echo "<script>alert('数据未更新,取消点赞失败，请联系管理员，谢谢！');location.href='javascript:history.go(-1)';</script>;";	
		}
		else
		{
			echo "<script>";
			echo "alert('数据未插入，取消点赞失败,请联系管理员，谢谢！');";
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
 	$sql="insert into thumbs (articleid,coment,kind) values('".$articleid."','".$coment."','".$kind."')";
	$result=mysql_query($sql);
 	if($result)
 	{
 		$sql="select * from comment where coment='".$coment."' and articleid='".$articleid."' and kind='".$kind."'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$dzlike=$row['dzlike']+1;
		$sql="update comment set dzlike='".$dzlike."' where coment='".$coment."' and articleid='".$articleid."' and kind='".$kind."'";
	 	$result=mysql_query($sql);
	 	if($result)
	 	{
	     	echo "<script>alert('已成功点赞，谢谢！');location.href='javascript:history.go(-1)';</script>;";
        }
     	else
	     	echo "<script>alert('点赞失败，请联系管理员1，谢谢！');location.href='javascript:history.go(-1)';</script>;";			
	}
	else
    	echo "<script>alert('点赞失败，请联系管理员2，谢谢！');location.href='javascript:history.go(-1)';</script>;";	
}
?>