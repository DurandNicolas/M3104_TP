-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 30 oct. 2019 à 19:49
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `M3104_TP`
--

-- --------------------------------------------------------

--
-- Structure de la table `TP5_Textes`
--

CREATE TABLE `TP5_Textes` (
  `id` int(11) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `texte` varchar(50) NOT NULL,
  `url_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `TP5_Textes`
--

INSERT INTO `TP5_Textes` (`id`, `lang`, `texte`, `url_image`) VALUES
(1, 'en', 'Help', 'bouton.png'),
(1, 'fr', 'Aide', 'bouton.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `TP5_Textes`
--
ALTER TABLE `TP5_Textes`
  ADD PRIMARY KEY (`id`,`lang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
