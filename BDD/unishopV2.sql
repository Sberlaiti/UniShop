-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2025 at 12:17 PM
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
  `idAvis` int NOT NULL AUTO_INCREMENT,
  `contenu` varchar(500) NOT NULL,
  `dateCreation` date NOT NULL,
  `idUtilisateur` int NOT NULL,
  `idProduit` int NOT NULL,
  `note` int NOT NULL,
  PRIMARY KEY (`idAvis`),
  KEY `fk_avis_utilisateur` (`idUtilisateur`),
  KEY `fk_avis_produit` (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=6667 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `image` (`idImage`, `lien`,`idProduit`) VALUES
(1, './images/animaux.jpg',4),
(2, './images/telephonie.jpg',4),
(3, '../articles/preview-2.jpeg',4),
(4, '../articles/preview-5.jpeg',4),
(5, '../articles/preview-4.jpeg',4),
(6, '../articles/preview-3.jpeg',4);

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` int NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int NOT NULL,
  PRIMARY KEY (`idPanier`),
  KEY `fk_panier_utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `description`, `prix`, `delayLivraison`, `appartientVendeur`, `idImage`, `dateCreation`, `idUtilisateur`, `IdCategorie`) VALUES
(4, 'Botte', 'Une chaussure haute', 36.3, 5, 0, 1, '2024-11-01', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `produitscommande`
--

DROP TABLE IF EXISTS `produitscommande`;
CREATE TABLE IF NOT EXISTS `produitscommande` (
  `idProduit` int NOT NULL,
  `idCommande` int NOT NULL,
  `quantitee` int NOT NULL,
  `prixUnitaire` double NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `fk_produitsCommande_commande` (`idCommande`),
  KEY `fk_produitsCommande_produit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produitspanier`
--

DROP TABLE IF EXISTS `produitspanier`;
CREATE TABLE IF NOT EXISTS `produitspanier` (
  `idProduit` int NOT NULL,
  `idPanier` int NOT NULL,
  `quantitee` int NOT NULL,
  PRIMARY KEY (`idPanier`,`idProduit`),
  KEY `fk_produitsPanier_produit` (`idProduit`),
  KEY `fk_produitsPanier_panier` (`idPanier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `idPromo` int NOT NULL AUTO_INCREMENT,
  `codePromo` varchar(5) NOT NULL,
  `coefficient` double(5,2) NOT NULL,
  `idUtilisateur` int NOT NULL,
  PRIMARY KEY (`idPromo`),
  KEY `fk_promotion_user` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(130) NOT NULL,
  `prenom` varchar(130) NOT NULL,
  `pseudo` varchar(130) NOT NULL,
  `mail` varchar(400) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estVendeur` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `date_gagnantPromo` datetime DEFAULT NULL,
  `date_last_played` datetime DEFAULT NULL,
  `coupPlayed` int DEFAULT '3',
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3336 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `pseudo`, `mail`, `password`, `estVendeur`, `admin`, `date_gagnantPromo`, `date_last_played`, `coupPlayed`) VALUES
(1, 'UniShop', 'Admin', 'admin', 'aunishop786@gmail.com', '$2y$10$NSVDfJMSV6cX0XX6cMCDMORUBkDM77q5fM6hZ.pd44l1xshYioCNq', 0, 1, NULL, NULL, 3),
(3333, 'Edward', 'David', 'eddy', 'edwarddavid@gmail.com', '36303630', 0, 0, NULL, NULL, 3),
(3334, 'Saber', 'LAITI BEN AYYAD', 'sayber', 'abdelybouchra@gmail.com', '$2y$10$yTp3Y7.SbxVgqewAYsYUX.PivMyoKO2oe.2JGXRmAIVFuZqsK8kDa', 0, 0, NULL, NULL, 3);

DELIMITER $$
--
-- Events
--
DROP EVENT IF EXISTS `clear_promotion_date`$$
CREATE DEFINER=`root`@`localhost` EVENT `clear_promotion_date` ON SCHEDULE EVERY 1 DAY STARTS '2025-01-09 13:11:56' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE utilisateur
  SET date_gagnantPromo = NULL
  WHERE date_gagnantPromo IS NOT NULL
  AND DATE_ADD(date_gagnantPromo, INTERVAL 7 DAY) <= NOW()$$

DROP EVENT IF EXISTS `clear_dateLastPlayed`$$
CREATE DEFINER=`root`@`localhost` EVENT `clear_dateLastPlayed` ON SCHEDULE EVERY 1 DAY STARTS '2025-01-09 13:30:29' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE utilisateur
    SET date_last_played = NULL
    WHERE date_last_played IS NOT NULL
    AND DATE_ADD(date_last_played, INTERVAL 7 DAY) <= NOW()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
