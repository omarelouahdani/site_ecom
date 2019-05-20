-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Lun 20 Mai 2019 à 00:48
-- Version du serveur :  5.7.17-log
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `type` varchar(32) NOT NULL,
  `Reference` varchar(32) NOT NULL,
  `Designation` varchar(128) NOT NULL,
  `prixNormal` decimal(8,2) NOT NULL,
  `prixPromo` decimal(8,2) NOT NULL,
  `photo` varchar(32) NOT NULL COMMENT 'Nom du fichier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`type`, `Reference`, `Designation`, `prixNormal`, `prixPromo`, `photo`) VALUES
('chemise', '1012732NC', 'CHEMISE MARCO FERRERA', '39.00', '0.00', 'w10-1012732nc-tq.jpg'),
('chemise', '12-304E', 'CHEMISE SATIN?E ANTHONY OF LONDON', '95.00', '0.00', 'm12-12-304e-wh_12.jpg'),
('veston', '2103625E', 'BLAZER PAOLETTI', '295.00', '249.00', 'l05-2103625e-bkb_1.jpg'),
('veston', '2203621', 'VESTON SPORT ORVIETO', '249.00', '199.00', 'l05-2203621-ol.jpg'),
('veston', '2203622', 'VESTON SPORT ORVIETO', '249.00', '199.00', 'l15-2203622-cha.jpg'),
('veston', '2203633', 'VESTON SPORT ANTHONY OF LONDON', '199.00', '149.00', 'd07-2203633-bk.jpg'),
('blouson', '2204981', 'MANTEAU ORVIETO GLACIER', '209.00', '199.00', 'm23-2204981-ch.jpg'),
('blouson', '2204982', 'MANTEAU ORVIETO', '199.00', '129.00', 'm23-2204982-ice.jpg'),
('blouson', '2204989', 'PARDESSUS ANTHONY OF LONDON', '309.00', '199.00', 'd06-2204989-bk.jpg'),
('chemise', '2212780', 'CHEMISE MARCO FERRERA', '59.00', '39.00', 'w10-2212780-ny.jpg'),
('chemise', '2212800E', 'CHEMISE ANTHONY OF LONDON', '95.00', '0.00', 'm12-2212800e-pr.jpg'),
('chemise', '2212802DE', 'CHEMISE PAOLETTI', '98.00', '0.00', 'm12-2212802de-bk.jpg'),
('chemise', '2212807DE', 'CHEMISE ANTHONY OF LONDON', '109.00', '79.00', 's17-2212807de-ny.jpg'),
('chemise', '2212808DE', 'CHEMISE ANTHONY OF LONDON', '124.00', '79.00', 's17-2212808de-ny.jpg'),
('chemise', '2212899E', 'CHEMISE ANTHONY OF LONDON', '98.00', '0.00', 'm12-2212899e-ry.jpg'),
('veston', '22651-02', 'VESTON SPORT ORVIETO', '199.00', '99.00', 'b30-22651-02-ny.jpg'),
('veston', '22665-14', 'VESTON SPORT ORVIETO', '149.00', '0.00', 'b30-22665-10-gy.jpg'),
('veston', '22671-01', 'VESTON SPORT ORVIETO', '199.00', '0.00', 'b30-22671-01-bka.jpg'),
('blouson', '3317', 'MANTEAU RAINFOREST', '325.00', '0.00', 'r03-3317-br.jpg'),
('blouson', '3960', 'MANTEAU QUARTZ NATURE', '425.00', '0.00', 'q00-3960-rd_1.jpg'),
('blouson', '5418151', 'MANTEAU POINT ZERO', '150.00', '129.00', 'p18-5418151-zz.jpg'),
('blouson', '5418285', 'BLOUSON POINT ZERO', '79.00', '59.00', 'p18-5418285-bl.jpg'),
('blouson', '5418297', 'BLOUSON POINT ZERO', '79.00', '59.00', 'p18-5418297-ice.jpg'),
('chemise', '781153757008', 'CHEMISE LIPSON', '124.00', '79.00', 'l14-781153757008-bk.jpg'),
('chemise', '781253757008', 'CHEMISE LIPSON', '125.00', '79.00', 'l14-781253757008-bl.jpg'),
('veston', '7JY0062', 'VESTON CALVIN KLEIN', '275.00', '199.00', 'p13-7jy0062-bk.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL COMMENT 'Le mot de passe doit être haché ',
  `level` int(11) NOT NULL COMMENT 'Niveau d''accés 0 pour admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `Email`, `password`, `level`) VALUES
(1, 'admin', 'admin', 0),
(2, 'guest', 'guest', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`Reference`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique` (`Email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
