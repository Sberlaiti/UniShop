-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 nov. 2024 à 16:27
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de données : `unishop`

-- Structure de la table `avis`
DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `IdAvis` int NOT NULL,
  `Contenue` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `IdUtilisateur` int NOT NULL,
  `IdProduit` int NOT NULL,
  `DateCreation` date NOT NULL,
  `note` int NOT NULL,
  PRIMARY KEY (`IdAvis`),
  KEY `IdUtilisateur` (`IdUtilisateur`),
  KEY `IdProduit` (`IdProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `avis` (`IdAvis`, `Contenue`, `IdUtilisateur`, `IdProduit`, `DateCreation`, `note`) VALUES
(4444, 'nice shoes', 3333, 0, '2024-11-11', 4),
(5555, 'j\'adore ces chaussures', 3333, 1, '2024-11-11', 5),
(6666, 'Très confortable, je recommande.', 3333, 3, '2024-11-12', 5);

-- Structure de la table `categorie`
DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `IdCategorie` int NOT NULL,
  `Nom` varchar(130) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IdCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categorie` (`IdCategorie`, `Nom`) VALUES
(5555, 'aucun'),
(5556, 'couverture'),
(5557, 'soulier'),
(5558, 'manteau'),
(5559, 'tapis de souris'),
(5560, 'accessoires');

-- Structure de la table `commande`
DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `IdAchat` int NOT NULL,
  `IdUtilisateur` int NOT NULL,
  `Date` date NOT NULL,
  `IdPromo` int NOT NULL,
  `Adresse` varchar(130) COLLATE utf8mb4_general_ci NOT NULL,
  `Telephone` int NOT NULL,
  PRIMARY KEY (`IdAchat`),
  KEY `IdUtilisateur` (`IdUtilisateur`),
  KEY `IdPromo` (`IdPromo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `commande` (`IdAchat`, `IdUtilisateur`, `Date`, `IdPromo`, `Adresse`, `Telephone`) VALUES
(1001, 3333, '2024-11-11', 0, '123 Rue de Paris', 1234567890);

-- Structure de la table `imageproduit`
DROP TABLE IF EXISTS `imageproduit`;
CREATE TABLE IF NOT EXISTS `imageproduit` (
  `IdImage` int NOT NULL,
  `lien` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IdImage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `imageproduit` (`IdImage`, `lien`) VALUES
(1111, 'chaussu.jpg'),
(1112, 'botte.jpg'),
(1113, 'noire.png'),
(1114, 'preview.jpeg'),
(1115, 'preview-4.jpeg');

-- Structure de la table `panier`
DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `IdProduit` int NOT NULL,
  `IdUtilisateur` int NOT NULL,
  `Quantitée` int NOT NULL,
  PRIMARY KEY (`IdUtilisateur`, `IdProduit`),
  KEY `IdProduit` (`IdProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `panier` (`IdProduit`, `IdUtilisateur`, `Quantitée`) VALUES
(1, 3333, 2),
(3, 3333, 1);

-- Structure de la table `produit`
DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `IdProduit` int NOT NULL,
  `Nom` varchar(130) COLLATE utf8mb4_general_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `Prix` decimal(10,2) NOT NULL,
  `delayLivraison` int NOT NULL,
  `IdImage` int NOT NULL,
  `idcat` int NOT NULL,
  `AppartientVendeur` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdProduit`),
  KEY `IdImage` (`IdImage`),
  KEY `idcat` (`idcat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `produit` (`IdProduit`, `Nom`, `Description`, `Prix`, `delayLivraison`, `IdImage`, `idcat`, `AppartientVendeur`) VALUES
(0, 'botte', 'une chaussure haute', 36.30, 5, 1112, 5555, 0),
(1, 'chaussure', 'un soulier tout neuf', 54.35, 2, 1111, 5557, 0),
(2, 'drap noir', 'pour se couvrir', 13.73, 2, 1113, 5556, 0),
(3, 'veste sans manche', 'une veste chaude sans manche', 34.05, 1, 1114, 5558, 0),
(4, 'tapis de souris unishop', 'un tapis ergonomique à l\'effigie de Unishop', 20.99, 5, 1115, 5559, 0);

-- Structure de la table `promotion`
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `IdPromo` int NOT NULL,
  `Code` int NOT NULL,
  `Coefficient` double NOT NULL,
  PRIMARY KEY (`IdPromo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `promotion` (`IdPromo`, `Code`, `Coefficient`) VALUES
(0, 0, 1.0),
(1, 2024, 0.9);

-- Structure de la table `utilisateur`
DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUtilisateur` int NOT NULL,
  `Nom` varchar(130) COLLATE utf8mb4_general_ci NOT NULL,
  `Prenom` varchar(130) COLLATE utf8mb4_general_ci NOT NULL,
  `Mail` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(23) COLLATE utf8mb4_general_ci NOT NULL,
  `EstVendeur` tinyint(1) NOT NULL,
  `pseudo` varchar(24) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `utilisateur` (`IdUtilisateur`, `Nom`, `Prenom`, `Mail`, `Password`, `EstVendeur`, `pseudo`) VALUES
(3333, 'Edward', 'David', 'edwarddavid@gmail.com', '36303630', 0, 'edwin'),
(4444, 'Alice', 'Smith', 'alice.smith@example.com', 'pass123', 0, 'alice');

-- Contraintes pour les tables déchargées
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`IdUtilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`IdProduit`) REFERENCES `produit` (`IdProduit`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`IdUtilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`IdPromo`) REFERENCES `promotion` (`IdPromo`) ON DELETE RESTRICT ON UPDATE RESTRICT;
  
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`IdProduit`) REFERENCES `produit` (`IdProduit`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`IdImage`) REFERENCES `imageproduit` (`IdImage`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`idcat`) REFERENCES `categorie` (`IdCategorie`) ON DELETE RESTRICT ON UPDATE RESTRICT;

COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
