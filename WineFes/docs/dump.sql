/*
SQLyog Ultimate v8.32 
MySQL - 5.5.24 : Database - wine_fes
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `activities` */

DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `activity_date` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `guests` varchar(255) DEFAULT NULL,
  `intro` text,
  `content` text,
  `activity_pic_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `activities` */

LOCK TABLES `activities` WRITE;

insert  into `activities`(`id`,`created`,`modified`,`is_display`,`title`,`activity_date`,`address`,`guests`,`intro`,`content`,`activity_pic_file_path`) values (3,NULL,'2012-06-17 18:08:43',1,'qweuaushfuqf','2012-07-25 00:00','qwfqweqrasdaf','fqweqwr4qwtsdg','sdgwerwe','t5gdsfsdfsdfwg','4fddac7e-d718-45b7-8b6d-0834db8ed6de.jpg'),(4,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(5,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(6,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(7,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(8,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(9,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(10,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(11,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(12,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(13,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(14,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(15,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(16,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(17,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(18,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(19,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(20,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(21,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(22,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(23,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(24,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(25,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(26,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(27,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(28,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(29,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg'),(30,NULL,NULL,1,'1','2012-06-17 17:59:13',NULL,NULL,NULL,NULL,'4fddaa03-aea8-4ea1-920e-0834db8ed6de.jpg');

UNLOCK TABLES;

/*Table structure for table `activity_reviews` */

DROP TABLE IF EXISTS `activity_reviews`;

CREATE TABLE `activity_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `activity_reviews` */

LOCK TABLES `activity_reviews` WRITE;

insert  into `activity_reviews`(`id`,`created`,`modified`,`year`,`month`,`title`) values (1,NULL,NULL,'2012','1','1'),(2,NULL,NULL,'2012','2','2'),(3,NULL,NULL,'2012','3','3'),(4,NULL,NULL,'2012','4','4'),(5,NULL,NULL,'2012','5','5'),(6,NULL,NULL,'2012','6','6'),(7,NULL,'2012-06-17 18:21:10','2012','8','asdqweasfqweqwe'),(8,'2012-06-17 18:22:42','2012-06-17 18:22:42','2012','7','vassdasfasf');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `administrators` */

LOCK TABLES `administrators` WRITE;

insert  into `administrators`(`id`,`created`,`modified`,`deleted`,`username`,`password`,`last_login_time`,`last_login_ip`) values (1,'0000-00-00 00:00:00','2012-06-17 22:10:44',0,'admin','21232f297a57a5a743894a0e4a801fc3','2012-06-17 22:10:44','127.0.0.1'),(2,'0000-00-00 00:00:00','2012-06-02 09:20:22',0,'caiknife','c4dba9494baa43b818187f60c062f01c','2012-06-02 09:20:22','127.0.0.1');

UNLOCK TABLES;

/*Table structure for table `applications` */

DROP TABLE IF EXISTS `applications`;

CREATE TABLE `applications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contactor` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `business` varchar(255) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `applications` */

LOCK TABLES `applications` WRITE;

