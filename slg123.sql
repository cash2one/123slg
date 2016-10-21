-- MySQL dump 10.13  Distrib 5.6.23, for Linux (x86_64)
--
-- Host: localhost    Database: slg123
-- ------------------------------------------------------
-- Server version	5.6.23-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `slg123`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `slg123` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `slg123`;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `last_time` int(11) NOT NULL DEFAULT '0',
  `last_ip` int(11) NOT NULL DEFAULT '0',
  `role_id` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'xtceetg','$2y$08$CgIZuTFRmMf4xufC1wWUNOAdMGd.5Nvz2uNOS6nOojBnET4aRswqe',10,1475131768,454119130,0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cps_log`
--

DROP TABLE IF EXISTS `cps_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cps_log` (
  `cps_id` int(11) NOT NULL,
  `refer` int(11) NOT NULL,
  KEY `cps_id` (`cps_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cps_log`
--

LOCK TABLES `cps_log` WRITE;
/*!40000 ALTER TABLE `cps_log` DISABLE KEYS */;
INSERT INTO `cps_log` VALUES (4,1),(2,2),(3,3);
/*!40000 ALTER TABLE `cps_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cps_member`
--

DROP TABLE IF EXISTS `cps_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cps_member` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pid` int(10) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1激活2禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cps_member`
--

LOCK TABLES `cps_member` WRITE;
/*!40000 ALTER TABLE `cps_member` DISABLE KEYS */;
INSERT INTO `cps_member` VALUES (1,'steven','$2y$13$IW8qItMnYwyrednPI6yzSuBvt21IliHiK8nkZkQyPCsGc4Z5tgWkm',0,1),(2,'jordan','$2y$13$abg.GIMRG09aDfkBrHIJKuqCPMp7ppy7TCixzvF8qEoc.UdliJw8S',1,1),(3,'michael','$2y$13$JWKKwUl5SHuB3GhSy8020eN/6cxo3DW1y33e3GmDqzABXNGjhO5b2',1,1);
/*!40000 ALTER TABLE `cps_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `cps_pay`
--

