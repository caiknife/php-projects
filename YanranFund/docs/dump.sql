/*
SQLyog Ultimate v8.32 
MySQL - 5.5.24 : Database - yanran_fund
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `ablocks` */

DROP TABLE IF EXISTS `ablocks`;

CREATE TABLE `ablocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `content_cn` text,
  `content_en` text,
  `sort` int(4) DEFAULT NULL,
  `is_editable` tinyint(1) DEFAULT '1',
  `is_deletable` tinyint(1) DEFAULT '1',
  `is_display` tinyint(1) DEFAULT '0',
  `type` varchar(40) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `ablocks` */

LOCK TABLES `ablocks` WRITE;

insert  into `ablocks`(`id`,`created`,`modified`,`title_cn`,`title_en`,`content_cn`,`content_en`,`sort`,`is_editable`,`is_deletable`,`is_display`,`type`,`is_show`) values (1,'2012-08-22 01:10:37','2012-10-29 20:08:22','嫣然天使基金简介','About smile angel','<div>\r\n	<div>\r\n		<p>\r\n			嫣然天使基金始于一个动人的故事，因为一个叫李嫣的小女孩的诞生，作为她的父母,李亚鹏、王菲夫妇发起了中国成立了唯一一个为唇腭裂儿童提供全额免费手术的中国慈善基金——嫣然天使基金。\r\n		</p>\r\n		<p>\r\n			我们坚持品位高度和文化底蕴——在文化艺术推广和儿童教育方面不断探索、寻找合作伙伴，期望通过这种方式，关注并支持儿童内心世界的成长，丰富他们的人生，并为其职业生涯发展提供支持和帮助。\r\n		</p>\r\n		<p>\r\n			我们是高度自给自足的非营利机构。帮助儿童是我们的信仰，因为他们就是未来。\r\n		</p>\r\n		<p>\r\n			在嫣然天使基金成立第六年，嫣然天使儿童医院是中国第一家为公众提供高质量医疗服务的私立非营利性儿童综合医院。医院提供一流的儿童医疗服务，致力于对中国贫困儿童进行救助，为中国儿童医疗改革事业探索和践行。\r\n		</p>\r\n	</div>\r\n</div>','<div>\r\n	<div>\r\n		<p>\r\n			嫣然天使基金始于一个动人的故事，因为一个叫李嫣的小女孩的诞生，作为她的父母,李亚鹏、王菲夫妇发起了中国成立了唯一一个为唇腭裂儿童提供全额免费手术的中国慈善基金——嫣然天使基金。\r\n		</p>\r\n		<p>\r\n			我们坚持品位高度和文化底蕴——在文化艺术推广和儿童教育方面不断探索、寻找合作伙伴，期望通过这种方式，关注并支持儿童内心世界的成长，丰富他们的人生，并为其职业生涯发展提供支持和帮助。\r\n		</p>\r\n		<p>\r\n			我们是高度自给自足的非营利机构。帮助儿童是我们的信仰，因为他们就是未来。\r\n		</p>\r\n		<p>\r\n			在嫣然天使基金成立第六年，嫣然天使儿童医院是中国第一家为公众提供高质量医疗服务的私立非营利性儿童综合医院。医院提供一流的儿童医疗服务，致力于对中国贫困儿童进行救助，为中国儿童医疗改革事业探索和践行。\r\n		</p>\r\n	</div>\r\n</div>\r\n<br />',0,1,1,1,NULL,1),(2,'2012-08-22 01:11:16','2012-08-29 13:37:31','“天使之旅”简介','Angel tour','<div>\r\n	<div>\r\n		<p>\r\n			嫣然天使基金与全国6个城市的8个定点医院合作，为贫困唇腭裂患儿提供免费的手术治疗。即便\r\n如此，还是有不少患儿因为无法负担来往定点医院的路费，不得不放弃接受治疗。为了让这部分患儿也能够得到救助，2007年8月4日嫣然天使基金医疗队正式\r\n宣布成立。医疗队召集专业的志愿者医生，以“天使之旅”的形式寻找患儿，每年前往偏远地区，赴当地为唇腭裂患儿进行手术治疗。\r\n		</p>\r\n		<p>\r\n			四年多的时间，嫣然天使基金“天使之旅——把爱传出去”医疗救助行动总行程超过 43000\r\n 公里，跨越了四川、新疆、西藏、内蒙古、黑龙江和海南等省份，为超过 320 \r\n名边远地区的唇腭裂患儿实施了手术。2009年新疆喀什和西藏阿里救助行动，创下了中国慈善救助医疗行程最长的新纪录，成为建国以来海拔最高、行程最远、\r\n接受救助人数最多的一次慈善公益行动。\r\n		</p>\r\n		<p>\r\n			嫣然天使基金“天使之旅”医疗队现有超过70位行业内顶尖的医疗专家志愿者志愿者，每年选择一到两个偏远贫困地区，为这些地区的患儿免费提供唇腭裂手术治疗。\r\n		</p>\r\n	</div>\r\n</div>','<div>\r\n	<div>\r\n		<p>\r\n			嫣然天使基金与全国6个城市的8个定点医院合作，为贫困唇腭裂患儿提供免费的手术治疗。即便\r\n如此，还是有不少患儿因为无法负担来往定点医院的路费，不得不放弃接受治疗。为了让这部分患儿也能够得到救助，2007年8月4日嫣然天使基金医疗队正式\r\n宣布成立。医疗队召集专业的志愿者医生，以“天使之旅”的形式寻找患儿，每年前往偏远地区，赴当地为唇腭裂患儿进行手术治疗。\r\n		</p>\r\n		<p>\r\n			四年多的时间，嫣然天使基金“天使之旅——把爱传出去”医疗救助行动总行程超过 43000\r\n 公里，跨越了四川、新疆、西藏、内蒙古、黑龙江和海南等省份，为超过 320 \r\n名边远地区的唇腭裂患儿实施了手术。2009年新疆喀什和西藏阿里救助行动，创下了中国慈善救助医疗行程最长的新纪录，成为建国以来海拔最高、行程最远、\r\n接受救助人数最多的一次慈善公益行动。\r\n		</p>\r\n		<p>\r\n			嫣然天使基金“天使之旅”医疗队现有超过70位行业内顶尖的医疗专家志愿者志愿者，每年选择一到两个偏远贫困地区，为这些地区的患儿免费提供唇腭裂手术治疗。\r\n		</p>\r\n	</div>\r\n</div>\r\n<br />',1,1,1,1,NULL,1),(3,'2012-08-22 01:11:38','2012-08-23 19:04:05','嫣然团队','Angel team','','',2,0,0,1,'team',1);

UNLOCK TABLES;

/*Table structure for table `administrators` */

DROP TABLE IF EXISTS `administrators`;

CREATE TABLE `administrators` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT '0000-00-00 00:00:00',
  `modified` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) DEFAULT '0',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `administrators` */

LOCK TABLES `administrators` WRITE;

insert  into `administrators`(`id`,`created`,`modified`,`deleted`,`username`,`password`,`last_login_time`,`last_login_ip`) values (1,'0000-00-00 00:00:00','2012-08-05 03:31:33',0,'admin','21232f297a57a5a743894a0e4a801fc3','2012-08-05 03:31:33','127.0.0.1'),(2,'0000-00-00 00:00:00','2012-10-29 19:24:19',0,'caiknife','c4dba9494baa43b818187f60c062f01c','2012-10-29 19:24:19','127.0.0.1');

UNLOCK TABLES;

/*Table structure for table `albums` */

DROP TABLE IF EXISTS `albums`;

CREATE TABLE `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `sort` int(4) DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `albums` */

LOCK TABLES `albums` WRITE;

insert  into `albums`(`id`,`created`,`modified`,`is_display`,`sort`,`title_cn`,`title_en`,`banner_file_path`) values (1,'2012-08-22 21:03:11','2012-08-29 20:28:18',1,0,'相册1','Album1','503e092f-a188-4266-94da-06dcf2b3ee62.jpg'),(2,'2012-08-22 22:09:56','2012-08-22 23:17:39',1,1,'相册2','Album2','5034f802-f3c8-42d4-9be8-0564f2b3ee62.jpg');

UNLOCK TABLES;

/*Table structure for table `donations` */

DROP TABLE IF EXISTS `donations`;

CREATE TABLE `donations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `content_cn` text,
  `content_en` text,
  `sort` int(4) DEFAULT NULL,
  `is_editable` tinyint(1) DEFAULT '1',
  `is_deletable` tinyint(1) DEFAULT '1',
  `is_display` tinyint(1) DEFAULT '0',
  `type` varchar(40) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `donations` */

LOCK TABLES `donations` WRITE;

insert  into `donations`(`id`,`created`,`modified`,`title_cn`,`title_en`,`content_cn`,`content_en`,`sort`,`is_editable`,`is_deletable`,`is_display`,`type`,`is_show`) values (1,'2012-08-21 23:04:18','2012-10-29 20:17:30','捐款方式','Donation Methods','<div class=\"plat\">\r\n						<h3>银行捐款 <span>嫣然天使基金捐赠账户 <em class=\"font_red\">汇款请注明：嫣然天使基金</em></span></h3>\r\n						<table class=\"tab_1\" style=\"margin-bottom:10px\">\r\n							<tr>\r\n								<th>账户户名：</th>\r\n								<td>中国红十字基金会</td>\r\n							</tr>\r\n							<tr>\r\n								<th>人民币开户银行：<br />账号：</th>\r\n								<td>中国银行北京市分行<br />349356004919</td>\r\n							</tr>\r\n							<tr>\r\n								<th>人民币开户银行：<br />账号：</th>\r\n								<td>中国工商银行北京东四南支行<br />0200001019014483874</td>\r\n							</tr>\r\n							<tr>\r\n								<th>人民币开户银行：<br />账号：</th>\r\n								<td>中国建设银行北京朝内大街支行<br />11001070300059000427</td>\r\n							</tr>\r\n							<tr>\r\n								<th>外币开户银行：<br />账号：</th>\r\n								<td>中国银行<br />800100086608091014</td>\r\n							</tr>\r\n						</table>\r\n						<span class=\"font_gray\">温馨提示：<br />银行汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。</span>\r\n					</div>\r\n					<hr />\r\n					<div class=\"plat\">\r\n						<h3>邮局捐款 <span>中国红十字基金会 <em class=\"font_red\">汇款请注明：嫣然天使基金</em></span></h3>\r\n						<table class=\"tab_1\" style=\"margin-bottom:10px\">\r\n							<tr>\r\n								<th>地址：<br />邮编：</th>\r\n								<td>北京市东城区东单北大街 干面胡同53号<br />100010</td>\r\n							</tr>\r\n						</table>\r\n						<span class=\"font_gray\">温馨提示：<br />  邮局汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。<br />此外，请务必在您的汇款单附言栏中标明您的捐赠序列号。</span>\r\n					</div>','<div class=\"plat\">\r\n						<h3>银行捐款 <span>嫣然天使基金捐赠账户 <em class=\"font_red\">汇款请注明：嫣然天使基金</em></span></h3>\r\n						<table class=\"tab_1\" style=\"margin-bottom:10px\">\r\n							<tr>\r\n								<th>账户户名：</th>\r\n								<td>中国红十字基金会</td>\r\n							</tr>\r\n							<tr>\r\n								<th>人民币开户银行：<br />账号：</th>\r\n								<td>中国银行北京市分行<br />349356004919</td>\r\n							</tr>\r\n							<tr>\r\n								<th>人民币开户银行：<br />账号：</th>\r\n								<td>中国工商银行北京东四南支行<br />0200001019014483874</td>\r\n							</tr>\r\n							<tr>\r\n								<th>人民币开户银行：<br />账号：</th>\r\n								<td>中国建设银行北京朝内大街支行<br />11001070300059000427</td>\r\n							</tr>\r\n							<tr>\r\n								<th>外币开户银行：<br />账号：</th>\r\n								<td>中国银行<br />800100086608091014</td>\r\n							</tr>\r\n						</table>\r\n						<span class=\"font_gray\">温馨提示：<br />银行汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。</span>\r\n					</div>\r\n					<hr />\r\n					<div class=\"plat\">\r\n						<h3>邮局捐款 <span>中国红十字基金会 <em class=\"font_red\">汇款请注明：嫣然天使基金</em></span></h3>\r\n						<table class=\"tab_1\" style=\"margin-bottom:10px\">\r\n							<tr>\r\n								<th>地址：<br />邮编：</th>\r\n								<td>北京市东城区东单北大街 干面胡同53号<br />100010</td>\r\n							</tr>\r\n						</table>\r\n						<span class=\"font_gray\">温馨提示：<br />  邮局汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。<br />此外，请务必在您的汇款单附言栏中标明您的捐赠序列号。</span>\r\n					</div>',1,1,1,1,NULL,1),(2,'2012-08-21 23:05:01','2012-10-29 20:17:30','月捐计划','Monthly Donation','<div class=\"plat font_14\">\r\n						<h3>工商银行-嫣然天使基金灵通卡（借记卡）</h3>\r\n						<p>为动员、汇聚更多的社会力量救助唇腭裂患儿，使更多的孩子拥有微笑的权利，中国工商银行携手嫣然天使基金，面向广大热衷公益、慈善事业的爱心人士浓情推出中国工商银行——嫣然天使基金灵通卡，您每成功申领一张嫣然天使基金灵通卡，工商银行将向嫣然天使基金捐款0.1元。</p>\r\n						<p>我们同步推出便捷的嫣然天使基金月捐公益服务，通过此服务，您即可按月、自动向嫣然天使基金捐助固定金额的款项，无论多少。日积月累，聚少成多，将您的点滴爱心化作一缕阳光，照亮更多灿烂的笑脸。\r\n为慈善注入智慧，让公益在您身边，让我们携手一起把爱传出去！</p>\r\n					</div>\r\n					<hr />\r\n					<div class=\"plat font_14\">\r\n						<h3>嫣然天使基金与腾讯公益推出的月捐计划</h3>\r\n						<p>此月捐计划是由腾讯公益慈善基金会与嫣然天使基金共同发起的，致力于为唇腭裂儿童患者提供医疗救治，并在教育、生存条件和精神富足等方面关爱儿童成长的项目。</p>\r\n						\r\n						<p>据有关部门统计，中国有240万唇腭裂患者。唇腭裂是最常见的先天畸形之一。根据我国出生缺陷检测中心对全国466所医院每年40万-70万新生儿的检测结果显示，1988年-1992年非综合性唇腭裂发生率为1.625‰，其中唇裂发生率为1.4‰、腭裂发生率为0.225‰。</p>    \r\n						\r\n						<p>腾讯号召网友参与本项目，为救助唇腭裂儿童尽一份力，同时为回馈爱心网友，每月还将抽取5名幸运网友，每人获得王菲录制的《爱笑的天使》非卖品光盘一张。</p>\r\n						\r\n						<p>欢迎大家加入腾讯公益慈善基金会与嫣然天使基金共同发起的月捐计划：<br />\r\n							<a href=\"http://gongyi.qq.com/loveplan/wangjuanyanran/\" target=\"_blank\">http://gongyi.qq.com/loveplan/wangjuanyanran/</a></p>\r\n					</div>','<div class=\"plat font_14\">\r\n						<h3>工商银行-嫣然天使基金灵通卡（借记卡）</h3>\r\n						<p>为动员、汇聚更多的社会力量救助唇腭裂患儿，使更多的孩子拥有微笑的权利，中国工商银行携手嫣然天使基金，面向广大热衷公益、慈善事业的爱心人士浓情推出中国工商银行——嫣然天使基金灵通卡，您每成功申领一张嫣然天使基金灵通卡，工商银行将向嫣然天使基金捐款0.1元。</p>\r\n						<p>我们同步推出便捷的嫣然天使基金月捐公益服务，通过此服务，您即可按月、自动向嫣然天使基金捐助固定金额的款项，无论多少。日积月累，聚少成多，将您的点滴爱心化作一缕阳光，照亮更多灿烂的笑脸。\r\n为慈善注入智慧，让公益在您身边，让我们携手一起把爱传出去！</p>\r\n					</div>\r\n					<hr />\r\n					<div class=\"plat font_14\">\r\n						<h3>嫣然天使基金与腾讯公益推出的月捐计划</h3>\r\n						<p>此月捐计划是由腾讯公益慈善基金会与嫣然天使基金共同发起的，致力于为唇腭裂儿童患者提供医疗救治，并在教育、生存条件和精神富足等方面关爱儿童成长的项目。</p>\r\n						\r\n						<p>据有关部门统计，中国有240万唇腭裂患者。唇腭裂是最常见的先天畸形之一。根据我国出生缺陷检测中心对全国466所医院每年40万-70万新生儿的检测结果显示，1988年-1992年非综合性唇腭裂发生率为1.625‰，其中唇裂发生率为1.4‰、腭裂发生率为0.225‰。</p>    \r\n						\r\n						<p>腾讯号召网友参与本项目，为救助唇腭裂儿童尽一份力，同时为回馈爱心网友，每月还将抽取5名幸运网友，每人获得王菲录制的《爱笑的天使》非卖品光盘一张。</p>\r\n						\r\n						<p>欢迎大家加入腾讯公益慈善基金会与嫣然天使基金共同发起的月捐计划：<br />\r\n							<a href=\"http://gongyi.qq.com/loveplan/wangjuanyanran/\" target=\"_blank\">http://gongyi.qq.com/loveplan/wangjuanyanran/</a></p>\r\n					</div>',0,1,1,1,NULL,1);

UNLOCK TABLES;

/*Table structure for table `enterprises` */

DROP TABLE IF EXISTS `enterprises`;

CREATE TABLE `enterprises` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `sort` int(4) DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `enterprises` */

LOCK TABLES `enterprises` WRITE;

insert  into `enterprises`(`id`,`created`,`modified`,`sort`,`title_cn`,`title_en`,`url`,`banner_file_path`) values (1,'2012-08-21 15:49:08','2012-08-21 16:01:35',1,'中文标题','英文标题','http://weibo.com/caiknife','50334006-6850-4362-9e7f-0434f2b3ee62.jpg'),(2,'2012-08-21 15:53:54','2012-08-21 16:01:35',0,'中文标题','英文标题','http://www.google.com','50333e92-f200-4894-9f44-0434f2b3ee62.jpg'),(3,'2012-08-21 16:37:07','2012-08-21 16:37:07',NULL,'中文标题','英文标题',NULL,'503348b3-3d40-4f32-b091-0434f2b3ee62.jpg');

UNLOCK TABLES;

/*Table structure for table `form_helps` */

DROP TABLE IF EXISTS `form_helps`;

CREATE TABLE `form_helps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_viewed` tinyint(1) DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthday` varchar(40) DEFAULT NULL,
  `weight` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `post` varchar(20) DEFAULT NULL,
  `tel` varchar(40) DEFAULT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  `residence` varchar(100) DEFAULT NULL,
  `gurdian` varchar(40) DEFAULT NULL,
  `relation` varchar(40) DEFAULT NULL,
  `sick_type` varchar(255) DEFAULT NULL,
  `sick_operation` varchar(255) DEFAULT NULL,
  `sick_history` varchar(255) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `form_helps` */

