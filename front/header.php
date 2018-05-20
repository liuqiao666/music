<?php
error_reporting(0);
session_start();
header('Content-Type:text/html;charset=UTF-8');
?>
<!--页面顶部! -->
<link href="css/nav.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<style type="text/css">
input{
	box-shadow: none !important;
	outline: none;	
}
</style>
<div id="nav">
  <ul class="ul">
    <li class="menu1"><a href="index.php"><img src="images/logo.png" width="154" height="64"></a></li>
    <li class="menu2" style="font-weight:bold;"><a href="index.php">首页</a></li>
    <li class="menu2" style="font-weight:bold;"><a href="sharing.php">分享圈</a></li>
    <li class="menu2" style="font-weight:bold;"><a href="periodical.php">期刊</a></li>
    <li class="menu2" style="font-weight:bold;"><a href="exchange.php?username=<?php echo $_SESSION['username'];?>">积分</a></li>
    <div class="dropdown">
    <a href="#" class="dropbtn" style="font-weight:bold;">我的</a>
    <div class="dropdown-content">
      <a href="person.php" target="_blank">我的主页</a>
      <a href="update.php">上传</a>
      <a href="sign.php">签到</a>
    </div>
  </div>
    <li class="menu2" style="font-weight:bold;"><a href="../login.php">登陆</a></li>
    <li class="menu2" style="font-weight:bold;"><a href="../register.php">注册</a></li>
    <li class="menu3"  style="padding-left: 50px;">
    	<form role="form" method="post" class="form" action="">
    	<input name="ss" type="text" id="text" size="20" class="search" placeholder="音乐搜索..."/>
     	<input name="search" type="submit" class="button" id="search" value="搜索"/>
        </form>
    </li>
    <li class="menu4"><a href="#"><!--<button>注册</button>--></a></li>
  </ul>
</div>
<?php
if(isset($_POST['search']))
{
	$text = $_POST['ss'];
	echo "<script>location.href='search.php?text=$text';</script>;";
}
?> 