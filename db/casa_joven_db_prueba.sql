-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: casa_joven_prueba
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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

DROP DATABASE if exists casa_joven_prueba;
CREATE DATABASE casa_joven_prueba;
USE casa_joven_prueba;
--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `numero_identificacion` varchar(100) DEFAULT NULL,
  `consulta` varchar(100) DEFAULT NULL,
  `otra_consulta` varchar(200) DEFAULT NULL,
  `fecha_carga` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_consulta`),
  KEY `numero_identificacion` (`numero_identificacion`),
  KEY `consulta` (`consulta`),
  CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`consulta`) REFERENCES `lista_consultas` (`consultas`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (22,'46336011','Ninguna','Ejemplo','2023-10-27 05:58:28'),(23,'4354354','Creación de E-mail','Ninguna','2023-10-29 03:12:47'),(24,'4354354','Ninguna','Deberia insertarse solo esta consulta','2023-10-29 03:13:27'),(25,'4354354','Ninguna','Deberia insertarse solo esta consulta','2023-10-29 03:14:00'),(26,'4354354','Creación de E-mail','asdasdasd','2023-10-29 03:17:05'),(27,'4354354','D.N.I Digital','asdasdasd','2023-10-29 03:18:03'),(28,'46336011','Ninguna','sadasdasd','2023-10-29 03:27:18'),(29,'46336011','Ninguna','Ninguna','2023-10-29 03:32:34'),(30,'46336011','Turnos para D.N.I','Ninguna','2023-10-29 03:33:36'),(33,'44861807','Ninguna','Ninguna','2023-10-29 23:59:36');
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_consultas`
--

DROP TABLE IF EXISTS `lista_consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lista_consultas` (
  `id_lista` int(11) NOT NULL AUTO_INCREMENT,
  `consultas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_lista`),
  KEY `consultas` (`consultas`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_consultas`
--

LOCK TABLES `lista_consultas` WRITE;
/*!40000 ALTER TABLE `lista_consultas` DISABLE KEYS */;
INSERT INTO `lista_consultas` VALUES (9,'Constancia de CUIL'),(8,'Creación de E-mail'),(7,'D.N.I Digital'),(6,'Esc. P. de Adultos'),(1,'Ninguna'),(5,'Sím. Int. de Acceso'),(4,'Tarjeta Alimentar'),(3,'Turnos para Anses'),(2,'Turnos para D.N.I');
/*!40000 ALTER TABLE `lista_consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nacionalidad`
--

DROP TABLE IF EXISTS `nacionalidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nacionalidad` (
  `id_nacionalidad` int(11) NOT NULL AUTO_INCREMENT,
  `nacionalidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_nacionalidad`),
  UNIQUE KEY `nacionalidad` (`nacionalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nacionalidad`
--

LOCK TABLES `nacionalidad` WRITE;
/*!40000 ALTER TABLE `nacionalidad` DISABLE KEYS */;
INSERT INTO `nacionalidad` VALUES (1,'Argentina'),(2,'Extranjero/a');
/*!40000 ALTER TABLE `nacionalidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(100) DEFAULT NULL,
  `numero_identificacion` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `sexo` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  UNIQUE KEY `numero_identificacion` (`numero_identificacion`),
  KEY `tipo_identificacion` (`tipo_identificacion`),
  KEY `sexo` (`sexo`),
  KEY `nacionalidad` (`nacionalidad`),
  CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`tipo_identificacion`) REFERENCES `tipo_identificacion` (`tipo_identificacion`),
  CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`sexo`) REFERENCES `sexos` (`sexo`),
  CONSTRAINT `personas_ibfk_3` FOREIGN KEY (`nacionalidad`) REFERENCES `nacionalidad` (`nacionalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'DNI','46336011','Diego Armando','Borras','Masculino','2005-05-02','Argentina'),(5,'Pasaporte','4354354','asdasd','asdasd','Otro','2023-10-11','Argentina'),(8,'DNI','44861807','Joaquin Alexander','Ramon','Prefiero no decirlo','2002-10-11','Extranjero/a');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexos`
--

DROP TABLE IF EXISTS `sexos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sexos` (
  `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
  `sexo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_sexo`),
  KEY `sexo` (`sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexos`
--

LOCK TABLES `sexos` WRITE;
/*!40000 ALTER TABLE `sexos` DISABLE KEYS */;
INSERT INTO `sexos` VALUES (2,'Femenino'),(1,'Masculino'),(3,'No binario'),(4,'Otro'),(5,'Prefiero no decirlo');
/*!40000 ALTER TABLE `sexos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_identificacion`
--

DROP TABLE IF EXISTS `tipo_identificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_identificacion` (
  `id_identificacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_identificacion`),
  KEY `tipo_identificacion` (`tipo_identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_identificacion`
--

LOCK TABLES `tipo_identificacion` WRITE;
/*!40000 ALTER TABLE `tipo_identificacion` DISABLE KEYS */;
INSERT INTO `tipo_identificacion` VALUES (1,'DNI'),(3,'No tiene'),(2,'Pasaporte');
/*!40000 ALTER TABLE `tipo_identificacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-30 17:18:12
