/*
SQLyog Ultimate v8.32 
MySQL - 5.5.24 : Database - hongkou_plaza
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT '0000-00-00 00:00:00',
  `modified` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) DEFAULT '0',
  `is_lock` tinyint(1) DEFAULT '0',
  `sort` int(4) DEFAULT '9999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

LOCK TABLES `categories` WRITE;

insert  into `categories`(`id`,`name`,`created`,`modified`,`deleted`,`is_lock`,`sort`) values (1,'美容美发','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,5),(2,'服饰','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,1),(3,'餐饮','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,8),(4,'钟表眼镜','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,3),(5,'鞋类箱包','0000-00-00 00:00:00','2012-04-04 12:11:21',0,1,2),(6,'娱乐休闲','0000-00-00 00:00:00','2012-04-04 12:11:14',0,1,6),(7,'儿童','0000-00-00 00:00:00','2012-04-04 12:08:50',0,1,7),(8,'珠宝香水','0000-00-00 00:00:00','2012-04-04 12:06:16',0,1,4),(9,'小食','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,9),(10,'超市/电器卖场','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,10),(11,'礼品服务','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,11);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
