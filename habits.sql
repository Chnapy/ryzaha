-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 02 Décembre 2016 à 16:23
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP table client;
DROP table marque;
DROP table panier;
DROP table produit;

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
  `Prenom` char(15) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `MotDePasse` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IdClient`, `Nom`, `Prenom`, `Mail`, `MotDePasse`) VALUES
(1, 'Ali', 'Abdelhamid', 'abdelhamid.ali@laposte.net', '18850153f825f7c2f7408b1a79c88dcf221ae1b7');

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
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `id_produit` int(4) NOT NULL,
  `id_client` int(4) NOT NULL,
  `quantite` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`id`, `id_produit`, `id_client`, `quantite`) VALUES
(1, 2, 1, 1);

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
(1, 'HILFIGER DENIM', 'T-shirt basique', 'XS', 'Homme', 'Blanc', 2000, 'T-Shirt', 'https://images-na.ssl-images-amazon.com/images/I/81HuuJrzdXL._UX342_.jpg'),
(2, 'HOLLISTER CO.', 'T-shirt basique', 'XS', 'Homme', 'Gris', 1400, 'T-Shirt', 'https://images-na.ssl-images-amazon.com/images/I/81HuuJrzdXL._UX342_.jpg'),
(3, 'LACOSTE', 'T-shirt imprimé', 'S', 'Homme', 'Bleu', 4400, 'T-Shirt', 'https://images-na.ssl-images-amazon.com/images/I/81HuuJrzdXL._UX342_.jpg'),
(4, 'URBAN CLASSICS', 'T-shirt imprimé', 'S', 'Homme', 'Noir', 2000, 'T-Shirt', 'https://images-na.ssl-images-amazon.com/images/I/81HuuJrzdXL._UX342_.jpg'),
(5, 'JACK & JONES', 'T-shirt imprimé', 'S', 'Homme', 'Bleu', 1300, 'T-Shirt', 'https://images-na.ssl-images-amazon.com/images/I/81HuuJrzdXL._UX342_.jpg');

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
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `IdProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
