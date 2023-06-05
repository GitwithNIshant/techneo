CREATE DATABASE  IF NOT EXISTS `dbtechneo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbtechneo`;
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
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblbook`
--

DROP TABLE IF EXISTS `tblbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblbook` (
  `bookID` int NOT NULL AUTO_INCREMENT,
  `bookName` varchar(60) DEFAULT NULL,
  `bookCode` varchar(15) DEFAULT NULL,
  `courseId` int DEFAULT NULL,
  `AcademicYear` varchar(15) DEFAULT NULL,
  `GraduationYear` varchar(15) DEFAULT NULL,
  `Semister` varchar(15) DEFAULT NULL,
  `BookPrice` decimal(5,2) DEFAULT NULL,
  `BookShortCode` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`bookID`),
  KEY `courseId_idx` (`courseId`),
  CONSTRAINT `tblbook_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `tblcourse` (`courseId`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblbook`
--

LOCK TABLES `tblbook` WRITE;
/*!40000 ALTER TABLE `tblbook` DISABLE KEYS */;
INSERT INTO `tblbook` VALUES (1,'C Language','CLan11',3,NULL,NULL,NULL,NULL,NULL),(2,'BASIC ELECTRICAL ENGINEERING','BEEng',1,NULL,NULL,NULL,NULL,NULL),(4,'Test5','T6',1,NULL,NULL,NULL,NULL,NULL),(5,'C Language','CLan',5,NULL,NULL,NULL,NULL,NULL),(6,'BASIC ELECTRICAL ENGINEERING','BEEng',1,NULL,NULL,NULL,NULL,NULL),(7,'BASIC ELECTRICAL ENGINEERING','BEEng',1,NULL,NULL,NULL,NULL,NULL),(8,'C Language','CLan',5,NULL,NULL,NULL,NULL,NULL),(11,'3','3',1,NULL,NULL,NULL,NULL,NULL),(13,'C Language','CLan',1,NULL,NULL,NULL,NULL,NULL),(14,'1','1',1,NULL,NULL,NULL,NULL,NULL),(15,'DBMS','db',26,NULL,NULL,NULL,NULL,NULL),(16,'xaj','huguj',1,NULL,NULL,NULL,NULL,NULL),(17,'u','u',1,NULL,NULL,NULL,NULL,NULL),(19,'jh','jj',1,NULL,NULL,NULL,NULL,NULL),(20,'C Language','T4',5,NULL,NULL,NULL,NULL,NULL),(21,'maths','m1',67,'2022','Third Year','II',115.00,NULL),(22,'geography','geo001',68,'2012','Second Year','IV',230.00,NULL),(23,'1','1',70,'1','Second Year','V',202.00,NULL),(24,'1','1',68,'1','Second Year','VII',245.00,NULL),(25,'1','1',67,'1','1','ThirdYear',12.00,NULL),(26,'11','1',68,'1','1','SecondYear',99.99,NULL),(27,'1','1',71,'1','Third Year','IX',101.00,NULL),(28,'h','hh',67,'h','h','Second Year',99.00,NULL),(29,'p','p',67,'p','p','Second Year',77.00,NULL),(30,'no','na',68,'na','Second Year','IV',179.00,NULL),(31,'8','8',67,'8','8','First Year',9.00,NULL),(32,'C Language','geo001',67,'2012','First Year','Fourth Year',55.00,NULL),(33,'C Language','geo001',68,'2012','Second Year','Fifth Year',999.00,NULL),(34,'C Language','geo001',68,'2012','First Year','Second Year',213.00,NULL),(35,'Database ','dbms',68,'2015','Second Year','Fourth Year',250.00,NULL),(36,'1','1',67,'1','First Year','Fifth Year',545.00,NULL),(37,'big data','1',68,'1','Third Year','IV',544.00,NULL),(38,'advance java new','advjava',67,'2022','First Year','III',152.00,NULL),(39,'44','4',68,'4','Third Year','III',600.00,'4'),(40,'666','6',69,'6','Third Year','V',788.00,'6'),(41,'C Language','geo001',68,'2012','Third Year','III',478.00,'112'),(42,'a','a',67,'a','Third Year','II',45.00,'a'),(43,'C Language','geo001',67,'2012','Second Year','III',487.00,'112'),(44,'no','shjs',68,'ihihi','Third Year','III',787.00,'iibi'),(45,'Theory of Machnics 1','7845',73,'2016','Fourth Year','VIII',210.00,'tom 1'),(46,'california AI','45',75,'5','First Year','II',505.00,'4'),(47,'ng book','7',76,'7','Fifth Year','V',544.00,'7');
/*!40000 ALTER TABLE `tblbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcollege`
--

DROP TABLE IF EXISTS `tblcollege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcollege` (
  `collegeID` int NOT NULL AUTO_INCREMENT,
  `collegeName` varchar(60) DEFAULT NULL,
  `universityID` int DEFAULT NULL,
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
  PRIMARY KEY (`collegeID`),
  KEY `universityID_idx` (`universityID`),
  CONSTRAINT `tblcollege_ibfk_1` FOREIGN KEY (`universityID`) REFERENCES `tbluniversity` (`universityID`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcollege`
--

LOCK TABLES `tblcollege` WRITE;
/*!40000 ALTER TABLE `tblcollege` DISABLE KEYS */;
INSERT INTO `tblcollege` VALUES (1,'Abasaheb Garware College',1,'AbaGar',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Fergusson College',1,'FC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'St. Xavier College',2,'SXC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Mithibai College of Arts',2,'MCofA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'KJSAC Mumbai',2,'KJSAC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'Narakes Panhala Public School and Jr. College',3,'NPPS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Gopal Krishna Gokhale College,Subhash Road',3,'GKGC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'jedh college',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'MMCC',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'bharati vidyapeeth',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,'hvdesai',30,'hvd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'MMCC',30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'Sir Parshuram College,PUNE',30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'shahu college,satara uni',17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'raje clg, satara university',49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,'n.m.v college pune ',46,'nmv','1003','pune','pune','pune','411056','nmv@gmail.com','7512256455','215466131','1366131323','4643102113'),(56,'furguison college, mumbai',44,'dfgh','','','','','','','','','',''),(57,'11',35,'e33','1','','1','1','1','1','1','1','1','1'),(58,'demo change',43,'','1','','1','1','1','1','1','1','1','2'),(59,'q',47,'','','y','y','y','y','y','y','y','y','y'),(60,'1',47,'','','','','','','','','','',''),(61,'H.V Desai college, pune 411002',NULL,'HVD','1002','Maharashtra','pune','haveli','411014','HVD@GMAIL.COM','020-25412545','TRUPTI DESAI','9856425422','8545215465'),(62,'furguison college, pune',NULL,'FC','1002','PUNE','p','','','','','','',''),(63,'1',46,'1','1','1','1','1','1','2','1','1','1','1'),(65,'MMCC',45,'HVD','1002','Maharashtra','pune','haveli','411014','HVD@GMAIL.COM','020-25412545','TRUPTI DESAI','9856425422','8545215465'),(67,'asel kahitari',47,'123','1002','','pune','pune','411002','1234','1233','132','nt mahit','mahi mahit'),(68,'MMCC',45,'HVD','1002','sdfghjkl','pune','haveli','411014','HVD@GMAIL.COM','020-25412545','TRUPTI DESAI','9856425422','8545215465'),(69,'thzz',46,'HVD','1003','','pune','haveli','411014','HVD@GMAIL.COM','020-25412545','TRUPTI DESAI','9856425422','8545215465'),(70,'sdfghjkllkjvc',46,'HVD','1002','pune','pune','haveli','411014','HVD@GMAIL.COM','020-25412545','TRUPTI DESAI','uiop[poiuydfghjkl;','8545215465'),(71,'Jj',53,'j','j','j','j','j','j','j','l','j','i','i'),(72,'shahu college',35,'shc','1','1','1','1','1','1','1','1','1','1'),(73,'vishakarma college',62,'1','1','1','1','1','1','1','1','1','1','1'),(74,'Unique college pune ',53,'nisa','899896','55632','666','566','464','646','4','64','6','46'),(75,'pune college, maharastra',63,'pcm','787','pune','pune','haveli','411011','punecollege@gamil.com','9524512546','mr.raut','020-6464644','9254512545'),(76,'gandhi vidyaya gujrat ',67,'gvg','12122','gandhinagar','gandhinagar','gandhinagar','411011','ganghclg@gamail.com','12131','xyz','020565656','02054646'),(77,'ch.shahu college , kolhapur',35,'SSCK','1231','pune','pune','pune','421254','shahuclf@gmail.com','111','1','1','1'),(78,'california college america',68,'CCA','21','2','21','21','2','21','21','2','12','12'),(79,'ng college',69,'7','','7','7','7','7','7','7','7','7','');
/*!40000 ALTER TABLE `tblcollege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcourse`
--

DROP TABLE IF EXISTS `tblcourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcourse` (
  `courseId` int NOT NULL AUTO_INCREMENT,
  `courseName` varchar(60) DEFAULT NULL,
  `courseShortCode` varchar(15) DEFAULT NULL,
  `universityID` int DEFAULT NULL,
  PRIMARY KEY (`courseId`),
  KEY `universityId` (`universityID`),
  CONSTRAINT `tblcourse_ibfk_1` FOREIGN KEY (`universityID`) REFERENCES `tbluniversity` (`universityID`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcourse`
--

LOCK TABLES `tblcourse` WRITE;
/*!40000 ALTER TABLE `tblcourse` DISABLE KEYS */;
INSERT INTO `tblcourse` VALUES (67,'Bachlor of Business Administration','bba',43),(68,'Bachlor of Computer Application','bca',42),(69,'Bachlor of Business Administration ','bba',35),(70,'bachlor of computer engineeering ','becom',42),(71,'Bachlor of Arts','ba',53),(72,'DataBase Management System','DBMS',46),(73,'Bachlor of machnics','B.mac',63),(74,'bachlor engineering','becom',67),(75,'bachlor of AI','BOA',68),(76,'ng course','7',69);
/*!40000 ALTER TABLE `tblcourse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldeliverychallan`
--

DROP TABLE IF EXISTS `tbldeliverychallan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldeliverychallan` (
  `Dcid` int NOT NULL AUTO_INCREMENT,
  `Dcdate` date DEFAULT NULL,
  `Dcstatus` varchar(20) DEFAULT NULL,
  `collegeID` int DEFAULT NULL,
  `Pid` int DEFAULT NULL,
  PRIMARY KEY (`Dcid`),
  KEY `Pid` (`Pid`),
  KEY `collegeID` (`collegeID`),
  CONSTRAINT `tbldeliverychallan_ibfk_1` FOREIGN KEY (`Pid`) REFERENCES `tblpurchaseorder` (`Pid`),
  CONSTRAINT `tbldeliverychallan_ibfk_2` FOREIGN KEY (`collegeID`) REFERENCES `tblcollege` (`collegeID`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldeliverychallan`
--

LOCK TABLES `tbldeliverychallan` WRITE;
/*!40000 ALTER TABLE `tbldeliverychallan` DISABLE KEYS */;
INSERT INTO `tbldeliverychallan` VALUES (1,'2023-03-30','',54,59),(4,'2023-03-31',NULL,54,77),(6,'2023-03-31',NULL,54,76),(7,'2023-03-31',NULL,56,74),(8,'2023-03-31',NULL,58,75),(9,'2023-03-31',NULL,58,75),(10,'2023-03-31',NULL,58,73),(11,'2023-03-31',NULL,58,73),(12,'2023-03-31',NULL,58,73),(13,'2023-03-31',NULL,58,73),(14,'2023-03-31',NULL,58,73),(15,'2023-03-31',NULL,56,74),(16,'2023-03-31',NULL,56,74),(17,'2023-03-31',NULL,56,74),(18,'2023-03-31',NULL,58,73),(19,'2023-03-31',NULL,57,76),(20,'2023-03-31',NULL,58,73),(21,'2023-03-31',NULL,71,78),(22,'2023-03-31',NULL,67,77),(23,'2023-03-31',NULL,67,77),(24,'2023-03-31',NULL,67,77),(25,'2023-03-31',NULL,71,78),(26,'2023-03-31',NULL,67,77),(27,'2023-03-31',NULL,71,78),(28,'2023-03-31',NULL,71,78),(29,'2023-03-31',NULL,71,78),(30,'2023-03-31',NULL,71,78),(31,'2023-04-01',NULL,54,79),(32,'2023-04-01',NULL,71,78),(33,'2023-04-01',NULL,67,77),(34,'2023-04-01',NULL,54,79),(35,'2023-04-01',NULL,54,79),(36,'2023-04-01',NULL,71,78),(37,'2023-04-01',NULL,58,71),(38,'2023-04-01',NULL,54,79),(39,'2023-04-01',NULL,54,79),(40,'2023-04-01',NULL,71,78),(41,'2023-04-01',NULL,71,78),(42,'2023-04-01',NULL,58,73),(43,'2023-04-01',NULL,67,77),(44,'2023-04-03',NULL,67,77),(45,'2023-04-03',NULL,54,79),(46,'2023-04-03',NULL,54,79),(47,'2023-04-03',NULL,54,79),(48,'2023-04-03',NULL,54,79),(49,'2023-04-03',NULL,56,80),(50,'2023-04-03',NULL,56,80),(51,'2023-04-03',NULL,54,79),(52,'2023-04-03',NULL,72,81),(53,'2023-04-03',NULL,56,80),(54,'2023-04-03',NULL,71,78),(55,'2023-04-03',NULL,72,81),(56,'2023-04-03',NULL,73,82),(57,'2023-04-03',NULL,72,81),(58,'2023-04-06',NULL,67,77),(59,'2023-04-06',NULL,56,80),(60,'2023-04-06',NULL,71,78),(61,'2023-04-07',NULL,56,74),(62,'2023-04-07',NULL,58,73),(63,'2023-04-07',NULL,58,73),(64,'2023-04-10',NULL,56,72),(65,'2023-04-07',NULL,67,77),(66,'2023-04-07',NULL,58,75),(67,'2023-04-07',NULL,71,78),(68,'2023-04-07',NULL,56,74),(69,'2023-04-11',NULL,73,82),(70,'2023-04-07',NULL,58,75),(71,'2023-04-07',NULL,67,77),(72,'2023-04-07',NULL,73,82),(73,'2023-04-07',NULL,56,80),(74,'2023-04-08',NULL,72,81),(75,'2023-04-08',NULL,72,81),(76,'2023-04-10',NULL,56,70),(77,'2023-04-08',NULL,56,83),(78,'2023-04-08',NULL,56,83),(79,'2023-04-08',NULL,56,83),(80,'2023-04-08',NULL,73,82),(81,'2023-04-08',NULL,56,83),(82,'2023-04-08',NULL,56,83),(83,'2023-03-10',NULL,63,83),(84,'2023-04-11',NULL,73,82),(85,'2023-04-11',NULL,73,82),(86,'2023-04-10',NULL,56,83),(87,'2023-04-11',NULL,73,81),(88,'2023-04-11',NULL,68,83),(89,'2023-04-11',NULL,56,83),(90,'2023-04-11',NULL,56,83),(91,'2023-04-10',NULL,75,84),(92,'2023-04-11',NULL,68,84),(93,'2023-04-15',NULL,76,85),(94,'2023-04-15',NULL,76,85),(95,'2023-04-15',NULL,56,86),(96,'2023-04-15',NULL,78,87),(97,'2023-04-15',NULL,78,87),(98,'2023-04-15',NULL,79,88);
/*!40000 ALTER TABLE `tbldeliverychallan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldeliveryitem`
--

DROP TABLE IF EXISTS `tbldeliveryitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldeliveryitem` (
  `ItemdeliveryId` int NOT NULL AUTO_INCREMENT,
  `bookID` int DEFAULT NULL,
  `facultyID` int DEFAULT NULL,
  `deliveryquentity` int DEFAULT NULL,
  `Dcid` int DEFAULT NULL,
  PRIMARY KEY (`ItemdeliveryId`),
  KEY `bookID` (`bookID`),
  KEY `facultyID` (`facultyID`),
  KEY `Dcid` (`Dcid`),
  CONSTRAINT `tbldeliveryitem_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `tblbook` (`bookID`),
  CONSTRAINT `tbldeliveryitem_ibfk_2` FOREIGN KEY (`facultyID`) REFERENCES `tblfaculty` (`facultyID`),
  CONSTRAINT `tbldeliveryitem_ibfk_3` FOREIGN KEY (`Dcid`) REFERENCES `tbldeliverychallan` (`Dcid`)
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldeliveryitem`
--

LOCK TABLES `tbldeliveryitem` WRITE;
/*!40000 ALTER TABLE `tbldeliveryitem` DISABLE KEYS */;
INSERT INTO `tbldeliveryitem` VALUES (1,44,6,1,18),(2,44,6,1,24),(3,21,6,1,33),(4,21,3,1,33),(5,8,3,1,33),(6,22,5,6,34),(7,22,5,6,35),(8,13,6,1,36),(9,22,5,1,36),(10,22,6,1,37),(11,22,5,6,38),(12,22,5,6,39),(13,22,5,6,39),(14,13,6,1,40),(15,13,6,1,40),(16,22,5,1,40),(17,22,5,1,40),(18,13,6,1,41),(19,13,6,1,41),(20,22,5,1,41),(21,22,5,1,41),(22,22,3,1,42),(23,22,3,1,42),(24,22,3,1,42),(25,21,6,1,43),(26,21,6,1,43),(27,21,6,1,43),(28,21,3,1,43),(29,21,3,1,43),(30,21,3,1,43),(31,8,3,1,43),(32,8,3,1,43),(33,8,3,1,43),(34,21,6,1,44),(35,21,6,1,44),(36,21,6,1,44),(37,21,3,1,44),(38,21,3,1,44),(39,21,3,1,44),(40,8,3,1,44),(41,8,3,1,44),(42,8,3,1,44),(43,22,5,6,45),(44,22,5,6,45),(45,22,5,6,45),(46,22,5,6,46),(47,22,5,6,46),(48,22,5,6,46),(49,22,5,6,47),(50,22,5,6,47),(51,22,5,6,47),(52,13,10,1,44),(53,22,5,6,48),(54,22,5,6,48),(55,22,5,6,48),(56,22,5,1,48),(57,22,5,1,48),(58,22,5,1,48),(59,20,3,1,48),(60,20,3,1,48),(61,20,3,1,48),(62,7,5,1,48),(63,7,5,1,48),(64,7,5,1,48),(65,15,3,1,48),(66,15,3,1,48),(67,15,3,1,48),(68,21,6,3,48),(69,21,6,3,48),(70,21,6,3,48),(71,22,5,1,48),(72,22,5,1,48),(73,20,3,1,48),(74,20,3,1,48),(75,7,5,1,48),(76,7,5,1,48),(77,15,3,1,48),(78,15,3,1,48),(79,21,6,3,48),(80,21,6,3,48),(81,22,5,1,48),(82,20,3,1,48),(83,7,5,1,48),(84,15,3,1,48),(85,21,6,2,48),(86,22,5,1,48),(87,20,3,1,48),(88,7,5,1,48),(89,15,3,1,48),(90,21,6,3,48),(91,22,5,6,48),(92,22,5,1,48),(93,20,3,1,48),(94,7,5,1,48),(95,15,3,1,48),(96,21,6,3,48),(97,22,5,1,49),(98,22,5,1,49),(99,22,5,1,49),(100,20,3,1,49),(101,20,3,1,49),(102,20,3,1,49),(103,7,5,1,49),(104,7,5,1,49),(105,7,5,1,49),(106,15,3,1,49),(107,15,3,1,49),(108,15,3,1,49),(109,21,6,3,49),(110,21,6,3,49),(111,21,6,3,49),(112,22,5,1,50),(113,22,5,1,50),(114,22,5,1,50),(115,20,3,1,50),(116,20,3,1,50),(117,20,3,1,50),(118,7,5,1,50),(119,7,5,1,50),(120,7,5,1,50),(121,15,3,1,50),(122,15,3,1,50),(123,15,3,1,50),(124,21,6,3,50),(125,21,6,3,50),(126,21,6,3,50),(127,22,5,6,51),(128,22,5,6,51),(129,22,5,6,51),(130,22,3,2,52),(131,22,5,1,53),(132,20,3,1,53),(133,7,5,1,53),(134,15,3,1,53),(135,21,6,3,53),(136,13,6,1,54),(137,22,5,1,54),(138,22,3,2,55),(139,21,6,2,56),(140,22,3,2,57),(141,21,6,1,58),(142,21,3,1,58),(143,8,3,1,58),(144,22,5,1,59),(145,20,3,1,59),(146,7,5,1,59),(147,15,3,1,59),(148,21,6,3,59),(149,13,6,1,60),(150,22,5,1,60),(151,20,5,1,61),(152,22,3,1,62),(153,22,3,1,63),(154,22,6,1,64),(155,21,6,1,65),(156,21,3,1,65),(157,8,3,1,65),(158,22,5,1,66),(159,11,3,1,66),(160,13,6,1,67),(161,22,5,1,67),(162,20,5,1,68),(163,21,6,2,69),(164,22,5,1,70),(165,11,3,1,70),(166,21,6,1,71),(167,21,3,1,71),(168,8,3,1,71),(169,21,6,2,72),(170,22,5,1,73),(171,20,3,1,73),(172,7,5,1,73),(173,15,3,1,73),(174,21,6,3,73),(175,22,3,2,74),(176,22,3,2,75),(177,21,5,1,76),(178,22,5,1,76),(179,22,3,1,76),(180,21,6,1,77),(181,21,11,1,77),(182,21,9,1,77),(183,22,6,1,77),(184,20,6,1,77),(185,22,5,1,77),(186,21,3,1,77),(187,21,6,1,78),(188,21,11,1,78),(189,21,9,1,78),(190,22,6,1,78),(191,20,6,1,78),(192,22,5,1,78),(193,21,3,1,78),(194,21,6,1,79),(195,21,11,1,79),(196,21,9,1,79),(197,22,6,1,79),(198,20,6,1,79),(199,22,5,1,79),(200,21,3,1,79),(201,21,6,2,80),(202,21,6,1,81),(203,21,11,1,81),(204,21,9,1,81),(205,22,6,1,81),(206,20,6,1,81),(207,22,5,1,81),(208,21,3,1,81),(209,21,6,1,82),(210,21,11,1,82),(211,21,9,1,82),(212,22,6,1,82),(213,20,6,1,82),(214,22,5,1,82),(215,21,3,1,82),(216,21,6,1,83),(217,21,11,1,83),(218,21,9,1,83),(219,22,6,1,83),(220,20,6,1,83),(221,22,5,1,83),(222,21,3,1,83),(223,22,6,9,84),(224,21,6,2,85),(225,21,6,1,86),(226,21,11,1,86),(227,21,9,1,86),(228,22,6,1,86),(229,20,6,1,86),(230,22,5,1,86),(231,21,3,1,86),(232,22,3,2,87),(233,21,6,1,88),(234,21,11,1,88),(235,21,9,1,88),(236,22,6,1,88),(237,20,6,1,88),(238,22,5,1,88),(239,21,3,1,88),(240,21,6,1,89),(241,21,11,1,89),(242,21,9,1,89),(243,22,6,1,89),(244,20,6,1,89),(245,22,5,1,89),(246,21,3,1,89),(247,21,6,1,90),(248,21,11,1,90),(249,21,9,1,90),(250,22,6,1,90),(251,20,6,1,90),(252,22,5,1,90),(253,21,3,1,90),(254,45,3,1,91),(255,45,10,1,91),(256,45,6,1,91),(257,45,9,1,91),(258,45,3,1,92),(259,45,10,1,92),(260,45,6,1,92),(261,45,9,1,92),(262,22,14,1,93),(263,13,14,1,94),(264,22,14,1,94),(265,22,13,1,95),(266,21,13,2,95),(267,15,13,3,95),(268,46,15,1,96),(269,46,15,1,96),(270,46,15,1,96),(271,21,15,1,97),(272,5,15,1,97),(273,46,15,1,97),(274,47,16,1,98),(275,46,16,1,98);
/*!40000 ALTER TABLE `tbldeliveryitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfaculty`
--

DROP TABLE IF EXISTS `tblfaculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblfaculty` (
  `facultyID` int NOT NULL AUTO_INCREMENT,
  `facultyName` varchar(60) DEFAULT NULL,
  `facultyMobileNo` varchar(20) DEFAULT NULL,
  `facultyEmail` varchar(255) DEFAULT NULL,
  `collegeID` int DEFAULT NULL,
  PRIMARY KEY (`facultyID`),
  KEY `collegeID` (`collegeID`),
  CONSTRAINT `tblfaculty_ibfk_1` FOREIGN KEY (`collegeID`) REFERENCES `tblcollege` (`collegeID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfaculty`
--

LOCK TABLES `tblfaculty` WRITE;
/*!40000 ALTER TABLE `tblfaculty` DISABLE KEYS */;
INSERT INTO `tblfaculty` VALUES (1,'nishant gholap','9284306093','nishant@gmail.com',23),(3,'bhavik shah','9100829878','bhavikshah@gmail.com',1),(5,'omkar bate','7878766543','omkar@gmail.com',37),(6,'Shital Kalhpure','7865768956','shital@gmail.com',27),(7,'1','1','1',27),(8,'bhavik shah','392899696','nishant@gmail.com',43),(9,'yash jambhale','9254652152','yash@gmail.com',1),(10,'nishant gholap','9284306093','nishant@gmail.com',3),(11,'darshan rana','9284306093','nishant@gmail.com',3),(13,'santosh pawar','9246125465','pawar',75),(14,'bhavik shah','9524522152','bhavik@gmail.com',76),(15,'deepaka jakkaul','9245652154','deepa@gmail.com',78),(16,'ng ','78','7',79);
/*!40000 ALTER TABLE `tblfaculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpurchaseitem`
--

DROP TABLE IF EXISTS `tblpurchaseitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpurchaseitem` (
  `ItempurchaseId` int NOT NULL AUTO_INCREMENT,
  `bookID` int NOT NULL,
  `facultyID` int NOT NULL,
  `purchasequentity` int NOT NULL,
  `pid` int DEFAULT NULL,
  PRIMARY KEY (`ItempurchaseId`),
  KEY `fk_pid` (`pid`),
  KEY `tblpurchaseitem_ibfk_1` (`bookID`),
  KEY `tblpurchaseitem_ibfk_2` (`facultyID`),
  CONSTRAINT `fk_pid` FOREIGN KEY (`pid`) REFERENCES `tblpurchaseorder` (`Pid`),
  CONSTRAINT `tblpurchaseitem_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `tblbook` (`bookID`),
  CONSTRAINT `tblpurchaseitem_ibfk_2` FOREIGN KEY (`facultyID`) REFERENCES `tblfaculty` (`facultyID`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpurchaseitem`
--

LOCK TABLES `tblpurchaseitem` WRITE;
/*!40000 ALTER TABLE `tblpurchaseitem` DISABLE KEYS */;
INSERT INTO `tblpurchaseitem` VALUES (1,1,1,1,NULL),(2,15,1,1,NULL),(3,5,5,1,NULL),(4,22,3,1,NULL),(5,2,6,1,NULL),(6,5,3,1,NULL),(7,15,3,1,NULL),(8,22,3,1,NULL),(9,22,3,1,NULL),(10,2,3,2,NULL),(11,20,3,1,NULL),(12,20,3,7,NULL),(13,20,3,3,NULL),(14,2,3,8,NULL),(15,2,3,8,NULL),(16,2,3,5,NULL),(17,22,3,8,57),(18,2,3,2,58),(19,5,5,6,58),(20,20,7,1,59),(21,22,5,1,59),(22,22,3,11,60),(23,7,5,1,65),(24,2,9,1,66),(25,22,5,1,66),(26,20,6,1,66),(27,15,10,1,66),(28,21,8,1,66),(29,4,6,2,67),(30,21,3,3,67),(31,13,5,1,67),(32,22,6,2,68),(33,20,5,4,69),(34,20,5,1,69),(35,20,5,1,69),(36,21,5,1,70),(37,22,5,1,70),(38,22,3,1,70),(39,22,6,1,71),(40,22,6,1,72),(41,22,3,1,73),(42,20,5,1,74),(43,22,5,1,75),(44,11,3,1,75),(45,22,3,1,76),(46,21,6,1,77),(47,21,3,1,77),(48,8,3,1,77),(49,13,6,1,78),(50,22,5,1,78),(51,22,5,6,79),(52,22,5,1,80),(53,20,3,1,80),(54,7,5,1,80),(55,15,3,1,80),(56,21,6,3,80),(57,22,3,2,81),(58,21,6,2,82),(59,21,6,1,83),(60,21,11,1,83),(61,21,9,1,83),(62,22,6,1,83),(63,20,6,1,83),(64,22,5,1,83),(65,21,3,1,83),(66,45,3,1,84),(67,45,10,1,84),(68,45,6,1,84),(69,45,9,1,84),(70,13,14,1,85),(71,22,13,1,86),(72,21,13,2,86),(73,15,13,3,86),(74,21,15,1,87),(75,5,15,1,87),(76,46,15,1,87),(77,47,16,1,88),(78,46,16,1,88);
/*!40000 ALTER TABLE `tblpurchaseitem` ENABLE KEYS */;
UNLOCK TABLES;

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
  `collegeID` int NOT NULL,
  PRIMARY KEY (`Pid`),
  KEY `collegeId` (`collegeID`),
  CONSTRAINT `tblpurchaseorder_ibfk_1` FOREIGN KEY (`collegeID`) REFERENCES `tblcollege` (`collegeID`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpurchaseorder`
--

LOCK TABLES `tblpurchaseorder` WRITE;
/*!40000 ALTER TABLE `tblpurchaseorder` DISABLE KEYS */;
INSERT INTO `tblpurchaseorder` VALUES (57,'2023-03-13',NULL,54),(70,'2023-03-31',NULL,56),(71,'2023-03-31',NULL,58),(72,'2023-03-31',NULL,56),(73,'2023-03-31',NULL,58),(74,'2023-03-31',NULL,56),(75,'2023-03-31',NULL,58),(76,'2023-03-31',NULL,57),(77,'2023-03-31',NULL,67),(78,'2023-03-31',NULL,71),(79,'2023-03-31',NULL,54),(80,'2023-04-03',NULL,56),(81,'2023-04-03',NULL,72),(82,'2023-04-03',NULL,73),(83,'2023-04-08',NULL,56),(84,'2023-04-09',NULL,75),(85,'2023-04-13',NULL,76),(86,'2023-04-15',NULL,56),(87,'2023-04-15',NULL,78),(88,'2023-04-15',NULL,79);
/*!40000 ALTER TABLE `tblpurchaseorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbluniversity`
--

DROP TABLE IF EXISTS `tbluniversity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbluniversity` (
  `universityID` int NOT NULL AUTO_INCREMENT,
  `universityName` varchar(60) DEFAULT NULL,
  `universityShortCode` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`universityID`),
  UNIQUE KEY `universityID_UNIQUE` (`universityID`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbluniversity`
--

LOCK TABLES `tbluniversity` WRITE;
/*!40000 ALTER TABLE `tbluniversity` DISABLE KEYS */;
INSERT INTO `tbluniversity` VALUES (35,'Kolhapur University','KOU'),(42,'Ahamdabad University','AUU'),(43,'Mumbai University','MBU'),(44,'Thane University','TTU'),(45,'Vidharbh University','VDU'),(46,'Tilak Maharatsytra Viyapith','TMV'),(47,'Yashwantrao Chavan MuktVidyapeeth','YCMV'),(50,'1','1'),(53,'Pune University','SPPU'),(54,'Solapur University','SPPU'),(56,'Kolhapur University','KPU'),(57,'1','1'),(58,'xyz','xyz'),(59,'navi mumbai university','nmu'),(60,'sambhajinagar university','snu'),(61,'new university','nuu'),(62,'vn university','vng'),(63,'maharastra university','mus'),(64,'1','KPU'),(65,'bijah','ihish'),(66,'mxkm','monlo'),(67,'gujrat university','gun'),(68,'california university','CFU'),(69,'ng university','p');
/*!40000 ALTER TABLE `tbluniversity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('user','123');
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

-- Dump completed on 2023-05-15 13:38:23
