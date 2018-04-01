-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 25 mars 2018 à 13:08
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_exposition`
--

-- --------------------------------------------------------

--
-- Structure de la table `etre_inviter`
--

DROP TABLE IF EXISTS `etre_inviter`;
CREATE TABLE IF NOT EXISTS `etre_inviter` (
  `idProfessionnel` int(11) NOT NULL,
  `idEvenement` int(11) NOT NULL,
  PRIMARY KEY (`idProfessionnel`,`idEvenement`),
  KEY `idEvenement` (`idEvenement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etre_inviter`
--

INSERT INTO `etre_inviter` (`idProfessionnel`, `idEvenement`) VALUES
(1, 704),
(2, 703),
(4, 701),
(5, 700),
(10, 700),
(10, 703),
(13, 703),
(15, 704);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `idEvenement` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `dateDeb` datetime NOT NULL,
  `dateFin` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`idEvenement`, `nom`, `type`, `dateDeb`, `dateFin`) VALUES
(700, 'Innovation et passé', 'Conférence', '2018-03-20 08:30:00', '2018-03-20 10:00:00'),
(701, 'Test de mythologie', 'Quizz de connaissances', '2018-03-23 15:00:00', '2018-03-23 15:30:00'),
(703, 'Art et mythes', 'Conférence sur la collaboration entre Musée pour recréer des œuvres du passé', '2018-03-21 09:30:00', '2018-03-21 11:00:00'),
(704, 'Nouvelles découvertes', 'Conférence sur un site d\'archéologie', '2018-03-22 14:00:00', '2018-03-22 16:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `exposant`
--

DROP TABLE IF EXISTS `exposant`;
CREATE TABLE IF NOT EXISTS `exposant` (
  `idStand` int(11) NOT NULL,
  `idProfessionnel` int(11) NOT NULL,
  `idLieu` int(11) NOT NULL,
  PRIMARY KEY (`idProfessionnel`,`idStand`) USING BTREE,
  KEY `idLieu` (`idLieu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `exposant`
--

