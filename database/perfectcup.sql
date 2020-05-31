-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 31 mai 2020 à 21:58
-- Version du serveur :  10.4.8-MariaDB
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
-- Base de données :  `perfectcup`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `client_id` int(3) NOT NULL,
  `item_id` int(3) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_price` int(3) NOT NULL,
  `item_quantity` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`client_id`, `item_id`, `item_title`, `item_image`, `item_price`, `item_quantity`) VALUES
(21, 3, 'COCONUT OIL COFFEE', 'slide-1.jpg', 25, 3),
(21, 4, 'IRISH COFFEE', 'slide-2.jpg', 30, 2),
(21, 5, 'FROZEN CARAMEL LATTE', 'slide-3.jpg', 35, 3),
(22, 2, 'asta', 'asta.jpg', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(15) NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(21, 'abdel', 'rochdi', 'rochdi@gmail.com', '$2y$10$nuSa/drhIxpTctkr92G09.E6Mn.k8tXQSyvSim8FzsF5vSJTN95RC'),
(22, 'abdel', 'rochdi', 'rochdi@gmail.fr', '$2y$10$s2bCZ4uaQxyV8giBGRlenufhCITMD.dPl2JEqIfl9A7Qer0Sbrvfu');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(3) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_info` text NOT NULL,
  `product_price` int(3) NOT NULL,
  `product_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_image`, `product_desc`, `product_info`, `product_price`, `product_date`) VALUES
(1, 'nescafé gold', 'nescafe.jpg', 'this is good cheap coffee                        ', 'it only costs 1DH                      ', 1, '2020-05-31'),
(2, 'asta', 'asta.jpg', 'it is a good coffee                        ', 'it is 1DH too                        ', 1, '2020-05-31'),
(3, 'COCONUT OIL COFFEE', 'slide-1.jpg', 'Start your morning off with this great recipe for hot coffee with coconut oil and butter.', 'Coconut coffee is the best for coconut lover, it is 25DH only', 25, '2020-05-31'),
(4, 'IRISH COFFEE', 'slide-2.jpg', 'Take the edge off with a fresh hot cup of coffee make with Irish whiskey and Irish cream.', 'Irish coffee is the best choice to start your day with, it is 30DH only.', 30, '2020-05-31'),
(5, 'FROZEN CARAMEL LATTE', 'slide-3.jpg', 'Sweetened with caramel sauce and topped with whipped cream, this will make you happy any time of the day.', 'Frozen caramel latte, its taste makes you feel awesome and fills you with energy, and it is 35DH only  ', 35, '2020-05-31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
