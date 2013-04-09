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
/*Table structure for table `kvs` */

DROP TABLE IF EXISTS `kvs`;

CREATE TABLE `kvs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `url` varchar(255) DEFAULT NULL COMMENT '链接:不写的话就没有A标签,写了新窗口弹出',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  `banner_file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='首页kv';

/*Data for the table `kvs` */

LOCK TABLES `kvs` WRITE;

insert  into `kvs`(`id`,`title`,`url`,`sort`,`created`,`modified`,`banner_file_path`) values (2,'getBannergetBanner','http://www.google.com',1,'2012-05-03 17:49:53','2012-05-03 18:21:12','4fa2c541-7274-4874-9a7e-08bc5253291d.jpg'),(3,'测试测试测试测试','http://www.google.com',0,'2012-05-03 17:52:21','2012-05-03 18:21:12','4fa2c5d5-3628-448d-9b3e-08bc5253291d.jpg'),(4,'当当当','http://www.baidu.com',3,'2012-05-03 18:12:16','2012-05-03 18:21:12','4fa2cae0-3e38-4e5b-89d9-08bc5253291d.jpg'),(5,'哈哈哈哈哈','http://www.sina.com.cn',2,'2012-05-03 18:19:45','2012-05-03 18:21:12','4fa2cc5a-c700-4d4d-af71-08bc5253291d.jpg');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