LOCK TABLES `form_helps` WRITE;

insert  into `form_helps`(`id`,`created`,`modified`,`is_viewed`,`name`,`gender`,`birthday`,`weight`,`city`,`address`,`post`,`tel`,`mobile`,`residence`,`gurdian`,`relation`,`sick_type`,`sick_operation`,`sick_history`,`comment`) values (1,'2012-08-26 18:07:22','2012-10-26 10:53:59',1,'CaiKnife','男','2012-08-04','111111',NULL,'etqweqwe','56363','34572342134','123234235','农户','74576456','dfgdfsdfw','唇裂 ','唇裂修补 ','无',NULL),(2,'2012-08-28 20:04:37','2012-08-28 20:04:37',0,'1','男','1','1',NULL,'11','1','1','1','非农','1','1','唇裂 ','唇裂修补 ','有','1'),(3,'2012-08-29 15:53:57','2012-08-29 15:53:57',0,'f','Male','2012-08-09','f',NULL,'asds','w','fqwe','e','非农','qwe','r','cheilopalatognathus','harelip repair','Yes','qweqrqwre'),(4,'2012-10-28 14:40:14','2012-10-28 14:59:06',1,'1','男','2012-10-03','2',NULL,'3','4','5','6','农户','7','8','唇裂 ','唇裂修补 ','有','');

UNLOCK TABLES;

/*Table structure for table `form_hospitals` */

DROP TABLE IF EXISTS `form_hospitals`;

CREATE TABLE `form_hospitals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_viewed` tinyint(1) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `patients_amount` varchar(100) DEFAULT NULL,
  `operation_amount` varchar(100) DEFAULT NULL,
  `period` varchar(100) DEFAULT NULL,
  `fee_amount` varchar(100) DEFAULT NULL,
  `discount_amount` varchar(100) DEFAULT NULL,
  `comment` text,
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `form_hospitals` */

LOCK TABLES `form_hospitals` WRITE;

insert  into `form_hospitals`(`id`,`created`,`modified`,`is_viewed`,`title`,`name`,`tel`,`mobile`,`email`,`patients_amount`,`operation_amount`,`period`,`fee_amount`,`discount_amount`,`comment`,`banner_file_path`) values (1,'2012-08-26 17:52:45','2012-08-26 22:34:21',1,'tttt','vvvv','gggf','adas','bbbb','wwww','fff','nnnn','qqq','gggq','qweqrasd','5039f166-4464-4878-858b-0390f2b3ee62.rar'),(2,'2012-08-28 18:23:11','2012-08-28 18:23:11',0,'asdf','qer','qwe','q111','1111','1111','2222','2222','2222','1111','',''),(3,'2012-08-28 19:10:46','2012-08-28 19:10:46',0,'aaa','aaa','aaa','aaa','aaa','aaa','aaa','aaa','aaa','aaa','',''),(4,'2012-08-28 19:12:03','2012-08-28 19:12:03',0,'aa','aa','aa','aa','aa','aa','aa','aa','aa','aa','',''),(5,'2012-08-29 16:18:42','2012-08-29 16:18:42',0,'a','a','a','a','a','a','a','a','a','a','a','');

UNLOCK TABLES;

/*Table structure for table `form_volunteers` */

DROP TABLE IF EXISTS `form_volunteers`;

CREATE TABLE `form_volunteers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_viewed` tinyint(1) DEFAULT '0',
  `identity` varchar(100) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `race` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `post` varchar(20) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `work_history` text,
  `has_sick` varchar(10) DEFAULT NULL,
  `has_sick_comment` text,
  `has_volunteer` varchar(10) DEFAULT NULL,
  `has_volunteer_comment` text,
  `service` text,
  `service_term` text,
  `service_time` text,
  `via` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `form_volunteers` */

LOCK TABLES `form_volunteers` WRITE;

insert  into `form_volunteers`(`id`,`created`,`modified`,`is_viewed`,`identity`,`name`,`gender`,`age`,`race`,`city`,`address`,`post`,`tel`,`mobile`,`job`,`email`,`degree`,`education`,`work_history`,`has_sick`,`has_sick_comment`,`has_volunteer`,`has_volunteer_comment`,`service`,`service_term`,`service_time`,`via`) values (1,'2012-08-26 16:21:37','2012-08-26 16:21:37',1,'','','男','','',NULL,'','','','','','','小学','主要教育经历',NULL,'有','','','',NULL,NULL,NULL,NULL),(2,'2012-08-26 16:53:29','2012-08-26 22:24:04',1,'uqyweiur','asjdhqfj','男','vmnsadkj','laskljf',NULL,'aosidoqiwe','qpowe','aksj','ifuqi','kaskj','lkjf','中学','qiuweoiruo','asfkjaslk','无','vaasdqwe','无','asdqweb','办公室工作，翻译(tttt)，其他(呵呵呵)','半年，其他(qqweqwr)','周二，周四','其他(sdgwqeqweqwr)'),(3,'2012-08-26 16:54:23','2012-08-26 16:54:23',0,'','','男','','',NULL,'','','','','','','小学','主要教育经历','','','','','',NULL,NULL,'',NULL);

UNLOCK TABLES;

/*Table structure for table `hblocks` */

DROP TABLE IF EXISTS `hblocks`;

