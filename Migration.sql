-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2022 at 03:30 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muertissima_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `band_members`
--

DROP TABLE IF EXISTS `band_members`;
CREATE TABLE IF NOT EXISTS `band_members` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `instruments` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `band_members`
--

INSERT INTO `band_members` (`id`, `name`, `instruments`, `created_at`) VALUES
(8, 'Matthias', 'Guitare lead', '2022-01-20 22:33:10'),
(7, 'Cédric', 'Batterie', '2022-01-20 22:33:10'),
(6, 'Simon', 'Basse / Chant', '2022-01-20 22:32:24'),
(9, 'Stéphane', 'Guitare rythmique', '2022-01-20 22:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `datasheet`
--

DROP TABLE IF EXISTS `datasheet`;
CREATE TABLE IF NOT EXISTS `datasheet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `general_info` text NOT NULL,
  `networks` text NOT NULL,
  `staff` text NOT NULL,
  `languages` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `datasheet`
--

INSERT INTO `datasheet` (`id`, `general_info`, `networks`, `staff`, `languages`) VALUES
(1, '<p><strong>Style </strong>: Trash/Death metal<br /><strong>Ann&eacute;e de formation </strong>: 2017<br /><strong>Localisation </strong>: Meulan (78)<br /><strong>Label </strong>: Music-Records</p>\r\n<p><span style=\"text-decoration: underline;\"><strong>Description</strong></span></p>\r\n<p>Muertissima est un groupe de Death m&eacute;tal de la r&eacute;gion parisienne.</p>', '<p><strong>Facebook </strong>: https://www.facebook.com/Muertissima.officiel</p>\r\n<p><strong>Youtube </strong>: https://www.youtube.com/channel/UCyYdMaPiqEB_4rwLAJ8av0w</p>\r\n<p><strong>Instagram </strong>: https://www.instagram.com/muertissima/</p>', '<ul>\r\n<li><strong>Aur&eacute;lie BENTUE-FERRER</strong>&nbsp;&ndash; Vid&eacute;aste</li>\r\n<li><strong>Flora Monod</strong> &ndash; photographe</li>\r\n<li><strong>Magdalena Nedzvedz&nbsp;</strong>&ndash; photographe</li>\r\n</ul>', '<p>Fran&ccedil;ais &amp; Anglais</p>');

-- --------------------------------------------------------

--
-- Table structure for table `patchlist`
--

DROP TABLE IF EXISTS `patchlist`;
CREATE TABLE IF NOT EXISTS `patchlist` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `input_number` int UNSIGNED NOT NULL,
  `band_member_id` int UNSIGNED NOT NULL,
  `instrument_name` varchar(255) NOT NULL,
  `microphone_type` varchar(50) NOT NULL,
  `microphone_stand_size` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patchlist`
--

INSERT INTO `patchlist` (`id`, `input_number`, `band_member_id`, `instrument_name`, `microphone_type`, `microphone_stand_size`) VALUES
(1, 1, 7, 'Grosse caisse 1', 'BETA52 / Audix D6', 'Petit'),
(2, 2, 7, 'Grosse caisse 2', 'BETA91-A', 'Non'),
(3, 3, 7, 'Caisse claire 1', 'SM57 / Audix I5', 'Petit / Grand'),
(4, 4, 7, 'Caisse claire 2', 'E604', 'Non (pince)'),
(5, 5, 7, 'Hi-hat', 'E614 / SM81', 'Grand'),
(6, 6, 7, 'Tom 1', 'E604 / Audix D2', 'Non (pince)'),
(7, 7, 7, 'Tom 2', 'E604 / Audix D2', 'Non (pince)'),
(8, 8, 7, 'OH-L', 'SM81', 'Grand'),
(9, 9, 7, 'OH-R', 'SM81', 'Grand'),
(10, 10, 6, 'Basse 1', 'DI', 'Non'),
(11, 11, 6, 'Basse 2', 'MD421 / BETA52', 'Petit'),
(12, 12, 9, 'Guitare 1', 'DI - XLR', 'Non'),
(13, 13, 9, 'Guitare 2', 'E906', 'Non'),
(14, 14, 8, 'Guitare 1', 'DI - XLR', 'Non'),
(15, 15, 8, 'Guitare 2', 'SM57', 'Petit'),
(16, 16, 6, 'Chant', 'SM57 (fourni)', 'Grand');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

DROP TABLE IF EXISTS `rider`;
CREATE TABLE IF NOT EXISTS `rider` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`id`, `title`, `content`) VALUES
(1, 'Accès & Mise en place', '<p>Merci de nous communiquer le lieu et les conditions de mise en place au minimum 1 semaine avant la date du concert.</p>\r\n<p>Si l&rsquo;&eacute;quipe se d&eacute;place en train ou en avion, merci de pr&eacute;voir un moyen de transport pour rejoindre la salle.</p>\r\n<p>Si l&rsquo;&eacute;quipe se d&eacute;place en v&eacute;hicule personnel, merci de pr&eacute;voir au minimum 2 places de parking le plus pr&egrave;s possible de la sc&egrave;ne.</p>'),
(2, 'Catering', '<p>Merci de pr&eacute;voir des bouteilles d&rsquo;eau en loge et sur sc&egrave;ne mises &agrave; disposition du groupe et du staff.</p>\r\n<p>Merci de pr&eacute;voir un repas au moins 1h30 avant le d&eacute;but du concert. Si cela n&rsquo;est pas possible, merci de mettre &agrave; disposition des encas et sandwichs en loge.</p>\r\n<p>Aucun membre du groupe n&rsquo;a de contre-indication alimentaire.</p>'),
(3, 'Installation & Balance', '<p><span style=\"text-decoration: underline;\">D&eacute;chargement</span> : 10 minutes<br /><span style=\"text-decoration: underline;\">Installation du plateau</span> : 20 minutes<br /><span style=\"text-decoration: underline;\">Balances</span> : 20 &agrave; 25 minutes<br /><span style=\"text-decoration: underline;\">Si changement de plateau</span> : 15 minutes</p>\r\n<p>Pr&eacute;voir un espace de stockage s&eacute;curis&eacute; du mat&eacute;riel proche de la sc&egrave;ne.</p>'),
(4, 'Captation vidéo & photographies', '<p>Le groupe accepte d&rsquo;&ecirc;tre film&eacute; et pris en photo par une personne repr&eacute;sentant la salle.</p>\r\n<p>Il est possible que notre photographe se d&eacute;place, il devra pouvoir acc&eacute;der librement &agrave; la sc&egrave;ne dans la mesure o&ugrave; il ne g&ecirc;ne pas le bon d&eacute;roulement du concert.</p>'),
(5, 'Accueil du groupe', '<p>Merci de pr&eacute;voir au moins une personne inform&eacute;e sur le d&eacute;roulement de la journ&eacute;e afin d&rsquo;accueillir et d&rsquo;informer l&rsquo;&eacute;quipe au moment de son arriv&eacute;e.</p>\r\n<p>Merci de pr&eacute;voir le nombre de pass n&eacute;cessaires d&eacute;cid&eacute; en amont afin de faciliter l&rsquo;installation de chacun.</p>\r\n<p>Une feuille de route d&eacute;taillant le d&eacute;roulement de la journ&eacute;e sera remise au r&eacute;gisseur du groupe. Elle doit contenir les &eacute;tapes attendues et leurs horaires (installation, balance, repas, etc.)</p>'),
(6, 'Hébergement', '<p>Si le groupe et son staff doivent dormir sur place en raison d&rsquo;une distance trop importante, il faudra r&eacute;server des h&eacute;bergements.</p>\r\n<p>Le nombre de chambres sera &agrave; d&eacute;finir avec l&rsquo;organisateur en amont. Des places de parking devront aussi &ecirc;tre mises &agrave; disposition si le d&eacute;placement s&rsquo;est effectu&eacute; en voiture.</p>'),
(7, 'Loges', '<p>Des loges devront &ecirc;tre mises &agrave; disposition avec &eacute;clairage, tables, chaises, toilettes, lumi&egrave;res, miroirs, etc. Cet espace doit pouvoir fermer &agrave; cl&eacute; et donc &ecirc;tre s&eacute;curis&eacute;.</p>'),
(8, 'Merchandising', '<p>Nos CD et autres merchandisings pourront &ecirc;tre vendus pendant ou &agrave; la fin du concert, par l&rsquo;un de nos membres ou une personne que nous aurons d&eacute;sign&eacute;e.</p>\r\n<p>Merci de pr&eacute;voir un emplacement visible et &eacute;clair&eacute; accompagn&eacute; d&rsquo;une petite table &agrave; l&rsquo;entr&eacute;e de la salle.</p>'),
(9, 'Invitations', '<p>Le groupe peut &ecirc;tre amen&eacute; &agrave; demander quelques invitations, celles-ci seront r&eacute;clam&eacute;es au pr&eacute;alable &agrave; l&rsquo;organisateur.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

DROP TABLE IF EXISTS `stuff`;
CREATE TABLE IF NOT EXISTS `stuff` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `section_id` int UNSIGNED NOT NULL,
  `band_member_id` int UNSIGNED DEFAULT NULL,
  `instrument_name` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stuff`
--

INSERT INTO `stuff` (`id`, `section_id`, `band_member_id`, `instrument_name`, `content`) VALUES
(1, 1, 6, NULL, '<ul>\r\n<li>1 basse Cort signature Gene Simmons</li>\r\n<li>1 micro chant SM57</li>\r\n<li>1 p&eacute;dale d\'overdrive BOSS</li>\r\n<li>1 cab 4x10 basse entr&eacute;e jack HP</li>\r\n<li>1 t&ecirc;te d\'ampli basse Hartke 350W</li>\r\n</ul>'),
(6, 1, 7, NULL, '<ul>\r\n<li>1 batterie compl&egrave;te Sonor Prolite - <strong><span style=\"color: #ba372a;\">Pas de pr&ecirc;t</span></strong> :\r\n<ul>\r\n<li>3 pieds de cymbale pearl</li>\r\n<li>1 pied de charley iron cobra</li>\r\n<li>1 rack tom 12&rdquo;</li>\r\n<li>1 floor tom 16&rdquo;</li>\r\n<li>1 grosse caisse 22&rdquo;</li>\r\n<li>1 caisse claire 14&rdquo;</li>\r\n<li>3 cymbales (+ charley) zildjan k</li>\r\n<li>1 double-p&eacute;dale DW9000</li>\r\n<li>1 tabouret pearl roadster</li>\r\n<li>1 tapis pearl crash pad</li>\r\n</ul>\r\n</li>\r\n</ul>'),
(7, 1, 8, NULL, '<ul>\r\n<li>1 guitare Schecter Hellraiser C1 Black Cherry</li>\r\n<li>1 cab guitare 2x10</li>\r\n<li>1 t&ecirc;te d\'ampli guitare Engl</li>\r\n</ul>'),
(8, 1, 9, NULL, '<ul>\r\n<li>1 guitare BC rich Warlock 7 cordes</li>\r\n<li>1 guitare BC rich Warlock 6 cordes</li>\r\n<li>1 stand de guitare double</li>\r\n<li>1 cab guitare 4x10</li>\r\n<li>1 t&ecirc;te d\'ampli guitare Peavey 5210</li>\r\n</ul>'),
(9, 2, NULL, 'Batterie (plateau commun)', '<ul>\r\n<li>&Eacute;l&eacute;ments\r\n<ul>\r\n<li>1 grosse caisse</li>\r\n<li>1 tom alto</li>\r\n<li>1 tom basse</li>\r\n<li>3 pieds de cymbales (min 2 perches + 1 droit)</li>\r\n<li>1 pied de charley &agrave; embase d&eacute;brayable <br />(si possible, pour la double-pedale)</li>\r\n<li>1 tabouret r&eacute;glable</li>\r\n<li>1 tapis</li>\r\n</ul>\r\n</li>\r\n<li>Micros\r\n<ul>\r\n<li>1 micro rack tom E604 / Audix D2</li>\r\n<li>1 micro floor tom E604 / Audix D2</li>\r\n<li>1 micro grosse caisse BETA52 / Audix D6</li>\r\n<li>1 micro grosse caisse 2 BETA91-A</li>\r\n<li>1 micro caisse claire SM57 /Audix I5</li>\r\n<li>1 micro caisse claire timbre E604</li>\r\n<li>1 micro charley E614 / SM81</li>\r\n<li>1 micro OHL SM81</li>\r\n<li>1 micro OHR SM81</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<p style=\"padding-left: 40px;\"><span style=\"color: #e67e23;\"><em>Caisse-claire, cymbales et double-p&eacute;dale fournis si batterie commune</em></span></p>'),
(10, 2, NULL, 'Guitares & basse', '<ul>\r\n<li>1 cab 4x10 pour guitare</li>\r\n<li>2 stands de guitare et basse</li>\r\n<li>1 micro ampli basse MD421 / BETA52</li>\r\n</ul>'),
(11, 2, NULL, 'Autres', '<ul>\r\n<li>4 prises &eacute;lectriques minimum, 220V</li>\r\n<li>1 set de lumi&egrave;res et &eacute;clairage sc&egrave;ne</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `stuff_sections`
--

DROP TABLE IF EXISTS `stuff_sections`;
CREATE TABLE IF NOT EXISTS `stuff_sections` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stuff_sections`
--

INSERT INTO `stuff_sections` (`id`, `name`) VALUES
(1, 'Matériel apporté par le groupe'),
(2, 'Matériel à fournir');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
