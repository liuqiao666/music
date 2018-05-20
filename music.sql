-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 05 月 20 日 22:46
-- 服务器版本: 5.5.47
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `music`
--

-- --------------------------------------------------------

--
-- 表的结构 `adarticle`
--

CREATE TABLE IF NOT EXISTS `adarticle` (
  `articleid` varchar(32) DEFAULT NULL COMMENT '管理员发布的文章编号 管理员发布的文章编号',
  `name` varchar(32) DEFAULT NULL COMMENT '文章名称 文章名称',
  `music` varchar(225) DEFAULT NULL COMMENT '音乐文件 音乐文件',
  `musicdescribes` varchar(225) DEFAULT NULL COMMENT '音乐简单描述 音乐简单描述',
  `classes` varchar(225) DEFAULT NULL COMMENT '文章分类 文章分类',
  `articleimg` varchar(50) DEFAULT NULL COMMENT '文章缩略图 文章缩略图',
  `articledescribes` varchar(2000) DEFAULT NULL COMMENT '文章描述 文章描述',
  `time` varchar(50) DEFAULT NULL COMMENT '管理员发布文章的时间 管理员发布文章的时间',
  `collect` varchar(225) DEFAULT '0' COMMENT '文章收藏量 文章收藏量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员发布的文章信息 管理员发布的文章信息';

--
-- 转存表中的数据 `adarticle`
--

INSERT INTO `adarticle` (`articleid`, `name`, `music`, `musicdescribes`, `classes`, `articleimg`, `articledescribes`, `time`, `collect`) VALUES
('7', '那时的风依旧', '夏川りみ - 黄金の花.mp3', '黄金の花が咲くという', '民谣', 'a7.jpg', '<p>\r\n	<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">冲绳音乐的节奏来自生活本身，这些民谣具备厚实的时间沉淀，他不仅忠实的记录了冲绳数百年来的政治历史和社会变迁，还表现出小岛原住民充实自信的一面。就着这些岛歌里轻柔的三味线，冲绳的风情万种以及平远辽阔的海天一色总能温暖的绽放在人们眼前。当你回头望向远方，就这么轻易的让人心底的忧愁都消散在了风的嘶鸣以及鸟雀的欢愉中。</span>\r\n</p>\r\n<p>\r\n	<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	<p>\r\n		<p class="f-ust f-ust-1">\r\n			<strong>sharing：</strong>\r\n		</p>\r\n		<p class="f-ust f-ust-1">\r\n			<span style="color:#E53333;">黄金の花が咲くという</span>\r\n		</p>\r\n		<p class="f-ust f-ust-1 f-fs0 translated" style="font-size:12px;">\r\n			<span style="color:#E53333;">由传说而描绘出梦想的黄金之花</span>\r\n		</p>\r\n	</p>\r\n	<div class="j-line trans" style="margin:0px 0px 14px;padding:0px;color:rgba(0, 0, 0, 0.7);font-family:arial, 微软雅黑, &quot;font-size:14.4px;background-color:#FAFAFA;">\r\n		<p class="f-ust f-ust-1">\r\n			<span style="color:#E53333;">噂で夢を描いたの</span>\r\n		</p>\r\n		<p class="f-ust f-ust-1 f-fs0 translated" style="font-size:12px;">\r\n			<span style="color:#E53333;">听闻已经盛开</span>\r\n		</p>\r\n	</div>\r\n	<div class="j-line trans" style="margin:0px 0px 14px;padding:0px;color:rgba(0, 0, 0, 0.7);font-family:arial, 微软雅黑, &quot;font-size:14.4px;background-color:#FAFAFA;">\r\n		<p class="f-ust f-ust-1">\r\n			<span style="color:#E53333;">家族を故郷、故郷に</span>\r\n		</p>\r\n		<p class="f-ust f-ust-1 f-fs0 translated" style="font-size:12px;">\r\n			<span style="color:#E53333;">将家人留在故乡</span>\r\n		</p>\r\n	</div>\r\n	<div class="j-line trans" style="margin:0px 0px 14px;padding:0px;color:rgba(0, 0, 0, 0.7);font-family:arial, 微软雅黑, &quot;font-size:14.4px;background-color:#FAFAFA;">\r\n		<p class="f-ust f-ust-1">\r\n			<span style="color:#E53333;">置いて泣き泣き、出てきたの</span>\r\n		</p>\r\n		<p class="f-ust f-ust-1 f-fs0 translated" style="font-size:12px;">\r\n			<span style="color:#E53333;">挥泪远行的</span>\r\n		</p>\r\n	</div>\r\n<span style="color:#E53333;"></span><br />\r\n</span>\r\n</p>', '2018-05-15 21:32:23', '2'),
('8', '再见，二零一七。', 'Muma木马 - 纯洁2016.mp3', '人再怎么文艺，落入凡尘只是个俗人。家家有本难念的经，身为旁人的我们，只有默默的关注祝福祈祷，希望我们心中的那片乐土能继续存在下去。', '民谣', 'a8.jpg', '<p>\r\n	跟随着她 青春无比甜美\r\n</p>\r\n<p>\r\n	在奔跑时 孩子般的游戏\r\n</p>\r\n<p>\r\n	一起赞美吧 燃烧的火焰\r\n</p>\r\n<p>\r\n	明天永远只是明天\r\n</p>\r\n<p>\r\n	逝去了不会再来临\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp;- 木马·纯洁\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	又一年要过去了，我们总是在所难免的要挥别过去，去迎接新的一年、新的生活。在生活、在情感、在岁月的感动中，我们总会留恋，留恋曾经所有的所有，造就的此刻我们。没有什么美好的东西能永远存在着，不是么？\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	感谢所有曾经在黑夜中给予我们孤独的灵魂以安抚的声音，在内心荒漠的世界里，是你们陪伴着我们独自等待与独自追寻着那一片绿洲，是你们让我们不曾忘记奔跑的力量和畅快，以及让我们为之疯狂并为之骄傲的原初。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	在未来能够重逢的日子里，希望这世界以及我们依旧能够变得干净并且温暖。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span>14岁那年听了feifei run，从此爱上这个男人一发不可收拾。17岁那年有幸看了专场，结束后第二天清晨看着摆在桌上的签名专辑和海报突然大哭。那个夜晚就像是一场奇异的梦，高兴地变成了悲伤的风。我想在你面前永葆纯洁。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	再见，二零一七。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp;- 落在低处&nbsp;\r\n</p>', '2018-05-15 21:39:38', '1'),
('9', '座中何人 谁不怀忧', 'Yinyues - Everything.mp3', '秋风萧萧愁杀人，出亦愁，入亦愁。', '摇滚', 'a9.jpg', '<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, " font-size:13px;"="">\r\n	这么些年来，时间总在渐慢的逝去。年轻时逆流而上的愤怒早已消散在这沉默的天空，你等待的那种无助以及绝望之后重生的力量并未如期到来。我们只能向前，向着“去经历改变，然后成熟”、以及“去接受现实，然后成长”出发，然后义无反顾的跳进一个又一个生命的轮回里。你可曾想过，当你跳进这生活深邃的黑洞之前，你是一个浪荡的痞子。而当你穿过黑洞之后，则摇身一变，穿上了精美的雅痞外衣。是什么让你外表变得“优雅漂亮”？又是什么让你的内部变得“沉默如烟”？\r\n	</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, " font-size:13px;"=""><br />\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, " font-size:13px;"=""> <strong>秋风萧萧愁杀人，出亦愁，入亦愁。座中何人，谁不怀忧。</strong> \r\n	</p>', '2018-05-15 21:44:16', '1'),
('1', '相信公路', '五条人 - 东莞的月亮.mp3', '我始终相信在每一个地方、无论是城市还是乡村，都有着这样一群普通的年轻人，他们不甘于沉默，他们会拼尽全力向这个世界表达自己的看法。', '民谣', '56d5141560fe9.jpg', '<p>\r\n	<span style="color:#E53333;">广东对于中国大陆来说是一个神奇复杂的地方，在这里生活的人们有着被海风吹打过后硬朗的背影、有着市井现实里狡黠的眼神、有着夜色深处悲伧的高歌而和、还有着高屋里的闲适自得。广东人比起全国其他地方的人来说，更愿意相信梦想、物质和规则。</span> \r\n</p>\r\n<p>\r\n	他们始终相信只要不停的努力，定能实现梦想花开；他们始终相信只要不停的打拼，定能富贵还乡；他们始终相信只要不停的吸新去旧，定能重塑世界之纲领。 &nbsp;本期音乐包含民谣、说唱、后摇、爵士、金属等风格。你可以从这一期音乐里听到宁静海边停泊的渔船、大戏里的宗族精神和传奇故事、乡下小路尽头里的青山巍巍、县城大道里奔驰而过的摩托车、城乡结合部里暧昧的发廊、夜市里喧哗的推杯换盏、工厂里轰隆而鸣的机器声、地铁里茫然等待的眼神、咖啡馆里的余韵残存、高楼顶上的振臂呐喊... &nbsp;独立音乐对于广东来说，由于广东地缘的特殊性，早期的独立音乐作品常被湮灭于港式音乐文化中。\r\n</p>\r\n<p>\r\n	不过近年来出现了如五条人、沼泽、玩具船长、六甲番等地域性极强的乐队，他们跳脱了地域文化的绝缘性，使得广东的独立音乐在全国范围内获得了更多的认知和认同。他们带着忙碌与悠闲里的众生相，将吉他带到了乡村、酒吧、咖啡馆、地下通道和城市广场，唱起这个地方里的秋去冬来与人情冷暖。 &nbsp;当你生活在这个地方，你无法逃脱城市里的霓虹闪烁，也无法逃脱海风拂面里的清清索索，所以你只能就着夜的声音，用一种相对悲壮的姿势，跳入茫茫人海中。\r\n</p>\r\n<p>\r\n	这一切就像北岛写的“如今我们深夜饮酒，杯子碰到一起，都是梦破碎的声音”。 &nbsp;我始终相信在每一个地方、无论是城市还是乡村，都有着这样一群普通的年轻人，他们不甘于沉默，他们会拼尽全力向这个世界表达自己的看法。就像这个世界上有那么多条路：有马路、铁路、航路、水路等。<strong>但是到最后，我们心中始终相信公路！</strong> \r\n</p>', '2018-04-19 20:07:34', '4'),
('2', '借我杀死庸碌的情怀', '谢春花 - 借我.mp3', '特别喜欢谢春花的声音，就像高中夏天某个只有选修课的下午。就像再也买不到的橘子味巧克力。就像甜甜的回笼觉。', '民谣', '56d5141ca9b7e.jpg', '<p>\r\n	借我不愁\r\n</p>\r\n<p>\r\n	借我童真不泯灭&nbsp;\r\n</p>\r\n<p>\r\n	借我不会失望的际会姻缘\r\n</p>\r\n<p>\r\n	借我杳无音信的荒岛人烟&nbsp;\r\n</p>\r\n<p>\r\n	借我风驰电掣脱离地平线\r\n</p>\r\n<p>\r\n	借我悲喜自酿的见异思迁&nbsp;\r\n</p>\r\n<p>\r\n	借我闲适的清明和幽冷的寒夜\r\n</p>\r\n<p>\r\n	借我诞出成熟到朽而天真的蜕变&nbsp;\r\n</p>\r\n<p>\r\n	借我无妄的想见\r\n</p>\r\n<p>\r\n	借我乐意的脸睑&nbsp;\r\n</p>\r\n<p>\r\n	借我转瞬万年的顷刻之间\r\n</p>\r\n<p>\r\n	借我一切归零的长夜睡眠&nbsp;\r\n</p>\r\n<p>\r\n	借我重回弱冠啊\r\n</p>\r\n<p>\r\n	不觉已是暮年<span style="font-size:18px;"><span style="font-size:24px;"></span></span>\r\n</p>\r\n<p>\r\n	终究未能谈及旦旦誓言&nbsp;\r\n</p>\r\n<p>\r\n	也未曾能决绝如初见&nbsp;\r\n</p>\r\n<p>\r\n	但求有光照亮黯淡&nbsp;\r\n</p>\r\n<p>\r\n	<strong><span style="font-size:16px;">予我明媚笑颜如春天</span></strong><img src="http://localhost/music/admin/js/kindeditor/plugins/emoticons/images/0.gif" border="0" alt="" /><span style="line-height:1.5;"></span>\r\n</p>', '2018-04-20 11:23:58', '1'),
('3', '听完一首歌', '宇西 - 那个男人（Cover 张碧晨）.mp3', '真的，我们连分手都没好好说过。', '流行', '011e695991678d0000002129ed7101.jpg', '<p>\r\n	<span style="font-size:16px;">人生就是不停地告别，与亲人、与朋友、与过去、与自己。</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;">面对每一次的别离，我们都要好好告别。因为每次分开都可能是最后一次。相见时，要心存感激，像第一次那样。 书中记录了50个生活中的平凡故事，从这些朴实的文字中，可以让我们感悟到：不论是爱情、婚姻还是亲情，都需要我们有耐心并付出时间去探索、去守候、去珍惜。</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;">生命原本是一场远行，谁与你相知，谁与你相爱，谁与你相处，谁与你擦肩，都是一场美丽的缘分。缘在，珍惜。就算终有一散，也不要辜负彼此的相遇。</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;">至真至纯的故事，简单朴素的文字，温暖动人的情感，字里行间可以感受到温情与正能量。</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;"></span><span style="font-size:16px;">原来，真爱一个人，可以什么都不介意。&nbsp;</span>\r\n</p>\r\n<span style="font-size:16px;"> 真爱一个人，可以包容一切。&nbsp;</span><br />\r\n<span style="font-size:16px;"> 真爱一个人，可以忘记一切。&nbsp;</span><br />\r\n<span style="font-size:16px;"> <strong>就算没有忘记，可以假装看不见。</strong><strong>&nbsp;</strong></span>', '2018-04-20 11:34:36', '1'),
('4', '初冬的倒影', '岑宁儿 - 追光者.mp3', '这里荒芜寸草不生， 后来你来这走了一遭， 奇迹般万物生长， 这里是我的心。', '流行', '640x452.jpg', '<p>\r\n	春有狂花秋有月，冷风几度入冬雪，只有夏天，夏天是爱人的庆典，夏天是少女的祭祀，夏天从你裸露的锁骨和洁白的脚踝入场。我没有花月风雪，唯有让棕榈阳伞为你暂借荫凉，睡莲臂弯伴你一夜好眠，我一介凡人庸人无用之人，为了你，三两杯浊酒下肚，也想试试那些所谓的不可能，不二不重来的夏天。\r\n</p>\r\n<p>\r\n	七七和立夏喜欢上了同一个男孩，立夏没发现，七七没有说，小司选择了拒绝。谁都没有错，只是在对的时间遇上了错的人。\r\n</p>\r\n<p>\r\n	世界在变， 我们都在妥协， 我们依然没有得到自己想要的。 但我们还是那个会独自在房间里跳舞的少年。 我们无法成为大人，可是也不是少年。\r\n</p>\r\n<p>\r\n	爱情最怕：开始不给机会，中间不给空间，结局不给宽容。 人生若只如初见该多好。\r\n</p>\r\n<p>\r\n	后来我再也没有翻过夏至未至，一如我再也没有见过那个借我书的少年。\r\n</p>', '2018-04-20 11:44:34', '7'),
('5', '人生是把悲伤的钥匙', 'EastDear Park - Only Time Will Tell.mp3', '相信美好的发生，是当下活下去的最厚实的、也是唯一的理由。', '原创', 'a5.jpg', '<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	生活很复杂，可以肯定的是普通人一生中的不幸总是远远大过幸运。什么都可能失败，什么都可以失败，你只能接受，这一生都遇不到爱情，无法坚持一段友情，无能经营一个家庭，无力抵抗疾病，你哭着来，却做不到笑着走，人死灯灭，人走茶凉，其实我们都一无所有。\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	<br />\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	面对这般无奈生活，人生像是一把悲伤的钥匙，他总是能够轻易的打开生活里残酷的那一面。每个人都有自己的故事，不是每个人都能够正能量的冲破天际。但相信明天依然如期而至，相信美好的发生，是当下活下去的最厚实的、也是唯一的理由。\r\n</p>', '2018-05-15 21:13:48', '0'),
('6', '伟大的渺小', 'Black Shine,The House Pushers - Slow It Down.mp3', '愿你出走半生，归来仍是年少', '独立音乐', 'a6.jpg', '<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, " font-size:13px;"="">所有艺术的伟大都来源于人内心里无尽探求，在这些宏大结构的音乐里，即兴式的段落启程，闪烁着光辉的古典华丽音符，足够让每个个体都显得无比的渺小。音乐画面里，不仅有史诗鏖战里的汪洋恣肆，还有带给人欢笑的小丑在落幕后独自抚面低泣。仿佛在对着世人说：来吧，偏执狂般的狂风暴雨！来吧，归寂于山林幽色的落寞！悲剧既然早已诞生，何必再去修饰这世界的荒诞！在哪戡不尽的滚滚红尘里，一如叔本华说的：幸福只是痛苦的减轻，而无法清除，只是伴随着幸福在逐渐减轻的过程。</span>', '2018-05-15 21:27:59', '0'),
('10', '只为时光 不为玩乐', 'Garry Schyman - Dancing Outtakes.mp3', '欢快又惬意，都是我喜欢你的样子。', '戏曲', 'a10.jpg', '<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	生命总是以一种奇妙的方式而展开的，或许迷惘，或许止步不前，更或许是格格不入。但生命是个奇迹，只要生命还在继续，奇迹就会继续。没有人知道自己活下去的话会发生什么，所以就让奇迹继续吧！\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	<br />\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	生命里最美好的事莫过于在会心一笑里收获一把生命的砰然感动。\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	<br />\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	这期音乐为原声音乐专题，有来自世界各地的民族乐器演奏。整期音乐仿佛用一种迷离欢快的舞步把生命里最为灿烂的那一部分层层推进展开，然后让人释然于人世间的真相里。\r\n</p>', '2018-05-15 21:46:23', '1');

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminname` varchar(32) DEFAULT NULL COMMENT '管理员名称 管理员名称',
  `adminpassword` varchar(32) DEFAULT NULL COMMENT '管理员密码 管理员密码',
  `email` varchar(225) DEFAULT NULL COMMENT '管理员邮箱 管理员邮箱',
  `limits` varchar(1) DEFAULT '2' COMMENT '管理员权限等级：1为最高等级，2为一般等级'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员信息 管理员信息';

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`adminname`, `adminpassword`, `email`, `limits`) VALUES
('chenmei', '111111', '234657586@qq.com', '1'),
('yuxin', '666666', '3634454464@qq.com', '1'),
('liuqiao666', '666666', '1255394075@qq.com', '1'),
('qiaoqiao', '111111', '1255394075@qq.com', '2');

-- --------------------------------------------------------

--
-- 表的结构 `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `username` varchar(32) DEFAULT NULL COMMENT '用户名 用户名',
  `number` varchar(32) DEFAULT NULL COMMENT '收藏的文章的编号 收藏的文章的编号',
  `name` varchar(50) DEFAULT NULL COMMENT '文章名称 文章名称',
  `img` varchar(50) DEFAULT NULL COMMENT '文章缩略图 文章缩略图',
  `kind` varchar(1) DEFAULT NULL COMMENT '收藏的类型：1为期刊，0为用户分享',
  `tjrname` varchar(32) DEFAULT NULL COMMENT '文章推荐人的用户名'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户的收藏';

--
-- 转存表中的数据 `collect`
--

INSERT INTO `collect` (`username`, `number`, `name`, `img`, `kind`, `tjrname`) VALUES
('liuqiao666', '3', '听完一首歌', '011e695991678d0000002129ed7101.jpg', '1', '管理员'),
('liuqiao666', '2', '借我杀死庸碌的情怀', '56d5141ca9b7e.jpg', '1', '管理员'),
('liuqiao666', '5', '盛大的告别', 'u5.jpg', '0', '时光'),
('liuqiao666', '4', '初冬的倒影', '640x452.jpg', '1', '管理员'),
('liuqiao666', '9', '青春的纪念碑', 'u2.jpg', '0', '时光'),
('liuqiao666', '6', '依旧是疲惫的心情沧桑的眼睛', 'u6.jpg', '0', '时光'),
('liuqiao666', '9', '座中何人 谁不怀忧', 'a9.jpg', '1', '管理员'),
('liuqiao666', '7', '那时的风依旧', 'a7.jpg', '1', '管理员'),
('liuqiao666', '8', '再见，二零一七。', 'a8.jpg', '1', '管理员'),
('liuqiao666', '10', '只为时光 不为玩乐', 'a10.jpg', '1', '管理员'),
('liuqiao666', '1', '相信公路', '56d5141560fe9.jpg', '1', '管理员'),
('', '7', '那时的风依旧', 'a7.jpg', '1', '管理员'),
('liuqiao666', '7', '一腔孤勇', 'u7.jpg', '0', '时光');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `reviewer` varchar(32) DEFAULT NULL COMMENT '评论者名称 评论者名称',
  `respondent` varchar(32) DEFAULT NULL COMMENT '被评论者名称 被评论者名称',
  `coment` varchar(225) DEFAULT NULL COMMENT '评论内容 评论内容',
  `image` varchar(32) DEFAULT NULL COMMENT '评论者的头像',
  `time` varchar(32) DEFAULT NULL COMMENT '评论的时间',
  `articleid` varchar(32) DEFAULT NULL COMMENT '文章的编号',
  `kind` varchar(1) DEFAULT NULL COMMENT '1为期刊，0为分享圈',
  `dzlike` varchar(32) DEFAULT '0' COMMENT '点赞数'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户评论 用户评论';

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`reviewer`, `respondent`, `coment`, `image`, `time`, `articleid`, `kind`, `dzlike`) VALUES
('liuqiao666', '管理员', '你是年少的欢喜', 'portfolio2.jpg', '2018-05-16 21:05:06', '10', '1', '0'),
('liuqiao666', '时光', '不开心的时候 总会听到这首', 'portfolio2.jpg', '2018-05-16 20:47:54', '9', '0', '1'),
('liuqiao666', '管理员', '来年要更努力地生活。\r\n痛苦本就是生活的一部分。\r\n要笑啊，要开心啊。', 'portfolio2.jpg', '2018-05-15 21:41:46', '8', '1', '0'),
('liuqiao666', '管理员', '我的耳朵被音悦养刁了啊，一段时间不听感觉都好听。', 'portfolio2.jpg', '2018-05-15 21:29:00', '6', '1', '0'),
('liuqiao666', '时光', '沉溺于忧伤的自恋，瓦解于漫长的等待', 'portfolio2.jpg', '2018-05-15 21:10:42', '8', '0', '0'),
('liuqiao666', 'liuqiao666', '人生是把悲伤的钥匙', 'portfolio2.jpg', '2018-05-15 21:09:08', '10', '0', '0'),
('liuqiao666', '时光', '异化世界，寻找影子的交织，\r\n无论你是否藏匿。\r\n我仍是这世界晃来晃去的人。', 'portfolio2.jpg', '2018-05-15 21:06:14', '5', '0', '0');

