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
/*Table structure for table `news_types` */

DROP TABLE IF EXISTS `news_types`;

CREATE TABLE `news_types` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) default NULL COMMENT '名称',
  `sort` int(11) default NULL COMMENT '排序',
  `created` datetime default NULL COMMENT '创建时间',
  `modified` datetime default NULL COMMENT '修改时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='新闻分类管理';

/*Data for the table `news_types` */

LOCK TABLES `news_types` WRITE;

insert  into `news_types`(`id`,`title`,`sort`,`created`,`modified`) values (1,'中心通讯',0,'2012-05-03 10:44:25','2012-05-03 10:44:25'),(2,'行业信息',1,'2012-05-03 10:44:35','2012-05-03 10:44:38'),(3,'市场分析',2,'2012-05-03 10:44:48','2012-05-03 10:44:48'),(4,'美酒投资',3,'2012-05-03 10:44:58','2012-05-03 10:44:58'),(5,'酒品点评',4,'2012-05-03 10:45:07','2012-05-03 10:45:07'),(6,'研究报告',5,'2012-05-03 10:45:16','2012-05-03 10:45:16');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
