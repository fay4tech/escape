-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.19 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour escape
CREATE DATABASE IF NOT EXISTS `escape` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `escape`;

-- Export de la structure de la table escape. companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` mediumint(8) unsigned DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open` time DEFAULT NULL,
  `close` time DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricemin` double unsigned DEFAULT NULL,
  `pricemax` double unsigned DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'companies/default.jpg',
  `avis` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sale` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table escape.companies : ~35 rows (environ)
DELETE FROM `companies`;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`, `name`, `adress`, `city`, `region`, `zip`, `country`, `open`, `close`, `email`, `url`, `tel`, `pricemin`, `pricemax`, `image`, `avis`, `created_at`, `updated_at`, `sale`) VALUES
	(0, 'N/A', NULL, NULL, NULL, NULL, NULL, '10:00:00', '22:00:00', NULL, NULL, NULL, NULL, NULL, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(1, 'One hour Charonne', '24, rue Emile Lepeu', 'paris', 'Paris', 75011, 'France', '10:00:00', '24:00:00', 'contact@one-hour.fr', 'www.one-hour.fr', '+33.9.72.54.50.43', 20, 50, 'companies/default.jpg', 'Excellente enseigne d\'amis passionnés qui s\'amusent avec les joueurs comme avec des souris en cage. Ils s\'adaptent à votre niveau et à vos demandes particulières. une super experience garentie.', NULL, NULL, NULL),
	(2, 'LockedUp Lieusaint', ' Immeuble Croix du Sud ZAC du Carré Sénart, 2 Allée de la Mixité', 'lieusaint', 'Seine et marne', 77127, 'france', '09:00:00', '24:00:00', 'contact@lockedup-escapegame.com', 'https://www.lockedup-escapegame.com/', '+33.1.74.59.62.11,\r\n+33.6.23.76.12.04\r\n', 18, 45, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(3, 'The Hostel Talence', '31, rue Pacaris', 'Talence', 'Aquitaine', 33400, 'France', '10:00:00', '22:00:00', 'contact@hostel.fr', 'www.thehostel.fr', '+33.5.56.29.10.17', 22, 40, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(4, 'The Game', '51, rue Cardinal Lemoine', 'paris', 'Paris', 75005, 'france', '10:00:00', '24:00:00', NULL, 'www.thegame-france.com', '+33.1.43.29.26.21', 25, 32, 'companies/default.jpg', 'Excellente enseigne professionelle et très sérieuse. Une vrai référence pour tous les escape games à notre avis. 1 MJ par salle. Les MJ savent vous mettre dans l\'ambiance, se rappellent de votre nom (au moins le temps de la partie), prennent le temps de débiref avec vous. ', NULL, NULL, NULL),
	(5, 'escape yourself lieusaint', '144, rue benjamin delessert', 'lieusaint', 'Seine et marne', 77127, 'france', '09:30:00', '22:30:00', 'info@mail.com', 'www.escapeyourselflieusaint.fr', '+33.1.64.05.19.40', 18.21, 36, 'companies/default.jpg', 'Eodem tempore Serenianus ex duce, cuius ignavia populatam in Phoenice Celsen ante rettulimus, pulsatae maiestatis imperii reus iure postulatus ac lege, incertum qua potuit suffragatione absolvi, aperte convictus familiarem suum cum pileo, quo caput operiebat, incantato vetitis artibus ad templum misisse fatidicum, quaeritatum expresse an ei firmum portenderetur imperium, ut cupiebat, et cunctum.\r\n\r\nAbusus enim multitudine hominum, quam tranquillis in rebus diutius rexit, ex agrestibus habitaculis urbes construxit multis opibus firmas et viribus, quarum ad praesens pleraeque licet Graecis nominibus appellentur, quae isdem ad arbitrium inposita sunt conditoris, primigenia tamen nomina non amittunt, quae eis Assyria lingua institutores veteres indiderunt.\r\n\r\nQui cum venisset ob haec festinatis itineribus Antiochiam, praestrictis palatii ianuis, contempto Caesare, quem videri decuerat, ad praetorium cum pompa sollemni perrexit morbosque diu causatus nec regiam introiit nec processit in publicum, sed abditus multa in eius moliebatur exitium addens quaedam relationibus supervacua, quas subinde dimittebat ad principem.\r\n\r\nAccedebant enim eius asperitati, ubi inminuta vel laesa amplitudo imperii dicebatur, et iracundae suspicionum quantitati proximorum cruentae blanditiae exaggerantium incidentia et dolere inpendio simulantium, si principis periclitetur vita, a cuius salute velut filo pendere statum orbis terrarum fictis vocibus exclamabant.\r\n\r\nIamque non umbratis fallaciis res agebatur, sed qua palatium est extra muros, armatis omne circumdedit. ingressusque obscuro iam die, ablatis regiis indumentis Caesarem tunica texit et paludamento communi, eum posts haec nihil passurum velut mandato principis iurandi crebritate confirmans et statim inquit exsurge et inopinum carpento privato inpositum ad Histriam duxit prope oppidum Polam, ubi quondam peremptum Constantini filium accepimus Crispum.', NULL, NULL, NULL),
	(6, 'Escape Hunt Bordeaux', '5, rue Pierre Lotti', 'Bordeaux', 'Aquitaine', 33800, 'France', '10:00:00', '23:00:00', 'bordeaux@escapehunt.com', 'bordeaux.escapehunt.com', '+33.5.56.33.60.01', 21, 36, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(7, 'Enigmatic', '4, avenue James de Rothschild', 'Ferrières-en-Brie', 'Seine et marne', 77164, 'France', '09:00:00', '23:00:00', 'contact@enigmaticparis.fr', 'www.enigmaticparis.fr', '+33.1.60.35.56.40', 18, 33, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(8, 'Lock academy', '25, rue Coquillère', 'Paris', 'Paris', 75001, 'France', '10:00:00', '24:00:00', NULL, 'lockacademy.com', '+33.9.83.86.86.96', 24, 32, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(9, 'LockedUp Marne la vallee', 'Clos du chêne, avenue de la ferme Briarde', 'Chanteloup-en-Brie', 'Seine et marne', 77600, 'France', '10:30:00', '23:00:00', 'contact@lockedup-marnelavallee.fr', 'escapegame-marnelavallee.fr', '+33.6.09.84.46.13', 18, 46, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(10, 'Just in Time ', '7, rue des Mares ', 'Sainte-Genevieve-des-Bois', 'Essonne', 91700, 'France', '10:00:00', '23:00:00', 'contact@justintime-escapegame.fr', 'www.justintime-escapegame.com', '+33.1.69.04.67.97, +33.6.40.26.01.79', 18, 30, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(11, 'Happy Hour', '37, rue de la lune', 'Paris', 'Paris', 75002, 'France', '09:45:00', '23:30:00', 'contact@happyhourescapegame.com', 'www.happyhourescapegame.com', '+33.1.71.73.55.99', 21, 32, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(12, 'xxx', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(13, 'Fox in the Box', '241, rue de Bercy', 'Paris', 'Paris', 75012, 'France', '09:30:00', '22:00:00', 'paris@foxinabox.fr', 'paris.foxinabox.fr', '+33.9.83.62.59.48, +33.6.62.18.41.40', 24, 45, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(14, 'Indicium', '24, galerie Saint-MArc', 'Paris', 'Paris', 75002, 'France', '10:00:00', '22:00:00', 'contact@indicium-escapegame.fr', 'indicium-escapegame.fr', '+33.1.40.39.02.09', 25, 32, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(15, 'Leavinroom Perreire', '28, bis boulevard Perreire', 'Paris', 'Paris', 75017, 'France', '09:30:06', '22:00:00', 'contact@leavinroom.fr', 'leavinroom.fr', '+33.1.75.42.96.06', 25, 32, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(16, 'The Prizoners', 'diverses', 'Paris', 'Paris', NULL, 'France', '09:00:00', '23:30:00', 'paris@prizoners.com', 'prizoners.com', '+33.9.67.00.92.01', 43.5, 22, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(17, 'Escape Mission', 'Untere Viaduktgasse 3', 'Vienne', 'Wien', 1030, 'Austria', '11:30:00', '22:00:00', 'info@escapemission.at', 'escapemission.at', '+43.676.555.99.99', 17, 35, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(18, 'SherLockd', 'märzstrasse 144', 'Vienne', 'Wien', 1140, 'Austria', '08:30:00', '21:30:00', 'info@sherlockd.at', 'www.theescapegame.at', '+43.660.693.60.00', 19, 27, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(19, 'La pièce', '3 rue de metz', 'Paris', 'Paris', 75010, 'France', '10:00:00', '20:30:00', NULL, 'www.lapiece.com', '+33.1.42.46.37.62', 25, 30, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(20, 'Team Time', '26 rue Richer', 'Paris', 'Paris', 75009, 'France', '10:00:00', '00:00:00', 'play@team-time.fr', 'www.team-time.fr', '+33.9.50.37.58.10', 18, 60, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(21, 'Team Break La défense', '2 place de la défense, cnit', 'Puteaux', 'Hauts de seine', 92800, 'France', '09:00:00', '23:00:00', 'ladefense@team-break.fr', 'www.team-break.fr', '+33.9.86.19.56.86', 19, 28, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(22, 'Code 60', 'Zone des Aveneaux', 'Gond-Pontouvre', 'Charente', 16160, 'France', '10:00:00', '22:00:00', NULL, 'www.code60.fr', '+33.5.45.94.90.38', 20, 28, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(23, 'Destination danger Beccaria', '13 rue Beccaria', 'Paris', 'Paris', 75012, 'France', '10:00:00', '23:00:00', NULL, 'www.destinationdanger.fr', '+33.9.72.81.31.08', 20, 50, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(24, 'Artimus', '161, rue des Pyrénées', 'Paris', 'Paris', 75020, 'France', '10:00:00', '23:45:00', 'contact@artimus-escapegame.com', 'www.artimus-escapegame.com', '+33.1.56.58.08.19', 22, 43.5, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(25, 'Phobia', '127. rue Jeanne d\'Arc', 'Paris', 'Paris', 75013, 'France', '10:00:00', '22:00:00', 'contact@escapephobia.com', 'escapephobia.com', '+33.1.44.24.85.28', 20, 60, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(26, 'The escape Lab', '21 rue du sentier', 'Paris', 'Paris', 75002, 'France', '10:00:00', '00:00:00', NULL, 'www.escapelab.fr', '+33.1.84.25.82.18', 28, 32, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(27, 'Lock busters', '2, rue Crillon', 'Paris', 'Paris', 75004, 'France', '10:00:00', '23:30:00', 'hello@lockbusters.fr', 'lockbusters.fr', NULL, 24, 32, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(28, 'Mystery escape', '2 rue Leon Jost', 'Paris', 'Paris', 75017, 'France', '10:00:00', '22:00:00', 'info@mysteryescape.com', 'www.mysteryescape.com', '+33.1.53.76.13.76', 26, 32, 'companies/default.jpg', NULL, NULL, NULL, NULL),
	(29, 'Destination danger Voltaire', '66 boulevard Voltaire', 'Paris', 'Paris', 75011, 'France', '10:00:00', '23:00:00', NULL, 'www.destinationdanger.fr', '+33.9.73.13.91.58', 20, 50, 'companies/5fU5lkKIqBKbph5nHDNpd3wYzuTOug1S9Tav7rFw.png', NULL, NULL, '2018-08-27 04:16:31', NULL),
	(30, 'Citroen C_42', '42, avenue des Champs Elysées', 'Paris', 'Paris', 75008, 'France', '13:15:42', '13:16:27', NULL, NULL, NULL, 9.5, 12.7, 'companies/fH5uiU0n6gu0r43PAsJm5c8dAGvqiFJVVFsBKoHY.png', NULL, NULL, '2018-08-27 04:15:19', NULL),
	(31, 'Time-busters Wien', 'Rembrandtstrasse 24', 'Vienne', 'Wien', 1020, 'Austria', '11:00:00', '22:00:00', 'info@time-busters.at', 'www.time-busters.at', '+43.1.38.20.003', 15, 25, 'companies/jGY774yrWpd6uaZUh3sLg6FFbhdRy5WjC0XI20bh.jpeg', NULL, NULL, '2018-08-23 20:34:23', NULL),
	(32, 'First Escape', 'Himmelpfortgasse 17', 'Vienne', 'Wien', 1010, 'Austria', '10:00:00', '21:00:00', 'office@firstescape.at', 'www.firstescape.at', '+43.1.512.24.79', 19, 37.5, 'companies/ACGwcKHHA8uFooU7uXzNQ8bvoO3eVhQmrzZAIFMI.png', 'First escape est une branche de phobia russie et reste donc fidèle au principe de 0 cadenas. Situé en plein centre ville de Vienne, dans un sous sol d\'un batiment ancien, le cadre en est remarquable.', NULL, '2018-08-27 04:12:21', NULL),
	(33, 'E Exit escape Game', 'Nyar u. 27', 'Budapest', 'Budapest', 1072, 'Hungaria', '09:00:00', '22:00:00', NULL, 'http://szabadulos-jatek.hu/en/', '+36 30 889 36 33', 37, 60, 'companies/2L3WUsret5T1Iqq9D5XG5m04PYCOUIJ0OKjz1pH1.jpeg', NULL, NULL, '2018-08-27 04:02:37', NULL),
	(34, 'Open the door', 'Alserstrasse 27/1/5', 'Vienne', 'Wien', 1080, 'Austria', '11:45:00', '22:00:00', 'info@openthedoor.at', 'www.openthedoor.at', '+43 69913205757', 18, 25, 'companies/lX1y37DXia6aWaIOPmLl2MLLgydeXgnaFxtWir0c.jpeg', 'not yet', '2018-08-23 01:11:33', '2018-08-27 04:24:32', NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Export de la structure de la table escape. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table escape.migrations : ~7 rows (environ)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_07_24_122323_create_rooms_table', 1),
	(4, '2018_07_24_131052_create_companys_table', 1),
	(40, '2018_07_28_203144_add_views_to_rooms_table', 2),
	(41, '2018_08_03_012135_update_rooms_table', 3),
	(42, '2018_08_03_014418_update_companies_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Export de la structure de la table escape. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table escape.password_resets : ~0 rows (environ)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('fay019@gmail.com', '$2y$10$2nuUdkP65mIxiRHaiMkTseGVBp8Klxv0JX4cNqifRyLpXebzHXIBW', '2018-07-30 22:46:09');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Export de la structure de la table escape. rooms
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pitch` text COLLATE utf8mb4_unicode_ci,
  `minplayers` smallint(5) unsigned NOT NULL,
  `maxplayers` smallint(5) unsigned NOT NULL,
  `lvl` smallint(5) unsigned NOT NULL DEFAULT '0',
  `success` smallint(5) unsigned DEFAULT NULL,
  `timeplay` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'rooms/default.jpg',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `playDate` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `company_id` int(10) unsigned NOT NULL DEFAULT '0',
  `teams` text COLLATE utf8mb4_unicode_ci,
  `timePlayMax` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `wins` smallint(5) unsigned NOT NULL DEFAULT '0',
  `avis` longtext COLLATE utf8mb4_unicode_ci,
  `positive` text COLLATE utf8mb4_unicode_ci,
  `negative` text COLLATE utf8mb4_unicode_ci,
  `search` smallint(5) unsigned NOT NULL DEFAULT '0',
  `enigmas` smallint(5) unsigned NOT NULL DEFAULT '0',
  `immersion` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `rooms_companies_id_foreign` (`company_id`),
  CONSTRAINT `rooms_companies_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table escape.rooms : ~59 rows (environ)
DELETE FROM `rooms`;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` (`id`, `name`, `theme`, `pitch`, `minplayers`, `maxplayers`, `lvl`, `success`, `timeplay`, `image`, `views`, `playDate`, `created_at`, `updated_at`, `company_id`, `teams`, `timePlayMax`, `wins`, `avis`, `positive`, `negative`, `search`, `enigmas`, `immersion`) VALUES
	(1, 'Mafia Room', 'Enquête / Mafia', 'Le parrain de votre famille a été arrété, dans son bureau il a cahé des preuves qui peuvent lui être fatales. vous avez 75 minutes avant l\'arrivée de la police pour trouver ces preuves et vous enfuire.', 3, 5, 3, 40, 75, 'rooms/default.jpg', 0, '2018-08-06 20:00:10', '2018-08-06 16:39:17', '2018-08-06 16:39:17', 2, 'Snow, Saol, Kaena, Damien, Myriam', 64, 1, 'Cette salle a été notre seconde salle. Même si le pitch est moyen, car lu sur une feuille par le MJ, l\'explication de base sur ce quest un escape, comment marchent les cadenas et qu\'il faut communiquer entre nous... tout y est. LE point fort de cette salle est la déco qui est vraiment bien. ', NULL, NULL, 5, 2, 4),
	(2, 'Prison Room', 'Evasion / Prison', 'Vous étes jettés en prison! Mais vous savez que de cette cellule quuelqu\'un a pu s\'échapper, il vous a laissé des indices... Vous avez 75 minutes avant qu\'on ne vous change de cellule, allez vous reussir à vous échapper?', 2, 5, 2, 60, 75, 'rooms/default.jpg', 1, '2018-08-06 15:04:04', '2018-08-06 17:04:05', '2018-08-06 17:04:05', 2, 'Snow, Saol, Kaena, Damien, Myraim', 73, 1, NULL, NULL, NULL, 5, 2, 4),
	(3, 'White Room', 'énigmes / CIA', 'Vous voulez intégrer la CIA, mais avant cela il faudra réussir le test d\'embauche.', 4, 7, 2, 10, 75, 'rooms/default.jpg', 0, '2018-08-06 15:06:22', '2018-08-06 17:06:23', '2018-08-06 17:06:23', 2, 'Snow, Saol, Kaena, Damien, Pierre, Stephane, Myriam', 53, 1, NULL, NULL, NULL, 0, 0, 0),
	(4, 'Chambre 1408', 'surnaturel', 'La chambre 1408 fut le théâtre d’une tragédie et est aujourd’hui une pièce condamnée de l’hôtel. Il y a 100 ans, l’ancien propriétaire des lieux s’adonnait, avec des amis, à une pratique très en vogue à l’époque : le spiritisme. Un soir, lors d’une de ces fameuses séances, survint un terrible drame suite à une mauvaise décision collective. Depuis, dans cette chambre, un temps reconvertie en bibliothèque, se produisent d’étranges phénomènes. Encore une simple histoire de fantôme à dormir debout ? Et si c’était plus compliqué que ça ?\r\n\r\nVenez en aide à l’hôtel et tentez d’exorciser ses démons.\r\n', 2, 6, 4, 0, 60, 'rooms/default.jpg', 0, '2018-08-06 15:16:08', '2018-08-06 17:16:09', '2018-08-06 17:16:09', 3, 'Snow, Saol ', 60, 0, NULL, NULL, NULL, 5, 5, 5),
	(5, 'Chambre 237', 'amusons un client spécial', 'La suite 237 est une chambre privatisée depuis quelques mois par un mystérieux locataire. Ce dernier, un peu particulier organise des soirées pleines de surprises avec pour seul thème : la fête foraine. Aucune autre information ne nous est parvenue à l’heure actuelle, le seul moyen d’en savoir plus, y participer.\r\n\r\nAcceptez son invitation et pénétrez dans son univers hors du commun, mais attention, la curiosité est un vilain défaut et peut avoir de fâcheuses conséquences…\r\n', 2, 6, 4, 0, 60, 'rooms/default.jpg', 0, '2018-08-06 15:18:11', '2018-08-06 17:18:11', '2018-08-06 17:18:12', 3, 'Snow, Saol', 0, 0, NULL, NULL, NULL, 0, 0, 0),
	(6, 'Braquage à la française', 'braquage', 'Tout juste sorti de prison, Max, malfrat légendaire, compte bien se venger de l\'inspecteur de police responsable de sa chute', 3, 5, 3, 0, 60, 'rooms/default.jpg', 0, '2018-08-06 17:00:52', '2018-08-06 19:00:53', '2018-08-06 19:00:53', 4, 'Snow, Saol, Ilpadrello, Chimera, Kalrin', 54, 1, NULL, NULL, NULL, 0, 0, 0),
	(7, 'Le métro', 'se sauver d\'une mort quasi certaine', 'Vous êtes à bord d\'une rame de métro. Plus personne ne contrôle plus cette rame. Vous êtes des ingénieurs coincés à bord, dans 1 heure elle arrive en bout de ligne et s\'arretera dans un mur. Vous devez arréter la rame et vous enfuire pour sauver votre vie.', 3, 5, 3, 0, 60, 'rooms/default.jpg', 0, NULL, NULL, NULL, 4, 'Snow, Saol, Kaena, Damien, Myriam', 56, 1, NULL, NULL, NULL, 0, 0, 0),
	(8, 'Les catacombes', 'Archéologie', 'Un accès privé jusqu’alors interdit au public. Vous voilà à la recherche d\'un précieux testament oublié depuis des générations. Mais enfermés dans les catacombes, le temps joue contre vous.', 3, 5, 2, 0, 60, 'rooms/default.jpg', 0, '2018-08-06 17:05:00', '2018-08-06 19:05:00', '2018-08-06 19:05:00', 4, 'Snow, Saol, Chimera, Il padrello, Kalrin', 54, 1, NULL, NULL, NULL, 0, 0, 0),
	(9, 'Le trésor des templiers', 'Enquète/Histoire', 'Il y a des siècles, l’Ordre des Templiers mettait la main sur un trésor légendaire et inestimable. Plusieurs sources affirment que le Cardinal Lemoine aurait été en possession de ce trésor avant que ce dernier ne tombe dans l’oubli…', 3, 5, 3, 0, 60, 'rooms/default.jpg', 0, '2018-08-06 17:06:11', '2018-08-06 19:06:11', '2018-08-06 19:06:11', 4, 'Snow, Saol, Kaena, Myriam, Damien', 58, 1, NULL, NULL, NULL, 0, 0, 0),
	(10, 'L\'avion', 'Evasion / sauvetage', 'Porte 4 de l’aéroport Cardinal Lemoine, votre avion est à l’heure. Billet en main, vous êtes prêt à embarquer mais un peu nerveux… Rassurez-vous, il ne s’agit que d’un vol d’une heure. L’embarquement est annoncé, vous allez enfin pouvoir vous installer.', 3, 5, 2, 0, 60, 'rooms/default.jpg', 0, '2018-08-06 17:07:08', '2018-08-06 19:07:09', '2018-08-06 19:07:09', 4, 'Snow, Saol, Damien, Kaena', 52, 1, NULL, NULL, NULL, 0, 0, 0),
	(11, 'Le casse de Saint Emilion', 'braquage', 'La plus prestigieuse vente aux enchères de vin jamais organisée doit se tenir dans une heure au Château De La Rosière chez la famille De Lambert. La première bouteille classée grand cru Saint Emilion, héritage familial depuis plusieurs générations en est la pièce maîtresse. \r\n\r\nLe majordome véreux de la famille prend contact avec vous, voleurs de renom, afin de voler cette bouteille. Mais la mission s’annonce périlleuse car vous n’aurez qu’une heure pour dérober le butin et sortir du Château.\r\n', 2, 5, 3, 45, 60, 'rooms/default.jpg', 0, NULL, NULL, NULL, 6, 'Snow, Saol, Esther, ', 0, 0, NULL, NULL, NULL, 0, 0, 0),
	(12, 'Jack l\'éventreur', 'enquête sanglante', 'Londres, 1888.\r\n\r\nVotre jeune cabinet de détectives privés est appelé sur une affaire spéciale sur laquelle la police tourne en rond. Cette affaire concerne un potentiel tueur en série de l’est londonien que la presse surnomme « Jack L’Eventreur« .\r\n\r\nLe tueur aurait surtout agressé des prostituées vivant dans les bas-fonds de Londres. Elles eurent la gorge tranchée avant de subir des mutilations abdominales. En planque depuis plusieurs semaines devant l’appartement d’un suspect, vous passez à l’action une fois l’individu absent de son domicile.\r\nVous disposez alors de 60 minutes avant son présumé retour pour trouver des indices dans son antre vous permettant de prouver sa culpabilité.', 2, 5, 3, 40, 60, 'rooms/default.jpg', 0, '2018-08-06 17:44:43', '2018-07-29 00:45:48', '2018-08-06 19:44:45', 6, 'Snow, Saol', 56, 1, NULL, NULL, NULL, 0, 0, 0),
	(13, 'Le manoir d\'H.H. Holmes', 'evasion / horreur', 'A l’occasion de l’exposition universelle de Chicago de 1893, vous vous rendez dans un intriguant manoir dans lequel vous avez réservé une chambre.', 6, 8, 4, 35, 60, 'rooms/default.jpg', 0, '2018-08-06 17:46:09', '2018-08-06 19:46:09', '2018-08-06 19:46:10', 6, 'Snow, Saol, Kalrin, Esther, Marie-Laure, David', 58, 1, NULL, NULL, NULL, 0, 0, 0),
	(14, 'Panique à Westminster', 'enquête', 'Londres 1910, un tueur en série sème la panique dans le quartier de Westminster. Rejoignez les rangs du célèbre détective Hattings pour prévenir Melle DONOVAN qu\'elle est la prochaine sur la liste.....', 3, 6, 3, 0, 60, 'rooms/default.jpg', 0, '2018-08-06 17:52:06', '2018-08-06 19:52:06', '2018-08-06 19:52:07', 7, 'Snow, Saol, Mylène, Pierre', 60, 0, NULL, NULL, NULL, 0, 0, 0),
	(15, 'Le Virus du Professeur Zoltan', 'sauver le monde ', 'Le Professeur a développé un virus qui va éradiquer la planéte. Vous avez une heure pour récupérer la souche de ce virus, vous enfuir et sainsi sauver l\'humanité', 3, 6, 2, 0, 60, 'rooms/default.jpg', 3, '2018-08-06 19:53:45', '2018-08-06 21:53:46', '2018-08-06 21:53:47', 11, 'Snow, Saol, Kaena', 53, 1, NULL, NULL, NULL, 1, 2, 3),
	(16, 'Le bunker', 'sauver le monde / guerre froide', 'Nous sommes dans les années 80, en pleine guerre froide. Une séquence de lancement de missiles nucléaires a été déclenchée par un contre-espion devenu fou. Le monde est sur le point d\'être effacé par une explosion massive. Vous êtes une équipe d\'espions d\'élite envoyés pour désamorcer le lancement des missiles. Vous avez une heure pour sauver la planète. Vous êtes le dernier espoir de l\'humanité. Le compte à rebours a commencé...', 2, 5, 2, 35, 60, 'rooms/default.jpg', 1, '2018-08-06 20:11:11', '2018-08-06 22:11:11', '2018-08-06 22:11:12', 13, 'Snow, Saol, Dark, Nina', 53, 1, NULL, NULL, NULL, 0, 0, 0),
	(17, 'Le manoir d\'Ernestine', 'Enquète paranormale', 'Vous n\'avez pas bien connu grand-tante Ernestine.', 4, 8, 4, 0, 60, 'rooms/default.jpg', 0, NULL, '2018-07-31 04:15:53', '2018-07-31 04:15:53', 5, 'Snow, Saol, Julie, Envel, Aurélie, Jaimie', 58, 1, NULL, NULL, NULL, 0, 0, 0),
	(18, 'Loft 13', 'Horeur/paranormal', 'Ah Paris ! Paris, la ville de l’amour où vous avez toujours rêvé d’habiter. Mais avant de faire vos valises, vous devez passer par l’étape la plus compliquée: la recherche de l’appartement de vos rêves. La chance vous sourit lorsque vous avez trouvé la perle rare: un petit loft du 13ème arrondissement! Après quelques recherches, vous vous apercevez qu’une légende urbaine étrange entoure cet appartement…Des crimes auraient été commis par une secte mystérieuse… Mais ce n’est qu’une légende … Oserez-vous visiter ces lieux et en sortir indemne?', 1, 2, 3, 4, 60, 'rooms/default.jpg', 0, '2018-08-07 10:11:02', '2018-07-31 04:30:37', '2018-07-31 04:30:37', 25, 'Snow, Saol', 53, 1, NULL, NULL, NULL, 0, 0, 0),
	(19, 'Saw / Instinct de survie', 'Horeur / Survie', 'LeavinRoom veut jouer à un jeu ..', 3, 5, 3, 0, 60, 'rooms/default.jpg', 0, NULL, '2018-07-31 04:33:40', '2018-07-31 04:33:40', 15, 'Snow, Saol, Ilpadrello, Kalrin', 53, 1, NULL, NULL, NULL, 0, 0, 0),
	(20, 'Dr. Qui?', 'voyage spacio-temporel', '', 2, 5, 4, 0, 60, 'rooms/default.jpg', 0, NULL, '2018-07-31 04:34:39', '2018-07-31 04:34:39', 23, 'Snow, Saol, Chimera, Ilpadrello', 60, 0, NULL, NULL, NULL, 0, 0, 0),
	(21, '69 nuances de Grey', 'Enquète érotique', '', 2, 7, 3, 0, 60, 'rooms/default.jpg', 0, '2018-08-07 10:59:57', '2018-07-31 04:37:04', '2018-07-31 04:37:04', 29, 'Snow, Saol', 60, 0, NULL, NULL, NULL, 0, 0, 0),
	(22, 'entérré vivant', 'Evasion / Survie', 'Comment avez vous pu accerper cela? Vous voilà enfermé vivant dans un cerceuil. Et votre ami dans un cerceuil à coté du votre. Pour vous en sortir, votre vie dépends l\'un de l\'autre, communiquez, respirez et ne paniquez surtout pas', 2, 2, 3, 0, 60, 'rooms/default.jpg', 0, NULL, '2018-07-31 04:37:34', '2018-07-31 04:37:34', 23, 'Kalrin, Antony', 0, 0, NULL, NULL, NULL, 0, 0, 0),
	(23, 'Le repère de Jesse James', 'Far west', 'Vous avez décidé de jouer au poker contre le plus grand bandit de l’Ouest. Vous n’auriez pas dû… Il y a quelques jours de cela, vous êtes partis jouer au poker contre Jesse James et sa bande. Et vous étiez en veine ce soir-là. Vous avez raflé le pactole ! Le problème ? Jesse James déteste perdre de l’argent. Pour se venger, il vous a fait kidnapper par ses hommes de main ! Deux choix s’offrent à vous : attendre la mort dignement ou tenter de vous échapper.', 3, 6, 2, 0, 60, 'rooms/default.jpg', 0, NULL, '2018-07-31 04:39:16', '2018-07-31 04:39:16', 22, 'Snow, Saol, Bernar, Elisabeth', 53, 1, NULL, NULL, NULL, 0, 0, 0),
	(24, 'Lost Asylum', 'Peur/ suspense', '1952, un hôpital psychiatrique vient de fermer ses portes suite à un fait divers sanglant : un patient interné depuis de nombreuses années vient d’assassiner plusieurs médecins dans des circonstances encore inexpliquées. Depuis, on ne l’a jamais revu.', 2, 5, 2, 0, 60, 'rooms/default.jpg', 0, NULL, NULL, NULL, 1, 'Snow, Saol, Nicolas F, Elham, Damien', 58, 1, NULL, NULL, NULL, 0, 0, 0),
	(25, 'Very bad night', 'humour/ potache', 'Après un lendemain de soirée difficile, vous vous réveillez dans un appartement inconnu. A en juger par l’état des lieux la soirée semble avoir été bien arrosée, mais hormis un énorme mal de crâne vous ne vous rappelez plus de grand chose.', 2, 5, 3, 0, 60, 'rooms/default.jpg', 0, NULL, NULL, NULL, 1, 'Snow, Saol, Pierre, Mylène', 60, 0, NULL, NULL, NULL, 0, 0, 0),
	(26, 'Le Code Bar', 'science fiction/ centre d\'exploration spacio-temporelle', '2139, les robots ont pris le pouvoir et veulent nous exterminer, dans un bar délaissé le professeur Brown a caché un disque qui peut sauver l\'humanité', 3, 5, 5, 0, 60, 'rooms/default.jpg', 0, '2018-08-06 20:29:43', '2018-08-06 22:29:42', '2018-08-06 22:29:42', 14, 'Snow, Saol, Envel, Kaena', 59, 1, NULL, NULL, NULL, 0, 0, 0),
	(27, 'Le pays des merveilles', 'litterature / fantastique', 'Alice a été capturée par la cruelle Reine de Cœur. Vous seul pouvez la sauver. Le Pays des Merveilles vous attend, mais attention, surprises et rencontres intrigantes pourraient retarder cette traversée… Là-bas, la vérité n’est pas toujours celle que l’on croit.', 3, 5, 1, 0, 60, 'rooms/default.jpg', 0, '2018-08-06 20:38:01', '2018-08-06 22:38:01', '2018-08-06 22:37:28', 15, 'Snow, Saol, Kaena, Damien', 43, 1, NULL, NULL, NULL, 0, 0, 0),
	(28, 'Protocol Hawai', 'Trouver un antidote', 'Une rencontre mystèreieuse dans la rue, une agence de voyage, un periple pour sauver un inconnu... Serez vous à la hauteur?', 3, 6, 0, 0, 60, 'rooms/default.jpg', 0, '2018-08-06 20:46:08', '2018-08-06 22:46:08', '2018-08-06 22:46:09', 16, 'Snow, Saol, Mylène, Dimitri', 56, 1, NULL, NULL, NULL, 0, 0, 0),
	(29, 'Der Alchimist', 'quête médiévale', 'Un alchimiste du Moyen age, votre maître, vous demande de créer la pierre de la sagesse vous avez une heure pour le faire, sinon vous êtes à jamais enfermé dans son laboratoire', 2, 7, 2, 0, 60, 'rooms/default.jpg', 0, '2018-08-06 20:53:57', '2018-08-06 22:53:57', '2018-08-06 22:53:58', 17, 'Snow, Saol', 38, 0, NULL, NULL, NULL, 0, 0, 0),
	(30, 'Devil\'s mountain', 'Enquète', 'Vous avez été invité par votre écrivain préféré dans sa cabane isolée, perché en haut d\'une montagne. Lorsque vous arrivé l\'homme a disparu, mais il vous a laissé des indices pour découvrir qui voulais sa peau.', 2, 7, 2, 0, 60, 'rooms/default.jpg', 0, NULL, NULL, NULL, 17, 'Snow, Saol', 49, 1, NULL, NULL, NULL, 0, 0, 0),
	(31, 'Holmes', 'enquête', '', 3, 6, 2, 0, 60, 'rooms/default.jpg', 0, NULL, NULL, NULL, 18, 'Snow, Saol, Peter', 52, 1, NULL, NULL, NULL, 0, 0, 0),
	(32, 'Le secret des pharaons', 'Archéologie', 'De récentes fouilles dans la vallée des rois ont révélé une toute nouvelle découverte.', 3, 6, 2, 0, 60, 'rooms/default.jpg', 0, NULL, '2018-07-29 00:46:38', '2018-07-29 00:46:43', 7, 'Snow, Saol, Kalrin, Sylvia, Mélisande, Etan', 52, 1, NULL, NULL, NULL, 0, 0, 0),
	(33, 'Le mystère de barbe noire', 'Pirate', 'Au large de La Barbade, explorez la cabine du célèbre pirate des Caraïbes et partez en quête de son trésor disparu ! Réflexion, coopération et sens de l\'observation vous permettront de percer son mystère ...', 3, 6, 4, 0, 60, 'rooms/default.jpg', 0, NULL, NULL, NULL, 7, 'Snow, Saol, Julie', 60, 0, NULL, NULL, NULL, 0, 0, 0),
	(34, 'L\'odyssée de La Pièce', 'Science fiction', '“Tous les 7 ans, les étoiles s’alignent et il est possible de traverser l’espace interplanétaire et se poser sur une planète distante.', 3, 5, 5, 0, 60, 'rooms/default.jpg', 0, NULL, NULL, NULL, 19, 'Snow, Saol, Kalrin, Ilpadrello', 57, 1, NULL, NULL, NULL, 0, 0, 0),
	(35, 'Mafia district', 'Mafia/évasion', ' On ne plaisante pas avec la Mafia. Qui s\'y frotte s\'y pique. Avez-vous vraiment envie de savoir ce qu\'il se passe dans un Cartel Colombien ? A vos risques et périls. C\'est notre unique avertissement.\r\n', 2, 5, 4, 0, 60, 'rooms/default.jpg', 0, NULL, NULL, NULL, 20, 'Snow, Saol, Kalrin, Ilpadrello', 55, 1, NULL, NULL, NULL, 0, 0, 1),
	(36, 'Magic School', 'Magie noire', 'Pedro et Olga se sont désormais intéressés à la magie, et plus particulièrement la magie noire. \r\nIls ont l’intention de s’en servir sur les humains et prendre le contrôle du monde. \r\nDans son château, Pedro s’entraine à utiliser des sorts plus terrifiants les uns que les autres. Seul des supers sorciers pourront rivaliser avec leurs dangereux pouvoirs !\r\n', 3, 12, 1, 0, 60, 'rooms/default.jpg', 0, NULL, NULL, NULL, 21, 'Snow, Saol, Kalrin, Ilpadrello', 38, 1, NULL, NULL, NULL, 0, 0, 0),
	(38, 'Les catacombes', 'Archéologie', 'Un accès privé jusqu’alors interdit au public. Vous voilà à la recherche d\'un précieux testament oublié depuis des générations. Mais enfermés dans les catacombes, le temps joue contre vous.', 3, 5, 3, 0, 60, 'rooms/default.jpg', 0, NULL, NULL, '2018-07-29 10:11:39', 4, 'Snow, Saol, Kalrin, Ilpadrello, Chimera', 54, 1, NULL, NULL, NULL, 0, 0, 0),
	(39, 'Un crime presque parfait', 'enquête', 'Stupeur à la Lock Academy !\r\n\r\nLa nuit dernière, Sir Doyle, doyen de l’établissement et mentor du Professeur Lock, a été assassiné dans son propre bureau.\r\n\r\nQui a tué cette légende vivante de l’académie ? Sous le choc, Lock décide de dépêcher sur les lieux du crime sa plus fine équipe d’apprentis-détectives : la vôtre !\r\n\r\nVous avez une heure pour enquêter sur ce drame à la façon d’un Cluedo géant et\r\nretrouver le mobile, l’arme du crime, et le coupable ! Mais lors de votre enquête, faites attention : les apparences sont parfois trompeuses…\r\n\r\nVous montrerez-vous plus malin que le meurtrier ?', 3, 5, 4, 0, 60, 'rooms/default.jpg', 0, '2018-08-07 09:38:59', '2018-08-07 11:38:59', '2018-08-07 11:39:00', 8, 'Snow, Saol, Nadine, Marine, Lucas', 58, 1, NULL, NULL, NULL, 0, 0, 0),
	(40, 'La prophétie Maya', 'Archéologie / Exploration', 'Aujourd’hui est le dernier jour de notre monde tel que nous le connaissons.', 3, 5, 4, 0, 60, 'rooms/default.jpg', 0, '2018-08-07 10:35:55', '2018-07-31 04:50:08', '2018-07-31 04:50:08', 28, 'Snow, Saol, Pierre, Mylène, Max', 59, 1, NULL, NULL, NULL, 0, 0, 0),
	(41, 'Goetia', 'horreur/ surnature', 'Partis en randonnée vous vous perdez en pleine forêt et vous réfugiez dans une cabane perdue au fond des  bois. Si vous aviez su ce qui allait vous y attendre, vous ne seriez peut être jamais venus.', 3, 6, 3, 0, 75, 'rooms/default.jpg', 8, NULL, '2018-07-31 04:58:22', '2018-08-01 21:59:05', 9, 'Snow, Saol, Céline, Julien', 65, 1, NULL, NULL, NULL, 0, 0, 0),
	(42, 'Autopsie', 'enquête', 'Dans les coulisses d’une salle d’autopsie, la médecine légale n’aura plus de secret pour vous ! Enfin si vous faites preuve d’observation et de logique, et surtout d’une coopération sans faille…', 4, 4, 0, 0, 60, 'rooms/default.jpg', 0, NULL, '2018-07-31 02:00:51', '2018-07-31 02:00:51', 10, 'Snow, Saol, Julie, Jaimie, Aurélie', 60, 0, NULL, NULL, NULL, 0, 0, 0),
	(43, 'Alma 3.0', 'science fiction / geek', '\r\nDes satellites qui s\'écrasent, un réseau téléphonique inopérant et internet coupé dans de nombreux pays... Depuis 24H un chaos technologique plonge les humains dans la détresse.\r\nLe point de départ de cette catastrophe est l\'accident de voiture autonome de Sam BINGE, un célèbre Hacker de 18 ans, créateur de l\'intelligence artificielle ALMA.\r\nLes experts sont formels. Libéré de son créateur, le système ALMA communique désormais de façon cryptée avec les machines et aura infecté l\'intégralité des ordinateurs et smartphones de la planète d\'ici 75 minutes. Electricité, eau, moyens de communication ne seront bientôt plus qu\'un lointain souvenir.\r\nPénétrez dans l\'antre du Hacker et neutralisez ALMA avant qu\'elle ne contrôle le monde entier...\r\n', 4, 10, 0, 50, 60, 'rooms/default.jpg', 0, NULL, '2018-07-31 02:15:33', '2018-07-31 02:15:33', 26, 'Snow, Saol, Ilpadrello, Kalrin, Chimera, Ilpadrellos padre', 60, 0, NULL, NULL, NULL, 0, 0, 0),
	(44, 'Escape Game by Citroen', 'enquête', 'Depuis près d’un siècle, un mystérieux document est conservé dans une salle secrète de CITROËN… Vous n\'aurez que 40 minutes avec votre équipe (4 joueurs max) pour fouiller les lieux à la recherche d\'indices et découvrir l\'héritage d’André Citroën ! ', 3, 4, 2, 0, 40, 'rooms/default.jpg', 1, '2018-08-07 13:17:36', '2018-07-31 02:23:09', '2018-07-31 02:23:09', 30, 'Snow, Saol, Damien, Kaena', 39, 1, NULL, NULL, NULL, 0, 0, 0),
	(45, 'Ultimate Madrigal', 'Enquète / Voyage temporel', '1590, Naples, Plongés en pleine Renaissance italienne, c\'est au domicile du célèbre musicien Carlo Gesualdo que vous tenterez d\'élucider le mystère des disparitions de la belle Donna Maria et du musicien lui-même, une heure avant l\'incendie qui ravagea sa demeure.', 1, 1, 0, 0, 60, 'rooms/default.jpg', 0, NULL, '2018-07-31 04:41:18', '2018-07-31 04:41:18', 24, 'Snow, Saol, Julie, Kaena, Myriam', 58, 1, NULL, NULL, NULL, 0, 0, 0),
	(46, 'Le cabinet de curiosité', 'Enquète', 'Votre ami, le collectionneur un peu fou Edwin Volkenberg, vient de vous envoyer un étonnant message : "prends le premier avion et rejoins-moi vite à mon cabinet, j\'ai fait une trouvaille qui pourrait remettre en cause l\'humanité entière ! Je ne peux rien te dire avant ta venue, c\'est trop risqué."', 2, 6, 3, 0, 60, 'rooms/default.jpg', 0, '2018-08-07 11:11:28', '2018-07-31 04:45:23', '2018-07-31 04:45:23', 5, 'Snow, Saol', 55, 1, NULL, NULL, NULL, 0, 0, 0),
	(47, 'Contamination', 'sauver la terre d\'un virus', 'Voilà près de deux ans que le virus IB7A-H sévit. Ceux qui ont eu la chance de survivre à cette pandémie errent à la recherche de quoi survivre.  ', 2, 6, 3, 0, 60, 'rooms/default.jpg', 0, NULL, '2018-07-31 04:46:40', '2018-07-31 04:46:40', 5, 'Snow, Saol, Kaena', 58, 1, NULL, NULL, NULL, 0, 0, 0),
	(48, 'Le fil rouge', 'théatre / teambuilding', 'Vous devez reconstituer une scène de théatre', 0, 0, 0, 0, 60, 'rooms/default.jpg', 1, NULL, '2018-07-31 04:46:55', '2018-07-31 04:46:55', 0, 'Snow, Saol, Kaena, Julie, Myriam', 0, 0, NULL, NULL, NULL, 0, 0, 0),
	(49, 'Le vol de la sauce secrete', 'Cambriolage / cuisine', 'Gusto, grand chef étoilé, est le seul à détenir la recette de sa célèbre sauce secrète.', 3, 6, 0, 0, 60, 'rooms/default.jpg', 0, '2018-08-07 10:02:21', '2018-07-31 04:48:13', '2018-07-31 04:48:13', 27, 'Snow, Saol, Julie, Aurélie, Vanessa', 57, 1, NULL, NULL, NULL, 0, 0, 0),
	(50, 'Les joyaux de la couronne', 'cambriolage', 'Une exposition : les joyaux de la couronne et son célèbre diamant Rose.', 3, 6, 3, 0, 75, 'rooms/default.jpg', 0, '2018-08-07 11:36:28', '2018-07-31 04:59:52', '2018-07-31 04:59:52', 9, 'Snow, Saol, Céline, Julien', 70, 1, NULL, NULL, NULL, 0, 0, 0),
	(51, 'L\'enlèvement', 'Enquête', 'Nous voilà en 1959, Lise, jeune danseuse de cabaret, viens de disparaître, sa sœur vous contacte pour l\'aider à la retrouver elle et la bague qui est demandée en rançon pour la libérer. Vous avez une heure pour l\'aider à sauver Lise. Et ce que vous allez découvrir, vous ne vous y attendiez surement pas.', 3, 5, 2, 50, 60, 'rooms/default.jpg', 0, NULL, '2018-07-31 13:27:14', '2018-07-31 13:27:14', 4, 'Snow, Saol, Kalrin, Ilpadrello', 0, 0, NULL, NULL, NULL, 0, 0, 0),
	(52, 'Mission: Tresor', 'cambriolage', 'Wenn du dich für diese Mission entscheidest, wird dein Team beauftragt, einen wichtigen Gegenstand aus dem Tresor zu holen. Mit dem Öffnen der Eingangstüre werdet ihr einen Alarm auslösen. Über Funk werdet ihr mithören, wie die Einsatzkräfte näher kommen. Ihr müsst Nerven bewahren und einen anderen Ausgang finden, denn vorne ist bereits alles umstellt. Spezialagenten, euer Plan ist einfach: Rein in den Tresor – wichtigen Gegenstand aufspüren – einen anderen Ausgang (Exit) finden.', 2, 5, 2, 0, 60, 'rooms/default.jpg', 11, '2018-08-07 16:12:51', '2018-07-31 18:49:51', '2018-08-01 22:41:06', 31, 'Snow, Saol', 57, 1, NULL, NULL, NULL, 0, 0, 0),
	(53, 'Mission: Kontrollraum', 'sauver le monde', 'Du und dein Team, ihr werdet beauftragt, den alten Kontrollraum einer Forschungseinrichtung, den die Polizei vor Monaten versiegelt hat, nochmals genau zu untersuchen. Angeblich wurden dort Raketensteuerungen erforscht. Welche Gefahr lauert dort? Doch noch während ihr darüber nachgrübelt, wie ihr die Puzzleteile zusammensetzen werdet, seid ihr auch schon als unser Einsatzteam im Aufzug. Über diesen Aufzug gelangt ihr in den tief unter der Erdoberfläche gelegenen Kontrollraum.', 2, 5, 3, 0, 60, 'rooms/default.jpg', 25, '2018-08-07 16:14:27', '2018-07-31 19:07:19', '2018-07-31 19:07:19', 31, 'Snow, Saol', 59, 1, NULL, NULL, NULL, 0, 0, 5),
	(54, 'The castle', 'Médiévale', 'Membre d\'un cercle de chevaliers intrépides, votre mission est de retrouver l\'oeuf de dragon qui donne sa puissance à un roi cruel. <br>\r\nA vous de choisir de quel coté vous voulez être.', 2, 6, 2, 60, 60, 'rooms/o9wuiITf5xgiutJqzXDT9a1L1LaUYo5EUie4I6kE.jpeg', 89, '2018-08-11 00:00:00', '2018-07-31 22:12:34', '2018-08-23 21:24:51', 32, 'Snow, Saol', 39, 0, 'Très belles salles, même si à 6 cela risque d\'être serré. <br>\r\nEnigmes linéaires dans l\'ensemble mais cohérentes avec le thème. Enigmes variées.<br>\r\nPitch principale par une  bande son. Une MJ gentil mais peu impliqué ce qui se traduit malheureusement par une absence presque totale de brief et de debrief. <br> La salle est très fluide voire trop pour des joueurs avec un peu d\'expérience, à plus de 3 joueurs quelques énigmes en plus seraient les bienvenues. <br>\r\nL\'ambiance sonore est agréable, dans le thème. En conclusion c\'est une salle esthétique et logique que nous conseillons aux débutants. Pour nous, cette salle manque de challenge et d\'amusement en partie parce que tous les objets de la salle servent aux énigmes et donc tout semble une évidence.', '- l\'immersion parfaite grâce à un décor soigné et recherché<br>\r\n- une ambiance sonore agréable<br>\r\n- des énigmes dans le théme<br>', '- un acceuil sommaire et distant voir froid<br>\r\n- des énigmes trop linéaires notre gout <br>\r\n- comme il est d\'habitude chez Phobia, les photos du site peuvent spoil certains aspects de la salle <br>\r\n- un choix (but de la salle) qui n\'est pas du tout exploité<br>\r\n-peu de fouille', 4, 13, 12),
	(55, '1984', 'Big brother is watching you', 'We live in terrible times. Big Brother and his terrorist organization can see, hear and listen to anyone and anything.', 2, 6, 3, 80, 60, 'rooms/default.jpg', 1, '2018-08-19 10:40:00', '2018-08-02 03:44:51', '2018-08-02 03:44:51', 33, 'Snow, Saol, DArk, Nina', 46, 1, NULL, NULL, NULL, 0, 0, 0),
	(56, 'Heaven and Hell', 'Travel to afterlife', 'You know what?!', 2, 6, 3, 30, 60, 'rooms/default.jpg', 2, '2018-08-19 12:00:00', '2018-08-23 00:55:28', '2018-08-23 00:55:30', 33, 'Snow, Saol, Dark, Nina', 52, 1, NULL, NULL, NULL, 0, 0, 0),
	(57, 'Santa Muerte', 'Travel into the magical and mysterious realm af the lady of bones', 'Enter the wondrous realm of Santa Muerte!', 2, 6, 3, 10, 60, 'rooms/default.jpg', 5, '2018-08-19 13:00:00', '2018-08-23 00:58:47', '2018-08-23 00:59:05', 33, 'Snow, Saol, Dark, Nina', 59, 1, NULL, NULL, NULL, 0, 0, 0),
	(58, 'Mission Jailbreak', 'Escape a prison from the Wild West and save the future', 'Der Sheriff von Tombstone steckt mit dem Großgrundbesitzer Jack Greed unter einer Decke. Jack hat einer Witwe für einen Spottpreis ein Stück Land abgeluchst. Was die Frau nicht wusste: Auf diesem Land gibt es einen Zugang zu einem unterirdischen System, von dem aus ausgewählte Menschen im Falle einer Klimakatastrophe auf einen anderen Planeten gebracht werden sollen. Der hinterlistige Großgrundbesitzer ist in Besitz einer Karte mit den Koordinaten dieses Zustiegs. Sein Deal mit dem Sheriff: Er versteckt die Karte im Gefängnis von Tombstone, dafür hat er am Tag X Zugang zur neuen Welt.', 2, 6, 2, 0, 60, 'rooms/F2NgrleilnK5MTNZMhqIMECa3cdZixzqDn783K8n.png', 9, '2018-08-22 00:00:00', '2018-08-23 01:02:47', '2018-08-23 20:47:57', 31, 'Snow, Saol', 57, 0, NULL, '- on a vraiment aimé les décors <br>\r\n-certaines énigmes bien pensées et \'intégrant super bien dans le scénario <br>\r\n- des manipulations funs et surtout dans le sujet <br>\r\n- la  quantité et la fluidité des énigmes', '- un débrief plus approfondi', 0, 0, 0),
	(59, 'Die Zauberkraft des Magiers', 'Magie', 'Ihr seid die Schüler eines Zauberers und macht eine schreckliche Entdeckung! Euer Meister ist böse und ehe ihr euch verseht steht ihr ihm gegenüber und müsst euch entscheiden – zu welcher Seite wollt ihr gehören? Jetzt oder nie - das ist eure Chance! Ihr seid die Einzigen, die die bösen Pläne des Magiers durchkreuzen können! Findet 3 magische Elemente und zerstört so die Macht des Zauberers! Dazu braucht ihr Geschick, Verstand, Teamgeist - oder hilft euch am Ende vielleicht doch nur Magie?', 2, 5, 2, 0, 60, 'rooms/zBFIOIUcuUKZU8SoDLe1pLpBCnGyytPxqgt6ea4g.jpeg', 11, '2018-08-22 00:00:00', '2018-08-23 01:06:11', '2018-08-27 01:10:12', 34, 'Snow, Saol', 57, 0, NULL, NULL, NULL, 6, 15, 10);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;

