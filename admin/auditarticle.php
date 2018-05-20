<?php
error_reporting(0);
include("top.php");
session_start();
$name=$_SESSION['adminname']; 
?>
<?php
//1.连接数据库
include("../Connections/myconn.php");
//2.选择数据库
mysql_select_db("music",$myconn);
mysql_query('set names utf8');
$sql="select * from admin where adminname='".$name."' and limits=1";
$result=mysql_query($sql);
if(mysql_num_rows($result)>0)
{
	$sql="select * from admin where adminname='".$adminname."'";
}
else
{
	echo "<script type='text/javascript'>alert('对不起，您的权限不够，谢谢!');location.href='frist.php';</script>";
}
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
<div id="urHere">音悦分享后台管理中心<b>></b><strong>审核文章</strong></div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
   <h3>审核文章</h3>
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
      <th width="65" align="center">文章编号</th>
      <th width="65" align="center">文章名称</th>
      <th width="205" align="center">音乐文件</th>
      <th width="205" align="center">音乐简单描述</th>
      <th width="65" align="center">文章分类</th>
      <th width="205" align="center">文章缩略图</th>
      <th width="205" align="center">发布时间</th>
      <th width="165" align="center">操作</th>
     </tr>
    <?php  
	//1.连接数据库
	include("../connections/myconn.php");//与右侧文件名一致
	//2.选择数据库
	mysql_select_db("music");
	
	require_once('page.class.php'); //分页类
	$showrow = 2; //一页显示的行数
	$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
	$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
	//3.写SQL代码
	$sql="select *from usarticle where look='0' order by articleid desc";
	$total = mysql_num_rows(mysql_query($sql)); //记录总条数
	if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
	$curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
	//获取数据
	$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
	//4.执行SQL代码
	$result=mysql_query($sql);
	//5.处理执行结果
	//$row=mysql_fetch_row($result);//只能读出数据库中的一行。
	while($row=mysql_fetch_object($result))//添加while语句实现循环添加。
	{									   //row与array	
	?>
    <tr>
      <td align="center"><?php echo $row->articleid;?></td>
      <td align="center"><?php echo $row->name;?></td>
      <td align="center"><?php echo $row->music;?></td>
      <td align="center"><?php echo $row->mdescribes;?></td>
      <td align="center"><?php echo $row->classes;?></td>
      <td align="center"><img width="150px" height="150px" src="../images/userwenzhang/<?php echo $row->articleimg;?>"></td>
      <td align="center"><?php echo $row->time;?></td>
      <td align="center">     	
      	<a href="auditlookarticle.php?articleid=<?php echo $row->articleid;?>" class="btn">查看</a> 
      	<a href="shanuserarticle.php?articleid=<?php echo $row->articleid;?>" onclick="return confirm('确认删除?!');" class="btn">删除</a>
      </td>
    </tr>
    <?php 
	}
	?>
	<table border="1" bordercolor="#000000">
	<?php
        if ($total > $showrow) {//总记录数大于每页显示数，显示分页
            $page = new page($total, $showrow, $curpage, $url, 6);
            echo $page->myde_write();
    }
    ?>
    </table> 
   	</table>
  </div>
 </div>
 <div class="clear"></div>
<?php include("footer.php"); ?> 
	
</body>
</html>