CREATE TABLE `hblocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `content_cn` text,
  `content_en` text,
  `sort` int(4) DEFAULT NULL,
  `is_editable` tinyint(1) DEFAULT '1',
  `is_deletable` tinyint(1) DEFAULT '1',
  `is_display` tinyint(1) DEFAULT '0',
  `type` varchar(40) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `hblocks` */

LOCK TABLES `hblocks` WRITE;

insert  into `hblocks`(`id`,`created`,`modified`,`title_cn`,`title_en`,`content_cn`,`content_en`,`sort`,`is_editable`,`is_deletable`,`is_display`,`type`,`is_show`) values (1,'2012-08-21 23:04:18','2012-10-29 19:58:17','申请须知及提交','Application notices & submission','<div class=\"plat\">\r\n						<h3>申报须知</h3>\r\n						<ol>\r\n                            <li>一、资助对象\r\n								<p>嫣然天使基金的资助对象为家庭贫困身患唇腭裂的患者，患者法定监护人可作为申请人向嫣然天使基金申请资助。</p></li>\r\n                            <li>二、资助原则\r\n								<ol>\r\n									<li>量入为出：根据接收捐款情况确定资助名额；</li>\r\n									<li>全额资助：承担全部医疗费用；</li>\r\n									<li>功能恢复：只负担唇腭裂患者唇腭裂的功能恢复缝合手术。</li>\r\n								</ol>\r\n							</li>\r\n                            <li>三、申请程序\r\n								<ol>\r\n									<li>申请人需通过中国红十字基金会官方网站下载嫣然天使基金求助申请表，在完全理解《嫣然天使基金申请须知》的前提下，<br />填写表格（包括以下内容）：\r\n										<ol>\r\n											<li>患者身份证明文件复印件；\r\n											<li>如属患儿，还需提供患儿法定监护人的关系证明文件；</li>\r\n											<li>患者或患儿法定监护人填写的嫣然天使基金资助申请表；</li>\r\n											<li>患者在县级以上医疗机构的初步体检报告；</li>\r\n											<li>持非农业户口的2岁以下的贫困家庭的唇腭裂患儿，需在城镇街道办事处以上行政机构出具的家庭经济状况证明。</li>\r\n										</ol>\r\n									</li>\r\n									<li>申请资料报送中国红十字基金会嫣然天使基金项目管理办公室</li>\r\n								</ol>\r\n							</li>\r\n                            <li>四、体检\r\n								<p>患者或患者法定监护人在完全理解嫣然天使基金资助告知书的内容后，需到当地县级以上医疗机构进行与唇腭裂手术相关的初步检查，并出具体检报告。以下为唇腭裂手术禁忌症，体检报告应涵盖以下内容：</p>\r\n								<ol>\r\n                                	<li>唇裂的手术禁忌症：\r\n										<ol class=\"c2\">\r\n											<li>患儿的体重少于5kg；</li>\r\n											<li>血红蛋白低于10g/100ml；</li>\r\n											<li>白细胞计数高于104/mm<sup>3</sup>或凝血功能异常；</li>\r\n											<li>患儿的年龄小于10周；</li>\r\n											<li>患者有急性感染、感冒、上呼吸道感染；</li>\r\n											<li>患者有消化道疾病；</li>\r\n											<li>面部、口周及耳鼻咽喉部有炎症疾患；</li>\r\n											<li>扁桃体过大可能影响手术后呼吸者；</li>\r\n											<li>患者不能耐受全麻手术。</li>\r\n										</ol>\r\n									</li>\r\n                                	<li>腭裂的手术禁忌症：\r\n										<ol class=\"c2\">\r\n											<li>患儿的体重少于5kg</li>\r\n											<li>血红蛋白低于10g/100ml；</li>\r\n											<li>白细胞计数高于104/mm<sup>3</sup>或凝血功能异常；</li>\r\n											<li>患儿的年龄小于10周；</li>\r\n											<li>患儿有急性感染、感冒、上呼吸道感染；</li>\r\n											<li>患者有消化道疾病；</li>\r\n											<li>面部、口周及耳鼻咽喉部有炎症疾患；</li>\r\n											<li>扁桃体过大可能影响手术后呼吸者；</li>\r\n											<li>患者胸腺肥大；</li>\r\n											<li>患者不能耐受全麻手术。</li>\r\n										</ol>\r\n									</li>\r\n								</ol>\r\n							</li>\r\n                            <li>五、审批程序\r\n								<ol>\r\n									<li>初审<br />\r\n										嫣然天使基金资助管理办公室对患者的申请资料进行初审后，会同定点医院对患者进行全面的术前检查、排除手术禁忌症、部分患者会诊，形成基本的医治方案，连同患者或患者法定监护人签署的手术知情同意书一并提交嫣然天使基金管理委员会审批。</li>\r\n									<li>审批<br />\r\n										嫣然天使基金管理委员会根据资助原则对患者进行综合评审，确定资助对象和资助金额。</li>\r\n									<li>公示<br />\r\n										获资助对象名单将在中国红十字基金会官方网站进行公示。</li> \r\n								</ol>	\r\n							</li>\r\n                            <li>六、入院治疗\r\n								<p>患者接到中国红十字基金会嫣然天使基金办公室电话通知后，到指定医院入院治疗。</p>\r\n							</li>\r\n                            <li>七、特别约定\r\n								<p>因嫣然天使基金为患者提供的是慈善手术，医患双方特作此约定。定点医院为患者提供免费治疗的时间段截止至患者的病情相对稳定或患者符合出院指征。且该时间段由定点医院根据患者的病情提出建议，嫣然天使基金管理委员会作出最终决定。</p></li>\r\n                            <li>八、最终解释权\r\n								<p>以上所有条款最终解释权属嫣然天使基金管理委员会。</p></li>\r\n                        </ol>\r\n					</div>\r\n					<div class=\"plat\">\r\n						<h3>网上申请求助</h3>\r\n						<p class=\"font_14\">确认已经阅读和知悉了以上全部条款，并同意所有申报规定。</p>\r\n						<p class=\"font_14\">你可以通过一下2种方式提交申请，提交后我们将尽快与您取得联系。</p>\r\n						<p class=\"font_14\"><a class=\"btn1 fancybox\" href=\"#HelpApply\"><span>在线申请</span></a> 或 <a class=\"btn1\" href=\"#\"><span>申请表下载</span></a> 发送至：<a href=\"mailto:info@smileangelfoundation.org\" target=\"_blank\">info@smileangelfoundation.org</a></p>\r\n					</div>','<div class=\"plat\">\r\n						<h3>申报须知</h3>\r\n						<ol>\r\n                            <li>一、资助对象\r\n								<p>嫣然天使基金的资助对象为家庭贫困身患唇腭裂的患者，患者法定监护人可作为申请人向嫣然天使基金申请资助。</p></li>\r\n                            <li>二、资助原则\r\n								<ol>\r\n									<li>量入为出：根据接收捐款情况确定资助名额；</li>\r\n									<li>全额资助：承担全部医疗费用；</li>\r\n									<li>功能恢复：只负担唇腭裂患者唇腭裂的功能恢复缝合手术。</li>\r\n								</ol>\r\n							</li>\r\n                            <li>三、申请程序\r\n								<ol>\r\n									<li>申请人需通过中国红十字基金会官方网站下载嫣然天使基金求助申请表，在完全理解《嫣然天使基金申请须知》的前提下，<br />填写表格（包括以下内容）：\r\n										<ol>\r\n											<li>患者身份证明文件复印件；\r\n											<li>如属患儿，还需提供患儿法定监护人的关系证明文件；</li>\r\n											<li>患者或患儿法定监护人填写的嫣然天使基金资助申请表；</li>\r\n											<li>患者在县级以上医疗机构的初步体检报告；</li>\r\n											<li>持非农业户口的2岁以下的贫困家庭的唇腭裂患儿，需在城镇街道办事处以上行政机构出具的家庭经济状况证明。</li>\r\n										</ol>\r\n									</li>\r\n									<li>申请资料报送中国红十字基金会嫣然天使基金项目管理办公室</li>\r\n								</ol>\r\n							</li>\r\n                            <li>四、体检\r\n								<p>患者或患者法定监护人在完全理解嫣然天使基金资助告知书的内容后，需到当地县级以上医疗机构进行与唇腭裂手术相关的初步检查，并出具体检报告。以下为唇腭裂手术禁忌症，体检报告应涵盖以下内容：</p>\r\n								<ol>\r\n                                	<li>唇裂的手术禁忌症：\r\n										<ol class=\"c2\">\r\n											<li>患儿的体重少于5kg；</li>\r\n											<li>血红蛋白低于10g/100ml；</li>\r\n											<li>白细胞计数高于104/mm<sup>3</sup>或凝血功能异常；</li>\r\n											<li>患儿的年龄小于10周；</li>\r\n											<li>患者有急性感染、感冒、上呼吸道感染；</li>\r\n											<li>患者有消化道疾病；</li>\r\n											<li>面部、口周及耳鼻咽喉部有炎症疾患；</li>\r\n											<li>扁桃体过大可能影响手术后呼吸者；</li>\r\n											<li>患者不能耐受全麻手术。</li>\r\n										</ol>\r\n									</li>\r\n                                	<li>腭裂的手术禁忌症：\r\n										<ol class=\"c2\">\r\n											<li>患儿的体重少于5kg</li>\r\n											<li>血红蛋白低于10g/100ml；</li>\r\n											<li>白细胞计数高于104/mm<sup>3</sup>或凝血功能异常；</li>\r\n											<li>患儿的年龄小于10周；</li>\r\n											<li>患儿有急性感染、感冒、上呼吸道感染；</li>\r\n											<li>患者有消化道疾病；</li>\r\n											<li>面部、口周及耳鼻咽喉部有炎症疾患；</li>\r\n											<li>扁桃体过大可能影响手术后呼吸者；</li>\r\n											<li>患者胸腺肥大；</li>\r\n											<li>患者不能耐受全麻手术。</li>\r\n										</ol>\r\n									</li>\r\n								</ol>\r\n							</li>\r\n                            <li>五、审批程序\r\n								<ol>\r\n									<li>初审<br />\r\n										嫣然天使基金资助管理办公室对患者的申请资料进行初审后，会同定点医院对患者进行全面的术前检查、排除手术禁忌症、部分患者会诊，形成基本的医治方案，连同患者或患者法定监护人签署的手术知情同意书一并提交嫣然天使基金管理委员会审批。</li>\r\n									<li>审批<br />\r\n										嫣然天使基金管理委员会根据资助原则对患者进行综合评审，确定资助对象和资助金额。</li>\r\n									<li>公示<br />\r\n										获资助对象名单将在中国红十字基金会官方网站进行公示。</li> \r\n								</ol>	\r\n							</li>\r\n                            <li>六、入院治疗\r\n								<p>患者接到中国红十字基金会嫣然天使基金办公室电话通知后，到指定医院入院治疗。</p>\r\n							</li>\r\n                            <li>七、特别约定\r\n								<p>因嫣然天使基金为患者提供的是慈善手术，医患双方特作此约定。定点医院为患者提供免费治疗的时间段截止至患者的病情相对稳定或患者符合出院指征。且该时间段由定点医院根据患者的病情提出建议，嫣然天使基金管理委员会作出最终决定。</p></li>\r\n                            <li>八、最终解释权\r\n								<p>以上所有条款最终解释权属嫣然天使基金管理委员会。</p></li>\r\n                        </ol>\r\n					</div>\r\n					<div class=\"plat\">\r\n						<h3>网上申请求助</h3>\r\n						<p class=\"font_14\">确认已经阅读和知悉了以上全部条款，并同意所有申报规定。</p>\r\n						<p class=\"font_14\">你可以通过一下2种方式提交申请，提交后我们将尽快与您取得联系。</p>\r\n						<p class=\"font_14\"><a class=\"btn1 fancybox\" href=\"#HelpApply\"><span>在线申请</span></a> 或 <a class=\"btn1\" href=\"#\"><span>申请表下载</span></a> 发送至：<a href=\"mailto:info@smileangelfoundation.org\" target=\"_blank\">info@smileangelfoundation.org</a></p>\r\n					</div>',0,1,0,1,'apply',1),(2,'2012-08-21 23:05:01','2012-10-29 19:58:15','咨询热线','Consult Hotline','<div>\r\n	<div>\r\n		<div>\r\n			<h3>\r\n				银行捐款 <span>嫣然天使基金捐赠账户 <em>汇款请注明：嫣然天使基金</em></span>\r\n			</h3>\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<th>\r\n							账户户名：\r\n						</th>\r\n						<td>\r\n							中国红十字基金会\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国银行北京市分行<br />\r\n349356004919\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国工商银行北京东四南支行<br />\r\n0200001019014483874\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国建设银行北京朝内大街支行<br />\r\n11001070300059000427\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							外币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国银行<br />\r\n800100086608091014\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n<span>温馨提示：<br />\r\n银行汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。</span> \r\n		</div>\r\n		<hr />\r\n		<div>\r\n			<h3>\r\n				邮局捐款 <span>中国红十字基金会 <em>汇款请注明：嫣然天使基金</em></span>\r\n			</h3>\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<th>\r\n							地址：<br />\r\n邮编：\r\n						</th>\r\n						<td>\r\n							北京市东城区东单北大街 干面胡同53号<br />\r\n100010\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n<span>温馨提示：<br />\r\n邮局汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。<br />\r\n此外，请务必在您的汇款单附言栏中标明您的捐赠序列号。</span> \r\n		</div>\r\n	</div>\r\n</div>','<div>\r\n	<div>\r\n		<div>\r\n			<h3>\r\n				银行捐款 <span>嫣然天使基金捐赠账户 <em>汇款请注明：嫣然天使基金</em></span>\r\n			</h3>\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<th>\r\n							账户户名：\r\n						</th>\r\n						<td>\r\n							中国红十字基金会\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国银行北京市分行<br />\r\n349356004919\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国工商银行北京东四南支行<br />\r\n0200001019014483874\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国建设银行北京朝内大街支行<br />\r\n11001070300059000427\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							外币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国银行<br />\r\n800100086608091014\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n<span>温馨提示：<br />\r\n银行汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。</span> \r\n		</div>\r\n		<hr />\r\n		<div>\r\n			<h3>\r\n				邮局捐款 <span>中国红十字基金会 <em>汇款请注明：嫣然天使基金</em></span>\r\n			</h3>\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<th>\r\n							地址：<br />\r\n邮编：\r\n						</th>\r\n						<td>\r\n							北京市东城区东单北大街 干面胡同53号<br />\r\n100010\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n<span>温馨提示：<br />\r\n邮局汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。<br />\r\n此外，请务必在您的汇款单附言栏中标明您的捐赠序列号。</span> \r\n		</div>\r\n	</div>\r\n</div>',2,1,1,1,NULL,1),(3,'2012-08-22 00:33:42','2012-10-29 19:58:16','常见问题答疑','FAQ','<div>\r\n	<div>\r\n		<div>\r\n			<h3>\r\n				银行捐款 <span>嫣然天使基金捐赠账户 <em>汇款请注明：嫣然天使基金</em></span>\r\n			</h3>\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<th>\r\n							账户户名：\r\n						</th>\r\n						<td>\r\n							中国红十字基金会\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国银行北京市分行<br />\r\n349356004919\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国工商银行北京东四南支行<br />\r\n0200001019014483874\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国建设银行北京朝内大街支行<br />\r\n11001070300059000427\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							外币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国银行<br />\r\n800100086608091014\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n<span>温馨提示：<br />\r\n银行汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。</span> \r\n		</div>\r\n		<hr />\r\n		<div>\r\n			<h3>\r\n				邮局捐款 <span>中国红十字基金会 <em>汇款请注明：嫣然天使基金</em></span>\r\n			</h3>\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<th>\r\n							地址：<br />\r\n邮编：\r\n						</th>\r\n						<td>\r\n							北京市东城区东单北大街 干面胡同53号<br />\r\n100010\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n<span>温馨提示：<br />\r\n邮局汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。<br />\r\n此外，请务必在您的汇款单附言栏中标明您的捐赠序列号。</span> \r\n		</div>\r\n	</div>\r\n</div>','<div>\r\n	<div>\r\n		<div>\r\n			<h3>\r\n				银行捐款 <span>嫣然天使基金捐赠账户 <em>汇款请注明：嫣然天使基金</em></span>\r\n			</h3>\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<th>\r\n							账户户名：\r\n						</th>\r\n						<td>\r\n							中国红十字基金会\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国银行北京市分行<br />\r\n349356004919\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国工商银行北京东四南支行<br />\r\n0200001019014483874\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							人民币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国建设银行北京朝内大街支行<br />\r\n11001070300059000427\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<th>\r\n							外币开户银行：<br />\r\n账号：\r\n						</th>\r\n						<td>\r\n							中国银行<br />\r\n800100086608091014\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n<span>温馨提示：<br />\r\n银行汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。</span> \r\n		</div>\r\n		<hr />\r\n		<div>\r\n			<h3>\r\n				邮局捐款 <span>中国红十字基金会 <em>汇款请注明：嫣然天使基金</em></span>\r\n			</h3>\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<th>\r\n							地址：<br />\r\n邮编：\r\n						</th>\r\n						<td>\r\n							北京市东城区东单北大街 干面胡同53号<br />\r\n100010\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n<span>温馨提示：<br />\r\n邮局汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。<br />\r\n此外，请务必在您的汇款单附言栏中标明您的捐赠序列号。</span> \r\n		</div>\r\n	</div>\r\n</div>\r\n<br />',1,1,1,1,NULL,1);

UNLOCK TABLES;

/*Table structure for table `help_attachments` */

DROP TABLE IF EXISTS `help_attachments`;

CREATE TABLE `help_attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `banner_file_path` varchar(255) DEFAULT NULL,
  `banner_file_name` varchar(255) DEFAULT NULL,
  `help_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Data for the table `help_attachments` */

LOCK TABLES `help_attachments` WRITE;

insert  into `help_attachments`(`id`,`created`,`modified`,`type`,`banner_file_path`,`banner_file_name`,`help_id`) values (1,'2012-10-28 13:36:38','2012-10-28 13:36:38',0,'508cc465-c1a0-46ef-ada5-0978f2b3ee62.png','体重.png',NULL),(2,'2012-10-28 13:38:09','2012-10-28 13:38:09',0,'508cc4bf-6284-4ca2-bc63-0978f2b3ee62.png','体重.png',NULL),(3,'2012-10-28 13:53:05','2012-10-28 13:53:05',0,'508cc83e-014c-4b0a-a7dd-0978f2b3ee62.png','体重.png',NULL),(4,'2012-10-28 13:54:15','2012-10-28 13:54:15',0,'508cc884-6c04-4b29-ad05-0978f2b3ee62.png','体重.png',NULL),(5,'2012-10-28 13:54:57','2012-10-28 13:54:57',0,'508cc8af-3c70-4ee7-b7ee-0978f2b3ee62.png','体重.png',NULL),(6,'2012-10-28 13:56:09','2012-10-28 13:56:09',0,'508cc8f6-4580-4632-8a8f-0978f2b3ee62.png','体重.png',NULL),(7,'2012-10-28 13:58:30','2012-10-28 13:58:30',0,'508cc984-1558-4c97-94b6-0978f2b3ee62.png','体重.png',NULL),(8,'2012-10-28 13:59:07','2012-10-28 13:59:07',0,'508cc9a9-8f34-498c-8a77-0978f2b3ee62.png','体重.png',NULL),(9,'2012-10-28 14:00:31','2012-10-28 14:00:31',0,'508cc9fc-ed18-4d1a-ad05-0978f2b3ee62.png','体重.png',NULL),(10,'2012-10-28 14:01:30','2012-10-28 14:01:30',0,'508cca3a-43e4-4425-9206-0978f2b3ee62.jpg','624c9621jw1duajnpmszxj.jpg',NULL),(11,'2012-10-28 14:01:33','2012-10-28 14:01:33',0,'508cca3a-08c0-49cf-a76e-0978f2b3ee62.png','体重.png',NULL),(12,'2012-10-28 14:01:38','2012-10-28 14:01:38',1,'508cca42-f6d4-4a28-8c2c-0978f2b3ee62.jpg','624c9621jw1duajnpmszxj.jpg',NULL),(13,'2012-10-28 14:01:41','2012-10-28 14:01:41',1,'508cca42-6ec0-4fb0-94da-0978f2b3ee62.png','体重.png',NULL),(14,'2012-10-28 14:01:49','2012-10-28 14:01:49',2,'508cca4d-57ec-4562-aade-0978f2b3ee62.jpg','59.jpg',NULL),(15,'2012-10-28 14:01:52','2012-10-28 14:01:52',2,'508cca4d-d9b4-44d8-8fd9-0978f2b3ee62.png','体重.png',NULL),(16,'2012-10-28 14:01:59','2012-10-28 14:01:59',3,'508cca56-ee2c-4a51-91d8-0978f2b3ee62.jpg','59.jpg',NULL),(17,'2012-10-28 14:02:01','2012-10-28 14:02:01',3,'508cca57-ae78-479c-acb3-0978f2b3ee62.png','体重.png',NULL),(18,'2012-10-28 14:09:41','2012-10-28 14:09:41',0,'508ccc25-2310-44d4-a142-0978f2b3ee62.jpg','624c9621jw1duajnpmszxj.jpg',NULL),(19,'2012-10-28 14:09:43','2012-10-28 14:09:43',0,'508ccc25-4c14-4a8e-86f2-0978f2b3ee62.png','体重.png',NULL),(20,'2012-10-28 14:12:36','2012-10-28 14:12:36',0,'508cccd2-979c-46fe-bece-0978f2b3ee62.png','体重.png',NULL),(21,'2012-10-28 14:13:56','2012-10-28 14:13:56',0,'508ccd22-c868-4819-8470-0978f2b3ee62.png','体重.png',NULL),(22,'2012-10-28 14:17:00','2012-10-28 14:17:00',0,'508ccdda-bad8-4036-8d5d-0978f2b3ee62.png','体重.png',NULL),(23,'2012-10-28 14:19:42','2012-10-28 14:19:42',0,'508cce7c-03cc-4743-b486-0978f2b3ee62.png','体重.png',NULL),(24,'2012-10-28 14:21:58','2012-10-28 14:21:58',0,'508ccf03-dcf0-4030-8e4c-0978f2b3ee62.png','体重.png',NULL),(25,'2012-10-28 14:39:41','2012-10-28 14:39:41',0,'508cd32a-3054-4d94-b347-0978f2b3ee62.png','体重.png',4),(26,'2012-10-28 14:39:43','2012-10-28 14:39:43',1,'508cd32d-d39c-4dde-9220-0978f2b3ee62.png','体重.png',4),(27,'2012-10-28 14:39:46','2012-10-28 14:39:46',2,'508cd32f-422c-49be-8d53-0978f2b3ee62.png','体重.png',4),(28,'2012-10-28 14:39:48','2012-10-28 14:39:48',3,'508cd332-68c8-4ef1-aab3-0978f2b3ee62.png','体重.png',4),(29,'2012-10-28 14:39:51','2012-10-28 14:39:51',4,'508cd334-c620-4a1a-b710-0978f2b3ee62.png','体重.png',4),(30,'2012-10-28 14:39:54','2012-10-28 14:39:54',5,'508cd337-3c10-436b-9adf-0978f2b3ee62.png','体重.png',4),(31,'2012-10-28 18:41:34','2012-10-28 18:41:34',0,'508d0bd1-65e4-4b5e-8c25-080cf2b3ee62.png','D3.png',NULL),(32,'2012-10-28 18:48:27','2012-10-28 18:48:27',0,'508d0d7b-0780-4e56-adc0-080cf2b3ee62.jpg','624c9621jw1duajnpmszxj.jpg',NULL),(33,'2012-10-28 18:48:39','2012-10-28 18:48:39',0,'508d0d7b-69b0-4bf7-bc16-080cf2b3ee62.png','D3.png',NULL),(34,'2012-10-28 18:48:40','2012-10-28 18:48:40',0,'508d0d87-ffd0-440d-8e96-080cf2b3ee62.jpg','59.jpg',NULL),(35,'2012-10-28 18:48:42','2012-10-28 18:48:42',0,'508d0d88-ea70-4305-9a1b-080cf2b3ee62.PNG','体重 - 副本.PNG',NULL),(36,'2012-10-28 18:48:45','2012-10-28 18:48:45',0,'508d0d8a-0ae8-4b02-a0b4-080cf2b3ee62.png','体重.png',NULL),(37,'2012-10-28 18:50:08','2012-10-28 18:50:08',1,'508d0de0-5484-4cf3-bb9e-080cf2b3ee62.png','PHP设计模式指南中文版.png',NULL);

UNLOCK TABLES;

/*Table structure for table `hospitals` */

DROP TABLE IF EXISTS `hospitals`;

CREATE TABLE `hospitals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `desc_cn` text,
  `desc_en` text,
  `content_cn` text,
  `content_en` text,
  `sort` int(4) DEFAULT NULL,
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `hospitals` */

