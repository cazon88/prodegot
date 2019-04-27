CREATE DATABASE  IF NOT EXISTS `prodegot` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `prodegot`;
-- MySQL dump 10.13  Distrib 8.0.16, for macos10.14 (x86_64)
--
-- Host: localhost    Database: prodegot
-- ------------------------------------------------------
-- Server version	8.0.16

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
-- Table structure for table `characters`
--

DROP TABLE IF EXISTS `characters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_status_idx` (`id_status`),
  CONSTRAINT `fk_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `characters`
--

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;
INSERT INTO `characters` VALUES (1,'Jon Snow',1),(2,'Daenerys Targaryen',1),(3,'Sansa Stark',1),(4,'Arya Stark',1),(5,'Bran Stark',1),(6,'Cersei Lannister',1),(7,'Jaime Lannister',1),(8,'Tyrion Lannister',1),(9,'Theon Greyjoy',1),(10,'Yara Greyjoy',1),(11,'Euron Greyjoy',1),(12,'Samwell Tarly',1),(13,'Gilly',1),(14,'Nigth King',1),(15,'Melisandre',1),(16,'Jorah Mormont',1),(17,'El Perro',1),(18,'La Montaña',1),(19,'Lord Varys',1),(20,'Podryck Payne',1),(21,'Gendry Baratheon',1),(22,'Gusano Gris',1),(23,'Missandei',1),(24,'Davos Seaworth',1),(25,'Bronn Stokeworth',1);
/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prode`
--

DROP TABLE IF EXISTS `prode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `prode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `jon_snow` int(11) NOT NULL,
  `daenerys_targaryen` int(11) NOT NULL,
  `sasan_stark` int(11) NOT NULL,
  `arya_stark` int(11) NOT NULL,
  `bran_stark` int(11) NOT NULL,
  `cersei_lannister` int(11) NOT NULL,
  `jaime_lannister` int(11) NOT NULL,
  `tyrion_lannister` int(11) NOT NULL,
  `theon_greyjoy` int(11) NOT NULL,
  `yara_greyjoy` int(11) NOT NULL,
  `euron_greyjoy` int(11) NOT NULL,
  `samwell_tarly` int(11) NOT NULL,
  `gilly` int(11) NOT NULL,
  `night_king` int(11) NOT NULL,
  `jorah_mormont` int(11) NOT NULL,
  `melisandre` int(11) NOT NULL,
  `the_hound` int(11) NOT NULL,
  `the_mountain` int(11) NOT NULL,
  `lord_varys` int(11) NOT NULL,
  `brienne_of_tarth` int(11) NOT NULL,
  `podryck_payne` int(11) NOT NULL,
  `gendry_baratheon` int(11) NOT NULL,
  `gray_worm` int(11) NOT NULL,
  `missandey` int(11) NOT NULL,
  `davos_seaworth` int(11) NOT NULL,
  `bronn_stokeworth` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`id_user`),
  CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prode`
--

LOCK TABLES `prode` WRITE;
/*!40000 ALTER TABLE `prode` DISABLE KEYS */;
/*!40000 ALTER TABLE `prode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `valor_UNIQUE` (`value`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (2,'muerto'),(1,'vivo'),(3,'white walker');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2019-04-27 14:17:57
