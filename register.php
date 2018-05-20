<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>用户注册</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- PAGE LEVEL STYLES -->
    <link href="css/bootstrap-fileupload.min.css" rel="stylesheet" />
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray" background="images/templatemo-bg-1.jpg">
	<h1 class="margin-bottom-15" style="color: floralwhite;">注册账号</h1>
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-create-account templatemo-container" role="form" enctype="multipart/form-data" action="" method="post">
				<div class="form-inner">
					<div class="form-group">
			          <div class="col-md-12">		          	
			            <label for="username" class="control-label">用户名</label>
			            <input type="text" class="form-control" id="username" name="username" placeholder="">		            		            		            
			          </div>  
			        </div>
			        <div class="form-group">
			          <div class="col-md-6">
			            <label for="password" class="control-label">密码</label>
			            <input type="password" class="form-control" id="password" name="password" placeholder="">
			          </div>
			          <div class="col-md-6">
			            <label for="password" class="control-label">确认密码</label>
			            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="">
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">		          	
			            <label for="username" class="control-label">邮箱</label>
			            <input type="email" class="form-control" id="email" name="email" placeholder="请输入您的邮箱，必填！" required="required">		            		            		            
			          </div>              
			        </div>			
			        
			        <div class="form-group">
                        
                        <div class="col-md-7">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="col-md-5">
                            	<label>头像预览</label>
                            	<div class="fileupload-preview thumbnail" style="width: 100px; height: 100px;"></div>
                            	</div>
                            	<div class="col-md-3" style="margin-top: 80px;">
                                <span class="btn btn-file btn-success">
                                <span class="fileupload-new">选择头像</span>
                                <span class="fileupload-exists">选择头像</span>
                                <input  type="file" name="myfile" /></span>
                            	</div> 
                            </div>
	                    </div>
                        <div class="col-md-5 templatemo-radio-group">
                        	<label for="sex" class="control-label">性别</label>
                        	<div>
				          	<label class="radio-inline">
			          			<input type="radio" name="sex" id="male" checked="" value="男"> 男
			          		</label>
			          		<label class="radio-inline">
			          			<input type="radio" name="sex" id="female" value="女"> 女
			          		</label>
			          		</div>
	                    </div>
                    </div>
                    <div class="form-group">
			          <div class="col-md-12">		          	
			            <label for="place" class="control-label">籍贯</label>
			            <select class="form-control" name="place">
                            <option>海口</option>
                            <option>成都</option>
                            <option>重庆</option>
                            <option>巴中</option>
                        </select>		            		            		            
			          </div>
			        </div>
			        <div class="form-group">
			        	<div class="col-md-2">		          	
			            	<h5>验证码:</h5>	            		            		            
			          </div>
			          <div class="col-md-6">		          	
			            <input type="text" class="form-control" id="yzm" name="yzm" placeholder="请输入验证码">		            		            		            
			          </div>
			          <div class="col-md-4">		          	
			            <img src="yzmimage.php" name="imageField" id="imageField" alt="看不清楚，换一张" align="absmiddle" style="cursor: pointer;" onclick="javascript:newgdcode(this,this.src);" />            		            		            
			          </div>
			        </div>
			        
			        <div class="form-group">
			          <div class="col-md-12">
			            <label><input type="checkbox" name="ty" checked="checked">我同意 <a href="javascript:;" data-toggle="modal" data-target="#templatemo_modal">服务协议</a> 和<a href="#">各种不平等条款.</a></label>
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">
			            <input type="submit" value="注册账号" name="submit" class="btn btn-info">
			            <a href="login.php" class="pull-right">登录</a>
			          </div>
			        </div>	
				</div>				    	
		      </form>		      
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="templatemo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">用户条例</h4>
	      </div>
	      <div class="modal-body">
	      	<p></p>
	        <p></p>
	        <p></p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- PAGE LEVEL SCRIPTS -->
    <script src="js/bootstrap-fileupload.js"></script>
</body>
</html>
<script language="javascript">
    var yzm=document.getElementById("yzm"); 
	function newgdcode(obj,url) { 
		obj.src = url+ '?nowtime=' + new Date().getTime(); 
		//后面传递一个随机参数，否则在IE7和火狐下，不刷新图片 
		yzm.value="";
	} 
</script>
<?php
if(isset($_POST['submit']))
{  
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);
	$email=trim($_POST['email']);
	$password_confirm=trim($_POST['password_confirm']);

	$token = md5($username.$password.$regtime); //创建用于激活识别码 
	$token_exptime = time()+60*60*24;//过期时间为24小时后 	
	if($username==""||$password==""||$password_confirm=="")
	{
	   echo "<script>alert('密码或账号不能为空');</script>;";
	}
	else
	{   //2.将所有信息写入数据库
	 	include "Connections/myconn.php";
	 	mysql_select_db("music",$myconn);
	 	$sql="select *from user where username='".$username."'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result)>0){
			echo "<script>alert('账户已存在！');</script>;";
			exit;
		}
		else
		{
			if(strcmp($password,$password_confirm)!=0)
			  	{
					echo "<script>alert('密码不一致');</script>;";
				}
				
			  else
			    {
					if(strcasecmp($_POST['yzm'],$_SESSION['yzm'])!=0)
					{
						 echo "<script>alert('验证码不正确');</script>;";
					}
				 	else
				 	{
					 	//1.上传头像图片
					 	if($_FILES['myfile']['type']=="image/jpeg"||$_FILES['myfile']['type']=="image/png"||$_FILES['myfile']['type']=="image/pjpeg")				//判断文件格式是否为JPEG
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
										if(isset($_POST['ty']))
										{
										 	$sql="insert into user (username,userpassword,email,sex,place,image) values('".$_POST['username']."','".$_POST['password']."','".$_POST['email']."','".$_POST['sex']."','".$_POST['place']."','".$filename."');";
										 	$result=mysql_query($sql);
										 	if($result)
										 	{
										 		$_SESSION['username']=$username;
										 	    include "email.php"; 
										     	echo "<script>alert('账号已注册，请验证邮箱后登录！');location.href='login.php';</script>;";
									        }
									     	else
										     	echo "<script>alert('注册失败');</script>;";	
								    	}
										else
										{
											echo "<script>alert('您未同意协议，不能注册');</script>;";
										}
									}
									else
										echo "<script>alert('上传失败');</script>;";
								}
							}
						}
						else
						{
							echo "<script>alert('文件格式非图片');</script>;";
						}
			  		}
			 	}
		}	
	}
}
?>