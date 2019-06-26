-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 26 Juin 2019 à 19:36
-- Version du serveur :  10.1.38-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `proxichat`
--

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

CREATE TABLE `minichat` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `minichat`
--

INSERT INTO `minichat` (`id`, `pseudo`, `message`) VALUES
(20, 'pseudopc1', 'messagepc1'),
(21, 'pseudotel1', 'messagetel1'),
(22, 'test1', 'pseudo1'),
(23, 'pseudo', 'message'),
(24, 'pseudo', 'message'),
(25, 'pseudo2', 'message2'),
(26, 'pseudo3', 'message3'),
(27, 'pseudo4', 'message4'),
(28, 'pseudo5', 'message5'),
(29, 'pseudo6', 'message6'),
(30, 'pseudo7', 'message7'),
(31, 'pseudo10', 'message10'),
(32, 'pseudo11', 'message11'),
(33, 'pseudo12', 'message12');

-- --------------------------------------------------------

--
-- Structure de la table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  `latitude` decimal(10,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tblusers`
--

INSERT INTO `tblusers` (`id`, `login`, `longitude`, `latitude`) VALUES
(10, 'pseudopc1', '0.62689100', '45.70871820'),
(14, 'pseudotel1', '-52.65367650', '5.16161720'),
(16, 'test1', '-54.65367720', '4.16161780'),
(17, 'pseudo', '-52.65376570', '5.16164080'),
(18, 'pseudo2', '0.62689100', '45.70871820'),
(19, 'pseudo3', '0.62689100', '45.70871820'),
(20, 'pseudo4', '0.62689100', '45.70871820'),
(21, 'pseudo5', '-52.65366280', '5.16160530'),
(22, 'pseudo6', '0.62689100', '45.70871820'),
(23, 'pseudo7', '0.62689100', '45.70871820'),
(24, 'pseudo10', '-52.65367580', '5.16161760'),
(25, 'pseudo11', '-52.65367480', '5.16161720');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
