-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2024 at 04:12 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `IdAvis` int NOT NULL AUTO_INCREMENT,
  `Contenue` varchar(500) NOT NULL,
  `DateCreation` date NOT NULL,
  `IdUtilisateur` int NOT NULL,
  `IdProduit` int NOT NULL,
  PRIMARY KEY (`IdAvis`),
  KEY `fk_avis_utilisateur` (`IdUtilisateur`),
  KEY `fk_avis_produit` (`IdProduit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(130) NOT NULL,
  `IdImage` int NOT NULL,
  PRIMARY KEY (`idCategorie`),
  KEY `fk_categorie_iamge` (`IdImage`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `Nom`, `IdImage`) VALUES
(1, 'Animalerie', 0),
(2, 'Beauté et parfum', 0),
(3, 'Téléphonie', 0),
(4, 'Accessoires UniShop', 0),
(5, 'Bricolage', 0),
(6, 'Auto & moto', 0),
(7, 'Fournitures de bureau', 0),
(8, 'DVD & Blu-ray', 0),
(9, 'Cuisine & Maison', 0),
(10, 'Bagages et accessoires de voyage', 0);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `IdCommande` int NOT NULL AUTO_INCREMENT,
  `DateAchat` date NOT NULL,
  `Adresse` varchar(130) NOT NULL,
  `Telephone` int NOT NULL,
  `IdUtilisateur` int NOT NULL,
  `IdPromo` int DEFAULT NULL,
  `IdProduit` int NOT NULL,
  PRIMARY KEY (`IdCommande`),
  KEY `fk_commande_utilisateur` (`IdUtilisateur`),
  KEY `fk_commande_promo` (`IdPromo`),
  KEY `fk_produit_commande` (`IdProduit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `IdImage` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(1000) NOT NULL,
  PRIMARY KEY (`IdImage`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `Quantitee` int NOT NULL,
  `IdProduit` int NOT NULL,
  `IdUtilisateur` int NOT NULL,
  KEY `fk_produit_panier` (`IdProduit`),
  KEY `fk_panier_utilisateur` (`IdUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `IdProduit` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(130) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Prix` double NOT NULL,
  `AppartientVendeur` tinyint(1) NOT NULL,
  `IdImage` int NOT NULL,
  `DateCreation` date NOT NULL,
  PRIMARY KEY (`IdProduit`),
  KEY `fk_produit_image` (`IdImage`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `IdPromo` int NOT NULL AUTO_INCREMENT,
  `CodePromo` varchar(5) NOT NULL,
  `Coefficient` double NOT NULL,
  PRIMARY KEY (`IdPromo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUtilisateur` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(130) NOT NULL,
  `Prenom` varchar(130) NOT NULL,
  `Mail` varchar(400) NOT NULL,
  `Password` varchar(23) NOT NULL,
  `EstVendeur` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
