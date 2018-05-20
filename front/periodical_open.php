<?php
error_reporting(0);
session_start();
$articleid=$_GET['articleid'];
$username=$_SESSION['username'];
$time = time();
$day = date("Y-m-d H:i:s",$time);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/periodical_open.css" rel="stylesheet" type="text/css" />
<link href="css/page.css" rel="stylesheet" type="text/css" />
<link href="css/share.css" rel="stylesheet" />
<title>期刊打开</title>
<style>
.commentbox{
	width: 900px;
	margin: 20px auto;
}
.mytextarea {
    width: 100%;
    overflow: auto;
    word-break: break-all;
    height: 100px;
    color: #000;
    font-size: 1em;
    resize: none;
}
.comment-list{
	width: 900px;
	margin: 20px auto;
	clear: both;
	padding-top: 20px;

}
.img{
    width:100px; 
    height:100px; 
    border-radius:200px; 
}
</style>
</head>

<body>
<?php include("header.php");?>
<div class="main"><!--外圈大框-->
	<?php 
	include("../Connections/myconn.php");
	mysql_select_db("music");
	mysql_query('set names utf8');
	$sql="select * from adarticle where articleid=$articleid";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	?>
	<div class="main-left">
        <div class="main-left2">
        	<h2 align="center"><?php echo $row['name'];?></h2>
        	<div class="main-left2-1">
            	<img src="../images/adminwenzhang/<?php echo $row['articleimg'];?>" ><!--图片-->
            </div>
            <div class="main-left2-2">
                <div class="cdinfo"><!--歌单信息-->
                	<ul>
                        <li>
                        	<span>音乐分类:</span>
                        	<?php echo $row['classes'];?>
                        </li>
                        <li>
                        	<span>音乐简单描述:</span>
                        	<?php echo $row['musicdescribes'];?>
                        </li>
                        <br>
                        <li style="float: right;">
                        	<span>更新时间:</span>
                        	<?php echo $row['time'];?>
                        </li> 
                    </ul>
             </div><!--歌单信息--> 
            </div>
        </div>
      
	  <!--歌单介绍-->
      <div class="music_gd">
      	<div style="float: left;padding-left: 23px;">
		 <p class="weixinAudio">
		   <audio src="" id="media" width="1" height="1" preload></audio>
			<span id="audio_area" class="db audio_area">
				<span class="audio_wrp db">
					<span class="audio_play_area">
						<i class="icon_audiodefault"><img src="images/shengyin.png" alt=""></i>
						<i class="icon_audioplaying"><img src="images/shengyin.gif" alt=""></i>
            		</span>
					<span id="audio_length" class="audio_length tips_global"></span>
					<span id="curent_time">0:00</span>
					<span class="db audio_info_area">
                		<strong class="db audio_title"><?php echo $row['music'];?></strong>
					</span>
					<span id="int_c"></span>
					<span class="progress_bar_box" style="width: 345px;">
					<span id="audio_progress" class="progress_bar" style="width: 0%;"></span>
			</span>
			</span>
			</span>

		</p>
        </div> 
        <br><br><br><br>    
    	<div class="music_w"><!--正文部分-->
    		<br>
        	<strong class="f1">文章记录:</strong>
            <div class="f2" align="left" style="padding: 50px 300px;">
            	<?php echo $row['articledescribes'];?>
            </div>   	   
        </div><!--正文部分-->
      </div> 
      
	        <div>
	        	<ul class="acts_list">
	        		<li class="share">
	                    <a class="wrap" href="javascript:void(0)" onclick="$('.mark,.share-dialog').show();">
	                        <span>
								<img src="images/分享.png">
	                        </span>
	                    </a>
	                </li> 
					<li class="collect">
	    				<a class="wrap" href="pcollecting.php?articleid=<?php echo $row['articleid'];?>">
	        				<span>
	            				<img src="images/猜你喜欢.png">
	            				<?php echo $row['collect'];?>
	            			</span>
	        			</a>
	    			</li>           
	            </ul>
	        </div><!--收藏-->      
    </div>
