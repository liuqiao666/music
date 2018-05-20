<?php
error_reporting(0);
?>
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/style.css" rel="stylesheet" type="text/css"> 
<link href="css/first.css" rel="stylesheet" type="text/css">
<title>音悦</title> 
</head>
<body vlink="#666666" alink="#33CCFF">
<?php include("header.php");?>

<div class="wrapper" style="padding-top: 20px;">
<div class="slideshow">
<?php 
	 include("../Connections/myconn.php");
	 mysql_select_db("music");
	 mysql_query('set names utf8'); 
	 $sql="select * from start order by id";
	 $result=mysql_query($sql);
	 while($row=mysql_fetch_object($result))
	 {
	 ?>
		<div class="slide">
			<div align="center" style="background-color: #FFFFFF;">
				<font color="#000000" face="微软雅黑" size="3"><?php echo $row->description;?></font>
			</div>
			<img src="../images/start/<?php echo $row->img;?>">
		</div>
<?php }?>
</div>
</div>

<!--整个中间部分大方框-->
<div class="main">

    <!--首页左边大方框-->
    <div class="main-left">    	             
      <div class="main-left1"><p>最新期刊</p></div><!--中间第二个标题-->
        <div class="main-left2"><!--内容框2-->
        <?php
		$sql="select * from adarticle order by time desc limit 4";
		$result=mysql_query($sql);
		while($row=mysql_fetch_object($result))
		{
		?>
        	<div class="main-left2-1">
            	<div class="main-left2-1-picture">
                	 <a href="periodical_open.php?articleid=<?php echo $row->articleid;?>"><img src="../images/adminwenzhang/<?php echo $row->articleimg;?>" /></a>
               </div>
                <div class="main-left2-1-text">
                   <p class="music-name"><?php echo $row->name;?></p>
                   <p class="musicer-name">发布时间：<?php echo $row->time;?></p>
                </div>
            </div>
            <?php }?>
        </div>
    	
        <div class="main-left1"><p>最新分享圈</p></div><!--中间第一个标题-->
        <div class="main-left2"><!--内容框1-->
        <?php 
		$sql="select * from usarticle  where look=1 order by time desc limit 4";
	    $result=mysql_query($sql);
	    while($row=mysql_fetch_object($result))
	    {
		?>
        	<div class="main-left2-1">
            	<div class="main-left2-1-all">
                    <div class="main-left2-1-picture"  style=" position:absolute" onMouseOver="document.getElementById('btn123').style.display='block';" onMouseOut="document.getElementById('btn123').style.display='none';">
                        <a href="sharing_open.php?articleid=<?php echo $row->articleid;?>&username=<?php echo $row->username;?>"><img src='../images/userwenzhang/<?php echo $row->articleimg;?>'></a>
                    </div>
				</div><!--n内包含图片与隐藏的两个div-->
                <div class="main-left2-1-text">
                   <p class="music-name"><?php echo $row->name;?></p>
                   <p class="musicer-name">推荐人：<?php echo $row->username;?></p>
                </div>
            </div>   
             <?php }?> 
        </div>

        
        
        <div class="main-left1"><p>最新商品栏</p></div><!--中间第三个标题-->
          <div class="main-left2"><!--内容框3-->
            <?php 
			$sql="select * from commodity order by number desc limit 4";
			$result=mysql_query($sql);
			while($row=mysql_fetch_object($result))
			{
			?>
        	<div class="main-left2-1">
            	<div class="main-left2-1-picture">
                	<img src='../images/commodity/<?php echo $row->img;?>'>
                </div>
                <div class="main-left2-1-text">
                   <p class="music-name"><?php echo $row->name;?></p>
                   <p class="musicer-name">价格：<?php echo $row->price;?>
                   	<a href="buy.php?number=<?php echo $row->number;?>" style="color: blue;padding-left: 60px;">立即购买</a>
                   </p>
                </div>
            </div>
              <?php }?>
        </div>
        
  
    </div><!--左边完-->

   <!--首页右边大方框-->
    <div class="main-right">   
        <div class="main-right2"  style="height: 1020px;">
          <div class="main-left1-first"><!--个标题-->
        	 <p class="main-left-text">最热期刊推荐</p>
          </div>
       		
        	<div class="main-left2-first" style="height: 430px;">
       	 		<div class="chart_artsit-first">
                	<ul>
                    	<li>
                        <?php 
						$sql="select * from adarticle order by collect desc limit 7";
						$result=mysql_query($sql);
						while($row=mysql_fetch_object($result))
						{
						?>
                        	<div class="chart_artsit_item-first">
                             <a class="ico_radio-first" href="periodical_open.php?articleid=<?php echo $row->articleid;?>" title=""><?php echo $row->name;?></a> 
                             <a href="periodical_open.php?articleid=<?php echo $row->articleid;?>"><img src='../images/adminwenzhang/<?php echo $row->articleimg;?>' width="55" height="55"/></a>
                            </div>  
                            <?php }?>
                        </li> 
                    </ul>
                </div>	        
			</div>
            
            <br>
            <div class="main-left1-first"><!--个标题-->
        		<p class="main-left-text">最热用户分享推荐</p>
        	</div>
 
        	<div class="main-left2-first">
       	 		<div class="chart_artsit-first">
                	<ul>
                    	<li>
                         <?php 
						$sql="select * from usarticle where look=1 order by collect desc limit 8";
						$result=mysql_query($sql);
						while($row=mysql_fetch_object($result))
						{
						?>
                        	<div class="chart_artsit_item-first">
                             <a class="ico_radio-first" href="sharing_open.php?articleid=<?php echo $row->articleid;?>" title=""><?php echo $row->name;?></a> 
                             <a href="sharing_open.php?articleid=<?php echo $row->articleid;?>&username=<?php echo $row->username;?>"><img src='../images/userwenzhang/<?php echo $row->articleimg;?>' width="55" height="55"/></a>
                            </div>  
                            <?php }?>
                        </li> 
                    </ul>
                </div>	        
			</div>                                  
        </div>        
	</div><!--整个中间大外框-->

