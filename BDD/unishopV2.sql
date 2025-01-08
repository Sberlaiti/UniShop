-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 31, 2024 at 08:56 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

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
  `idAvis` int NOT NULL AUTO_INCREMENT,
  `contenu` varchar(500) NOT NULL,
  `dateCreation` date NOT NULL,
  `idUtilisateur` int NOT NULL,
  `idProduit` int NOT NULL,
  `note` int NOT NULL,
  PRIMARY KEY (`idAvis`),
  KEY `fk_avis_utilisateur` (`idUtilisateur`),
  KEY `fk_avis_produit` (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=6667;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`idAvis`, `contenu`, `dateCreation`, `idUtilisateur`, `idProduit`, `note`) VALUES
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
  `nomCategorie` varchar(130) NOT NULL,
  `idImage` int NOT NULL,
  PRIMARY KEY (`idCategorie`),
  KEY `fk_categorie_image` (`idImage`)
) ENGINE=InnoDB AUTO_INCREMENT=94;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`, `idImage`) VALUES
(1, 'Animalerie', 1),
(2, 'Beauté et parfum', 25),
(3, 'Téléphonie', 2),
(4, 'Produits UniShop', 16),
(5, 'Bricolage', 19),
(6, 'Auto & moto', 18),
(7, 'Promotions', 17),
(8, 'Cuisine & Maison', 21),
(9, 'Jeux vidéos', 23),
(10, 'Sneakers', 26),
(11, 'Fournitures de bureau', 20),
(12, 'Jardin', 22),
(13, 'Livres', 24);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int NOT NULL AUTO_INCREMENT,
  `dateAchat` date NOT NULL,
  `adresse` varchar(130) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `idUtilisateur` int NOT NULL,
  `idPromo` int DEFAULT NULL,
  `idProduit` int NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `fk_commande_utilisateur` (`idUtilisateur`),
  KEY `fk_commande_promo` (`idPromo`),
  KEY `fk_produit_commande` (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=1002;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateAchat`, `adresse`, `telephone`, `idUtilisateur`, `idPromo`, `idProduit`) VALUES
(1001, '2024-11-11', '123 Rue de Paris', '1234567890', 3333, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int NOT NULL AUTO_INCREMENT,
  `lien` varchar(1000) NOT NULL,
  `idProduit` int NOT NULL,
  PRIMARY KEY (`idImage`),
  KEY `fk_image_produit` (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=28;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idImage`, `lien`, `idProduit`) VALUES
(1, './images/animaux.jpg', 4),
(2, './images/telephonie.jpg', 4),
(3, '../articles/preview-2.jpeg', 4),
(4, '../articles/preview-5.jpeg', 4),
(5, '../articles/preview-4.jpeg', 4),
(6, '../articles/preview-3.jpeg', 4),
(7, '../articles/preview.jpeg', 0),
(8, '../articles/preview-6.jpeg', 0),
(9, '../articles/preview-7.jpeg', 0),
(10, '../articles/preview-8.jpeg', 0),
(11, '../articles/preview-9.jpeg', 0),
(12, '../articles/preview-10.jpeg', 0),
(13, '../articles/preview-11.jpeg', 0),
(14, '../articles/preview-12.jpeg', 0),
(15, '../articles/preview-13.jpeg', 0),
(16, '../logos/logo-png.png', 0),
(17, './images/promotion.jpg', 0),
(18, './images/auto.jpg', 0),
(19, './images/bricolage.jpg', 0),
(20, './images/bureau.jpg', 0),
(21, './images/cuisine.jpg', 0),
(22, './images/jardin.jpg', 0),
(23, './images/jeux.jpg', 0),
(24, './images/livre.jpg', 0),
(25, './images/parfum.jpg', 0),
(26, './images/sneaker.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `quantitee` int NOT NULL,
  `idProduit` int NOT NULL,
  `idUtilisateur` int NOT NULL,
  KEY `fk_produit_panier` (`idProduit`),
  KEY `fk_panier_utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`quantitee`, `idProduit`, `idUtilisateur`) VALUES
(2, 4, 3333);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(130) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prix` double NOT NULL,
  `delayLivraison` int NOT NULL,
  `appartientVendeur` tinyint(1) NOT NULL,
  `idImage` int NOT NULL,
  `dateCreation` date DEFAULT NULL,
  `idUtilisateur` int NOT NULL,
  `IdCategorie` int NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `fk_produit_image` (`idImage`),
  KEY `fk_produit_utilisateur` (`idUtilisateur`),
  KEY `fk_produit_categorie` (`IdCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `description`, `prix`, `delayLivraison`, `appartientVendeur`, `idImage`, `dateCreation`, `idUtilisateur`, `IdCategorie`) VALUES
(4, 'Botte', 'Une chaussure haute', 36.3, 5, 0, 1, '2024-11-01', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `idPromo` int NOT NULL AUTO_INCREMENT,
  `codePromo` varchar(5) NOT NULL,
  `coefficient` double(5,2) NOT NULL,
  PRIMARY KEY (`idPromo`)
) ENGINE=InnoDB AUTO_INCREMENT=12;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`idPromo`, `codePromo`, `coefficient`) VALUES
(4, 'SH25G', 50.00),
(5, 'SABER', 10.00),
(6, 'SAMIS', 10.00),
(7, 'SHF58', 10.00),
(8, 'FVHFJ', 10.00),
(9, 'ST85C', 10.00),
(10, 'TRUCS', 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(130) NOT NULL,
  `prenom` varchar(130) NOT NULL,
  `mail` varchar(400) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estVendeur` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3336;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `mail`, `password`, `estVendeur`, `admin`) VALUES
(1, 'UniShop', 'Admin', 'aunishop786@gmail.com', '$2y$10$NSVDfJMSV6cX0XX6cMCDMORUBkDM77q5fM6hZ.pd44l1xshYioCNq', 0, 1),
(3333, 'Edward', 'David', 'edwarddavid@gmail.com', '36303630', 0, 0),
(3334, 'Saber', 'LAITI BEN AYYAD', 'abdelybouchra@gmail.com', '$2y$10$yTp3Y7.SbxVgqewAYsYUX.PivMyoKO2oe.2JGXRmAIVFuZqsK8kDa', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
