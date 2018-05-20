<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>找回密码</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray" background="images/templatemo-bg-1.jpg">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15" style="color: floralwhite;">忘记密码</h1>
			<form class="form-horizontal templatemo-forgot-password-form templatemo-container" role="form" action="" method="post">	
				<div class="form-group">
		          <div class="col-md-12">
		          	请输入一个您已在我们的网站上注册过的邮箱
		          </div>
		        </div>		
		        <div class="form-group">
		          <div class="col-md-12">
		            <input type="email" class="form-control" id="email" name="email" placeholder="输入您的邮箱" required="required">	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-6">
		            <input type="submit" value="确认" name="submit" class="btn btn-danger">
                    <br><br>
		          </div>
		          <div class="col-md-6">
		          <input  type="submit" name="login" class="btn btn-danger" value="登录"></input> 
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
	$email=trim($_POST['email']);
	$_SESSION['username']=$_POST['email'];
    include "psemail.php";
	echo "<script>alert('找回密码邮件发送成功，请您及时修改密码，谢谢！');</script>;";  
}
?>