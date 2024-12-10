-- phpMyadmin SQL Dump
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

-- Charset initial
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de données : `unishop`

-- Table `avis`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `avis` (`idAvis`, `contenu`, `dateCreation`, `idUtilisateur`, `idProduit`, `note`) VALUES
(4444, 'nice shoes', '2024-11-11', 3333, 0, 4),
(5555, 'j\'adore ces chaussures', '2024-11-11', 3333, 1, 5),
(6666, 'Très confortable, je recommande.', '2024-11-12', 3333, 3, 5);

-- Table `categorie`
DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(130) NOT NULL,
  `idImage` int NOT NULL,
  PRIMARY KEY (`idCategorie`),
  KEY `fk_categorie_image` (`idImage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`, `idImage`) VALUES
(1, 'Animalerie', 1),
(2, 'Beauté et parfum', 0),
(3, 'Téléphonie', 2),
(4, 'Accessoires UniShop', 0),
(5, 'Bricolage', 0),
(6, 'Auto & moto', 0);

-- Table `commande`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `commande` (`idCommande`, `dateAchat`, `adresse`, `telephone`, `idUtilisateur`, `idPromo`, `idProduit`) VALUES
(1001, '2024-11-11', '123 Rue de Paris', '1234567890', 3333, NULL, 0);

-- Table `image`
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

-- Table `panier`
DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `quantitee` int NOT NULL,
  `idProduit` int NOT NULL,
  `idUtilisateur` int NOT NULL,
  KEY `fk_produit_panier` (`idProduit`),
  KEY `fk_panier_utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `panier` (`quantitee`, `idProduit`, `idUtilisateur`) VALUES
(2, 1, 3333),
(1, 3, 3333);

-- Table `produit`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `produit` (`idProduit`, `nomProduit`, `description`, `prix`, `delayLivraison`, `appartientVendeur`, `idImage`, `dateCreation`, `idUtilisateur`, `IdCategorie`) VALUES
(4, 'Botte', 'Une chaussure haute', 36.3, 5, 0, 1112, '2024-11-01', 0, 5555);

-- Table `promotion`
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `idPromo` int NOT NULL AUTO_INCREMENT,
  `codePromo` varchar(5) NOT NULL,
  `coefficient` double NOT NULL,
  PRIMARY KEY (`idPromo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table `utilisateur`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `mail`, `password`, `estVendeur`, `admin`) VALUES
(1, 'Unishop', 'Admin', 'unishop@example.com', 'unishopMDP', 0, 1),
(3333, 'Edward', 'David', 'edwarddavid@gmail.com', '36303630', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
