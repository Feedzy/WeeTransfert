-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 21 nov. 2018 à 10:37
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wee-transfert`
--

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

DROP TABLE IF EXISTS `fichier`;
CREATE TABLE IF NOT EXISTS `fichier` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Taille` varchar(50) NOT NULL,
  `Typpe` varchar(50) NOT NULL,
  `Email_destiantaire` varchar(50) NOT NULL,
  `Email_emetteur` varchar(50) NOT NULL,
  `Messages` varchar(200) NOT NULL,
  `lien_fichier` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(80) NOT NULL,
  `Prenom` varchar(80) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `Societe` varchar(80) NOT NULL,
  `Tva` varchar(80) NOT NULL,
  `Adresse` varchar(80) NOT NULL,
  `Ville` varchar(80) NOT NULL,
  `Code_Postal` varchar(80) NOT NULL,
  `Pays` varchar(80) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
