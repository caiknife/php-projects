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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `boards` */

LOCK TABLES `boards` WRITE;

insert  into `boards`(`id`,`title`,`type`,`sort`,`created`,`modified`,`banner_file_path`) values (1,'关于我们','about',NULL,NULL,'2012-07-28 10:56:11','501354ca-f6fc-4c03-87a2-07c463dd89e0.jpg'),(2,'最新新闻','news',NULL,NULL,'2012-07-28 10:55:59','501354bf-bdec-4905-b076-07c463dd89e0.jpg'),(3,'服务项目','service',NULL,NULL,'2012-07-28 10:55:50','501354b6-2570-4a4c-8270-07c463dd89e0.jpg'),(4,'医疗团队','team',NULL,NULL,'2012-07-28 10:55:42','501354ad-e4e0-45ec-83b1-07c463dd89e0.jpg'),(5,'环境设施','equip',NULL,NULL,'2012-07-28 10:55:34','501354a6-e62c-4d03-a130-07c463dd89e0.jpg'),(6,'在线预约','reservation',NULL,NULL,'2012-07-28 10:55:21','50135498-099c-4e27-8818-07c463dd89e0.jpg'),(7,'招贤纳才','recruiting',NULL,NULL,'2012-07-28 10:55:15','50135492-824c-4b16-af73-07c463dd89e0.jpg'),(8,'健康咨询','info',NULL,NULL,'2012-07-28 10:55:07','5013548b-f69c-4043-b741-07c463dd89e0.jpg'),(9,'保险付款','insurance',NULL,NULL,'2012-07-28 10:54:58','50135482-6650-4962-ae96-07c463dd89e0.jpg'),(10,'联系我们','contact',NULL,NULL,'2012-07-28 10:53:10','50135415-4398-4e48-bebc-07c463dd89e0.jpg'),(11,'颅颜中心','center',NULL,NULL,NULL,'50135415-4398-4e48-bebc-07c463dd89e0.jpg'),(12,'首页','index',NULL,NULL,NULL,'50135415-4398-4e48-bebc-07c463dd89e0.jpg');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
