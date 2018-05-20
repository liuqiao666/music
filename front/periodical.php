<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>期刊</title>
<link href="css/nav.css" rel="stylesheet" type="text/css" />
<link href="css/sharing.css" rel="stylesheet" type="text/css" />
<link href="css/page.css" rel="stylesheet" type="text/css" />
<link href="css/share.css" rel="stylesheet" />
<style type="text/css">
input{
	box-shadow: none !important;
	outline: none;	
}
a{
	box-shadow: none !important;
	outline: none;	
}
</style>
</head>

<body>
<?php include("header.php");?>

<!--整个中间大外框-->
<div class="main" style="padding: 80px;"><!--紫色的-->
	<!--中间左边部分-->
	<div class="main-left">
    	<div class="main-left1"><!--中间第一个标题-->
        	<div class="title">
            	<p class="main-left-text">期刊分享</p> 
          	</div>
          	<form method="post" action="">
        	<div style=" padding:2px 40px; text-align:right;">
        		<input type="submit" name="lx" value="流行">&nbsp;&nbsp;
            	<input type="submit" name="yg" value="摇滚">&nbsp;&nbsp;
                <input type="submit" name="my" value="民谣">&nbsp;&nbsp;
                <input type="submit" name="js" value="爵士">&nbsp;&nbsp;
                <input type="submit" name="yc" value="原创">&nbsp;&nbsp;
                <input type="submit" name="xq" value="戏曲">&nbsp;&nbsp;
                <input type="submit" name="dl" value="独立音乐">&nbsp;&nbsp;
            </div>
            </form>
        </div>
        <div><h3 class="bigtext"></h3></div><!--下横线-->
        <?php
         if(isset($_POST['lx']))
		 {
		 	$num = 1;
		 }
		 else if(isset($_POST['yg']))
		 {
			$num = 2;
		 }
		 else if(isset($_POST['my']))
		 {
			$num = 3;
		 }
		 else if(isset($_POST['js']))
		 {
			$num = 4;
		 }
		 else if(isset($_POST['yc']))
		 {
			$num = 5;
		 }
		 else if(isset($_POST['xq']))
		 {
			$num = 6;
		 }
		 else if(isset($_POST['dl']))
		 {
			$num = 7;
		 }
		 else
		 {
		 	$num = 8;
		 }
		?>
        <?php 
		include("../Connections/myconn.php");
		mysql_select_db("music");
		require_once('page.class.php'); //分页类
		$showrow = 4; //一页显示的行数
		$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
		$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
		switch($num)
		{
			case 1:$sql="select * from adarticle where classes='流行' order by time desc";break;
			case 2:$sql="select * from adarticle where classes='摇滚' order by time desc";break;
			case 3:$sql="select * from adarticle where classes='民谣' order by time desc";break;
			case 4:$sql="select * from adarticle where classes='爵士' order by time desc";break;
			case 5:$sql="select * from adarticle where classes='原创' order by time desc";break;
			case 6:$sql="select * from adarticle where classes='戏曲' order by time desc";break;
			case 7:$sql="select * from adarticle where classes='独立音乐' order by time desc";break;
			case 8:$sql="select * from adarticle order by time desc";break;
		}		
		$total = mysql_num_rows(mysql_query($sql)); //记录总条数
		if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
	    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
		//获取数据
		$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
		$result=mysql_query($sql);
		while($row=mysql_fetch_object($result))
		{
        ?>
        <div class="main-left2">
        	<div class="main-left2-1">
        		<a href="periodical_open.php?articleid=<?php echo $row->articleid;?>">
            	<img src="../images/adminwenzhang/<?php echo $row->articleimg;?>">
            	</a>
            </div>
            <div class="main-left2-2">
            	<div class="main-left2-2-1">
                	<h2 align="center"><?php echo $row->name;?></h2>
                    <p class="sharing-text">文章分类：<?php echo $row->classes;?></p>
                    <p class="sharing-text">歌曲名：<?php echo $row->music;?></p>
                    <div class="sharing-text3">音乐简单描述：<font face="微软雅黑" size="3" style="padding-left: 5px;"><?php echo $row->musicdescribes;?></div>
                    <p class="sharing-text2">发布时间:<?php echo $row->time;?></p>
                </div>
                <div>
                	<ul class="acts_list">
        				<li class="collect">
            				<a class="wrap" href="pcollecting.php?articleid=<?php echo $row->articleid;?>">
                				<span>
                    				<img src="images/猜你喜欢.png">
                    				<?php echo $row->collect;?>
                    			</span>
                			</a>
            			</li>           
                        <li class="share">
                            <a class="wrap" href="javascript:void(0)" onclick="$('.mark,.share-dialog').show();">
                                <span>
									<img src="images/分享.png">
                                </span>
                            </a>
                        </li> 
                    </ul>
                </div><!--收藏-->
            </div>
        </div>
        <?php }?>
    <?php
        if ($total > $showrow) {//总记录数大于每页显示数，显示分页
            $page = new page($total, $showrow, $curpage, $url, 2);
            echo $page->myde_write();
    }
    ?>
    </div><!--中间左边部分完-->

    
</div><!--整个中间大方框完-->
<a> 
    <div class="mark" style="display: none;"></div> 
</a>
<div class="share-dialog" style="display: none;">
    <a> 
        <div class="share-close" onclick="$('.mark,.share-dialog').hide();"></div> 
        <div class="share-dialog-title">
            <h2>分享</h2>
        </div> 
        <div class="share-dialog-cont"> 
            <div class="share-copy"> 
                <div class="share-copy-l">
                    分享链接：
                </div> 
                <div class="share-copy-c">
                    <input id="copytext" type="text" />
                </div> 
                <div id="btnCopy" class="share-copy-r" data-clipboard-target="copytext">
                    复制链接
                </div> 
                <div class="clear"></div> 
            </div> 
            <div class="share-platform"> 
                <div class="share-platform-l">
                    社交平台：
                </div> 
                <div class="share-platform-r"> 
                    <div class="bdsharebuttonbox"> 
                        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a> 
                        <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a> 
                        <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a> 
                        <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a> 
                    </div> 
                    <div class="share-platform-text">
                        您可以直接复制短链，分享给朋友，也可直接点击社交平台图标，指定分享。 
                    </div> 
                </div> 
            </div> 
       </div>
    </a> 
</div> 
<script>window._bd_share_config = {"common": {"bdSnsKey": {}, "bdText": "分享到新浪微博", "bdMini": "1", "bdMiniList": ["bdxc", "tqf", "douban", "bdhome", "sqq", "thx", "ibaidu", "meilishuo", "mogujie", "diandian", "huaban", "duitang", "hx", "fx", "youdao", "sdo", "qingbiji", "people", "xinhua", "mail", "isohu", "yaolan", "wealink", "ty", "iguba", "fbook", "twi", "linkedin", "h163", "evernotecn", "copy", "print"], "bdPic": "", "bdStyle": "1", "bdSize": "32"}, "share": {}};
    with (document)
        0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script> 
<script src="../js/jquery-1.11.1.min.js"></script> 
<script src="js/ZeroClipboard.js"></script> 
<script>
    var g_url = window.location.href;
    $('.share-copy-c input').val(g_url);
    var clip = new ZeroClipboard(document.getElementById("btnCopy"));
</script>  

<!--底部-->
<?php include("footer.php");?>
</body>
</html>