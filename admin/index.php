<?php 
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/style.css">
    <title>管理员登录</title>

</head>
<body>

 <div class="bg"></div>
    <div class="container">
        <div class="line bouncein">
            <div class="xs6 xm4 xs3-move xm4-move">
                <div style="height:150px;"></div>
                <div class="media media-y margin-big-bottom">
                </div>
                <form action="" method="post">
                    <div class="panel loginbox">
                        <div class="text-center margin-big padding-big-top">
                            <h1>音悦后台管理中心</h1>
                        </div>
                        <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                            <div class="form-group">
                                <div class="field field-icon-right">
                                    <input type="text" class="input input-big" name="adminname" id="adminname" placeholder="登陆账号" />
                                    <span class="icon icon-user margin-small"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="field field-icon-right">
                                    <input type="password" class="input input-big" name="adminpassword" id="adminpassword"  placeholder="登录密码" />
                                    <span class="icon icon-key margin-small"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="field">
                                    <input type="text" class="input input-big" name="yzm" placeholder="填写右侧的验证码" />
                                    <img src="yzmimage.php" name="imageField" id="imageField" align="absmiddive" width="100" height="32" class="passcode" style="height:43px;cursor:pointer;" onClick="javascript:newgdcode(this,this.src);"/>
                                </div>
                            </div>
                        </div>
                        <div style="padding:30px;">
                            <input type="submit" id="submit" name="submit" class="button button-block bg-main text-big input-big" value="登录">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>    
<script language="javascript">
	var yzm = document.getElementById("yzm");
	function newgdcode(obj, url) {
		obj.src = url + '?yhmwtime=' + new Date().getTime();
		//后面传递一个随机参数，否则在IE7和火狐下，不刷新图片
		yzm.value = "";
	}
</script>
</html>
<?php
if(isset($_POST['submit']))
{
	//include "email.php";
	$adminname=$_POST['adminname'];
	$_SESSION['adminname']=$_POST['adminname'];
	$adminpassword=$_POST['adminpassword'];
	if($adminname!=""&&$adminpassword!="")
	{
		//1.建立数据库连接
		include "../Connections/myconn.php";
		//2.选择数据库
		mysql_select_db("music",$myconn);
		//3.写sql语句
		$sql="select * from admin where adminname='".$adminname."' and adminpassword='".$adminpassword."'";
		//4.执行sql
		$result=mysql_query($sql);
		//5.读出结果$result做相应的操作
		//通过获取$result的行数来判定用户名和密码是否正确
		$hang=mysql_num_rows($result);
		if (strcasecmp($_POST['yzm'], $_SESSION['yzm']) != 0)
		{
            echo "<script>alert('验证码不正确');</script>;";
        }
        else
        {
			if($hang==0)
			  echo "<script>alert('用户名或密码错误');</script>";
			else
				{
					echo "<script>alert('登陆成功！');location.href='frist.php';</script>"; 
	
				}
        }
    }
	else
	echo "<script>alert('用户名和密码不能为空！');</script>;";   
}
?>