LOCK TABLES `hospitals` WRITE;

insert  into `hospitals`(`id`,`created`,`modified`,`is_display`,`title_cn`,`title_en`,`desc_cn`,`desc_en`,`content_cn`,`content_en`,`sort`,`banner_file_path`) values (1,'2012-08-21 14:37:02','2012-08-24 13:04:58',1,'标题标题标题','标题标题标题','标题\r\n标题\r\n标题\r\n','标题\r\n标题\r\n标题\r\n','标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>','标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n<br />',1,'50333338-904c-46d0-8637-0434f2b3ee62.jpg'),(2,'2012-08-21 15:05:33','2012-08-24 13:04:58',1,'标题标题标题','标题标题标题','标题\r\n标题\r\n标题\r\n','标题\r\n标题\r\n标题\r\n','标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>','标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>\r\n标题\r\n<div>\r\n</div>',0,'50333347-db9c-42e0-8b7f-0434f2b3ee62.jpg'),(3,'2012-08-24 13:03:58','2012-08-24 13:03:58',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'2012-09-02 13:25:53','2012-09-02 13:28:31',1,'标题标题标题','titletitletitle','标题标题标题','titletitletitle','标题标题标题<br />','titletitletitle<br />',NULL,'5042ee7f-bfe8-46fd-a58c-0960f2b3ee62.jpg');

UNLOCK TABLES;

/*Table structure for table `logos` */

DROP TABLE IF EXISTS `logos`;

CREATE TABLE `logos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `banner_file_path` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `sort` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `logos` */

LOCK TABLES `logos` WRITE;

insert  into `logos`(`id`,`created`,`modified`,`title_cn`,`title_en`,`url`,`banner_file_path`,`project_id`,`sort`) values (4,'2012-08-29 20:56:02','2012-08-29 20:56:04',NULL,NULL,NULL,'503e1162-f3fc-4eaa-ba54-06dcf2b3ee62.jpg',6,0),(5,'2012-08-29 20:56:03','2012-08-29 20:56:04',NULL,NULL,NULL,'503e1163-8108-4b39-9130-06dcf2b3ee62.jpg',6,1),(6,'2012-08-29 20:56:04','2012-08-29 20:56:04',NULL,NULL,NULL,'503e1163-de34-4e5a-b81b-06dcf2b3ee62.jpg',6,2);

UNLOCK TABLES;

/*Table structure for table `medias` */

DROP TABLE IF EXISTS `medias`;

CREATE TABLE `medias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `lang` varchar(10) DEFAULT 'cn',
  `title` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `media_date` varchar(40) DEFAULT NULL,
  `banner_file_path` varchar(255) DEFAULT NULL,
  `banner_file_size` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `medias` */

LOCK TABLES `medias` WRITE;

insert  into `medias`(`id`,`created`,`modified`,`is_display`,`lang`,`title`,`source`,`media_date`,`banner_file_path`,`banner_file_size`) values (1,'2012-08-20 16:53:34','2012-10-16 18:21:30',1,'cn','新浪微博新浪微博新浪微博新浪微博新浪微博新浪微博','新浪微博','2012-10-31 09:26','507d352a-2684-4e46-acb0-0ad4f2b3ee62.docx','10.0 KB'),(2,'2012-08-20 17:19:29','2012-09-02 14:19:01',1,'en','新浪微博新浪微博新浪微博新浪微博新浪微博新浪微博','新浪微博','2012-09-30 00:00','5042fa55-aaf8-4792-a476-0960f2b3ee62.pdf','691.4 KB'),(3,'2012-10-19 15:10:52','2012-10-19 15:23:58',1,'cn','新浪微博新浪微博新浪微博新浪微博新浪微博新浪微博','新浪微博','2012-11-05 00:00','5081000e-2560-412a-89d2-09b8f2b3ee62.docx','10.0 KB'),(4,'2012-10-26 12:19:44','2012-10-26 12:20:15',1,'cn','新浪微博新浪微博新浪微博新浪微博新浪微博新浪微博','新浪微博','2012-10-06 00:00','508a0f7f-ec1c-4448-bda6-09e4f2b3ee62.zip','22.9 KB');

UNLOCK TABLES;

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `banner_file_path` varchar(255) DEFAULT NULL,
  `lang` varchar(10) DEFAULT 'cn',
  `has_video` tinyint(1) DEFAULT '0',
  `is_public` tinyint(1) DEFAULT '1',
  `public_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `news` */

LOCK TABLES `news` WRITE;

insert  into `news`(`id`,`created`,`modified`,`is_display`,`title`,`content`,`banner_file_path`,`lang`,`has_video`,`is_public`,`public_date`) values (1,'2012-08-20 14:53:21','2012-08-20 15:51:26',1,'测试测试测试测试测试','<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>\r\n<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>\r\n<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>\r\n<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>\r\n<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>\r\n<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>','5031e883-0b6c-47d4-b9b4-0514f2b3ee62.jpg','cn',1,1,'2012-08-20 15:56:06'),(3,'2012-08-20 15:51:53','2012-08-20 15:51:55',1,'测试测试测试测试测试','',NULL,'cn',0,1,'2012-08-20 15:56:06'),(4,'2012-08-20 15:51:58','2012-08-20 15:52:00',1,'测试测试测试测试测试','',NULL,'cn',0,1,'2012-08-20 15:56:06'),(5,'2012-08-20 15:53:07','2012-10-19 12:15:17',1,'测试测试测试测试测试','asdqwegfasdagasdf','50389257-d854-437a-8e39-0434f2b3ee62.jpg','cn',0,1,'2012-10-13 00:00:00'),(6,'2012-08-20 15:53:14','2012-08-25 14:38:54',1,'时尚与爱心的结盟——嫣然天使基金获得时尚品牌JAVECE慈善晚宴捐款','<div>\r\n	<p>\r\n		2011年3月19日下午，由<strong>中国红十字基金会嫣然天使基金</strong>携手<strong>北京创盈科技产业集团</strong>（下\r\n称“创盈集团”）共同举办的“斯利安天使行动”启动仪式在北京财富公馆财富会隆重举行。中国红十字会总会党组副书记、副会长，中国红十字基金会理事长郭长\r\n江，中国红十字基金会副秘书长黑德昆、嫣然天使基金发起人李亚鹏和王菲夫妇、创盈集团董事长易斌等出席了启动仪式。有关专家学者、各界公益人士、新孕妈\r\n妈、育龄女性、新婚夫妇代表以及百余家媒体记者亲临现场，共同见证了这次爱心大行动。此项旨在关爱母婴健康、预防出生缺陷的“斯利安天使行动” \r\n所派发的药物及保健品均由创盈集团捐赠，总价值5000万元人民币。\r\n	</p>\r\n	<p>\r\n		启动仪式上，郭长江理事长代表中国红十字基金会接受了易斌董事长递交的捐赠牌，李亚鹏宣讲了嫣然天使基金的爱心愿景及此次“斯利安天使行动”的宗旨，希望此行动能够使更多的人关爱母婴健康、预防出生缺陷，并表示嫣然天使基金将不遗余力地向患者提供唇腭裂医疗救助。\r\n	</p>\r\n	<p align=\"center\">\r\n		<img src=\"file://C:/Users/CaiKnife/Desktop/%E5%BC%80%E5%8F%91/%E5%B9%B2%E6%B4%BB/%E5%AB%A3%E7%84%B6%E5%9F%BA%E9%87%91/%E5%AB%A3%E7%84%B6%E5%9F%BA%E9%87%91_120820/front/images/newsDetail_01.jpg\" height=\"366\" width=\"539\" /><br />\r\n嫣然天使基金代表与JAVECE创始人、捐赠人共同合影\r\n	</p>\r\n	<p>\r\n		嫣然天使基金是由李亚鹏、王菲夫妇发起，在中国红十字基金会管理和支持下的唇腭裂专项救助基金。成立四年多来，以为唇腭裂患儿提供医疗救\r\n助和改善其生存环境为使命。不但持续为唇腭裂患者提供全额免费修复手术，而且还在儿童教育、精神辅导等方面关注儿童成长，帮助更多孩子实现美丽的梦想，迄\r\n今为止，嫣然天使基金已为超过8000名患儿实施了全额免费手术。\r\n	</p>\r\n</div>','503872fd-14dc-491e-a5b4-0434f2b3ee62.jpg','cn',0,1,'2012-08-25 14:38:53'),(7,NULL,NULL,1,NULL,NULL,NULL,'cn',0,1,NULL),(8,NULL,NULL,1,NULL,NULL,NULL,'cn',0,1,NULL),(9,NULL,NULL,1,NULL,NULL,NULL,'cn',0,1,NULL),(10,NULL,NULL,1,NULL,NULL,NULL,'cn',0,1,NULL),(11,NULL,NULL,1,NULL,NULL,NULL,'cn',0,1,NULL),(12,NULL,NULL,1,NULL,NULL,NULL,'cn',0,1,NULL),(13,NULL,NULL,1,NULL,NULL,NULL,'cn',0,1,NULL),(14,NULL,NULL,1,NULL,NULL,NULL,'cn',0,1,NULL),(15,NULL,NULL,1,NULL,NULL,NULL,'cn',0,1,NULL),(16,NULL,NULL,1,NULL,NULL,NULL,'cn',0,1,NULL),(17,'2012-10-19 11:08:41','2012-10-19 11:08:41',0,NULL,NULL,NULL,'cn',0,1,NULL),(18,'2012-10-19 11:20:50','2012-10-19 11:20:50',1,NULL,NULL,NULL,'cn',0,1,NULL),(19,'2012-10-19 15:17:02','2012-10-19 15:17:02',0,NULL,NULL,NULL,'cn',0,1,NULL),(20,'2012-10-19 15:17:22','2012-10-19 15:17:22',0,NULL,NULL,NULL,'cn',0,1,NULL),(21,'2012-10-26 12:12:10','2012-10-26 12:12:10',0,NULL,NULL,NULL,'cn',0,1,NULL);

UNLOCK TABLES;

/*Table structure for table `news_project` */

DROP TABLE IF EXISTS `news_project`;

CREATE TABLE `news_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `news_project` */

