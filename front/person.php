<?php
error_reporting(0);
session_start();
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的主页</title>
<link href="../css/headerimg.css" rel="stylesheet">
<link href="css/bootstrap-fileinput.css" rel="stylesheet">
<link href="css/own.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-fileinput.js"></script>
<style>
.pop {  display: none;  width: 600px; min-height: 200px;  max-height: 900px;  height:440px;  position: absolute;  top: 0;  left: 0;  bottom: 0;  right: 0;  margin: auto;  padding: 55px;  z-index: 130;  border-radius: 8px;  background-color: #fff;  box-shadow: 0 3px 18px rgba(100, 0, 0, .5);  }
.pop2 {  display: none;  width: 600px; min-height: 200px;  max-height: 900px;  height:440px;  position: absolute;  top: 0;  left: 0;  bottom: 0;  right: 0;  margin: auto;  padding: 25px;  z-index: 130;  border-radius: 8px;  background-color: #fff;  box-shadow: 0 3px 18px rgba(100, 0, 0, .5);  }
.pop-top{  height:40px;  width:100%;  border-bottom: 1px #E5E5E5 solid;  }
.pop-top h2{  float: left;  display:black}
.pop-top span{  float: right;  cursor: pointer;  font-weight: bold; display:black}
.pop-foot{  height:100px;  line-height:50px;  width:100%;  border-top: 1px #E5E5E5 solid;  text-align: right;  }
.pop-cancel, .pop-ok {  padding:8px 15px;  margin:15px 5px;  border: none;  border-radius: 5px;  background-color: #337AB7;  color: #fff;  cursor:pointer;  }
.pop-cancel {  background-color: #FFF;  border:1px #CECECE solid;  color: #000;  }
.pop-content{  height: 300px;  }
.pop-content-left{  float: left;  }
.pop-content-right{  width:600px;  float: left;  padding-left:20px;  font-size: 16px;  line-height:60px;  }
.bgPop{  display: none;  position: absolute;  z-index: 129;  left: 0;  top: 0;  width: 100%;  height: 100%;  background: rgba(0,0,0,.2);  }
.bgPop2{  display: none;  position: absolute;  z-index: 129;  left: 0;  top: 0;  width: 100%;  height: 100%;  background: rgba(0,0,0,.2);  }
.in{
border:2px solid #a1a1a1;
padding:10px 40px; 
background:#FFFFFF;
width:400px;
border-radius:25px;
box-shadow: none !important;
outline: none;	
}
input{
		box-shadow: none !important;
		outline: none;	
}
</style>
</head>

<body>
<?php include("header.php");?>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<div class="main"><!--最外层-->
<?php
include("../Connections/myconn.php");
mysql_select_db("music");
mysql_query('set names utf8');
if(isset($_SESSION['username']))
 {
	$sql="select * from user where username='".$username."'";
 }
 else
 {
	echo "<script type='text/javascript'>alert('您还未登录，请登录!');location.href='../login.php';</script>";
 }     
 $result=mysql_query($sql);
 $row=mysql_fetch_object($result)
?>
	<div class="information"><!--个人信息部分-->
		<a class="click_pop2" href="javascript:void(0);">
    	<div class="head-img"><img src="../images/userheaderimg/<?php echo $row->image;?>"/></div><!--头像-->
    	</a>
		<!--遮罩层-->
		<div class="bgPop2"></div>
		<!--弹出框-->
		<div class="pop2">
		<div class="pop-top">
		    <h2><?php echo $row->username;?>的个人信息修改</h2>
		    <span class="pop-close2">Ｘ</span>
		</div>
		<form method="post" action="" enctype="multipart/form-data" role="form">
		<div class="pop-content">
		  <div class="container">
		    <div class="page-header">
		        <h1>头像上传</h1>
		            <div class="form-group" id="uploadForm" enctype='multipart/form-data'>
		                <br><br>
		                <div class="fileinput fileinput-new" data-provides="fileinput"  id="exampleInputUpload">
		                    <div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;">
		                        <img id='picImg' style="width: 100%;height: auto;max-height: 140px;" src="images/noimage.png" alt="" />
		                    </div>
		                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
		                    <div>
		                        <span class="btn btn-primary btn-file">
		                            <span class="fileinput-new">选择文件</span>
		                            <span class="fileinput-exists">换一张</span>
		                            <input type="file" name="myfile"/>
		                        </span>
		                        <a href="javascript:;" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">移除</a>
		                    </div>
		                </div>
		            </div>
		    	</div>
			</div>
		  </div>
		</form>

		    <div class="pop-foot">
		    	<input type="submit" value="确认" class="pop-ok" name="xgtx"/>
		        <input type="button" value="close" class="pop-cancel pop-close"/>
		    </div>
		    </form> 
		</div>
    	 <div><!--部分信息-->        
          <div>
        	<div height="32"><h1>用户名：<?php echo $row->username;?><span class="xiugai">
        	 <p class="act">
        	 	<a class="suggest_input click_pop" href="javascript:void(0);">
        	 	<input name="alter" class="suggest_input" value="修改信息" type="button"></a>	
             </p>
        	</span>
        	</div>
          </div>
          
            <div><h3 class="bigtext"></h3></div>
            <div class="cdinfo">
                	<ul>
                		<li>
                        	<span>性别：</span>
                        	<?php echo $row->sex;?>
                        </li>
                		<li>
                        	<span>积分:</span>
                        	<?php echo $row->integral;?>
                        </li>
                    	<li>
                        	<span>邮件:</span>
                        	<?php echo $row->email;?>
                       </li>
                        <li>
                        	<span>收货信息：</span>
                        	<?php echo $row->address;?>
                        </li> 
                    </ul>
            </div>
            
            <div>
            	<P style="padding-left: 220px;">我的签名：<font face="黑体" size="4"><?php echo $row->myself;?></font></P>
            </div>
            
        </div><!--部分信息--> 
    </div><!--个人信息部分-->
    
    	<!--遮罩层-->
			<div class="bgPop"></div>
			<!--弹出框-->
			<div class="pop">
		    <div class="pop-top">
		        <h2><?php echo $row->username;?>的个人信息修改</h2>
		        <span class="pop-close">Ｘ</span>
		    </div>
		    <form method="post" action="">
		    <div class="pop-content">
		        <div class="pop-content-left">
		            <img src="" alt="" class="teathumb">
		        </div>
		        <div class="pop-content-right">		        	
		            <p>用户名：<input class="in" type="text" name="username" value="<?php echo $row->username;?>"/></p>
		            <p>邮箱地址:<input class="in" type="text" name="email" value="<?php echo $row->email;?>"/></p>
		            <p>性别:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="in" type="text" name="sex" value="<?php echo $row->sex;?>"/></p>
		            <p>籍贯:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="in" type="text" name="place" value="<?php echo $row->place;?>"/></p>
		            <p>收货信息:<input class="in" type="text" name="address" placeholder="电话+地址，谢谢配合！" value="<?php echo $row->address;?>"/></p>
		            <p>个性签名:<input class="in" type="text" name="myself" value="<?php echo $row->myself;?>"/></p>
		        </div>
		    </div>

		    <div class="pop-foot">
		    	<input type="submit" value="确认" class="pop-ok" name="xgxx"/>
		        <input type="button" value="close" class="pop-cancel pop-close"/>
		    </div>
		    </form> 
		</div>
		
    <hr>
    <div class="collect"><!--收藏的歌曲-->
    	<h2>分享圈收藏</h>
    	<?php
		$sql="select * from collect where username='".$username."' and kind=0 limit 4";
		$result=mysql_query($sql);
		while($row=mysql_fetch_object($result))
		{
		?>
        <div class="poo15"><!--循环部分-pool5-->
        	<table class="track_list">
            	<tr><td class="song_name">
        		<a href="sharing_open.php?articleid=<?php echo $row->number;?>&username=<?php echo $row->tjrname;;?>">
                    <?php echo $row->name;?></a></td>                
                    <td class="private_act">
                    	<a class="removeIT" href="scollecting.php?username=<?php echo $row->username;?>&articleid=<?php echo $row->number;?>"></a><!--删除-->
                    </td>
                </tr>
            </table> 
        </div><!--循环部分-pool5-->
        <?php }?>
        <div class="p_more">
        	<a href="scollectmore.php" title="更多">更多</a>
        </div>       
    </div><!--收藏的歌曲-->
    
        
    <div class="collect"><!--收藏的期刊-->
      <h2>期刊收藏</h2>
    	<?php 
		$sql="select * from collect where username='".$username."' and kind=1 limit 4";
		$result=mysql_query($sql);
		while($row=mysql_fetch_object($result))
		{
		?> 
        	<div class="pool10">
            	<div class="chart_artsit">
                	<ul>
                    	<li>
                        	<div class="chart_artsit_item">
                             <a class="ico_radio" href="periodical_open.php?articleid=<?php echo $row->number;?>&username=<?php echo $row->username;?>" title=""><?php echo $row->name;?></a> 
                              <div class="private_act">
                    			<a class="removeIT" href="pcollecting.php?username=<?php echo $row->username;?>&articleid=<?php echo $row->number;?>"></a><!--删除-->
                              </div>
                            </div>  
                       </li> 
                   </ul>
                </div>
            </div>
		<?php }?>
       <div class="p_more">
        	<a href="pcollectalmore.php" title="更多">更多</a>
       </div> 
    </div><!--收藏的期刊-->
 
  <!--反馈意见-->
  <form role="form" method="post" action="">
    <div id="wall" class="suggest suggest_1">
		<h3 >我来说两句</h3>
    	<div class="suggest_2">
			<div class="suggest_form">
				<div>
					<div class="auto">
                    	<textarea name="message" cols="60" rows="6" maxlength="300"></textarea>
					</div>
				</div>
        		<p class="act">                    
				<input name="submit" class="suggest_input" value="反馈意见" type="submit"></p>
			</div>													
		</div>
    </div><!--我来说两句-->
  </form>
<script>
$(document).ready(function () {
    $('.pop-close').click(function () {
        $('.bgPop,.pop').hide();
    });
    $('.click_pop').click(function () {
        $('.bgPop,.pop').show();
    });
})
$(document).ready(function () {
    $('.pop-close2').click(function () {
        $('.bgPop2,.pop2').hide();
    });
    $('.click_pop2').click(function () {
        $('.bgPop2,.pop2').show();
    });
})
</script>    
<?php
if(isset($_POST['submit']))
{
	$message=$_POST['message'];
	$sql="select * from user where username='".$username."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$email=$row['email'];
	$sql="select * from opinion where message='".$message."'";
	$result=mysql_query($sql);
	echo "$sql";
	if(mysql_num_rows($result))
	{
		echo "<script>";
		echo "alert('请勿重复反馈相同的意见，感谢您的参与!');";
		echo "location.href='javascript:history.go(-1)'";
		echo "</script>";	
	}
	else
	{
		$sql="insert into opinion (username,message,email) values('".$username."','".$message."','".$email."')";
		$result=mysql_query($sql);
		if($result)
		{
			echo "<script>";
			echo "alert('您的意见已成功反馈，感谢您的参与!');";
			echo "location.href='javascript:history.go(-1)'";
			echo "</script>";		
		}
		else
		{
			echo "<script>";
			echo "alert('很遗憾您的意见反馈失败，请发邮件私信管理员，管理员email:1255394075@qq.com');";
			echo "location.href='javascript:history.go(-1)'";
			echo "</script>";
		} 
	}
	
}	
?>        
    
</div><!--最外层-->
</form>
<?php include("footer.php");?>
</body>
</html>
<?php 
if(isset($_POST['xgxx']))
{

	$sql="update user set username='".$_POST['username']."',email='".$_POST['email']."',sex='".$_POST['sex']."',place='".$_POST['place']."',address='".$_POST['address']."',myself='".$_POST['myself']."' where username='".$username."'";
	$result=mysql_query($sql);
	if($result)
	{
		echo "<script>";
		echo "alert('修改成功!');";
		echo "location.href='person.php'";
		echo "</script>";
		}
	else
	{
		echo "<script>";
		echo "alert('修改失败，请联系管理员，谢谢!');";
		echo "</script>";
	}
}
?>
<?php
if(isset($_POST['xgtx']))
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
					 	$sql="update user set image='".$filename."' where username='".$username."'";
					 	$result=mysql_query($sql);
					 	if($result)
					 	{
					     	echo "<script>alert('头像已成功修改!');location.href='person.php';</script>;";
				        }
				     	else
					     	echo "<script>alert('头像修改失败，请联系管理员，谢谢!');location.href='person.php';</script>;";	
				}
				else
					echo "<script>alert('头像修改失败，请联系管理员，谢谢!');location.href='person.php';</script>;";
			}
		}
	}
	else
	{
		echo "<script>alert('文件格式非图片，头像修改失败!');location.href='person.php';</script>;";
	}
}
?>