-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Novembre 2016 à 15:36
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `habits`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `IdClient` int(11) NOT NULL,
  `Nom` char(15) NOT NULL,
  `Prénom` char(15) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `MotDePasse` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IdClient`, `Nom`, `Prénom`, `Mail`, `MotDePasse`) VALUES
(1, 'Ali', 'Abdelhamid', 'abdelhamid.ali@laposte.net', '123soleil');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `IdMarque` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`IdMarque`, `Nom`) VALUES
(1, 'HILFIGER DENIM'),
(2, 'LACOSTE'),
(3, 'HOLLISTER CO.'),
(4, 'URBAN CLASSICS'),
(5, 'JACK & JONES');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `IdProduit` int(11) NOT NULL,
  `Marque` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Taille` char(3) NOT NULL,
  `Sexe` varchar(7) NOT NULL,
  `Couleur` varchar(20) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Categorie` varchar(50) NOT NULL,
  `URLimg` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`IdProduit`, `Marque`, `Nom`, `Taille`, `Sexe`, `Couleur`, `Prix`, `Categorie`, `URLimg`) VALUES
(1, 'HILFIGER DENIM', 'T-shirt basique', 'XS', 'Homme', 'Blanc', 20, '', ''),
(2, 'HOLLISTER CO.', 'T-shirt basique', 'XS', 'Homme', 'Gris', 14, '', ''),
(3, 'LACOSTE', 'T-shirt imprimé', 'S', 'Homme', 'Bleu', 44, '', ''),
(4, 'URBAN CLASSICS', 'T-shirt imprimé', 'S', 'Homme', 'Noir', 20, '', ''),
(5, 'JACK & JONES', 'T-shirt imprimé', 'S', 'Homme', 'Bleu', 13, '', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IdClient`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`IdMarque`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`IdProduit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `IdClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `IdMarque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `IdProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
