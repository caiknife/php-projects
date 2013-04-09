/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.5.14 : Database - swic
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `wine_types` */

DROP TABLE IF EXISTS `wine_types`;

CREATE TABLE `wine_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题中文',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='酒类';

/*Data for the table `wine_types` */

LOCK TABLES `wine_types` WRITE;

insert  into `wine_types`(`id`,`title`,`sort`,`created`,`modified`) values (1,'进口葡萄酒',0,NULL,'2012-05-02 15:40:58'),(2,'国产葡萄酒',1,NULL,'2012-05-02 15:40:58'),(3,'白酒',3,NULL,'2012-05-02 15:40:58');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
