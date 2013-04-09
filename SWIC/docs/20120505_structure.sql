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
/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '名称',
  `type_id` tinyint(4) DEFAULT NULL COMMENT '会员类型1:常务理事会员.2:理事会员.3:VIP会员',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='会员';

/*Data for the table `members` */

LOCK TABLES `members` WRITE;

insert  into `members`(`id`,`title`,`type_id`,`created`,`modified`,`sort`) values (1,'1',1,NULL,'2012-05-05 04:18:22',3),(2,'2',2,NULL,'2012-05-05 03:19:18',0),(3,'3',3,NULL,'2012-05-05 04:18:36',2),(4,'4',1,NULL,'2012-05-05 04:18:22',0),(5,'5',2,NULL,'2012-05-05 03:19:18',2),(6,'6',3,NULL,'2012-05-05 04:18:36',0),(7,'7',1,NULL,'2012-05-05 04:18:22',4),(8,'8',2,NULL,'2012-05-05 03:19:18',1),(10,'9',3,NULL,'2012-05-05 04:18:36',3),(11,'tttt',1,'2012-05-05 03:35:14','2012-05-05 04:18:22',2),(12,'哈哈哈',2,'2012-05-05 04:09:29','2012-05-05 04:09:29',NULL),(13,'bbbbb',1,'2012-05-05 04:18:19','2012-05-05 04:18:26',1),(14,'ghdfhert',3,'2012-05-05 04:18:33','2012-05-05 04:18:41',1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
