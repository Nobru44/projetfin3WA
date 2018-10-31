-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 31 oct. 2018 à 11:16
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `denatura`
--

-- --------------------------------------------------------

--
-- Structure de la table `algue`
--

DROP TABLE IF EXISTS `algue`;
CREATE TABLE IF NOT EXISTS `algue` (
  `id_algue` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `title_photo` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `profondeur` varchar(30) NOT NULL,
  `observed_at` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `id_author` int(11) NOT NULL,
  `utilisation` varchar(500) DEFAULT NULL,
  `url_info` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_algue`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `algue`
--

INSERT INTO `algue` (`id_algue`, `name`, `category_id`, `description`, `image_url`, `title_photo`, `created_at`, `updated_at`, `latitude`, `longitude`, `profondeur`, `observed_at`, `status`, `id_author`, `utilisation`, `url_info`) VALUES
(86, '<i>Caulerpa serrulata</i>', 1, '<b>Les caulerpes, des espèces invasives ?</b><div><i>Caulerpa serrulata</i> est une des espèces du genre Caulerpa, de la famille des <span>Caulerpaceae</span> et dont un représentant (Caulerpa taxifolia) aura défrayé la chronique comme espèce invasive de la mer Méditerranée suite à une introduction accidentelle.\r\n\r\nDe couleur verte généralement foncée (claire lorsque elle commence à mourir), elle se caractérise par la présence de deux éléments morphologiques typiques : un stolon (la tige rampante) qui se développe horizontalement sur le substrat et s’enracine, des frondes qui prennent naissance sur le stolon et se développent verticalement. Chez Caulerpa serrulata, les frondes ont l’aspect de lanières parfois spiralées et dont les bords sont dentelés. Elle est donc aisée à différencier des autres caulerpes les plus présentes\r\n\r\ncomme C. racemosa (les frondes ont la forme de boules ou de poires) ou <i>C sertularioides</i> (les frondes sont ramifiées par des pinnules et ressemblent à des feuilles).\r\n\r\nfines feuilles spiralées qui se succèdent le long d’un stolon qui court sur le substrat. La morphologie des feuilles peut toutefois varier d’un endroit à l’autre ce qui pourrait laisser penser qu’il s’agit d’espèces différentes.\r\n\r\nSi elle préfère les zones sableuses ou détritiques pour se développer, donc dans le lagon proprement dit, des observations sont faites également au niveau du platier dans les anfractuosités ou à l’abri des patates coralliennes.\r\n\r\nA la Réunion, plusieurs espèces de caulerpes sont rencontrées dans les lagons et en dehors des lagons (16 espèces sont recensées dans notre base de données mais nombre d’entre elles sont des variétés de C. racemosa). Dans le lagon, elle peut prendre l’aspect d’un tapis vert dans les zones sableuses ou détritiques.\r\n\r\nEn 2007, un développement important de caulerpes (en réalité un complexe de plusieurs espèces dont <i>C. sertularioides</i> et <i>C. cupressoides</i> en plus de <i>C. serrulata</i>) a été constaté dans le lagon de la Saline et a fini par être évacué sous l’effet des houles australes.&nbsp;<div>&nbsp;Signalez nous vos observations pour suivre son évolution dans l’espace et dans le temps</div></div>', 'public/images/87.9e62974d6a136db7e44901776012fa89.jpg', 'caulerpa serrulata', '2018-10-12', '2018-10-30', -21.0637, 55.2187, 'none', '2018-10-12', 'verified', 87, '<br>', 'https://en.wikipedia.org/wiki/Caulerpa_serrulata'),
(87, '<i>Hypnea pannosa</i>', 1, 'Hypnea pannosa est une algue rouge de la famille des Cystocloniaceae.\r\n\r\nDe couleur rouge, violet ou brune, elle est cartilagineuse et se caractérise par son iridescence. Le thalle des branches est plutôt aplati et progressant dans et sur les interstices du substrat de manière imbriquée voire désordonnée. Les petites branches prennent au départ la forme de petites épines.\r\nElle fréquente les petits fonds de lagon, de préférence en zone de platier interne ainsi que les zones rocheuses battues par la houle mais là où elle est protégée.\r\n\r\nC’est l’espèce la plus largement distribuée dans le monde du genre Hypnea et présente dans toutes les îles des Mascareignes. A la Réunion, elle est retrouvée surtout en petites tâches sur les substrats durs ou surtout dans les colonies coralliennes branchues de type Acropore.\r\n\r\n', 'public/images/87.d41d8cd98f00b204e9800998ecf8427e.jpg', '', '2018-10-12', '2018-10-30', -21.0332, 55.2008, 'de 0 à 5m', '2018-10-12', 'verified', 87, '<br>', 'https://en.wikipedia.org/wiki/Hypnea'),
(85, '<i>Peyssonnelia SPP</i>', 2, 'Peyssonelia sp (et espèces voisines) sont elles en train de coloniser le lagon de l’Hermitage et sa pente externe ?\r\n\r\nLes Peyssonnelia sont des algues rouges de la famille des Peyssonneliaceae, le genre Peysssonnelia regroupant en fait plusieurs centaines d’espèces pour lesquelles seule l’analyse génétique en laboratoire permet de confirmer l’espèce. Elles ne doivent pas être confondues avec les Lobophora qui sont elles des algues brunes également présentes en lagon.\r\n\r\nA la Réunion, seules deux espèces de ce genre sont signalées : P. cf conchicola et P. sp.\r\n\r\nLeurs caractéristiques sont d’être fortement attachées au substrat dur par leur partie centrale et de se développer de manière circulaire depuis ce point, de présenter des lignes circulaires et radiales, et de s’étendre de manière encroûtante (mais les extrémités peuvent en fait s’observer libres et détachées du substrat).\r\n\r\nDans les lagons de la Réunion, par exemple à l’Hermitage (La Saline), l’une de ces espèces est actuellement présente de manière extensive, voire invasive et semble s’étendre vers le sud du lagon mais également vers les pentes externes, où seules quelques observations avaient été faites jusqu’alors sur les stations Reef Check.\r\n\r\nLes clubs de plongée signalent d’ailleurs en 2018 un fort développement sur la pente externe du récif à proximité du port de Saint-Gilles (lien vers la vidéo).\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSignalez nous vos observations pour suivre son évolution dans l’espace et dans le temps', 'public/images/87.e778fe82efcb57436b4b3f9a6002b535.jpg', 'peyssonnelia', '2018-10-12', '2018-10-30', -21.0077, 55.2339, 'none', '2018-10-12', 'verified', 87, '<br>', 'https://fr.wikipedia.org/wiki/Peyssonneliaceae'),
(84, '<i>Asparagopsis taxiformis</i>', 2, 'Asparagopsis l’algue envahissante ?\r\n\r\nAsparagopsis est une algue rouge de la famille des Bonnemaisonniaceae, plutôt bien remarquable sous l’eau car elle existe en réalité sous deux morphologies différentes (la forme « gamétophyte » et la forme « tétrasporophyte »). Si la forme « tétrasporophyte » est difficile à identifier et peut être confondue avec d’autres espèces par exemple de Céramiales ou de Wrangelia, sa forme dressée est elle très facilement reconnaissable\r\n\r\nL’algue se fixe sur le fond par des stolons à partir desquels se développent des thalles dressés de couleur vive, rouge, et qui ondulent sous l’effet de la houle. Pour le moment, sa zone de distribution principale demeure le lagon de Saint-Leu et son chenal de passe au Nord.\r\n\r\nLa répartition de Asparagopsis dans la région du sud ouest de l’océan Indien reste incertaine car non étudiée mais elle est bien représentée à Mayotte et des signalements ont été faits aux environs de Mahé aux Seychelles ainsi que dans l’archipel au nord de Nosy Bé (Madagascar).\r\n\r\nElle n’est pas décrite par les scientifiques avant 2010 et a fait l’objet dans les années 2013-2015 d’un programme particulier d’études, piloté par Claude Payri de l’IRD : SEAPROLIF. Ce programme concernait également l’espèce Asparagopsis armata, qui elle se développe dans les milieux tempérés. Le caractère invasif de cette algue n’a pas été confirmé à l’issue de ce programme de recherche.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSignalez nous vos observations pour suivre son évolution dans l’espace et dans le temps', 'public/images/87.24eccc94f9f9d07cafa11f2cb094d07f.jpg', 'Asparagopsis Taxiformis', '2018-10-12', '2018-10-30', -21.0384, 55.1857, 'none', '2018-10-12', 'verified', 87, '<br>', 'https://fr.wikipedia.org/wiki/Asparagopsis_taxiformis');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `id_author` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `url_media` varchar(255) DEFAULT NULL,
  `url_photo` varchar(255) DEFAULT NULL,
  `title_photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `id_author`, `title`, `content`, `id_category`, `created_at`, `updated_at`, `url_media`, `url_photo`, `title_photo`) VALUES
