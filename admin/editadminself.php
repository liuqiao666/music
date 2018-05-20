<?php
error_reporting(0);
session_start();
$adminname=$_GET['adminname'];
include("top.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>音悦分享后台管理中心</title>
<link href="css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/global.js"></script>
</head>
<body>
<?php include("side.php"); ?>
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">音悦分享后台管理中心<b>></b><strong>修改管理员信息</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
   <h3><a href="frist.php" class="actionBtn">返回</a>修改管理员信息</h3>
    <form action="" method="post">
    <?php
	//1.连接数据库
	include("../Connections/myconn.php");
	//2.选择数据库
	mysql_select_db("music",$myconn);
	//3.写sql
	$sql="select * from admin where adminname='".$adminname."'";
	//4.执行sql
	$result=mysql_query($sql);
	//5.处理结果
	$row=mysql_fetch_array($result);
	?>
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="90" align="right">管理员名称</td>
       <td>
        <input type="text"  id="adminname" name="adminname" value="<?php echo $row['adminname'];?>" size="80" class="inpMain" />
       </td>
      </tr>
       <tr>
       <td width="90" align="right">登陆密码</td>
       <td>
        <input type="text" id="adminpassword" name="adminpassword" value="<?php echo $row['adminpassword'];?>" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">E-mail地址</td>
       <td>
        <input type="email" id="email" name="email" value="<?php echo $row['email'];?>" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        <input name="submit" id="submit" class="btn" type="submit" value="确认" />
       </td>
      </tr>
     </table>
    </form>
       </div>
 </div>
 <div class="clear"></div>
<?php include("footer.php"); ?>
</body>
</html>
<?php
if(isset($_POST['submit']))
{	
	$adminname=$_SESSION['adminname'];
	$adminpassword=$_POST['adminpassword'];
	$email=$_POST['email'];


	//3.写SQL代码
	if($_SESSION['adminname'] != $_POST['adminname'])
	{

		$sql="select *from admin where adminname='".$_POST['adminname']."'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result)>0){
			echo "<script>alert('管理员账户名已存在！');</script>;";
		}
		else
		{
			
		 	$sql="update admin set adminname='".$_POST['adminname']."',adminpassword='".$adminpassword."',email='".$email."' where adminname='".$adminname."'";
		 	$result=mysql_query($sql);
		 	if($result)
		 	{
				echo "<script>alert('您的信息已成功修改,请重新登录，谢谢！');location.href='index.php';</script>;";
	        }
	     	else
		     	echo "<script>alert('管理员信息修改失败!');location.href='javascript:history.go(-2)';</script>;";	
		}
	}
	else
	{
		$sql="update admin set adminname='".$_POST['adminname']."',adminpassword='".$adminpassword."',email='".$email."' where adminname='".$adminname."'";
		 	$result=mysql_query($sql);
		 	if($result)
		 	{
				echo "<script>alert('您的信息已成功修改,请重新登录，谢谢！');location.href='index.php';</script>;";
	        }
	     	else
		     	echo "<script>alert('管理员信息修改失败!');location.href='javascript:history.go(-2)';</script>;";	
	}
}	
?>