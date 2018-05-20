<?php
error_reporting(0);
session_start();
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
<div id="urHere">音悦分享后台管理中心<b>></b><strong>商品管理</strong></div>
<div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
   <h3><a href="addcommodity.php" class="actionBtn">添加商品</a>积分兑换的商品</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
      <th align="center">商品编号</th>
      <th align="center">商品名称</th>
      <th align="center">商品的描述</th>
      <th align="center">商品图片</th>
      <th align="center">价格</th>
      <th align="center">库存</th>
      <th align="center">操作</th>
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
	$sql="select *from commodity";
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
      <td align="center"><?php echo $row->number;?></td>
      <td align="center"><?php echo $row->name;?></td>
      <td align="center"><?php echo $row->description;?></td>
      <td align="center"><img width="150px" height="150px" src="../images/commodity/<?php echo $row->img;?>"></td>
      <td align="center"><?php echo $row->price;?></td>
      <td align="center"><?php echo $row->stock;?></td>
      <td align="center"><a href="editcommodity.php?number=<?php echo $row->number;?>" class="btn">修改</a>
      <a href="shancommodity.php?number=<?php echo $row->number;?>" onclick="return confirm('确认删除?!');" class="btn">删除</a></td>
      
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
<?php include("footer.php");?>
</body>
</html>