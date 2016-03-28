
Use GSC12

-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: atr.eng.utah.edu    Database: GSC12
-- ------------------------------------------------------
-- Server version	5.6.22

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
-- Table structure for table `Addresses`
--

DROP TABLE IF EXISTS `Addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Addresses` (
  `UserID` int(11) NOT NULL,
  `Address` text NOT NULL,
  `SerialNumbr` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`SerialNumbr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Addresses`
--

LOCK TABLES `Addresses` WRITE;
/*!40000 ALTER TABLE `Addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `Addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cookies`
--

DROP TABLE IF EXISTS `Cookies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cookies` (
  `CookieKey` varchar(20) NOT NULL,
  `CookieName` text NOT NULL,
  `Image` text NOT NULL,
  PRIMARY KEY (`CookieKey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cookies`
--

LOCK TABLES `Cookies` WRITE;
/*!40000 ALTER TABLE `Cookies` DISABLE KEYS */;
INSERT INTO `Cookies` VALUES ('dosidos','Do-Si-Dos','dosidos.jpg'),('dulce','Dulce de Leche','dulce.jpg'),('lemoncreme','Lemon Chalet Cremes','lemoncreme.jpg'),('samoas','Samoas','samoas.jpg'),('tagalongs','Tagalongs','tagalons.jpg'),('thanks','Thank U Berry Munch','thanks.jpg'),('thinmints','Thin Mints','thinmints.jpg'),('trefoils','Trefoils','trefoils.jpg');
/*!40000 ALTER TABLE `Cookies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OrderInfo`
--

DROP TABLE IF EXISTS `OrderInfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OrderInfo` (
  `OrderNum` int(11) NOT NULL,
  `CookieKey` varchar(20) NOT NULL,
  `Quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`OrderNum`,`CookieKey`),
  KEY `FK1` (`CookieKey`),
  KEY `FK2` (`OrderNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OrderInfo`
--

LOCK TABLES `OrderInfo` WRITE;
/*!40000 ALTER TABLE `OrderInfo` DISABLE KEYS */;
INSERT INTO `OrderInfo` VALUES (17,'dosidos',123),(20,'dulce',2),(20,'thanks',4),(22,'dulce',3),(24,'dosidos',12),(25,'dosidos',1357),(25,'dulce',5),(25,'samoas',1231),(27,'dosidos',100),(33,'dosidos',22);
/*!40000 ALTER TABLE `OrderInfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Orders` (
  `UserID` int(11) NOT NULL,
  `OrderNum` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`OrderNum`),
  KEY `FK3` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orders`
--

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
INSERT INTO `Orders` VALUES (24,17),(26,18),(26,19),(26,20),(26,21),(27,28),(27,29),(27,30),(27,31),(27,32),(27,33),(27,34),(27,35),(28,22),(31,23),(33,24),(37,25),(37,26),(37,27);
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Roles`
--

DROP TABLE IF EXISTS `Roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Roles` (
  `Role` varchar(20) NOT NULL,
  `Login` varchar(20) NOT NULL,
  PRIMARY KEY (`Role`,`Login`),
  KEY `UserKey` (`Login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Roles`
--

LOCK TABLES `Roles` WRITE;
/*!40000 ALTER TABLE `Roles` DISABLE KEYS */;
INSERT INTO `Roles` VALUES ('admin','admin'),('user','admin'),('user','bobbyboby'),('user','cushing'),('user','cushing1'),('user','germain'),('user','henryhenry'),('user','jim'),('user','joel.saupe@idfl.net'),('admin','MyAdmin'),('user','MyAdmin'),('user','roxymoxy');
/*!40000 ALTER TABLE `Roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Shipments`
--

DROP TABLE IF EXISTS `Shipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Shipments` (
  `OrderNum` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`OrderNum`),
  KEY `FK6` (`OrderNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Shipments`
--

LOCK TABLES `Shipments` WRITE;
/*!40000 ALTER TABLE `Shipments` DISABLE KEYS */;
INSERT INTO `Shipments` VALUES (18,'2015-02-04 14:33:23'),(19,'2015-02-04 14:33:25'),(20,'2015-02-04 14:33:18'),(21,'2015-02-04 14:32:44'),(22,'2015-02-12 22:01:24'),(23,'2015-05-17 20:33:36'),(24,'2015-05-17 16:46:15'),(25,'2015-05-17 18:02:02'),(26,'2015-05-17 19:17:49'),(27,'2015-05-17 21:49:23'),(28,'2015-08-31 03:22:16'),(29,'2015-10-05 01:39:16'),(30,'2015-10-05 01:43:06'),(31,'2015-10-05 12:41:22'),(32,'2015-11-11 03:53:39'),(33,'2015-11-11 03:53:28'),(34,'2015-11-11 03:53:33'),(35,'2015-11-11 10:58:33');
/*!40000 ALTER TABLE `Shipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `RealName` text NOT NULL,
  `Login` varchar(20) NOT NULL,
  `PW` text NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Login_UNIQUE` (`Login`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (26,'Jim de St. Germain','germain','germain'),(27,'admin','admin','admin'),(28,'sdf','joel.saupe@idfl.net','$2a$12$rfi4D9vttRpleATx4pzL8e9GvnGQtEUTTVLwelRn60oHqGpbjECFS'),(29,'Daniel Cushing','cushing','$2a$12$J3J21vVOMcqe/imeVOVqg.rv01zIg06TxxCyQ5HuLtYDae0nx3KXu'),(31,'Daniel Cushing','cushing1','$2a$12$yCuKyPJV18Qukw68Qc17te..X5ugCmhIBrAz6s8ZsewnYPeqvT9NC'),(32,'Bob Bobby','bobbyboby','$2a$12$DHdx1AY5jOg53NjWPiCY7./ufELVjeEW4kgWCEF/xqCYPE3EV5XzO'),(33,'roxy moxy','roxymoxy','$2a$12$VhzIg7aD6kQ4DWIFICA4ne2722rQQ2N6B4PjSb0XjcvBpsXBW4tCa'),(35,'Admin','MyAdmin','$2a$12$XcKeExkGhmYG8IMKytL2he0ft43JAoiK6GxETtOCryC5kallkHsim'),(36,'henry henry','henryhenry','$2a$12$blygrcsxCkPiICb8U/zHp.K9KZgY2mzxh96/rnPkYUtLXUuU8X.Ri'),(37,'jim','jim','$2a$12$BhUNIfqIq5X0h0NvbY.PGelr8bc4THelAO3Iu1I8ptINrOn9LtY2u');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `filename` varchar(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `loginname` varchar(45) NOT NULL,
  PRIMARY KEY (`filename`),
  KEY `k_idx` (`loginname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-03 14:57:24
