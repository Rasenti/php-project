-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2023 at 04:16 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Règles'),
(2, 'Peuples'),
(3, 'Capacités'),
(4, 'Maîtrises'),
(5, 'Magie'),
(6, 'Equipement'),
(7, 'Bestiaire'),
(8, 'Lieux'),
(9, 'Histoire'),
(10, 'Croyances'),
(11, 'Politique'),
(12, 'Protagonistes');

-- --------------------------------------------------------

--
-- Table structure for table `categories_has_pages`
--

DROP TABLE IF EXISTS `categories_has_pages`;
CREATE TABLE IF NOT EXISTS `categories_has_pages` (
  `categories_id` int NOT NULL,
  `pages_id` int NOT NULL,
  PRIMARY KEY (`categories_id`,`pages_id`),
  KEY `fk_categories_has_pages_pages1_idx` (`pages_id`),
  KEY `fk_categories_has_pages_categories1_idx` (`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories_has_pages`
--

INSERT INTO `categories_has_pages` (`categories_id`, `pages_id`) VALUES
(2, 2),
(8, 3),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `alt` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `type`, `alt`) VALUES
(1, 'Peheme_charadesign.png', 'png', 'Illustration d\'un Péhème'),
(2, 'elyndryul_forest.jpg', 'jpg', 'Illustration de la Forêt de Gaëv'),
(3, 'kryni_inferno.jpg', 'jpg', 'Illustration d\'un Kryni');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `content` text,
  `date_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `content`, `date_sent`) VALUES
(1, 'Ouverture du site', 'Coucou', '2023-08-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `content` varchar(45) DEFAULT NULL,
  `author` varchar(45) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `images_id` int NOT NULL,
  PRIMARY KEY (`id`,`images_id`),
  KEY `fk_pages_images1_idx` (`images_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `author`, `date_created`, `date_modified`, `images_id`) VALUES
(2, 'Péhèmes', 'Les Péhèmes sont un peuple resté caché sur l’', 'Rasenti Quino', '2023-08-24', '2023-08-24', 1),
(3, 'Kryni', 'Dragons-caméléons des montagnes Astrae, les K', 'Rasenti Quino', '2023-08-24', '2023-08-24', 3),
(4, 'Steppes d\'Astem', 'Les Steppes d\'Astem s\'étendent sur des centai', 'Rasenti Quino', '2023-08-24', '2023-08-24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `subscribed` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `pseudo`, `password`, `dob`, `admin`, `subscribed`) VALUES
(1, 'Alice', 'Dahan', 'lilice@gmail.com', 'Lilice', 'lil', '1993-02-18', 0, 0),
(2, 'Alex', 'Delporte', 'botling@yahoo.fr', 'Botling', 'bot', '1992-12-11', 0, 1),
(3, 'Mathieu', 'Sallé', 'sgoat@gmail.com', 'sgoat', 'sgo', '1992-05-21', 0, 1),
(4, 'Quentin', 'Orias', 'rasen@gmail.com', 'Rasenti', 'ras', '1992-12-10', 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories_has_pages`
--
ALTER TABLE `categories_has_pages`
  ADD CONSTRAINT `fk_categories_has_pages_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_categories_has_pages_pages1` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pages_images1` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
