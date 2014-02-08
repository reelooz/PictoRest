-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 07 Février 2014 à 09:59
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `pictorestbdd`
--
CREATE DATABASE IF NOT EXISTS `pictorestbdd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pictorestbdd`;

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE IF NOT EXISTS `Albums` (
  `idAlbum` int(10) NOT NULL AUTO_INCREMENT,
  `titreAlbum` varchar(40) NOT NULL,
  `desc` text,
  `dateAlbum` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `photoCouv` int(10) NOT NULL,
  `idUtil` int(10) NOT NULL,
  PRIMARY KEY (`idAlbum`),
  KEY `idUtil` (`idUtil`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `albums`
--

INSERT INTO `Albums` (`idAlbum`, `titreAlbum`, `desc`, `dateAlbum`, `photoCouv`, `idUtil`) VALUES
(1, 'album1', 'album1description', '2013-12-12 15:43:00', 1, 1),
(2, 'album2', 'album2description', '2013-12-12 15:43:00', 2, 2),
(3, 'Doudou à la plage', 'Petitepromenade au bord de l''eau avec doudou en mode sex', '2014-02-05 14:48:18', -1, 1),
(4, 'Doudou à la plage', 'Petitepromenade au bord de l''eau avec doudou en mode sex', '2014-02-05 14:50:51', -1, 1),
(5, 'Doudou à la plage', 'Petitepromenade au bord de l''eau avec doudou en mode sex', '2014-02-05 14:53:59', -1, 1),
(6, 'Doudou à la plage', 'Petitepromenade au bord de l''eau avec doudou en mode sex', '2014-02-05 14:59:56', -1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `feeds`
--

CREATE TABLE IF NOT EXISTS `Feeds` (
  `idUtil` int(10) NOT NULL,
  `idAlbum` int(10) NOT NULL,
  `dateFeed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idUtil`,`idAlbum`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `feeds`
--

INSERT INTO `Feeds` (`idUtil`, `idAlbum`, `dateFeed`) VALUES
(1, 1, '2013-12-12 15:43:00'),
(2, 2, '2013-12-12 15:43:00');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `Photos` (
  `idPhoto` int(10) NOT NULL AUTO_INCREMENT,
  `titrePhoto` varchar(40) NOT NULL,
  `desc` text,
  `cheminThumb` text NOT NULL,
  `cheminFull` text NOT NULL,
  `datePhoto` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idAlbum` int(10) NOT NULL,
  PRIMARY KEY (`idPhoto`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Contenu de la table `photos`
--

INSERT INTO `Photos` (`idPhoto`, `titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`) VALUES
(50, 'test', 'test du pd de maxime2', 'PictoRest/files/thumb/files/thumb/a1b3bdfc01a67bb771f3bde8ae593841.jpg', 'PictoRest/files/files/a1b3bdfc01a67bb771f3bde8ae593841.jpg', '2014-02-06 14:02:26', 1),
(51, 'test', 'test du pd de maxime3', '/PictoRest/files/thumb/files/thumb/0a8ec6b7f9c5107cfc735b3ba4592843.jpg', '/PictoRest/files/files/0a8ec6b7f9c5107cfc735b3ba4592843.jpg', '2014-02-06 14:03:18', 1),
(52, 'test', 'test du pd de maxime', '/PictoRest/files/thumb/67d251fd8e5dac86b548e29e32b403b3.jpg', '/PictoRest/files/67d251fd8e5dac86b548e29e32b403b3.jpg', '2014-02-06 14:05:11', 1),
(53, 'test', 'test', '/PictoRest/files/thumb/6f19b35a9a3a586117183a0b30bfd319.jpg', '/PictoRest/files/6f19b35a9a3a586117183a0b30bfd319.jpg', '2014-02-06 14:18:57', 1),
(54, 'test', 'test du pd de maxime', '/PictoRest/files/thumb/bf4de85f5ddd6cb49bad6dc332894e4e.jpg', '/PictoRest/files/bf4de85f5ddd6cb49bad6dc332894e4e.jpg', '2014-02-06 14:21:06', 6),
(55, 'Testkljkljf', 'fdgdfgdfgdg', '/PictoRest/files/thumb/f1aa8485b532371b1ba3b99e9abecfbb.jpg', '/PictoRest/files/f1aa8485b532371b1ba3b99e9abecfbb.jpg', '2014-02-06 14:21:20', 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `Utilisateurs` (
  `idUtil` int(10) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(40) NOT NULL,
  `passwd` text NOT NULL,
  `apiKey` text NOT NULL,
  PRIMARY KEY (`idUtil`),
  UNIQUE KEY `identifiant` (`identifiant`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `Utilisateurs` (`idUtil`, `identifiant`, `passwd`, `apiKey`) VALUES
(1, 'Parakeet77', 'e4e03e93afe7fcae2a52521ee434480c', 'ahahah'),
(2, 'Claudy', '997e5730b999d0eb5ec2b6d9541ee35e', 'ahahah'),
(3, 'grandSeigneur', 'be5d9ba998a9412a49a6e9d4fcedf931', 'fd94905b6308ad37ec9b16c90c14598c');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
