<?php
error_reporting(0);
session_start();
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/own_more1.css" rel="stylesheet" type="text/css" />
<link href="css/page.css" rel="stylesheet" type="text/css" />
<title>歌曲收藏-更多</title>
</head>

<body>
<?php include("header.php");?>
<form id="form1" name="form1" method="post" action="">
<!--整个中间大外框-->
<div class="main"><!--紫色的-->
	<!--中间左边部分-->
	<div class="main-left">
    
        <div class="main-left1"><!--中间第一个标题-->
        	<p class="main-left-text">分享圈收藏</p>
        </div>
        <hr>
        <div class="main-left2">
        <?PHP 
		include("../Connections/myconn.php");
		mysql_select_db("music");
		mysql_query('set names utf8');
		require_once('page.class.php'); //分页类
		$showrow = 3; //一页显示的行数
		$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
		$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
		$sql="select * from collect where username='".$username."' and kind=0 ";
		$total = mysql_num_rows(mysql_query($sql)); //记录总条数
		if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
	    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
		//获取数据
		$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
	    $result=mysql_query($sql);
		while($row=mysql_fetch_object($result))
		{
		?>
       	 	<table class="track_list">  
            	<tr>
            	    <td class="song_name"><a href="sharing_open.php?articleid=<?php echo $row->number;?>&username=<?php echo $row->username;?>"><img src="../images/userwenzhang/<?php echo $row->img;?>" width="150" height="150"/></a></td>
                    <td><a href="sharing_open.php?articleid=<?php echo $row->number;?>&username=<?php echo $row->username;?>"><font size="4" face="微软雅黑"><?php echo $row->name;?></font></a></td>
            	</a>

                    <td class="private_act">
                    	<a href="scollecting.php?articleid=<?php echo $row->number;?>"><img src="images/猜你喜欢.png"></a><!--取消收藏-->
                    </td>
                </tr>
                <br>            
            </table> 
            <?php }?>
        </div>
      	
    <?php
        if ($total > $showrow) {//总记录数大于每页显示数，显示分页
            $page = new page($total, $showrow, $curpage, $url, 2);
            echo $page->myde_write();
    }
    ?>
          
	</div><!--中间左边部分完-->

	
    
    <!--首页右边大方框-->
    <div class="main-right">
     <?PHP 
	 $sql="select * from user where username='".$username."' ";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_object($result)
	 ?>
   		<div class="main-right1">
    		<div class="head-img"><!--头像-->
        		<img src="../images/userheaderimg/<?php echo $row->image;?>"/>
     	 	</div><!--头像--> 
        </div>
        <br>
        <div><h3 class="bigtext"></h3></div>
        <div class="information_name"><!--用户名-->
        	<p style="padding-left: 40px;"><?php echo $row->username;?></p><!--名字-->
      	</div><!--用户名-->
        <div><h3 class="bigtext"></h3></div>
        <div style="padding: 40px;"><!--用户名-->
        	<font size="4" face="微软雅黑"><?php echo $row->myself;?></font><!--名字-->
      	</div><!--自我介绍-->

      <div class="main-right2">
       </div>        
    </div><!--右边完-->   
</div><!--外部大框-->
</form>
<?php include("footer.php");?>
</body>
</html>