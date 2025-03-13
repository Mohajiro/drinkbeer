-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : lun. 17 fév. 2025 à 13:18
-- Version du serveur : 8.0.41
-- Version de PHP : 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `beercraft`
--

-- --------------------------------------------------------

--
-- Structure de la table `beers`
--

CREATE TABLE `beers` (
  `beer_id` int NOT NULL,
  `beer_name` varchar(255) NOT NULL,
  `beer_type` varchar(100) NOT NULL,
  `beer_origin` varchar(100) NOT NULL,
  `beer_alc` decimal(4,2) DEFAULT NULL,
  `beer_description` text,
  `beer_img` varchar(255) DEFAULT NULL
) ;

--
-- Déchargement des données de la table `beers`
--

INSERT INTO `beers` (`beer_id`, `beer_name`, `beer_type`, `beer_origin`, `beer_alc`, `beer_description`, `beer_img`) VALUES
(3, 'Punk IPA', 'IPA', 'Écosse', 5.40, 'Popular craft IPA from Scotland.', 'punk_ipa.jpg'),
(4, 'Leffe Blonde', 'Blonde', 'Belgique', 6.60, 'Classic Belgian blonde beer.', 'leffe_blonde.jpg'),
(5, 'Duvel', 'Blonde', 'Belgique', 8.50, 'Strong Belgian blonde ale.', 'duvel.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int NOT NULL,
  `avis` text,
  `note` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `beer_id` int NOT NULL
) ;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_comment`, `avis`, `note`, `user_id`, `beer_id`) VALUES
(6, 'Much better', 2, 1, 5),
(7, 'Worst', 1, 1, 3),
(8, 'Bad', 3, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'John', 'Smith', 'johnsmith@gmail.com', '2edjfdl2ksdd', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`beer_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `beer_id` (`beer_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `beers`
--
ALTER TABLE `beers`
  MODIFY `beer_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`beer_id`) REFERENCES `beers` (`beer_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