insert  into `applications`(`id`,`created`,`modified`,`title`,`address`,`contactor`,`tel`,`mobile`,`business`,`comment`) values (1,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(2,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(3,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(4,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(5,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(6,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(7,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(8,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(9,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(10,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(11,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(12,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(13,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(14,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(15,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(16,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(17,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(18,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(19,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广'),(20,'2012-06-17 22:30:21','2012-06-17 22:30:21','上海盛大展览公司','上海漕溪北路72号A座1504','刘杰君','021-59187261','13817184920','展览，酒类营销','面对智能手机、平板机，NVIDIA不仅有Tegra系列处理器，还有新设计的多点触摸技术“DirectTouch”，并且获得了不少厂商的支持。Synaptics、N-trig今天就同时宣布将会在平板机市场上推广');

UNLOCK TABLES;

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `content` text,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `articles` */

LOCK TABLES `articles` WRITE;

insert  into `articles`(`id`,`created`,`modified`,`content`,`type`) values (1,'2012-06-16 11:10:12','2012-06-16 11:22:58','<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">前几天高考，网上疯传一张图，几个家长在考场门口人来挡人，车来挡车，因为他们的孩子在考听力，他们担心自行车通过的噪声会影响自家孩子。有人说：这些屌丝父母。</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">多好的词儿，屌丝父母，以前从没想过竟然有这么恰如其分形容这群奇怪的人的词儿。他们碌碌无为，所有的希望和寄托都压在自己孩子身上，希望他们的孩子出人头地，完成自己没完成的理想，甚至可以带给他们更好的生活，他们比其他的人更疼自己的孩子，也希望别人像他一样，把他们的孩子当成世界的中心去维护。</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">我见过太多的屌丝父母，坐公交车他嫌人挤到他的孩子，走路他嫌没人让着他孩子，选班干部没他孩子的事他说肯定是有黑幕........</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">穷逼就别要孩子了，你需要的不是孩子，是再活一次摆脱屌丝的命运，实现美国梦，走出亚洲冲向世界。</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">我面对父母高压的“什么年纪干什么事儿”都顽固的不谈恋爱不结婚，就是怕开了这个头，下一个“什么年纪干什么事儿”就变成了要孩子，而我是个穷逼，我不能要孩子，给不了他正常成长的环境，要个屁！</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">有人说，哎呀，这么物质干嘛？</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">不是物质，真不是，是你自己疲于奔命，没有时间停下来，你缺乏耐心，生活苦闷，工作乏味，一个这样的人怎么有足够的情感去面对小孩？而你的孩子也会迅速的变得像你的工作一样，让你感到乏味，无趣，无法实现理想，对未来抱有怀疑。梦想再次被击垮。</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">自己的梦想，不需要别人去实现，所以已经过上想要的生活的人，他们的孩子会好过一点，至少他们的父母不会要求他们去代替父母实现父母的梦，过自己就可以了。这并不是说富逼才有生育权。</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">屌丝父母的孩子，也不会是个可爱的人，他们被自己屌丝的父母高压饲养，完成梦想，像把锋利的菜刀一样被重视，在实现父母理想的道路上披荆斩棘，最终完成一生，而自己消失在时间里，消失在父母的期盼中。</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">我坐公交，遇到的屌丝奶奶，她把别人让给她的位置给了她10岁左右的孙子，然后站在我面前，面带愁容，捶腰跺脚。我会让？不会。你疼自己的孙子无可厚非，但不要希望别人会疼你，一个10岁的孩子应该知道站公交是什么味道，当然更应该知道自己奶奶让给自己座位是件很叛逆的事情，正常的做法应该是他站着，她的奶奶坐着。</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">你可以说我不善良，但世界对每个人都不善良，不要要求别人对你善良。你给不了你孩子的东西，别指望别人给。</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">今天我走在马路上，两人宽的路，一个孩子在路边玩，我侧身走过，他摔倒了，我扶起来，然后站在20米开外的他的母亲对我横加指责，她说：“你把我孩子撞坏了怎么办！”能怎么办？我就撞了怎么着？难不成我要停下来等你孩子玩完他的游戏再走？这是公共通道，是人行道，我没开车，我走自己的路，关你什么事？</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">“你走路不长眼吗？”——你他妈不长眼吗？自己孩子堵着路没看见吗？他自己摔倒的没看见吗？</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">但我什么都没说，我说对不起，然后就走了，因为我知道这又是个屌丝父母，刚我扶起来的不是他的孩子，是他的未来，他的希望，世界上那个代替他完成梦想的人，这个结了婚生了子还和我一样住在30㎡小公寓里的人。</span><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">电梯：</span><a href=\"http://www.douban.com/note/220183302/?start=100#comments\">TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT</a><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">电梯2：</span><a href=\"http://www.douban.com/note/220183302/?start=200#comments\">TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT</a><br />\r\n<br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:13px;font-style:normal;font-weight:normal;line-height:21px;background-color:#FFFFFF;\">电梯3：</span><a href=\"http://www.douban.com/note/220183302/?start=300#comments\">TTTTTTTTTTTTTTTTTTTTTTTTTTTT</a>','organization'),(2,'2012-06-16 11:16:23','2012-06-16 11:16:23',NULL,'hotel'),(3,'2012-06-17 18:32:57','2012-06-17 18:32:57',NULL,'ticket');

UNLOCK TABLES;

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `url` varchar(255) DEFAULT NULL COMMENT '链接:不写的话就没有A标签,写了新窗口弹出',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='首页kv';

/*Data for the table `banners` */

LOCK TABLES `banners` WRITE;

insert  into `banners`(`id`,`title`,`url`,`sort`,`created`,`modified`,`banner_file_path`) values (6,'测试测试测试测试测试测试测试测试','http://www.google.com/reader',1,'2012-06-15 13:24:49','2012-06-15 14:42:36','4fdad95c-d92c-4690-98ac-07e0db8ed6de.jpg'),(7,'嘿嘿嘿','http://www.baidu.com',0,'2012-06-15 14:41:49','2012-06-15 14:41:59','4fdad92d-bb18-4294-845a-07e0db8ed6de.jpg'),(2,NULL,NULL,NULL,'2012-06-15 16:48:40','2012-06-15 16:48:40','4fdaf6e8-739c-461f-9c13-0894db8ed6de.jpg'),(9,'哈哈哈哈','http://www.baidu.com',NULL,'2012-06-16 19:13:23','2012-06-16 19:13:23','4fdc6a52-b3f4-4a4f-9e6a-08a8db8ed6de.jpg');

UNLOCK TABLES;

/*Table structure for table `blocks` */

DROP TABLE IF EXISTS `blocks`;

CREATE TABLE `blocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `sort` int(4) DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `blocks` */

LOCK TABLES `blocks` WRITE;

insert  into `blocks`(`id`,`created`,`modified`,`title`,`content`,`sort`,`is_display`) values (1,'2012-06-16 14:21:15','2012-06-16 19:27:51','哈哈哈哈哈','<p>\r\n	哈哈哈哈哈\r\n</p>\r\n<p>\r\n	哈哈哈哈哈哈哈哈哈哈\r\n</p>\r\n<p>\r\n	哈哈哈哈哈\r\n</p>\r\n<p>\r\n	哈哈哈哈哈\r\n</p>\r\n<p>\r\n	哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈\r\n</p>\r\n<p>\r\n	哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈\r\n</p>\r\n<p>\r\n	<br />\r\n</p>',0,1),(2,'2012-06-16 14:21:57','2012-06-16 19:27:51','sssss','<p>\r\n	哈哈哈哈哈\r\n</p>\r\n<p>\r\n	哈哈哈哈哈哈哈哈哈哈\r\n</p>\r\n<p>\r\n	哈哈哈哈哈\r\n</p>\r\n<p>\r\n	哈哈哈哈哈\r\n</p>\r\n<p>\r\n	哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈\r\n</p>\r\n<p>\r\n	哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈\r\n</p>\r\n<p>\r\n	<br />\r\n</p>',1,1),(3,'2012-06-16 19:26:07','2012-06-16 19:27:51','马达加斯加','<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-style:normal;font-weight:normal;line-height:19px;background-color:#FFFFFF;\">马达加斯加3观影归来，的确是部不错的欢乐片。不过这字幕就让人有些让人无法接受了。黑衣人3已经颇受争议，这部片子则变本加厉。本身就极快的剧情节奏和噼里啪啦的台词再加上炫目的特效让观众的眼球忙不过来，顾此失彼。影院中也多次出现了笑点已过，观众却在念念有词回顾之前台词而会意一笑的场景……<span>&nbsp;</span></span><br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-style:normal;font-weight:normal;line-height:19px;background-color:#FFFFFF;\">　　随着网络上自发组织起来的字幕组越来越多，独立译制的作品逐渐形成独特的风格乃至发展成某种风气，各个负责译制工作的制片厂开始跟风。按照目前的这个情况持续下去，未来类似的字幕估计会越来越多，但我个人却认为不是什么好现象。<span>&nbsp;</span></span><br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-style:normal;font-weight:normal;line-height:19px;background-color:#FFFFFF;\">　　目前恶搞的、过度渲染的、无厘头的、极度网络化语言的字幕之所以受欢迎，主要是因为多年以来观众已经习惯了一板一眼的信达雅模式，突然被抛到一个创意天马行空的世界里，眼花缭乱了。从上影、长影的那个时代开始，中国人开始接受译制片，多年以来，观众对于这种高水平的翻译已经习以为常，这时候突然来了点新奇的，过去没有的翻译模式，自然大受欢迎。<span>&nbsp;</span></span><br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-style:normal;font-weight:normal;line-height:19px;background-color:#FFFFFF;\">　　一部本身带点诙谐色彩的影片，除了一板一眼的翻译以外，冷不丁的蹦出来点“地沟油”“打酱油”，把纯爷们儿称作“春哥”，FACEBOOK替换成“校内网”，的确让人眼前一亮。美式幽默、英式幽默我们碍于语言上的障碍，并不一定能完全把握。相形之下我们中式的幽默就显得接地气和亲切的多了，比如颇受争议的黑衣人3中突然爆出来的“天长地久有时尽，此恨绵绵无绝期”就让影院观众骤然哄笑成一片。<span>&nbsp;</span></span><br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-style:normal;font-weight:normal;line-height:19px;background-color:#FFFFFF;\">　　但是，但是。这样的幽默是必须有限度的。尤其是搞引进-译制-发行工作的专业人士，一定要弄明白这其中的奥妙。这样惊喜的效果，是一定要建立在整部电影按套路，按经验，按英汉翻译理论一点点制作出来的“信达雅”字幕的基础上的。如果全篇都是哗众取宠的所谓笑点，那观众还笑的出来吗？<span>&nbsp;</span></span><br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-style:normal;font-weight:normal;line-height:19px;background-color:#FFFFFF;\">　　网络化的语言有其特定的载体，既然是网络的语言，就得用在网络上。而且网络上信息流转如此迅速，淘汰如此残酷。你今天还喜滋滋的学会的新词新语，明天可能就被置换掉了。试想一两年前火爆网络的诸多流行词，你现在还会说几个？不要说老掉牙的说出来，发出去，恐怕各位的大脑都已经自动将其淘汰、忘掉而根本记不起来了吧。如果强行搞这类笑点，就会如同春晚硬上“神马都是浮云”一样，不仅不好笑，而且会让屏幕前的年轻观众一边尴尬，一边鸡皮疙瘩掉一地，一边忍不住嘲弄两句。<span>&nbsp;</span></span><br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-style:normal;font-weight:normal;line-height:19px;background-color:#FFFFFF;\">　　电影公司引进电影，制片厂译制和发行，院线承接与放映，观众走进影院看电影，是一种商业行为，电影的译制与发行面对的是全体消费者，不存在特定的群体。既然如此，就要最大程度的照顾所有观众，尽量为所有走进电影院的观众负责。类似“神马都是浮云”这样的流行词，第一受众有限，上了年纪的人或太小的，或者平常并不怎么上网的人以及上网却对此类信息不感冒的人（我特意调查过，这个群体远比我想象的大）就会不得要领，像“飞机为什么不能像房价一样软着陆”这样的翻译，说实话不天天看新闻，你知道笑点在哪吗？第二审美疲劳，多看两次其实就没新意了，第三速朽，现在还觉得时髦，过三个月立马觉得老土的想吐，如同现在如果谁的手机铃声如果还是老鼠爱大米并在公交地铁上公然响起，全体乘客一定会默默的盯着他行注目礼。<span>&nbsp;</span></span><br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-style:normal;font-weight:normal;line-height:19px;background-color:#FFFFFF;\">　　<span>&nbsp;</span></span><br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-style:normal;font-weight:normal;line-height:19px;background-color:#FFFFFF;\">　　本来是“多说两句”的，结果一下子打了这么多……就此收尾吧。主要就是希望这阵风快快刮过去，不要形成俗不可耐的风气一直持续就好。老爸老挂在嘴边的“市场经济体制还不够完善”在电影引进译制上体现的太明显了……观众想看的看不到，不想看的又抢映期；想及时看的拖你个俩月，想好好看的没两天又给你撤档了。再说这翻译工作吧，完全不合理，不科学。有的粉丝性极强的电影，制片厂弄个完全不懂也不热爱的译者来翻译，草草几天搞定完事。长此以往，什么“索林·橡木盾”翻译成“索林·鄂肯谢尔德”，“王者归来”翻译成“皇上回宫”的事不知还要发生多少次，什么时候中国才能建立成一个真正完善的以市场为导向的院线体制啊，这这这实在是令人捉急啊……<span>&nbsp;</span></span><br />\r\n<span style=\"color:#111111;font-family:Arial, Helvetica, sans-serif;font-size:12px;font-style:normal;font-weight:normal;line-height:19px;background-color:#FFFFFF;\">　　（楼主已因废话太多被没收键盘并强行拖走- -）</span>',2,1);

UNLOCK TABLES;

/*Table structure for table `exhibitors` */

DROP TABLE IF EXISTS `exhibitors`;

CREATE TABLE `exhibitors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `exhibitors` */

LOCK TABLES `exhibitors` WRITE;

insert  into `exhibitors`(`id`,`title`,`sort`,`created`,`modified`,`banner_file_path`) values (1,'哈哈哈哈',0,'2012-06-15 17:17:32','2012-06-15 17:31:15','4fdaff1b-0c84-4875-afd6-0894db8ed6de.jpg'),(2,'弹琴弹琴弹琴弹琴',2,'2012-06-15 17:24:15','2012-06-15 17:31:15','4fdb00d1-6c14-4c15-8f54-0894db8ed6de.jpg'),(3,'测试测试测试',1,'2012-06-15 17:24:29','2012-06-15 17:31:15','4fdaff4d-8338-4452-b797-0894db8ed6de.jpg');

UNLOCK TABLES;

/*Table structure for table `guests` */

DROP TABLE IF EXISTS `guests`;

CREATE TABLE `guests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `guests` */

LOCK TABLES `guests` WRITE;

insert  into `guests`(`id`,`title`,`sort`,`created`,`modified`,`banner_file_path`) values (2,'啦啦啦啦啦啦',1,'2012-06-15 16:27:44','2012-06-15 16:52:04','4fdaf718-7de4-43e0-8a59-0894db8ed6de.jpg'),(3,'测试测试测试',0,'2012-06-15 16:45:18','2012-06-15 16:52:04','4fdaf61e-9890-4c6e-bbc1-0894db8ed6de.jpg');

UNLOCK TABLES;

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_display` tinyint(1) DEFAULT '0',
  `type_id` int(4) DEFAULT '1',
  `title` varchar(255) DEFAULT NULL,
  `news_date` date DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `intro` text,
  `content` text,
  `news_pic_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `news` */

LOCK TABLES `news` WRITE;

insert  into `news`(`id`,`created`,`modified`,`is_display`,`type_id`,`title`,`news_date`,`source`,`intro`,`content`,`news_pic_file_path`) values (1,'2012-06-17 11:05:06','2012-06-17 11:05:06',1,1,NULL,'2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(2,'2012-06-17 11:07:29','2012-06-17 11:55:28',1,1,'asdqweqwe','2012-06-17','hahaa','qdfbdfbfb','<p>\r\n	sdfweg\r\n</p>\r\n<p>\r\n	sdbhsdf\r\n</p>\r\n<p>\r\n	werdfn\r\n</p>\r\n<p>\r\n	fghn\r\n</p>','4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(3,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(4,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(5,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(6,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(7,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(8,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(9,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(10,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(11,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(12,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(13,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(14,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(15,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(16,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(17,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(18,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(19,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(20,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg'),(21,NULL,NULL,1,1,'asdqweqwe','2012-06-17','hahaa',NULL,NULL,'4fdd5530-4d18-4afe-afeb-0834db8ed6de.jpg');

UNLOCK TABLES;

/*Table structure for table `news_reviews` */

DROP TABLE IF EXISTS `news_reviews`;

CREATE TABLE `news_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `news_reviews` */

LOCK TABLES `news_reviews` WRITE;

insert  into `news_reviews`(`id`,`created`,`modified`,`year`,`month`,`title`) values (1,NULL,NULL,'2012','1','1'),(2,NULL,NULL,'2012','2','2'),(3,NULL,NULL,'2012','3','3'),(4,NULL,NULL,'2012','4','4'),(5,NULL,NULL,'2012','5','5'),(6,NULL,'2012-06-17 16:19:22','2012','5','88888'),(7,'2012-06-17 15:38:47','2012-06-17 15:38:47','2012','1','asdqfqwe'),(8,'2012-06-17 18:21:25','2012-06-17 18:21:25','2012','7','btrbrtgrth');

UNLOCK TABLES;

/*Table structure for table `partners` */

DROP TABLE IF EXISTS `partners`;

CREATE TABLE `partners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `url` varchar(255) DEFAULT NULL COMMENT '链接:不写的话就没有A标签,写了新窗口弹出',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `partners` */

LOCK TABLES `partners` WRITE;

insert  into `partners`(`id`,`title`,`url`,`sort`,`created`,`modified`,`banner_file_path`) values (1,'哈哈哈哈哈哈','http://www.baidu.com',1,'2012-06-16 19:15:05','2012-06-16 19:21:41','4fdc6c23-bb4c-42b7-9133-08a8db8ed6de.jpg'),(3,'哈哈哈哈','http://www.google.com',NULL,'2012-06-16 19:24:45','2012-06-16 19:24:45','4fdc6cfd-ec1c-425e-b6e4-08a8db8ed6de.jpg'),(4,'测试测试测试','http://www.baidu.com',NULL,'2012-06-16 19:24:58','2012-06-16 19:25:12','4fdc6d18-fde0-4ca4-8d73-08a8db8ed6de.jpg');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
