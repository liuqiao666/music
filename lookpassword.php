<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>重置密码</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray" background="images/templatemo-bg-1.jpg">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15" style="color: floralwhite;">重置密码</h1>
			<form class="form-horizontal templatemo-forgot-password-form templatemo-container" role="form" action="" method="post">	
				<div class="form-group">
		          <div class="col-md-12">
		          	新密码
		          </div>
		        </div>		
		        <div class="form-group">
		          <div class="col-md-12">
		            <input type="password" class="form-control" name="pw" placeholder="">	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-6">
		            <input type="submit" value="确认" name="submit" class="btn btn-danger">
                    <br><br>
		          </div>
		          <div class="col-md-6">
		          <input  type="submit" name="login" class="btn btn-danger" value="登录" ></input> 
		          </div>
		        </div>
		      </form>
		</div>
	</div>
</body>
</html>
<?php
if(isset($_POST['login']))
{
echo "<script>location.href='login.php';</script>";
}
if(isset($_POST['submit']))
{
    include "Connections/myconn.php";
 	mysql_select_db("music",$myconn);
 	$sql="update user set userpassword ='".$_POST['pw']."' where email='".$_GET['email']."'";
	$result=mysql_query($sql);
	if($result){	
	  echo "<script>alert('修改成功！');location.href='login.php';</script>;";
	}
}
?>