-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 13 déc. 2024 à 09:19
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `webweek`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int NOT NULL AUTO_INCREMENT,
  `date_evenement` date NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_evenement`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `date_evenement`, `lieu`, `description`) VALUES
(1, '2023-09-30', 'Saint-Cyr sur Mer', 'Organisation d\'une sortie en mer avec Azur-Plongée. 4 plongées prévues, hébergement en chambres collectives, transport en minibus.'),
(2, '2024-10-15', 'Lac d’Issarlès', 'Exploration des fonds rocheux et observation des écosystèmes aquatiques. Repas partagé au bord du lac.'),
(3, '2024-12-23', 'Lac du Bouchet', 'Sortie conviviale avec deux plongées encadrées pour tous niveaux. Co-voiturage proposé, pique-nique à partager.');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id_inscription` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_evenement` int DEFAULT NULL,
  `commentaire` text,
  PRIMARY KEY (`id_inscription`),
  KEY `id_evenement` (`id_evenement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `date_publication` datetime NOT NULL,
  `contenu` text NOT NULL,
  `auteur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id_news`, `titre`, `date_publication`, `contenu`, `auteur`) VALUES
(1, 'SORTIE MER \"SPÉCIAL RENTRÉE\"', '2023-09-30 00:00:00', 'Organisation d\'une sortie en mer avec Azur-Plongée à Saint-Cyr sur Mer, 4 plongées prévues, limité à 19 plongeurs. Hébergement en chambres collectives, transport en minibus.', 'Marie ou Thierry'),
(2, 'FIN DE SAISON!', '2024-06-12 00:00:00', 'Dernière session d\'entraînement piscine, plongées au Lac du Bouchet pour l\'été. Retour des cartes piscine demandé avant le 30 juin.', 'Non précisé'),
(3, 'SORTIE \"PLONGÉE DÉCOUVERTE\" AU LAC DU BOUCHET', '2024-12-23 00:00:00', 'Sortie conviviale au Lac du Bouchet, deux plongées encadrées pour tous niveaux. Co-voiturage proposé, pique-nique à partager.', 'Laurence ou Hugo'),
(4, 'SORTIE \"PLONGÉE EN ALTITUDE\" AU LAC D’ISSARLÈS', '2024-10-15 00:00:00', 'Sortie spéciale au Lac d’Issarlès, exploration des fonds rocheux et écosystèmes locaux. Repas partagé au bord du lac.', 'Non précisé'),
(5, 'REPRISE DES ACTIVITÉS AU PUY : C’EST LA RENTRÉE DU CSP', '2024-10-04 00:00:00', 'Reprise des entraînements piscine, ateliers techniques et sessions pour débutants. Initiations à la plongée en eau froide et formations pour lacs d’altitude.', 'contact@csp-plongee.fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
