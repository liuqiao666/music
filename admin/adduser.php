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
<div id="urHere">音悦分享后台管理中心<b>></b><strong>添加用户</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
  <h3><a href="usercontrol.php" class="actionBtn">用户列表</a>添加用户</h3>
    <form role="form" action="" method="post" enctype="multipart/form-data">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="90" align="right">用户名</td>
       <td>
        <input type="text" name="yhm" id="yhm" value="" size="80" class="inpMain" />
       </td>
      </tr>
       <tr>
       <td width="90" align="right">密码</td>
       <td>
        <input type="text" id="mm" name="mm" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">Email地址</td>
       <td>
        <input type="email" id="email" name="email" value="" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">头像</td>
       <td>
        <input type="file" id="myfile" value="" name="myfile" size="38" class="inpFlie" />
       </td>
      </tr>
       <tr>
       <td align="right">性别</td>
       <td>
        <input type="text" id="sex" name="sex" value="" size="50" class="inpMain" placeholder="性别: 女，男" />
       </td>
      </tr>
       <tr>
       <td align="right">籍贯</td>
       <td>
        <input type="text" id="place" name="place" value="" size="50" class="inpMain" />
       </td>
      </tr>
       <tr>
       <td align="right">积分</td>
       <td>
        <input type="text" id="integral" name="integral" value="" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">收货地址</td>
       <td>
        <input type="text" id="address" name="address" value="" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        <input type="submit" name="submit" id="submit" class="btn" value="确认" />
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
		$username=$_POST['yhm'];
		$userpassword=$_POST['mm'];
		$email=$_POST['email'];
		$sex=$_POST['sex'];
		$place=$_POST['place'];
		$integral=$_POST['integral'];
		$address=$_POST['address'];
			
		include "../Connections/myconn.php";
	 	mysql_select_db("music",$myconn);
	 	$sql="select *from user where username='".$username."'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result)>0){
			echo "<script>alert('账户已存在！');</script>;";
		}
		else
		{
			//1.上传头像图片
		 	if($_FILES['myfile']['type']=="image/jpeg"||$_FILES['myfile']['type']=="image/png"||$_FILES['myfile']['type']=="image/pjpeg")//判断文件格式是否为JPEG
			{
		 		if($_FILES['myfile']['error']>0)				//判断上传是否出错
					echo "错误：".$_FILES['myfile']['error'];		//输出错误信息
		 		else
		 		{
					$tmp_filename=$_FILES['myfile']['tmp_name'];		//临时文件名
					$filename=$_FILES['myfile']['name'];			//上传的文件名
					$dir=$_SERVER['DOCUMENT_ROOT']."/music/images/userheaderimg/";		//上传后文件的位置
					if(is_uploaded_file($tmp_filename))			//判断是否通过HTTP POST上传
					{
						//上传并移动文件
						if(move_uploaded_file($tmp_filename, $dir.$filename))
						{
							 	$sql="insert into user (username,userpassword,email,image,status,sex,place,integral,address) values('".$username."','".$userpassword."','".$email."','".$filename."','1','".$sex."','".$place."','".$integral."','".$address."')";
							 	$result=mysql_query($sql);
							 	if($result)
							 	{
							     	echo "<script>alert('用户已添加！');location.href='usercontrol.php';</script>;";
						        }
						     	else
							     	echo "<script>alert('用户添加失败!');location.href='usercontrol.php';</script>;";	
						}
						else
							echo "<script>alert('图片上传失败');</script>;";
					}
				}
			}
			else
			{
				echo "<script>alert('文件格式非图片');</script>;";
			}
		}
	}	
?>
    