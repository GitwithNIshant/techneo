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
-- Table structure for table `tblbook`
--

DROP TABLE IF EXISTS `tblbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblbook` (
  `bookId` int NOT NULL AUTO_INCREMENT,
  `bookName` varchar(60) DEFAULT NULL,
  `bookCode` varchar(15) DEFAULT NULL,
  `courseId` int DEFAULT NULL,
  `AcademicYear` varchar(15) DEFAULT NULL,
  `GraduationYear` varchar(15) DEFAULT NULL,
  `Semister` varchar(15) DEFAULT NULL,
  `BookPrice` decimal(5,2) DEFAULT NULL,
  `BookShortCode` varchar(15) DEFAULT NULL,
  `universityID` int DEFAULT NULL,
  PRIMARY KEY (`bookId`),
  KEY `courseId_idx` (`courseId`),
  KEY `universityID` (`universityID`),
  CONSTRAINT `tblbook_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `tblcourse` (`courseId`),
  CONSTRAINT `tblbook_ibfk_2` FOREIGN KEY (`universityID`) REFERENCES `tbluniversity` (`universityID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblbook`
--

LOCK TABLES `tblbook` WRITE;
/*!40000 ALTER TABLE `tblbook` DISABLE KEYS */;
INSERT INTO `tblbook` VALUES (1,'C Language','CLan11',3,NULL,NULL,NULL,NULL,NULL,NULL),(2,'BASIC ELECTRICAL ENGINEERING','BEEng',1,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Test5','T6',1,NULL,NULL,NULL,NULL,NULL,NULL),(5,'C Language','CLan',5,NULL,NULL,NULL,NULL,NULL,NULL),(6,'BASIC ELECTRICAL ENGINEERING','BEEng',1,NULL,NULL,NULL,NULL,NULL,NULL),(7,'BASIC ELECTRICAL ENGINEERING','BEEng',1,NULL,NULL,NULL,NULL,NULL,NULL),(8,'C Language','CLan',5,NULL,NULL,NULL,NULL,NULL,NULL),(11,'3','3',1,NULL,NULL,NULL,NULL,NULL,NULL),(13,'C Language','CLan',1,NULL,NULL,NULL,NULL,NULL,NULL),(14,'1','1',1,NULL,NULL,NULL,NULL,NULL,NULL),(15,'DBMS','db',26,NULL,NULL,NULL,NULL,NULL,NULL),(16,'xaj','huguj',1,NULL,NULL,NULL,NULL,NULL,NULL),(17,'u','u',1,NULL,NULL,NULL,NULL,NULL,NULL),(19,'jh','jj',1,NULL,NULL,NULL,NULL,NULL,NULL),(20,'C Language','T4',5,NULL,NULL,NULL,NULL,NULL,NULL),(21,'maths','m1',67,NULL,NULL,NULL,NULL,NULL,NULL),(22,'geography','geo001',68,'2012','','',0.00,NULL,NULL),(23,'1','1',67,'1','','',0.00,NULL,NULL),(24,'1','1',67,'1','','',0.00,NULL,NULL),(25,'1','1',67,'1','1','ThirdYear',12.00,NULL,NULL),(26,'11','1',68,'1','1','SecondYear',99.99,NULL,NULL),(27,'1','1',69,'1','1','First Year',1.00,NULL,NULL),(28,'h','hh',67,'h','h','Second Year',99.00,NULL,NULL),(29,'p','p',67,'p','p','Second Year',77.00,NULL,NULL),(30,'o','o',67,'o','o','Second Year',0.00,NULL,NULL),(31,'8','8',67,'8','8','First Year',9.00,NULL,NULL),(32,'C Language','geo001',67,'2012','First Year','Fourth Year',55.00,NULL,43),(33,'C Language','geo001',68,'2012','Second Year','Fifth Year',999.00,NULL,54);
/*!40000 ALTER TABLE `tblbook` ENABLE KEYS */;
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
