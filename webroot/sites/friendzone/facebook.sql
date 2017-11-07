-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 23 Octobre 2016 à 20:52
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `facebook`
--

-- --------------------------------------------------------

--
-- Structure de la table `ecrit`
--

CREATE TABLE `ecrit` (
  `id` int(11) NOT NULL,
  `contenu` text,
  `dateEcrit` datetime NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `idAuteur` int(11) NOT NULL,
  `idAmi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ecrit`
--

INSERT INTO `ecrit` (`id`, `contenu`, `dateEcrit`, `image`, `idAuteur`, `idAmi`) VALUES
(1, 'Voici mon mur ', '2016-10-23 20:14:30', NULL, 1, 1),
(2, 'Like et image', '2016-10-23 20:15:12', 'functional-programming-3840x2160.png', 1, 1),
(3, 'Hey !', '2016-10-23 20:19:57', NULL, 3, 3),
(4, 'Yo !', '2016-10-23 20:20:55', NULL, 1, 3),
(5, '&Eacute;NORME', '2016-10-23 20:39:02', NULL, 5, 5),
(6, ' ', '2016-10-23 20:45:21', '8MNJdui.gif', 1, 3),
(7, 'Tout fonctionne !', '2016-10-23 20:46:53', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ecrit_like`
--

CREATE TABLE `ecrit_like` (
  `id` int(11) NOT NULL,
  `idAuteurLike` int(11) NOT NULL,
  `idEcrit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ecrit_like`
--

INSERT INTO `ecrit_like` (`id`, `idAuteurLike`, `idEcrit`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 3, 2),
(4, 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE `lien` (
  `id` int(11) NOT NULL,
  `idUtilisateur1` int(11) NOT NULL,
  `idUtilisateur2` int(11) NOT NULL,
  `etat` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lien`
--

INSERT INTO `lien` (`id`, `idUtilisateur1`, `idUtilisateur2`, `etat`) VALUES
(1, 1, 2, 'attente'),
(2, 3, 1, 'ami'),
(3, 4, 3, 'attente'),
(4, 4, 1, 'attente'),
(5, 5, 3, 'attente'),
(6, 3, 2, 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `remember` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'default.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `nom`, `prenom`, `pwd`, `remember`, `photo`) VALUES
(1, 'mithralas', 'Battez', 'Vincent', 'f71dbe52628a3f83a77ab494817525c6', NULL, '14680638_1161052263978679_396977592287415641_n1.jpg'),
(2, 'GillesA', 'Audemard', 'Gilles', 'f71dbe52628a3f83a77ab494817525c6', NULL, 'Sans_titre-1.jpg'),
(3, 'LeaC', 'Cardoso', 'L&eacute;a', 'f71dbe52628a3f83a77ab494817525c6', NULL, 'Sans_titre-2.jpg'),
(4, 'JonathanM', 'Masson', 'Jonathan', 'f71dbe52628a3f83a77ab494817525c6', NULL, 'Sans_titre-3.jpg'),
(5, 'BenoitQ', 'Carquillat', 'Benoit', 'f71dbe52628a3f83a77ab494817525c6', NULL, 'Sans_titre-4.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ecrit`
--
ALTER TABLE `ecrit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `ecrit_like`
--
ALTER TABLE `ecrit_like`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lien`
--
ALTER TABLE `lien`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ecrit`
--
ALTER TABLE `ecrit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `ecrit_like`
--
ALTER TABLE `ecrit_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `lien`
--
ALTER TABLE `lien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
