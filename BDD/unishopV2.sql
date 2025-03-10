-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2025 at 07:58 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=6667 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `avis` (`idAvis`, `contenu`, `dateCreation`, `idUtilisateur`, `idProduit`, `note`) VALUES
(1, 'Excellente souris gaming, très réactive et confortable. Je recommande vivement !', '2025-01-22', 1, 1, 5),
(3, 'Mon chien adore ces croquettes ! Très bonne qualité.', '2025-01-22', 1, 2, 5),
(5, 'Chaise très confortable et bien conçue. Montage facile.', '2025-01-22', 1, 3, 5),
(7, 'Un chef-d’œuvre de jeu vidéo ! Graphismes et gameplay incroyables.', '2025-01-22', 1, 4, 5),
(9, 'Très beau jeu avec une histoire captivante. Valeur sûre.', '2025-01-22', 1, 5, 5),
(11, 'L’iPhone 16 est tout simplement incroyable, surtout l’appareil photo.', '2025-01-22', 1, 6, 5),
(13, 'Très bonne qualité, je recommande cette veste.', '2025-01-22', 1, 7, 5),
(15, 'Stylo pratique et bien conçu pour son prix.', '2025-01-22', 1, 8, 5),
(17, 'Clé USB rapide et fiable. Très bon rapport qualité/prix.', '2025-01-22', 1, 9, 5),
(19, 'Très bon tapis de souris, agréable à utiliser.', '2025-01-22', 1, 10, 5),
(21, 'Tee-shirt confortable et bien coupé.', '2025-01-22', 1, 11, 5);
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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `idUtilisateur` int NOT NULL,
  `dateAchat` date NOT NULL,
  `adresse` varchar(130) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `idPromo` int DEFAULT NULL,
  `totale` double DEFAULT NULL,
  `modePaiement` varchar(130) DEFAULT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `fk_commande_utilisateur` (`idUtilisateur`),
  KEY `fk_commande_promo` (`idPromo`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idCommande`, `idUtilisateur`, `dateAchat`, `adresse`, `telephone`, `idPromo`, `totale`, `modePaiement`) VALUES
(1001, 3333, '2024-11-11', '123 Rue de Paris', '1234567890', NULL, 10000, 'Carte bancaire');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idImage`, `lien`, `idProduit`) VALUES
(1, './images/animaux.jpg', 0),
(2, './images/telephonie.jpg', 0),
(3, '../articles/preview-2.jpeg', 0),
(4, '../articles/preview-5.jpeg', 0),
(5, '../articles/preview-4.jpeg', 0),
(6, '../articles/preview-3.jpeg', 0),
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
(26, './images/sneaker.jpeg', 0),
(28, '../articles/chaiseGaming1.jpg', 3),
(29, '../articles/chaiseGaming2.jpg', 3),
(30, '../articles/chaiseGaming3.jpg', 3),
(31, '../articles/chaiseGaming4.jpg', 3),
(32, '../articles/chaiseGaming5.jpg', 3),
(33, '../articles/souris1.jpg', 1),
(34, '../articles/souris2.jpg', 1),
(35, '../articles/souris3.jpg', 1),
(36, '../articles/souris4.jpg', 1),
(37, '../articles/souris5.jpg', 1),
(38, '../articles/nourriture1.jpg', 2),
(39, '../articles/nourriture2.jpg', 2),
(40, '../articles/nourriture3.jpg', 2),
(41, '../articles/nourriture3.jpg', 2),
(42, '../articles/nourriture4.jpg', 2),
(43, '../articles/iphone1.jpg', 6),
(44, '../articles/iphone2.jpg', 6),
(45, '../articles/iphone3.jpg', 6),
(46, '../articles/iphone4.jpg', 6),
(47, '../articles/spiderman1.jpg', 4),
(48, '../articles/spiderman2.jpg', 4),
(49, '../articles/spiderman3.jpg', 4),
(50, '../articles/spiderman4.jpg', 4),
(51, '../articles/spiderman5.jpg', 4),
(52, '../articles/horizon1.jpg', 5),
(53, '../articles/horizon2.jpg', 5),
(54, '../articles/horizon3.jpg', 5),
(55, '../articles/horizon4.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` int NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int NOT NULL,
  PRIMARY KEY (`idPanier`),
  KEY `fk_panier_utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO panier (idPanier, idUtilisateur) VALUES
(1, 3338),
(2, 3339),
(3, 3340);



-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(130) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `prix` double(10,2) NOT NULL,
  `prixPromotion` double(5,2) DEFAULT NULL,
  `delayLivraison` int NOT NULL,
  `enPromotion` tinyint(1) NOT NULL DEFAULT '0',
  `idImage` int NOT NULL,
  `dateCreation` date NOT NULL,
  `idUtilisateur` int NOT NULL,
  `IdCategorie` int NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `fk_produit_image` (`idImage`),
  KEY `fk_produit_utilisateur` (`idUtilisateur`),
  KEY `fk_produit_categorie` (`IdCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `description`, `prix`, `prixPromotion`, `delayLivraison`, `enPromotion`, `idImage`, `dateCreation`, `idUtilisateur`, `IdCategorie`) VALUES
