<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>用户登录</title>
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
			<h1 class="margin-bottom-15" style="color: floralwhite;">音悦-登录页</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="" method="post">				
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="username" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
		            	<input type="text" class="form-control" id="username" name="username" placeholder="账 号">
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" class="form-control" id="password" name="password" placeholder="密 码">
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
	             	<div class="checkbox control-wrapper">
	                	<label>
	                  		<input type="checkbox"> 记住账号
                		</label>
	              	</div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input type="submit" value="登 录" id="submit" name="submit" class="btn btn-info">
		          		<a href="forgot-password.php" class="text-right pull-right">忘记密码？</a>
		          	</div>
		          </div>
		        </div>
		        <hr>
		      </form>
		      <div class="text-center">
		      	<a href="register.php" class="templatemo-create-new" style="color: floralwhite;">注册一个账号 <i class="fa fa-arrow-circle-o-right"></i></a>	
		      </div>
		</div>
	</div>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
	//include "email.php";
	$username=$_POST['username'];
	$password=$_POST['password'];
	if($username!="" && $password!=""){
		//1.建立数据库连接
		include "Connections/myconn.php";
		//2.选择数据库
		mysql_select_db("music",$myconn);
		//3.写sql语句
		$sql="select * from user where username='".$username."' and userpassword='".$password."'";
		//4.执行sql
		$result=mysql_query($sql);
		//5.读出结果$result做相应的操作
		//通过获取$result的行数来判定用户名和密码是否正确
		$hang=mysql_num_rows($result);
		
		$sql="select *from user where username='".$username."' and userpassword='".$password."' and status='1'";
		$result=mysql_query($sql);
		if($hang==0)
		  echo "<script>alert('用户名或密码错误');</script>";
		else
			{
				if(mysql_num_rows($result)==0){
					echo "<script>alert('用户未激活！');</script>";
				}
				else{
						$_SESSION['username']=$_POST['username'];
						$sql="select * from user where username='".$username."'"; 
						$result=mysql_query($sql);
						$row=mysql_fetch_array($result);
						$_SESSION['email']=$row['email'];
				  		echo "<script>alert('登陆成功，欢迎来到音悦^-^');</script>";
				  		echo "<script> location.href='front/index.php';</script>"; 
				  }
			}
        }
}
if(isset($_POST['zc']))
{
	echo "<script>location.href='register.php';</script>"; 
	
}
?>