-- --------------------------------------------------------

--
-- 表的结构 `commodity`
--

CREATE TABLE IF NOT EXISTS `commodity` (
  `number` varchar(32) NOT NULL DEFAULT '' COMMENT '商品编号 商品编号',
  `name` varchar(50) DEFAULT NULL COMMENT '商品名称 商品名称',
  `description` varchar(225) DEFAULT NULL COMMENT '商品的描述 商品的描述',
  `img` varchar(50) DEFAULT NULL COMMENT '商品图片 商品图片',
  `price` varchar(32) DEFAULT NULL COMMENT '价格 价格',
  `stock` varchar(32) DEFAULT NULL COMMENT '商品的库存',
  PRIMARY KEY (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='积分兑换的商品';

--
-- 转存表中的数据 `commodity`
--

INSERT INTO `commodity` (`number`, `name`, `description`, `img`, `price`, `stock`) VALUES
('4', '手机K歌耳机', '卡姆昂 手机K歌耳机带麦克风话筒二合一套装唱吧全民唱歌耳麦入耳式通用苹果小米魅族VIVO', '58dcab0eN9dd1f5e2.jpg', '500', '10'),
('1', '小米活塞耳机', '清新版 入耳式手机耳机 通用耳麦-配件 黑色', '5aa8ba69Nd4f39609.png', '500', '10'),
('2', 'bcase', 'Bcase个性MEC耳机收纳器手机配件多功能绕线整理器保护绳休闲创意', 'erji.jpg', '500', '10'),
('3', 'Joyroom', '耳机入耳式手机通用重低音炮K歌苹果有线耳塞迷你线控 【红色】立体重低音', '5a608703N430ebddd.jpg', '500', '9'),
('5', '斯泰克（stiger）手机耳机', '线控带麦克风入耳式重低音立体声耳塞 适用苹果iPhone6s/Plus iPad Air/Pro/Mini', '5.jpg', '500', '10'),
('6', 'TMiao手机入耳式耳机', 'TMiao 手机入耳式耳机适用于vivo耳机 x20 X9 X6 X7Plus y67 线控带麦耳机【京东正品】', '5a5b08a4N8b8477b5.jpg', '500', '10'),
('7', '立体声运动耳机', 'HONGBIAO SM 立体声运动耳机入耳式手机通话钛金属磁吸式重低音乐线控耳塞 红色 普通版（不带麦）', '5a45fa7bN8765fb27.jpg', '500', '10'),
('8', '小米（MI）', '小米（MI）小米二合一数据线 Micro USB转Type-C(100cm)', '59803b81Nd7bf60a3.jpg', '450', '10'),
('9', '美斯捷入耳式耳机', '美斯捷 耳机入耳式线控带麦手机通用 玫瑰金 金立M2017/M6/m6s plus/S9', '592d2f3bNf2c50720.jpg', '500', '10'),
('10', 'HUASUME', 'HUASUME 原装苹果6/iPhone6/6s/6plus/iPad/5se手机耳机线', '5944f613N1545a93a.jpg', '700', '10'),
('11', '荣耀指环扣', '荣耀指环扣手机支架AF16', '5909db50Nd36fe672.jpg', '200', '10'),
('12', '绿联 OTG手机TF读卡器', '绿联 OTG手机TF读卡器 插卡式U盘 Type-C/USB3.0安卓手机电脑两用数据线转接头 支持小米华为新macbook 30359', '59476f0eNbb7f0f3c.jpg', '450', '10');

-- --------------------------------------------------------

--
-- 表的结构 `intexchange`
--

CREATE TABLE IF NOT EXISTS `intexchange` (
  `username` varchar(32) DEFAULT NULL COMMENT '用户名 用户名',
  `number` varchar(32) DEFAULT NULL COMMENT '商品编号 商品编号',
  `name` varchar(32) DEFAULT NULL COMMENT '商品名称 商品名称',
  `description` varchar(225) DEFAULT NULL COMMENT '商品描述 商品描述',
  `img` varchar(50) DEFAULT NULL COMMENT '申请兑换的商品图片 申请兑换的商品图片',
  `price` varchar(32) DEFAULT NULL COMMENT '兑换的商品价格 兑换的商品价格',
  `address` varchar(225) DEFAULT NULL COMMENT '收货地址 收货地址',
  `email` varchar(32) DEFAULT NULL COMMENT '邮箱',
  `delivered` varchar(1) DEFAULT '0' COMMENT '是否发货：1为已发货；0为未发货'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='积分兑换 积分兑换';

--
-- 转存表中的数据 `intexchange`
--

INSERT INTO `intexchange` (`username`, `number`, `name`, `description`, `img`, `price`, `address`, `email`, `delivered`) VALUES
('时光', '3', 'Joyroom', '耳机入耳式手机通用重低音炮K歌苹果有线耳塞迷你线控 【红色】立体重低音', '5a608703N430ebddd.jpg', '500', '13981712815+电子科技大学成都学院百叶路1号', '1255394075@qq.com', '0'),
('liuqiao666', '3', 'Joyroom', '耳机入耳式手机通用重低音炮K歌苹果有线耳塞迷你线控 【红色】立体重低音', '5a608703N430ebddd.jpg', '500', '四川省成都市郫县电子科技大学成都学院百叶路1号', '1255394075@qq.com', '0');

-- --------------------------------------------------------

--
-- 表的结构 `opinion`
--

CREATE TABLE IF NOT EXISTS `opinion` (
  `username` varchar(32) DEFAULT NULL COMMENT '反馈信息人的名称 反馈信息人的名称',
  `message` varchar(225) DEFAULT NULL COMMENT '反馈的信息 反馈的信息',
  `email` varchar(225) DEFAULT NULL COMMENT '反馈信息人的邮件 反馈信息人的邮件',
  `opinionok` varchar(1) DEFAULT '0' COMMENT '用户反馈的信息是否处理完毕'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='意见反馈 意见反馈';

--
-- 转存表中的数据 `opinion`
--

INSERT INTO `opinion` (`username`, `message`, `email`, `opinionok`) VALUES
('liuqiao666', '我觉得每天的积分可以再多点~', '1255394075@qq.com', '0');

-- --------------------------------------------------------

--
-- 表的结构 `sign`
--

CREATE TABLE IF NOT EXISTS `sign` (
  `username` varchar(32) DEFAULT NULL COMMENT '用户名',
  `time` varchar(32) DEFAULT NULL COMMENT '签到时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sign`
--

INSERT INTO `sign` (`username`, `time`) VALUES
('liuqiao666', '2018-05-14'),
('liuqiao666', '2018-05-09'),
('liuqiao666', '2018-05-08'),
('时光', '2018-05-15'),
('liuqiao666', '2018-05-15'),
('liuqiao666', '2018-05-17'),
('liuqiao666', '2018-05-20');

-- --------------------------------------------------------

--
-- 表的结构 `start`
--

CREATE TABLE IF NOT EXISTS `start` (
  `id` varchar(10) DEFAULT NULL COMMENT '图片的id 图片的id',
  `img` varchar(50) DEFAULT NULL COMMENT '图片 图片',
  `description` varchar(225) DEFAULT NULL COMMENT '图片的描述 图片的描述'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='前端页面轮播 前端页面轮播';

--
-- 转存表中的数据 `start`
--

INSERT INTO `start` (`id`, `img`, `description`) VALUES
('5', '5.jpg', '你的名字'),
('3', '3.jpg', '听完一首歌'),
('2', '2.jpg', '借我杀死庸碌的情怀'),
('1', '1.jpg', '借我杀死庸碌的情怀'),
('4', '4.jpg', '相信公路');

-- --------------------------------------------------------

--
-- 表的结构 `thumbs`
--

CREATE TABLE IF NOT EXISTS `thumbs` (
  `articleid` varchar(32) DEFAULT NULL COMMENT '文章的编号',
  `coment` varchar(225) DEFAULT NULL COMMENT '评论内容',
  `kind` varchar(32) DEFAULT NULL COMMENT '文章的类型：1为期刊，0为分享圈'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `thumbs`
--

INSERT INTO `thumbs` (`articleid`, `coment`, `kind`) VALUES
('1', '55', '0'),
('1', 'rtttttrt', '0'),
('9', '不开心的时候 总会听到这首', '0'),
('2', '555555555', '1');

-- --------------------------------------------------------

--
-- 表的结构 `usarticle`
--

CREATE TABLE IF NOT EXISTS `usarticle` (
  `articleid` varchar(32) DEFAULT NULL COMMENT '用户发布的文章的编号 用户发布的文章的编号',
  `name` varchar(32) DEFAULT NULL COMMENT '文章名称 文章名称',
  `music` varchar(50) DEFAULT NULL COMMENT '音乐文件 音乐文件',
  `mdescribes` varchar(225) DEFAULT NULL COMMENT '音乐简单描述 音乐简单描述',
  `classes` varchar(225) DEFAULT NULL COMMENT '文章分类 文章分类',
  `articleimg` varchar(50) DEFAULT NULL COMMENT '文章缩略图 文章缩略图',
  `adescribes` varchar(2000) DEFAULT NULL COMMENT '文章描述 文章描述',
  `look` varchar(32) DEFAULT '0' COMMENT '审核 审核',
  `time` varchar(50) DEFAULT NULL COMMENT '用户发布文章的时间 用户发布文章的时间',
  `collect` varchar(225) DEFAULT '0' COMMENT '文章收藏量 文章收藏量',
  `email` varchar(50) DEFAULT NULL COMMENT '推荐人的邮箱',
  `username` varchar(32) DEFAULT NULL COMMENT '推荐人用户名'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户发布的文章信息 用户发布的文章信息';

--
-- 转存表中的数据 `usarticle`
--

INSERT INTO `usarticle` (`articleid`, `name`, `music`, `mdescribes`, `classes`, `articleimg`, `adescribes`, `look`, `time`, `collect`, `email`, `username`) VALUES
('9', '青春的纪念碑', 'JPB,Alexa - Come Back.mp3', '你终于失去了年轻。', '独立音乐', 'u2.jpg', '<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="background-color:#FFFFFF;color:#333333;font-family:&quot;">在流逝的时空之中</span>\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="background-color:#FFFFFF;color:#333333;font-family:&quot;">你终于失去了年轻</span>\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="color:#333333;font-family:&quot;background-color:#FFFFFF;">那些冲动和不安</span>\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="color:#333333;font-family:&quot;background-color:#FFFFFF;">刻画了今天的苦痛</span>\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="color:#333333;font-family:&quot;background-color:#FFFFFF;">在灰暗的记忆里面</span>\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="color:#333333;font-family:&quot;background-color:#FFFFFF;">你曾经呼喊着光明</span>\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="color:#333333;font-family:&quot;background-color:#FFFFFF;">那些标语和口号撕开了生命的裂缝</span>\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="color:#333333;font-family:&quot;background-color:#FFFFFF;">奔腾的风没有能吹醒昏睡的人们</span>\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="color:#333333;font-family:&quot;background-color:#FFFFFF;">抑郁的心渐渐地变得苍老而胆怯</span>\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="background-color:#FFFFFF;color:#333333;font-family:&quot;">你不想知道广场上那红旗歌颂的是谁</span>\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="background-color:#FFFFFF;color:#333333;font-family:&quot;">你只是看到血干的地方矗立着青春的纪念碑</span>\n</p>', '1', '2018-05-15 18:42:02', '1', '1204927037@qq.com', '时光'),
('6', '依旧是疲惫的心情沧桑的眼睛', '曹方 - 觉醒.mp3', '我相信，这呼喊有回声。', '摇滚', 'u6.jpg', '<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">闭上眼睛就能想象到：</span><br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">七八十年代北京的一个冬天，裹着劣质棉衣，叼上一根烟。</span><br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">呵一口气也是雾，吐一口烟也是雾。</span><br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">烟雾缭绕里说着生活说着尊严。</span><br />\r\n<br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;"><strong>如今一个人也流浪在地球另一边，没有烟没有酒，只有自己。</strong></span>', '1', '2018-05-15 18:13:35', '1', '1204927037@qq.com', '时光'),
('7', '一腔孤勇', 'Thousand Foot Krutch - Take It Out On Me.mp3', '当你回头望向远方，就这么轻易的让人心底的忧愁都消散在了风的嘶鸣以及鸟雀的欢愉中。', '流行', 'u7.jpg', '<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">在那时，我们在意路上匆忙的人群、在意明媚午后、在意自己是否时髦、以及在意脑海里的所有肆意妄为。在今天，这样一个信息快速且泛滥的时代里，我们再也找不回一整张专辑翻来覆去的听得稀巴烂的状态，只剩下回味里假想的脉脉温情，以及对未来充满着暴力色彩的急切渴求与期盼。在这么多年过去后，我们依然沒有得到自己想要的,可好像這一切也沒有那么糟。</span><br />\r\n<br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;"><strong>音乐无非就两种，一种是浮在表面的，而另一种则是渗人灵魂的。感谢所有曾经在黑夜中给予我们孤独的灵魂以安抚的声音。</strong></span>', '1', '2018-05-15 18:20:08', '1', '1204927037@qq.com', '时光'),
('5', '盛大的告别', 'Lube - Календарь.mp3', '仿佛逝去的不再是悲伤，而迎来的将永远是明天的冻土上白色的阳光。', '摇滚', 'u5.jpg', '<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">白桦林边,苍白色的旧伏尔加汽车停靠在破木屋旁，广播里传来正点报时的声音,报时歌曲是莫斯科郊外的晚上。这时音乐响起，我们和着这郁郁悲歌、和着这浓烈的伏特加酒、和着这雪原中铺开的桦林、和着这冬日照耀下的尖顶城镇，那光景像是翻开陈旧相册一样，历历在目。我们高挥起双手，向过去进行一场盛大的告别，仿佛逝去的不再是悲伤，而迎来的将永远是明天的冻土上白色的阳光。</span>', '1', '2018-05-15 18:10:34', '1', '1204927037@qq.com', '时光'),
('1', '仍是异乡人', '墙角先生 - 异乡人 [李健  cover].mp3', '很多时候音乐像是被赋予一种使命感，去扮演某种沟通和连接的角色。', '民谣', 'u1.jpg', '<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	时间总是像很多诗歌里写的那样，是最好的试验剂、最好的磨刀石。在时间面前，很多东西都变得黯然失色，好像没有什么东西可以敌得过时间。能够抚慰人心的、能够撩动心弦的，唯有这些让人心有戚戚的音乐。\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	<br />\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	人和人最大的问题是信任的建立和信任的解除，无论是爱情、友情还是亲情。而我们每一个人内心的问题却是不愿意去面对真实的自己而已。随着岁月必然的转变，我仿佛看到了我们无法回转的叛逆时光、看到了那踽踽独行远去的清凉背影。\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	<br />\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	<strong>异乡里的音色阵阵，喝下这杯酒，管它生还是死。</strong>\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	<br />\r\n</p>\r\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\r\n	<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">从某种角度来看，音乐一定是从民族的情感、个性、共同文化引发出来的，很多时候音乐像是被赋予一种使命感，去扮演某种沟通和连接的角色。</span>\r\n</p>', '1', '2018-05-15 17:53:06', '0', '1204927037@qq.com', '时光'),
('3', '画海', 'Armed For A Crisis - Black Smoke.mp3', '当你遇到那个人的时候，你才能体会到那种感觉。 ', '爵士', 'u3.jpg', '<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">当你遇到那个人的时候，你才能体会到那种感觉。&nbsp;</span><br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;"> &nbsp;</span><br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">就是那种日思夜想辗转反侧，为一双迷人的眼睛着迷，或者偷偷地闻着某人干净的肥皂味道的格子衬衫，或者是偷偷期待那双纤长厚实的手可以把自己的小手握在掌心。&nbsp;</span><br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;"> &nbsp;</span><br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">就是那种电光火石般的火花，那种噬魂彻骨的疯狂，那种把世界一切染上光辉的爱慕，只靠思念和期待就能生存的情愫。&nbsp;</span><br />\r\n<br />\r\n<p>\r\n	<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">你遇见我，我遇见你，这就是全部的意义。我不知道明天会是什么样的，但是我知道此刻我是快乐的。</span> \r\n</p>\r\n<p>\r\n	<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;"><br />\r\n</span> \r\n</p>\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;"><strong>这首音乐包含了爵士、灵魂乐等多种音乐的特征，充满着强烈的浪漫色彩，仿佛在像是在说：停一停，或许会遇见美丽。</strong></span>', '1', '2018-05-15 17:58:40', '0', '1204927037@qq.com', '时光'),
('4', '嬉皮年代', 'Arash - She Makes Me Go (feat. Sean Paul).mp3', '或许我们恐惧的不是眼所见的现实，而是眼所不见的未来。', '摇滚', 'u4.jpg', '<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;"><strong>上世纪六十年代的那些音乐</strong></span><br />\r\n<br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">在那样一个充满爱的年代里，那一代人的青春，因为激情和理想而显得无比漫长。时至半个世纪之后，60年代像一个永不停歇的符号一直敲打着我们的心。他带着最简单的普世梦想、带着尊重和宽容、带着每个人都应拥有的追寻自由的权利，赤裸裸的呈现在我们这一代承受不起的乌托邦梦想里。</span><br />\r\n<br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">总在某个突然的时刻里，我们掌握了真实，但真实稍纵即逝。我们想象和期待中的纵情一跃以及世界大同并未及时到来，我们只好轻轻哼起这些充满着暖色调的音乐，在流年似水里放浪形骸。</span><br />\r\n<br />\r\n<p>\r\n	<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">嬉皮年代，不歇的年代。</span>\r\n</p>', '1', '2018-05-15 18:08:39', '0', '1204927037@qq.com', '时光'),
('11', '我们终将奔赴向前', '赵登凯 - 如你.mp3', '不开心的时候 总会听到这首歌', '民谣', 'a11.jpg', '<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, " font-size:13px;"="">当和煦春风吹拂过细节与平淡的山顶，当往昔的时光洒向林间的湖泊，这温暖如同爱人的怀抱，美好且静默。我们手握着夜间孤芳自赏的花朵，在流离失所的纯白和微妙的纯粹中，用一种自信满满的暖色调涂抹着这世界。</span><br />\r\n<br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, " font-size:13px;"=""><strong>我们终将奔赴向前。</strong></span>', '0', '2018-05-16 20:57:33', '0', '1255394075@qq.com', 'liuqiao666'),
('2', '弄潮', 'Tom Player - Roland Garros Choral Theme.mp3', '似黄粱梦。辞丹凤。明月共。漾孤篷。官冗從。', '流行', 'u10.jpg', '<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">少年侠气，交结五都雄。肝胆洞。毛发耸。立谈中。死生同。一诺千金重。推翘勇。矜豪纵。轻盖拥。联飞鞚。斗城东。轰饮酒垆，春色浮寒瓮。吸海垂虹。闲呼鹰嗾犬，白羽摘雕弓。狡穴俄空。乐匆匆。&nbsp;</span><br />\r\n<br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">似黄粱梦。辞丹凤。明月共。漾孤篷。官冗從。怀倥偬。落尘笼。簿书丛。鹖弁如云众。供粗用。忽奇功。笳鼓动。渔阳弄。思悲翁。不请长缨，系取天骄种。剑吼西风。恨登山临水，手寄七弦桐。目送归鸿。</span><br />\r\n<br />\r\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">- 贺铸（宋）</span>', '1', '2018-05-15 18:45:49', '0', '1204927037@qq.com', '时光'),
('8', '怒放', 'Katja Sommer - Hamburg du bist die schönste Stadt.', '用噪音远离喧嚣，用沉重展示平静。', '流行', 'u11.jpg', '<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">异化世界，寻找影子的交织，</span><br />\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">无论你是否藏匿。</span><br />\n<span style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">我仍是这世界晃来晃去的人。</span>\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	他们用噪音远离喧嚣，他们用沉重展示平静。\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	他们沉溺于忧伤的自恋，他们瓦解于漫长的等待。\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	<br />\n</p>\n<p style="color:#2D2D2D;font-family:Verdana, 微软雅黑, &quot;font-size:13px;">\n	每个人都在面对一种自以为是的精神生活之外的坚硬现实。在内心深处的精神领地里，你是遨游四方的骑士。而在这坚硬的现实里，总让人绕不开对自我价值的怀疑。这种怀疑总是轻易的让懦弱的情绪无限放大，然后在现实与想象的相互映射中，伤花悄然怒放。\n</p>', '1', '2018-05-15 18:49:59', '0', '1204927037@qq.com', '时光'),
('10', '以后的伤口', '林俊杰 - 记得.mp3', '我和你手牵手说要一起 走到最后', '流行', 'u12.jpg', '谁还记得是谁先说 永远的爱我\n以前的一句话是我们 以后的伤口\n过了太久没人记得 当初那些温柔\n我和你手牵手说要一起 走到最后\n我们都忘了 这条路走了多久\n心中是清楚的 有一天 有一天都会停的\n让时间说真话 虽然我也害怕\n在天黑了以后 我们都不知道 会不会有以后\n谁还记得是谁先说 永远的爱我\n以前的一句话是我们 以后的伤口\n过了太久没人记得 当初那些温柔\n我和你手牵手说要一起 走到最后\n我们都累了 却没办法往回走\n两颗心都迷惑 怎么说 怎么说都没有救\n亲爱的为什么 也许你也不懂\n两个相爱的人 等着对方先说 想分开的理由\n谁还记得爱情开始变化的时候\n我和你的眼中看见了 不同的天空\n走得太远终于走到 分岔路的路口\n是不是你和我 要有两个 相反的梦\n谁还记得是谁先说 永远的爱我\n以前的一句话是我们 以后的伤口\n过了太久没人记得 当初那些温柔\n我和你手牵手说要一起 走到最后\n我和你手牵手说要一起 走到最后', '0', '2018-05-15 19:04:04', '0', '1255394075@qq.com', 'liuqiao666');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(32) DEFAULT NULL COMMENT '用户名称 用户的名称',
  `userpassword` varchar(32) DEFAULT NULL COMMENT '用户密码 用户的密码',
  `email` varchar(225) DEFAULT NULL COMMENT '用户邮箱 用户的邮箱',
  `image` varchar(50) DEFAULT NULL COMMENT '用户头像 用户的头像',
  `status` decimal(1,0) DEFAULT NULL COMMENT '激活码状态 状态，0-未激活，1-已激活',
  `sex` varchar(32) DEFAULT NULL COMMENT '性别 性别',
  `place` varchar(50) DEFAULT NULL COMMENT '籍贯 籍贯',
  `integral` varchar(32) DEFAULT '20' COMMENT '积分 用户的积分',
  `address` varchar(225) DEFAULT NULL COMMENT '收货信息 用户的收货信息地址',
  `myself` varchar(225) DEFAULT NULL COMMENT '自我介绍'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户信息 用户信息';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`username`, `userpassword`, `email`, `image`, `status`, `sex`, `place`, `integral`, `address`, `myself`) VALUES
('liuqiao666', '666666', '1255394075@qq.com', 'portfolio2.jpg', '1', '女', '四川成都', '995', '四川省成都市郫县电子科技大学成都学院百叶路1号', '看万般喜乐纷至沓来'),
('时光', 'yxjmmm', '1204927037@qq.com', 'lj.jpg', '1', '女', '成都', '2040', '13981712815+电子科技大学成都学院百叶路1号', '时光不老，我们不散^-^');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