LOCK TABLES `news_project` WRITE;

insert  into `news_project`(`id`,`created`,`modified`,`news_id`,`project_id`) values (3,'2012-08-22 18:04:34','2012-08-22 18:04:34',6,1),(4,'2012-08-22 18:05:22','2012-08-22 18:05:22',6,5),(6,'2012-08-22 18:12:50','2012-08-22 18:12:50',6,6),(7,'2012-08-25 16:52:20','2012-08-25 16:52:20',5,1),(8,'2012-08-25 16:52:23','2012-08-25 16:52:23',5,5),(9,'2012-08-25 16:52:26','2012-08-25 16:52:26',5,6);

UNLOCK TABLES;

/*Table structure for table `pblocks` */

DROP TABLE IF EXISTS `pblocks`;

CREATE TABLE `pblocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `content_cn` text,
  `content_en` text,
  `sort` int(4) DEFAULT NULL,
  `is_editable` tinyint(1) DEFAULT '1',
  `is_deletable` tinyint(1) DEFAULT '1',
  `is_display` tinyint(1) DEFAULT '0',
  `type` varchar(40) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `pblocks` */

LOCK TABLES `pblocks` WRITE;

insert  into `pblocks`(`id`,`created`,`modified`,`title_cn`,`title_en`,`content_cn`,`content_en`,`sort`,`is_editable`,`is_deletable`,`is_display`,`type`,`is_show`) values (1,'2012-08-22 01:04:14','2012-08-22 01:04:19','企业伙伴','Corporate collaborators','','',NULL,1,0,1,'enterprise',1),(2,'2012-08-22 01:04:20','2012-10-29 20:06:40','个人伙伴','Individual collaborators','','',NULL,1,0,1,'personal',1);

UNLOCK TABLES;

/*Table structure for table `persons` */

DROP TABLE IF EXISTS `persons`;

CREATE TABLE `persons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `sort` int(4) DEFAULT NULL,
  `type` int(4) DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `slogan_cn` varchar(255) DEFAULT NULL,
  `slogan_en` varchar(255) DEFAULT NULL,
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `persons` */

LOCK TABLES `persons` WRITE;

insert  into `persons`(`id`,`created`,`modified`,`sort`,`type`,`title_cn`,`title_en`,`slogan_cn`,`slogan_en`,`banner_file_path`) values (2,'2012-08-21 16:41:59','2012-08-21 16:42:34',0,1,'中文标题','英文标题','中文口号','英文口号','503349fa-6550-436a-b6ec-0434f2b3ee62.jpg'),(3,'2012-08-21 16:42:24','2012-08-21 16:42:24',NULL,1,'中文标题','英文标题','中文口号','英文口号','503349f0-b680-402e-9627-0434f2b3ee62.jpg'),(4,'2012-08-21 19:43:50','2012-08-21 19:43:50',NULL,1,'中文标题','英文标题','中文口号','英文口号','50337476-0310-4f1d-86d3-0434f2b3ee62.jpg'),(5,'2012-08-21 19:44:34','2012-08-21 19:44:34',NULL,1,'中文标题','英文标题','中文口号','英文口号','503374a2-71ac-434d-8d29-0434f2b3ee62.jpg'),(6,'2012-08-21 19:44:46','2012-10-19 14:44:45',1,2,'abc','cbd','中文口号','英文口号','503374ae-0678-4a5b-b668-0434f2b3ee62.jpg'),(7,'2012-08-21 19:44:59','2012-08-23 19:06:22',0,2,'中文标题','英文标题','中文口号','英文口号','503374ba-2314-4c98-a0a2-0434f2b3ee62.jpg');

UNLOCK TABLES;

/*Table structure for table `photo_project` */

DROP TABLE IF EXISTS `photo_project`;

CREATE TABLE `photo_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `photo_project` */

LOCK TABLES `photo_project` WRITE;

insert  into `photo_project`(`id`,`created`,`modified`,`photo_id`,`project_id`) values (4,'2012-08-22 23:10:23','2012-08-22 23:10:23',10,1),(5,'2012-08-22 23:10:49','2012-08-22 23:10:49',10,5),(6,'2012-08-22 23:12:14','2012-08-22 23:12:14',10,6);

UNLOCK TABLES;

/*Table structure for table `photos` */

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `sort` int(4) DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

/*Data for the table `photos` */

LOCK TABLES `photos` WRITE;

insert  into `photos`(`id`,`created`,`modified`,`sort`,`title_cn`,`title_en`,`album_id`,`banner_file_path`) values (9,'2012-08-22 22:10:02','2012-08-22 23:17:23',0,'1','11',2,'5034e839-f390-435c-b06c-0564f2b3ee62.jpg'),(10,'2012-08-22 22:10:07','2012-08-22 23:17:23',2,'222222','22',2,'5034f46e-7008-44f7-9404-0564f2b3ee62.jpg'),(11,'2012-08-22 23:16:39','2012-08-22 23:17:23',1,NULL,NULL,2,'5034f7d6-8e58-4746-b0d0-0564f2b3ee62.jpg'),(12,'2012-08-22 23:16:44','2012-08-22 23:17:23',3,NULL,NULL,2,'5034f7da-9e94-4bdc-babd-0564f2b3ee62.jpg'),(13,'2012-08-22 23:17:23','2012-08-22 23:17:23',4,NULL,NULL,2,'5034f802-f3c8-42d4-9be8-0564f2b3ee62.jpg'),(49,'2012-08-29 20:21:00','2012-08-29 20:28:17',2,NULL,NULL,1,'503e092b-a358-4afb-8579-06dcf2b3ee62.jpg'),(50,'2012-08-29 20:21:02','2012-08-29 20:28:17',6,NULL,NULL,1,'503e092d-f328-48dc-9464-06dcf2b3ee62.jpg'),(51,'2012-08-29 20:21:03','2012-08-29 20:28:17',3,NULL,NULL,1,'503e092e-ada4-4d9f-96ab-06dcf2b3ee62.jpg'),(52,'2012-08-29 20:21:04','2012-08-29 20:28:17',4,NULL,NULL,1,'503e092f-a188-4266-94da-06dcf2b3ee62.jpg'),(53,'2012-08-29 20:24:52','2012-08-29 20:28:17',1,NULL,NULL,1,'503e0a13-3904-464e-b2c6-06dcf2b3ee62.jpg'),(54,'2012-08-29 20:25:00','2012-08-29 20:28:17',0,NULL,NULL,1,'503e0a1c-3a5c-4da1-8d46-06dcf2b3ee62.jpg'),(55,'2012-08-29 20:27:01','2012-08-29 20:28:17',5,NULL,NULL,1,'503e0a94-b92c-45fa-be64-06dcf2b3ee62.jpg'),(56,'2012-08-29 20:27:01','2012-08-29 20:28:17',7,NULL,NULL,1,'503e0a95-53ac-4cdd-ab2c-06dcf2b3ee62.jpg'),(57,'2012-08-29 20:27:02','2012-08-29 20:28:17',8,NULL,NULL,1,'503e0a96-8144-4e89-89c0-06dcf2b3ee62.jpg');

UNLOCK TABLES;

/*Table structure for table `plans` */

DROP TABLE IF EXISTS `plans`;

CREATE TABLE `plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `banner_file_path` varchar(255) DEFAULT NULL,
  `lang` varchar(10) DEFAULT 'cn',
  `has_video` tinyint(1) DEFAULT '0',
  `is_public` tinyint(1) DEFAULT '1',
  `public_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `plans` */

LOCK TABLES `plans` WRITE;

insert  into `plans`(`id`,`created`,`modified`,`is_display`,`title`,`content`,`banner_file_path`,`lang`,`has_video`,`is_public`,`public_date`) values (1,'2012-08-20 14:53:21','2012-08-20 22:03:09',1,'测试测试测试测试测试','<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>\r\n<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>\r\n<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>\r\n<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>\r\n<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>\r\n<p>\r\n	测试测试测试测试测试测试测试测试测试\r\n</p>','5032439c-341c-4ff3-b780-0514f2b3ee62.jpg','cn',1,1,'2012-08-20 22:03:08'),(3,'2012-08-20 15:51:53','2012-08-20 22:03:31',1,'测试测试测试测试测试','','503243b3-a090-4293-9325-0514f2b3ee62.jpg','cn',0,1,'2012-08-20 22:03:31'),(4,'2012-08-20 15:51:58','2012-08-20 22:03:41',1,'测试测试测试测试测试','','503243bd-dc00-4acb-b722-0514f2b3ee62.jpg','cn',0,1,'2012-08-20 22:03:41'),(5,'2012-08-20 15:53:07','2012-10-16 14:41:09',1,'时尚与爱心的结盟——嫣然天使基金获得时尚品牌JAVECE慈善晚宴捐款','<div>\r\n	<p>\r\n		2011年3月19日下午，由<strong>中国红十字基金会嫣然天使基金</strong>携手<strong>北京创盈科技产业集团</strong>（下\r\n称“创盈集团”）共同举办的“斯利安天使行动”启动仪式在北京财富公馆财富会隆重举行。中国红十字会总会党组副书记、副会长，中国红十字基金会理事长郭长\r\n江，中国红十字基金会副秘书长黑德昆、嫣然天使基金发起人李亚鹏和王菲夫妇、创盈集团董事长易斌等出席了启动仪式。有关专家学者、各界公益人士、新孕妈\r\n妈、育龄女性、新婚夫妇代表以及百余家媒体记者亲临现场，共同见证了这次爱心大行动。此项旨在关爱母婴健康、预防出生缺陷的“斯利安天使行动” \r\n所派发的药物及保健品均由创盈集团捐赠，总价值5000万元人民币。\r\n	</p>\r\n	<p>\r\n		启动仪式上，郭长江理事长代表中国红十字基金会接受了易斌董事长递交的捐赠牌，李亚鹏宣讲了嫣然天使基金的爱心愿景及此次“斯利安天使行动”的宗旨，希望此行动能够使更多的人关爱母婴健康、预防出生缺陷，并表示嫣然天使基金将不遗余力地向患者提供唇腭裂医疗救助。\r\n	</p>\r\n	<p align=\"center\">\r\n		<img src=\"file://C:/Users/CaiKnife/Desktop/%E5%BC%80%E5%8F%91/%E5%B9%B2%E6%B4%BB/%E5%AB%A3%E7%84%B6%E5%9F%BA%E9%87%91/%E5%AB%A3%E7%84%B6%E5%9F%BA%E9%87%91_120820/front/images/newsDetail_01.jpg\" height=\"366\" width=\"539\" /><br />\r\n嫣然天使基金代表与JAVECE创始人、捐赠人共同合影\r\n	</p>\r\n	<p>\r\n		嫣然天使基金是由李亚鹏、王菲夫妇发起，在中国红十字基金会管理和支持下的唇腭裂专项救助基金。成立四年多来，以为唇腭裂患儿提供医疗救\r\n助和改善其生存环境为使命。不但持续为唇腭裂患者提供全额免费修复手术，而且还在儿童教育、精神辅导等方面关注儿童成长，帮助更多孩子实现美丽的梦想，迄\r\n今为止，嫣然天使基金已为超过8000名患儿实施了全额免费手术。\r\n	</p>\r\n</div>','503243c5-b8e8-462c-b97f-0514f2b3ee62.jpg','cn',0,1,'2012-10-16 14:41:09'),(6,'2012-08-20 15:53:14','2012-08-20 22:03:21',1,'测试测试测试测试测试','','503243a9-064c-4931-86ff-0514f2b3ee62.jpg','cn',0,1,'2012-08-20 22:03:21'),(7,'2012-10-16 14:41:52','2012-10-16 14:41:52',0,NULL,NULL,NULL,'cn',0,1,NULL),(8,'2012-10-16 14:43:00','2012-10-16 14:43:44',1,'时尚与爱心的结盟——嫣然天使基金获得时尚品牌JAVECE慈善晚宴捐款','时尚与爱心的结盟——嫣然天使基金获得时尚品牌JAVECE慈善晚宴捐款','507d0220-86f0-40b0-aba2-0ad4f2b3ee62.jpg','cn',0,1,'2012-10-16 14:43:44'),(9,'2012-10-16 17:54:00','2012-10-16 18:38:41',1,'时尚与爱心的结盟——嫣然天使基金获得时尚品牌JAVECE慈善晚宴捐款','<p style=\"font-size:14px;line-height:23px;text-indent:2em;color:#2B2B2B;font-family:宋体, serif;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;orphans:2;text-align:justify;text-transform:none;white-space:normal;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#FFFFFF;\">\r\n	新华网新加坡10月16日电 新加坡国会15日通过个人信息保护法案，禁止向个人发送市场推广类短信等垃圾信息，违法发送垃圾信息的机构或个人可能会被重罚100万新元（约合514万元人民币）。\r\n</p>\r\n<p style=\"font-size:14px;line-height:23px;text-indent:2em;color:#2B2B2B;font-family:宋体, serif;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;orphans:2;text-align:justify;text-transform:none;white-space:normal;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#FFFFFF;\">\r\n	新法案由新加坡新闻、通讯及艺术部提出，旨在保护个人信息不被盗用或滥用于市场行销等用途。\r\n</p>\r\n<p style=\"font-size:14px;line-height:23px;text-indent:2em;color:#2B2B2B;font-family:宋体, serif;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;orphans:2;text-align:justify;text-transform:none;white-space:normal;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#FFFFFF;\">\r\n	新加坡新闻、通讯及艺术部长雅国说，新法案将增强新加坡作为区域信息处理枢纽的竞争力，也有利于缓解个人信息滥用给新加坡人造成的困扰。\r\n</p>\r\n<p style=\"font-size:14px;line-height:23px;text-indent:2em;color:#2B2B2B;font-family:宋体, serif;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;orphans:2;text-align:justify;text-transform:none;white-space:normal;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#FFFFFF;\">\r\n	新加坡政府将成立个人信息保护署，负责处理这一法案的相关事宜。人们可以在政府建立的名单上注册，机构或个人将被禁止向名单上人员发送垃圾信息。这些信息包括以营销为目的的电话、传真、文字短信和多媒体信息等，也包括通过微信等方式发送的信息，但不包括通过手机应用程序发送的短信息。\r\n</p>\r\n<p style=\"font-size:14px;line-height:23px;text-indent:2em;color:#2B2B2B;font-family:宋体, serif;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;orphans:2;text-align:justify;text-transform:none;white-space:normal;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#FFFFFF;\">\r\n	个人信息保护署可以对违反法案行为施以不超过100万新元（约合人民币514万元）的处罚；向名单中的号码发一条垃圾短信，可能面临最高1万新元（约合人民币5．14万元）罚款。\r\n</p>\r\n<p style=\"font-size:14px;line-height:23px;text-indent:2em;color:#2B2B2B;font-family:宋体, serif;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;orphans:2;text-align:justify;text-transform:none;white-space:normal;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#FFFFFF;\">\r\n	新法案适用于所有私营机构，但不包括公营机构，因为许多政府部门已有比新法案更严格的个人信息保护法。新法案规定，任何机构在收集私人信息时都必须征得信息所属人的同意，并告知收集信息的用途，但不包括用于研究、医疗和新闻用途的信息。\r\n</p>\r\n<p style=\"font-size:14px;line-height:23px;text-indent:2em;color:#2B2B2B;font-family:宋体, serif;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;orphans:2;text-align:justify;text-transform:none;white-space:normal;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#FFFFFF;\">\r\n	新法案将在2013年初生效，2014年年中起正式执行。\r\n</p>','507d2fed-3a5c-4e74-81db-0ad4f2b3ee62.jpg','cn',0,1,'2012-10-16 18:38:41'),(10,'2012-10-19 12:05:54','2012-10-19 12:14:55',1,'时尚与爱心的结盟——嫣然天使基金获得时尚品牌JAVECE慈善晚宴捐款','<p>\r\n	asdqwe\r\n</p>\r\n<p>\r\n	asfqwe\r\n</p>','5080d31a-6eac-4263-bc33-09b8f2b3ee62.jpg','cn',0,1,'2012-11-03 00:00:00'),(11,'2012-10-19 15:18:13','2012-10-19 15:18:13',0,NULL,NULL,NULL,'cn',0,1,NULL);

UNLOCK TABLES;

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `desc_cn` text,
  `desc_en` text,
  `content_cn` text,
  `content_en` text,
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `projects` */

LOCK TABLES `projects` WRITE;

insert  into `projects`(`id`,`created`,`modified`,`is_display`,`title_cn`,`title_en`,`desc_cn`,`desc_en`,`content_cn`,`content_en`,`banner_file_path`) values (1,'2012-08-22 14:50:23','2012-08-22 15:42:52',1,'项目1','项目4','项目1',NULL,'项目1','项目1<br />',NULL),(5,'2012-08-22 17:06:25','2012-08-22 17:06:32',1,'项目2','项目5','',NULL,'','',NULL),(6,'2012-08-22 17:06:34','2012-08-22 17:06:43',1,'项目3','项目6','',NULL,'','',NULL),(7,'2012-10-23 19:51:35','2012-10-23 21:19:57',1,'中文','英文','英文',NULL,'ssssss','ggg<br />','50869973-d8a8-4437-b31a-0ae0f2b3ee62.jpg');

UNLOCK TABLES;

/*Table structure for table `sblocks` */

DROP TABLE IF EXISTS `sblocks`;

CREATE TABLE `sblocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `content_cn` text,
  `content_en` text,
  `sort` int(4) DEFAULT NULL,
  `is_editable` tinyint(1) DEFAULT '1',
  `is_deletable` tinyint(1) DEFAULT '1',
  `is_display` tinyint(1) DEFAULT '0',
  `type` varchar(40) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `sblocks` */

