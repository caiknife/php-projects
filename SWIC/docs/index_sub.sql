/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.0.45-log : Database - shwic
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `index_sub` */

DROP TABLE IF EXISTS `index_sub`;

CREATE TABLE `index_sub` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `pid` tinyint(4) default NULL COMMENT '指数分类1葡萄酒.2:白酒',
  `title` varchar(255) default NULL COMMENT '标题中文',
  `sort` int(11) default NULL COMMENT '排序',
  `created` datetime default NULL COMMENT '创建时间',
  `modified` datetime default NULL COMMENT '修改时间',
  `deleted` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='指数二级分类';

/*Data for the table `index_sub` */

LOCK TABLES `index_sub` WRITE;

insert  into `index_sub`(`id`,`pid`,`title`,`sort`,`created`,`modified`,`deleted`) values (1,1,'CWPI-100',0,NULL,'2012-04-28 14:17:50',0),(2,1,'CGWPI',1,NULL,'2012-04-28 14:17:50',0),(11,1,'IWPI',2,'2012-04-28 12:43:00','2012-04-28 14:17:50',0),(12,3,'CLPI',4,'2012-04-28 14:14:22','2012-04-28 14:17:50',0),(13,2,'CWPI',3,'2012-04-28 14:15:28','2012-04-28 14:17:50',0);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
