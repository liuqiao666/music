<?php
error_reporting(0);
include("top.php");
session_start();
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
</style>
</head>
<body>
<?php include("side.php"); ?>
<form method="post" action="">
<div id="dcMain">
<!-- 当前位置 -->
<div id="urHere">音悦分享后台管理中心<b>></b><strong>积分兑换管理</strong> </div>
<div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
   <h3>积分兑换管理</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
      <th width="105" align="center">用户名</th>
      <th align="center">邮箱</th>
      <th align="center">商品编号</th>
      <th align="center">商品名称</th>
      <th align="center">申请兑换的商品图片</th>
      <th align="center">兑换的商品价格</th>
      <th align="center">收货信息</th>
      <th align="center">操作</th>
     </tr>
      <?php  
	//1.连接数据库
	include("../connections/myconn.php");//与右侧文件名一致
	//2.选择数据库
	mysql_select_db("music");
	
	require_once('page.class.php'); //分页类
	$showrow = 1; //一页显示的行数
	$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
	$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
	//3.写SQL代码
	$sql="select *from intexchange where delivered=0";
	$total = mysql_num_rows(mysql_query($sql)); //记录总条数
	if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
	$curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
	//获取数据
	$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
	//4.执行SQL代码
	$result=mysql_query($sql);
	//5.处理执行结果
	//$row=mysql_fetch_row($result);//只能读出数据库中的一行。
	while($row=mysql_fetch_array($result))//添加while语句实现循环添加。
	{									   //row与array	
	?>
      <tr>
      <td align="center"><?php echo $row['username'];?></td>
      <td align="center"><?php echo $row['email'];?></td>
      <td align="center"><?php echo $row['number'];?></td>
      <td align="center"><?php echo $row['name'];?></td>
      <td align="center"><img width="150px" height="150px" src="../images/commodity/<?php echo $row['img'];?>"></td>
      <td align="center"><?php echo $row['price'];?></td>
      <td align="center"><?php echo $row['address'];?></td>
      <td align="center">   
      	<input class="btn" type="submit" name="yfhok" value="已发货">	
      	<a class="btn click_pop" href="javascript:void(0);">联系用户</a>
      	<a href="shanexchange.php?username=<?php echo $row['username'];?>&number=<?php echo $row['number'];?>" onclick="return confirm('确认删除?!');" class="btn">删除</a>
      </td>     
     </tr>
		<?php 
		if(isset($_POST['lxyh']))
		{
			$connet=$_POST['message'];
			$email=$row['email']; 
			include "exchangemail.php";    	
		}
		?>
		<?php
		if(isset($_POST['yfhok']))
		{
			$number=$row['number']; 
			$username=$row['username']; 
			$email=$row['email']; 
			$sql="update intexchange set delivered='1' where number='".$number."' and username='".$username."'";
			$result=mysql_query($sql);  	
			if($result)
			{
				include "exchangemailok.php"; 
			}
			else
			{
				echo "<script>alert('数据更新失败，未成功通知用户商品已发货！');location.href='exchange.php';</script>;";
			}
		}
		?>
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
<!--遮罩层-->
<div class="bgPop"></div>
<!--弹出框-->
<div class="pop">
<div class="pop-top">
    <h2>请输入你要给用户说的话：</h2>
    <span class="pop-close">Ｘ</span>
</div>
<div class="pop-content">
    <div class="pop-content-right">		        	
        <p><input class="in" type="text" name="message"/></p>
    </div>
</div>

<div class="pop-foot">
	<input type="submit" value="确认" class="pop-ok" name="lxyh"/>
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
</html>


