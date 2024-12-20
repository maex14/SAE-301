-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 20 déc. 2024 à 11:34
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
-- Structure de la table `comptes`
--

DROP TABLE IF EXISTS `comptes`;
CREATE TABLE IF NOT EXISTS `comptes` (
  `id_compte` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` enum('admin','utilisateur') DEFAULT 'utilisateur',
  PRIMARY KEY (`id_compte`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id_compte`, `nom`, `prenom`, `email`, `mot_de_passe`, `role`) VALUES
(2, 'Bertrand', 'Alexis', 'magegege@gmail.com', '$2y$10$9fARlsyow/th503uEE5neevbQoTmP9mCA9/NuMvj6pFAI5csFMvfW', 'utilisateur'),
(3, 'Admin', 'One', 'admin1@example.com', '$2y$10$RN0p9HosD9FViv2nk/v5q.rKF4S89cpufoUFrj7Pbdr8IdkkY7kEy', 'admin'),
(4, 'Admin', 'Two', 'admin2@example.com', '$2y$10$8X5SG8/vznrHJBtnUqiqEeeaFHrZAKI.HH/tN3cJkZDP17C9p5ajG', 'admin'),
(5, 'Sifi', 'Noafel', 'petitbiscuit@gmail.com', '$2y$10$veX/RCsHqY5Rb2djRSIUh.Yt2vC3xWMGkvFogDEHBcw5QtTzLYmo2', 'utilisateur'),
(6, 'Guilloteau', 'Killian', 'kiki@gmail.com', '$2y$10$UeeKP93o4mxd.P.hXxAbuOH56lF8XHDoJ8iFgJK.EpvDkx/gi8ZhO', 'utilisateur'),
(7, 'Grasset', 'Maxence', 'maxegrasset@gmail.com', '$2y$10$WFVWYYslgqrE19S4D4vD0.mQMMq9Ave1xzrAXZXVAtA52Utrf7FxS', 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `date_evenement` date NOT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `description` text,
  `id_lieu` int DEFAULT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `id_lieu` (`id_lieu`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `titre`, `date_evenement`, `lieu`, `description`, `id_lieu`) VALUES
(9, 'Atelier \"Préparation à la saison de plongée 2024\"', '2024-01-01', 'Piscine de la Vague', 'Session dédiée à la révision des connaissances théoriques (signes, tables, équipements) et exercices pratiques en piscine.', NULL),
(10, 'Sortie Fosses Techniques', '2024-02-24', 'Fosse UCPA de Lyon', 'Entraînements en fosse pour les plongeurs N2/N3 ou PE40, axés sur la stabilisation et les exercices de gestion de gaz.', NULL),
(11, 'Sortie Mer à Marseille (N2 et Exploration)', '2024-04-20', 'Marseille', 'Week-end plongée pour découvrir les épaves et sites emblématiques de la région. Niveau 2 minimum, avec possibilité d\'encadrement pour PE40 sous réserve d\'inscriptions suffisantes.', NULL),
(12, 'Fin des entraînements piscine 2024', '2024-12-21', 'Piscine de la Vague', 'Dernière séance de piscine avant la pause hivernale.', NULL),
(13, 'Sortie Fosse 15m Clermont-Ferrand', '2024-12-22', 'Fosse de Clermont-Ferrand', 'Entraînement en profondeur pour perfectionner la stabilisation et préparer la reprise en milieu naturel.', NULL),
(14, 'Reprise des entraînements apnée', '2025-01-07', 'Piscine de la Vague', 'Début des entraînements apnée pour la nouvelle année.', NULL),
(15, 'Reprise des entraînements plongée', '2025-01-08', 'Piscine de la Vague', 'Reprise des entraînements réguliers de plongée en piscine.', NULL),
(16, 'Salon de la Plongée - Paris', '2025-02-09', 'Paris', 'Grand rendez-vous annuel pour découvrir les nouveautés de la plongée, assister à des conférences, et échanger avec des professionnels du milieu.', NULL),
(18, 'BONJOUR MARCEL', '2024-12-29', 'exemple burger', 'uzdauihdauq', 4);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

DROP TABLE IF EXISTS `formations`;
CREATE TABLE IF NOT EXISTS `formations` (
  `id_formation` int NOT NULL AUTO_INCREMENT,
  `nom_formation` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id_inscription` int NOT NULL AUTO_INCREMENT,
  `civilite` enum('M.','Mme','Autre') NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` text,
  `ville` varchar(255) DEFAULT NULL,
  `departement` varchar(255) DEFAULT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `niveau` varchar(255) DEFAULT NULL,
  `date_inscription` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_formations` int DEFAULT NULL,
  `id_compte` int DEFAULT NULL,
  `commentaire` text,
  PRIMARY KEY (`id_inscription`),
  KEY `id_compte` (`id_compte`),
  KEY `id_formations` (`id_formations`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id_inscription`, `civilite`, `nom`, `prenom`, `email`, `adresse`, `ville`, `departement`, `code_postal`, `telephone`, `niveau`, `date_inscription`, `id_formations`, `id_compte`, `commentaire`) VALUES
(1, '', 'Grasset', 'Maxence', 'maxegrasset@gmail.com', '10 rue des mourgues ', 'Puy en velay', 'Haute Loire', '43000', '0695988191', 'debutant', '2024-12-20 12:30:16', NULL, NULL, 'J\'aimerai apprendre.');

-- --------------------------------------------------------

--
-- Structure de la table `lieux`
--

DROP TABLE IF EXISTS `lieux`;
CREATE TABLE IF NOT EXISTS `lieux` (
  `id_lieu` int NOT NULL AUTO_INCREMENT,
  `nom_lieu` varchar(100) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lieu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `lieux`
--

INSERT INTO `lieux` (`id_lieu`, `nom_lieu`, `adresse`) VALUES
(4, 'exemple burger', '10 rue des mourgues puy en velay');

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
  `auteur` varchar(100) DEFAULT NULL,
  `id_evenement` int DEFAULT NULL,
  PRIMARY KEY (`id_news`),
  KEY `id_evenement` (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id_news`, `titre`, `date_publication`, `contenu`, `auteur`, `id_evenement`) VALUES
(6, 'Fin d\'année : Entraînements suspendus', '2024-03-20 14:00:00', 'Reprise les 7-8 Janvier 2025\n\nFin d\'année : Entraînements suspendus \nIl n\'y aura pas d\'entraînement en piscine pendant les vacances de Noël. Le dernier entraînement bassin de 2024 aura donc lieu le mercredi 18 décembre. La séance fosse pour les PN3 est bien maintenue le samedi 21 décembre. Nous nous retrouverons dès le mardi 7 janvier pour l\'apnée et le mercredi 8 janvier pour la plongée. D\'ici là, le comité directeur vous souhaite de belles fêtes de fin d\'année.', 'Olivier GOUBARD', NULL),
(7, 'Rentrée du CVP !', '2024-04-20 14:00:00', '11 sept 2024\n\nRentrée du CVP !\nA noter dans vos agendas : la rentrée du club est programmée le Mercredi 11 septembre 2024 . Rendez-vous à 19h45 dans le hall de la piscine de la Vague au Puy en Velay.', 'Olivier GOUBARD', NULL),
(8, 'Reprise des plongées', '2024-05-20 14:00:00', 'Les plongées au Lac du Bouchet reprennent dès ce dimanche 23 juin 2024. Le fonctionnement reste le même que les années précédentes. Vous avez un fichier partagé sur lequel vous devez vous inscrire afin que le Directeur de Plongée puisse organiser l\'activité. Merci de ne pas attendre le dernier moment pour vous inscrire !', 'Olivier GOUBARD', NULL),
(9, 'Le chant du Lac du Bouchet', '2024-06-20 14:00:00', 'Non ce n\'est pas le monstre du lac !\n\nLe chant du Lac du Bouchet\nUne vidéo prise par Françoise à l\'occasion de l\'une de ses balades au Lac du Bouchet. Montez le son et écoutez : les petits mugissements que vous entendez sont ceux de la glace qui travaille à la surface du lac. Impressionnant et très joli !', 'Olivier GOUBARD', NULL),
(10, 'Pas d\'entraînement SAM. 14 Octobre (sauf N1)', '2024-07-20 14:00:00', '...pour cause de compétition\n\nPas d\'entraînement SAM. 14 Octobre (sauf N1)\nEn raison de la tenue de la compétition de hockey subaquatique, il n\'y aura pas d\'entraînement du CVP ce samedi 14 Octobre 2023.\n\nSeul le groupe des prépas-N1 aura son entraînement à la fosse comme prévu.', 'Olivier GOUBARD', NULL),
(11, 'Sortie mer \"spécial rentrée\"', '2024-08-20 14:00:00', 'Pour se retrouver\n\nSortie mer spécial rentrée \nLe CVP organise à l\'intention de ses membres une sortie club en mer, du 30/09 au 01/10 (arrivée le 29/09 avant 23h). Cette sortie se déroulera à Saint-Cyr sur mer, avec Azur-Plongée.\n\n4 plongées sont prévues sur le WE. L\'hébergement se fait en chambres collectives.\n\nLa sortie est ouverte à tous mais sera limitée à 19 plongeurs. Nous prendrons les 19 premiers inscrits.\n\nEn ce qui concerne les N1 ou PE40, la confirmation de votre inscription sera corrélée aux volontariat d\'encadrement du CVP présent sur place (il s\'agit d\'une sortie loisir et non d\'une sortie technique).\n\nUn transport en minibus sera proposé.\n\nPour tout renseignement et pour votre inscription, se rapprocher de Marie ou Thierry au Club.', 'Olivier GOUBARD', NULL),
(12, 'Sortie mer \"premières bulles\"', '2024-09-20 14:00:00', 'Sortie mer premières bulles \nLes 28 et 29 Octobres se déroule la première sortie \"premières bulles\" du CVP. Il s\'agit d\'une sortie exploration destinée à valider le niveau 1 de certains apprenant(e)s du groupe de pN1 de cette année. Toutefois la sortie reste ouverte aux autonomes du CVP qui souhaitent en profiter, dans la limite des places disponibles.\n\nRenseignements et inscription auprès de Thierry ou Marie.', 'Olivier GOUBARD', NULL),
(13, 'SORTIE \"PLONGÉE EN ALTITUDE\" AU LAC D’ISSARLÈS', '2024-10-20 14:00:00', 'Une journée pour plonger autrement\nLe CVP a organisé une sortie spéciale au Lac d’Issarlès, le samedi 15 octobre 2024. Cette immersion dans les eaux fraîches d’altitude a permis aux participants d’explorer un site unique situé à seulement 40 km du Puy-en-Velay.\n\nPlongées réalisées : Une exploration matinale des fonds rocheux et une seconde plongée axée sur l’observation des écosystèmes aquatiques locaux.\nParticipants : Ouvert aux plongeurs de tous niveaux, avec un encadrement spécial pour les niveaux 1.\nMoments forts : Partage d’un repas au bord du lac et discussions animées autour des découvertes sous-marines.\nUn grand merci aux 18 participants pour leur enthousiasme et leur bonne humeur ! Prochain rendez-vous : sortie au Lac du Bouchet en décembre.', 'Olivier GOUBARD', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_lieu`) REFERENCES `lieux` (`id_lieu`) ON DELETE SET NULL;

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`id_compte`) REFERENCES `comptes` (`id_compte`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`id_formations`) REFERENCES `formations` (`id_formation`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
