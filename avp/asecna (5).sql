-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 24 Mars 2015 à 23:04
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `asecna`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`ANNONCE_ID`, `ANNONCE_NUM`, `ANNONCE_TITRE`, `ANNONCE_DESCRIPTION`, `ANNONCE_LIEN`, `ANNONCE_DATE_DEB`, `ANNONCE_DATE_FIN`, `ANNONCE_DATE_CREATION`, `ANNONCE_AGE`, `ANNONCE_DELAI_AGE`, `SECTEUR`, `ETAT`, `DEPARTEMENT`) VALUES
(3, 'reffff', 'sddzzzdd', 'zzrfrfttyuyjyyth', 'Course 4_Doc 1 Intro to Template Programming(PPT).pdf', '2015-03-11', '2015-04-30', '2015-03-23 23:31:17', 29, '2015-06-30', '1', 'EN COURS', 1),
(4, 'yfduyuygu142', 'uuyml', 'ezezezzzilooomomomoo123654789', 'Course 4_Doc 1 Intro to Template Programming(PPT).pdf', '2015-03-04', '2015-03-18', '2015-03-23 23:31:23', 32, '2015-05-09', '1', 'EN COURS', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `autre_formation`
--

INSERT INTO `autre_formation` (`FORM_ID`, `FORMATION_AN_DEB`, `FORM_LIB`, `FORM_NOM`, `FORM_INTITULE`, `FK_CANDIDAT_ID`, `AUTRE_FORMATION_DIPLOME_FICHIER`) VALUES
(2, '2015', 'DEART', 'Dakar', 'gestion de personnel', 21, 'arrow.png'),
(8, '2015', 'derty', 'dsezrtt', 'dertgggg', 22, 'ai4.png'),
(9, '2015', 'fdgteyfyged', 'bgqtyfyfya', 'haytyftyeaf', 22, '43.png'),
(11, '2015', 'fdrdftfyth', 'gcysytfyf', 'yfuyfuyf&ug', 22, '43.png'),
(12, '2015', 'fdgftfeg', 'gytzfytfzyt', 'hyzcyf&zy', 22, '43.png'),
(14, '2013', 'dddd', 'ddd', 'dddd', 22, 'logo-30.-04-2012.png'),
(16, '2011', 'feffggfe', 'dzasazsdaz', 'zzaaaaeaz', 23, 'captcha.png'),
(17, '2015', 'zzsssd', 'ffsfsf', 'wgqertet', 24, 'ajouter.png'),
(19, '2009', 'dfefefefe', 'sscsdd7777', 'fzzzdzzdzzzz47477', 26, 'ajouter.png'),
(20, '2014', 'ssdze', 'zzzezzd', 'zzdzefezf', 26, 'ajouter.png'),
(21, '2012', 'fzezefeferf', 'zdzeerfrefer', 'egtrrttt', 26, 'back_disabled.png'),
(22, '2012', 'vedfrfrgr', 'ezzeferfefer', 'zdfzfzeezzedf', 26, 'ajouter.png');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `candidat`
--

INSERT INTO `candidat` (`CANDIDAT_ID`, `CANDIDAT_TYPE`, `CANDIDAT_CIVILITE`, `CANDIDAT_NOM`, `CANDIDAT_PRENOM`, `CANDIDAT_MATRICULE`, `CANDIDAT_DATE_NAISSANCE`, `CANDIDAT_LIEU_NAISSANCE`, `CANDIDAT_NATIONALITE`, `CANDIDAT_SIT_MAT`, `CANDIDAT_NBRE_ENF`, `CANDIDAT_ADR_PERM`, `CANDIDAT_ADR_ACT`, `CANDIDAT_INDICATIF`, `CANDIDAT_NUM_TEL`, `CANDIDAT_NUM_GSM`, `CANDIDAT_PERMIS`, `CANDIDAT_DEMANDE_EMPLOI`, `CANDIDAT_CV`, `CANDIDAT_CERTIFICAT_TRAVAIL`, `CANDIDAT_PHOTO`, `CANDIDAT_ACTE_NAISS`, `CANDIDAT_FICHE_FAMILLE`, `CANDIDAT_CERTIF_NAT`, `CANDIDAT_CERTIF_DOMICILE`, `CANDIDAT_CERTIF_MEDICAL`, `CANDIDAT_CASIER_JUDICIAIRE`, `CANDIDAT_IS_FAMILLE`, `CANDIDAT_MOTIV_POSTE`, `FK_UTIL_ID`) VALUES
(21, 'Externe', 'M.', 'Fall', 'Mactar', NULL, '1980-06-11', 'Dakar', 'SENEGALAISE', 'CELIBATAIRE', 0, 'Dakar Medina', 'Dakar Medina', '221', '775641230', '778942310', NULL, 'null_value', 'null_value', 'null_value', 'Photo-0089.jpg', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'Oui', 'null_value', 139),
(22, 'Externe', 'M.', 'Diop', 'Amadou', NULL, '1975-02-05', 'dakar', 'SENEGALAISE', 'CELIBATAIRE', 0, 'fdretteyy', 'ffdggettett', '221', '45821000', '785421000', 'B', 'null_value', 'null_value', 'null_value', 'slide-2.jpg', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'Oui', 'null_value', 143),
(23, 'Externe', 'Mme', 'Ndione', 'Gora', NULL, '2000-06-14', 'Dakar', 'SENEGALAISE', 'CELIBATAIRE', 0, 'deaaaa', 'fgggggggg', '221', '78963102', '53222', NULL, 'null_value', 'null_value', 'null_value', 'ajouter.png', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'Oui', 'null_value', 144),
(24, 'Externe', 'Mme', 'Gadio1', 'Mactar', NULL, '2015-03-11', 'Dakar', 'SENEGALAISE', 'CELIBATAIRE', 0, 'Dakar Medina', 'Dakar Medina', '221', '77893254', '778964312', 'A1', 'null_value', 'null_value', 'null_value', '121da92.jpg', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'Oui', 'null_value', 145),
(25, 'Interne', 'M.', 'ttrter', 'jutttt', NULL, '2015-03-10', 'fertyyuuu', 'SENEGALAISE', 'CELIBATAIRE', 0, 'hytttt', 'tttttttt', '221', '7894521', '7458210', 'A1', 'null_value', 'null_value', 'null_value', 'ajouter.png', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'Oui', 'null_value', 146),
(26, 'Interne', 'M.', 'Diop', 'Amadou12', NULL, '1990-03-14', 'Dakar1230', 'SENEGALAISE', 'CELIBATAIRE', 0, 'yhguguguguyuuydggf5896', 'fffgghghgghghffdd789666', '221', '77546666', '745210000', 'A1', 'null_value', 'null_value', 'null_value', '24.png', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'Oui', 'null_value', 148),
(27, 'Interne', 'M.', 'fffff', 'fffff', NULL, '1960-06-08', 'dddd', 'GABONAISE', 'CELIBATAIRE', 0, 'derttt', 'ezzzz', '84', '78', '789', 'A1', 'null_value', 'null_value', 'null_value', '121da92.jpg', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'null_value', 'Oui', 'null_value', 150);

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
  `FK_UTIL_ID` int(11) NOT NULL,
  `FK_annonce_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `candidat_saisi_note`
--

INSERT INTO `candidat_saisi_note` (`id`, `adequate_form`, `pert_experience`, `compt_specific`, `expe_con_asecna`, `con_infor`, `motiv_comp_redact`, `sens_initiative`, `autre_critere`, `apt_manag_esprit`, `FK_UTIL_ID`, `FK_annonce_id`) VALUES
(9, '3', '3', '8', '4', '6', '9', '35', '48', '6', 148, 3),
(10, '6', '9', '40', '20', '30', '9', '28', '24', '30', 148, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`COMP_ID`, `COMP_LIB`, `FK_CANDIDAT_ID`, `FK_ANNONCE_ID`) VALUES
(3, 'szerrttttttt', 21, 1),
(4, 'nbgfuyfvknazertyuiopQSDFGHJKLM\r\nAQSDFGHJKLM%QAZSERTYUIOPWXCVBN?.<WXCVBNXCVBN?./QSDFGHJ', 22, 1),
(5, 'dedzssasaaa', 23, 1),
(6, 'dertyuiopmmkjhgfdsqwxcvbn,123', 24, 1),
(7, 'erttttttt', 21, 2),
(8, 'dfeefeferefe1232', 26, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `connaissances_informatiques`
--

INSERT INTO `connaissances_informatiques` (`INFORMATIQUE_ID`, `LOGICIELS`, `INFORMATIQUE_NIV`, `FK_CANDIDAT_ID`, `Type`) VALUES
(4, 'Traitement de texte', 'Base', 21, 'NORMAL'),
(5, 'fdrtett', 'AvancÃ©', 21, 'AUTRE'),
(6, 'Traitement de texte', 'Base', 22, 'NORMAL'),
(7, 'gdfterr', 'Base', 22, 'AUTRE'),
(8, 'Traitement de texte', 'Base', 22, 'NORMAL'),
(9, 'fgtreee', 'Base', 22, 'AUTRE'),
(10, 'Traitement de texte', 'Base', 22, 'NORMAL'),
(11, 'Traitement de texte', 'Base', 22, 'NORMAL'),
(12, 'Traitement de texte', 'Base', 22, 'NORMAL'),
(13, 'Traitement de texte', 'Base', 22, 'NORMAL'),
(14, 'derrr', 'Base', 22, 'AUTRE'),
(15, 'Tableur', 'Moyen', 23, 'NORMAL'),
(17, 'deds', 'Base', 23, 'AUTRE'),
(18, 'Traitement de texte', 'Moyen', 24, 'NORMAL'),
(19, 'azaazazzaaz125', 'Base', 24, 'AUTRE'),
(20, 'Traitement de texte', 'Base', 26, 'NORMAL'),
(21, 'Outils collaboratif', 'Base', 26, 'NORMAL'),
(23, 'eeede', 'Base', 26, 'AUTRE'),
(24, 'dede412', 'Base', 26, 'AUTRE'),
(26, 'daz', 'Base', 26, 'AUTRE'),
(27, 'ddd123', 'Base', 27, 'AUTRE'),
(28, 'ddd', 'Moyen', 27, 'AUTRE'),
(29, 'ddd', 'Base', 27, 'AUTRE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `connaissances_linguistiques`
--

INSERT INTO `connaissances_linguistiques` (`LANGUE_ID`, `LANGUE_NOM`, `LANGUE_ORALE`, `LANGUE_ECRITE`, `LANGUE_LECTURE`, `FK_CANDIDAT_ID`, `Type`) VALUES
(4, 'Francais', 'Base', 'Base', 'Base', 21, 'NORMAL'),
(5, 'derttt', 'Base', 'Base', 'Base', 21, 'AUTRE'),
(6, 'vfdgvydhv', 'Base', 'Moyen', 'Base', 22, 'AUTRE'),
(7, 'hdgyugdugu', 'AvancÃ©', 'AvancÃ©', 'Base', 22, 'AUTRE'),
(8, 'hdubjbjhb', 'Moyen', 'Base', 'Moyen', 22, 'AUTRE'),
(9, 'Francais', 'Base', 'Base', 'Base', 22, 'NORMAL'),
(12, 'Francais', 'Moyen', 'Moyen', 'Moyen', 23, 'NORMAL'),
(16, 'fed', 'Moyen', 'Base', 'Moyen', 23, 'AUTRE'),
(17, 'Francais', 'Base', 'AvancÃ©', 'Base', 24, 'NORMAL'),
(18, 'dererrer', 'Base', 'AvancÃ©', 'Base', 24, 'AUTRE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Contenu de la table `dossier`
--

INSERT INTO `dossier` (`DOSSIER_ID`, `DOSSIER_NOM`, `DOSSIER_LIEN`, `FK_CANDIDAT_ID`, `Type_doss`) VALUES
(51, 'Demande_emploi', 'Demande_emploi1.png', 24, 'Demande_emploi'),
(52, 'Cv', 'Cv1.png', 24, 'Cv'),
(53, 'Act_naiss', 'Act_naiss1.png', 24, 'Act_naiss'),
(54, 'Cert_trav', 'Cert_trav1.png', 24, 'Cert_trav'),
(55, 'Cert_nat', 'Cert_nat1.png', 24, 'Cert_nat'),
(56, 'Cert_dom', 'Cert_dom1.png', 24, 'Cert_dom'),
(57, 'Cert_med', 'Cert_med1.png', 24, 'Cert_med'),
(58, 'Casier_jud', 'Casier_jud1.png', 24, 'Casier_jud'),
(59, 'Fiche_fam', 'Fiche_fam1.png', 24, 'Fiche_fam'),
(60, 'Demande_emploi', 'Demande_emploi52.png', 26, 'Demande_emploi'),
(61, 'Cv', 'Cv53.png', 26, 'Cv'),
(62, 'Demande_emploi', 'Demande_emploi61.pdf', 27, 'Demande_emploi'),
(63, 'Cv', 'Cv62.jpg', 27, 'Cv');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `experience_professionnelle`
--

INSERT INTO `experience_professionnelle` (`EXP_ID`, `EXP_ENT_NOM`, `EXP_SEC_ACT`, `EXP_POSTE`, `EXP_DEBUT_TRAVAIL`, `EXP_FIN_TRAVAIL`, `EXP_SALAIRE`, `EXP_NBRE_PERS_SORD`, `EXP_TACHE`, `EXP_MOTIF_DEP`, `FK_CANDIDAT_ID`) VALUES
(2, 'gdgvguvyuyuv', 'fdrftzz', 'ferteyziozib', '2014##12', '2015##02', 251400, 12, 'fyetyfyyy', 'gdcddfy', 21),
(3, 'gfcdrft', 'fffff', 'gdfterre', '13-02-2015', '19-02-2015', 85899900, 10, 'ttbbbwbbwbbw', 'gffd', 22),
(4, 'hjcbjhd', 'gsyfyuuyg', 'hbdcjdhb', '11-02-2015', '18-03-2015', 2540000, 12, 'hbhjbhjxb', 'cbkj, c', 22),
(5, 'ghvgvhgvx', 'gsgytyuy', 'gsxgcy', '25-02-2015', '18-03-2015', 48712661, 51, 'jbskxkj', 'knk', 22),
(6, 'bhjbjhs', 'FCXFFT', 'hgsyyufs', '01-03-2015', '13-03-2015', 884, 84949, 'KVHGX', 'LNVGH', 22),
(7, 'GCGFGFT', 'HGHGHGVGH', 'HVSY', '24-03-2015', '24-03-2015', 7456, 789, '89VWATDYTGI', '778', 22),
(8, 'HJHBJB', 'IGBN?LMCVBN?.', 'HJZDIHXB', '09-03-2015', '18-03-2015', 778, 59, 'YHGYHEUGF67Y', 'GSGDYUG8UECUYFIU', 22),
(9, 'EDRTUIOP', 'JUHGG', 'FRDFSVUHU', '25-02-2015', '26-03-2015', 2147483647, 852, 'FSGHJKCYKS', 'SDHJDÂ²', 22),
(11, 'sdddd', 'szzzzzzzs', 'dsdddqd', '14-07-2004', '26-03-2015', 254000, 12, 'ddedddzxfrvvvQSDFGHJKLM%Âµ<WXCVBN?.AZERTYUIOPQSDFGHJKLZERTYUIOPQSDFGHJKLWXCVBN?./ZERTYUI', 'edffd', 23),
(12, 'zfeffefezf', 'drerdffrgergere', 'ezze', '06-03-2015', '15-04-2015', 250080, 12, 'azdqaddzadqdqdqdqdzefjloitda12', 'ffddazazad', 24),
(13, 'eeeeeee', 'rttrrrfrr', 'zzzee', '04-03-2015', '25-04-2015', 1254877, 145, 'ttrtrtgtrgrtgrtgtrgrt', 'ttthttht', 26),
(14, 'dcdcdfdf44444', 'dcdfdfdc444444', 'fvdfdfdfdef444', '24-02-2015', '30-04-2015', 3222224, 145, 'efrerefef1111', 'trffrf11', 26),
(15, 'dsdsdsdsd', 'ssdsddsd', 'dsdsdsdsd', '25-02-2015', '31-03-2015', 2333, 43, 'rrrrrr', 'RRRRRR', 26),
(17, 'e"zddezd', 'efreerfrf', 'ezzeddzd', '2015##12', '2015##12', 3333333, 1222, 'zzeezeefvcxvxxcvxc', 'xvdvvdvd', 26),
(18, 'ddd', 'sdeeee', 'ddd', '2015##02', '2014##02', 1452, 4122, 'aeazaza', 'rgezrezr', 27);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `famille`
--

INSERT INTO `famille` (`FAMILLE_ID`, `FAMILLE_NOM`, `FAMILLE_PRENOM`, `FAMILLE_STRUCTURE`, `FAMILLE_DEGRE`, `FK_CANDIDAT_ID`) VALUES
(2, 'Fall', 'Maissa', 'Informatique', '8A', 21),
(4, 'Diop', 'Samba', 'TIGO', '10B', 21),
(5, 'fdtfettdt', 'jbchh', 'hhjvcv', 'hvsvzs', 21),
(6, 'Diop', 'ammmmsyyyyyeseh', 'ssxdtf', 'nnnnnnn', 22),
(7, 'ertyyy', 'sss', 'ddd', 'sss', 23),
(8, 'serti', 'derrr123', 'aqssss', 'rfgbbbbbb', 24),
(9, 'Fall', 'Massata', 'ARTP1', '45632dffer', 24),
(11, 'dddddddd7', 'ferfeee458', 'eeeeee142', 'eeeefee', 26),
(13, 'fccxccxc', 'fsffsffsf', 'fsfftyfxytf', 'ysg-Ã¨yxygx', 25),
(14, 'tyftyfqtyfw', 'tftywfatyf', 'tyfwtyftyf', 'tyfytxfytf', 25),
(15, 'deee', 'eee', 'eee', 'eee', 27);

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `FONCTION_ID` int(11) NOT NULL,
  `FONCTION_LIB` varchar(25) NOT NULL,
  `FONCTION_DESC` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fonction`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`FORMATION_ID`, `FORMATION_AN_DEB`, `FORMATION_AN_FIN`, `ETABLISSEMENT_NOM`, `FORMATION_LIEU`, `FORMATION_DIPLOME`, `FORMATION_DOM_PRINC_ETUD`, `FK_CANDIDAT_ID`, `FORMATION_CYCLE`, `FORMATION_DIPLOME_FICHIER`) VALUES
