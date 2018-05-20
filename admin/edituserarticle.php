<?php
error_reporting(0);
$id=$_GET['articleid'];
include("top.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>音悦分享后台管理中心</title>
<link href="css/public.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.min.css" rel="stylesheet"><!--图片上传-->
<link href="../front/css/bootstrap-fileinput.css" rel="stylesheet"><!--图片上传-->
<script type="text/javascript" src="js/jquery.min.js"></script><!--图片上传-->
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="../front/js/jquery-1.8.0.min.js"></script><!--弹窗js-->
<script src="../front/js/bootstrap-fileinput.js"></script><!--图片上传-->
<style>
.pop {  display: none;  width: 600px; min-height: 200px;  max-height: 900px;  height:500px;  position: absolute;  top: 0;  left: 0;  bottom: 0;  right: 0;  margin: auto;  padding: 25px;  z-index: 130;  border-radius: 8px;  background-color: #fff;  box-shadow: 0 3px 18px rgba(100, 0, 0, .5);  }
.pop-top{  height:40px;  width:100%;  border-bottom: 1px #E5E5E5 solid;  }
.pop-top h2{  float: left;  display:black}
.pop-top span{  float: right;  cursor: pointer;  font-weight: bold; display:black}
.pop-foot{  height:100px;  line-height:50px;  width:100%;  border-top: 1px #E5E5E5 solid;  text-align: right;  }
.pop-cancel, .pop-ok {  padding:8px 15px;  margin:15px 5px;  border: none;  border-radius: 5px;  background-color: #337AB7;  color: #fff;  cursor:pointer;  }
.pop-cancel {  background-color: #FFF;  border:1px #CECECE solid;  color: #000;  }
.pop-content{  height: 300px;  }
.pop-content-left{  float: left;  }
.pop-content-right{  width:600px;  float: left;  padding-top:20px;  padding-left:20px;  font-size: 16px;  line-height:60px;  }
.bgPop{  display: none;  position: absolute;  z-index: 129;  left: 0;  top: 0;  width: 100%;  height: 100%;  background: rgba(0,0,0,.2);  }
td{
	padding: 10px;
}
</style>
</head>
<body>
<?php include("side.php"); ?>
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">音悦分享后台管理中心<b>></b><strong>编辑已审核文章</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
  <h3><a href="userlookarticle.php" class="actionBtn">已审核的文章列表</a>编辑已审核文章</h3>
    <form action="" method="post" enctype="multipart/form-data">
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
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="60" align="right">文章名称</td>
       <td>
        <input type="text" name="name" value="<?php echo $row['name'];?>" size="60" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td  align="right">音乐文件</td>
       <td>
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
      </tr>
      <tr>
       <td align="right">音乐简单描述</td>
       <td>
        <input type="text" name="mdescribes" value="<?php echo $row['mdescribes'];?>" size="50" class="inpMain" />
       </td>
      </tr>      
      <tr>
       <td align="right">文章分类</td>
       <td>
        <select name="classes">
           <option value="<?php echo $row['classes'];?>"><?php echo $row['classes'];?></option>
	       <option value="流行">流行</option>
	       <option value="摇滚">摇滚</option>
	       <option value="民谣">民谣</option>
	       <option value="爵士">爵士</option>
	       <option value="小众独立音乐">小众独立音乐</option>
	       <option value="原创">原创</option>
	       <option value="戏曲">戏曲</option>
	    </select>
       </td>
      </tr>
      <tr>
       <td width="110px" align="right">文章缩略图</td>
       <td>
       	<a class="click_pop" href="javascript:void(0);">
        <img src="../images/userwenzhang/<?php echo $row['articleimg'];?>" style="width: 350px; height: 200px;"/>
        </a>
       </td>
      </tr>
      <tr>
       <td align="right" valign="top">文章描述</td>
       <td>
        <!-- KindEditor -->
        <link rel="stylesheet" href="js/kindeditor/themes/default/default.css" />
			<link rel="stylesheet" href="js/kindeditor/plugins/code/prettify.css" />
			<script charset="utf-8" src="js/kindeditor/kindeditor.js"></script>
			<script charset="utf-8" src="js/kindeditor/lang/zh_CN.js"></script>
			<script charset="utf-8" src="js/kindeditor/plugins/code/prettify.js"></script>
        <script>
					KindEditor.ready(function(K) {
						var editor1 = K.create('textarea[name="content"]', {
							cssPath : 'js/kindeditor/plugins/code/prettify.css',
							uploadJson : 'js/kindeditor/php/upload_json.php',
							fileManagerJson : 'js/kindeditor/php/file_manager_json.php',
							allowFileManager : true,
							afterCreate : function() {
								var self = this;
								K.ctrl(document, 13, function() {
									self.sync();
									K('form[name=example]')[0].submit();
								});
								K.ctrl(self.edit.doc, 13, function() {
									self.sync();
									K('form[name=example]')[0].submit();
								});
							}
						});
						prettyPrint();
					});
			</script>
        <!-- /KindEditor -->
        <textarea id="content" name="content" style="width:780px;height:400px;" class="textArea"><?php echo $row['adescribes'];?></textarea>
       </td>
     </tr>
      <tr>
      <tr>
       <td width="90" align="right">发布时间</td>
       <td>
        <input type="text" name="time" value="<?php echo $row['time'];?>" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">文章收藏量</td>
       <td>
        <input type="text" name="collect" value="<?php echo $row['collect'];?>" size="80" class="inpMain" />
       </td>
      </tr>
      <td width="90" align="right"></td>
       <td>
        <input name="submit" class="btn" type="submit" value="提交" />
       </td>
      </tr>
     </table>
     	<!--遮罩层-->
		<div class="bgPop"></div>
		<!--弹出框-->
		<div class="pop">
		<div class="pop-top">
		    <span class="pop-close">Ｘ</span>
		</div>
		<form method="post" action="" enctype="multipart/form-data" role="form">
		<div class="pop-content">
		  <div class="container">
		    <div class="page-header">
		        <h3>修改已审核的分享圈文章图片</h3>
		            <div class="form-group" id="uploadForm" enctype='multipart/form-data'>
		                <div class="h4">图片预览</div>
		                <div class="fileinput fileinput-new" data-provides="fileinput"  id="exampleInputUpload">
		                    <div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;">
		                        <img id='picImg' style="width: 100%;height: auto;max-height: 140px;" src="../front/images/noimage.png" alt="" />
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
    	<input type="submit" value="确认" class="pop-ok" name="xgtp"/>
        <input type="button" value="close" class="pop-cancel pop-close"/>
    </div>
    </form>
   </div>
 </div>
 <div class="clear"></div>
<!-- dcFooter 结束 -->
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
 <script type="text/javascript">
 
 onload = function()
 {
   document.forms['action'].reset();
 }

 function douAction()
 {
     var frm = document.forms['action'];

     frm.elements['new_cat_id'].style.display = frm.elements['action'].value == 'category_move' ? '' : 'none';
 }
 
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
	$name=$_POST['name'];
	$mdescribes=$_POST['mdescribes'];
	$classes=$_POST['classes'];
	$adescribes=$_POST['content'];

	$sql="update usarticle set name='".$name."',mdescribes='".$mdescribes."',classes='".$classes."',adescribes='".$adescribes."' where articleid='".$id."'";
 	$result=mysql_query($sql);
 	if($result)
 	{
     	echo "<script>alert('音乐分享文章已成功修改!');location.href='userlookarticle.php';</script>;";
    }
 	else
     	echo "<script>alert('音乐分享文章修改失败!');location.href='userlookarticle.php';</script>;";	
}
?>
<?php
if(isset($_POST['xgtp']))
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
			$dir=$_SERVER['DOCUMENT_ROOT']."/music/images/userwenzhang/";		//上传后文件的位置
			if(is_uploaded_file($tmp_filename))			//判断是否通过HTTP POST上传
			{
				//上传并移动文件
				if(move_uploaded_file($tmp_filename, $dir.$filename))
				{
					 	$sql="update usarticle set articleimg='".$filename."' where articleid='".$id."'";
					 	$result=mysql_query($sql);
					 	if($result)
					 	{
					     	echo "<script>alert('文章图片已成功修改!');location.href='userlookarticle.php';</script>;";
				        }
				     	else
					     	echo "<script>alert('文章图片修改失败，请联系管理员，谢谢!');location.href='userlookarticle.php';</script>;";	
				}
				else
					echo "<script>alert('文章图片修改失败，请联系管理员，谢谢!');location.href='userlookarticle.php';</script>;";
			}
		}
	}
	else
	{
		echo "<script>alert('文件格式非图片，文章图片修改失败!');location.href='userlookarticle.php';</script>;";
	}
}
?>
