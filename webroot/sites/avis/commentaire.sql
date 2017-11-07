-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 09 Octobre 2016 à 15:19
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `commentaire`
--
CREATE DATABASE IF NOT EXISTS `commentaire` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `commentaire`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `idutilisateurs` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `resume` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `aime` int(11) NOT NULL,
  `commentaires` int(11) NOT NULL,
  `satisfaction` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `idutilisateurs`, `date`, `resume`, `content`, `aime`, `commentaires`, `satisfaction`) VALUES
(5, 'test', 2, '2016-10-09 17:06:31', 'test', 'test', 1, 1, 28);

-- --------------------------------------------------------

--
-- Structure de la table `articles_aime`
--

DROP TABLE IF EXISTS `articles_aime`;
CREATE TABLE `articles_aime` (
  `id` int(11) NOT NULL,
  `idarticle` int(11) NOT NULL,
  `idutilisateurs` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles_aime`
--

INSERT INTO `articles_aime` (`id`, `idarticle`, `idutilisateurs`) VALUES
(5, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `idutilisateurs` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `message`, `idutilisateurs`, `idArticle`, `date`) VALUES
(4, 'test', 2, 5, '2016-10-09 17:06:38');

-- --------------------------------------------------------

--
-- Structure de la table `negatif`
--

DROP TABLE IF EXISTS `negatif`;
CREATE TABLE `negatif` (
  `id` int(11) NOT NULL,
  `idarticle` int(11) NOT NULL,
  `avisnegatif` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `negatif`
--

INSERT INTO `negatif` (`id`, `idarticle`, `avisnegatif`) VALUES
(3, 5, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `positif`
--

DROP TABLE IF EXISTS `positif`;
CREATE TABLE `positif` (
  `id` int(11) NOT NULL,
  `idarticle` int(11) NOT NULL,
  `avispositif` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `positif`
--

INSERT INTO `positif` (`id`, `idarticle`, `avispositif`) VALUES
(2, 5, 'test'),
(3, 5, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `sid` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `pwd`, `sid`) VALUES
(1, 'vincent', 'dd09dd9fcd4beaa8715ff20f11e201d7', '0d6d79b4d3d6a5a43ec2edd79bb4b395'),
(2, 'guillaume', 'c00425797de3c98e7b32e814b54a6ec5', 'f6db3e14eea7c667c5d244eb813ef096');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles_aime`
--
ALTER TABLE `articles_aime`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `negatif`
--
ALTER TABLE `negatif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `positif`
--
ALTER TABLE `positif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `articles_aime`
--
ALTER TABLE `articles_aime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `negatif`
--
ALTER TABLE `negatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `positif`
--
ALTER TABLE `positif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