LOCK TABLES `sblocks` WRITE;

insert  into `sblocks`(`id`,`created`,`modified`,`title_cn`,`title_en`,`content_cn`,`content_en`,`sort`,`is_editable`,`is_deletable`,`is_display`,`type`,`is_show`) values (1,'2012-08-22 00:52:53','2012-09-02 13:51:01','医院网上申报','Online submitting','<div class=\"plat\">\r\n						<h3>申报须知</h3>\r\n						<ol>\r\n                            <li>一、申报对象为嫣然天使基金定点合作医疗机构</li>\r\n                            <li>二、结算周期为每季度结算一次</li>\r\n                            <li>三、申报日期为下一季度第一个月15日之前</li>\r\n                            <li>四、申报流程：\r\n								<ol>\r\n                                	<li>网上申请，须上传本季度费用结算申请、结算统计表和患者病例资料</li>\r\n                                	<li>资料审批，嫣然天使基金办公室将根据资料对患者家庭进行回访</li>\r\n                                	<li>问题核实，回访过程中，针对患者家庭反馈的问题，进行问题核实</li>\r\n                                	<li>申报红基会，全部资料核实无误后，递交中国红十字基金会报审</li>\r\n                                	<li>款项拨付，由红基会财务直接拨付合作医院\r\n								</ol>\r\n							</li>\r\n                            <li>五、申报红基会，须提交的材料：\r\n								<ol>\r\n									<li>结算申请、结算统计表、账号信息，加盖公章</li>\r\n									<li>原始凭证，须提供费用收取明细</li> \r\n								</ol>	\r\n							</li>\r\n                            <li>六、所有申报资料须保证其真实性和完整性；</li>\r\n                            <li>七、嫣然天使基金办公室负责所有申报资料的审核和建档工作；</li>\r\n                            <li>八、对申报资料中出现的虚假、伪造或隐瞒等行为，一经发现，评审办公室将不予资助。</li>\r\n                        </ol>\r\n					</div>\r\n					<div class=\"plat\">\r\n						<h3>网上申请求助</h3>\r\n						<p class=\"font_14\">确认已经阅读和知悉了以上全部条款，并同意所有申报规定。</p>\r\n						<p class=\"font_14\">你可以通过一下2种方式提交申请，提交后我们将尽快与您取得联系。</p>\r\n						<p class=\"font_14\"><a class=\"btn1 fancybox\" href=\"#HospitalApply\"><span>在线申请</span></a> 或 <a class=\"btn1\" href=\"#\"><span>申请表下载</span></a> 发送至：<a href=\"mailto:info@smileangelfoundation.org\" target=\"_blank\">info@smileangelfoundation.org</a></p>\r\n					</div>','<div class=\"plat\">\r\n						<h3>申报须知</h3>\r\n						<ol>\r\n                            <li>一、申报对象为嫣然天使基金定点合作医疗机构</li>\r\n                            <li>二、结算周期为每季度结算一次</li>\r\n                            <li>三、申报日期为下一季度第一个月15日之前</li>\r\n                            <li>四、申报流程：\r\n								<ol>\r\n                                	<li>网上申请，须上传本季度费用结算申请、结算统计表和患者病例资料</li>\r\n                                	<li>资料审批，嫣然天使基金办公室将根据资料对患者家庭进行回访</li>\r\n                                	<li>问题核实，回访过程中，针对患者家庭反馈的问题，进行问题核实</li>\r\n                                	<li>申报红基会，全部资料核实无误后，递交中国红十字基金会报审</li>\r\n                                	<li>款项拨付，由红基会财务直接拨付合作医院\r\n								</ol>\r\n							</li>\r\n                            <li>五、申报红基会，须提交的材料：\r\n								<ol>\r\n									<li>结算申请、结算统计表、账号信息，加盖公章</li>\r\n									<li>原始凭证，须提供费用收取明细</li> \r\n								</ol>	\r\n							</li>\r\n                            <li>六、所有申报资料须保证其真实性和完整性；</li>\r\n                            <li>七、嫣然天使基金办公室负责所有申报资料的审核和建档工作；</li>\r\n                            <li>八、对申报资料中出现的虚假、伪造或隐瞒等行为，一经发现，评审办公室将不予资助。</li>\r\n                        </ol>\r\n					</div>\r\n					<div class=\"plat\">\r\n						<h3>网上申请求助</h3>\r\n						<p class=\"font_14\">确认已经阅读和知悉了以上全部条款，并同意所有申报规定。</p>\r\n						<p class=\"font_14\">你可以通过一下2种方式提交申请，提交后我们将尽快与您取得联系。</p>\r\n						<p class=\"font_14\"><a class=\"btn1 fancybox\" href=\"#HospitalApply\"><span>在线申请</span></a> 或 <a class=\"btn1\" href=\"#\"><span>申请表下载</span></a> 发送至：<a href=\"mailto:info@smileangelfoundation.org\" target=\"_blank\">info@smileangelfoundation.org</a></p>\r\n					</div>',NULL,1,0,1,'apply',1),(2,'2012-08-22 00:53:00','2012-08-24 14:43:44','定点医院','Appointed Hospital','','',NULL,1,0,1,'hospital',1),(3,'2012-08-22 00:53:04','2012-10-29 20:06:36','儿童慈善医院','Smile Angel Hospital','<div>\r\n	<p>\r\n		北京嫣然天使儿童医院将成为建国以来第一间慈善儿童医院。同时，也将成为中国第一间可以为唇腭裂提供序列治疗的医院。此医院，还将成为包括治疗唇腭裂在内的颌面外科国内外学术交流平台，以及志愿者培训基地。\r\n	</p>\r\n	<p>\r\n		北京嫣然天使儿童医院是以治疗唇腭裂儿童等小儿外科疾患为特点的非营利性儿童医院，属于专科医院。该儿童医院将免费为全国患有唇腭裂的儿童进行救治和康复训练，中国红十字基金会嫣然天使基金将为患儿提供全额赞助。\r\n	</p>\r\n	<p align=\"center\">\r\n		<img title=\"一楼南大厅效果图\" alt=\"一楼南大厅效果图\" src=\"http://www.smileangelfoundation.org/uploads/KindEditorUpload/KindEditorUploadImg/20110426175621_2968.jpg\" height=\"200\" width=\"300\" border=\"0\" />\r\n	</p>\r\n	<p>\r\n		<br />\r\n目前，我国有240万名唇腭裂儿童，这些儿童的中相当一部分人因为家庭贫困不能获的最基本的医疗，只能以一个残缺的形象面对社会和世人。根据我国出生缺陷\r\n检测中心对全国31个省、市、自治区466所医院对每年40万－70万新生儿的检测结果显示，1988年－1992年非综合性唇腭裂发生率为1.625‰\r\n，其中唇（腭）裂发生率为1.4‰、腭裂发生率为0.225‰。\r\n	</p>\r\n	<p>\r\n		唇腭裂是一种最常见的先天性畸形，其病因复杂，至今尚未完全明确，一般与遗传与环境作用有关。它可以影响患者除视觉以外口腔颌面部所有器\r\n官和形态与功能，并随着生长发育的变化而变化，需要从身体与心理两方面予以恢复。此类患儿需要复杂、长期的系统治疗。一名医生或者一个科室无法完成该工\r\n作。有鉴于此，人们逐渐认识到需要根据唇腭裂患者治疗和健康恢复的要求，组织由多学科专家共同组成专门的治疗序列组织，共同检查，讨论研究治疗计划，对各\r\n种治疗方法避害就利，循序渐进地从患儿出生到生长发育成熟，实施动态地、连续性地观察与治疗，最终达到使患者无论在形态与功能还是心理上，均能达到与正常\r\n人一样或接近一致的治疗目的。\r\n	</p>\r\n	<p>\r\n		目前国内还缺乏专门针对唇腭裂进行系统治疗的专科医院，且治疗费用较高，而对于边远地区的贫困儿童,治疗更难保证,因此要完成这样历时久,设计科室多,复杂的治疗,是要依靠有爱心的社会力量才能达到目的。\r\n	</p>\r\n	<p>\r\n		2006年11月，嫣然天使基金成立至今，已经成功救治唇腭裂儿童8000例,志愿参与医务人员100多人，取得了很好的社会效益。在救\r\n治过程中得到了社会各界和国外慈善组织的大力支持，定点医院还派出专家到美国、越南等地接受麻醉及手术专项培训。目前嫣然天使基金在国内与伊美尔（北京）\r\n控股集团等多家机构建立了九家定点医院，仅伊美尔（北京）控股集团旗下的各伊美尔整形美容连锁医院就已经治愈2000多例唇腭裂患儿，现在仍然以每周20\r\n例左右手术不间断的运行。\r\n	</p>\r\n	<p>\r\n		此外，嫣然天使基金每年邀请中国最著名的儿童唇腭裂整形美容专家组成医疗队赴边远贫穷地区为唇腭裂儿童做免费手术，先后到过成都、西藏拉萨、西藏阿里地区等，2010年曾赴内蒙古和黑龙江大庆和黑河。\r\n	</p>\r\n	<p>\r\n		在嫣然天使走向千万个唇腭裂患者家庭，给他们带来新生活的希望的同时，他们迫切的提出希望有一所固定的专门从事唇腭裂治疗与康复训练的儿\r\n童医院，能够建立一个为更多的儿童和家庭所能接受的专属儿童医院，能够为患儿提供系统的治疗和康复基地，能够成为一个唇腭裂治疗技术的国际交流平台，让更\r\n多的患儿享受到医学科技进步带来的科学奇迹。筹建一所非营利性慈善儿童医院的想法营运而生。\r\n	</p>\r\n	<p>\r\n		2010年4月8日，民政部在北京召开2009年度“中华慈善奖”报告会，公布年度获奖名单。中国红十字基金会嫣然天使基金荣获“最具影响力慈善项目”，。报告会上，获奖代表以“财富与责任”和“公民与责任”、“组织与责任”为主题进行了深入研讨。\r\n	</p>\r\n	<p>\r\n		2009年12月18日晚，中国红基会“嫣然天使基金2009年度慈善晚宴”在北京银泰中心举行。十届全国人大常委会副委员长、中国红十\r\n字基金会名誉会长司马义•艾买提，中国红十字会常务副会长王伟，副会长郭长江、郝林娜、王海京，嫣然天使基金发起人李亚鹏、王菲夫妇，以及众多文体明星、\r\n企业界爱心人士出席了晚宴，晚宴筹得款物7956万元。在会上，明确提出要建立一所“慈善儿童医院”的畅议。慈善晚宴的主题是“用爱缔造天使之城，携手绘\r\n出彩色翅膀”，筹得的善款也将全部用于创办嫣然天使基金儿童医院，以求可以为唇腭裂患者提供从预防、治疗、口腔矫正到语音训练的一体化治疗服务，使中国唇\r\n腭裂儿童的救助活动更具整体性和系统化。\r\n	</p>\r\n	<p>\r\n		中国红十字会常务副会长王伟在2009年晚宴上致辞。他说，“嫣然天使基金”成立3年来，已募集善款4000余万元，在全国设立了 \r\n9家定点医院及合作医院，“嫣然天使基金”医疗队行程数万里送医下乡。“嫣然天使基金”已累计为5000多名（今年已达到8000名）唇腭裂患者实施免费\r\n手术，得到了社会各界的广泛赞誉。嫣然天使基金的成功离不开李亚鹏王菲夫妇的爱心付出，也离不开社会各界爱心人士的支持和厚爱。“嫣然天使基金”年度慈善\r\n晚宴已经成为中国慈善晚宴最具影响力的品牌。他呼吁到场嘉宾为了“嫣然天使基金”儿童慈善医院的早日建成、为了让更多的唇腭裂孩子实现梦想、为了给更多贫\r\n困家庭带来幸福和希望，共同携手，让社会更加和谐，让世界更加美好！\r\n	</p>\r\n	<p>\r\n		经过认真的的准备和考察，李亚鹏等发起人和中国红十字基金会决定申办”北京嫣然天使儿童医院（暂名）”。此医院正在筹备中，预计于2011年11月21日，即嫣然5周年纪念日，正式投入使用。\r\n	</p>\r\n	<p align=\"center\">\r\n		<img src=\"http://www.smileangelfoundation.org/uploads/KindEditorUpload/KindEditorUploadImg/20110426175543_9375.jpg\" border=\"0\" />\r\n	</p>\r\n	<p>\r\n		北京嫣然天使儿童医院<br />\r\n每天有 4 间手术室同时进行手术…<br />\r\n50 张病床上孩子们的命运即将被改写…<br />\r\n每年实施 800 例全额免费唇腭裂手术<br />\r\n还有无数个等待帮助的贫困唇腭裂患者家庭……<br />\r\n嫣然天使基金通过慈善晚宴、以家庭为单位的小额募捐、月捐等方式为嫣然天使儿童医院筹款，同时亦接受药物、医疗器械的捐赠。所有捐赠的物资、善款都将专项用于唇腭裂医疗救助。\r\n	</p>\r\n	<p>\r\n		期待您的捐助，让我们一起用爱缔造天使之城！\r\n	</p>\r\n</div>','<div>\r\n	<p>\r\n		北京嫣然天使儿童医院将成为建国以来第一间慈善儿童医院。同时，也将成为中国第一间可以为唇腭裂提供序列治疗的医院。此医院，还将成为包括治疗唇腭裂在内的颌面外科国内外学术交流平台，以及志愿者培训基地。\r\n	</p>\r\n	<p>\r\n		北京嫣然天使儿童医院是以治疗唇腭裂儿童等小儿外科疾患为特点的非营利性儿童医院，属于专科医院。该儿童医院将免费为全国患有唇腭裂的儿童进行救治和康复训练，中国红十字基金会嫣然天使基金将为患儿提供全额赞助。\r\n	</p>\r\n	<p align=\"center\">\r\n		<img title=\"一楼南大厅效果图\" alt=\"一楼南大厅效果图\" src=\"http://www.smileangelfoundation.org/uploads/KindEditorUpload/KindEditorUploadImg/20110426175621_2968.jpg\" height=\"200\" width=\"300\" border=\"0\" />\r\n	</p>\r\n	<p>\r\n		<br />\r\n目前，我国有240万名唇腭裂儿童，这些儿童的中相当一部分人因为家庭贫困不能获的最基本的医疗，只能以一个残缺的形象面对社会和世人。根据我国出生缺陷\r\n检测中心对全国31个省、市、自治区466所医院对每年40万－70万新生儿的检测结果显示，1988年－1992年非综合性唇腭裂发生率为1.625‰\r\n，其中唇（腭）裂发生率为1.4‰、腭裂发生率为0.225‰。\r\n	</p>\r\n	<p>\r\n		唇腭裂是一种最常见的先天性畸形，其病因复杂，至今尚未完全明确，一般与遗传与环境作用有关。它可以影响患者除视觉以外口腔颌面部所有器\r\n官和形态与功能，并随着生长发育的变化而变化，需要从身体与心理两方面予以恢复。此类患儿需要复杂、长期的系统治疗。一名医生或者一个科室无法完成该工\r\n作。有鉴于此，人们逐渐认识到需要根据唇腭裂患者治疗和健康恢复的要求，组织由多学科专家共同组成专门的治疗序列组织，共同检查，讨论研究治疗计划，对各\r\n种治疗方法避害就利，循序渐进地从患儿出生到生长发育成熟，实施动态地、连续性地观察与治疗，最终达到使患者无论在形态与功能还是心理上，均能达到与正常\r\n人一样或接近一致的治疗目的。\r\n	</p>\r\n	<p>\r\n		目前国内还缺乏专门针对唇腭裂进行系统治疗的专科医院，且治疗费用较高，而对于边远地区的贫困儿童,治疗更难保证,因此要完成这样历时久,设计科室多,复杂的治疗,是要依靠有爱心的社会力量才能达到目的。\r\n	</p>\r\n	<p>\r\n		2006年11月，嫣然天使基金成立至今，已经成功救治唇腭裂儿童8000例,志愿参与医务人员100多人，取得了很好的社会效益。在救\r\n治过程中得到了社会各界和国外慈善组织的大力支持，定点医院还派出专家到美国、越南等地接受麻醉及手术专项培训。目前嫣然天使基金在国内与伊美尔（北京）\r\n控股集团等多家机构建立了九家定点医院，仅伊美尔（北京）控股集团旗下的各伊美尔整形美容连锁医院就已经治愈2000多例唇腭裂患儿，现在仍然以每周20\r\n例左右手术不间断的运行。\r\n	</p>\r\n	<p>\r\n		此外，嫣然天使基金每年邀请中国最著名的儿童唇腭裂整形美容专家组成医疗队赴边远贫穷地区为唇腭裂儿童做免费手术，先后到过成都、西藏拉萨、西藏阿里地区等，2010年曾赴内蒙古和黑龙江大庆和黑河。\r\n	</p>\r\n	<p>\r\n		在嫣然天使走向千万个唇腭裂患者家庭，给他们带来新生活的希望的同时，他们迫切的提出希望有一所固定的专门从事唇腭裂治疗与康复训练的儿\r\n童医院，能够建立一个为更多的儿童和家庭所能接受的专属儿童医院，能够为患儿提供系统的治疗和康复基地，能够成为一个唇腭裂治疗技术的国际交流平台，让更\r\n多的患儿享受到医学科技进步带来的科学奇迹。筹建一所非营利性慈善儿童医院的想法营运而生。\r\n	</p>\r\n	<p>\r\n		2010年4月8日，民政部在北京召开2009年度“中华慈善奖”报告会，公布年度获奖名单。中国红十字基金会嫣然天使基金荣获“最具影响力慈善项目”，。报告会上，获奖代表以“财富与责任”和“公民与责任”、“组织与责任”为主题进行了深入研讨。\r\n	</p>\r\n	<p>\r\n		2009年12月18日晚，中国红基会“嫣然天使基金2009年度慈善晚宴”在北京银泰中心举行。十届全国人大常委会副委员长、中国红十\r\n字基金会名誉会长司马义•艾买提，中国红十字会常务副会长王伟，副会长郭长江、郝林娜、王海京，嫣然天使基金发起人李亚鹏、王菲夫妇，以及众多文体明星、\r\n企业界爱心人士出席了晚宴，晚宴筹得款物7956万元。在会上，明确提出要建立一所“慈善儿童医院”的畅议。慈善晚宴的主题是“用爱缔造天使之城，携手绘\r\n出彩色翅膀”，筹得的善款也将全部用于创办嫣然天使基金儿童医院，以求可以为唇腭裂患者提供从预防、治疗、口腔矫正到语音训练的一体化治疗服务，使中国唇\r\n腭裂儿童的救助活动更具整体性和系统化。\r\n	</p>\r\n	<p>\r\n		中国红十字会常务副会长王伟在2009年晚宴上致辞。他说，“嫣然天使基金”成立3年来，已募集善款4000余万元，在全国设立了 \r\n9家定点医院及合作医院，“嫣然天使基金”医疗队行程数万里送医下乡。“嫣然天使基金”已累计为5000多名（今年已达到8000名）唇腭裂患者实施免费\r\n手术，得到了社会各界的广泛赞誉。嫣然天使基金的成功离不开李亚鹏王菲夫妇的爱心付出，也离不开社会各界爱心人士的支持和厚爱。“嫣然天使基金”年度慈善\r\n晚宴已经成为中国慈善晚宴最具影响力的品牌。他呼吁到场嘉宾为了“嫣然天使基金”儿童慈善医院的早日建成、为了让更多的唇腭裂孩子实现梦想、为了给更多贫\r\n困家庭带来幸福和希望，共同携手，让社会更加和谐，让世界更加美好！\r\n	</p>\r\n	<p>\r\n		经过认真的的准备和考察，李亚鹏等发起人和中国红十字基金会决定申办”北京嫣然天使儿童医院（暂名）”。此医院正在筹备中，预计于2011年11月21日，即嫣然5周年纪念日，正式投入使用。\r\n	</p>\r\n	<p align=\"center\">\r\n		<img src=\"http://www.smileangelfoundation.org/uploads/KindEditorUpload/KindEditorUploadImg/20110426175543_9375.jpg\" border=\"0\" />\r\n	</p>\r\n	<p>\r\n		北京嫣然天使儿童医院<br />\r\n每天有 4 间手术室同时进行手术…<br />\r\n50 张病床上孩子们的命运即将被改写…<br />\r\n每年实施 800 例全额免费唇腭裂手术<br />\r\n还有无数个等待帮助的贫困唇腭裂患者家庭……<br />\r\n嫣然天使基金通过慈善晚宴、以家庭为单位的小额募捐、月捐等方式为嫣然天使儿童医院筹款，同时亦接受药物、医疗器械的捐赠。所有捐赠的物资、善款都将专项用于唇腭裂医疗救助。\r\n	</p>\r\n	<p>\r\n		期待您的捐助，让我们一起用爱缔造天使之城！\r\n	</p>\r\n</div>\r\n<br />',NULL,1,1,1,NULL,1);

