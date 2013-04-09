/*
SQLyog Ultimate v8.32 
MySQL - 5.5.24 : Database - yanran
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
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

insert  into `administrators`(`id`,`created`,`modified`,`deleted`,`username`,`password`,`last_login_time`,`last_login_ip`) values (1,'0000-00-00 00:00:00','2012-07-30 11:16:36',0,'admin','21232f297a57a5a743894a0e4a801fc3','2012-07-30 11:16:36','127.0.0.1'),(2,'0000-00-00 00:00:00','2012-07-29 17:07:01',0,'caiknife','c4dba9494baa43b818187f60c062f01c','2012-07-29 17:07:01','127.0.0.1');

UNLOCK TABLES;

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content_cn` text,
  `content_en` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `articles` */

LOCK TABLES `articles` WRITE;

insert  into `articles`(`id`,`created`,`modified`,`type`,`title`,`content_cn`,`content_en`) values (1,'2012-07-30 15:49:48','2012-07-30 15:49:48','recruiting','招贤纳才',NULL,NULL),(2,'2012-07-30 15:49:54','2012-07-30 15:49:54','insurance','保险与付款',NULL,NULL),(3,'2012-07-30 15:49:55','2012-07-30 16:09:32','contact','联系我们','aaaaaaaaaaaaaaaaaa<br />','bbbbbbbbbbbbbbbbbbbbbbbb<br />');

UNLOCK TABLES;

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title_cn` varchar(255) DEFAULT NULL COMMENT '标题',
  `title_en` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL COMMENT '链接:不写的话就没有A标签,写了新窗口弹出',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='首页kv';

/*Data for the table `banners` */

LOCK TABLES `banners` WRITE;

insert  into `banners`(`id`,`title_cn`,`title_en`,`url`,`sort`,`created`,`modified`,`banner_file_path`) values (14,'中文标题','英文标题','http://www.baidu.com',1,'2012-07-27 18:19:03','2012-07-27 18:32:10','50126cf4-cd54-4346-931b-08d063dd89e0.jpg'),(15,'中文标题','英文标题','http://www.google.com',0,'2012-07-27 18:31:56','2012-07-27 18:32:10','50126e1c-dc10-4fd1-8948-08d063dd89e0.jpg');

UNLOCK TABLES;

/*Table structure for table `blocks` */

DROP TABLE IF EXISTS `blocks`;

CREATE TABLE `blocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `sort` int(4) DEFAULT NULL,
  `content_cn` text,
  `content_en` text,
  `type` varchar(255) DEFAULT 'about',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `blocks` */

LOCK TABLES `blocks` WRITE;

insert  into `blocks`(`id`,`created`,`modified`,`is_display`,`title_cn`,`title_en`,`sort`,`content_cn`,`content_en`,`type`) values (1,'2012-07-30 00:57:13','2012-07-30 01:44:49',1,'aasdqweklj','fqiuweir',1,'asdqweqwe\r\nfasdqweqwe\r\nfqwkeqjwe','7274274\r\n754745\r\n32412745','about'),(5,'2012-07-30 01:44:15','2012-07-30 01:44:49',1,'ntynrthnrh','vsvsdfasdf',0,'<p>\r\n	asdvsadvsad\r\n</p>\r\n<p>\r\n	asdkajsdq\r\n</p>\r\n<p>\r\n	askdjqwe\r\n</p>\r\n<p>\r\n	askfjqwe\r\n</p>\r\n<p>\r\n	<br />\r\n</p>','<p>\r\n	faosiqw\r\n</p>\r\n<p>\r\n	easdgqw\r\n</p>\r\n<p>\r\n	qweoi\r\n</p>\r\n<p>\r\n	aksdjal\r\n</p>\r\n<p>\r\n	agkqhwe\r\n</p>\r\n<br />','about');

UNLOCK TABLES;

/*Table structure for table `boards` */

DROP TABLE IF EXISTS `boards`;

CREATE TABLE `boards` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `type` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `boards` */

LOCK TABLES `boards` WRITE;

