-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2024 at 07:56 AM
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
  `note` int NOT NULL,
  PRIMARY KEY (`IdAvis`),
  KEY `fk_avis_utilisateur` (`IdUtilisateur`),
  KEY `fk_avis_produit` (`IdProduit`)
) ENGINE=MyISAM AUTO_INCREMENT=6667 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`IdAvis`, `Contenue`, `DateCreation`, `IdUtilisateur`, `IdProduit`, `note`) VALUES
(4444, 'nice shoes', '2024-11-11', 3333, 0, 4),
(5555, 'j\'adore ces chaussures', '2024-11-11', 3333, 1, 5),
(6666, 'Très confortable, je recommande.', '2024-11-12', 3333, 3, 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=5561 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `Nom`, `IdImage`) VALUES
(1, 'Animalerie', 1),
(2, 'Beauté et parfum', 0),
(3, 'Téléphonie', 2),
(4, 'Accessoires UniShop', 0),
(5, 'Bricolage', 0),
(6, 'Auto & moto', 0),
(7, 'Fournitures de bureau', 0),
(8, 'DVD & Blu-ray', 0),
(9, 'Cuisine & Maison', 0),
(10, 'Bagages et accessoires de voyage', 0),
(5555, 'aucun', 0),
(5556, 'couverture', 0),
(5557, 'soulier', 0),
(5558, 'manteau', 0),
(5559, 'tapis de souris', 0),
(5560, 'accessoires', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`IdCommande`, `DateAchat`, `Adresse`, `Telephone`, `IdUtilisateur`, `IdPromo`, `IdProduit`) VALUES
(1001, '2024-11-11', '123 Rue de Paris', 1234567890, 3333, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `IdImage` int NOT NULL AUTO_INCREMENT,
  `lien` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`IdImage`)
) ENGINE=MyISAM AUTO_INCREMENT=1116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`IdImage`, `lien`) VALUES
(1, '../images/animaux.jpg'),
(2, '../images/telephonie.jpg'),
(1111, 'chaussu.jpg'),
(1112, 'botte.jpg'),
(1113, 'noire.png'),
(1114, 'preview.jpeg'),
(1115, 'preview-4.jpeg');

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

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`Quantitee`, `IdProduit`, `IdUtilisateur`) VALUES
(2, 1, 3333),
(1, 3, 3333);

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
  `delayLivraison` int NOT NULL,
  `AppartientVendeur` tinyint(1) NOT NULL,
  `IdImage` int NOT NULL,
  `DateCreation` date NOT NULL,
  `IdUtilisateur` int NOT NULL,
  `IdCategorie` int NOT NULL,
  PRIMARY KEY (`IdProduit`),
  KEY `fk_produit_image` (`IdImage`),
  KEY `fk_produit_utilisateur` (`IdUtilisateur`),
  KEY `fk_produit_categorie` (`IdCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`IdProduit`, `Nom`, `Description`, `Prix`, `delayLivraison`, `AppartientVendeur`, `IdImage`, `DateCreation`, `IdUtilisateur`, `IdCategorie`) VALUES
(4, 'botte', 'une chaussure haute', 36.3, 5, 0, 1112, '0000-00-00', 0, 5555),
(1, 'chaussure', 'un soulier tout neuf', 54.35, 2, 0, 1111, '0000-00-00', 0, 5557),
(2, 'drap noir', 'pour se couvrir', 13.73, 2, 0, 1113, '0000-00-00', 0, 5556),
(3, 'veste sans manche', 'une veste chaude sans manche', 34.05, 1, 0, 1114, '0000-00-00', 0, 5558);

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
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=4445 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUtilisateur`, `Nom`, `Prenom`, `Mail`, `Password`, `EstVendeur`, `Admin`) VALUES
(1, 'Unishop', 'Admin', 'unishop@example.com', 'unishopMDP', 0, 1),
(3333, 'Edward', 'David', 'edwarddavid@gmail.com', '36303630', 0, 0),
(4444, 'Alice', 'Smith', 'alice.smith@example.com', 'pass123', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
