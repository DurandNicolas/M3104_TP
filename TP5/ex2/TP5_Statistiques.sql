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
-- Structure de la table `TP5_Statistiques`
--

CREATE TABLE `TP5_Statistiques` (
  `uri` varchar(255) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `TP5_Statistiques`
--

INSERT INTO `TP5_Statistiques` (`uri`, `stamp`) VALUES
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:27:43'),
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:41:02'),
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:41:02'),
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:41:03'),
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:41:04'),
('/M3104_TP/TP5/ex2/index_img.php', '2019-10-30 09:47:24'),
('/M3104_TP/TP5/ex2/index_img.php', '2019-10-30 09:47:50'),
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:47:59'),
('/M3104_TP/TP5/ex2/index_img.php', '2019-10-30 09:48:04'),
('/M3104_TP/TP5/ex2/index_img.php', '2019-10-30 09:48:05'),
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:48:07'),
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:48:07'),
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:48:07'),
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:48:08'),
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:48:08'),
('/M3104_TP/TP5/ex2/index.php', '2019-10-30 09:48:08'),
('/M3104_TP/TP5/ex2/index_img.php', '2019-10-30 09:48:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
