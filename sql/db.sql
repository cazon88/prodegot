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
INSERT INTO `status` (`id`, `value`) VALUES
(1, 'alive'),
(2, 'dead'),
(3, 'white-walker');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;



DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



DROP TABLE IF EXISTS `prode`;
CREATE TABLE `prode` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jon` int(11) NOT NULL,
  `daenerys` int(11) NOT NULL,
  `sansa` int(11) NOT NULL,
  `arya` int(11) NOT NULL,
  `bran` int(11) NOT NULL,
  `cersei` int(11) NOT NULL,
  `jaime` int(11) NOT NULL,
  `tyrion` int(11) NOT NULL,
  `theon` int(11) NOT NULL,
  `yara` int(11) NOT NULL,
  `euron` int(11) NOT NULL,
  `samwell` int(11) NOT NULL,
  `gilly` int(11) NOT NULL,
  `night_king` int(11) NOT NULL,
  `jorah` int(11) NOT NULL,
  `melisandre` int(11) NOT NULL,
  `hound` int(11) NOT NULL,
  `mountain` int(11) NOT NULL,
  `varys` int(11) NOT NULL,
  `brienne` int(11) NOT NULL,
  `podryck` int(11) NOT NULL,
  `gendry` int(11) NOT NULL,
  `grey_worm` int(11) NOT NULL,
  `missandei` int(11) NOT NULL,
  `davos` int(11) NOT NULL,
  `bronn` int(11) NOT NULL,
  `beric` int(11) NOT NULL,
  `tormund` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`id_user`),
  CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `short_name` varchar(45) NOT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_status_idx` (`id_status`),
  CONSTRAINT `fk_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1  AUTO_INCREMENT=26;

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;
INSERT INTO `characters` (`id`, `name`, `short_name`, `id_status`) VALUES
(1, 'Jon Snow', 'jon', 1),
(2, 'Daenerys Targaryen', 'danaerys', 1),
(3, 'Sansa Stark', 'sansa', 1),
(4, 'Arya Stark', 'arya', 1),
(5, 'Bran Stark', 'bran', 1),
(6, 'Cersei Lannister', 'cersei', 1),
(7, 'Jaime Lannister', 'jaime', 1),
(8, 'Tyrion Lannister', 'tyrion', 1),
(9, 'Theon Greyjoy', 'theon', 1),
(10, 'Yara Greyjoy', 'yara', 1),
(11, 'Euron Greyjoy', 'euron', 1),
(12, 'Samwell Tarly', 'samwell', 1),
(13, 'Gilly', 'gilly', 1),
(14, 'Night King', 'night_king', 1),
(15, 'Melisandre', 'melisandre', 1),
(16, 'Jorah Mormont', 'jorah', 1),
(17, 'The Hound', 'hound', 1),
(18, 'The Mountain', 'mountain', 1),
(19, 'Lord Varys', 'varys', 1),
(20, 'Brienne of Tarth', 'brienne', 1),
(21, 'Podryck Payne', 'podryck', 1),
(22, 'Gendry Baratheon', 'gendry', 1),
(23, 'Greyworm', 'grey_worm', 1),
(24, 'Missandei', 'missandei', 1),
(25, 'Davos Seaworth', 'davos', 1),
(26, 'Bronn Stokeworth', 'bronn', 1),
(27, 'Beric Dondarrion', 'beric', 1),
(28, 'Tormund Giantsbane', 'tormund', 1);
/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;
