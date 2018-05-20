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
<div id="urHere">音悦分享后台管理中心<b>></b><strong>添加积分兑换的商品</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
  <h3><a href="commodity.php" class="actionBtn">商品列表</a>添加商品</h3>
    <form action="" method="post" enctype="multipart/form-data">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">     
       <tr>
       <td align="center">商品编号</td>
       <td>
        <input type="text" name="number" value="" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="150" align="center">商品名称</td>
       <td>
        <input type="text" name="name" value="" size="80" class="inpMain" />
       </td>
      </tr>
       <tr>
       <td align="center" valign="top">商品的描述</td>
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
							cssPath : '../plugins/code/prettify.css',
							uploadJson : '../php/upload_json.php',
							fileManagerJson : '../php/file_manager_json.php',
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
        <textarea id="content" name="description" style="width:780px;height:400px;" class="textArea"></textarea>
       </td>
      </tr>
       <tr>
       <tr>
       <td align="center">商品图片</td>
       <td>
        <input type="file" name="myfile" size="38" class="inpFlie" />
        <img src="images/icon_no.png"></td>
      </tr>
       <tr>
       <td align="center">价格 </td>
       <td>
        <input type="text" name="price" value="" size="50" class="inpMain" />
       </td>
      </tr>
       <tr>
       <td align="center">库存 </td>
       <td>
        <input type="text" name="stock" value="<?php echo $row['stock'];?>" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        <input type="submit" name="submit" class="btn" value="提交" />
       </td>
      </tr>
     </table>
    </form>
       </div>
 </div>
 <div class="clear"></div>
<!-- dcFooter 结束 -->
</div>
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
</html>
<?php	
	if(isset($_POST['submit']))
	{
		$num=$_POST['number'];
		$name=$_POST['name'];
		$description=$_POST['description'];
		$price=$_POST['price'];
		$stock=$_POST['stock'];
			
		include "../Connections/myconn.php";
	 	mysql_select_db("music",$myconn);
	 	$sql="select *from commodity where number='".$num."'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result)>0){
			echo "<script>alert('编号已存在！');</script>;";
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
					$dir=$_SERVER['DOCUMENT_ROOT']."/music/images/commodity/";		//上传后文件的位置
					if(is_uploaded_file($tmp_filename))			//判断是否通过HTTP POST上传
					{
						//上传并移动文件
						if(move_uploaded_file($tmp_filename, $dir.$filename))
						{
							 	$sql="insert into commodity(number,name,description,img,price,stock) values('".$num."','".$name."','".$description."','".$filename."','".$price."','".$stock."')";
							 	$result=mysql_query($sql);
							 	if($result)
							 	{
							     	echo "<script>alert('商品已添加！');location.href='commodity.php';</script>;";
						        }
						     	else
							     	echo "<script>alert('商品添加失败!');location.href='commodity.php';</script>;";	
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