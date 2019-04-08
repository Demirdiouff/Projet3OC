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
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `auteur_commentaire` varchar(100) NOT NULL,
  `contenu_commentaire` varchar(200) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `date_commentaire`, `auteur_commentaire`, `contenu_commentaire`, `id_post`) VALUES
(1, '2019-01-12 17:37:29', 'A. Nonyme', 'Bravo pour ce début', 1),
(2, '2019-01-12 17:37:29', 'Moi', 'Merci ! Je vais continuer sur ma lancée', 1),
(16, '2019-01-12 17:38:47', 'Ded', 'Re-bonjour, c\'est moi !', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `ce_com_post` (`id_post`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `ce_com_post` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`);
