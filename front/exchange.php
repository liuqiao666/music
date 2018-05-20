<?php
error_reporting(0);
$_SESSION['id']=$_POST['id'];
$username=$_GET['username'];
?>
<!doctype html>
<html>
<meta charset="utf-8" />
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/buy.css" />

<?php
 $conn=mysql_connect('localhost','root','root') or die(mysql_error());//建立数据源
 mysql_select_db('music') or die(mysql_error());//连接数据库
 mysql_query('set names utf8');//防乱码
 
 require_once("page.php");//调用分页函数
 $page_size=12;//定义每页显示几条记录

 $result=mysql_query('select * from commodity');
 $count = mysql_num_rows($result);//多少条数据
 $totalpage  = ceil($count/$page_size);//总页数
?>
</head>
<body>
<?php include("header.php"); ?>
<div class="body">
<div class="credit"><img src="images/积分.PNG" height="30"/ >
<?php
 if(isset($_SESSION['username']))
 {
 	$sql="select integral from user where username='".$username."'";
	$result=mysql_query($sql,$conn);
	 $row=mysql_fetch_object($result);
	 ?>
	<span>我的积分：<?php echo $row->integral;?></span>
<?php 
 }
 else
 {
	echo "<span>我的积分：账号未登录</span>";
 }
 ?>
</div><hr />
<form action="" method="post">
<div  align="center">
<div align="left" class="title">
<nav>
<ul> 
<li><img height="8" class="titleimg" src="images/点.PNG"/><input type="submit" name="zh" id="zh" class="paixu" value="综合"></li>
<li><img src="images/点.PNG" height="8" class="titleimg"/><input type="submit" name="zx" id="zx" class="paixu" value="价格从低到高"></li>
<li><img src="images/点.PNG" height="8" class="titleimg"/><input type="submit" name="dx" id="dx" class="paixu" value="价格从高到低"></li>
</ul>
</nav>
</div>
<?php
//判断当前页码
if(empty($_GET['page'])||$_GET['page']<0){
 	$page=1;
 }else {
	$page=$_GET['page'];
}

 $offset=$page_size*($page-1);//数据从第几页开始
 if(isset($_POST['zx']))
 {
 $sql="select * from commodity order by price limit $offset,$page_size";
 }
 else if(isset($_POST['dx']))
 {
 $sql="select * from commodity order by price desc limit $offset,$page_size";
 }
 else
 {
 $sql="select * from commodity limit $offset,$page_size";
 }
 $result=mysql_query($sql,$conn);
 while ($row=mysql_fetch_object($result)) {//循环数组
 ?>
<div class="main">
<div class="main-picture"><img src="../images/commodity/<?php echo $row->img;?>"></div>
 <div class="main-text">
 <p class="music-name"><?php echo $row->name;?>&nbsp;&nbsp;
 	<a href="buy.php?number=<?php echo $row->number;?>">购买</a></p>
 <p class="music-jiage"><?php echo $row->price;?>积分</p>
 </div>
 </div>
<?php
}
echo page($totalpage,$page,$url="?page=");//调用函数
mysql_close;//关闭数据库
?></div>
</div></form>
</div>
<?php include("footer.php");?>
</body>
</html>