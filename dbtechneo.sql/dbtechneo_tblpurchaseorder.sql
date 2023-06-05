-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: dbtechneo
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblpurchaseorder`
--

DROP TABLE IF EXISTS `tblpurchaseorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpurchaseorder` (
  `Pid` int NOT NULL AUTO_INCREMENT,
  `Pdate` date DEFAULT NULL,
  `Pstatus` varchar(20) DEFAULT NULL,
  `collegeId` int NOT NULL,
  PRIMARY KEY (`Pid`),
  KEY `collegeId` (`collegeId`),
  CONSTRAINT `tblpurchaseorder_ibfk_1` FOREIGN KEY (`collegeId`) REFERENCES `tblcollege` (`collegeId`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpurchaseorder`
--

LOCK TABLES `tblpurchaseorder` WRITE;
/*!40000 ALTER TABLE `tblpurchaseorder` DISABLE KEYS */;
INSERT INTO `tblpurchaseorder` VALUES (4,'1970-01-01','First Year',0),(5,'1970-01-01','First Year',0),(6,'1970-01-01','Second Yea',0),(7,'1970-01-01','',0),(8,'1970-01-01','Semi Compl',0),(9,'1970-01-01','compete',0),(10,'1970-01-01','',0),(11,'1970-01-01','Semi Compl',0),(12,'2023-03-03','Semi Compl',0),(13,'2023-03-03','',0),(14,'1970-01-01','',0),(15,'2023-03-10','Semi Compl',0),(16,'2023-11-03','Semi Compl',0),(17,'1970-01-01','compete',0),(18,'1970-01-01','',0),(19,'2023-03-03','',0),(20,'2023-09-08','',0),(21,'2023-03-03','',0),(22,'1970-01-01','',0),(23,'1970-01-01','',0),(24,'1970-01-01','',0),(25,'2023-03-03','',0),(26,'2023-03-03','',0),(27,'1970-01-01','',0),(28,'2023-03-03','',0),(29,'2023-03-30','',0),(30,'2023-03-22','',0),(32,'1970-01-01','Semi Compl',0),(33,'2023-03-03','',0),(34,'2023-03-05','compete',59),(35,'2023-03-05','Semi Complete',54),(36,'2023-03-05','compete',59),(37,'2023-03-06','compete',58),(38,'2023-03-06','compete',59),(39,'2023-03-06','compete',59),(40,'2023-03-06','compete',58),(41,'2023-03-06','compete',59),(42,'2023-03-06','compete',59),(43,'2023-03-06','Semi Complete',58),(44,'2023-03-06','compete',58);
/*!40000 ALTER TABLE `tblpurchaseorder` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-08 17:29:16