(71, 2, 'Le blog sera bientôt actif<br>', 'Nous comptons vous proposer dans cette section un tas d\'articles au fil du temps. Nous espérons qu\'ils seront à votre goût. A très bientôt. ', 5, '2018-10-23', '2018-10-31', NULL, '', '2plateau algal');

-- --------------------------------------------------------

--
-- Structure de la table `article_category`
--

DROP TABLE IF EXISTS `article_category`;
CREATE TABLE IF NOT EXISTS `article_category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(30) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `article_category`
--

INSERT INTO `article_category` (`id_category`, `name_category`) VALUES
(1, 'L\'image du mois'),
(2, 'Documentation'),
(3, 'Insolite'),
(4, 'Recherche'),
(5, 'Environnement'),
(6, 'Toxicologie');

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `habiltation` varchar(200) NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id_author`, `firstname`, `lastname`, `habiltation`) VALUES
(1, 'Jean-Pascal', 'Quod', 'admin'),
(2, 'La', 'rédaction', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'algues vertes'),
(2, 'algues rouges'),
(3, 'algues brunes'),
(4, 'indéterminée');

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

DROP TABLE IF EXISTS `coordonnees`;
CREATE TABLE IF NOT EXISTS `coordonnees` (
  `id_coord` int(11) NOT NULL AUTO_INCREMENT,
  `id_algue` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `coord_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id_coord`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `coordonnees`
--

INSERT INTO `coordonnees` (`id_coord`, `id_algue`, `latitude`, `longitude`, `coord_name`) VALUES
(7, 86, -21.2435, 55.7391, '<i>Caulerpa Serrulata</i>'),
(2, 86, -21.494, 55.5028, 'Caulerpa Serrulata'),
(4, 86, -21.7799, 55.8545, 'Caulerpa Serrulata');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf16le;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `habilitation` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `mail`, `password`, `habilitation`, `created_at`, `updated_at`) VALUES
(87, 'jp', 'quod', 'quodquantumalgue@algue.fr', 'rl67xR6XPXheU', 'admin', NULL, '2018-09-11'),
(153, 'maya', 'maya', 'maya@gmail.com', 'rlK3zC.w3vLo.', 'guest', '2018-10-31', '2018-10-31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
