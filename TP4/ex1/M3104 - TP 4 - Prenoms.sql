-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 20 sep. 2019 à 15:04
-- Version du serveur :  5.7.27
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `INFO`
--

-- --------------------------------------------------------

--
-- Structure de la table `TP4_prenoms`
--

CREATE TABLE `TP4_prenoms` (
  `tp4_id` int(11) NOT NULL,
  `tp4_prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `TP4_prenoms`
--

INSERT INTO `TP4_prenoms` (`tp4_id`, `tp4_prenom`) VALUES
(1, 'Anne'),
(2, 'Béatrice'),
(3, 'Capucine'),
(4, 'Delphine'),
(5, 'Enora'),
(6, 'Florine'),
(7, 'Gaelle'),
(8, 'Hélène'),
(9, 'Ingrid'),
(10, 'Johanna'),
(11, 'Kelly'),
(12, 'Linda'),
(13, 'Nina'),
(14, 'Ophélie'),
(15, 'Camille'),
(16, 'Amandine'),
(17, 'Salomé'),
(18, 'Cécile'),
(19, 'Céline'),
(20, 'Eve'),
(21, 'Margaux'),
(22, 'Stéphanie'),
(23, 'Noélie'),
(24, 'Margeritte'),
(25, 'Violette'),
(26, 'Clémentine'),
(27, 'Elizabeth'),
(28, 'Clarence'),
(29, 'Julie'),
(30, 'Vicky');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `TP4_prenoms`
--
ALTER TABLE `TP4_prenoms`
  ADD PRIMARY KEY (`tp4_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `TP4_prenoms`
--
ALTER TABLE `TP4_prenoms`
  MODIFY `tp4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
