-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 11 déc. 2023 à 13:08
-- Version du serveur : 8.0.27
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vincentbas_projet-final`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `password`, `email`) VALUES
(1, '$2y$10$HKrBbJKQn2sv0AfgsrLiauJNwSnPha09/D1pOccTliz7A80hAFzs2', 'test@test.fr');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `subject` int NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `email`, `message`, `subject`) VALUES
(2, 'vincentbsr88@gmail.com', 'Hdhdhdg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

DROP TABLE IF EXISTS `img`;
CREATE TABLE IF NOT EXISTS `img` (
  `id_img` int NOT NULL AUTO_INCREMENT,
  `id_product` int NOT NULL,
  `img` varchar(256) NOT NULL,
  `alt_img` varchar(256) NOT NULL,
  `slider` tinyint(1) NOT NULL,
  `slider_auto` tinyint(1) NOT NULL DEFAULT '0',
  `moderate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_img`),
  KEY `id_product` (`id_product`),
  KEY `id_img` (`id_img`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `img`
--

INSERT INTO `img` (`id_img`, `id_product`, `img`, `alt_img`, `slider`, `slider_auto`, `moderate`) VALUES
(13, 1, 'public/img/maison-1/facade.jpg', 'Facade', 1, 1, 1),
(14, 1, 'public/img/maison-1/bedroom.jpg', 'Première chambre', 0, 0, 1),
(15, 1, 'public/img/maison-1/bedroom-2.jpg', 'Deuxième chambre', 1, 0, 1),
(16, 1, 'public/img/maison-1/cuisine.jpg', 'Grande cuisine', 1, 0, 1),
(17, 1, 'public/img/maison-1/salle-de-bain.jpg', 'Salle de bain', 0, 0, 1),
(18, 1, 'public/img/maison-1/salon.jpg', 'Grand salon', 0, 0, 1),
(19, 2, 'public/img/maison-2/facade-maison-2.jpg', 'Facade', 1, 1, 1),
(20, 2, 'public/img/maison-2/bedroom.jpg', 'chambre', 0, 0, 1),
(21, 2, 'public/img/maison-2/bedroom-2.jpg', 'chambre', 1, 0, 1),
(22, 2, 'public/img/maison-2/salle-de-bain.jpg', 'Salle de bain', 0, 0, 1),
(23, 2, 'public/img/maison-2/salon-cuisine.jpg', 'Salon avec cuisine ouverte', 0, 0, 1),
(32, 4, 'public/img/appartement/facade-immeuble.jpg', 'Facade ', 0, 0, 1),
(35, 2, 'public/img/maison-2/bureau.jpg', 'bureau', 0, 0, 1),
(36, 4, 'public/img/appartement/salon.jpg', 'salon', 0, 0, 1),
(37, 4, 'public/img/appartement/cuisine.jpg', 'cuisine', 0, 0, 1),
(38, 4, 'public/img/appartement/salle-de-bain.jpg', 'salle de bain', 0, 0, 1),
(39, 4, 'public/img/appartement/balcon.jpg', 'balcon', 0, 0, 1),
(40, 4, 'public/img/appartement/bedroom.jpg', 'bedroom', 0, 0, 1),
(48, 7, 'public/img/maison-new/facade-maison-new.jpg', 'facade', 0, 1, 1),
(49, 7, 'public/img/maison-new/bedroom.jpg', 'chambre', 0, 0, 1),
(50, 7, 'public/img/maison-new/bedroom2.jpg', 'deuxième chambre', 0, 0, 1),
(51, 7, 'public/img/maison-new/cuisine-maison-new.jpg', 'Cuisine', 0, 0, 1),
(52, 7, 'public/img/maison-new/salle-de-bain-maison-new.jpg', 'salle de bain', 0, 0, 1),
(53, 7, 'public/img/maison-new/salon-maison-new.jpg', 'salon', 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int NOT NULL AUTO_INCREMENT,
  `name_product` varchar(100) NOT NULL,
  `moderate` tinyint NOT NULL,
  `description` text NOT NULL,
  `prix` int NOT NULL,
  `new_product` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `moderate`, `description`, `prix`, `new_product`) VALUES
(1, 'Jolie maison de 145m²', 1, 'Superbe maison de 145 m², le tout sur 1 450 m² de terrain comprenant :\r\n2 chambres de 15 et 20 m², un grand salon de 35 m², une cuisine moderne et équipée de 18 m², un double garage avec chaufferie.', 145000, 0),
(2, 'Grande maison familiale 210m²', 1, 'Grande maison familiale de 210 m² comprenant :\r\nau rez-de-chaussée : un grand salon avec cuisine ouverte de 53 m², WC, buanderie\r\nÀ l\'étage : deux chambres de 25 m² chacune, une salle de bain avec vasque, wc et une baignoire l\'ensemble sur une parcelle de 2 500 m² fleurie est arboré.\r\nCette magnifique maison n\'attend que vous pour s\'illuminer davantage alors n\'hésitez pas, Contactez-nous !', 260000, 0),
(4, 'Appartement de 200m²', 1, 'Grand appartement de luxe avec balcon de 15 m², cuisine équipée de 20 m², salle de bain avec baignoire (idéale pour les enfants), un magnifique salon de 41 m² et deux chambres de 20 m² chacune.', 789000, 0),
(7, 'Manoir de 350m²', 1, 'Sublime manoir de 350 m² restauré comprenant au rez de chausser:une magnifique et grande cuisine bien éclairer et aménager de 30 m²Un salon de 45 m² contemporains avec une belle luminositéUn double garage, atelier, chaufferieÀ l\'étage :une salle de bain de 25 m² avec baignoire centrale et douche 3 chambres de 15 m², 20 m², 17 m²Si ce bien vous plaît n\'hésitez pas à prendre contact pour plus de renseignements\r\n\r\n', 485000, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `fk_img_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