INSERT INTO `exposant` (`idStand`, `idProfessionnel`, `idLieu`) VALUES
(1, 11, 1000),
(1, 12, 1000),
(2, 6, 1000),
(2, 18, 1000),
(3, 7, 1000),
(3, 8, 1000),
(3, 9, 1000),
(4, 19, 1000),
(5, 2, 1000),
(6, 3, 1000),
(7, 14, 1000),
(8, 16, 1000),
(9, 17, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `exposition`
--

DROP TABLE IF EXISTS `exposition`;
CREATE TABLE IF NOT EXISTS `exposition` (
  `idExposition` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `theme` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `image` varchar(250) NOT NULL,
  `idOrganisateur` int(11) NOT NULL,
  PRIMARY KEY (`idExposition`),
  KEY `idOrganisateur` (`idOrganisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `exposition`
--

INSERT INTO `exposition` (`idExposition`, `nom`, `theme`, `description`, `dateDebut`, `dateFin`, `image`, `idOrganisateur`) VALUES
(1, 'Mythologie et Histoire', 'Histoire, religion et technologie', 'Pour les passionnés de la Grèce antique', '2018-03-20', '2018-03-23', 'Image\\Affiche.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `invite`
--

DROP TABLE IF EXISTS `invite`;
CREATE TABLE IF NOT EXISTS `invite` (
  `idProfessionnel` int(11) NOT NULL,
  `specification` varchar(250) NOT NULL,
  PRIMARY KEY (`idProfessionnel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `invite`
--

INSERT INTO `invite` (`idProfessionnel`, `specification`) VALUES
(13, 'Restauration du temple d\'Athéna'),
(15, 'Fouille du site archéologique de Varda'),
(5, 'Aspect technologique'),
(10, 'Histoire et écrits d\'Epoque'),
(1, 'Fouilles'),
(4, 'Animation'),
(2, 'Plus spécialisée');

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `idLieu` int(11) NOT NULL,
  `nomBatiment` varchar(250) NOT NULL,
  `ville` varchar(250) NOT NULL,
  `cp` varchar(250) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `dimension` int(11) NOT NULL,
  PRIMARY KEY (`idLieu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `nomBatiment`, `ville`, `cp`, `adresse`, `dimension`) VALUES
(1000, 'Halle des Expositions', 'Paris', '75004', '85 avenue des Insoumis', 1200),
(1001, 'Amphithéatre de Paris', 'Paris', '75004', '5 avenue des Cassis', 300);

-- --------------------------------------------------------

--
-- Structure de la table `organisateur`
--

DROP TABLE IF EXISTS `organisateur`;
CREATE TABLE IF NOT EXISTS `organisateur` (
  `idOrganisateur` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `adresseMail` varchar(250) NOT NULL,
  PRIMARY KEY (`idOrganisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `organisateur`
--

INSERT INTO `organisateur` (`idOrganisateur`, `nom`, `prenom`, `adresseMail`) VALUES
(1, 'Bauvin', 'Albert', 'albauvin@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `professionnel`
--

DROP TABLE IF EXISTS `professionnel`;
CREATE TABLE IF NOT EXISTS `professionnel` (
  `idProfessionnel` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `profession` varchar(250) NOT NULL,
  `entreprise` varchar(250) NOT NULL,
  PRIMARY KEY (`idProfessionnel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professionnel`
--

INSERT INTO `professionnel` (`idProfessionnel`, `nom`, `prenom`, `profession`, `entreprise`) VALUES
(1, 'Alvera', 'Maria', 'Archéologue', 'Musée du Louvre'),
(2, 'Hill', 'Jane', 'Archéologue', 'British  museum'),
(3, 'Herms', 'Bastian', 'Commercial', 'Antiquités de Grèce'),
(10, 'Gástos', 'Manolis', 'Historien', 'Musée de l\'Algora antique d\'Athènes'),
(11, 'Flemming', 'Pierre', 'Libraire', 'Histoires du monde'),
(12, 'Granados', 'Vincente', 'Assistant-libraire', 'Histoires du monde'),
(5, 'Helsen', 'Steven', 'Ingénieur', 'CapTechn'),
(6, 'Browing', 'Elsa', 'Vendeuse', 'Le paradis des sucreries'),
(7, 'Rage', 'Milo', 'Serveur', 'Frog & Cheetah'),
(8, 'Tove', 'Dergane', 'Cuisinier', 'Frog & Cheetah'),
(9, 'Saint-Louis', 'Albert', 'Cuisinier', 'Frog & Cheetah'),
(18, 'Mendeliev', 'Mashka', 'Gérante', 'Le paradis des sucreries'),
(13, 'Schiff', 'Anna', 'Restaurateur de tableau', 'Musée du Louvre'),
(14, 'Perdino', 'Allan', 'Peintre-sculpteur', 'Perdino_décorateur'),
(15, 'Benaki', 'Anastae', 'Restaurateur de tableau', 'Musée nationale archéologie'),
(16, 'Alighieri', 'Enzo', 'Historien', 'Musée de la mythologie de Florence'),
(17, 'Dupont', 'Philippe', 'Phylosophe', 'Lycée d\'Anapolie'),
(19, 'Jawhead', 'Angela', 'Gérante', 'Petits souvenirs'),
(4, 'Fernand', 'Samuel', 'Animateur', 'Animation en tout genre');

-- --------------------------------------------------------

--
-- Structure de la table `se_passer`
--

DROP TABLE IF EXISTS `se_passer`;
CREATE TABLE IF NOT EXISTS `se_passer` (
  `idExposition` int(11) NOT NULL,
  `idLieu` int(11) NOT NULL,
  `idEvenement` int(11) NOT NULL,
  PRIMARY KEY (`idExposition`,`idLieu`,`idEvenement`),
  KEY `idLieu` (`idLieu`),
  KEY `idEvenement` (`idEvenement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `se_passer`
--

INSERT INTO `se_passer` (`idExposition`, `idLieu`, `idEvenement`) VALUES
(1, 1000, 701),
(1, 1001, 700),
(1, 1001, 703),
(1, 1001, 704);

-- --------------------------------------------------------

--
-- Structure de la table `visiter`
--

DROP TABLE IF EXISTS `visiter`;
CREATE TABLE IF NOT EXISTS `visiter` (
  `idExposition` int(11) NOT NULL,
  `idVisiteur` int(11) NOT NULL,
  PRIMARY KEY (`idExposition`,`idVisiteur`),
  KEY `idVisiteur` (`idVisiteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visiter`
--

INSERT INTO `visiter` (`idExposition`, `idVisiteur`) VALUES
(1, 44),
(1, 45);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `idVisiteur` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `ticket_vip` varchar(250) NOT NULL,
  PRIMARY KEY (`idVisiteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`idVisiteur`, `nom`, `prenom`, `ticket_vip`) VALUES
(45, 'Bref', 'Harry', 'Oui'),
(44, 'Frearine', 'Quentin', 'Oui');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
