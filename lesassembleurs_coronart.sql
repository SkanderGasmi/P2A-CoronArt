-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 mai 2021 à 01:41
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lesassembleurs_coronart`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

DROP TABLE IF EXISTS `adresses`;
CREATE TABLE IF NOT EXISTS `adresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rue` varchar(30) NOT NULL,
  `codePostal` int NOT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pays` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adresses`
--

INSERT INTO `adresses` (`id`, `rue`, `codePostal`, `ville`, `pays`) VALUES
(13, 'llllll   ', 1234, 'jdida   ', 'jdida   '),
(14, 'llllll    ', 1234, 'katita', 'katita'),
(15, 'llllll     ', 1234, 'katita ', 'katita '),
(16, 'llllll      ', 1234, 'katita  ', 'katita  '),
(17, 'llllll       ', 1234, 'katita   ', 'tunisie '),
(18, 'llllll        ', 1234, 'katita    ', 'katita    '),
(19, 'llllll         ', 1234, 'katita     ', 'katita     '),
(20, 'llllll          ', 1234, 'katita      ', 'katita      '),
(21, 'llllll           ', 1234, 'katita       ', 'katita       '),
(22, 'llllll            ', 1234, 'katita        ', 'katita       '),
(23, 'llllll             ', 1234, 'katita         ', 'katita       '),
(24, 'llllll              ', 1234, 'katita          ', 'katita       '),
(25, 'llllll               ', 1234, 'katita           ', 'katita       '),
(26, 'llllll                ', 1234, 'katita            ', 'katita       '),
(27, 'tunis', 1234, 'tunis', 'tunisie '),
(28, 'tunis ', 1234, 'tunis ', 'tunis '),
(29, 'tunis  ', 1234, 'tunis  ', 'jdida   ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