UNLOCK TABLES;

/*Table structure for table `topics` */

DROP TABLE IF EXISTS `topics`;

CREATE TABLE `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `topic_date` varchar(40) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` text,
  `banner_file_path` varchar(255) DEFAULT NULL,
  `banner_file_size` varchar(255) DEFAULT NULL,
  `lang` varchar(10) DEFAULT 'cn',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `topics` */

LOCK TABLES `topics` WRITE;

insert  into `topics`(`id`,`created`,`modified`,`is_display`,`topic_date`,`title`,`desc`,`banner_file_path`,`banner_file_size`,`lang`) values (1,'2012-08-20 21:07:25','2012-10-17 17:19:13',1,'2012-10-09 10:31','2012天使之旅——把爱传出去','随着最后一个手术室里无影灯的关闭，中国红十字基金会嫣然天使基金医疗队2012年贵州天使之旅共完成了73台手术，让73个孩子绽放微笑！\r\n中国红十字基金会嫣然天使基金创始人李亚鹏医生在9月13日上午走访了医院，带着玩具、爱心看望术后的小朋友。救助这些孩子，帮助他们重放笑颜是创办嫣然天使基金的初衷，6年来，李亚鹏先生和所有基金会员工始终坚定这个信念，带着“让我们一起，把爱传出去！”的理想，天使之旅行程已经超过43000公里，经过这次贵州行，延展得更广更远。','507e7811-f4e0-4415-a0b3-7175b499e1a5.docx','15.7 KB','cn'),(2,'2012-10-16 16:53:50','2012-10-16 16:53:50',0,NULL,NULL,NULL,NULL,NULL,'cn'),(3,'2012-10-16 17:03:27','2012-10-16 17:03:27',0,NULL,NULL,NULL,NULL,NULL,'cn'),(4,'2012-10-16 22:24:39','2012-10-16 22:24:39',0,NULL,NULL,NULL,NULL,NULL,'cn'),(5,'2012-10-17 16:52:06','2012-10-17 16:52:06',0,NULL,NULL,NULL,NULL,NULL,'cn'),(6,'2012-10-17 16:55:21','2012-10-17 16:55:21',0,NULL,NULL,NULL,NULL,NULL,'cn'),(7,'2012-10-17 17:09:17','2012-10-17 17:09:17',0,NULL,NULL,NULL,NULL,NULL,'cn'),(8,'2012-10-17 17:10:20','2012-10-17 17:10:20',0,NULL,NULL,NULL,NULL,NULL,'cn'),(9,'2012-10-17 17:21:21','2012-10-17 17:21:21',0,NULL,NULL,NULL,NULL,NULL,'cn'),(10,'2012-10-17 17:21:50','2012-10-17 17:21:50',0,NULL,NULL,NULL,NULL,NULL,'cn'),(11,'2012-10-17 17:46:17','2012-10-17 17:46:17',0,NULL,NULL,NULL,NULL,NULL,'cn'),(13,'2012-10-19 16:03:08','2012-10-19 16:03:08',0,NULL,NULL,NULL,NULL,NULL,'cn'),(14,'2012-10-19 18:11:56','2012-10-23 21:52:28',1,'2012-10-14 00:00','新闻下载新闻下载','新闻下载新闻下载新闻下载新闻下载','50812785-01c4-4a65-9408-09b8f2b3ee62.docx','10.0 KB','cn');

