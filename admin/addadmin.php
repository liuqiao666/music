<?php
error_reporting(0);
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
<div id="urHere">音悦分享后台管理中心<b>></b><strong>添加管理员</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
   <h3><a href="admincontrol.php" class="actionBtn">管理员列表</a>添加管理员</h3>
    <form action="" method="post">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="90" align="right">管理员名称</td>
       <td>
        <input type="text" name="adminname" value="" size="80" class="inpMain" />
       </td>
      </tr>
       <tr>
       <td width="90" align="right">登陆密码</td>
       <td>
        <input type="text" name="adminpassword" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">E-mail地址</td>
       <td>
        <input type="email" id="email" name="email" value="" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        <input name="submit" class="btn" type="submit" value="添加" />
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
		$adminname=$_POST['adminname'];
		$adminpassword=$_POST['adminpassword'];
		$email=$_POST['email'];
			
		include "../Connections/myconn.php";
	 	mysql_select_db("music",$myconn);
	 	$sql="select *from admin where adminname='".$adminname."'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result)>0){
			echo "<script>alert('账户已存在！');</script>;";
		}
		else
		{
		 	$sql="insert into admin (adminname,adminpassword,email) values('".$adminname."','".$adminpassword."','".$email."')";
		 	$result=mysql_query($sql);
		 	if($result)
		 	{
		     	echo "<script>alert('管理员已添加！');location.href='admincontrol.php';</script>;";
	        }
	     	else
		     	echo "<script>alert('管理员添加失败!');location.href='admincontrol.php';</script>;";	
		}
	}	
?>
    