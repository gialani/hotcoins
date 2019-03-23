-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: hotcoin
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `Exchanges_User`
--

DROP TABLE IF EXISTS `Exchanges_User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Exchanges_User` (
  `User_ID` int(11) NOT NULL,
  `Exchange_ID` varchar(30) NOT NULL,
  `Current_Type` varchar(30) DEFAULT NULL,
  `Amount` varchar(30) DEFAULT NULL,
  `Status` varchar(1) NOT NULL,
  `Initial_USD` varchar(30) DEFAULT NULL,
  `Current_USD` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Exchange_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Exchanges_User`
--

LOCK TABLES `Exchanges_User` WRITE;
/*!40000 ALTER TABLE `Exchanges_User` DISABLE KEYS */;
INSERT INTO `Exchanges_User` VALUES (1,'1',NULL,'200','',NULL,NULL),(2,'2',NULL,'300','',NULL,NULL),(3,'3',NULL,'400','',NULL,NULL),(4,'4',NULL,'500','',NULL,NULL),(5,'5',NULL,'600','',NULL,NULL);
/*!40000 ALTER TABLE `Exchanges_User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `Name` varchar(30) DEFAULT NULL,
  `User_Id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Current_bal` varchar(30) DEFAULT NULL,
  `Of_Exchanges` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('div',1,'divpatel','01','dpatel@gmail.com','1','60'),('max',2,'mayurpatel','02','mpatel@gmail.com','2','120'),('rj',3,'rajpatel','03','rpatel@gmail.com','3','180'),('hd',4,'hetpatel','04','hpatel@gmail.com','4','240'),('bj',5,'bansaripatel','05','bpatel@gmail.com','5','300');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-23 13:24:34
