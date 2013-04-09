/*
Navicat MySQL Data Transfer

Source Server         : 1_localhost
Source Server Version : 50085
Source Host           : localhost:3306
Source Database       : shwic

Target Server Type    : MYSQL
Target Server Version : 50085
File Encoding         : 65001

Date: 2012-04-20 16:26:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `grape_varieties`
-- ----------------------------
DROP TABLE IF EXISTS `grape_varieties`;
CREATE TABLE `grape_varieties` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title_cn` varchar(255) default NULL COMMENT '中文',
  `title_en` varchar(255) default NULL COMMENT '英文',
  `title_other` varchar(255) default NULL COMMENT '标题(原国家语言)',
  `created` datetime default NULL COMMENT '创建时间',
  `modified` datetime default NULL COMMENT '修改时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='葡萄品种';

-- ----------------------------
-- Records of grape_varieties
-- ----------------------------

-- ----------------------------
-- Table structure for `media_partner`
-- ----------------------------
DROP TABLE IF EXISTS `media_partner`;
CREATE TABLE `media_partner` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `type_id` tinyint(4) default NULL COMMENT '合作类型1:合作媒体.2:合作伙伴',
  `title` varchar(255) default NULL COMMENT '名称',
  `media_url` varchar(50) default NULL COMMENT 'LOGO图片',
  `created` datetime default NULL COMMENT '创建时间',
  `modified` datetime default NULL COMMENT '修改时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='合作方';

-- ----------------------------
-- Records of media_partner
-- ----------------------------

-- ----------------------------
-- Table structure for `members`
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) default NULL COMMENT '名称',
  `type_id` tinyint(4) default NULL COMMENT '会员类型1:常务理事会员.2:理事会员.3:VIP会员',
  `created` datetime default NULL COMMENT '创建时间',
  `modified` datetime default NULL COMMENT '修改时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员';

-- ----------------------------
-- Records of members
-- ----------------------------

-- ----------------------------
-- Table structure for `price_monthly`
-- ----------------------------
DROP TABLE IF EXISTS `price_monthly`;
CREATE TABLE `price_monthly` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `wines_id` int(11) default NULL COMMENT '酒ID',
  `year` varchar(4) default NULL COMMENT '年份',
  `month` varchar(2) default NULL COMMENT '月份',
  `price` decimal(10,2) default NULL COMMENT '价格',
  `created` datetime default NULL COMMENT '创建时间',
  `modified` datetime default NULL COMMENT '修改时间',
  PRIMARY KEY  (`id`),
  KEY `wines_id` (`wines_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='酒价格历史';

-- ----------------------------
-- Records of price_monthly
-- ----------------------------

-- ----------------------------
-- Table structure for `review_team`
-- ----------------------------
DROP TABLE IF EXISTS `review_team`;
CREATE TABLE `review_team` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) default NULL COMMENT '名字',
  `media_url` varchar(50) default NULL COMMENT '肖像图片',
  `content` text COMMENT '简介',
  `type_id` tinyint(4) default NULL COMMENT '类型1:顾问组.2:专家组.3:特邀嘉宾',
  `created` datetime default NULL COMMENT '创建时间',
  `modified` datetime default NULL COMMENT '修改时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评审团队';

-- ----------------------------
-- Records of review_team
-- ----------------------------

-- ----------------------------
-- Table structure for `tasting_notes`
-- ----------------------------
DROP TABLE IF EXISTS `tasting_notes`;
CREATE TABLE `tasting_notes` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) default NULL COMMENT '标题期号',
  `date_time` date default NULL COMMENT '时间',
  `address` varchar(255) default NULL COMMENT '地点',
  `content` text COMMENT '简介CMS',
  `status` tinyint(4) default NULL COMMENT '状态null:待评.1:已评',
  `created` datetime default NULL COMMENT '创建时间',
  `modified` datetime default NULL COMMENT '修改时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='酒评会';

-- ----------------------------
-- Records of tasting_notes
-- ----------------------------

-- ----------------------------
-- Table structure for `tasting_score`
-- ----------------------------
DROP TABLE IF EXISTS `tasting_score`;
CREATE TABLE `tasting_score` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `tasting_notes_id` int(11) default NULL COMMENT '酒评会ID',
  `wines_id` int(11) default NULL COMMENT '酒ID',
  `score_color` decimal(10,2) default NULL COMMENT '酒色分数',
  `score_aroma` decimal(10,2) default NULL COMMENT '香气分数',
  `score_aftertaste` decimal(10,2) default NULL COMMENT '回味分数',
  `score_potential` decimal(10,2) default NULL COMMENT '潜力分数',
  `created` datetime default NULL COMMENT '创建时间',
  `modified` datetime default NULL COMMENT '修改时间',
  PRIMARY KEY  (`id`),
  KEY `tasting_notes_id` (`tasting_notes_id`),
  KEY `wines_id` (`wines_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评分';

-- ----------------------------
-- Records of tasting_score
-- ----------------------------

-- ----------------------------
-- Table structure for `wines`
-- ----------------------------
DROP TABLE IF EXISTS `wines`;
CREATE TABLE `wines` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title_cn` varchar(255) default NULL COMMENT '标题中文',
  `title_en` varchar(255) default NULL COMMENT '标题英文',
  `title_other` varchar(255) default NULL COMMENT '标题(原国家语言)',
  `index_type` tinyint(4) default NULL COMMENT '指数分类1进口葡萄酒.2:国产葡萄酒.3:国酒指数',
  `country_id` int(11) default NULL COMMENT '国家ID',
  `capacity_type` tinyint(4) default NULL COMMENT '容量单位1...',
  `capacity` decimal(10,2) default NULL COMMENT '容量',
  `factorys_id` int(11) default NULL COMMENT '酒厂ID',
  `brands_id` int(11) default NULL COMMENT '品牌ID',
  `regions_id` int(11) default NULL COMMENT '产区ID',
  `winery_id` int(11) default NULL COMMENT '酒庄ID',
  `year` varchar(4) default NULL COMMENT '年份',
  `alcohol` varchar(4) default NULL COMMENT '酒精度',
  `importer_id` int(11) default NULL COMMENT '进口商ID',
  `content` text COMMENT '简介',
  `benchmark_price` decimal(10,2) default NULL COMMENT '基准价格',
  `benchmark_date` date default NULL COMMENT '基准价格时间',
  `media_url_1` varchar(50) default NULL COMMENT '图片1',
  `media_url_2` varchar(50) default NULL COMMENT '图片2',
  `media_url_3` varchar(50) default NULL COMMENT '图片3',
  `media_url_4` varchar(50) default NULL COMMENT '图片4',
  `media_url_5` varchar(50) default NULL COMMENT '图片5',
  `created` datetime default NULL COMMENT '创建时间',
  `modified` datetime default NULL COMMENT '修改时间',
  PRIMARY KEY  (`id`),
  KEY `country_id` (`country_id`),
  KEY `factorys_id` (`factorys_id`),
  KEY `brands_id` (`brands_id`),
  KEY `regions_id` (`regions_id`),
  KEY `winery_id` (`winery_id`),
  KEY `importer_id` (`importer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='酒';

-- ----------------------------
-- Records of wines
-- ----------------------------

-- ----------------------------
-- Table structure for `wines_grape_varieties`
-- ----------------------------
DROP TABLE IF EXISTS `wines_grape_varieties`;
CREATE TABLE `wines_grape_varieties` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `wines_id` int(11) default NULL COMMENT '酒ID',
  `grape_varieties_id` tinyint(4) default NULL COMMENT '葡萄品种ID',
  `percent` decimal(10,2) default NULL COMMENT '百分比',
  `created` datetime default NULL COMMENT '创建时间',
  `modified` datetime default NULL COMMENT '修改时间',
  PRIMARY KEY  (`id`),
  KEY `wines_id` (`wines_id`),
  KEY `grape_varieties_id` (`grape_varieties_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='酒和葡萄品种';

-- ----------------------------
-- Records of wines_grape_varieties
-- ----------------------------