-- Export de la structure de la table escape. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lvl` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_company_id_foreign` (`company_id`),
  CONSTRAINT `users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table escape.users : ~7 rows (environ)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `password`, `remember_token`, `lvl`, `active`, `created_at`, `updated_at`, `company_id`) VALUES
	(1, 'fay019', 'fay019@test.com', 'users/default.png', '$2y$10$6vN9RYpVVVvbFo31AC3ovO9NOt7ykl5CjGNNRJAydiBvssmmo.tue', 'rRRKkBot6T0c2VSm4sYny3npNXRjTLxoZm5FgOLQ43Uhg0swYbdkg2V3tGaa', 10, 1, '2018-07-24 15:35:35', '2018-08-27 11:02:16', 0),
	(2, 'nina', 'nina@test.at', 'users/girl_1.png', '$2y$10$rXxo7qf3.4URllwD7C1IRuZvBNfmAe0.VPC27G4hY8XfobYfKK.zO', 'lvWkUaiM1cY3yAVdYp18avVrX0uNYz6dUJyWlFB4uXOaZl27uYvrLdFUiqaa', 9, 1, '2018-07-24 15:35:58', '2018-08-27 12:14:30', 0),
	(3, 'bilou', 'bilou@test.at', 'users/man_1.png', '$2y$10$rm2GYBu7QBxWzAOvsMW2fOWN5gnrYtuvJrqJqyCFz2QaoHhUSP4uG', NULL, 1, 1, '2018-07-25 01:44:14', '2018-08-27 12:34:23', 0),
	(22, 'peter', 'peter@test.at', 'users/default.png', '$2y$10$QbHA.VZRAfWZoqTj6HAWTORJj47J/PO07lW1Elug.ORdYa0N7hcXe', 'Oz3Tm8N3JoSdxA12TA9CLQJemy5DBx4tHKSTRP8QiIWPjaS7noUX5AGGd7HM', 8, 1, '2018-08-24 14:01:22', '2018-08-24 14:10:35', 1),
	(44, 'admin', 'admin@admin.com', 'users/default.png', '$2y$10$vQ/MZPuqPZCe32OeiyoewuOD1C155uzrAWfU5sO4J43dAmcn3cBhq', NULL, 10, 1, '2018-08-27 05:23:27', '2018-08-27 05:23:29', 0),
	(45, 'company_admin', 'company@admin.com', 'users/default.png', '$2y$10$LYBgQ1pjpyhkZOgmllaQBeMGTMueFts9TE/YTtvLsg.3PWFLwue0G', NULL, 8, 1, '2018-08-27 05:24:24', '2018-08-27 05:24:28', 6),
	(46, 'noactive', 'no@active.com', 'users/default.png', '$2y$10$zJvuoPAkpsnCJLIUlZZzWOH8ZlFnIFyecUN2uaBsd9N3T.yVoHvRW', NULL, 1, 0, '2018-08-27 05:25:33', '2018-08-27 18:38:54', 0),
	(52, 'test01', 'test01@test.at', 'users/default.png', '$2y$10$9MAiy6KM84VKzgitSuZMm.txXNEhIETPmUIZg8ORz1QHXWS3SIAeS', NULL, 1, 0, '2018-08-27 18:44:18', '2018-08-27 18:44:18', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
