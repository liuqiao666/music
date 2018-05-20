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
<div id="urHere">音悦分享后台管理中心<b>></b><strong>查看文章</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
   <h3><a href="auditarticle.php" class="actionBtn">待审核文章</a>查看文章</h3>
    <form action="" method="post" enctype="multipart/form-data">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="90" align="right">文章编号</td>
       <td>
        <input type="text" name="articleid" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">文章名称</td>
       <td>
        <input type="text" name="name" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">上传音乐文件</td>
       <td>
        <input type="file" name="music" size="50" class="inpFlie" />
       </td>
      </tr>
      <tr>
       <td align="right">音乐简单描述</td>
       <td>
        <input type="text" name="musicdescribes" value="" size="50" class="inpMain" />
       </td>
      </tr>      
      <tr>
       <td align="right">文章分类</td>
       <td>
        <select name="classes">
           <option value="0">未分类</option>
	       <option value="1">流行</option>
	       <option value="2">摇滚</option>
	       <option value="3">民谣</option>
	       <option value="4">爵士</option>
	       <option value="5">小众独立音乐</option>
	       <option value="6">原创</option>
	       <option value="7">戏曲</option>
	    </select>
       </td>
      </tr>
      <tr>
       <td align="right">缩略图</td>
       <td>
        <input type="file" name="articleimg" size="38" class="inpFlie" />
        <img src="images/icon_no.png"></td>
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
        <textarea id="content" name="articledescribes" style="width:780px;height:400px;" class="textArea"></textarea>
       </td>
     </tr>
      <tr>
      <tr>
       <td width="90" align="right">发布时间</td>
       <td>
        <input type="text" name="time" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">文章收藏量</td>
       <td>
        <input type="text" name="collect" value="" size="80" class="inpMain" />
       </td>
      </tr>
       <td>
        <input name="submit" class="btn" type="submit" value="提交" />
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