(3, '2015', '2015', 'FST', 'Dept Info', 'MaÃ®trise,Master 1, IEP, ', 'Informatique', 21, 'Universitaires', 'logo-30.-04-2012.png'),
(4, '2014', '2015', 'drteer', 'cfdrttt', 'Bac Professionnel, BEP, C', 'fgtrez', 22, 'Universitaires', '28.png'),
(5, '2015', '2015', 'gxcgccygt', 'yhggvxghvx', 'Bac Professionnel, BEP, C', 'kbh', 22, 'Universitaires', '61.png'),
(6, '2015', '2015', 'vcwgfcc', 'ccwcgcgw', 'Bac Professionnel, BEP, C', 'nhvhx', 22, 'Universitaires', 'chris1_lg.jpg'),
(7, '2015', '2015', 'bvxghvgghcsg', 'ghvhvghc', 'Bac Professionnel, BEP, C', 'ydgyy', 22, 'Universitaires', '43.png'),
(8, '2015', '2015', 'bgsgvghv', 'hvxgcghx', 'DUT, BTS, Bac + 2', 'jhhvhvhjv', 22, 'Universitaires', '24.png'),
(9, '2014', '2015', 'bggvggc', 'hghghhgvgdv', 'DUT, BTS, Bac + 2', 'bhgvghcvhv', 22, 'Universitaires', '43.png'),
(11, '2013', '2015', 'sdeeee', 'eeee', 'Bac Professionnel, BEP, C', 'eeeee', 23, 'Universitaires', 'captcha.png'),
(12, '2014', '2015', 'UniversitÃ© Cheick Anta D', 'Dakar', 'Lycee, Niveau Bac', 'Informatique', 24, 'Universitaires', 'ajouter.png'),
(13, '2013', '2015', 'dssdf145222', 'fefee56333', 'Bac Professionnel, BEP, C', 'dsdefzefzd458966', 26, 'Universitaires', 'ajouter.png'),
(15, '2012', '2014', 'eeerferf', 'referf', 'Bac Professionnel, BEP, C', 'efeer', 26, 'Universitaires', 'ajouter.png'),
(16, '2014', '2014', 'ddff', 'fff', 'Bac Professionnel, BEP, C', 'eeee', 27, 'Universitaires', 'DSC_0238.JPG');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `lettre_motivation`
--

