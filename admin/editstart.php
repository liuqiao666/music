<?php
error_reporting(0);
session_start();
$id=$_GET['id'];
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
<div id="urHere">音悦分享后台管理中心<b>></b><strong>修改首页幻灯图片信息</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
<h3><a href="javascript:history.go(-2)" class="actionBtn">返回</a>修改首页幻灯图片信息</h3>
<form action="" method="post" enctype="multipart/form-data">
	<?php
	//1.连接数据库
	include("../Connections/myconn.php");
	//2.选择数据库
	mysql_select_db("music",$myconn);
	//3.写sql
	$sql="select * from start where id='".$id."'";
	//4.执行sql
	$result=mysql_query($sql);
	//5.处理结果
	$row=mysql_fetch_array($result);
	?>
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td align="right">幻灯图片</td>
       <td>
       	<a class="click_pop" href="javascript:void(0);">
		<img width="150px" height="150px" src="../images/start/<?php echo $row['img'];?>">
		</a>
       </td>
      </tr>
       <tr>
       <td align="right">幻灯图片的描述</td>
       <td>
        <input type="text" id="description" name="description" value="<?php echo $row['description'];?>" size="50" class="inpMain" />
       </td>
      </tr>
       <tr>
       <td align="right">id</td>
       <td>
        <input type="text" name="id" value="<?php echo $row['id'];?>" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        <input type="submit" name="submit" id="submit" class="btn" value="确认" />
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
		        <h3>修改前端首页的幻灯图片</h3>
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

<?php include("footer.php"); ?>
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
</body>
</html>
<?php
if(isset($_POST['submit']))
{
$img=$_POST['img'];
$description=$_POST['description'];
$id=$_POST['id'];

	//3.写SQL代码
	if($row['id'] != $_POST['id'])
	{

		//3.写SQL代码
		$sql="select *from start where id='".$id."'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result)>0)
		{
			echo "<script>alert('编号已存在！');location.href='javascript:history.go(-1)';</script>;";
		}
	}
	else
	{
		$sql="update start set description='".$description."',id='".$id."' where id='".$id."'";
	 	$result=mysql_query($sql);
	 	if($result)
	 	{
	     	echo "<script>alert('幻灯图片信息已成功修改！');location.href='javascript:history.go(-2)';</script>;";
	    }
	 	else
	     	echo "<script>alert('幻灯图片信息修改失败!');location.href='javascript:history.go(-2)';</script>;";	
	}
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
			$dir=$_SERVER['DOCUMENT_ROOT']."/music/images/start/";		//上传后文件的位置
			if(is_uploaded_file($tmp_filename))			//判断是否通过HTTP POST上传
			{
				//上传并移动文件
				if(move_uploaded_file($tmp_filename, $dir.$filename))
				{
					 	$sql="update start set img='".$filename."' where id='".$id."'";
					 	$result=mysql_query($sql);
					 	if($result)
					 	{
					     	echo "<script>alert('幻灯图片已成功修改!');location.href='javascript:history.go(-2)';</script>;";
				        }
				     	else
					     	echo "<script>alert('幻灯图片修改失败，请联系管理员，谢谢!');location.href='javascript:history.go(-2)';</script>;";	
				}
				else
					echo "<script>alert('幻灯图片修改失败，请联系管理员，谢谢!');location.href='javascript:history.go(-2)';</script>;";
			}
		}
	}
	else
	{
		echo "<script>alert('文件格式非图片，幻灯图片修改失败!');location.href='javascript:history.go(-2)';</script>;";
	}
}
?>