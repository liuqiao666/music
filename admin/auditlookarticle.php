<?php
session_start(); 
error_reporting(0);
$id=$_GET['articleid'];
$username = $_SESSION['username'];
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
<script type="text/javascript" src="../front/js/jquery-1.8.0.min.js"></script><!--弹窗js-->
<style>
*{padding:0px;margin:0px;}
.pop {  display: none;  width: 600px; min-height: 150px;  max-height: 750px;  height:200px;  position: absolute;  top: 0;  left: 0;  bottom: 0;  right: 0;  margin: auto;  padding: 25px;  z-index: 130;  border-radius: 8px;  background-color: #fff;  box-shadow: 0 3px 18px rgba(100, 0, 0, .5);  }
.pop-top{  height:40px;  width:100%;  border-bottom: 1px #E5E5E5 solid;  }
.pop-top h2{  float: left;  display:black}
.pop-top span{  float: right;  cursor: pointer;  font-weight: bold; display:black}
.pop-foot{  height:50px;  line-height:50px;  width:100%;  border-top: 1px #E5E5E5 solid;  text-align: right;  }
.pop-cancel, .pop-ok {  padding:8px 15px;  margin:15px 5px;  border: none;  border-radius: 5px;  background-color: #337AB7;  color: #fff;  cursor:pointer;  }
.pop-cancel {  background-color: #FFF;  border:1px #CECECE solid;  color: #000;  }
.pop-content{  height: 100px;  }
.pop-content-left{  float: left;  }
.pop-content-right{  width:310px;  float: left;  padding-top:20px;  padding-left:20px;  font-size: 16px;  line-height:35px;  }
.bgPop{  display: none;  position: absolute;  z-index: 129;  left: 0;  top: 0;  width: 100%;  height: 100%;  background: rgba(0,0,0,.2);  }
.in{
border:2px solid #a1a1a1;
padding:10px 40px;
padding-left: 50px; 
background:#FFFFFF;
width:400px;
border-radius:25px;
box-shadow: none !important;
outline: none;
height: 50px;	
}
input{
		box-shadow: none !important;
		outline: none;	
}
td{
	padding: 10px;
}
</style>
</head>
<body>
<?php include("side.php"); ?>
<?php
//1.连接数据库
include("../Connections/myconn.php");
//2.选择数据库
mysql_select_db("music",$myconn);
//3.写sql
$sql="select * from usarticle where articleid='".$id."'";
//4.执行sql
$result=mysql_query($sql);
//5.处理结果
$row=mysql_fetch_array($result);
?>
<div id="dcMain">
<div id="urHere">音悦分享后台管理中心<b>></b><strong>审核文章</strong> </div>   
<div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
<h3><a href="auditarticle.php" class="actionBtn">待审核</a>审核文章</h3>
<form action="" method="post">
<table width="1200" height="163" border="0" align="center" style="padding-left: 150px;">
  <tr>
    <td height="28" colspan="2"><h2 align="center"><font size="5" color="#000000" face="微软雅黑"><?php echo $row['name'];?></font></h2></td>
  </tr>
  <tr>
    <td width="470" height="100" rowspan="3"><img  style="float: left;" width="600px" height="600px" src="../images/userwenzhang/<?php echo $row['articleimg'];?>"/></td>
    <td width="345" height="10">
    	<p class="weixinAudio"  style="float:left;">
	<audio src="" id="media" width="1" height="1" preload></audio>
	<span id="audio_area" class="db audio_area">
		<span class="audio_wrp db">
			<span class="audio_play_area">
				<i class="icon_audiodefault"><img src="images/shengyin.png" alt=""></i>
				<i class="icon_audioplaying"><img src="images/shengyin.gif" alt=""></i>
    		</span>
			<span id="audio_length" class="audio_length tips_global"></span>
			<span id="curent_time">0:00</span>
			<span class="db audio_info_area">
        		<strong class="db audio_title"><?php echo $row['music'];?></strong>
			</span>
			<span id="int_c"></span>
			<span class="progress_bar_box" style="width: 345px;">
			<span id="audio_progress" class="progress_bar" style="width: 0%;"></span>
	</span>
	</span>
 </span>
</p>
</td>
</tr>
  <tr>
    <td height="100px"><br>推荐人用户名：<?php echo $row['username'];?><br>
    	推荐人邮箱：<?php echo $row['email'];?><br>
    	文章分类：<?php echo $row['classes'];?><br></td>
  </tr>
  <tr>
    <td style="margin-bottom: 100px;"><?php echo $row['mdescribes'];?></td>
  </tr>
  <tr>
    <td colspan="100"><?php echo $row['adescribes'];?></td>
  </tr>
  </table>
  <a style="margin-left: 1200px;" href="edituserarticle2.php?articleid=<?php echo $row['articleid'];?>" class="btn">编辑</a> 
  <a class="btn click_pop" href="javascript:void(0);" style="margin-left: 20px;">
  	联系推荐人
  </a> 
  <input style="margin-left: 20px;" type="submit" name="submit" class="btn" value="确认审核"/>
</form>
<div>
</div>
</div>
<!--遮罩层-->
<div class="bgPop"></div>
<!--弹出框-->
<div class="pop">
<div class="pop-top">
    <h2>请输入你要给用户说的话：</h2>
    <span class="pop-close">Ｘ</span>
</div>
<form method="post" action="">
<div class="pop-content">
    <div class="pop-content-right">		        	
        <p><input class="in" type="text" name="message"/></p>
    </div>
</div>

<div class="pop-foot">
	<input type="submit" value="确认" class="pop-ok" name="lxtjr"/>
    <input type="button" value="close" class="pop-cancel pop-close"/>
</div>
</form> 
</div>
<script>
    $(document).ready(function () {
        $('.pop-close').click(function () {
            $('.bgPop,.pop').hide();
        });
        $('.click_pop').click(function () {
            $('.bgPop,.pop').show();
        });
    })

</script>
<?php include("footer.php"); ?>
</body>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/weixinaudio.js"></script>
<script>
$('.weixinAudio').weixinAudio({
	autoplay:true,
	src:'../front/musicfile/<?php echo $row['music'];?>',
});
</script>
<script>
var a=0;
$(".audio_play_area").click(function () {
		a++;
	if(a%2!=0){
		$(".icon_audiodefault").css({"display":"none"});
		$(".icon_audioplaying").css({"display":"block"});
		console.log(a);
	}
	if(a%2==0){
		console.log(a);
		$(".icon_audiodefault").css({"display":"block"});
		$(".icon_audioplaying").css({"display":"none"});
		}



})
</script>
</html>
<?php	
	if(isset($_POST['submit']))
	{
	    $sql="update usarticle set look='1' where articleid='".$id."'";
		$result=mysql_query($sql);
		if($result)
		{
			$sql="select * from user where username='".$username."'"; 
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$integral=$row['integral']+20; 
			$sql="update user set integral='".$integral."' where username='".$username."'"; 
			$result=mysql_query($sql);
			if($result)
 			{
				$sql="select * from usarticle where articleid='".$id."'";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$email=$row['email']; 
				include "auditemail.php";    
				echo "<script>alert('音乐分享文章已审核！');location.href='auditarticle.php';</script>;";
			}
			else
			{
				echo "<script>alert('用户的积分奖励未到账，音乐分享文章审核失败！');location.href='auditarticle.php';</script>;";
			}
		}
		else
			echo "<script>alert('音乐分享文章审核失败!');location.href='auditarticle.php';</script>;";	
	}
?>
<?php 
if(isset($_POST['lxtjr']))
{
	$connet=$_POST['message'];
	$sql="select * from usarticle where articleid='".$id."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$email=$row['email']; 
	include "auditlookarticlemail.php";    	
}
?>
