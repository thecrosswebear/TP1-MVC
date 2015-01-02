-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Lun 09 Septembre 2013 à 22:49
-- Version du serveur: 5.6.11-log
-- Version de PHP: 5.4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `comix`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(10) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `proprio` varchar(100) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id`, `nom`, `date`, `proprio`, `adresse`) VALUES
(1, 'Foire de BD Trois-Rivières', '2013-10-01', '1', '343, st-jean'),
(2, 'Foire de BD Quebec city', '2013-10-03', '2', '543, st-jean'),
(3, 'Zine Ottawa', '2013-10-04', '3', '543, Cheap street'),
(4, 'Gatineau bd', '2013-10-10', '4', '786, rue ducharme');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE IF NOT EXISTS `livres` (
  `numero` int(4) NOT NULL AUTO_INCREMENT,
  `titre` varchar(40) NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `issue` int(4) NOT NULL,
  `idUtilisateur` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `etat` int(1) NOT NULL,
  `time` int(50) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `livres`
--

INSERT INTO `livres` (`numero`, `titre`, `auteur`, `issue`, `idUtilisateur`, `price`, `etat`, `time`) VALUES
(2, 'Batman with pants', 'Stan Kubrick', 43, 'jean', 12, 2, 1378601164),
(3, 'Robin egg', 'Richie Rich', 23, 'Sara', 0, 2, 1378487534),
(4, 'Joker talks to me', 'Spruce Wayne', 83, 'Sara', 0, 2, 1378487577),
(5, 'testAutoIncrement', 'Moi', 34, 'jean', 45, 2, 1378601212),
(10, 'super Toto', 'Charlie', 44, 'woody', 765, 2, 1378754477),
(11, 'Spider man & friends', 'Stan Bree', 55, 'sara', 54, 2, 1378602927),
(12, 'Superman and Lois', 'Jack Tripper', 23, 'sara', 66, 2, 1378616483),
(13, 'Submariner and Jackie Kennedy', 'Samuel Laurent', 54, 'sara', 532, 2, 1378603991),
(15, 'Green lantern', 'Seth Harris', 54, 'julie', 876, 2, 0),
(16, 'Green lantern', 'Seth Harris', 54, 'julie', 876, 2, 1378583944),
(17, 'weezer', 'asfafs', 89, 'sara', 54, 2, 1378655735),
(18, 'michel et son cell', 'michel', 66, 'julie', 43, 2, 1378584831),
(19, 'michel 2', 'pourquoi', 54, 'toto', 876, 2, 0),
(20, 'je vends des choses', 'super happy', 43, 'julie', 76, 2, 1378584930),
(21, 'Punisher', 'Stan Jackson', 54, 'julie', 54, 2, 1378585062),
(22, 'spiderman and Francois Neron', 'Genevieve Neron', 54, 'sara', 876, 2, 1378688467),
(23, 'Frite Alors', 'Miguel Rodriguez', 54, 'julie', 53, 0, 1378740787),
(24, 'les choses cool', 'Julien', 66, 'julie', 12, 0, 1378489386),
(25, 'autre chose', 'asdfaf', 85, 'julie', 754, 0, 1378489668),
(26, 'Yoddle rock', 'Christopher Cross', 43, 'julie', 84, 0, 0),
(27, 'Daredevil', 'Stan Lee', 65, 'sara', 983, 0, 0),
(28, 'Aquaman in space', 'Stan Lee', 765, 'sara', 543, 0, 0),
(29, 'Ragman', 'Alvin', 43, 'sara', 5, 0, 0),
(30, 'Submariner blues', 'Jack Kerouac', 74, 'sara', 74, 0, 0),
(31, 'Aquaman in Venezuela', 'charles Barkley', 43, 'sara', 54, 0, 0),
(32, 'The Flash', 'The Flash', 43, 'woody', 43, 0, 0),
(33, 'Captain America', 'Captain America', 74, 'woody', 23, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `proprio` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `description`, `proprio`, `date`) VALUES
(1, 'Foire de BD Amherst', 'vendez vos livres lors d''une....', '1', '2013-10-03'),
(2, 'Quebec livre dans la ville de quebec!', 'une seconde foire sera...', '2', '2013-10-11'),
(3, 'Trois-Rivieres livre super', 'des livres, des livres, des livres', '3', '2013-09-13');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `username` varchar(10) NOT NULL,
  `passwordcomix` varchar(10) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`username`, `passwordcomix`, `nom`, `prenom`, `type`) VALUES
('2', 'daniel', 'Deschamps', 'Daniel', 'regulier'),
('3', 'narrache', 'Narrache', 'Jean', 'premium'),
('4', 'sajak', 'Sajak', 'Pat', 'premium'),
('5', 'admin', 'admin', 'admin', 'admin'),
('6', 'yves', 'Pelletier', 'Yves', 'regulier'),
('alain', 'alain', 'Ducharme', 'Alain', 'premium'),
('amanda', 'amanda', 'Crawford', 'Amanda', 'premium'),
('carlo', '', '', '', ''),
('jean', 'jean', 'Narracdsfd', 'Jean', 'premium'),
('julie', 'julie', 'julie', 'julie', 'premium'),
('Sara', 'sara', 'hebert', 'sara', 'premium'),
('testcarl', 'toto', 'Toto', 'toto', 'premium'),
('toto', 'toto', 'casdfa', 'afdaf', 'premium'),
('woody', 'woody', 'Woody', 'Allen', 'premium');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