(1, 'Logitech G203 Souris Gaming ', 'Capteur 8 000 PPP: le capteur gaming répond précisément à vos mouvements. Personnalisez les paramètres avec le logiciel gaming Logitech G HUB en fonction de la sensibilité que vous souhaitez et passez facilement d\'une résolution à l\'autre, parmi 5 paramètres\r\n- LIGHTSYNC RVB coloré: jouez en couleur avec notre technologie LIGHTSYNC RVB la plus vibrante, grâce à des effets de vagues personnalisables sur environ 16,8 millions de couleurs. Installez le logiciel Logitech G HUB pour choisir parmi d', 44.99, NULL, 5, 0, 33, '2025-01-20', 3339, 11),
(2, 'Franklin – Nourriture pour Chien Stérilisé', 'Voilà la recette idéale pour les chiens en quête d’équilibre! Au menu : du poulet, une viande complète riche en protéines pour avoir la pêche, des fruits et des légumes pour faire le plein de vitamines, des minéraux et des prébiotiques pour renforcer la santé intestinale.\r\n- 70% DE POULET : une protéine de grande qualité pour ses muscles de carnivore, permettant un bon équilibre nutritionnel\r\n- UN TAUX DE PROTÉINES ÉLEVÉ : Des croquettes chien complètes et hautement digestibles avec un taux de', 24.90, NULL, 5, 0, 38, '2025-01-20', 3339, 1),
(3, 'GTPLAYER Chaise Gaming', 'Matériaux de haute qualité : La chaise gaming est recouverte d\'un tissu doux au lieu de cuir. Le tissu technique a un aspect unique, présente des caractéristiques telles que la résistance à l\'usure, aux rayures, à l\'eau et aux alcalis, et est également ignifuge, imperméable et respirant. La performance anti-âge est excellente et la durée de vie du produit du chiffon technique peut atteindre 5 à 10 ans.\n- Accoudoirs réglables : Les bras de chaise gaming s\'adaptent bien même en position allongé', 159.99, 90.98, 5, 1, 28, '2025-01-20', 3340, 11),
(4, 'Sony, Marvel\'s Spider-Man 2 PS5', 'Jeu PS5 d\'action : Jouez avec deux Spider-Man (Peter Parker et Miles Morales), affrontez de nouveaux ennemis et partez à l’aventure dans un New York de Marvel plus vaste que jamais (nouveaux quartiers, nouveaux lieux)\nDes graphismes éblouissants en 4K et en HDR reproduits avec un incroyable souci de détail jusqu\'aux reflets sur les bâtiments\nDes sensations inédites grâce au retour haptique et aux gâchettes adaptatives de votre manette DualSense : ressentez chaque coup que vous portez ou chaque t', 79.99, 50.99, 5, 1, 47, '2025-01-22', 3340, 9),
(5, 'Sony, Horizon Forbidden West PS5', 'Jeu PS5 de rôle et d\'action-aventure dans un immense monde ouvert aussi sublime que menaçant, avec des personnages éclectiques et saisissants au coeur d\'une histoire riche en émotions\r\nUn univers fait de forêts verdoyantes et de villes subermgées réhaussé par des graphismes éblouissants en 4K et en HDR : un souci du détail incroyable des brins d\'herbe jusqu\'au sommet des montagnes\r\nExpérience de jeu intense grâce au retour haptique et aux gâchettes adaptatives de votre manette DualSense PS5 : re', 39.90, NULL, 5, 0, 52, '2025-01-21', 3340, 9),
(6, 'Apple iPhone 16 (128 Go) - Noir', 'COMMANDE DE L’APPAREIL PHOTO. LE CONTRÔLE À PORTÉE DE MAIN – Commande de l’appareil photo vous offre un accès plus rapide aux outils photo et vidéo, tels que le zoom ou la profondeur de champ, pour vous permettre de prendre la photo parfaite en un temps record.\r\nSI PRÈS, MÊME DE LOIN – La caméra ultra grand-angle améliorée, avec mise au point automatique, vous permet de prendre des photos et des vidéos macro extrêmement détaillées. Utilisez la caméra Fusion 48 Mpx pour des images haute résolutio', 919.00, NULL, 5, 0, 43, '2025-01-21', 3340, 3),
(7, 'Veste UniShop', 'Veste simple pour soutenir notre marque.', 39.99, NULL, 5, 0, 7, '2025-01-01', 1, 4),
(8, 'Stylo UniShop - Noir', 'Stylo noir de la marque UniShop pour soutenir notre marque.', 1.00, NULL, 5, 0, 3, '2025-01-03', 1, 4),
(9, 'Clé USB UniShop - 32 Go USB 3.2', 'Clé USB en USB 3.2 avec un stockage de 32 Go de la marque UniShop pour soutenir notre marque.', 5.99, 1.50, 5, 1, 6, '2025-01-03', 1, 4),
(10, 'Tapis de souris UniShop', 'Tapis de souris UniShop d\'un diamètre de 10 cm pour soutenir notre marque.', 0.50, NULL, 5, 0, 5, '2025-01-01', 1, 4),
(11, 'Tee-Shirt UniShop - Noir', 'Tee-Shirt UniShop noir avec taille : XS - X - L - S - M pour soutenir notre marque.', 10.50, NULL, 5, 0, 4, '2025-01-04', 1, 4),
(12, 'Casquette UniShop - Blanc', 'Casquette UniShop blanche pour soutenir notre marque.', 5.99, NULL, 5, 0, 8, '2025-01-05', 1, 4),
(13, 'Sac UniShop - Blanc', 'Sac blanc UniShop pour ranger ses affaires de course ou ses affaires de cours pour soutenir notre marque.', 1.00, NULL, 5, 0, 9, '2025-01-02', 1, 4);


