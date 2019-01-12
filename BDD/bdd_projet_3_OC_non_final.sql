-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  sam. 12 jan. 2019 à 17:41
-- Version du serveur :  5.6.38
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Projet3OC`
--

-- --------------------------------------------------------

--
-- Structure de la table `T_COMMENTAIRE`
--

CREATE TABLE `T_COMMENTAIRE` (
  `COM_ID` int(11) NOT NULL,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(100) NOT NULL,
  `COM_CONTENU` varchar(200) NOT NULL,
  `BIL_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_COMMENTAIRE`
--

INSERT INTO `T_COMMENTAIRE` (`COM_ID`, `COM_DATE`, `COM_AUTEUR`, `COM_CONTENU`, `BIL_ID`) VALUES
(1, '2019-01-12 17:37:29', 'A. Nonyme', 'Bravo pour ce début', 1),
(2, '2019-01-12 17:37:29', 'Moi', 'Merci ! Je vais continuer sur ma lancée', 1),
(16, '2019-01-12 17:38:47', 'Ded', 'Re-bonjour, c\'est moi !', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `T_COMMENTAIRE`
--
ALTER TABLE `T_COMMENTAIRE`
  ADD PRIMARY KEY (`COM_ID`),
  ADD KEY `fk_com_bil` (`BIL_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `T_COMMENTAIRE`
--
ALTER TABLE `T_COMMENTAIRE`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `T_COMMENTAIRE`
--
ALTER TABLE `T_COMMENTAIRE`
  ADD CONSTRAINT `fk_com_bil` FOREIGN KEY (`BIL_ID`) REFERENCES `T_BILLET` (`BIL_ID`);