UNLOCK TABLES;

/*Table structure for table `vblocks` */

DROP TABLE IF EXISTS `vblocks`;

CREATE TABLE `vblocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `content_cn` text,
  `content_en` text,
  `sort` int(4) DEFAULT NULL,
  `is_editable` tinyint(1) DEFAULT '1',
  `is_deletable` tinyint(1) DEFAULT '1',
  `is_display` tinyint(1) DEFAULT '0',
  `type` varchar(40) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `vblocks` */

LOCK TABLES `vblocks` WRITE;

insert  into `vblocks`(`id`,`created`,`modified`,`title_cn`,`title_en`,`content_cn`,`content_en`,`sort`,`is_editable`,`is_deletable`,`is_display`,`type`,`is_show`) values (1,'2012-08-21 23:04:18','2012-10-29 20:18:41','志愿者名单','Volunteer list','<div style=\"margin:0px 0px 40px;padding:0px 0px 0px 25px;border:0px;font-size:12px;vertical-align:baseline;background-color:#ED1D24;color:#000000;font-family:微软雅黑, Tahoma, Geneva, sans-serif;font-style:normal;font-weight:normal;text-align:-webkit-auto;\">\r\n	<h3 style=\"font-size:16px;vertical-align:baseline;background-color:transparent;\">\r\n		银行捐款<span>&nbsp;</span><span style=\"font-size:14px;vertical-align:baseline;background-color:transparent;\">嫣然天使基金捐赠账户<span>&nbsp;</span><em>汇款请注明：嫣然天使基金</em></span> \r\n	</h3>\r\n	<table style=\"margin:0px 0px 10px;padding:0px;border:0px;font-size:12px;background-color:transparent;border-collapse:inherit;\">\r\n		<tbody>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					账户户名：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					中国红十字基金会\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					人民币开户银行：<br />\r\n账号：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					中国银行北京市分行<br />\r\n349356004919\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					人民币开户银行：<br />\r\n账号：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					中国工商银行北京东四南支行<br />\r\n0200001019014483874\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					人民币开户银行：<br />\r\n账号：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					中国建设银行北京朝内大街支行<br />\r\n11001070300059000427\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					外币开户银行：<br />\r\n账号：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					中国银行<br />\r\n800100086608091014\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n<span style=\"font-size:12px;vertical-align:baseline;background-color:transparent;color:#999999;\">温馨提示：<br />\r\n银行汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。</span> \r\n</div>\r\n<hr />\r\n<div style=\"margin:0px 0px 40px;padding:0px 0px 0px 25px;border:0px;font-size:12px;vertical-align:baseline;background-color:#ED1D24;color:#000000;font-family:微软雅黑, Tahoma, Geneva, sans-serif;font-style:normal;font-weight:normal;text-align:-webkit-auto;\">\r\n	<h3 style=\"font-size:16px;vertical-align:baseline;background-color:transparent;\">\r\n		邮局捐款<span>&nbsp;</span><span style=\"font-size:14px;vertical-align:baseline;background-color:transparent;\">中国红十字基金会<span>&nbsp;</span><em>汇款请注明：嫣然天使基金</em></span> \r\n	</h3>\r\n	<table style=\"margin:0px 0px 10px;padding:0px;border:0px;font-size:12px;background-color:transparent;border-collapse:inherit;\">\r\n		<tbody>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					地址：<br />\r\n邮编：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					北京市东城区东单北大街 干面胡同53号<br />\r\n100010\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n<span style=\"font-size:12px;vertical-align:baseline;background-color:transparent;color:#999999;\">温馨提示：<br />\r\n邮局汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。<br />\r\n此外，请务必在您的汇款单附言栏中标明您的捐赠序列号。</span> \r\n</div>','<div style=\"margin:0px 0px 40px;padding:0px 0px 0px 25px;border:0px;font-size:12px;vertical-align:baseline;background-color:#ED1D24;color:#000000;font-family:微软雅黑, Tahoma, Geneva, sans-serif;font-style:normal;font-weight:normal;text-align:-webkit-auto;\">\r\n	<h3 style=\"font-size:16px;vertical-align:baseline;background-color:transparent;\">\r\n		银行捐款<span>&nbsp;</span><span style=\"font-size:14px;vertical-align:baseline;background-color:transparent;\">嫣然天使基金捐赠账户<span>&nbsp;</span><em>汇款请注明：嫣然天使基金</em></span> \r\n	</h3>\r\n	<table style=\"margin:0px 0px 10px;padding:0px;border:0px;font-size:12px;background-color:transparent;border-collapse:inherit;\">\r\n		<tbody>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					账户户名：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					中国红十字基金会\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					人民币开户银行：<br />\r\n账号：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					中国银行北京市分行<br />\r\n349356004919\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					人民币开户银行：<br />\r\n账号：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					中国工商银行北京东四南支行<br />\r\n0200001019014483874\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					人民币开户银行：<br />\r\n账号：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					中国建设银行北京朝内大街支行<br />\r\n11001070300059000427\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					外币开户银行：<br />\r\n账号：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					中国银行<br />\r\n800100086608091014\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n<span style=\"font-size:12px;vertical-align:baseline;background-color:transparent;color:#999999;\">温馨提示：<br />\r\n银行汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。</span> \r\n</div>\r\n<hr />\r\n<div style=\"margin:0px 0px 40px;padding:0px 0px 0px 25px;border:0px;font-size:12px;vertical-align:baseline;background-color:#ED1D24;color:#000000;font-family:微软雅黑, Tahoma, Geneva, sans-serif;font-style:normal;font-weight:normal;text-align:-webkit-auto;\">\r\n	<h3 style=\"font-size:16px;vertical-align:baseline;background-color:transparent;\">\r\n		邮局捐款<span>&nbsp;</span><span style=\"font-size:14px;vertical-align:baseline;background-color:transparent;\">中国红十字基金会<span>&nbsp;</span><em>汇款请注明：嫣然天使基金</em></span> \r\n	</h3>\r\n	<table style=\"margin:0px 0px 10px;padding:0px;border:0px;font-size:12px;background-color:transparent;border-collapse:inherit;\">\r\n		<tbody>\r\n			<tr>\r\n				<th style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.148438);text-align:right;\">\r\n					地址：<br />\r\n邮编：\r\n				</th>\r\n				<td style=\"border:0px;font-size:12px;vertical-align:baseline;background-color:rgba(0, 0, 0, 0.0976563);\">\r\n					北京市东城区东单北大街 干面胡同53号<br />\r\n100010\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n<span style=\"font-size:12px;vertical-align:baseline;background-color:transparent;color:#999999;\">温馨提示：<br />\r\n邮局汇款用户可自愿注册填写汇款人信息、自动产生捐赠序列号，方便用户进行到账查询，及接收邮寄收据。<br />\r\n此外，请务必在您的汇款单附言栏中标明您的捐赠序列号。</span> \r\n</div>',1,0,0,1,'volunteer',1),(2,'2012-08-21 23:05:01','2012-10-29 20:18:40','志愿者招募','Volunteer recruitment','<div class=\"plat\">\r\n	<h3>\r\n		“嫣然之星”计划\r\n	</h3>\r\n	<p class=\"font_14\">\r\n		特别邀请您艺人加入“嫣然之星”计划：成为嫣然天使基金慈善明星，用爱心和感召力，帮助更多出生缺陷的儿童，让每一个孩子都勇于面对精彩的未来！\r\n	</p>\r\n	<ul>\r\n		<li>\r\n			成为“嫣然天使会”成员。\r\n		</li>\r\n		<li>\r\n			每年出席嫣然天使基金慈善晚宴，及一次地面公益募捐行动或医疗救助活动。\r\n		</li>\r\n		<li>\r\n			拍摄一部公益广告及在微博上呼吁更多的人，和嫣然天使基金一起把爱传出去！\r\n		</li>\r\n	</ul>\r\n</div>\r\n<div class=\"plat\">\r\n	<h3>\r\n		嫣然天使基金志愿者\r\n	</h3>\r\n	<p class=\"font_14\">\r\n		北京嫣然天使儿童医院将定期举行医疗方面志愿者招募及培训，如果您有此专长，欢迎加入我们，您不仅能给唇腭裂及出生缺陷患儿带来极大的帮助，更能在此获得中国大陆第一家颅颜中心的专业培训，替更多儿童带去福音。\r\n	</p>\r\n	<p class=\"font_14\">\r\n		如果您在其他领域的技能出众，例如电脑高手、外语专家、设计精英、办公室文件制表能手、专业社工……以及您在不同领域有独特资源，请联系我们：<a href=\"mailto:info@smileangelfoundation.org\" target=\"_blank\">info@smileangelfoundation.org</a>\r\n	</p>\r\n	<p class=\"font_14\">\r\n		让嫣然天使基金给您一个为之奉献的家园，搭建善与美的公益平台。\r\n	</p>\r\n</div>\r\n<hr />\r\n<div class=\"plat\">\r\n	<h3>\r\n		加入志愿者队伍\r\n	</h3>\r\n	<p class=\"font_14\">\r\n		你可以通过一下2种方式提交申请，提交后我们将尽快与您取得联系。\r\n	</p>\r\n	<p class=\"font_14\">\r\n		<a class=\"btn1 fancybox\" href=\"#VolunteerApply\"><span>在线申请</span></a> 或 <a class=\"btn1\" href=\"#\"><span>申请表下载</span></a> 发送至：<a href=\"mailto:info@smileangelfoundation.org\" target=\"_blank\">info@smileangelfoundation.org</a>\r\n	</p>\r\n</div>','<div class=\"plat\">\r\n	<h3>\r\n		“嫣然之星”计划\r\n	</h3>\r\n	<p class=\"font_14\">\r\n		特别邀请您艺人加入“嫣然之星”计划：成为嫣然天使基金慈善明星，用爱心和感召力，帮助更多出生缺陷的儿童，让每一个孩子都勇于面对精彩的未来！\r\n	</p>\r\n	<ul>\r\n		<li>\r\n			成为“嫣然天使会”成员。\r\n		</li>\r\n		<li>\r\n			每年出席嫣然天使基金慈善晚宴，及一次地面公益募捐行动或医疗救助活动。\r\n		</li>\r\n		<li>\r\n			拍摄一部公益广告及在微博上呼吁更多的人，和嫣然天使基金一起把爱传出去！\r\n		</li>\r\n	</ul>\r\n</div>\r\n<div class=\"plat\">\r\n	<h3>\r\n		嫣然天使基金Volunteer\r\n	</h3>\r\n	<p class=\"font_14\">\r\n		北京Hospital将定期举行医疗方面Volunteer及培训，如果您有此专长，欢迎加入我们，您不仅能给唇腭裂及出生缺陷患儿带来极大的帮助，更能在此获得中国大陆第一家颅颜中心的专业培训，替更多儿童带去福音。\r\n	</p>\r\n	<p class=\"font_14\">\r\n		如果您在其他领域的技能出众，例如电脑高手、外语专家、设计精英、办公室文件制表能手、专业社工……以及您在不同领域有独特资源，请联系我们：<a href=\"mailto:info@smileangelfoundation.org\" target=\"_blank\">info@smileangelfoundation.org</a>\r\n	</p>\r\n	<p class=\"font_14\">\r\n		让嫣然天使基金给您一个为之奉献的家园，搭建善与美的公益平台。\r\n	</p>\r\n</div>\r\n<hr />\r\n<div class=\"plat\">\r\n	<h3>\r\n		加入Volunteer队伍\r\n	</h3>\r\n	<p class=\"font_14\">\r\n		你可以通过一下2种方式提交申请，提交后我们将尽快与您取得联系。\r\n	</p>\r\n	<p class=\"font_14\">\r\n		<a class=\"btn1 fancybox\" href=\"#VolunteerApply\"><span>在线申请</span></a> 或 <a class=\"btn1\" href=\"#\"><span>申请表下载</span></a> 发送至：<a href=\"mailto:info@smileangelfoundation.org\" target=\"_blank\">info@smileangelfoundation.org</a>\r\n	</p>\r\n</div>',0,1,0,1,'apply',1);

UNLOCK TABLES;

/*Table structure for table `volunteers` */

DROP TABLE IF EXISTS `volunteers`;

CREATE TABLE `volunteers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `name_cn` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `desc_cn` text,
  `desc_en` text,
  `banner_file_path` varchar(255) DEFAULT NULL,
  `types` varchar(255) DEFAULT NULL,
  `sort_1` int(4) DEFAULT NULL,
  `sort_2` int(4) DEFAULT NULL,
  `sort_3` int(4) DEFAULT NULL,
  `sort_4` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `volunteers` */

LOCK TABLES `volunteers` WRITE;

insert  into `volunteers`(`id`,`created`,`modified`,`is_display`,`name_cn`,`name_en`,`desc_cn`,`desc_en`,`banner_file_path`,`types`,`sort_1`,`sort_2`,`sort_3`,`sort_4`) values (1,'2012-08-24 18:50:59','2012-08-24 18:50:59',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'2012-08-24 18:56:55','2012-08-24 18:57:28',1,'测试','ceshi','测试','ceshi','50375e18-275c-4d4f-aea7-05b0f2b3ee62.jpg','|1|2|3|4|',NULL,NULL,NULL,NULL),(3,'2012-08-24 18:57:33','2012-08-24 18:57:44',1,'测试','ceshi','','','50375e27-3e88-4f2e-acc1-05b0f2b3ee62.jpg','|1|',NULL,NULL,NULL,NULL),(4,'2012-08-24 18:57:47','2012-08-24 18:58:02',1,'测试','ceshi','','','50375e39-a908-442f-b718-05b0f2b3ee62.jpg','|2|',NULL,NULL,NULL,NULL),(5,'2012-08-24 18:58:04','2012-08-24 18:58:24',1,'测试','ceshi','','','50375e50-a0ac-4328-8acf-05b0f2b3ee62.jpg','|3|',NULL,NULL,NULL,NULL),(6,'2012-08-24 18:58:28','2012-08-24 18:58:38',1,'测试','ceshi','','','50375e5e-d9f0-4b98-846f-05b0f2b3ee62.jpg','|4|',NULL,NULL,NULL,NULL),(7,'2012-10-19 16:47:09','2012-10-24 15:11:20',1,'中文','英文','中文','英文','5081171a-a920-4ef1-874b-09b8f2b3ee62.jpg','|1|2|3|',NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