<a> 
    <div class="mark" style="display: none;"></div> 
</a>
<div class="share-dialog" style="display: none;">
    <div class="share-close" onclick="$('.mark,.share-dialog').hide();"></div> 
    <div class="share-dialog-title">
        <h6>分享</h6>
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
<script src="../admin/js/jquery-1.10.2.js"></script>
<script src="../admin/js/weixinaudio.js"></script>
<script>
$('.weixinAudio').weixinAudio({
	autoplay:true,
	src:'../admin/musicfile/<?php echo $row['music'];?>',
});
</script>
<script>
var a=0;
$(".audio_play_area").click(function () {
		a++;
	if(a%2!=0){
		$(".icon_audiodefault").css({"display":"none"});
		$(".icon_audioplaying").css({"display":"block"});
		console.log(a);
	}
	if(a%2==0){
		console.log(a);
		$(".icon_audiodefault").css({"display":"block"});
		$(".icon_audioplaying").css({"display":"none"});
	}
})
</script>
<!--我来说两句-->
<form method="post" action="">
<div align="center" id="wall" style="padding-top: 20px; font-family: '微软雅黑'; font-size: small;">
	<div class="container">
		<div class="commentbox">
			<textarea cols="80" rows="50" placeholder="来说几句吧......" class="mytextarea" id="content" name="comment"></textarea>
			<br><br><input name="pl" class="suggest_input" value="发表评论" type="submit" style="float: right;">
		</div>
		<?php
		require_once('page.class.php'); //分页类
		$showrow = 3; //一页显示的行数
		$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
		$url = "?page={page}&articleid=$articleid"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
		$sql="select * from comment where articleid=$articleid and kind=1 order by dzlike desc";
		$total = mysql_num_rows(mysql_query($sql)); //记录总条数
		if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
	    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页
		//获取数据
		$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";
		$result=mysql_query($sql);
	 	while($row=mysql_fetch_object($result))
	 	{
		 ?>
		<div class="comment-list" align="left">			 			
		 <div style="height: 130px;">
		 	<img style="float: left;" class="img" src="../images/userheaderimg/<?php echo $row->image;?>">						
			<br><font style="padding: 10px;"><?php echo $row->reviewer;?><a>@<?php echo $row->respondent;?></a></font><br>
			<br><font face="微软雅黑" size="3" style="padding-left: 50px;float: left;"><?php echo $row->coment;?></font>
			<a style="float: right;" href="liking.php?coment=<?php echo $row->coment;?>&articleid=<?php echo $row->articleid;?>&kind=<?php echo $row->kind;?>">
			<img src="images/点赞.png"><?php echo $row->dzlike;?></a><br>
			<p><font style="padding: 10px;float: right;"><?php echo $row->time;?></font></p><br>						
		 </div>									 
		</div>
	<?php }?>
	<?php
        if ($total > $showrow) {//总记录数大于每页显示数，显示分页
            $page = new page($total, $showrow, $curpage, $url, 2);
            echo $page->myde_write();
    }
    ?>
    </div>											
   </div>
  </form>    
</div><!--外圈大框-->
<?php include("footer.php");?>
</body>
</html>
<?php 
if(isset($_POST['pl']))
{
	$comment=$_POST['comment'];
	$sql="select *from comment where coment='".$comment."' and kind=1 and articleid='".$articleid."'";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		echo "<script>alert('该评论已存在！');</script>;";
	}
	else
	{
		$sql="select * from user where username='".$username."'"; 
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$image=$row['image'];
 		$sql="insert into comment (reviewer,respondent,coment,image,time,articleid,kind) values('".$username."','管理员','".$comment."','".$image."','".$day."','".$articleid."','1')";
 		$result=mysql_query($sql);
 		if($result)
 		{
     		echo "<script>alert('评论已发表！');location.href='javascript:history.go(-1)';</script>;";
    	}
 		else
     		echo "<script>alert('评论发表失败，请联系管理员，谢谢!');location.href='javascript:history.go(-1)';</script>;";
	}
	
}
?>