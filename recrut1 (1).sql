-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 30 Avril 2015 à 21:48
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `recrut1`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
  `ANNONCE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ANNONCE_NUM` varchar(255) NOT NULL,
  `ANNONCE_TITRE` varchar(100) NOT NULL,
  `ANNONCE_DESCRIPTION` text NOT NULL,
  `ANNONCE_LIEN` varchar(255) NOT NULL,
  `ANNONCE_DATE_DEB` date NOT NULL,
  `ANNONCE_DATE_FIN` date NOT NULL,
  `ANNONCE_DATE_CREATION` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ANNONCE_AGE` int(11) NOT NULL,
  `ANNONCE_DELAI_AGE` date NOT NULL,
  `SECTEUR` varchar(50) NOT NULL,
  `ETAT` varchar(50) NOT NULL DEFAULT 'EN COURS',
  `DEPARTEMENT` int(11) NOT NULL,
  PRIMARY KEY (`ANNONCE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`ANNONCE_ID`, `ANNONCE_NUM`, `ANNONCE_TITRE`, `ANNONCE_DESCRIPTION`, `ANNONCE_LIEN`, `ANNONCE_DATE_DEB`, `ANNONCE_DATE_FIN`, `ANNONCE_DATE_CREATION`, `ANNONCE_AGE`, `ANNONCE_DELAI_AGE`, `SECTEUR`, `ETAT`, `DEPARTEMENT`) VALUES
(1, 'N° traalaaaaa', 'Controleur Informaticien', 'slkdfjsldkfjsldk', 'downloaded_document.pdf', '2015-04-14', '2015-04-21', '2015-04-30 18:29:43', 20, '2015-04-14', '1', 'EN COURS', 1),
(2, 'sdsdfsd', 'Annonce test', 'sdsdf', 'form_preview (1).pdf', '2015-04-08', '2015-04-21', '2015-04-30 19:12:21', 50, '2015-04-01', '2', 'EN COURS', 3);

-- --------------------------------------------------------

--
-- Structure de la table `autre_formation`
--

