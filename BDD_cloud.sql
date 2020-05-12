-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 06 Mai 2020 à 12:48
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `partage`
--

-- --------------------------------------------------------

--
-- Structure de la table `cloud_list`
--

CREATE TABLE `cloud_list` (
  `cid` int(11) NOT NULL,
  `cloud_code` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `owner` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cloud_list`
--

INSERT INTO `cloud_list` (`cid`, `cloud_code`, `username`, `owner`) VALUES
(1, '9874220597', 'admin', 1),


-- --------------------------------------------------------

--
-- Structure de la table `files_data`
--

CREATE TABLE `files_data` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `idfiles` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `size` int(11) NOT NULL,
  `extension` varchar(50) NOT NULL,
  `cloud_code` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `files_data`
--

INSERT INTO `files_data` (`uid`, `username`, `idfiles`, `libelle`, `type`, `size`, `extension`, `cloud_code`) VALUES
(1, 'Admin', 22, 'test.temp', 'document', 29370, 'temp', '9874220597');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'user',
  `profil_image` varchar(50) NOT NULL DEFAULT 'User_Avatar.png'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`uid`, `email`, `password`, `username`, `status`, `profil_image`) VALUES
(1, 'admin@test.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'super_admin', 'Admin.png'),
(2, 'User_Avatar@test.com', 'Ban_User_For_Site', 'User_Avatar', 'super_admin', 'User_Avatar.png'),

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cloud_list`
--
ALTER TABLE `cloud_list`
  ADD PRIMARY KEY (`cid`);

--
-- Index pour la table `files_data`
--
ALTER TABLE `files_data`
  ADD PRIMARY KEY (`idfiles`),
  ADD KEY `uid` (`uid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cloud_list`
--
ALTER TABLE `cloud_list`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `files_data`
--
ALTER TABLE `files_data`
  MODIFY `idfiles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