<!--底部-->
<?php include("footer.php");?>
<script>
    var newRemindFlag = 1; //启动闪烁
    /*
     pageTitle:原页面的标题
     showRemind:闪烁时显示的东东：如【新提醒】
     hideRemind:闪烁时隐藏的东东：如【　　　】
     time:闪烁间隔的时间
     */
    function newRemind(pageTitle, showRemind, hideRemind, time) {
        if (newRemindFlag == 1) {
            document.title = showRemind + pageTitle;
            newRemindFlag = 2;
        } else {
            document.title = hideRemind + pageTitle;
            newRemindFlag = 1;
        }
        setTimeout("newRemind('" + pageTitle + "','" + showRemind + "','" + hideRemind + "'," + time + ")", time);
    }
    newRemind('', '音悦是互相欣赏的平台', '快来分享吧~', 1000)
</script>

<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/imagesloaded.js"></script>
<script type="text/javascript" src="js/smartresize.js"></script>
<script type="text/javascript" src="js/jquery.skidder.js"></script>
<script type="text/javascript">
$('.slideshow').each( function() {
	  var $slideshow = $(this);
	  $slideshow.imagesLoaded( function() {
		$slideshow.skidder({
		  slideClass    : '.slide',
		  animationType : 'css',
		  scaleSlides   : true,
		  maxWidth : 1300,
		  maxHeight: 500,
		  paging        : true,
		  autoPaging    : true,
		  pagingWrapper : ".skidder-pager",
		  pagingElement : ".skidder-pager-dot",
		  swiping       : true,
		  leftaligned   : false,
		  cycle         : true,
		  jumpback      : false,
		  speed         : 400,
		  autoplay      : false,
		  autoplayResume: false,
		  interval      : 4000,
		  transition    : "slide",
		  afterSliding  : function() {},
		  afterInit     : function() {}
		});
	  });
});

$(window).smartresize(function(){
	  $('.slideshow').skidder('resize');
});
</script>

</body>
</html>