insert  into `boards`(`id`,`title`,`type`,`sort`,`created`,`modified`,`banner_file_path`) values (1,'关于我们','about',NULL,NULL,'2012-07-28 10:56:11','501354ca-f6fc-4c03-87a2-07c463dd89e0.jpg'),(2,'最新新闻','news',NULL,NULL,'2012-07-28 10:55:59','501354bf-bdec-4905-b076-07c463dd89e0.jpg'),(3,'服务项目','service',NULL,NULL,'2012-07-28 10:55:50','501354b6-2570-4a4c-8270-07c463dd89e0.jpg'),(4,'医疗团队','team',NULL,NULL,'2012-07-28 10:55:42','501354ad-e4e0-45ec-83b1-07c463dd89e0.jpg'),(5,'环境设施','equip',NULL,NULL,'2012-07-28 10:55:34','501354a6-e62c-4d03-a130-07c463dd89e0.jpg'),(6,'在线预约','reservation',NULL,NULL,'2012-07-28 10:55:21','50135498-099c-4e27-8818-07c463dd89e0.jpg'),(7,'招贤纳才','recruiting',NULL,NULL,'2012-07-28 10:55:15','50135492-824c-4b16-af73-07c463dd89e0.jpg'),(8,'健康咨询','info',NULL,NULL,'2012-07-28 10:55:07','5013548b-f69c-4043-b741-07c463dd89e0.jpg'),(9,'保险付款','insurance',NULL,NULL,'2012-07-28 10:54:58','50135482-6650-4962-ae96-07c463dd89e0.jpg'),(10,'联系我们','contact',NULL,NULL,'2012-07-28 10:53:10','50135415-4398-4e48-bebc-07c463dd89e0.jpg');

UNLOCK TABLES;

/*Table structure for table `equip_type` */

DROP TABLE IF EXISTS `equip_type`;

CREATE TABLE `equip_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `sort` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `equip_type` */

LOCK TABLES `equip_type` WRITE;

insert  into `equip_type`(`id`,`created`,`modified`,`title_cn`,`title_en`,`sort`) values (1,NULL,'2012-07-29 00:39:28','嫣然新闻',NULL,0),(2,NULL,'2012-07-29 00:39:28','媒体关注',NULL,4),(3,NULL,'2012-07-29 00:39:28','健康咨询',NULL,2),(4,'2012-07-28 11:58:01','2012-07-29 00:39:28','中文标题中文标题','英文标题英文标题',1),(5,'2012-07-29 00:39:20','2012-07-29 00:39:38','中','英',3);

UNLOCK TABLES;

/*Table structure for table `equips` */

DROP TABLE IF EXISTS `equips`;

CREATE TABLE `equips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `desc_cn` text,
  `desc_en` text,
  `sort` int(4) DEFAULT NULL,
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `equips` */

LOCK TABLES `equips` WRITE;

insert  into `equips`(`id`,`created`,`modified`,`type_id`,`desc_cn`,`desc_en`,`sort`,`banner_file_path`) values (1,'2012-07-30 12:49:28','2012-07-30 13:17:09',2,'2222','2222',1,'501618c1-f704-4833-9789-06c063dd89e0.jpg'),(2,'2012-07-30 13:17:04','2012-07-30 13:17:09',2,'3333','3333',0,'501618cf-57c8-4ac2-96c3-06c063dd89e0.jpg');

UNLOCK TABLES;

/*Table structure for table `infos` */

DROP TABLE IF EXISTS `infos`;

CREATE TABLE `infos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `lang` varchar(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `news_date` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `infos` */

LOCK TABLES `infos` WRITE;

insert  into `infos`(`id`,`created`,`modified`,`is_display`,`lang`,`title`,`news_date`,`source`,`content`) values (2,NULL,'2012-07-29 18:01:52',1,'cn','asdqwkejalskd','2012-07-15','asdqweqwe','<p>\r\n	asckqjwkhasf\r\n</p>\r\n<p>\r\n	qwkejaksjdhqwe\r\n</p>\r\n<p>\r\n	askdjqkwhe\r\n</p>\r\n<p>\r\n	asfkjqwiuefoiasdkjqwe\r\n</p>\r\n<p>\r\n	askjdqweifasd\r\n</p>\r\n<p>\r\n	<br />\r\n</p>'),(3,NULL,'2012-07-29 17:38:54',1,'en','asdqwkejalskd','2012-08-26','asdqweqwe','<p>\r\n	fqlkweoifuaosieqweiugfa\r\n</p>\r\n<p>\r\n	qkwjehka\r\n</p>\r\n<p>\r\n	askdjqweiug\r\n</p>\r\n<p>\r\n	qweiuagkajsd\r\n</p>\r\n<p>\r\n	qwekjagiou\r\n</p>'),(4,'2012-07-29 17:57:22','2012-07-29 18:08:43',1,'en','fqweqwrqwrqwre','2012-07-15','asdqweqwe','<p>\r\n	asdasdkjqwe\r\n</p>\r\n<p>\r\n	askfjqwe\r\n</p>\r\n<p>\r\n	askfjqwlekg\r\n</p>\r\n<p>\r\n	qwkejqg\r\n</p>\r\n<p>\r\n	askdjqwe\r\n</p>\r\n<p>\r\n	<br />\r\n</p>');

UNLOCK TABLES;

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `lang` varchar(10) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `news_date` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `news` */

LOCK TABLES `news` WRITE;

insert  into `news`(`id`,`created`,`modified`,`is_display`,`lang`,`type_id`,`title`,`news_date`,`source`,`content`) values (2,NULL,'2012-07-29 17:38:33',1,'cn',3,'asdqwkejalskd','2012-07-15','asdqweqwe','<p>\r\n	asckqjwkhasf\r\n</p>\r\n<p>\r\n	qwkejaksjdhqwe\r\n</p>\r\n<p>\r\n	askdjqkwhe\r\n</p>\r\n<p>\r\n	asfkjqwiuefoiasdkjqwe\r\n</p>\r\n<p>\r\n	askjdqweifasd\r\n</p>\r\n<p>\r\n	<br />\r\n</p>'),(3,NULL,'2012-07-29 17:38:54',1,'en',3,'asdqwkejalskd','2012-08-26','asdqweqwe','<p>\r\n	fqlkweoifuaosieqweiugfa\r\n</p>\r\n<p>\r\n	qkwjehka\r\n</p>\r\n<p>\r\n	askdjqweiug\r\n</p>\r\n<p>\r\n	qweiuagkajsd\r\n</p>\r\n<p>\r\n	qwekjagiou\r\n</p>');

UNLOCK TABLES;

/*Table structure for table `news_type` */

DROP TABLE IF EXISTS `news_type`;

CREATE TABLE `news_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `sort` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `news_type` */

