-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 08 Décembre 2014 à 06:21
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
  PRIMARY KEY (`ANNONCE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`ANNONCE_ID`, `ANNONCE_NUM`, `ANNONCE_TITRE`, `ANNONCE_DESCRIPTION`, `ANNONCE_LIEN`, `ANNONCE_DATE_DEB`, `ANNONCE_DATE_FIN`, `ANNONCE_DATE_CREATION`, `ANNONCE_AGE`, `ANNONCE_DELAI_AGE`, `SECTEUR`, `ETAT`) VALUES
(2, 'NÂ°2014/16427/ASECNA/DGDD/DGDR/DGDRP', 'Un Cadre AIM   ', '      - Veiller Ã  la disponibilitÃ© des NOTAM ASECNA et Ã©trangers;\r\n- Veiller Ã  la disponibilitÃ© des publications de l''ASECNA;\r\n- Veiller Ã  la bonne exÃ©cution des opÃ©rations AIM;\r\n- Organiser les contrÃ´les rÃ©glementaires  liÃ©s Ã  l''activitÃ© de son mÃ©tier;\r\n- Assurer le respect des normes et pratiques recommandÃ©es de l''OACI du domaine AIM et Ã  l''efficacitÃ© de toutes les structures  AIM de l''Agence,\r\nNotifier les Ã©venement de sÃ©curitÃ©;\r\n- Contribuer Ã  la gestion des situations d''urgence;\r\n- prÃ©voir et assurer la gestion optimale des ressources nÃ©cessaires Ã  l''activitÃ©;\r\n-dÃ©ployer la politique RH et contribuer au dÃ©veloppement des compÃ©tences de ses collaborateurs;\r\n- piloter la performance individuelle et collective;\r\n- suivre le fonctionnement  des sytÃ¨mes  de management de la qualitÃ© et de la sÃ©curitÃ© et suggÃ©rer tout besoin d''amÃ©loiration   ', 'annonce/2014-AVP-16427-ASECNA-DGDD-DGDR-DGDRP-01-CADRE-AIM.pdf', '2015-01-08', '2014-12-04', '2014-11-28 18:32:24', 40, '2014-01-01', '', ''),
(3, 'nÂ°2014/16307/ASECNA/DGDD/DGDR/DGDRP', 'Un (1) Cartographe-Topographe   ', '      - Collecte et traitement donnÃ©es cartographiques, exploitation des donnÃ©es cartographiques\r\n-levÃ©s d''obstacles d''aÃ©rodromes, mise Ã  jour cartes aÃ©rodromes, mise Ã  jour coordonnÃ©es WVGS-84\r\n-laboration et mise en oeuvre des projets relatifs aux aÃ©rodromes, etc   ', 'annonce/2014-AVP-16307-ASECNA-DGDD-DGDR-DGDRP-01-CARTOGRAPHE-TOPOGRAPHE.pdf', '2014-03-15', '2014-06-01', '2014-06-02 12:28:09', 40, '2014-01-01', '', ''),
(4, 'nÂ°2014/16314/ASECNA/DGDD/DGDR/DGDRP ', 'Quatre (4) IngÃ©nieurs PrÃ©visionnistes/Protectionnistes', '-organisation et supervision activitÃ©s mÃ©tÃ©o, analyse situation mÃ©tÃ©o, veille mÃ©tÃ©orologique, fourniture prÃ©vision des paramÃ¨tres et phÃ©nomÃ¨nes mÃ©tÃ©o etc', 'annonce/2014-AVP-16314-ASECNA-DGDD-DGDR-DGDRP-04-INGENIEURS-PREVISIONNISTES-PROTECTIONNISTES.pdf', '2014-03-15', '2014-12-18', '2014-11-30 22:48:32', 0, '2014-01-01', '', ''),
(5, 'n2014/16226/ASECNA/DGDD/DGDR/DGDRP', 'Un (1) Cadre Administratif et Financier', '- Suivi de l''exÃ©cution du budget (recettes et dÃ©penses)\r\n- PrÃ©paration des documents comptables, gestion opÃ©rations de facturation etc', 'annonce/2014-AVP-16226-CADRE-ADMINISTRATIF-ET-FINANCIER-DEXR-GE-10.pdf', '2014-03-17', '2014-12-13', '2014-12-04 18:35:20', 40, '2014-01-01', '', ''),
(6, 'NÂ°2014/16661/ASECNA/DGDD/DGDR/DGDRP ', 'Un (1) Cadre Administratif et Financier', 'Gestion BudgÃ©taire et du Personel de la ReprÃ©sentation de la Centrafrique', 'annonce/2014-AVP-16661-ASECNA-DGDD-DGDR-DGDRP-01-CADRE-ADMINISTRATIF-ET-FINANCIER-HF.pdf', '2014-06-05', '2014-10-01', '2014-05-27 12:45:59', 35, '2014-01-01', '', ''),
(7, 'NÂ°2014/16321/ASECNA/DGDD/DGDR/DGDRP', 'Un (1) cadre ContrÃ´le', '- Assistance dans l''application des manuels de procÃ©dure\r\n- Veiller aux normes et standards de confection et d''exÃ©cution du budget\r\n-suivi exÃ©cution budget \r\n- animer SMS', 'annonce/201-AVP-16321-ASECNA-DGDD-DGDR-DGDRP-01-CADRE-CONTROLE.pdf', '2014-03-20', '2014-09-01', '2014-05-27 12:52:22', 40, '2014-01-01', '', ''),
(8, 'NÂ°2014/16318/ASECNA/DGDD/DGDR/DGDRP', 'Un (1) Instructeur en AÃ©rotechnique', '- PrÃ©aparation des cours\r\n- Animation des Stages\r\n- Recherche appliquÃ©e au sein de l''ecole et contrÃ´le du bon fonctionnement Ã©quipemenst didactiques\r\n- Participer aux jurys de soutenance\r\n- PrÃ©parer notes de travail des rÃ©unions statutaire\r\n- participer Ã  la rÃ©alisation des programmes de formation', 'annonce/2014-AVP-16318-ASECNA-DGDD-DGDR-DGDRP-01-INSTRUCTEUR-EN-AEROTECHNIQUE.pdf', '2014-03-20', '2014-12-20', '2014-11-30 22:48:55', 45, '2014-01-01', '', ''),
(10, 'nÂ°2014/16313/ASECNA/DGDD/DGDR/DGDRP', 'Trois (3) Cadres Maintenance GÃ©nie Civile', '- Elaboration programme entretien des bÃ¢timents\r\nInspection des travaux\r\n- suivi des contrats locaux de maintenace et de service\r\n- contrÃ´le et surveillance des travux et coordonner les Ã©quipes\r\n- suivi des biens meubles et immeubles et effectuer inventaire physique\r\n- identifier matÃ©riels et meubles Ã  rÃ©former', 'annonce/2014-AVP-16313-ASECNA-DGDD-DGDR-DGDRP-03-CADRES-MAINTENANCE-GENIE-CIVIL.pdf', '2014-03-20', '2014-12-18', '2014-11-30 22:48:41', 40, '2014-01-01', '', ''),
(11, 'NÂ°2014/16312/ASECNA/DGDD/DGDR/DGDRP', 'Deux (2) Comptables', 'Enregistrer et consolider donnÃ©es financiÃ¨res\r\nEtablire les balances de comptes, comptes de rÃ©sultat\r\n- assurer enregistrement comptable des immobiloisations\r\n- Faire encaissement des chÃ¨ques ASECNA\r\nGarantir rÃ©gularitÃ© des dÃ©penses de fonctionnement\r\nRespecter procÃ©dures du RIC et du RTCG', 'annonce/2014-AVP-16312-ASECNA-DGDD-DGDR-DGDRP-02-COMPTABLES.pdf', '2014-03-20', '2014-12-05', '2014-11-30 22:49:34', 35, '2014-01-01', '', ''),
(12, '1111', 'dgfd', 'cadre', 'annonce/gabarit6.PNG', '2014-11-01', '2014-12-01', '2014-11-25 04:47:01', 40, '2014-11-13', '', ''),
(13, '1111', 'hyjyj', 'gfhtgjytjuyt', 'annonce/bdonnees.PNG', '2014-12-11', '2014-12-31', '2014-12-04 19:11:35', 25, '2014-01-01', 'COMPTA', 'EN COURS');

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
(1, '2006', 'comptabilite', 'des', 'cmp', 1, 'diplome/8277-1-555555-fall-bira.PNG'),
(2, '1961', 'xsqxqs', 'sqxsqx', '', 2, 'diplome/6663-2-666666-vcbbv-ddvdfvdf');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `avis_ID` int(11) NOT NULL AUTO_INCREMENT,
  `avis_etablissement` varchar(255) NOT NULL,
  `avis_cycle` varchar(200) NOT NULL,
  `avis_num` varchar(255) NOT NULL,
  `avis_titre` varchar(100) NOT NULL,
  `avis_description` text NOT NULL,
  `avis_lien` varchar(255) NOT NULL,
  `avis_date_deb` date NOT NULL,
  `avis_date_fin` date NOT NULL,
  `avis_date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `avis_age` int(11) NOT NULL,
  `avis_delai_age` date NOT NULL,
  PRIMARY KEY (`avis_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`avis_ID`, `avis_etablissement`, `avis_cycle`, `avis_num`, `avis_titre`, `avis_description`, `avis_lien`, `avis_date_deb`, `avis_date_fin`, `avis_date_creation`, `avis_age`, `avis_delai_age`) VALUES
(1, 'EAMAC', 'INGENIEUR', 'dddddd', 'ddd', ' ddddd ', 'avis/bottomleft.png', '2014-04-30', '2014-04-01', '2014-04-15 11:13:37', 26, '2014-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `avp`
--

CREATE TABLE IF NOT EXISTS `avp` (
  `avp_id` int(11) NOT NULL AUTO_INCREMENT,
  `avp_poste` varchar(100) NOT NULL,
  `avp_reference` varchar(100) NOT NULL,
  `avp_besoin` blob NOT NULL,
  `avp_description` blob NOT NULL COMMENT 'Description du porte a pourvoir',
  `avp_formation` blob NOT NULL COMMENT 'formation a avoir pour postuler',
  `avp_experience` blob NOT NULL COMMENT 'ExpÃƒÆ’Ã‚Â©rience ÃƒÆ’Ã‚Â  avoir',
  `avp_competence_technique` blob NOT NULL COMMENT 'CompÃƒÆ’Ã‚Â©tences techniques a avoirs',
  `avp_qualite_personnel` blob NOT NULL COMMENT 'QualitÃƒÆ’Ã‚Â© personnel ÃƒÆ’Ã‚Â  avoir',
  `avp_nationalite` varchar(100) NOT NULL COMMENT 'NationalitÃƒÆ’Ã‚Â© du candidat',
  `avp_egalite_chance` blob NOT NULL COMMENT 'egalite des chances',
  `avp_condition_travail` blob NOT NULL COMMENT 'Condition d''emploi et de rÃƒÆ’Ã‚Â©munÃƒÆ’Ã‚Â©ration',
  `avp_dure_contrat` varchar(150) NOT NULL COMMENT 'durÃƒÆ’Ã‚Â©e du contrat',
  `avp_procedure_recrutement` blob NOT NULL COMMENT 'procÃƒÆ’Ã‚Â©dure de recrutement',
  `avp_marque_signature` blob NOT NULL COMMENT 'la signature',
  `avp_pj` varchar(255) NOT NULL,
  `avp_date_pourvoir` date NOT NULL,
  `avp_date_deb` date NOT NULL,
  `avp_date_fin` date NOT NULL,
  `avp_date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `avp_age` int(11) NOT NULL,
  `avp_delai_age` date NOT NULL,
  PRIMARY KEY (`avp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `avp1`
--

CREATE TABLE IF NOT EXISTS `avp1` (
  `avp1_id` int(11) NOT NULL AUTO_INCREMENT,
  `avp1_poste` varchar(200) NOT NULL,
  `avp1_reference` varchar(200) NOT NULL,
  `avp1_besoin` blob NOT NULL,
  `avp1_detail` blob NOT NULL COMMENT 'formation a avoir pour postuler',
  `avp1_pj` varchar(255) NOT NULL,
  `avp1_date_pourvoir` date NOT NULL,
  `avp1_date_deb` date NOT NULL,
  `avp1_date_fin` date NOT NULL,
  `avp1_date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `avp1_age` int(11) NOT NULL,
  `avp1_delai_age` date NOT NULL,
  PRIMARY KEY (`avp1_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `CANDIDAT_CERTIFICAT_TRAVAIL` varchar(255) NOT NULL,
  `CANDIDAT_PHOTO` varchar(25) DEFAULT NULL,
  `CANDIDAT_ACTE_NAISS` varchar(255) NOT NULL,
  `CANDIDAT_FICHE_FAMILLE` varchar(255) NOT NULL,
  `CANDIDAT_CERTIF_NAT` varchar(255) NOT NULL,
  `CANDIDAT_CERTIF_DOMICILE` varchar(255) NOT NULL,
  `CANDIDAT_CERTIF_MEDICAL` varchar(255) NOT NULL,
  `CANDIDAT_CASIER_JUDICIAIRE` varchar(255) NOT NULL,
  `CANDIDAT_IS_FAMILLE` tinyint(1) NOT NULL,
  `CANDIDAT_MOTIV_POSTE` longtext NOT NULL,
  `FK_UTIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`CANDIDAT_ID`),
  KEY `candidat_ibfk_1` (`FK_UTIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `candidat`
--

INSERT INTO `candidat` (`CANDIDAT_ID`, `CANDIDAT_TYPE`, `CANDIDAT_CIVILITE`, `CANDIDAT_NOM`, `CANDIDAT_PRENOM`, `CANDIDAT_MATRICULE`, `CANDIDAT_DATE_NAISSANCE`, `CANDIDAT_LIEU_NAISSANCE`, `CANDIDAT_NATIONALITE`, `CANDIDAT_SIT_MAT`, `CANDIDAT_NBRE_ENF`, `CANDIDAT_ADR_PERM`, `CANDIDAT_ADR_ACT`, `CANDIDAT_INDICATIF`, `CANDIDAT_NUM_TEL`, `CANDIDAT_NUM_GSM`, `CANDIDAT_PERMIS`, `CANDIDAT_DEMANDE_EMPLOI`, `CANDIDAT_CV`, `CANDIDAT_CERTIFICAT_TRAVAIL`, `CANDIDAT_PHOTO`, `CANDIDAT_ACTE_NAISS`, `CANDIDAT_FICHE_FAMILLE`, `CANDIDAT_CERTIF_NAT`, `CANDIDAT_CERTIF_DOMICILE`, `CANDIDAT_CERTIF_MEDICAL`, `CANDIDAT_CASIER_JUDICIAIRE`, `CANDIDAT_IS_FAMILLE`, `CANDIDAT_MOTIV_POSTE`, `FK_UTIL_ID`) VALUES
(1, 'Interne', 'M.', 'fall', 'bira', '555555', '1970-04-08', 'fass', 'MAURITANIENNE', 'CELIBATAIRE', 1, 'dfg', 'aftr', '00,+', '', '', 'A1', '', '', '', '', '', '', '', '', '', '', 0, '', 36),
(2, 'Interne', 'Mme', 'vcbbv', 'ddvdfvdf', '666666', '2014-12-11', '', '', 'CELIBATAIRE', 0, 'dcddc', '', '00,+', '', '', 'C', '', '', '', '', '', '', '', '', '', '', 0, '', 50);

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
  `COMP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COMP_LIB` text,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`COMP_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`COMP_ID`, `COMP_LIB`, `FK_CANDIDAT_ID`) VALUES
(1, 'compt', 1);

-- --------------------------------------------------------

--
-- Structure de la table `connaissances_informatiques`
--

CREATE TABLE IF NOT EXISTS `connaissances_informatiques` (
  `INFORMATIQUE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGICIELS` varchar(50) DEFAULT NULL,
  `INFORMATIQUE_NIV` varchar(50) DEFAULT NULL,
  `FK_CANDIDAT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`INFORMATIQUE_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `connaissances_informatiques`
--

INSERT INTO `connaissances_informatiques` (`INFORMATIQUE_ID`, `LOGICIELS`, `INFORMATIQUE_NIV`, `FK_CANDIDAT_ID`) VALUES
(1, 'Base de donnees', 'Base', 1),
(2, 'Traitement de texte', 'Base', 1),
(3, 'yuio', 'Moyen', 1);

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
  PRIMARY KEY (`LANGUE_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE IF NOT EXISTS `dossier` (
  `DOSSIER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOSSIER_NOM` text NOT NULL,
  `DOSSIER_LIEN` text NOT NULL,
  `FK_CANDIDAT_ID` int(11) NOT NULL,
  PRIMARY KEY (`DOSSIER_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `dossier`
--

INSERT INTO `dossier` (`DOSSIER_ID`, `DOSSIER_NOM`, `DOSSIER_LIEN`, `FK_CANDIDAT_ID`) VALUES
(1, '1-demande_emploi', 'demande_emploi/1-555555-fall-bira.PNG', 1),
(2, '1-cv', 'cv/1-555555-fall-bira.PNG', 1),
(3, '1-photo', 'photos/1-555555-fall-bira.PNG', 1),
(4, '2-demande_emploi', 'demande_emploi/2-666666-vcbbv-ddvdfvdf', 2),
(5, '2-cv', 'cv/2-666666-vcbbv-ddvdfvdf.PNG', 2),
(6, '2-photo', 'photos/2-666666-vcbbv-ddvdfvdf.PNG', 2);

-- --------------------------------------------------------

--
-- Structure de la table `eamac_avis`
--

CREATE TABLE IF NOT EXISTS `eamac_avis` (
  `eamac_avisID` int(11) NOT NULL AUTO_INCREMENT,
  `eamac_avisNUM` varchar(255) NOT NULL,
  `eamac_avisTITRE` varchar(100) NOT NULL,
  `eamac_avisDESCRIPTION` text NOT NULL,
  `eamac_avisLIEN` varchar(255) NOT NULL,
  `eamac_avisDATE_DEB` date NOT NULL,
  `eamac_avisDATE_FIN` date NOT NULL,
  `eamac_avisDATE_CREATION` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `eamac_avisAGE` int(11) NOT NULL,
  `eamac_avisDELAI_AGE` date NOT NULL,
  PRIMARY KEY (`eamac_avisID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `ETAB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ETAB_NOM` varchar(25) DEFAULT NULL,
  `ETAB_MAIL` varchar(25) DEFAULT NULL,
  `ETAT_ADRESSE` varchar(100) DEFAULT NULL,
  `ETAB_TEL` varchar(25) DEFAULT NULL,
  `ETAB_FAX` int(11) DEFAULT NULL,
  PRIMARY KEY (`ETAB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `experience_professionnelle`
--

INSERT INTO `experience_professionnelle` (`EXP_ID`, `EXP_ENT_NOM`, `EXP_SEC_ACT`, `EXP_POSTE`, `EXP_DEBUT_TRAVAIL`, `EXP_FIN_TRAVAIL`, `EXP_SALAIRE`, `EXP_NBRE_PERS_SORD`, `EXP_TACHE`, `EXP_MOTIF_DEP`, `FK_CANDIDAT_ID`) VALUES
(1, 'mpt', 'tfre', 'lpo', 'Octobre 2014', 'Ao&ucirc;t 2010', 0, 0, 'zert', 'help', 1),
(2, 'xqsx', 'xqsxsq', 'xqsxqs', 'D&eacute;cembre 2012', 'D&eacute;cembre 2014', 56656, 2, 'xsqxsqx', 'sqxsqxq', 2);

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
  `FORMATION_DIPLOME_FICHIER` longtext NOT NULL,
  PRIMARY KEY (`FORMATION_ID`),
  KEY `FK_CANDIDAT_ID` (`FK_CANDIDAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`FORMATION_ID`, `FORMATION_AN_DEB`, `FORMATION_AN_FIN`, `ETABLISSEMENT_NOM`, `FORMATION_LIEU`, `FORMATION_DIPLOME`, `FORMATION_DOM_PRINC_ETUD`, `FK_CANDIDAT_ID`, `FORMATION_CYCLE`, `FORMATION_DIPLOME_FICHIER`) VALUES
(1, '2006', '2010', 'yet', 'sc', 'DUT, BTS, Bac + 2', 'infprmatique', 1, 'Universitaires', 'diplome/1619-1-555555-fall-bira.png'),
(2, '1961', '1969', 'ddz', 'dsd', 'Lyc&eacute;e, Niveau Bac', 'scsdcsd', 2, 'Universitaires', 'diplome/5518-2-666666-vcbbv-ddvdfvdf.PNG');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `lettre_motivation`
--

INSERT INTO `lettre_motivation` (`LETTRE_MOTIVATION_ID`, `LETTRE_MOTIVATION`, `FK_CANDIDAT_ID`, `FK_ANNONCE_ID`) VALUES
(1, 'yhioppp', 1, 2),
(2, 'frddff', 2, 2),
(3, 'fsdfvsvsfvs', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(34) DEFAULT NULL,
  `mdp` varchar(34) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE IF NOT EXISTS `parametre` (
  `PARAM_ID` int(11) NOT NULL,
  `PARAM_1_DESC` varchar(25) NOT NULL,
  `PARAM_IP` varchar(25) DEFAULT NULL,
  `PARAM_DATE` date DEFAULT NULL,
  `UTILISATEURS_UTILISATEURS_ID` int(11) NOT NULL,
  `FONCTION_FONCTION_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(3) NOT NULL,
  `nom_fr_fr` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_unique` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=243 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `code`, `nom_fr_fr`) VALUES
(242, 221, 'senegal');

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
  PRIMARY KEY (`postulation_id`),
  KEY `FK_util_id` (`FK_UTIL_ID`),
  KEY `FK_lettre_motivation_id` (`postulation_age_candidat`),
  KEY `FK_annonce_id` (`FK_annonce_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `postulation`
--

INSERT INTO `postulation` (`postulation_id`, `postulation_date`, `FK_UTIL_ID`, `postulation_age_candidat`, `FK_annonce_id`) VALUES
(1, '2014-11-27 19:20:30', 36, 43, 2),
(2, '2014-12-02 18:38:28', 50, -1, 2),
(3, '2014-12-02 18:50:28', 50, -1, 4);

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
(1, 'trhu', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `realisation`
--

INSERT INTO `realisation` (`REAL_ID`, `REAL_LIB`, `FK_CANDIDAT_ID`) VALUES
(1, 'memoire\r\nprojet', 1),
(2, 'xsxxsqx', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `utilp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `UTIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UTIL_LOGIN` varchar(35) DEFAULT NULL,
  `UTIL_MDP` varchar(255) DEFAULT NULL,
  `UTIL_EMAIL` varchar(50) DEFAULT NULL,
  `UTIL_ROLE` varchar(8) NOT NULL DEFAULT '0',
  `active` varchar(3) NOT NULL DEFAULT 'non',
  `token` text NOT NULL,
  PRIMARY KEY (`UTIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`UTIL_ID`, `UTIL_LOGIN`, `UTIL_MDP`, `UTIL_EMAIL`, `UTIL_ROLE`, `active`, `token`) VALUES
(34, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@yahoo.fr', '1', 'oui', 'fgdgdfgdfgdfgg'),
(36, 'mlk', '57edb99c1c5b92951f9e905455c487ff1b3931a7', 'malikiyaz@asecna.org', '0', 'oui', '57edb99c1c5b92951f9e905455c487ff1b3931a7'),
(50, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'sowaby@asecna.org', '0', 'oui', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(51, 'test1', 'b444ac06613fc8d63795be9ad0beaf55011936ac', 'sowaby@asecna.org', '0', 'oui', 'b444ac06613fc8d63795be9ad0beaf55011936ac'),
(52, '700203u', '776b96882f44e19c09192dc82e66d4c514d6fcc6', 'egbameyao@asecna.org', '0', 'non', 'cb0cf1543c4ef138a5b474dbea4ee30e5a586e63'),
(53, 'kiprepat@asecna.org', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'kiprepat@asecna.org', '0', 'non', '1ff99f83672addc1b52eb7c2c171a2cd28d577de'),
(54, 'rprecrutement', '5335cdfe4ee2f395f2408d072c919a348be8f130', 'hadjisal@asecna.org', '0', 'oui', '4170ddbe0510d9dd1adbafe8f6b6838585c563d2'),
(55, 'sanekeba', 'fe5a59ceba17df80d6de11d1664f1bd557beff78', 'sanekeb@asecna.org', '0', 'non', 'e8c0385c5bda6c4d7fb513a1413122c5c1af7861'),
(56, 'konezou', 'd26a5a03b188a52b2db42ca6542acfb4f369b67d', 'konezou@asecna.org', '0', 'oui', '5335cdfe4ee2f395f2408d072c919a348be8f130'),
(57, 'rprecrutjo', '2cddd7e3a04b60d2a6bc8d9ac1a9174669f08b32', 'hadjisal@asecna.org', '0', 'oui', '84ca667d050499a34cce27865cf6ed37ff23b197'),
(58, 'mah_abdoul', '292959f6c7ab4f8b0761469ac1f11fc73f43b306', 'mah_abdoul@yahoo.fr', '0', 'non', 'c18ebbdd2923c4e17f0525ef384405f6ca126429'),
(59, 'sowbakary@yahoo.fr', 'a7bfb90ac3a0d81ba51ee1b4522c7fc9a690cea6', 'sowbakary@asecna.org', '0', 'non', '84c6c4107934d4904b0a62d038ec8022aa3f88a2'),
(60, 'kdsane', 'cf5de16dbaf0979a3e903c081cda3018cf31503a', 'kdsane@yahoo.fr', '0', 'non', '9ad2184a860cca4d66d38dd732feec30630a1818'),
(61, 'mouhamed', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'mouhamed@gmail.com', '0', 'non', '7b018dd87be6c7cd0ccd6983d8f42f3588ad6264'),
(62, 'test11', '100c4e57374fc998e57164d4c0453bd3a4876a58', 'sowaby@hotmail.com', '0', 'oui', '100c4e57374fc998e57164d4c0453bd3a4876a58'),
(63, 'bill', '481902ec14eaf3fcfec6be82bd6a63b972ac517f', 'biranefall@outlook.fr', '0', 'non', 'c692d6a10598e0a801576fdd4ecf3c37e45bfbc4'),
(64, 'fffff', '3c81a121f93d44292e148be026ecf004d560de44', 'sowaby@hotmail.com', '0', 'non', 'c441f164b1283bd56e0aa24dabb133150397df87'),
(65, 'ffff', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'affff@yahoo.fr', '0', 'non', 'd33fef58bedd39dc1c2d38f16305b10010e9058e'),
(66, 'rrr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'affff@yahoo.fr', '0', 'non', '8578173555a47d4ea49e697badfda270dee0858f'),
(67, 'azeee', '138445eaa3f2c18791d472ec7d93a9cf282ee478', 'biranefall@outlook.fr', '0', 'non', 'a4e4e832c9f77a3af8066fd88a5dc066321e0f6f'),
(68, 'tttt', '9cfd89887507599ff447c000d54664ed941c5e83', 'mouhamed@gmail.com', '0', 'non', '7278934df282ee1027073d9eedbfee4735c627a5'),
(69, 'zerty', '6bef71c732ebc2ddba25355dcb7958b0fda7ed88', 'affff@yahoo.fr', '0', 'non', '06b18d81cc564009291c92394397abe7257b9b5c'),
(70, 'aze', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', 'aze@hotmail.com', '0', 'oui', 'de271790913ea81742b7d31a70d85f50a3d3e5ae');

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
