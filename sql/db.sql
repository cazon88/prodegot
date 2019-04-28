-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 02:20 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prodegot`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `valor_UNIQUE` (`value`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'lives'),(2,'dies'),(3,'white walker');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;



DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



DROP TABLE IF EXISTS `prode`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_status_idx` (`id_status`),
  CONSTRAINT `fk_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1  AUTO_INCREMENT=26;

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;
INSERT INTO `characters` VALUES (1,'Jon Snow',1),(2,'Daenerys Targaryen',1),(3,'Sansa Stark',1),(4,'Arya Stark',1),(5,'Bran Stark',1),(6,'Cersei Lannister',1),(7,'Jaime Lannister',1),(8,'Tyrion Lannister',1),(9,'Theon Greyjoy',1),(10,'Yara Greyjoy',1),(11,'Euron Greyjoy',1),(12,'Samwell Tarly',1),(13,'Gilly',1),(14,'Night King',1),(15,'Melisandre',1),(16,'Jorah Mormont',1),(17,'The Hound',1),(18,'The Mountain',1),(19,'Lord Varys',1),(20,'Brienne of Tarth',1),(21,'Podryck Payne',1),(22,'Gendry Baratheon',1),(23,'Greyworm',1),(24,'Missandei',1),(25,'Davos Seaworth',1),(26,'Bronn Stokeworth',1);
/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;