-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 27 nov. 2020 à 09:21
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
AUTOCOMMIT = 0;
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin`
(
    `id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `name` varchar
(
    32
) NOT NULL,
    `ad_user` varchar
(
    50
) NOT NULL,
    `ad_pass` varchar
(
    32
) NOT NULL,
    `email` varchar
(
    255
) NOT NULL,
    `details` text NOT NULL,
    `role` int
(
    11
) NOT NULL,
    PRIMARY KEY
(
    `id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `ad_user`, `ad_pass`, `email`, `details`, `role`)
VALUES (1, 'Elias', 'Elias', 'a1728bc140865433628c8c2c065e1588', 'admin@gmail.com', 'C\'est moi', 0),
(6, 'Soleimane', 'Solei', '9ad3006cab8c16348d4297b25dd8cb98', 'admin@gmail.com', 'C\'est moi', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand`
(
    `brandId` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `brandName` varchar
(
    255
) NOT NULL,
    PRIMARY KEY
(
    `brandId`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`)
VALUES (10, 'Le Poivre'),
       (16, 'Buste'),
       (18, 'Placard'),
       (20, 'testfinal');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart`
(
    `cartId` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `sessionId` varchar
(
    255
) NOT NULL,
    `productId` int
(
    11
) NOT NULL,
    `productName` varchar
(
    255
) NOT NULL,
    `price` float
(
    10,
    2
) NOT NULL,
    `quantity` int
(
    11
) NOT NULL,
    `image` varchar
(
    255
) NOT NULL,
    PRIMARY KEY
(
    `cartId`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sessionId`, `productId`, `productName`, `price`, `quantity`, `image`)
VALUES (63, 'ubclmcb6bjb0st33me9vbn9mc4', 35, 'Le Buste en marbre', 34.99, 1, 'uploads/products/ce63484da4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category`
(
    `catId` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `catName` varchar
(
    255
) NOT NULL,
    PRIMARY KEY
(
    `catId`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`)
VALUES (11, 'Poivrier'),
       (16, 'Bustes'),
       (18, 'Placarderie'),
       (20, 'Testfinal');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_compare`
--

DROP TABLE IF EXISTS `tbl_compare`;
CREATE TABLE IF NOT EXISTS `tbl_compare`
(
    `id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `csId` int
(
    11
) NOT NULL,
    `productId` int
(
    11
) NOT NULL,
    `productName` varchar
(
    255
) NOT NULL,
    `price` float
(
    10,
    2
) NOT NULL,
    `image` varchar
(
    255
) NOT NULL,
    PRIMARY KEY
(
    `id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer`
(
    `csId` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `name` varchar
(
    255
) NOT NULL,
    `city` varchar
(
    20
) NOT NULL,
    `zip` varchar
(
    20
) NOT NULL,
    `email` varchar
(
    50
) NOT NULL,
    `address` varchar
(
    255
) NOT NULL,
    `country` varchar
(
    20
) NOT NULL,
    `phone` varchar
(
    255
) NOT NULL,
    `pass` varchar
(
    255
) NOT NULL,
    PRIMARY KEY
(
    `csId`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_customer`
--

INSERT INTO `tbl_customer` (`csId`, `name`, `city`, `zip`, `email`, `address`, `country`, `phone`, `pass`)
VALUES (10, 'so', 'so', 'so', 'so@free.fr', 'so', 'fr', '01020304', 'b807023f87e63b8ada92f79f546ff9cc'),
       (11, 'Elias Cardon', 'Marseille', '13008', 'elias.cardon.17@gmail.com', '30 rue du RhÃ´ne', 'France',
        '0652514386', '9ad3006cab8c16348d4297b25dd8cb98'),
       (12, 'Jobba', 'Marseille', '13008', 'jobba@jobba.fr', 'Jobba', 'Jobba', '01924839',
        '9ad3006cab8c16348d4297b25dd8cb98'),
       (13, 'Elias', 'Marseille', '13000', 'elias.elias@gmail.com', '4 rue yoyo', 'France', '06666666',
        'c65fd113c5b2977fe36bd41da8a9da67');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order`
(
    `id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `csId` int
(
    11
) NOT NULL,
    `productId` int
(
    11
) NOT NULL,
    `productName` varchar
(
    255
) NOT NULL,
    `quantity` int
(
    11
) NOT NULL,
    `price` float
(
    10,
    2
) NOT NULL,
    `image` varchar
(
    255
) NOT NULL,
    `Date` datetime NOT NULL DEFAULT current_timestamp
(
),
    `status` int
(
    11
) NOT NULL DEFAULT 0,
    PRIMARY KEY
(
    `id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `csId`, `productId`, `productName`, `quantity`, `price`, `image`, `Date`, `status`)
VALUES (89, 11, 35, 'Le Buste en marbre', 2, 69.98, 'uploads/products/ce63484da4.jpg', '2020-11-26 20:47:42', 0),
       (90, 11, 32, 'Le Placard qui range', 2, 399.98, 'uploads/products/7305a8e823.jpg', '2020-11-26 20:48:26', 0),
       (91, 11, 24, 'Le Poivrier qui Poivre', 1, 34.99, 'uploads/products/95ebcaa4b1.jpg', '2020-11-26 20:49:21', 0),
       (92, 11, 35, 'Le Buste en marbre', 1, 34.99, 'uploads/products/ce63484da4.jpg', '2020-11-26 21:07:40', 0),
       (93, 11, 24, 'Le Poivrier qui Poivre', 4, 139.96, 'uploads/products/95ebcaa4b1.jpg', '2020-11-26 21:07:40', 0),
       (94, 11, 35, 'Le Buste en marbre', 3, 104.97, 'uploads/products/ce63484da4.jpg', '2020-11-26 21:09:42', 0),
       (95, 13, 32, 'Le Placard qui range', 2, 399.98, 'uploads/products/7305a8e823.jpg', '2020-11-27 09:54:30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product`
(
    `pid` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `productName` varchar
(
    255
) NOT NULL,
    `catId` int
(
    11
) NOT NULL,
    `brandId` int
(
    11
) NOT NULL,
    `body` text NOT NULL,
    `price` float
(
    10,
    2
) NOT NULL,
    `image` varchar
(
    255
) NOT NULL,
    `type` tinyint
(
    4
) NOT NULL DEFAULT 0,
    PRIMARY KEY
(
    `pid`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_product`
--

INSERT INTO `tbl_product` (`pid`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`)
VALUES (24, 'Le Poivrier qui Poivre', 11, 10, '<p>Un poivrier qui poivre tr&egrave;s bien.</p>', 34.99,
        'uploads/products/95ebcaa4b1.jpg', 1),
       (32, 'Le Placard qui range', 18, 18, '<p>C\'est un placard pour ranger</p>', 199.99, 'uploads/products/7305a8e823.jpg', 2),
(35, 'Le Buste en marbre', 16, 16, '<p>Un buste en marbre</p>', 34.99, 'uploads/products/ce63484da4.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_wishlist`
--

DROP TABLE IF EXISTS `tbl_wishlist`;
CREATE TABLE IF NOT EXISTS `tbl_wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `csId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
