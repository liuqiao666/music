<?php
header('Content-Type:text/html;charset=UTF-8');
error_reporting(0);
session_start();
$username = $_SESSION['username'];
$time = time();
$day = date("Y-m-d",$time);//获取当前日期
include("../Connections/myconn.php");
mysql_select_db("music");
mysql_query('set names utf8');
if(isset($_SESSION['username']))
{
	$sql="select * from sign where username='".$username."' and time='".$day."'";
}
else
{
	echo "<script type='text/javascript'>alert('您还未登录，请登录!');location.href='../login.php';</script>";
} 
$result=mysql_query($sql);
if(mysql_num_rows($result))
{
	echo "<script>";
	echo "alert('亲，今天你已经签过了喔，明天再来吧^-^');";
	echo "location.href='index.php'";
	echo "</script>";	
}
else
{
	$sql="insert into sign (username,time) values('".$username."','".$day."')";
	$result=mysql_query($sql);
	if($result)
	{
		$sql="select * from user where username='".$username."'"; 
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$integral=$row['integral']+20; 
		$sql="update user set integral='".$integral."' where username='".$username."'"; 
 		$result=mysql_query($sql);
 		if($result)
 		{
			echo "<script>";
			echo "alert('签到成功，积分+20，感谢您的参与!');";
			echo "location.href='index.php'";
			echo "</script>";
		}
		else
		{
			echo "<script>";
			echo "alert('积分更新失败，请联系管理员!');";
			echo "location.href='index.php'";
			echo "</script>";
		}		
	}
	else
	{
		echo "<script>";
		echo "alert('签到失败，请联系管理员!');";
		echo "location.href='index.php'";
		echo "</script>";
	} 
}
?> 