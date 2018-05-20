<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
	</body>
</html>
<?php
error_reporting(0);
session_start();
$number=$_GET['number'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];
include("../Connections/myconn.php");
mysql_select_db("music");
mysql_query('set names utf8');
if(isset($_SESSION['username']))
 {
	$sql="select * from user where username='".$username."'"; 
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$address=$row['address'];
 }
else
 {
	echo "<script type='text/javascript'>alert('亲爱的，你还没有登录喔!');location.href='index.php';</script>";
 }     
if($address != "")
{
	$sql="select * from user where username='".$username."'"; 
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$address=$row['address'];
	$integral1=$row['integral'];
	$sql="select * from commodity where number='".$number."'"; 
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$price=$row['price'];
	$kc=$row['stock'];
	if($integral1>$price)
	{
		if($kc>0)
		{
			$integral=$integral1-$price;
			$sql="update user set integral='".$integral."' where username='".$username."'";
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			if($result)
			{
				$sql="select * from commodity where number='".$number."'"; 
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$name=$row['name'];
				$description=$row['description'];
				$img=$row['img']; 
			 	$sql="insert into intexchange (username,email,number,name,description,img,price,address) values('".$username."','".$email."','".$number."','".$name."','".$description."','".$img."','".$price."','".$address."')";
				$result=mysql_query($sql);
			 	if($result)
			 	{
				 	$sql="select * from commodity where number='".$number."'"; 
					$result=mysql_query($sql);
					$row=mysql_fetch_array($result);
					$stock=$row['stock']-1; 
					$sql="update commodity set stock='".$stock."' where number='".$number."'"; 
			 		$result=mysql_query($sql);
					if($result)
			 		{
						echo "<script>alert('您的商品已成功购买，请耐心等待，谢谢！');location.href='javascript:history.go(-1)';</script>;";
					}
					else
						echo "<script>alert('库存数量未成功更新，购买失败，请联系管理员，谢谢！');location.href='javascript:history.go(-1)';</script>;";
				}
				else
					echo "<script>alert('兑换信息未成功更新，购买失败，请联系管理员，谢谢！');location.href='javascript:history.go(-1)';</script>;";
		    }
		    else
			    echo "<script>alert('积分扣除失败，请联系管理员!');location.href='javascript:history.go(-1)';</script>;";	
		}
		else
		{
			echo "<script>alert('很遗憾库存不够了，购买失败，谢谢！');location.href='javascript:history.go(-1)';</script>;";
		}

	}
	else
	{
		echo "<script type='text/javascript'>alert('亲爱的，你的积分还不够喔!');location.href='javascript:history.go(-1)';</script>";
	}
}
else
{
	echo "<script type='text/javascript'>alert('亲爱的，你还没有填写收货地址喔!');location.href='person.php';</script>";
}

?>