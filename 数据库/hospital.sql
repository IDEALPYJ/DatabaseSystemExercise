-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: hospital
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `dept_id` varchar(20) NOT NULL,
  `dept_name` varchar(45) NOT NULL,
  `dept_phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES ('DEPT001','内科','110001'),('DEPT002','外科','110002'),('DEPT003','儿科','110003'),('DEPT004','妇科','110004'),('DEPT005','神经科','110005'),('DEPT006','眼科','110006');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor` (
  `dr_id` varchar(20) NOT NULL,
  `dr_name` varchar(45) NOT NULL,
  `dr_phone` varchar(20) DEFAULT NULL,
  `dept_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`dr_id`),
  KEY `dr_dept_id_idx` (`dept_id`),
  CONSTRAINT `dr_dept_id` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES ('DR001001','李明','13354678910','DEPT001'),('DR001002','王强','15723237871','DEPT001'),('DR002001','孙红','17656476121','DEPT002'),('DR002002','赵莉莉','13345671878','DEPT002'),('DR003001','孙伟','18765467813','DEPT003'),('DR003002','赵瑞丽韩','18908765709','DEPT003'),('DR003003','任毅','17645678900','DEPT003'),('DR004001','王立伟','17654678787','DEPT004'),('DR004002','王双','15767890456','DEPT004'),('DR004003','吴伟','17656784301','DEPT004'),('DR005001','赵志刚','13545267876','DEPT005'),('DR006001','王欣然','15754356123','DEPT006'),('DR006002','魏子寒','16899870134','DEPT006');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exam` (
  `e_id` varchar(20) NOT NULL,
  `e_name` varchar(45) NOT NULL,
  `e_price` int DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
INSERT INTO `exam` VALUES ('E001','血常规',20),('E002','尿常规',15),('E003','心电图',30),('E004','B超',50),('E005','CT',100),('E006','X光',60);
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicine` (
  `m_id` varchar(20) NOT NULL,
  `m_name` varchar(45) NOT NULL,
  `m_inv` int NOT NULL,
  `m_price` int DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicine`
--

LOCK TABLES `medicine` WRITE;
/*!40000 ALTER TABLE `medicine` DISABLE KEYS */;
INSERT INTO `medicine` VALUES ('M0001','三九感冒灵',100,20),('M0002','莲花清瘟胶囊',80,30),('M0003','云南白药创可贴',150,10),('M0004','肠炎宁',40,25),('M0005','藿香正气水',10,15),('M0006','速效救心丸',150,50),('M0007','氯雷他定',55,55),('M0008','布洛芬颗粒',145,45),('M0009','生理盐水',500,3),('M0010','碘伏',355,10);
/*!40000 ALTER TABLE `medicine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `n_s`
--

DROP TABLE IF EXISTS `n_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `n_s` (
  `n_id` varchar(20) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  PRIMARY KEY (`n_id`,`s_id`),
  KEY `s_id_idx` (`s_id`),
  CONSTRAINT `n_id` FOREIGN KEY (`n_id`) REFERENCES `nurse` (`n_id`),
  CONSTRAINT `s_id` FOREIGN KEY (`s_id`) REFERENCES `sickbed` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `n_s`
--

LOCK TABLES `n_s` WRITE;
/*!40000 ALTER TABLE `n_s` DISABLE KEYS */;
INSERT INTO `n_s` VALUES ('N001001','S0001'),('N001001','S0002'),('N001002','S0003'),('N001002','S0004'),('N002001','S0005'),('N002001','S0006'),('N003001','S0007'),('N003001','S0008'),('N003002','S0009'),('N003002','S0010'),('N004001','S0011'),('N004001','S0012'),('N001003','S0013'),('N002002','S0014'),('N004002','S0015'),('N005001','S0016'),('N005001','S0017'),('N006001','S0018'),('N006001','S0019'),('N006002','S0020'),('N006002','S0021');
/*!40000 ALTER TABLE `n_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nurse`
--

DROP TABLE IF EXISTS `nurse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nurse` (
  `n_id` varchar(20) NOT NULL,
  `n_name` varchar(45) NOT NULL,
  `dept_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`n_id`),
  KEY `n_dept_id_idx` (`dept_id`),
  CONSTRAINT `n_dept_id` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nurse`
--

LOCK TABLES `nurse` WRITE;
/*!40000 ALTER TABLE `nurse` DISABLE KEYS */;
INSERT INTO `nurse` VALUES ('N001001','李红','DEPT001'),('N001002','常魏红','DEPT001'),('N001003','谭晶','DEPT001'),('N002001','张丽丽','DEPT002'),('N002002','施琴','DEPT002'),('N003001','赵胜男','DEPT003'),('N003002','张丽丽','DEPT003'),('N004001','孙艺','DEPT004'),('N004002','吴芳','DEPT004'),('N005001','韦彩玲','DEPT005'),('N006001','郭志霞','DEPT006'),('N006002','李莉莉','DEPT006');
/*!40000 ALTER TABLE `nurse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_cost`
--

DROP TABLE IF EXISTS `p_cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `p_cost` (
  `p_id` varchar(20) NOT NULL,
  `p_fee` varchar(45) DEFAULT NULL,
  `p_advance` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  CONSTRAINT `p_cost_p_id` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_cost`
--

LOCK TABLES `p_cost` WRITE;
/*!40000 ALTER TABLE `p_cost` DISABLE KEYS */;
INSERT INTO `p_cost` VALUES ('P00001','','10000'),('P00003','','2000'),('P00004','','100');
/*!40000 ALTER TABLE `p_cost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_dr`
--

DROP TABLE IF EXISTS `p_dr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `p_dr` (
  `p_id` varchar(20) NOT NULL,
  `dr_id` varchar(20) NOT NULL,
  PRIMARY KEY (`p_id`,`dr_id`),
  KEY `p_dr_dr_id_idx` (`dr_id`),
  CONSTRAINT `p_dr_dr_id` FOREIGN KEY (`dr_id`) REFERENCES `doctor` (`dr_id`),
  CONSTRAINT `p_dr_p_id` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_dr`
--

LOCK TABLES `p_dr` WRITE;
/*!40000 ALTER TABLE `p_dr` DISABLE KEYS */;
INSERT INTO `p_dr` VALUES ('P00004','DR002002'),('P00001','DR004002'),('P00003','DR004002');
/*!40000 ALTER TABLE `p_dr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_e`
--

DROP TABLE IF EXISTS `p_e`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `p_e` (
  `p_id` varchar(20) NOT NULL,
  `e_id` varchar(20) NOT NULL,
  `times` varchar(45) NOT NULL,
  PRIMARY KEY (`p_id`,`e_id`),
  KEY `e_id_idx` (`e_id`),
  CONSTRAINT `p_e_e_id` FOREIGN KEY (`e_id`) REFERENCES `exam` (`e_id`),
  CONSTRAINT `p_e_p_id` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_e`
--

LOCK TABLES `p_e` WRITE;
/*!40000 ALTER TABLE `p_e` DISABLE KEYS */;
/*!40000 ALTER TABLE `p_e` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_m`
--

DROP TABLE IF EXISTS `p_m`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `p_m` (
  `p_id` varchar(20) NOT NULL,
  `m_id` varchar(20) NOT NULL,
  `dosage` int NOT NULL,
  PRIMARY KEY (`p_id`,`m_id`),
  KEY `m_id_idx` (`m_id`),
  CONSTRAINT `p_m_m_id` FOREIGN KEY (`m_id`) REFERENCES `medicine` (`m_id`),
  CONSTRAINT `p_m_p_id` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_m`
--

LOCK TABLES `p_m` WRITE;
/*!40000 ALTER TABLE `p_m` DISABLE KEYS */;
/*!40000 ALTER TABLE `p_m` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_s`
--

DROP TABLE IF EXISTS `p_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `p_s` (
  `p_id` varchar(20) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  PRIMARY KEY (`p_id`,`s_id`),
  KEY `p_s_s_id_idx` (`s_id`),
  CONSTRAINT `p_s_p_id` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `p_s_s_id` FOREIGN KEY (`s_id`) REFERENCES `sickbed` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_s`
--

LOCK TABLES `p_s` WRITE;
/*!40000 ALTER TABLE `p_s` DISABLE KEYS */;
INSERT INTO `p_s` VALUES ('P00004','S0005'),('P00001','S0011'),('P00003','S0012');
/*!40000 ALTER TABLE `p_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient` (
  `p_id` varchar(20) NOT NULL,
  `p_name` varchar(45) NOT NULL,
  `p_sex` varchar(45) DEFAULT NULL,
  `p_age` varchar(45) DEFAULT NULL,
  `p_idno` varchar(45) DEFAULT NULL,
  `dept_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  KEY `dept_id_idx` (`dept_id`),
  CONSTRAINT `p_dept_id` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES ('P00001','宋小航','男','19','123984200208129130','DEPT004'),('P00003','王小明','女','36','128730198501021343','DEPT004'),('P00004','李翰','男','35','167589198605148760','DEPT002');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sickbed`
--

DROP TABLE IF EXISTS `sickbed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sickbed` (
  `s_id` varchar(20) NOT NULL,
  `s_price` int DEFAULT NULL,
  `s_condi` char(2) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sickbed`
--

LOCK TABLES `sickbed` WRITE;
/*!40000 ALTER TABLE `sickbed` DISABLE KEYS */;
INSERT INTO `sickbed` VALUES ('S0001',30,'空闲'),('S0002',30,'空闲'),('S0003',40,'空闲'),('S0004',40,'空闲'),('S0005',30,'在用'),('S0006',30,'空闲'),('S0007',30,'空闲'),('S0008',30,'空闲'),('S0009',40,'空闲'),('S0010',40,'空闲'),('S0011',40,'在用'),('S0012',40,'在用'),('S0013',100,'在用'),('S0014',100,'空闲'),('S0015',100,'空闲'),('S0016',30,'空闲'),('S0017',30,'空闲'),('S0018',50,'空闲'),('S0019',50,'空闲'),('S0020',50,'在用'),('S0021',50,'空闲'),('S0022',50,'空闲');
/*!40000 ALTER TABLE `sickbed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `w_s`
--

DROP TABLE IF EXISTS `w_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `w_s` (
  `w_id` varchar(20) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  PRIMARY KEY (`w_id`,`s_id`),
  KEY `w_s_s_id_idx` (`s_id`),
  CONSTRAINT `w_s_s_id` FOREIGN KEY (`s_id`) REFERENCES `sickbed` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `w_s_w_id` FOREIGN KEY (`w_id`) REFERENCES `ward` (`w_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `w_s`
--

LOCK TABLES `w_s` WRITE;
/*!40000 ALTER TABLE `w_s` DISABLE KEYS */;
INSERT INTO `w_s` VALUES ('W001001','S0001'),('W001001','S0002'),('W001002','S0003'),('W001002','S0004'),('W002001','S0005'),('W002001','S0006'),('W003001','S0007'),('W003001','S0008'),('W003002','S0009'),('W003002','S0010'),('W004001','S0011'),('W004001','S0012'),('W001003','S0013'),('W002002','S0014'),('W004002','S0015'),('W005001','S0016'),('W005001','S0017'),('W006002','S0018'),('W006002','S0019'),('W006001','S0020'),('W006001','S0021');
/*!40000 ALTER TABLE `w_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ward`
--

DROP TABLE IF EXISTS `ward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ward` (
  `w_id` varchar(20) NOT NULL,
  `dept_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`w_id`),
  KEY `w_dept_id_idx` (`dept_id`),
  CONSTRAINT `w_dept_id` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ward`
--

LOCK TABLES `ward` WRITE;
/*!40000 ALTER TABLE `ward` DISABLE KEYS */;
INSERT INTO `ward` VALUES ('W001001','DEPT001'),('W001002','DEPT001'),('W001003','DEPT001'),('W002001','DEPT002'),('W002002','DEPT002'),('W006002','DEPT002'),('W003001','DEPT003'),('W003002','DEPT003'),('W004001','DEPT004'),('W004002','DEPT004'),('W005001','DEPT005'),('W006001','DEPT006');
/*!40000 ALTER TABLE `ward` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-09 22:36:20