CREATE TABLE IF NOT EXISTS `autre_formation` (
  `FORM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FORMATION_AN_DEB` varchar(11) DEFAULT NULL,
  `FORM_LIB` varchar(25) DEFAULT NULL,
  `FORM_NOM` varchar(25) DEFAULT NULL,
  `FORM_INTITULE` varchar(25) DEFAULT NULL,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  `AUTRE_FORMATION_DIPLOME_FICHIER` varchar(255) NOT NULL,
  PRIMARY KEY (`FORM_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `autre_formation`
--

INSERT INTO `autre_formation` (`FORM_ID`, `FORMATION_AN_DEB`, `FORM_LIB`, `FORM_NOM`, `FORM_INTITULE`, `FK_CANDIDAT_ID`, `AUTRE_FORMATION_DIPLOME_FICHIER`) VALUES
(1, '2011', 'vcbcbcb', 'bdd', 'rtrt', 3, '8ffb83c31a2f12f8942971c5a9078a11.jpg'),
(2, '2014', 'gikghkg', 'ghkg', 'hjlhglj', 4, 'image viber.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE IF NOT EXISTS `candidat` (
  `CANDIDAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CANDIDAT_TYPE` varchar(25) NOT NULL,
  `CANDIDAT_CIVILITE` varchar(25) DEFAULT NULL,
  `CANDIDAT_NOM` varchar(25) DEFAULT NULL,
  `CANDIDAT_PRENOM` varchar(25) DEFAULT NULL,
  `CANDIDAT_MATRICULE` varchar(6) DEFAULT NULL,
  `CANDIDAT_DATE_NAISSANCE` date DEFAULT NULL,
  `CANDIDAT_LIEU_NAISSANCE` varchar(25) DEFAULT NULL,
  `CANDIDAT_NATIONALITE` varchar(25) DEFAULT NULL,
  `CANDIDAT_SIT_MAT` varchar(255) DEFAULT NULL,
  `CANDIDAT_NBRE_ENF` int(11) DEFAULT NULL,
  `CANDIDAT_ADR_PERM` varchar(100) DEFAULT NULL,
  `CANDIDAT_ADR_ACT` varchar(100) DEFAULT NULL,
  `CANDIDAT_INDICATIF` varchar(8) DEFAULT NULL,
  `CANDIDAT_NUM_TEL` varchar(20) DEFAULT NULL,
  `CANDIDAT_NUM_GSM` varchar(12) DEFAULT NULL,
  `CANDIDAT_PERMIS` varchar(25) DEFAULT NULL,
  `CANDIDAT_DEMANDE_EMPLOI` varchar(255) NOT NULL,
  `CANDIDAT_CV` varchar(255) NOT NULL,
  `CANDIDAT_CERTIFICAT_TRAVAIL` varchar(255) DEFAULT NULL,
  `CANDIDAT_PHOTO` varchar(25) NOT NULL,
  `CANDIDAT_ACTE_NAISS` varchar(255) DEFAULT NULL,
  `CANDIDAT_FICHE_FAMILLE` varchar(255) DEFAULT NULL,
  `CANDIDAT_CERTIF_NAT` varchar(255) DEFAULT NULL,
  `CANDIDAT_CERTIF_DOMICILE` varchar(255) DEFAULT NULL,
  `CANDIDAT_CERTIF_MEDICAL` varchar(255) DEFAULT NULL,
  `CANDIDAT_CASIER_JUDICIAIRE` varchar(255) DEFAULT NULL,
  `CANDIDAT_IS_FAMILLE` varchar(3) NOT NULL,
  `CANDIDAT_MOTIV_POSTE` longtext NOT NULL,
  `FK_UTIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`CANDIDAT_ID`),
  KEY `candidat_ibfk_1` (`FK_UTIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `candidat`
--

INSERT INTO `candidat` (`CANDIDAT_ID`, `CANDIDAT_TYPE`, `CANDIDAT_CIVILITE`, `CANDIDAT_NOM`, `CANDIDAT_PRENOM`, `CANDIDAT_MATRICULE`, `CANDIDAT_DATE_NAISSANCE`, `CANDIDAT_LIEU_NAISSANCE`, `CANDIDAT_NATIONALITE`, `CANDIDAT_SIT_MAT`, `CANDIDAT_NBRE_ENF`, `CANDIDAT_ADR_PERM`, `CANDIDAT_ADR_ACT`, `CANDIDAT_INDICATIF`, `CANDIDAT_NUM_TEL`, `CANDIDAT_NUM_GSM`, `CANDIDAT_PERMIS`, `CANDIDAT_DEMANDE_EMPLOI`, `CANDIDAT_CV`, `CANDIDAT_CERTIFICAT_TRAVAIL`, `CANDIDAT_PHOTO`, `CANDIDAT_ACTE_NAISS`, `CANDIDAT_FICHE_FAMILLE`, `CANDIDAT_CERTIF_NAT`, `CANDIDAT_CERTIF_DOMICILE`, `CANDIDAT_CERTIF_MEDICAL`, `CANDIDAT_CASIER_JUDICIAIRE`, `CANDIDAT_IS_FAMILLE`, `CANDIDAT_MOTIV_POSTE`, `FK_UTIL_ID`) VALUES
(3, 'Interne', 'M.', 'hgjv', NULL, NULL, '2015-04-15', 'hnkblb', 'MALGACHE', 'MARIE', 2, 'hkbgk', NULL, '994', '15238535', '7425425752', 'D', 'null_value', 'null_value', 'null_value', 'Capture1.PNG', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'Non', 'null_value', 14),
(4, 'Interne', 'M.', 'zerzer', NULL, NULL, '2015-04-08', 'arzf', 'CAMEROUNAISE', 'SEPARE', 0, 'fzerf', NULL, '374', '546548545', '241546546', 'C', 'null_value', 'null_value', 'null_value', 'image viber.jpg', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'Non', 'null_value', 15);

-- --------------------------------------------------------

--
-- Structure de la table `candidat_saisi_note`
--

CREATE TABLE IF NOT EXISTS `candidat_saisi_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adequate_form` varchar(254) NOT NULL,
  `pert_experience` varchar(254) NOT NULL,
  `compt_specific` varchar(254) NOT NULL,
  `expe_con_asecna` varchar(254) NOT NULL,
  `con_infor` varchar(254) NOT NULL,
  `motiv_comp_redact` varchar(254) NOT NULL,
  `sens_initiative` varchar(254) NOT NULL,
  `autre_critere` varchar(254) NOT NULL,
  `apt_manag_esprit` varchar(254) NOT NULL,
  `observation` varchar(254) NOT NULL,
  `FK_UTIL_ID` int(11) NOT NULL,
  `FK_annonce_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
  `COMP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COMP_LIB` text,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  `FK_ANNONCE_ID` int(11) NOT NULL,
  PRIMARY KEY (`COMP_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`COMP_ID`, `COMP_LIB`, `FK_CANDIDAT_ID`, `FK_ANNONCE_ID`) VALUES
(1, 'cvfvgjhgvf', 3, 1),
(2, 'musique, art, danse,mbalax', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `connaissances_informatiques`
--

CREATE TABLE IF NOT EXISTS `connaissances_informatiques` (
  `INFORMATIQUE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGICIELS` varchar(50) DEFAULT NULL,
  `INFORMATIQUE_NIV` varchar(50) DEFAULT NULL,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  `Type` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`INFORMATIQUE_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `connaissances_linguistiques`
--

CREATE TABLE IF NOT EXISTS `connaissances_linguistiques` (
  `LANGUE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LANGUE_NOM` varchar(50) DEFAULT NULL,
  `LANGUE_ORALE` varchar(50) NOT NULL,
  `LANGUE_ECRITE` varchar(50) NOT NULL,
  `LANGUE_LECTURE` varchar(50) NOT NULL,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  `Type` varchar(25) DEFAULT 'NORMAL',
  PRIMARY KEY (`LANGUE_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `connaissances_linguistiques`
--

INSERT INTO `connaissances_linguistiques` (`LANGUE_ID`, `LANGUE_NOM`, `LANGUE_ORALE`, `LANGUE_ECRITE`, `LANGUE_LECTURE`, `FK_CANDIDAT_ID`, `Type`) VALUES
(1, 'Francais', 'Moyen', 'Base', 'Base', 3, 'NORMAL');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(254) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`id`, `libelle`) VALUES
(1, 'Ressource Humaine'),
(2, 'Comptabilité'),
(3, 'Service technique'),
(4, 'Mecanique');

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE IF NOT EXISTS `dossier` (
  `DOSSIER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOSSIER_NOM` text NOT NULL,
  `DOSSIER_LIEN` text NOT NULL,
  `FK_CANDIDAT_ID` int(11) NOT NULL,
  `Type_doss` varchar(255) NOT NULL,
  PRIMARY KEY (`DOSSIER_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `dossier`
--

INSERT INTO `dossier` (`DOSSIER_ID`, `DOSSIER_NOM`, `DOSSIER_LIEN`, `FK_CANDIDAT_ID`, `Type_doss`) VALUES
(1, 'Demande_emploi', 'Demande_emploi1.jpg', 3, 'Demande_emploi'),
(2, 'Cv', 'Cv1.jpg', 3, 'Cv'),
(3, 'Demande_emploi', 'Demande_emploi2.jpg', 4, 'Demande_emploi'),
(4, 'Cv', 'Cv3.jpg', 4, 'Cv');

-- --------------------------------------------------------

--
-- Structure de la table `experience_professionnelle`
--

CREATE TABLE IF NOT EXISTS `experience_professionnelle` (
  `EXP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EXP_ENT_NOM` varchar(100) DEFAULT NULL,
  `EXP_SEC_ACT` varchar(100) DEFAULT NULL,
  `EXP_POSTE` varchar(100) DEFAULT NULL,
  `EXP_DEBUT_TRAVAIL` text,
  `EXP_FIN_TRAVAIL` text,
  `EXP_SALAIRE` int(11) DEFAULT NULL,
  `EXP_NBRE_PERS_SORD` int(11) DEFAULT NULL,
  `EXP_TACHE` tinytext,
  `EXP_MOTIF_DEP` tinytext,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`EXP_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `experience_professionnelle`
--

INSERT INTO `experience_professionnelle` (`EXP_ID`, `EXP_ENT_NOM`, `EXP_SEC_ACT`, `EXP_POSTE`, `EXP_DEBUT_TRAVAIL`, `EXP_FIN_TRAVAIL`, `EXP_SALAIRE`, `EXP_NBRE_PERS_SORD`, `EXP_TACHE`, `EXP_MOTIF_DEP`, `FK_CANDIDAT_ID`) VALUES
(1, 'gdfdf', 'nbbnbn', 'bdb', '2014##6', '2008##5', NULL, NULL, 'ufufuy', 'vcbvc', 3);

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE IF NOT EXISTS `famille` (
  `FAMILLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FAMILLE_NOM` varchar(50) NOT NULL,
  `FAMILLE_PRENOM` varchar(50) NOT NULL,
  `FAMILLE_STRUCTURE` varchar(20) NOT NULL,
  `FAMILLE_DEGRE` varchar(255) NOT NULL,
  `FK_CANDIDAT_ID` int(11) NOT NULL,
  PRIMARY KEY (`FAMILLE_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `FONCTION_ID` int(11) NOT NULL,
  `FONCTION_LIB` varchar(25) NOT NULL,
  `FONCTION_DESC` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `FORMATION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FORMATION_AN_DEB` varchar(255) DEFAULT NULL,
  `FORMATION_AN_FIN` varchar(255) DEFAULT NULL,
  `ETABLISSEMENT_NOM` varchar(25) DEFAULT NULL,
  `FORMATION_LIEU` varchar(25) DEFAULT NULL,
  `FORMATION_DIPLOME` varchar(25) DEFAULT NULL,
  `FORMATION_DOM_PRINC_ETUD` varchar(25) DEFAULT NULL,
  `FK_CANDIDAT_ID` int(11) NOT NULL,
  `FORMATION_CYCLE` text NOT NULL,
  `FORMATION_DIPLOME_FICHIER` longtext,
  PRIMARY KEY (`FORMATION_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`FORMATION_ID`, `FORMATION_AN_DEB`, `FORMATION_AN_FIN`, `ETABLISSEMENT_NOM`, `FORMATION_LIEU`, `FORMATION_DIPLOME`, `FORMATION_DOM_PRINC_ETUD`, `FK_CANDIDAT_ID`, `FORMATION_CYCLE`, `FORMATION_DIPLOME_FICHIER`) VALUES
(1, '2013', '2015', 'vvccv', 'fsdfsd', 'DUT, BTS, Bac + 2', 'gfghfh', 3, 'Secondaires', 'Capture1.PNG'),
(2, '2012', '2013', 'vvccv', 'fsdfsd', 'DESS, DEA, Master 2,Ingén', 'bgfgb', 4, 'Secondaires', 'Capture1.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `lettre_motivation`
--

CREATE TABLE IF NOT EXISTS `lettre_motivation` (
  `LETTRE_MOTIVATION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LETTRE_MOTIVATION` text,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  `FK_ANNONCE_ID` int(11) NOT NULL,
  PRIMARY KEY (`LETTRE_MOTIVATION_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `lettre_motivation`
--

INSERT INTO `lettre_motivation` (`LETTRE_MOTIVATION_ID`, `LETTRE_MOTIVATION`, `FK_CANDIDAT_ID`, `FK_ANNONCE_ID`) VALUES
(1, 'gfhggh', 3, 1),
(2, 'je suis une personne hyper bizarre ghkfhegrte', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(3) NOT NULL,
  `nom_pays` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`,`nom_pays`),
  KEY `code_2` (`code`,`nom_pays`),
  KEY `code_3` (`code`,`nom_pays`),
  KEY `code_4` (`code`,`nom_pays`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=243 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `code`, `nom_pays`) VALUES
(184, 963, 'SYRIE'),
(183, 268, 'SWAZILAND'),
(25, 591, 'BOLIVIE'),
(26, 387, 'BOSNIE-HERZEGOVINE'),
(27, 267, 'BOTSWANA'),
(28, 55, 'BRESIL'),
(29, 673, 'BRUNEI'),
(30, 359, 'BULGARIE'),
(31, 226, 'BURKINA FASO'),
(32, 257, 'BURUNDI'),
(33, 855, 'CAMBODGE'),
(34, 237, 'CAMEROUN'),
(35, 1, 'CANADA'),
(36, 34, 'CANARIES'),
(37, 238, 'CAP VERT'),
(38, 236, 'CENTAFRIQUE'),
(39, 56, 'CHILI'),
(40, 86, 'CHINE'),
(41, 357, 'CHYPRE'),
(42, 57, 'COLOMBIE'),
(43, 269, 'COMORES'),
(44, 242, 'CONGO BRAZZAVILLE'),
(45, 243, 'CONGO KINSHASA'),
(46, 850, 'COREE DU NORD'),
(47, 82, 'COREE DU SUD'),
(48, 506, 'COSTA RICA'),
(49, 225, 'COTE D IVOIRE'),
(50, 385, 'CROATIE'),
(51, 53, 'CUBA'),
(52, 45, 'DANEMARK'),
(53, 253, 'DJIBOUTI'),
(54, 1, 'DOMINIQUE'),
(55, 20, 'EGYPTE'),
(56, 971, 'EMIRATS ARABE UNIS'),
(57, 593, 'EQUATEUR'),
(58, 291, 'ERYTHREE'),
(59, 34, 'ESPAGNE'),
(60, 372, 'ESTONIE'),
(61, 1, 'ETATS-UNIS'),
(62, 251, 'ETHIOPIE'),
(63, 679, 'FIDJI (Iles)'),
(64, 358, 'FINLANDE'),
(65, 33, 'FRANCE'),
(66, 241, 'GABON'),
(67, 220, 'GAMBIE'),
(68, 995, 'GEORGIE'),
(69, 233, 'GHANA'),
(70, 30, 'GRECE'),
(71, 1, 'GRENADE'),
(72, 590, 'GUADELOUPE'),
(73, 502, 'GUATEMALA'),
(74, -1437, 'GUERNESEY'),
(75, 245, 'GUINEE BISSAU'),
(76, 240, 'GUINEE EQUATORIALE'),
(77, 224, 'GUINEE'),
(78, 592, 'GUYANE'),
(79, 509, 'HAITI'),
(80, 504, 'HONDURAS'),
(81, 36, 'HONGRIE'),
(82, 44, 'ILE DE MAN'),
(83, 230, 'ILE MAURICE'),
(84, 262, 'ILE DE LA REUNION'),
(85, 682, 'ILES COOK'),
(86, 91, 'INDE'),
(87, 62, 'INDONESIE'),
(88, 964, 'IRAK'),
(89, 98, 'IRAN'),
(90, 353, 'IRLANDE'),
(91, 354, 'ISLANDE'),
(92, 972, 'ISRAEL'),
(93, 39, 'ITALIE'),
(94, 1, 'JAMAIQUE'),
(95, 81, 'JAPON'),
(96, -1490, 'JERSEY'),
(97, 962, 'JORDANIE'),
(98, 7, 'KAZAKHSTAN'),
(99, 254, 'KENYA'),
(100, 996, 'KIRGHIZISTAN'),
(101, 686, 'KIRIBATI'),
(102, 381, 'KOSOVO'),
(103, 965, 'KOWEIT'),
(104, 856, 'LAOS'),
(105, 266, 'LESOTHO'),
(106, 371, 'LETTONIE'),
(107, 961, 'LIBAN'),
(108, 231, 'LIBERIA'),
(109, 218, 'LIBYE'),
(110, 423, 'LIECHTENSTEIN'),
(111, 370, 'LITUANIE'),
(112, 352, 'LUXEMBOURG'),
(113, 389, 'MACEDOINE'),
(114, 261, 'MADAGASCAR'),
(115, 60, 'MALAISIE'),
(116, 265, 'MALAWI'),
(117, 960, 'MALDIVES'),
(118, 223, 'MALI'),
(119, 356, 'MALTE'),
(120, 212, 'MAROC'),
(121, 692, 'MARSHALL (ILES)'),
(122, 596, 'MARTINIQUE'),
(123, 222, 'MAURITANIE'),
(124, 52, 'MEXIQUE'),
(125, 961, 'MICRONESIE'),
(126, 373, 'MOLDAVIE'),
(127, 377, 'MONACO'),
(128, 976, 'MONGOLIE'),
(129, 382, 'MONTENEGRO'),
(130, 258, 'MOZAMBIQUE'),
(131, 95, 'MYANMAR (BIRMANIE)'),
(132, 264, 'NAMIBIE'),
(133, 674, 'NAURU'),
(134, 977, 'NEPAL'),
(135, 505, 'NICARAGUA'),
(136, 227, 'NIGER'),
(137, 234, 'NIGERIA'),
(138, 86, 'NIUE'),
(1, 93, 'AFGHANISTAN'),
(2, 27, 'AFRIQUE DU SUD'),
(3, 355, 'ALBANIE'),
(4, 213, 'ALGERIE'),
(5, 49, 'ALLEMAGNE'),
(6, 376, 'ANDORRE'),
(7, 244, 'ANGOLA'),
(8, 1, 'ANTIGUA ET BARBUDA'),
(9, 966, 'ARABIE SAOUDITE'),
(10, 54, 'ARGENTINE'),
(11, 374, 'ARMENIE'),
(12, 61, 'AUSTRALIE'),
(13, 43, 'AUTRICHE'),
(14, 994, 'AZERBAIDJAN'),
(15, 1, 'BAHAMAS'),
(16, 973, 'BAHREIN'),
(17, 871, 'BALEARES'),
(18, 880, 'BANGLADESH'),
(19, 1, 'BARBADE'),
(20, 32, 'BELGIQUE'),
(21, 501, 'BELIZE'),
(22, 229, 'BENIN'),
(23, 975, 'BHOUTAN'),
(24, 375, 'BIELORUSSIE'),
(139, 47, 'NORVEGE'),
(140, 687, 'NOUVELLE CALEDONIE'),
(141, 64, 'NOUVELLE ZELANDE'),
(142, 968, 'OMAN'),
(143, 256, 'OUGANDA'),
(144, 998, 'OUZBEKISTAN'),
(145, 92, 'PAKISTAN'),
(146, 680, 'PALAOS'),
(147, 507, 'PANAMA'),
(148, 675, 'PAPOUASIE NOUVELLE GUINEE'),
(149, 595, 'PARAGUAY'),
(150, 31, 'PAYS BAS'),
(151, 51, 'PEROU'),
(152, 63, 'PHILIPPINES'),
(153, 48, 'POLOGNE'),
(154, 689, 'POLYNESIE'),
(155, 351, 'PORTUGAL'),
(156, 974, 'QATAR'),
(157, 1, 'REPUBLIQUE DOMINICAINE'),
(158, 420, 'REPUBLIQUE TCHEQUE'),
(159, 40, 'ROUMANIE'),
(160, 44, 'ROYAUME-UNI'),
(161, 7, 'RUSSIE'),
(162, 250, 'RWANDA'),
(163, 1, 'SAINT CHRISTOPHE ET NIEVES'),
(164, 590, 'SAINT MARTIN'),
(165, 53, 'SAINT VINCENT LES GRENADINES'),
(166, 1, 'SAINTE LUCIE'),
(167, 503, 'SALVADOR'),
(168, 685, 'SAMOA'),
(169, 239, 'SAO TOME-ET-PRINCIPE'),
(170, 221, 'SENEGAL'),
(171, 381, 'SERBIE'),
(172, 248, 'SEYCHELLES'),
(173, 232, 'SIERRA LEONE'),
(174, 65, 'SINGAPOUR'),
(175, 421, 'SLOVAQUIE'),
(176, 386, 'SLOVENIE'),
(177, 252, 'SOMALIE'),
(178, 249, 'SOUDAN'),
(179, 94, 'SRI LANKA'),
(180, 46, 'SUEDE'),
(181, 41, 'SUISSE'),
(182, 597, 'SURINAME'),
(185, 992, 'TADJIKISTAN'),
(186, 886, 'TAIWAN'),
(187, 255, 'TANZANIE'),
(188, 235, 'TCHAD'),
(189, 66, 'THAILANDE'),
(190, 670, 'TIMOR ORIENTAL'),
(191, 228, 'TOGO'),
(192, 676, 'TONGA'),
(193, 1, 'TRINITE TOBAGO'),
(194, 216, 'TUNISIE'),
(195, 993, 'TURKMENISTAN'),
(196, 90, 'TURQUIE'),
(197, 688, 'TUVALU'),
(198, 380, 'UKRAINE'),
(199, 598, 'URUGUAY'),
(200, 678, 'VANUATU'),
(201, 39, 'VATICAN'),
(202, 58, 'VENEZUELA'),
(203, 84, 'VIETNAM'),
(204, 967, 'YEMEN'),
(205, 260, 'ZAMBIE'),
(206, 263, 'ZIMBABWE');

-- --------------------------------------------------------

--
-- Structure de la table `ponderation`
--

CREATE TABLE IF NOT EXISTS `ponderation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adequate_form` varchar(254) NOT NULL,
  `pert_experience` varchar(254) NOT NULL,
  `compt_specific` varchar(254) NOT NULL,
  `expe_con_asecna` varchar(254) NOT NULL,
  `con_infor` varchar(254) NOT NULL,
  `motiv_comp_redact` varchar(254) NOT NULL,
  `sens_initiative` varchar(254) NOT NULL,
  `autre_critere` varchar(254) NOT NULL,
  `apt_manag_esprit` varchar(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `postulation`
--

CREATE TABLE IF NOT EXISTS `postulation` (
  `postulation_id` int(11) NOT NULL AUTO_INCREMENT,
  `postulation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FK_UTIL_ID` int(11) NOT NULL,
  `postulation_age_candidat` int(11) NOT NULL,
  `FK_annonce_id` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `retenu` varchar(254) NOT NULL,
  `preselect` varchar(3) NOT NULL DEFAULT 'NON',
  PRIMARY KEY (`postulation_id`),
  KEY `FK_util_id` (`FK_UTIL_ID`),
  KEY `FK_lettre_motivation_id` (`postulation_age_candidat`),
  KEY `FK_annonce_id` (`FK_annonce_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `postulation`
--

INSERT INTO `postulation` (`postulation_id`, `postulation_date`, `FK_UTIL_ID`, `postulation_age_candidat`, `FK_annonce_id`, `note`, `retenu`, `preselect`) VALUES
(1, '2015-04-30 00:00:00', 14, 20, 1, 0, '', 'NON');

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE IF NOT EXISTS `profils` (
  `PROFIL_ID` int(11) NOT NULL,
  `PROFIL_NOM` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `qualites`
--

CREATE TABLE IF NOT EXISTS `qualites` (
  `QUAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `QUAL_LIB` text,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`QUAL_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `qualites`
--

INSERT INTO `qualites` (`QUAL_ID`, `QUAL_LIB`, `FK_CANDIDAT_ID`) VALUES
(1, 'fhgfd', 3);

-- --------------------------------------------------------

--
-- Structure de la table `realisation`
--

CREATE TABLE IF NOT EXISTS `realisation` (
  `REAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `REAL_LIB` varchar(255) DEFAULT NULL,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`REAL_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `realisation`
--

INSERT INTO `realisation` (`REAL_ID`, `REAL_LIB`, `FK_CANDIDAT_ID`) VALUES
(1, 'hgjghgjhg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `reference`
--

CREATE TABLE IF NOT EXISTS `reference` (
  `REF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `REF_NOM_ENT` text,
  `REF_PERS_CONT` text,
  `REF_POST_OCC` text,
  `REF_TEL` text,
  `REF_EMAIL` text,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`REF_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `reference`
--

INSERT INTO `reference` (`REF_ID`, `REF_NOM_ENT`, `REF_PERS_CONT`, `REF_POST_OCC`, `REF_TEL`, `REF_EMAIL`, `FK_CANDIDAT_ID`) VALUES
(1, 'dgdgdg', '254454', 'hlkh', '5444', 'gyggg@fhg.sn', 3);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE IF NOT EXISTS `secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `secteur`
--

INSERT INTO `secteur` (`id`, `domaine`) VALUES
(1, 'INFORMATIQUE'),
(2, 'COMPTABILITE');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `UTIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UTIL_LOGIN` varchar(255) DEFAULT NULL,
  `UTIL_MDP` varchar(255) DEFAULT NULL,
  `UTIL_EMAIL` varchar(50) DEFAULT NULL,
  `UTIL_ROLE` varchar(8) NOT NULL DEFAULT '0',
  `active` varchar(3) NOT NULL DEFAULT 'non',
  `token` text NOT NULL,
  PRIMARY KEY (`UTIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`UTIL_ID`, `UTIL_LOGIN`, `UTIL_MDP`, `UTIL_EMAIL`, `UTIL_ROLE`, `active`, `token`) VALUES
(13, 'root@root.com', 'seZkF33BiWXnY', 'root@root.com', '1', 'oui', 'd356c9ce160bc70870652717816e36ee188d485a'),
(14, 'user@user.com', 'seZkF33BiWXnY', 'user@user.com', '0', 'oui', '7e6f4cf6ca1bf15e56552308ff423db37222024b'),
(15, 'aaaa@aaaa.com', 'seqRWCk1sqMw.', 'aaaa@aaaa.com', '0', 'oui', 'c4d307adbff4d2d03619a8b0a4d78ca31b8ea268');

-- --------------------------------------------------------

--
-- Structure de la table `validation_cadidature`
--

CREATE TABLE IF NOT EXISTS `validation_cadidature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etape` int(11) NOT NULL,
  `date_enreg` date NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `id_candidat` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `validation_cadidature`
--

INSERT INTO `validation_cadidature` (`id`, `etape`, `date_enreg`, `id_annonce`, `id_candidat`, `libelle`) VALUES
(25, 1, '2015-04-30', 1, 3, 'Coordonnee Personnelle'),
(26, 2, '2015-04-30', 1, 3, 'Formation'),
(27, 3, '2015-04-30', 1, 3, 'Travail fin etude'),
(28, 4, '2015-04-30', 1, 3, 'Autre Formation'),
(29, 5, '2015-04-30', 1, 3, 'Experience professionnelle'),
(30, 7, '2015-04-30', 1, 3, 'Linguistique'),
(31, 8, '2015-04-30', 1, 3, 'Competence'),
(32, 9, '2015-04-30', 1, 3, 'Lettre_motivation'),
(33, 10, '2015-04-30', 1, 3, 'References'),
(34, 11, '2015-04-30', 1, 3, 'Piece jointe'),
(35, 8, '0000-00-00', 2, 3, 'Competence'),
(36, 9, '2015-04-30', 2, 3, 'Lettre_motivation'),
(37, 1, '2015-04-30', 1, 4, 'Coordonnee Personnelle'),
(38, 2, '2015-04-30', 1, 4, 'Formation'),
(39, 4, '2015-04-30', 1, 4, 'Autre Formation'),
(40, 11, '2015-04-30', 1, 4, 'Piece jointe');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `autre_formation`
--
ALTER TABLE `autre_formation`
  ADD CONSTRAINT `autre_formation_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `candidat_ibfk_1` FOREIGN KEY (`FK_UTIL_ID`) REFERENCES `utilisateurs` (`UTIL_ID`);

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `connaissances_informatiques`
--
ALTER TABLE `connaissances_informatiques`
  ADD CONSTRAINT `connaissances_informatiques_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `connaissances_linguistiques`
--
ALTER TABLE `connaissances_linguistiques`
  ADD CONSTRAINT `connaissances_linguistiques_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD CONSTRAINT `dossier_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `experience_professionnelle`
--
ALTER TABLE `experience_professionnelle`
  ADD CONSTRAINT `experience_professionnelle_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `famille`
--
ALTER TABLE `famille`
  ADD CONSTRAINT `famille_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `lettre_motivation`
--
ALTER TABLE `lettre_motivation`
  ADD CONSTRAINT `lettre_motivation_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD CONSTRAINT `postulation_ibfk_1` FOREIGN KEY (`FK_UTIL_ID`) REFERENCES `utilisateurs` (`UTIL_ID`);

--
-- Contraintes pour la table `qualites`
--
ALTER TABLE `qualites`
  ADD CONSTRAINT `qualites_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

--
-- Contraintes pour la table `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `reference_ibfk_1` FOREIGN KEY (`FK_CANDIDAT_ID`) REFERENCES `candidat` (`CANDIDAT_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
