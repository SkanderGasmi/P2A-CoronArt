-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 mai 2021 à 01:50
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET FOREIGN_KEY_CHECKS=0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `lesassembleurs_coronart`
--
CREATE DATABASE IF NOT EXISTS `lesassembleurs_coronart` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE lesassembleurs_coronart;

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--
-- Création : Dim 25 avr. 2021 à 18:52
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
-- Tronquer la table avant d'insérer `adresses`
--

TRUNCATE TABLE `adresses`;
-- --------------------------------------------------------

--
-- Structure de la table `clients`
--
-- Création : mar. 04 mai 2021 à 01:34
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int NOT NULL,
  `nom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mot_de_passe` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telephone` int NOT NULL,
  `id_adresse` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_adresse` (`id_adresse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tronquer la table avant d'insérer `clients`
--

TRUNCATE TABLE `clients`;
-- --------------------------------------------------------

--
-- Structure de la table `cultures`
--
-- Création : sam. 24 avr. 2021 à 03:26
--

DROP TABLE IF EXISTS `cultures`;
CREATE TABLE IF NOT EXISTS `cultures` (
  `id_culture` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_culture`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Tronquer la table avant d'insérer `cultures`
--

TRUNCATE TABLE `cultures`;
-- --------------------------------------------------------

--
-- Structure de la table `produits`
--
-- Création : mar. 04 mai 2021 à 01:34
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL,
  `nom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prix` float NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `culture` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `culture` (`culture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tronquer la table avant d'insérer `produits`
--

TRUNCATE TABLE `produits`;
-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--
-- Création : mar. 04 mai 2021 à 01:34
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
-- Tronquer la table avant d'insérer `reclamations`
--

TRUNCATE TABLE `reclamations`;SET FOREIGN_KEY_CHECKS=1;
COMMIT;
