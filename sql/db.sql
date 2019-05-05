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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `value`) VALUES
(1, 'alive'),
(2, 'dead'),
(3, 'white-walker'),
(4, 'empty');
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pregnancy` int(1) NOT NULL,
  `aryalist` int(1) NOT NULL,
  `throne` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`),
  CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1  AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `short_name` varchar(45) NOT NULL,
  `id_status` int(11) NOT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_status_idx` (`id_status`),
  CONSTRAINT `fk_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1  AUTO_INCREMENT=29;

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;
INSERT INTO `characters` (`id`, `name`, `short_name`, `id_status`, `locked`)  VALUES
(1, 'Jon Snow', 'jon', 1, 0),
(2, 'Daenerys Targaryen', 'danaerys', 1, 0),
(3, 'Sansa Stark', 'sansa', 1, 0),
(4, 'Arya Stark', 'arya', 1, 0),
(5, 'Bran Stark', 'bran', 1, 0),
(6, 'Cersei Lannister', 'cersei', 1, 0),
(7, 'Jaime Lannister', 'jaime', 1, 0),
(8, 'Tyrion Lannister', 'tyrion', 1, 0),
(9, 'Theon Greyjoy', 'theon', 2, 1),
(10, 'Yara Greyjoy', 'yara', 1, 0),
(11, 'Euron Greyjoy', 'euron', 1, 0),
(12, 'Samwell Tarly', 'samwell', 1, 0),
(13, 'Gilly', 'gilly', 1, 0),
(14, 'Night King', 'night_king', 2, 1),
(15, 'Melisandre', 'melisandre', 2, 1),
(16, 'Jorah Mormont', 'jorah', 2, 1),
(17, 'The Hound', 'hound', 1, 0),
(18, 'The Mountain', 'mountain', 1, 0),
(19, 'Lord Varys', 'varys', 1, 0),
(20, 'Brienne of Tarth', 'brienne', 1, 0),
(21, 'Podryck Payne', 'podryck', 1, 0),
(22, 'Gendry Baratheon', 'gendry', 1, 0),
(23, 'Greyworm', 'grey_worm', 1, 0),
(24, 'Missandei', 'missandei', 1, 0),
(25, 'Davos Seaworth', 'davos', 1, 0),
(26, 'Bronn Stokeworth', 'bronn', 1, 0),
(27, 'Beric Dondarrion', 'beric', 2, 1),
(28, 'Tormund Giantsbane', 'tormund', 1, 0);
/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;
