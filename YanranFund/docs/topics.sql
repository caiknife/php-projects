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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `topics` */

LOCK TABLES `topics` WRITE;

insert  into `topics`(`id`,`created`,`modified`,`is_display`,`topic_date`,`title`,`desc`,`banner_file_path`,`banner_file_size`,`lang`) values (1,'2012-08-20 21:07:25','2012-10-17 17:19:13',1,'2012-10-09 10:31','2012天使之旅——把爱传出去','随着最后一个手术室里无影灯的关闭，中国红十字基金会嫣然天使基金医疗队2012年贵州天使之旅共完成了73台手术，让73个孩子绽放微笑！\r\n中国红十字基金会嫣然天使基金创始人李亚鹏医生在9月13日上午走访了医院，带着玩具、爱心看望术后的小朋友。救助这些孩子，帮助他们重放笑颜是创办嫣然天使基金的初衷，6年来，李亚鹏先生和所有基金会员工始终坚定这个信念，带着“让我们一起，把爱传出去！”的理想，天使之旅行程已经超过43000公里，经过这次贵州行，延展得更广更远。','507e7811-f4e0-4415-a0b3-7175b499e1a5.docx','15.7 KB','cn'),(2,'2012-10-16 16:53:50','2012-10-16 16:53:50',0,NULL,NULL,NULL,NULL,NULL,'cn'),(3,'2012-10-16 17:03:27','2012-10-16 17:03:27',0,NULL,NULL,NULL,NULL,NULL,'cn'),(4,'2012-10-16 22:24:39','2012-10-16 22:24:39',0,NULL,NULL,NULL,NULL,NULL,'cn'),(5,'2012-10-17 16:52:06','2012-10-17 16:52:06',0,NULL,NULL,NULL,NULL,NULL,'cn'),(6,'2012-10-17 16:55:21','2012-10-17 16:55:21',0,NULL,NULL,NULL,NULL,NULL,'cn'),(7,'2012-10-17 17:09:17','2012-10-17 17:09:17',0,NULL,NULL,NULL,NULL,NULL,'cn'),(8,'2012-10-17 17:10:20','2012-10-17 17:10:20',0,NULL,NULL,NULL,NULL,NULL,'cn'),(9,'2012-10-17 17:21:21','2012-10-17 17:21:21',0,NULL,NULL,NULL,NULL,NULL,'cn'),(10,'2012-10-17 17:21:50','2012-10-17 17:21:50',0,NULL,NULL,NULL,NULL,NULL,'cn'),(11,'2012-10-17 17:46:17','2012-10-17 17:46:17',0,NULL,NULL,NULL,NULL,NULL,'cn'),(13,'2012-10-19 16:03:08','2012-10-19 16:03:08',0,NULL,NULL,NULL,NULL,NULL,'cn');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
