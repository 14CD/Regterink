-- MySQL dump 10.13  Distrib 8.0.12, for macos10.13 (x86_64)
--
-- Host: localhost    Database: db_regterink
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `careforschemas`
--

DROP TABLE IF EXISTS `careforschemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `careforschemas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iddoctor` int(11) DEFAULT NULL,
  `idkid` int(11) NOT NULL,
  `idowner` int(11) NOT NULL,
  `schema` blob,
  `dt_start` date DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `dt_review` date DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `extra` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `careforschemas`
--

LOCK TABLES `careforschemas` WRITE;
/*!40000 ALTER TABLE `careforschemas` DISABLE KEYS */;
/*!40000 ALTER TABLE `careforschemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idcommenton` int(11) DEFAULT NULL,
  `comment` varchar(256) DEFAULT NULL,
  `votes` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day2dayinformation`
--

DROP TABLE IF EXISTS `day2dayinformation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `day2dayinformation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idowner` int(11) DEFAULT NULL,
  `date` date DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `description` varchar(256) DEFAULT '',
  `action` varchar(256) NOT NULL DEFAULT '',
  `idkid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day2dayinformation`
--

LOCK TABLES `day2dayinformation` WRITE;
/*!40000 ALTER TABLE `day2dayinformation` DISABLE KEYS */;
/*!40000 ALTER TABLE `day2dayinformation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_event` date DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `eventname` varchar(128) NOT NULL DEFAULT '',
  `pictures` varchar(256) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles_doctors`
--

DROP TABLE IF EXISTS `profiles_doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `profiles_doctors` (
  `id` int(11) NOT NULL,
  `nickname` varchar(256) DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `proficiency` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles_doctors`
--

LOCK TABLES `profiles_doctors` WRITE;
/*!40000 ALTER TABLE `profiles_doctors` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles_doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles_kids`
--

DROP TABLE IF EXISTS `profiles_kids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `profiles_kids` (
  `id` int(11) NOT NULL,
  `nickname` varchar(256) DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `reason` varchar(1024) DEFAULT NULL,
  `idcareforschema` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles_kids`
--

LOCK TABLES `profiles_kids` WRITE;
/*!40000 ALTER TABLE `profiles_kids` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles_kids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles_owners`
--

DROP TABLE IF EXISTS `profiles_owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `profiles_owners` (
  `id` int(11) NOT NULL,
  `nickname` varchar(256) DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `picture` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles_owners`
--

LOCK TABLES `profiles_owners` WRITE;
/*!40000 ALTER TABLE `profiles_owners` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles_owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,''),(2,'');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(128) NOT NULL DEFAULT '',
  `lname` varchar(256) NOT NULL DEFAULT '',
  `email` varchar(256) NOT NULL DEFAULT '',
  `mobile` varchar(20) DEFAULT '+31 (0) 6 ',
  `roleid` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (73,'Aaron','Weggemans','aaronweggemans@hotmail.nl','0631234504',3),(74,'willem','weggemans','willem@hotmail.nl','3429480234',4),(75,'Ivy Wall','Venus Albert','qafyh@mailinator.net','32',3);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-16 11:27:23