LOCK TABLES `news_type` WRITE;

insert  into `news_type`(`id`,`created`,`modified`,`title_cn`,`title_en`,`sort`) values (1,NULL,'2012-07-29 16:48:28','嫣然新闻',NULL,3),(2,NULL,'2012-07-29 16:48:28','媒体关注',NULL,2),(3,NULL,'2012-07-29 16:48:28','健康咨询',NULL,1),(4,'2012-07-28 11:58:01','2012-07-29 16:48:28','中文标题中文标题','英文标题英文标题',0);

UNLOCK TABLES;

/*Table structure for table `partners` */

DROP TABLE IF EXISTS `partners`;

CREATE TABLE `partners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title_cn` varchar(255) DEFAULT NULL COMMENT '标题',
  `title_en` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `partners` */

LOCK TABLES `partners` WRITE;

insert  into `partners`(`id`,`title_cn`,`title_en`,`sort`,`created`,`modified`,`banner_file_path`) values (10,'中文标题','英文标题',0,'2012-07-27 23:39:44','2012-07-27 23:53:08','5012b640-89e0-4045-a1a7-08d063dd89e0.jpg'),(11,'中文标题','英文标题',1,'2012-07-27 23:40:03','2012-07-27 23:53:08','5012b8ea-b458-42ba-9210-08d063dd89e0.jpg');

UNLOCK TABLES;

/*Table structure for table `reservations` */

DROP TABLE IF EXISTS `reservations`;

CREATE TABLE `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `birthday` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `doctor` varchar(255) DEFAULT NULL,
  `reserved_date` varchar(20) DEFAULT NULL,
  `reserved_time` varchar(10) DEFAULT NULL,
  `comment` text,
  `via` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `reservations` */

LOCK TABLES `reservations` WRITE;

insert  into `reservations`(`id`,`created`,`modified`,`gender`,`name`,`birthday`,`address`,`post`,`email`,`tel`,`department`,`doctor`,`reserved_date`,`reserved_time`,`comment`,`via`) values (1,NULL,NULL,'男','1','1989-08-09','2','3','4','5','6','7','2012-07-30','上午','8','9'),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `content_cn` text,
  `content_en` text,
  `sort` int(4) DEFAULT NULL,
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `services` */

LOCK TABLES `services` WRITE;

insert  into `services`(`id`,`created`,`modified`,`is_display`,`title_cn`,`title_en`,`content_cn`,`content_en`,`sort`,`banner_file_path`) values (2,'2012-07-30 02:32:32','2012-07-30 02:35:15',1,'asdqw','rwef','qweqweqw','erbererfg<br />',1,'50158260-5bec-49cd-b45e-091463dd89e0.jpg');

UNLOCK TABLES;

/*Table structure for table `teams` */

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `name_cn` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `content_cn` text,
  `content_en` text,
  `sort` int(4) DEFAULT NULL,
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `teams` */

LOCK TABLES `teams` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