DROP TABLE IF EXISTS `cps_pay`;
/*!50001 DROP VIEW IF EXISTS `cps_pay`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `cps_pay` AS SELECT 
 1 AS `id`,
 1 AS `cpsname`,
 1 AS `pid`,
 1 AS `active`,
 1 AS `refer`,
 1 AS `order_num`,
 1 AS `uid`,
 1 AS `username`,
 1 AS `pay_uid`,
 1 AS `pay_username`,
 1 AS `paytypename`,
 1 AS `paytype`,
 1 AS `pay_cny`,
 1 AS `pay_time`,
 1 AS `flag`,
 1 AS `pay_ip`,
 1 AS `comfirm_ip`,
 1 AS `gid`,
 1 AS `sid`,
 1 AS `discript`,
 1 AS `flag_game`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `first_pay`
--

DROP TABLE IF EXISTS `first_pay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `first_pay` (
  `order_num` varchar(255) NOT NULL COMMENT '订单号',
  `uid` bigint(20) NOT NULL DEFAULT '0' COMMENT '充值账号',
  `username` varchar(20) NOT NULL COMMENT '充值账号',
  `pay_cny` decimal(17,2) unsigned NOT NULL COMMENT '付款金额',
  `pay_time` int(10) unsigned NOT NULL COMMENT '支付时间',
  `flag_game` tinyint(4) NOT NULL DEFAULT '0' COMMENT '游戏币兑换成功',
  `pay_ip` varchar(45) NOT NULL DEFAULT 'unkown' COMMENT '支付使用IP',
  `game_id` int(11) NOT NULL,
  `server_id` int(11) unsigned NOT NULL,
  `refer` int(11) NOT NULL,
  PRIMARY KEY (`order_num`),
  KEY `pay_time` (`pay_time`),
  KEY `pay_uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单日志';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `first_pay`
--

LOCK TABLES `first_pay` WRITE;
/*!40000 ALTER TABLE `first_pay` DISABLE KEYS */;
INSERT INTO `first_pay` VALUES ('201609271321083070',11,'abcd1234',1.00,1474953668,1,'119.96.10.66',3,1,3);
/*!40000 ALTER TABLE `first_pay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `gamename` varchar(100) NOT NULL COMMENT '游戏名称',
  `enname` varchar(255) NOT NULL DEFAULT '' COMMENT '游戏图标',
  `orders` smallint(6) unsigned NOT NULL COMMENT '排序方式0为默认',
  `main_site` varchar(255) NOT NULL,
  `bbs_site` varchar(255) NOT NULL,
  `gold_name` varchar(20) NOT NULL DEFAULT '元' COMMENT '游戏内金币名称',
  `cny_rate` float unsigned NOT NULL DEFAULT '10' COMMENT '真实货币与服务器上货币兑换比率',
  `percent` decimal(4,2) unsigned NOT NULL DEFAULT '7.00' COMMENT '和厂商分成比例',
  `descript` varchar(255) NOT NULL DEFAULT '' COMMENT '游戏描述',
  `display` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示。1，显示，2，不显示 ',
  `ishot` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '首页热门游戏。1：是。0：不是',
  PRIMARY KEY (`id`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='游戏列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'怒海风云','nhfy',1,'http://nhfy.web.com','http://nhfy.web.com','金币',10,7.00,'《怒海风云》是由上海今题网运营的以16-18世纪为背景的真实系海战题材策略大作。它采用尖端的flash游戏技术，在IE浏览器上输入游戏网址，即可进行游戏。游戏画质精美，港口以每个国家地区的特色为背景，给人一种身临其境的感觉。游戏中的帆船根据历史名船3D建模，真实再现列强争夺海上霸权的这段英雄辈出的历史。伟大的航海家们背负着历史赋予他们的使命，为了国家的荣誉踏上未知的海域展开激烈的战斗！',1,1),(2,'星际帝国','xjdg',2,'http://xjdg.web.com','http://xjdg.web.com','金币',10,7.00,'《星际帝国》为星际空战科幻题材的SLG策略游戏，传统SLG的升级建筑、大量造兵的玩法。',1,1),(3,'斗三国','dsguo',3,'http://dsg.web.com','http://dsg.web.com','金币',10,7.00,'2016年新 SLG 战争策略游戏，成王败寇，驰腾沙场，战斗吧兄弟，都在斗三国！',1,1);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_login_log`
--

DROP TABLE IF EXISTS `game_login_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_login_log` (
  `uid` bigint(20) unsigned NOT NULL COMMENT '用户UID',
  `username` varchar(50) NOT NULL DEFAULT '0',
  `game_id` smallint(6) unsigned NOT NULL,
  `server_id` smallint(4) unsigned NOT NULL,
  `login_times` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '登陆次数，（建号以后）',
  `rolename` varchar(20) NOT NULL DEFAULT '0' COMMENT '角色名',
  `rolelevel` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色等级',
  `last_ip` varchar(20) NOT NULL DEFAULT '0' COMMENT '最后一次登录ip',
  `first_ip` varchar(100) NOT NULL COMMENT '第一次登录游戏IP',
  `first_time` int(10) NOT NULL COMMENT '第一次登录游戏时间',
  `last_time` int(10) NOT NULL DEFAULT '0' COMMENT '最后一次登录游戏时间',
  `refer` int(10) NOT NULL COMMENT '渠道来源',
  PRIMARY KEY (`uid`,`game_id`,`server_id`,`username`),
  KEY `first_time` (`rolename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户对应游戏分区关系表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_login_log`
--

LOCK TABLES `game_login_log` WRITE;
/*!40000 ALTER TABLE `game_login_log` DISABLE KEYS */;
INSERT INTO `game_login_log` VALUES (1,'xtceetg',3,1,15,'0',0,'119.96.9.109','127.0.0.1',1473068958,1476156782,0),(2,'kevin123',3,1,24,'0',0,'119.123.164.30','119.123.164.146',1473242782,1474340350,0),(2,'kevin123',1,1,6,'0',0,'119.123.166.193','119.123.164.146',1473242782,1474958653,0),(5,'kevin124',1,1,5,'0',0,'119.123.164.30','119.123.164.30',1474281779,1474282868,0),(5,'kevin124',3,1,3,'0',0,'119.123.164.30','119.123.164.30',1474282832,1474282863,0),(6,'kevin125',3,1,2,'0',0,'119.123.164.30','119.123.164.30',1474285909,1474336503,0),(6,'kevin125',1,1,2,'0',0,'119.123.164.30','119.123.164.30',1474285914,1474336515,0),(7,'kevin126',1,1,1,'0',0,'119.123.164.30','119.123.164.30',1474286027,1474286027,0),(7,'kevin126',3,1,1,'0',0,'119.123.164.30','119.123.164.30',1474286030,1474286030,0),(8,'steven',3,1,1,'0',0,'27.17.137.224','27.17.137.224',1474515514,1474515514,1),(9,'qq286575099',3,1,1,'0',0,'119.123.165.197','119.123.165.197',1474549209,1474549209,1),(10,'qq789456',3,1,1,'0',0,'119.96.10.66','119.96.10.66',1474710203,1474710203,2),(11,'abcd1234',3,1,1,'0',0,'119.96.10.66','119.96.10.66',1474941528,1474941528,3),(12,'mahua1987ma',3,1,1,'0',0,'27.225.182.88','27.225.182.88',1474976293,1474976293,0),(12,'mahua1987ma',1,1,2,'0',0,'27.225.182.88','27.225.182.88',1474976398,1474976399,0),(16,'dav1944',1,1,1,'0',0,'119.139.116.69','119.139.116.69',1475054230,1475054230,0),(17,'二傻哥',1,1,1,'0',0,'218.93.131.165','218.93.131.165',1475075586,1475075586,0),(21,'jordan3',3,1,1,'0',0,'119.96.9.109','119.96.9.109',1476157638,1476157638,1),(22,'xuanfeng007',3,1,1,'0',0,'119.136.97.94','119.136.97.94',1476325469,1476325469,0);
/*!40000 ALTER TABLE `game_login_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_pic`
--

DROP TABLE IF EXISTS `game_pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_pic` (
  `game_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hot_game` varchar(255) NOT NULL DEFAULT '',
  `new_server` varchar(255) NOT NULL DEFAULT '',
  `game_center` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_pic`
--

LOCK TABLES `game_pic` WRITE;
/*!40000 ALTER TABLE `game_pic` DISABLE KEYS */;
INSERT INTO `game_pic` VALUES (1,'/upload/game/20160905155212.jpg','/upload/game/20160905155217.jpg','/upload/game/20160905155221.jpg'),(2,'/upload/game/20160905155545.jpg','/upload/game/20160905155550.jpg','/upload/game/20160905155557.jpg'),(3,'/upload/game/20160905155939.jpg','/upload/game/20160905155945.jpg','/upload/game/20160905155949.jpg');
/*!40000 ALTER TABLE `game_pic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link`
--

LOCK TABLES `link` WRITE;
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
INSERT INTO `link` VALUES (1,'265G','http://www.265g.com',1472193506,1472193506),(2,'07073','http://www.07073.com',1472204541,1472204541);
/*!40000 ALTER TABLE `link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `node`
--

DROP TABLE IF EXISTS `node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL DEFAULT '',
  `remark` varchar(255) NOT NULL DEFAULT '',
  `status` char(1) NOT NULL DEFAULT 'Y',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `fid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  `path` char(48) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `node`
--

LOCK TABLES `node` WRITE;
/*!40000 ALTER TABLE `node` DISABLE KEYS */;
/*!40000 ALTER TABLE `node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_log`
--

DROP TABLE IF EXISTS `pay_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_log` (
  `order_num` varchar(255) NOT NULL COMMENT '订单号',
  `uid` bigint(20) NOT NULL DEFAULT '0' COMMENT '充值账号',
  `username` varchar(20) DEFAULT NULL COMMENT '充值账号',
  `pay_uid` bigint(20) DEFAULT NULL COMMENT '被充值uid',
  `pay_username` varchar(20) DEFAULT NULL COMMENT '被充值用户名',
  `paytypename` varchar(255) DEFAULT NULL COMMENT '充值渠道名',
  `paytype` bigint(20) NOT NULL COMMENT '订单使用插件列表，如支付宝，易宝等',
  `pay_cny` decimal(17,2) unsigned NOT NULL COMMENT '付款金额',
  `fee_cny` decimal(17,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '实际折扣计算后的金额',
  `fee_rate` float unsigned zerofill NOT NULL DEFAULT '000000000000' COMMENT '支付渠道折扣率',
  `pay_time` int(10) unsigned NOT NULL COMMENT '支付时间',
  `pay_done_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后一次有callback操作的时间',
  `flag_game` tinyint(4) NOT NULL DEFAULT '0' COMMENT '游戏币兑换成功',
  `flag` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '1为渠道支付成功，0为不成功',
  `pay_ip` varchar(45) NOT NULL DEFAULT 'unkown' COMMENT '支付使用IP',
  `comfirm_ip` varchar(45) NOT NULL DEFAULT 'unkown' COMMENT '订单确认时使用的IP',
  `gid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `discript` varchar(255) DEFAULT NULL,
  `plugin_oid` varchar(255) DEFAULT NULL COMMENT '渠道流水号',
  `bank_oid` varchar(255) DEFAULT NULL COMMENT '银行流水号',
  `remark` varchar(255) DEFAULT '',
  PRIMARY KEY (`order_num`),
  KEY `uuid` (`paytype`),
  KEY `state` (`flag`),
  KEY `pay_done_time` (`pay_done_time`),
  KEY `pay_time` (`pay_time`),
  KEY `pay_uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单日志';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_log`
--

LOCK TABLES `pay_log` WRITE;
/*!40000 ALTER TABLE `pay_log` DISABLE KEYS */;
INSERT INTO `pay_log` VALUES ('201511180915497296',0,NULL,1,'xtceetg','网上银行（易宝）',1,5.00,5.00,000000000000,1447809349,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181306094217',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447823169,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181306357422',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447823195,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181331294008',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447824689,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181358017348',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447826281,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181359447730',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447826384,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181402138420',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447826533,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181402522296',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447826572,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181403574303',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447826637,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181406203672',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447826780,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181638005965',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447835880,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181644187153',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447836258,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181652244227',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447836744,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181656232917',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447836983,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181656573148',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447837017,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181657522945',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447837072,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181658072399',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447837087,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181659292070',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447837169,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181700392763',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447837239,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181701156640',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447837275,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181701292415',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447837289,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181703402553',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447837420,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181704066211',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447837446,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181705067148',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447837506,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181708134282',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447837693,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181714132329',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447838053,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181731181944',0,NULL,1,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1447839078,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181733151175',0,NULL,1,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1447839195,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181745361721',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447839936,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181753599521',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447840439,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181755008307',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447840500,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181802017879',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447840921,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511181805289414',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447841128,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511190915588419',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447895758,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511190944086915',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447897448,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511191101274816',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447902087,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511191102392173',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447902159,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511191102589391',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447902178,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511191106544932',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447902414,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511191108447041',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447902524,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511191110373853',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447902637,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511191112007866',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447902720,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511191114456123',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447902885,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511191115069038',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447902906,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆|双线1服',NULL,NULL,NULL),('201511191117067354',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447903026,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191117459628',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447903065,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191121224702',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447903282,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191133535051',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447904033,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191137527977',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447904272,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191138322290',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447904312,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191234536419',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447907693,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191237081371',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447907828,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191242325984',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447908152,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191248426244',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447908522,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191302131691',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447909333,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191302352097',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447909355,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191304377249',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447909477,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191305107136',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447909510,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511191306126728',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447909572,0,0,1,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服','CMB','031511190396757',NULL),('201511201339002012',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1447997940,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511201550334138',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1448005833,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511201554207108',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1448006060,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511201556255892',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1448006185,0,0,1,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服','CMB','031511200416948',NULL),('201511211357407468',0,NULL,1,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448085460,0,0,0,'127.0.0.1','unkown',10,1,'热血海贼王-双线1服',NULL,NULL,NULL),('201511211519352487',0,NULL,1,'xtceetg','网上银行（盛付通）',1,1.00,1.00,000000000000,1448090375,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511231613348994',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448266414,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511231613553291',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448266435,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511231614297922',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448266469,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511231750511176',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448272251,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511231752545343',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448272374,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241255274900',0,NULL,1,'xtceetg','联通充值卡（盛付通）',3,1.00,0.97,000000000003,1448340927,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241257287297',0,NULL,1,'xtceetg','联通充值卡（盛付通）',3,1.00,0.97,000000000003,1448341048,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241258182811',0,NULL,1,'xtceetg','联通充值卡（盛付通）',3,1.00,0.97,000000000003,1448341098,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241258469029',0,NULL,1,'xtceetg','联通充值卡（盛付通）',3,1.00,0.97,000000000003,1448341126,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241259144973',0,NULL,1,'xtceetg','电信充值卡（盛付通）',4,5.00,4.85,000000000003,1448341154,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241300208220',0,NULL,1,'xtceetg','电信充值卡（盛付通）',4,5.00,4.85,000000000003,1448341220,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241301216131',0,NULL,1,'xtceetg','电信充值卡（盛付通）',4,5.00,4.85,000000000003,1448341281,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241302006275',0,NULL,1,'xtceetg','电信充值卡（盛付通）',4,5.00,4.85,000000000003,1448341320,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241303145201',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448341394,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241304148868',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448341454,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241305155475',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448341515,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241305476508',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448341547,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241306493336',0,NULL,1,'xtceetg','联通充值卡（盛付通）',3,50.00,48.50,000000000003,1448341609,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241308191109',0,NULL,1,'xtceetg','联通充值卡（盛付通）',3,50.00,48.50,000000000003,1448341699,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241314282393',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448342068,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241317576111',0,NULL,1,'xtceetg','联通充值卡（盛付通）',3,50.00,48.50,000000000003,1448342277,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241319432601',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448342383,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241321352639',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448342495,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241408081179',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448345288,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241408244570',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448345304,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241435037953',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448346903,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241435231849',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448346923,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511241436224386',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448346982,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251324453006',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429085,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251325231244',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429123,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251326163449',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429176,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251327306339',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429250,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251327321629',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429252,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251327334861',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429253,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251327549165',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429274,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251328108877',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429290,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251328214067',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429301,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251328466419',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429326,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251329001388',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429340,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511251329199544',0,NULL,1,'xtceetg','移动充值卡（盛付通）',2,50.00,48.50,000000000003,1448429359,0,0,0,'127.0.0.1','unkown',30,1,'风暴大陆-双线1服',NULL,NULL,NULL),('201511271445214940',0,NULL,4211,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448606721,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271446119946',0,NULL,4211,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448606771,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271446406761',0,NULL,4211,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448606800,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271447394386',0,NULL,4211,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448606859,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271447588098',0,NULL,4211,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448606878,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271448163309',0,NULL,4211,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448606896,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271448495806',0,NULL,4211,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448606929,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271449087923',0,NULL,4211,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448606948,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271449241254',0,NULL,4211,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448606964,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271450444192',0,NULL,4211,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448607044,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271450576154',0,NULL,4211,'xtceetg','网上银行（盛付通）',1,5.00,5.00,000000000000,1448607057,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271451213746',0,NULL,4211,'xtceetg','移动充值卡（盛付通）',2,5.00,4.85,000000000003,1448607081,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271453215629',0,NULL,4211,'xtceetg','移动充值卡（盛付通）',2,5.00,4.85,000000000003,1448607201,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271453365221',0,NULL,4211,'xtceetg','天宏一卡通（盛付通）',6,10.00,8.50,000000000015,1448607216,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271458329555',0,NULL,4211,'xtceetg','移动充值卡（盛付通）',2,30.00,29.10,000000000003,1448607512,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271459377207',0,NULL,4211,'xtceetg','移动充值卡（盛付通）',2,30.00,29.10,000000000003,1448607577,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511271500077844',0,NULL,4211,'xtceetg','移动充值卡（盛付通）',2,10.00,9.70,000000000003,1448607607,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201511301748428632',0,NULL,4211,'xtceetg','微信支付',17,5.00,5.00,000000000000,1448876922,0,0,0,'127.0.0.1','unkown',31,1,'傲天降魔-双线1服',NULL,NULL,NULL),('201512211310003869',39,'管理员',4211,'xtceetg','内充',18,1.00,1.00,000000000000,1450674600,0,0,1,'127.0.0.1','unkown',33,1,'联盟英雄|双线1服',NULL,NULL,'fsdfsd'),('20160913140748885',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473746868,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131408288155',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473746908,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('20160913140838310',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473746918,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131409035944',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473746943,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131409527548',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473746992,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131410563350',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473747056,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131418063894',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473747486,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131418203311',0,NULL,1,'xtceetg','支付宝',1,1.00,1.00,000000000000,1473747500,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131422564065',0,NULL,1,'xtceetg','支付宝',1,1.00,1.00,000000000000,1473747776,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131426095355',0,NULL,1,'xtceetg','支付宝',1,1.00,1.00,000000000000,1473747969,1473782010,1,1,'119.96.8.227','110.75.225.154',3,1,'页游三国|双线1服','2016091321001004090252756272',NULL,''),('201609131532496356',0,NULL,1,'xtceetg','支付宝',1,1.00,1.00,000000000000,1473751969,1473764347,1,1,'119.96.8.227','110.75.225.43',3,1,'页游三国|双线1服','2016091321001004090256532614',NULL,''),('201609131539039332',0,NULL,1,'xtceetg','支付宝',1,1.00,1.00,000000000000,1473752343,1473757406,1,1,'119.96.8.227','110.75.225.241',3,1,'页游三国|双线1服','2016091321001004090252759684',NULL,''),('201609131542541352',0,NULL,1,'xtceetg','支付宝',1,1.00,1.00,000000000000,1473752574,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131607581741',0,NULL,2,'kevin123','支付宝',1,1.00,1.00,000000000000,1473754078,1473759735,1,1,'183.16.190.29','110.75.248.213',3,1,'页游三国|双线1服','2016091321001004680200047094',NULL,''),('201609131632297294',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473755549,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131634222600',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473755662,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131644484893',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473756288,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609131655575257',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473756957,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609132141332691',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1473774093,0,0,0,'183.16.190.29','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609132141532980',0,NULL,2,'kevin123','支付宝',1,1.00,1.00,000000000000,1473774113,0,0,0,'183.16.190.29','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('20160913214210891',0,NULL,2,'kevin123','网上银行（盛付通）',2,1.00,1.00,000000000000,1473774130,0,0,0,'183.16.190.29','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141013354700',0,NULL,1,'xtceetg','支付宝',1,1.00,1.00,000000000000,1473819215,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141013571084',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473819237,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('20160914104301172',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473820981,1473821032,1,1,'119.96.8.227','140.207.54.74',3,1,'页游三国|双线1服','4004452001201609143908534840',NULL,''),('201609141047193281',0,NULL,2,'kevin123','微信支付',17,0.00,0.00,000000000000,1473821239,0,0,0,'183.16.190.29','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141049344430',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1473821374,1473821419,1,1,'183.16.190.29','140.207.54.73',3,1,'页游三国|双线1服','4001592001201609143908746358',NULL,''),('201609141052226267',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1473821542,0,0,0,'183.16.190.29','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141052241355',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1473821544,0,0,0,'183.16.190.29','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141052277839',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1473821547,0,0,0,'183.16.190.29','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141052292486',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1473821549,0,0,0,'183.16.190.29','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141052308960',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1473821550,0,0,0,'183.16.190.29','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141052328141',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1473821552,0,0,0,'183.16.190.29','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141524545997',0,NULL,1,'xtceetg','网上银行（盛付通）',2,1.00,1.00,000000000000,1473837894,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141525068423',0,NULL,1,'xtceetg','网上银行（盛付通）',2,1.00,1.00,000000000000,1473837906,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141525464783',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1473837946,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141526054368',0,NULL,1,'xtceetg','网上银行（盛付通）',2,1.00,1.00,000000000000,1473837965,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609141527282331',0,NULL,1,'xtceetg','网上银行（盛付通）',2,1.00,1.00,000000000000,1473838048,1473838340,1,1,'119.96.8.227','211.147.71.129',3,1,'页游三国|双线1服','20160914152726596071','031609140241280',''),('201609141537399698',0,NULL,1,'xtceetg','网上银行（盛付通）',2,1.00,1.00,000000000000,1473838659,1473838711,1,1,'119.96.8.227','114.80.132.9',3,1,'页游三国|双线1服','20160914153737597810','031609140241446',''),('20160914154506937',0,NULL,1,'xtceetg','网上银行（盛付通）',2,1.00,1.00,000000000000,1473839106,1473839155,1,1,'119.96.8.227','211.147.71.129',3,1,'页游三国|双线1服','20160914154504598959','031609140241560',''),('201609141550216397',0,NULL,1,'xtceetg','网上银行（盛付通）',2,1.00,1.00,000000000000,1473839421,1473839500,1,1,'119.96.8.227','114.80.132.9',3,1,'页游三国|双线1服','20160914155018599943','031609140241627',''),('201609141559541050',0,NULL,1,'xtceetg','网上银行（盛付通）',2,1.00,1.00,000000000000,1473839994,0,0,0,'119.96.8.227','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('20160918140218483',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1474178538,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181402271975',0,NULL,1,'xtceetg','支付宝',1,1.00,1.00,000000000000,1474178547,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181402382462',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1474178558,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181403048569',0,NULL,1,'xtceetg','网上银行（盛付通）',2,1.00,1.00,000000000000,1474178584,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181403199737',0,NULL,1,'xtceetg','移动充值卡（盛付通）',3,10.00,9.60,000000000000,1474178599,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181403291328',0,NULL,1,'xtceetg','联通充值卡（盛付通）',4,10.00,9.60,000000000000,1474178609,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181403374886',0,NULL,1,'xtceetg','电信充值卡（盛付通）',5,10.00,9.60,000000000000,1474178617,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181403466537',0,NULL,1,'xtceetg','骏网一卡通（盛付通）',6,10.00,8.40,000000000000,1474178626,0,0,0,'27.17.78.50','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181631408779',0,NULL,2,'kevin123','网上银行（盛付通）',2,1.00,1.00,000000000000,1474187500,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('20160918163417696',0,NULL,2,'kevin123','网上银行（盛付通）',2,0.00,0.00,000000000000,1474187657,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181635079778',0,NULL,2,'kevin123','网上银行（盛付通）',2,1.00,1.00,000000000000,1474187707,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181643318345',0,NULL,2,'kevin123','网上银行（盛付通）',2,1.00,1.00,000000000000,1474188211,1474188251,1,1,'183.16.189.57','211.147.71.129',3,1,'页游三国|双线1服','20160918164331212638','031609180294035',''),('201609181645071766',0,NULL,2,'kevin123','移动充值卡（盛付通）',3,10.00,9.60,000000000000,1474188307,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181645519278',0,NULL,2,'kevin123','移动充值卡（盛付通）',3,10.00,9.60,000000000000,1474188351,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181645532577',0,NULL,2,'kevin123','移动充值卡（盛付通）',3,10.00,9.60,000000000000,1474188353,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181645542859',0,NULL,2,'kevin123','移动充值卡（盛付通）',3,10.00,9.60,000000000000,1474188354,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181646013651',0,NULL,2,'kevin123','联通充值卡（盛付通）',4,10.00,9.60,000000000000,1474188361,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181646201646',0,NULL,2,'kevin123','电信充值卡（盛付通）',5,10.00,9.60,000000000000,1474188380,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181648221479',0,NULL,2,'kevin123','骏网一卡通（盛付通）',6,1.00,0.84,000000000000,1474188502,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181651458701',0,NULL,2,'kevin123','微信支付',17,0.00,0.00,000000000000,1474188705,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181652401876',0,NULL,2,'kevin123','支付宝',1,0.00,0.00,000000000000,1474188760,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('20160918165253298',0,NULL,2,'kevin123','网上银行（盛付通）',2,0.00,0.00,000000000000,1474188773,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181653132790',0,NULL,2,'kevin123','联通充值卡（盛付通）',4,0.00,0.00,000000000000,1474188793,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181653207237',0,NULL,2,'kevin123','电信充值卡（盛付通）',5,0.00,0.00,000000000000,1474188800,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181653262640',0,NULL,2,'kevin123','骏网一卡通（盛付通）',6,0.00,0.00,000000000000,1474188806,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181653356466',0,NULL,2,'kevin123','征途卡（盛付通）',10,0.00,0.00,000000000000,1474188815,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181653416290',0,NULL,2,'kevin123','盛大卡（盛付通）',16,0.00,0.00,000000000000,1474188821,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181654491051',0,NULL,2,'kevin123','微信支付',17,0.00,0.00,000000000000,1474188889,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181656595260',0,NULL,2,'kevin123','微信支付',17,0.00,0.00,000000000000,1474189019,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181657266272',0,NULL,2,'kevin123','支付宝',1,0.00,0.00,000000000000,1474189046,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181746521699',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1474192012,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181802116462',0,NULL,2,'kevin123','网上银行（盛付通）',2,1.00,1.00,000000000000,1474192931,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181807419835',0,NULL,2,'kevin123','支付宝',1,100000.00,100000.00,000000000000,1474193261,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181807589203',0,NULL,2,'kevin123','微信支付',17,100000.00,100000.00,000000000000,1474193278,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181808175028',0,NULL,2,'kevin123','支付宝',1,100000.00,100000.00,000000000000,1474193297,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609181808291138',0,NULL,2,'kevin123','微信支付',17,100000.00,100000.00,000000000000,1474193309,0,0,0,'183.16.189.57','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('20160918193601650',0,NULL,1,'xtceetg','微信支付',17,1.00,1.00,000000000000,1474198561,0,0,0,'59.172.58.252','unkown',3,1,'页游三国|双线1服',NULL,NULL,''),('201609191755263142',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1474278926,0,0,0,'119.123.164.30','unkown',3,1,'斗三国|双线1服',NULL,NULL,''),('201609191828399588',0,NULL,2,'kevin123','支付宝',1,1.00,1.00,000000000000,1474280919,0,0,0,'119.123.164.30','unkown',1,1,'怒海风云|双线1服',NULL,NULL,''),('201609191828529468',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1474280932,1474280962,1,1,'119.123.164.30','140.207.54.75',1,1,'怒海风云|双线1服','4001592001201609194380571917',NULL,''),('20160919195535223',0,NULL,2,'kevin123','微信支付',17,1.00,1.00,000000000000,1474286135,0,0,0,'119.123.164.30','unkown',1,1,'怒海风云|双线1服',NULL,NULL,''),('201609191956321991',0,NULL,6,'kevin125','支付宝',1,30.00,30.00,000000000000,1474286192,0,0,0,'119.123.164.30','unkown',3,1,'斗三国|双线1服',NULL,NULL,''),('201609210954465324',0,NULL,2,'kevin123','网上银行（盛付通）',2,1.00,1.00,000000000000,1474422886,0,0,0,'119.123.165.197','unkown',3,1,'斗三国|双线1服',NULL,NULL,''),('201609271000374051',0,NULL,11,'abcd1234','微信支付',17,1.00,1.00,000000000000,1474941637,0,1,1,'119.96.10.66','unkown',3,1,'斗三国|双线1服',NULL,NULL,'');
/*!40000 ALTER TABLE `pay_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paytype`
--

DROP TABLE IF EXISTS `paytype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paytype` (
  `id` tinyint(4) unsigned NOT NULL,
  `typename` varchar(20) NOT NULL DEFAULT '',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序，越大越靠前',
  `flag` tinyint(1) unsigned DEFAULT '1' COMMENT '1开启，0关闭',
  `fee` decimal(5,0) unsigned NOT NULL DEFAULT '0' COMMENT '手续费，去掉了百分号',
  `paytag` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='充值方式表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paytype`
--

LOCK TABLES `paytype` WRITE;
/*!40000 ALTER TABLE `paytype` DISABLE KEYS */;
INSERT INTO `paytype` VALUES (2,'网上银行（盛付通）',15,1,0,'sheng'),(3,'移动充值卡（盛付通）',14,1,4,'shenCard'),(4,'联通充值卡（盛付通）',13,1,4,'shenCard'),(5,'电信充值卡（盛付通）',12,1,4,'shenCard'),(6,'骏网一卡通（盛付通）',11,1,16,'shenCard'),(7,'天宏一卡通（盛付通）',10,0,16,'shenCard'),(8,'天下一卡通（盛付通）',9,0,16,'shenCard'),(9,'纵游一卡通（盛付通）',8,0,16,'shenCard'),(10,'征途卡（盛付通）',7,1,16,'shenCard'),(11,'Q币卡（盛付通）',6,0,16,'shenCard'),(12,'网易卡（盛付通）',5,0,16,'shenCard'),(13,'完美卡（盛付通）',4,0,16,'shenCard'),(14,'久游卡（盛付通）',3,0,16,'shenCard'),(15,'搜狐卡（盛付通）',2,0,16,'shenCard'),(16,'盛大卡（盛付通）',1,1,16,'shenCard'),(1,'支付宝',16,1,0,'alipay'),(17,'微信支付',17,1,0,'wxpay'),(18,'内充',18,0,0,'selfpay');
/*!40000 ALTER TABLE `paytype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_access`
--

DROP TABLE IF EXISTS `role_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_access` (
  `role_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_access`
--

LOCK TABLES `role_access` WRITE;
/*!40000 ALTER TABLE `role_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server`
--

DROP TABLE IF EXISTS `server`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server` (
  `server_id` smallint(4) unsigned NOT NULL COMMENT '分区号，最大为65535个分区，该值针对某一款游戏为唯一值',
  `game_id` smallint(6) NOT NULL COMMENT '游戏ID，对应于game_list表',
  `server_name` varchar(100) NOT NULL,
  `start_time` int(10) unsigned NOT NULL COMMENT '开放时间',
  `state` tinyint(4) NOT NULL COMMENT '服务器状态1为开启，0为关闭',
  `ip` varchar(45) NOT NULL,
  `domain` varchar(255) NOT NULL COMMENT '使用域名',
  `server_key` varchar(20) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`server_id`,`game_id`),
  KEY `game_id_order_area_num` (`server_id`,`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='游戏服务器列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server`
--

LOCK TABLES `server` WRITE;
/*!40000 ALTER TABLE `server` DISABLE KEYS */;
INSERT INTO `server` VALUES (1,3,'双线1服',1473066000,1,'','','',1473066440,1473062428),(1,1,'双线1服',1474254997,1,'','','',1474255013,1474255013);
/*!40000 ALTER TABLE `server` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tg_game_info`
--

DROP TABLE IF EXISTS `tg_game_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tg_game_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refname` varchar(50) NOT NULL,
  `refurl` varchar(255) NOT NULL DEFAULT '',
  `shorturl` varchar(255) NOT NULL DEFAULT '',
  `game_id` int(11) NOT NULL,
  `area_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tg_game_info`
--

LOCK TABLES `tg_game_info` WRITE;
/*!40000 ALTER TABLE `tg_game_info` DISABLE KEYS */;
INSERT INTO `tg_game_info` VALUES (1,'steven1','http://tg.123slg.com/dsguo/?game_id=3&server_id=0&refer=1','http://t.cn/RVbTM77',3,1),(2,'jordan','http://tg.123slg.com/dsguo/?game_id=3&server_id=1&refer=2','http://t.cn/RVbTMyb',3,1),(3,'michael','http://tg.123slg.com/dsguo/?game_id=3&server_id=1&refer=3','http://t.cn/RVbTMqp',3,1);
/*!40000 ALTER TABLE `tg_game_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(20) NOT NULL COMMENT '用户名（目前使用16位）',
  `password` varchar(74) NOT NULL COMMENT '密码，该密码为一个特殊值，算法为 sha1(随机码+原始密码)\r\n                        得到的值格式为 随机码+$+加密后的密码',
  `reg_ip` varchar(45) NOT NULL DEFAULT 'unkown',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间，为linux时间戳',
  `login_times` mediumint(8) unsigned NOT NULL DEFAULT '1' COMMENT '登陆次数',
  `last_ip` varchar(45) NOT NULL DEFAULT 'unkown',
  `last_time` int(10) unsigned NOT NULL DEFAULT '0',
  `refer` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '注册来源类型，如果为0则表示为网站注册',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='用户信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'xtceetg','$2y$13$8n.wvLPtCY5JaarZapZrceKOhaVQUSjAMn8g11dJVrPel0ZG7izFe','127.0.0.1',1472635434,52,'119.96.9.109',1476156782,0),(2,'kevin123','$2y$13$kiemxYcCbJ/7DIohfY86zeCPWMyfC8BOmGb4/hJ51WPK3Vuy/U3p.','119.123.164.146',1473242583,66,'183.16.195.111',1475899879,0),(3,'jonerlove','$2y$13$ShqL.mr7pDkndh8t3QIWPuTBPzBuRExUr9WslH0u7My6ca8jNkvL2','119.123.164.146',1473243661,1,'unkown',0,0),(4,'jordan','$2y$13$J1cAhWzmYY5gDG6Btgab7eKagIfwRqZc.olv1ObHOt4xFPIIxjlMy','27.17.137.166',1473411947,1,'unkown',0,0),(5,'kevin124','$2y$13$1R7JjbPgGysAvxArHwsA4eef5s4lxk328xx5.KYH3J.gcRIvkmPvW','183.16.193.89',1473668639,6,'119.123.164.30',1474336639,0),(6,'kevin125','$2y$13$RcTTd6apbRLyiG.2Hd6sceL4bC8gv5XoHDWCt/AgPl/K/u6O3j4i.','183.16.193.89',1473668690,3,'119.123.164.30',1474336482,0),(7,'kevin126','$2y$13$RKLr7P1rRrAaqOCzq.5XK.0/slmeUcFj18DOLtXtftB1CJYUeGXc.','183.16.193.89',1473668746,2,'119.123.164.30',1474286024,0),(8,'steven','$2y$13$rN6FadI05or6IXBGmZdaJeB5j.KZbQ7LZu/4YSsUJBX0zsljp0aM2','27.17.137.224',1474515514,1,'unkown',0,1),(9,'qq286575099','$2y$13$/zz4iFXgfkTw1x8bY/9XO.u5eiF8RDks8llRztITM1EUCn6d6YW/C','119.123.165.197',1474549209,1,'unkown',0,1),(10,'qq789456','$2y$13$bIn8NsXPyl5XjcdXOZqyy.qtLCZXv.0E7xy10hAat7TXK1dqImRFe','119.96.10.66',1474710203,1,'unkown',0,2),(11,'abcd1234','$2y$13$QABHBi/j0VyV99vvZEdoL.kDZLnyhnUojQopvlueKc3VcT/R2FlgG','119.96.10.66',1474941528,1,'unkown',0,3),(12,'mahua1987ma','$2y$13$PZlETSTgwU5iUug7LCqKLej4ZuLSDJrIMYQIH8MTGx6GbkoMoEWg6','27.225.182.88',1474976288,1,'unkown',0,0),(13,'abcd45678','$2y$13$jBqawxc2i6gAc21vqH46rOkNednElNtgxv/cTusQfO/tR.3tz3BZ.','27.17.137.224',1475034120,1,'unkown',0,3),(14,'abcd789456','$2y$13$4X6LN3Q2Xhg4FwlYHudRyOA8eJFJtKKdxFfLX5spkjCm3t3PMxv9O','27.17.137.224',1475034150,1,'unkown',0,3),(15,'abcd7878','$2y$13$otVAr.K0M8dfKOKLMDtM3ezzTrrxMS1CxPMPxUgwf4Rg0nxvlsLyi','27.17.137.224',1475034180,1,'unkown',0,3),(16,'dav1944','$2y$13$Lz63A3DBZXjgjuMJ2gVBjuQfBldHEpTvTwdKdFP8bmMX5KdPFXqhq','119.136.85.113',1475054212,1,'unkown',0,0),(17,'二傻哥','$2y$13$BKcxLm2x7r5UN8t.pROki.1rbj9otPyS56XgMGrVr5uVLYSZcRaz6','218.93.131.165',1475075514,1,'unkown',0,0),(18,'dtfghtrh','$2y$13$Ou3yUZENXZ.xAWudlpB6KuaBBvoKkQovIsNz39Expg6qogsGAzu5i','116.226.116.78',1475674249,1,'unkown',0,0),(19,'jordan1','$2y$13$KNYDFZC9PWh39LU7swCXMO.DGMKlGHUZOntPsmMkXj0B0GdB7QMA.','119.96.9.109',1476157451,1,'unkown',0,1),(20,'jordan2','$2y$13$Gy/GEZ8YIUqo/AYMQQciFeTlQM79MH8K1MaQTEts8Z21uKaODQjKS','119.96.9.109',1476157487,1,'unkown',0,1),(21,'jordan3','$2y$13$Sd0ZMq9gXvxEiHGlHoja8.wN8XxYUzPM5cKtyR8J/IaiocrAe95Ja','119.96.9.109',1476157620,1,'unkown',0,1),(22,'xuanfeng007','$2y$13$kJVyxhDb6t7yxvdbUVz0guaHNxEfpYNes1mx8NKGvj6RqsfPwS67i','119.136.97.94',1476325442,2,'119.136.97.94',1476325511,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `uid` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `real_name` varchar(20) NOT NULL COMMENT '真实姓名',
  `idCard` varchar(40) NOT NULL COMMENT '证件号，现实生活中的证件，如身份证等',
  `isbind` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0未绑定，1绑定',
  `reg_email` varchar(255) NOT NULL DEFAULT '' COMMENT '注册邮箱',
  `isAuth` tinyint(10) unsigned NOT NULL DEFAULT '0' COMMENT '是否通过成年人认证',
  `btime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '绑定申请时间30分钟过期',
  `consistency` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0未验证，1验证',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `idCard` (`idCard`),
  UNIQUE KEY `email` (`reg_email`),
  UNIQUE KEY `ver_email` (`isbind`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (1,'张能胜','420102198210131432',1,'steven_1824068@qq.com',0,1472788628,0),(12,'马清华','622322198708150038',0,'444540699@qq.com',0,0,0);
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wheel`
--

DROP TABLE IF EXISTS `wheel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wheel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wheel`
--

LOCK TABLES `wheel` WRITE;
/*!40000 ALTER TABLE `wheel` DISABLE KEYS */;
INSERT INTO `wheel` VALUES (1,1,'/upload/dyj/20160905155159.jpg',1473061920,1473061920),(2,2,'/upload/dyj/20160905155529.jpg',1473062130,1473062130),(3,3,'/upload/dyj/20160905155926.jpg',1473062368,1473062368);
/*!40000 ALTER TABLE `wheel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `slg123`
--

USE `slg123`;

--
-- Final view structure for view `cps_pay`
--

/*!50001 DROP VIEW IF EXISTS `cps_pay`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cps_pay` AS select `cps_member`.`id` AS `id`,`cps_member`.`username` AS `cpsname`,`cps_member`.`pid` AS `pid`,`cps_member`.`active` AS `active`,`cps_log`.`refer` AS `refer`,`pay_log`.`order_num` AS `order_num`,`pay_log`.`uid` AS `uid`,`pay_log`.`username` AS `username`,`pay_log`.`pay_uid` AS `pay_uid`,`pay_log`.`pay_username` AS `pay_username`,`pay_log`.`paytypename` AS `paytypename`,`pay_log`.`paytype` AS `paytype`,`pay_log`.`pay_cny` AS `pay_cny`,`pay_log`.`pay_time` AS `pay_time`,`pay_log`.`flag` AS `flag`,`pay_log`.`pay_ip` AS `pay_ip`,`pay_log`.`comfirm_ip` AS `comfirm_ip`,`pay_log`.`gid` AS `gid`,`pay_log`.`sid` AS `sid`,`pay_log`.`discript` AS `discript`,`pay_log`.`flag_game` AS `flag_game` from ((((`cps_log` join `cps_member`) join `tg_game_info`) join `game_login_log`) join `pay_log`) where ((`cps_log`.`cps_id` = `cps_member`.`id`) and (`tg_game_info`.`id` = `cps_log`.`refer`) and (`game_login_log`.`refer` = `tg_game_info`.`id`) and (`game_login_log`.`game_id` = `tg_game_info`.`game_id`) and (`game_login_log`.`server_id` = `tg_game_info`.`area_num`) and (`game_login_log`.`uid` = `pay_log`.`pay_uid`) and (`game_login_log`.`username` = `pay_log`.`pay_username`) and (`game_login_log`.`game_id` = `pay_log`.`gid`) and (`game_login_log`.`server_id` = `pay_log`.`sid`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-17 20:56:09
