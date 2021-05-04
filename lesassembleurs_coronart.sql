-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 mai 2021 à 01:12
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
(1, '', 2044, 'tunis', 'tunisie'),
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

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mot_de_passe` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telephone` int NOT NULL,
  `id_adresse` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_adresse` (`id_adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `email`, `mot_de_passe`, `telephone`, `id_adresse`) VALUES
(2, 'skander', 'skandergasmi7@gmail.com', '123456789', 96044454, 1),
(15, 'manefff gasmii', 'manef.gasmi@esprit.tn', 'header( \"refresh:5;url=i.php\" ', 55555555, 26);

-- --------------------------------------------------------

--
-- Structure de la table `cultures`
--

DROP TABLE IF EXISTS `cultures`;
CREATE TABLE IF NOT EXISTS `cultures` (
  `id_culture` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_culture`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cultures`
--

INSERT INTO `cultures` (`id_culture`, `nom`) VALUES
(6, 'lll'),
(7, 'japouni');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prix` float NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `culture` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `culture` (`culture`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `description`, `image`, `culture`) VALUES
(16, 'nike', 50, 'nike description', '', 7),
(17, 'adidas', 100, 'adidas description', '', 6),
(18, 'puma', 120, '', '', 7),
(19, 'airforce', 555, '', '', 7),
(20, 'jordan', 150, 'jordan description', '', 6);

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--

DROP TABLE IF EXISTS `reclamations`;
CREATE TABLE IF NOT EXISTS `reclamations` (
  `id` int NOT NULL,
  `id_client` int NOT NULL,
  `id_produit` int NOT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`,`id_produit`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`id_adresse`) REFERENCES `adresses` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`culture`) REFERENCES `cultures` (`id_culture`);

--
-- Contraintes pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD CONSTRAINT `reclamations_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `reclamations_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
