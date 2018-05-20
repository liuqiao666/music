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
<div id="urHere">音悦分享后台管理中心<b>></b><strong>前端首页图片轮播</strong></div><div class="mainBox imgModule">
    <h3>首页幻灯图片</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
    <tr>
       <th>添加幻灯图片</th>
       <th>幻灯图片列表</th>
     </tr>
     <tr>
      <td width="350" valign="top">
        <form action="" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
         <tr>
          <td><b>幻灯图片描述</b>
		   <input type="text" name="description" value="" size="20" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td><b>幻灯图片</b>
           <input type="file" name="myfile" />
           </td>
         </tr>
         <tr>
          <td><b>id</b>
		   <input type="text" name="id" value="5" size="20" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td>
           <input name="submit" class="btn" type="submit" value="提交" />
          </td>
         </tr>
        </table>
       </form>
      </td>
       <td valign="top">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
        <tr>
         <td width="100" align="center">幻灯图片</td>
         <td width="250" align="center">幻灯图片的描述</td>
         <td width="20"  align="center">id</td>
         <td width="100" align="center">操作</td>
        </tr>
    <?php
	//1.连接数据库
	include("../Connections/myconn.php");
	//2.选择数据库
	mysql_select_db("music",$myconn);
	//3.写sql
	$sql="select * from start order by id";
	//4.执行sql
	$result=mysql_query($sql);
	//5.处理结果
	while($row=mysql_fetch_object($result))//添加while语句实现循环添加。
	{									   //row与array	
	?>
     <tr align="center">
     <td><img src="../images/start/<?php echo $row->img;?>" width="100" /></td>
     <td align="center"><?php echo $row->description;?></td>
     <td align="center"><?php echo $row->id;?></td>
     <td align="center">
     	<a href="editstart.php?id=<?php echo $row->id;?>" class="btn">修改</a>
     	<a href="shanstart.php?id=<?php echo $row->id;?>" onclick="return confirm('确认删除?!');" class="btn">删除</a>
     </td>  
     </tr>
    <?php 
	}
    ?>
       </table>
      </td>
     </tr>
    </table>
   </div>
 </div>
 <div class="clear"></div>
<?php include("footer.php"); ?>
</body>
</html>
<?php	
	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$img=$_POST['img'];
		$description=$_POST['description'];
					
		include "../Connections/myconn.php";
	 	mysql_select_db("music",$myconn);
	 	$sql="select *from start where id='".$id."'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result)>0){
			echo "<script>alert('图片编号已存在！');</script>;";
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
					$dir=$_SERVER['DOCUMENT_ROOT']."/music/images/start/";		//上传后文件的位置
					if(is_uploaded_file($tmp_filename))			//判断是否通过HTTP POST上传
					{
						//上传并移动文件
						if(move_uploaded_file($tmp_filename, $dir.$filename))
						{
							 	$sql="insert into start(id,img,description) values('".$id."','".$filename."','".$description."')";
							 	$result=mysql_query($sql);
							 	if($result)
							 	{
							     	echo "<script>alert('图片已添加！');location.href='start.php';</script>;";
						        }
						     	else
							     	echo "<script>alert('图片添加失败!');location.href='start.php';</script>;";	
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