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
-- Table structure for table `tblcollege`
--

DROP TABLE IF EXISTS `tblcollege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcollege` (
  `collegeId` int NOT NULL AUTO_INCREMENT,
  `collegeName` varchar(60) DEFAULT NULL,
  `universityId` int DEFAULT NULL,
  `collegeShortCode` varchar(15) DEFAULT NULL,
  `DTECode` varchar(60) DEFAULT NULL,
  `DTERegieon` varchar(60) DEFAULT NULL,
  `District` varchar(60) DEFAULT NULL,
  `Taluka` varchar(60) DEFAULT NULL,
  `Pincode` varchar(10) DEFAULT NULL,
  `CollegeEmail` varchar(255) DEFAULT NULL,
  `CollegeContact` varchar(20) DEFAULT NULL,
  `Poc` varchar(60) DEFAULT NULL,
  `OfficeNumber` varchar(20) DEFAULT NULL,
  `PersonalNumber` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`collegeId`),
  KEY `universityID_idx` (`universityId`),
  CONSTRAINT `tblcollege_ibfk_1` FOREIGN KEY (`universityId`) REFERENCES `tbluniversity` (`universityID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcollege`
--

LOCK TABLES `tblcollege` WRITE;
/*!40000 ALTER TABLE `tblcollege` DISABLE KEYS */;
INSERT INTO `tblcollege` VALUES (1,'Abasaheb Garware College',1,'AbaGar',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Poona College',1,'PC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Fergusson College',1,'FC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'St. Xavier College',2,'SXC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Mithibai College of Arts',2,'MCofA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'KJSAC Mumbai',2,'KJSAC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'Narakes Panhala Public School and Jr. College',3,'NPPS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Rajaram College,KOLHAPUR',3,'RCKol',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Gopal Krishna Gokhale College,Subhash Road',3,'GKGC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'jedh college',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'MMCC',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'bharati vidyapeeth',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,'hvdesai',30,'hvd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'MMCC',30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'Sir Parshuram College,PUNE',30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'shahu college,satara uni',17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'raje clg, satara university',49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,'111',35,NULL,'1','','1','1','1','1','2','2','2','2'),(56,'furguison college, mumbai',45,NULL,'67889','1','1','1','1','1','1','1','1','1'),(57,'11',50,NULL,'1','','1','1','1','1','1','1','1','1'),(58,'1',47,NULL,'1','','1','1','1','1','1','1','1','1'),(59,'q',47,NULL,'','y','y','y','y','y','y','y','y','y'),(60,'1',50,NULL,'','','','','','','','','','');
/*!40000 ALTER TABLE `tblcollege` ENABLE KEYS */;
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
