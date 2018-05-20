<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>音悦分享后台管理中心</title>
<link href="css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/global.js"></script></head>
<body>
<div id="dcMain"> <!-- 当前位置 -->
	<div id="urHere">欢迎来到音悦分享后台
		<font style="margin-left: 1350px;color: #000000;">
		<script text/javascript>
		document.write("<span id='labtime' width='120px' Font-Size='9pt'></span>")
		setInterval("labtime.innerText=new Date().toLocaleString()",1100)
		</script></font>
		</div> 
		 <div id="index" class="mainBox" style="padding-top:18px;height:auto!important;height:550px;min-height:550px;">
      <div class="warning">请注意：管理员一周至少发表一篇音乐分享的文章，另外请尽快审核用户发表的文章，谢谢！</div>
    
   <div id="douApi"></div>
      <div class="indexBox">
    <div class="boxTitle">网站采用的主要技术：</div>
    <ul class="ipage">      
     <font href="#">html</font>     
     <font href="#">css</font> 
     <font href="#">javascript</font> 
     <font href="#">bootstrap</font> 
     <font href="#">mysql</font> 
     <font href="#">php</font>       
    </ul>
   </div>

   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="indexBoxTwo">
    <tr>
     <td width="65%" valign="top" class="pr">
      <div class="indexBox">
       <div class="boxTitle">网站基本信息</div>
       <ul>
        <table width="100%" border="0" class="tableBasic">
         <tr>
			<?php 
		   		include "../Connections/myconn.php";
			 	mysql_select_db("music",$myconn);
				$sql="select *from admin";
				$total = mysql_num_rows(mysql_query($sql)); //记录总条数
		   	?>
          <td>管理员人数：</td>
          <td><strong><?php echo $total;?></strong></td>
           <?php 
				$sql="select *from user";
				$total = mysql_num_rows(mysql_query($sql)); //记录总条数
   			?>
          <td>用户总人数：</td>
          <td><strong><?php echo $total;?></strong></td>
         </tr>
         <tr>
         	<?php 
				$sql="select *from adarticle";
				$total = mysql_num_rows(mysql_query($sql)); //记录总条数
   			?>
          <td width="120">期刊文章总数：</td>
          <td><strong><?php echo $total;?></strong></td>
            <?php 
				$sql="select *from usarticle";
				$total = mysql_num_rows(mysql_query($sql)); //记录总条数
   			?>
          <td width="120">分享圈文章总数：</td>
          <td><strong><?php echo $total;?></strong></td>
         </tr>
         <tr>
         	<?php 
				$sql="select *from usarticle where look=0";
				$total = mysql_num_rows(mysql_query($sql)); //记录总条数
   			?>
          <td width="120">未审核文章数：</td>
          <td><strong><?php echo $total;?></strong></td>
            <!--<?php 
				$sql="select *from opinion where opinionok=0";
				$total = mysql_num_rows(mysql_query($sql)); //记录总条数
   			?>
          <td width="150">未处理意见反馈数：</td>
          <td><strong<?php echo $total;?></strong></td>-->
            <?php 
				$sql="select *from intexchange where delivered=0";
				$total = mysql_num_rows(mysql_query($sql)); //记录总条数
   			?>
          <td>未发货商品数：</td>
          <td><strong><?php echo $total;?></strong></td>
         </tr>
         <tr>
          <td width="120">PHP版本：</td>
          <td><strong>5.3</strong></td>
          <td width="100">Mysql版本：</td>
          <td><strong>5.5.47</strong></td>
         </tr>
         <tr>
          <td>编码：</td>
          <td><strong>UTF-8</strong></td>
          <td>系统语言：</td>
          <td><strong>zh_cn</strong></td>
         </tr>
         <tr>
          <td>用途：</td>
          <td><strong>2019届毕业设计</strong></td>
          <td>小组成员：</td>
          <td><strong>刘巧、陈梅、刘方圆</strong></td>
         </tr>
        </table>
       </ul>
      </div>
     </td>   
      </div>
     </td>
    </tr>
  </table>
 </div>
 </body>
</html>