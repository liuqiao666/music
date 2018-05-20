<?php 
error_reporting(0);
$text=$_GET['text'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜索页面</title>
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/sharing.css" rel="stylesheet" type="text/css" />
<link href="css/page.css" rel="stylesheet" type="text/css" />
<link href="css/share.css" rel="stylesheet" />
<style type="text/css">
input{
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
		<div class="sharing-search"><!--搜索部分大方框-->
			<form role="form" method="post" class="form" action="">
			  <div align="center" style="padding-top: 55px;">
				<select name="select" id="select">
				<option value="1">期刊</option>
				<option value="0">分享圈</option>
				</select>
		    	<input name="text" type="text" id="text" size="20" class="search1" placeholder="搜索歌曲..." required="required"/>
		   	    <input name="submit" type="submit" class="button1" id="submit" value=""/>
		   	  </div>
		    </form>
		</div>
    <div><h3 class="bigtext"></h3></div><!--下横线-->

        <?php 
		include("../Connections/myconn.php");
		mysql_select_db("music");
		require_once('page.class.php'); //分页类
		$showrow = 4; //一页显示的行数
		$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
		$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
		if(isset($_POST['submit']))
		{
			switch($_POST['select'])
			{
				case 1:$sql="select *from adarticle where name like'".$_POST['text']."%'";
					   $one='adminwenzhang';
					   $two='periodical';
					   break;
				case 0:$sql="select *from usarticle where look=1 and name like'".$_POST['text']."%'";
					   $one='userwenzhang';
					   $two='sharing';
					   break;
			}
		}
		else
		{
			$one='adminwenzhang';
			$two='periodical';
			$sql="select *from adarticle where name like'".$text."%'";
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
        		<a href="<?php echo $two;?>_open.php?articleid=<?php echo $row->articleid;?>&username=<?php echo $row->username;?>">
            	<img src="../images/<?php echo $one;?>/<?php echo $row->articleimg;?>">
            	</a>
            </div>
            <div class="main-left2-2">
            	<div class="main-left2-2-1">
                	<h2 align="center"><?php echo $row->name;?></h2>
                    <p class="sharing-text">文章分类：<?php echo $row->classes;?></p>
                    <p class="sharing-text">歌曲名：<?php echo $row->music;?></p>
                    <p class="sharing-text2">推荐人:<?php echo $row->username;?></p>
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
            分享
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

<?php include("footer.php");?>
</body>
</html>