-- --------------------------------------------------------

--
-- Table structure for table `produitcategorie`
--

DROP TABLE IF EXISTS `produitcategorie`;
CREATE TABLE IF NOT EXISTS `produitcategorie` (
  `idProduit` int NOT NULL,
  `idCategorie` int NOT NULL,
  PRIMARY KEY (`idProduit`,`idCategorie`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produitcategorie`
--

INSERT INTO `produitcategorie` (`idProduit`, `idCategorie`) VALUES
(1, 7),
(3, 7),
(9, 7);

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
  PRIMARY KEY (`idCommande`, `idProduit`),
  KEY `fk_produitsCommande_commande` (`idCommande`),
  KEY `fk_produitsCommande_produit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `produitscommande`
--

INSERT INTO `produitscommande` (`idProduit`, `idCommande`, `quantitee`, `prixUnitaire`) VALUES
(4, 1001, 1, 1000000.3);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produitspanier`
--

INSERT INTO `produitspanier` (`idProduit`, `idPanier`, `quantitee`) VALUES
(1, 118, 1),
(2, 118, 1),
(3, 118, 1);


-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `idPromo` int NOT NULL AUTO_INCREMENT,
  `codePromo` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `coefficient` double(5,2) NOT NULL,
  `dateGagnant` datetime NOT NULL,
  `idUtilisateur` int NOT NULL,
  PRIMARY KEY (`idPromo`),
  KEY `fk_promotion_user` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`idPromo`, `codePromo`, `coefficient`, `idUtilisateur`) VALUES
(14, 'UNI15', 15.00, 3337);

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
  `adresse` varchar(130) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `estVendeur` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `date_gagnantPromo` datetime DEFAULT NULL,
  `date_last_played` datetime DEFAULT NULL,
  `coupPlayed` int DEFAULT '3',
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3338 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `pseudo`, `mail`, `password`, `estVendeur`, `admin`, `date_gagnantPromo`, `date_last_played`, `coupPlayed`) VALUES
(1, 'UniShop', 'Admin', 'UniShop', 'aunishop786@gmail.com', '$2y$10$NSVDfJMSV6cX0XX6cMCDMORUBkDM77q5fM6hZ.pd44l1xshYioCNq', 1, 1, NULL, NULL, 3),
(3338, 'Chil', 'Benin', 'Bchil', 'beniChil@gmail.com', '$2y$10$RTMXYe34uwrbuNR7Q7xMAuPTjbDKumSbG3S/yglK.mL0AXjhUVhL.', 0, 0, NULL, NULL, 3),
(3339, 'Arice', 'Louman', 'superAcheteur', 'a01Louman@gmail.com', '$2y$10$553Pjtj0uHOY/G1Wd/kwo.H.tMbGkGNr4.wAdedv3qHTk6u5RHasW', 1, 0, NULL, NULL, 3),
(3340, 'Rob', 'Collin', 'Collin', 'collinB@gmail.com', '$2y$10$DfB6O7cmi4rS6dYOvW6/gOMdXi.OXhgCQNZTmO9da2HL2uPg/YARu', 1, 0, NULL, NULL, 3);

-- --------------------------------------------------------

DELIMITER $$
--
-- Events
--
DROP EVENT IF EXISTS `clearCoups`
CREATE DEFINER=`root`@`localhost` EVENT `clearCoups` ON SCHEDULE EVERY 1 WEEK STARTS '2025-01-10 21:04:23' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE utilisateur
    SET coupPlayed = 3
    WHERE DATEDIFF(NOW(), date_last_played) >= 7;

DROP EVENT IF EXISTS `clear_promotion_date`
CREATE DEFINER=`root`@`localhost` EVENT `clear_promotion_date` ON SCHEDULE EVERY 1 DAY STARTS '2025-01-09 13:11:56' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE utilisateur
  SET date_gagnantPromo = NULL
  WHERE date_gagnantPromo IS NOT NULL
  AND DATE_ADD(date_gagnantPromo, INTERVAL 7 DAY) <= NOW();

DROP EVENT IF EXISTS `clear_dateLastPlayed`
CREATE DEFINER=`root`@`localhost` EVENT `clear_dateLastPlayed` ON SCHEDULE EVERY 1 DAY STARTS '2025-01-09 13:30:29' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE utilisateur
    SET date_last_played = NULL
    WHERE date_last_played IS NOT NULL
    AND DATE_ADD(date_last_played, INTERVAL 7 DAY) <= NOW();

DROP EVENT IF EXISTS `clearPromotion`
CREATE DEFINER=`root`@`localhost` EVENT `clearPromotion` ON SCHEDULE EVERY 1 HOUR STARTS '2025-01-21 18:36:32' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM promotion WHERE TIMESTAMPDIFF(HOUR, dateGagnant, NOW()) >=24;


DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