INSERT INTO `lettre_motivation` (`LETTRE_MOTIVATION_ID`, `LETTRE_MOTIVATION`, `FK_CANDIDAT_ID`, `FK_ANNONCE_ID`) VALUES
(2, 'dszzzzzz', 21, 1),
(3, 'ZAERTYUIOPWXCVBN?./', 22, 1),
(4, 'dxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 23, 1),
(5, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee123', 24, 1),
(6, 'ttttt', 21, 2),
(7, 'efzeezezez41452', 26, 3),
(8, 'dddd', 27, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `ponderation`
--

INSERT INTO `ponderation` (`id`, `adequate_form`, `pert_experience`, `compt_specific`, `expe_con_asecna`, `con_infor`, `motiv_comp_redact`, `sens_initiative`, `autre_critere`, `apt_manag_esprit`) VALUES
(1, '3', '3', '8', '4', '6', '9', '7', '12', '6');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `postulation`
--

INSERT INTO `postulation` (`postulation_id`, `postulation_date`, `FK_UTIL_ID`, `postulation_age_candidat`, `FK_annonce_id`, `note`, `retenu`, `preselect`) VALUES
(2, '2015-02-28 00:00:00', 139, 40, 1, 17, 'non', 'NON'),
(3, '2015-03-01 00:00:00', 143, 40, 1, 16, 'oui', 'NON'),
(4, '2015-03-07 00:00:00', 145, 40, 1, 0, '', 'NON'),
(5, '2015-03-07 00:00:00', 139, 29, 2, 0, '', 'NON'),
(6, '2015-03-07 00:00:00', 139, 29, 2, 0, '', 'NON'),
(7, '2015-03-07 00:00:00', 139, 29, 2, 0, '', 'NON'),
(8, '2015-03-07 00:00:00', 139, 29, 2, 0, '', 'NON'),
(9, '2015-03-07 00:00:00', 139, 29, 2, 0, '', 'NON'),
(10, '2015-03-07 00:00:00', 139, 29, 2, 0, '', 'NON'),
(15, '2015-03-21 23:09:02', 148, 29, 3, 196, 'oui', 'OUI'),
(16, '2015-03-21 00:00:00', 150, 29, 3, 0, '', 'OUI');

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE IF NOT EXISTS `profils` (
  `PROFIL_ID` int(11) NOT NULL,
  `PROFIL_NOM` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `profils`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `qualites`
--

INSERT INTO `qualites` (`QUAL_ID`, `QUAL_LIB`, `FK_CANDIDAT_ID`) VALUES
(2, 'zzzzzzzzzzzz', 21),
(3, 'SDCFVGBHNJ?K.L/ERTYUIOPÂ¨Â£zzzzzzzzzzzz', 22),
(4, 'zzzzzzzzzzzzdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 23),
(5, 'dfreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee548', 24),
(6, 'ezdzzdezfzezed48888', 26),
(7, 'dddd', 27);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `realisation`
--

INSERT INTO `realisation` (`REAL_ID`, `REAL_LIB`, `FK_CANDIDAT_ID`) VALUES
(6, 'fdrezsaqwxcccccccccccccccccccccccccccccccyyyyyyyyyyyyyyyyyyyyyyyyy', 21),
(7, 'fdretttttfxxdyuopmlk 28-02-2015', 22),
(8, 'qqqaqqqqsazrtgvvgfbvffds', 23),
(9, 'derrrrrrr1', 24),
(10, 'rfeefeere123654', 26);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `reference`
--

INSERT INTO `reference` (`REF_ID`, `REF_NOM_ENT`, `REF_PERS_CONT`, `REF_POST_OCC`, `REF_TEL`, `REF_EMAIL`, `FK_CANDIDAT_ID`) VALUES
(2, 'ddd', 'dddddd', 'dddd', '458777', 'ouznd@yahoo.fr', 21),
(3, 'ggsvggcshgg', 'ghsgsvgh', 'ghvgvxhvghx', '7418585', 'chhhcn@yahoo.fr', 22),
(4, 'bagyfgyhudhuh', 'ghghvdghvh', 'ghvhxvhgvchhhhhhhhhhhhhhhhhhhh', '12345678', 'hhfhb@yahoo.fr', 22),
(5, 'hjaegyafyfy', 'yydydtyvy', 'tyztydy', '12345678', 'vchbchc@yajooo.fr', 22),
(8, 'ddddasa', 'azsasa', 'asadasas', '521006355', 'ouhu@yahoo.fr', 23),
(9, 'erettretter', 'tzsssaaaaa', 'aaaaa4', '775423698', 'oplzdrcacfa@yahoo.fr', 24),
(10, 'serrr', 'frtyyy', 'rdffgiiiy', '775634102', 'oujyrt@yahoo.fr', 24),
(11, 'dsccsdc', 'dzdadvv', 'zdefzezefzdz', '4527893147', 'ouz@yahoo.fr', 24),
(12, 'dddd', 'dd', 'dd', '74444', 'opas@yahoo.fr', 27),
(13, 'ee', 'ee', 'ee', '7899999', 'opl@yahoo.fr', 27);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`UTIL_ID`, `UTIL_LOGIN`, `UTIL_MDP`, `UTIL_EMAIL`, `UTIL_ROLE`, `active`, `token`) VALUES
(138, 'ndione.wingo.ousmane@gmail.com', 'seosl5UPz..jU', 'ndione.wingo.ousmane@gmail.com', '1', 'oui', 'd9e4854806e6cb92f727424d74eb19b633bc4e1f'),
(139, 'ouznd@yahoo.fr', 'seosl5UPz..jU', 'ouznd@yahoo.fr', '0', 'oui', 'ecbda8b5d39b53e004429a8735bec7f99304f345'),
(143, 'toto12@yahoo.fr', 'seosl5UPz..jU', 'toto12@yahoo.fr', '0', 'oui', 'aaf337af08f3c7d18ecd953dcc9785361e2cce3e'),
(144, 'toto258@yahoo.fr', 'seosl5UPz..jU', 'toto258@yahoo.fr', '0', 'oui', '5afdf3693ae43f3ae677abf1525724023b3421fc'),
(145, 'sambafall@yahoo.fr', 'seosl5UPz..jU', 'sambafall@yahoo.fr', '0', 'oui', 'a417ed34b1edbdee450a287ee4de77eefe2f096b'),
(146, 'toto128@yahoo.fr', 'seosl5UPz..jU', 'toto128@yahoo.fr', '0', 'oui', 'a65d6e41a05c0b70e61dd246eb8660e3d5cad845'),
(147, 'toto123456@yahoo.fr', 'seosl5UPz..jU', 'toto123456@yahoo.fr', '1', 'oui', 'c7e350f0a31362ec1e5665d27df6c4256a0accff'),
(148, 'usertest@yahoo.fr', 'seosl5UPz..jU', 'usertest@yahoo.fr', '0', 'oui', 'e441eedbc977f84e25cafc96ddbd2f5688bba353'),
(150, 'ali@yahoo.fr', 'seosl5UPz..jU', 'ali@yahoo.fr', '0', 'oui', 'c434d07880dc1eedad57456260c885eae59b9a3a');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=160 ;

--
-- Contenu de la table `validation_cadidature`
--

INSERT INTO `validation_cadidature` (`id`, `etape`, `date_enreg`, `id_annonce`, `id_candidat`, `libelle`) VALUES
(1, 1, '2015-02-22', 1, 19, 'Coordonnee Personnelle'),
(2, 2, '2015-02-22', 1, 19, 'Formation'),
(12, 3, '2015-02-22', 1, 19, 'Travail fin etude'),
(13, 4, '2015-02-22', 1, 19, 'Autre Formation'),
(14, 5, '2015-02-22', 1, 19, 'Experience professionnelle'),
(15, 6, '2015-02-22', 1, 19, 'Informatique'),
(16, 7, '2015-02-22', 1, 19, 'Linguistique'),
(18, 9, '2015-02-22', 1, 19, 'Lettre_motivation'),
(19, 10, '2015-02-22', 1, 19, 'Informatique'),
(22, 8, '2015-02-22', 1, 19, 'Competence'),
(23, 11, '2015-02-22', 1, 19, 'Piece jointe'),
(24, 11, '2015-02-22', 1, 19, 'Piece jointe'),
(25, 11, '2015-02-22', 1, 19, 'Piece jointe'),
(26, 11, '2015-02-22', 1, 19, 'Piece jointe'),
(27, 1, '2015-02-23', 1, 20, 'Coordonnee Personnelle'),
(28, 2, '2015-02-23', 1, 20, 'Formation'),
(29, 3, '2015-02-23', 1, 20, 'Travail fin etude'),
(30, 11, '2015-02-23', 1, 20, 'Piece jointe'),
(31, 11, '2015-02-23', 1, 20, 'Piece jointe'),
(32, 11, '2015-02-23', 1, 20, 'Piece jointe'),
(33, 1, '2015-02-28', 1, 21, 'Coordonnee Personnelle'),
(34, 2, '2015-02-28', 1, 21, 'Formation'),
(35, 3, '2015-02-28', 1, 21, 'Travail fin etude'),
(36, 4, '2015-02-28', 1, 21, 'Autre Formation'),
(37, 5, '2015-02-28', 1, 21, 'Experience professionnelle'),
(38, 6, '2015-02-28', 1, 21, 'Informatique'),
(39, 7, '2015-02-28', 1, 21, 'Linguistique'),
(40, 8, '2015-02-28', 1, 21, 'Competence'),
(41, 9, '2015-02-28', 1, 21, 'Lettre_motivation'),
(42, 10, '2015-02-28', 1, 21, 'References'),
(43, 11, '2015-02-28', 1, 21, 'Piece jointe'),
(44, 1, '2015-02-28', 1, 22, 'Coordonnee Personnelle'),
(45, 2, '2015-02-28', 1, 22, 'Formation'),
(46, 3, '2015-02-28', 1, 22, 'Travail fin etude'),
(47, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(48, 5, '2015-02-28', 1, 22, 'Experience professionnelle'),
(49, 5, '2015-02-28', 1, 22, 'Experience professionnelle'),
(50, 6, '2015-02-28', 1, 22, 'Informatique'),
(51, 6, '2015-02-28', 1, 22, 'Informatique'),
(52, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(53, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(54, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(55, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(56, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(57, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(58, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(59, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(60, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(61, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(62, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(63, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(64, 4, '2015-02-28', 1, 22, 'Autre Formation'),
(65, 6, '2015-02-28', 1, 22, 'Informatique'),
(66, 6, '2015-02-28', 1, 22, 'Informatique'),
(67, 6, '2015-02-28', 1, 22, 'Informatique'),
(68, 6, '2015-02-28', 1, 22, 'Informatique'),
(69, 4, '2015-03-01', 1, 22, 'Autre Formation'),
(70, 5, '2015-03-01', 1, 22, 'Experience professionnelle'),
(71, 5, '2015-03-01', 1, 22, 'Experience professionnelle'),
(72, 5, '2015-03-01', 1, 22, 'Experience professionnelle'),
(73, 5, '2015-03-01', 1, 22, 'Experience professionnelle'),
(74, 5, '2015-03-01', 1, 22, 'Experience professionnelle'),
(75, 5, '2015-03-01', 1, 22, 'Experience professionnelle'),
(76, 10, '2015-03-01', 1, 22, 'References'),
(77, 10, '2015-03-01', 1, 22, 'References'),
(78, 10, '2015-03-01', 1, 22, 'References'),
(79, 7, '2015-03-01', 1, 22, 'Linguistique'),
(80, 2, '2015-03-01', 1, 22, 'Formation'),
(81, 2, '2015-03-01', 1, 22, 'Formation'),
(82, 2, '2015-03-01', 1, 22, 'Formation'),
(83, 2, '2015-03-01', 1, 22, 'Formation'),
(84, 2, '2015-03-01', 1, 22, 'Formation'),
(85, 8, '2015-03-01', 1, 22, 'Competence'),
(86, 9, '2015-03-01', 1, 22, 'Lettre_motivation'),
(87, 11, '2015-03-01', 1, 22, 'Piece jointe'),
(88, 1, '2015-03-03', 1, 23, 'Coordonnee Personnelle'),
(89, 2, '2015-03-03', 1, 23, 'Formation'),
(90, 2, '2015-03-03', 1, 23, 'Formation'),
(91, 3, '2015-03-03', 1, 23, 'Travail fin etude'),
(92, 4, '2015-03-03', 1, 23, 'Autre Formation'),
(93, 4, '2015-03-03', 1, 23, 'Autre Formation'),
(94, 5, '2015-03-03', 1, 23, 'Experience professionnelle'),
(95, 5, '2015-03-03', 1, 23, 'Experience professionnelle'),
(96, 6, '2015-03-03', 1, 23, 'Informatique'),
(97, 7, '2015-03-03', 1, 23, 'Linguistique'),
(98, 7, '2015-03-03', 1, 23, 'Linguistique'),
(99, 8, '2015-03-03', 1, 23, 'Competence'),
(100, 9, '2015-03-03', 1, 23, 'Lettre_motivation'),
(101, 10, '2015-03-03', 1, 23, 'References'),
(102, 10, '2015-03-03', 1, 23, 'References'),
(103, 10, '2015-03-03', 1, 23, 'References'),
(107, 11, '2015-03-04', 1, 23, 'Piece jointe'),
(108, 11, '2015-03-04', 1, 23, 'Piece jointe'),
(109, 11, '2015-03-04', 1, 23, 'Piece jointe'),
(110, 1, '2015-03-07', 1, 24, 'Coordonnee Personnelle'),
(111, 2, '2015-03-07', 1, 24, 'Formation'),
(112, 3, '2015-03-07', 1, 24, 'Travail fin etude'),
(113, 4, '2015-03-07', 1, 24, 'Autre Formation'),
(114, 5, '2015-03-07', 1, 24, 'Experience professionnelle'),
(115, 6, '2015-03-07', 1, 24, 'Informatique'),
(116, 7, '2015-03-07', 1, 24, 'Linguistique'),
(117, 8, '2015-03-07', 1, 24, 'Competence'),
(118, 9, '2015-03-07', 1, 24, 'Lettre_motivation'),
(119, 10, '2015-03-07', 1, 24, 'References'),
(120, 10, '2015-03-07', 1, 24, 'References'),
(121, 10, '2015-03-07', 1, 24, 'References'),
(122, 11, '2015-03-07', 1, 24, 'Piece jointe'),
(123, 11, '2015-03-07', 1, 24, 'Piece jointe'),
(124, 9, '2015-03-07', 2, 21, 'Lettre_motivation'),
(125, 8, '0000-00-00', 2, 21, 'Competence'),
(126, 1, '2015-03-07', 1, 25, 'Coordonnee Personnelle'),
(127, 1, '2015-03-12', 3, 26, 'Coordonnee Personnelle'),
(128, 2, '2015-03-12', 3, 26, 'Formation'),
(129, 2, '2015-03-12', 3, 26, 'Formation'),
(130, 2, '2015-03-12', 3, 26, 'Formation'),
(131, 3, '2015-03-12', 3, 26, 'Travail fin etude'),
(132, 4, '2015-03-12', 3, 26, 'Autre Formation'),
(133, 4, '2015-03-12', 3, 26, 'Autre Formation'),
(134, 4, '2015-03-12', 3, 26, 'Autre Formation'),
(135, 4, '2015-03-12', 3, 26, 'Autre Formation'),
(136, 4, '2015-03-12', 3, 26, 'Autre Formation'),
(137, 5, '2015-03-12', 3, 26, 'Experience professionnelle'),
(138, 5, '2015-03-12', 3, 26, 'Experience professionnelle'),
(139, 5, '2015-03-12', 3, 26, 'Experience professionnelle'),
(140, 5, '2015-03-12', 3, 26, 'Experience professionnelle'),
(141, 5, '2015-03-12', 3, 26, 'Experience professionnelle'),
(142, 5, '2015-03-12', 3, 26, 'Experience professionnelle'),
(143, 5, '2015-03-12', 3, 26, 'Experience professionnelle'),
(144, 5, '2015-03-12', 3, 26, 'Experience professionnelle'),
(145, 5, '2015-03-12', 3, 26, 'Experience professionnelle'),
(146, 5, '2015-03-12', 3, 26, 'Experience professionnelle'),
(147, 6, '2015-03-12', 3, 26, 'Informatique'),
(148, 6, '2015-03-12', 3, 26, 'Informatique'),
(149, 6, '2015-03-12', 3, 26, 'Informatique'),
(150, 8, '2015-03-12', 3, 26, 'Competence'),
(151, 9, '2015-03-12', 3, 26, 'Lettre_motivation'),
(152, 11, '2015-03-12', 3, 26, 'Piece jointe'),
(153, 1, '2015-03-21', 3, 27, 'Coordonnee Personnelle'),
(154, 2, '2015-03-21', 3, 27, 'Formation'),
(155, 5, '2015-03-21', 3, 27, 'Experience professionnelle'),
(156, 10, '2015-03-21', 3, 27, 'References'),
(157, 10, '2015-03-21', 3, 27, 'References'),
(158, 9, '2015-03-21', 3, 27, 'Lettre_motivation'),
(159, 11, '2015-03-21', 3, 27, 'Piece jointe');

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
