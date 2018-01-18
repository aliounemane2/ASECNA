<?php



/* Récupération des données du formulaire */
$ca_type				=isset($_POST['CANDIDAT_TYPE'])						? trim($_POST['CANDIDAT_TYPE'])			: "";
$ca_civilite			=isset($_POST['CANDIDAT_CIVILITE'])					? trim($_POST['CANDIDAT_CIVILITE'])			: "";
$ca_nom					=isset($_POST['CANDIDAT_NOM'])						? trim($_POST['CANDIDAT_NOM'])			:  "";
$ca_prenom				=isset($_POST['CANDIDAT_PRENOM'])					? trim($_POST['CANDIDAT_PRENOM'])			: "";
$ca_login				=isset($_POST['CANDIDAT_LOGIN'])					? trim($_POST['CANDIDAT_LOGIN'])			: "";
$ca_mdp					=isset($_POST['CANDIDAT_MDP'])						? trim($_POST['CANDIDAT_MDP'])			: "";
$ca_is_admin			=isset($_POST['CANDIDAT_IS_ADMIN'])					? trim($_POST['CANDIDAT_IS_ADMIN'])		: "";
$ca_matricule			=isset($_POST['CANDIDAT_MATRICULE'])				? trim($_POST['CANDIDAT_MATRICULE'])		: "";
$ca_date_nais  			=isset($_POST['CANDIDAT_DATE_NAISSANCE'])			? trim($_POST['CANDIDAT_DATE_NAISSANCE'])		: "";
$ca_lieu_nais			=isset($_POST['CANDIDAT_LIEU_NAISSANCE'])			? trim($_POST['CANDIDAT_LIEU_NAISSANCE'])		: "";
$ca_nation				=isset($_POST['CANDIDAT_NATIONALITE'])				? trim($_POST['CANDIDAT_NATIONALITE'])		: "";
$ca_sit_mat 			=isset($_POST['CANDIDAT_SIT_MAT'])					? trim($_POST['CANDIDAT_SIT_MAT'])			: "";
$ca_nbre_enf			=isset($_POST['CANDIDAT_NBRE_ENF'])					? trim($_POST['CANDIDAT_NBRE_ENF'])		: "";
$ca_adr_perm			=isset($_POST['CANDIDAT_ADR_PERM'])					? trim($_POST['CANDIDAT_ADR_PERM'])		: "";
$ca_adr_act 			=isset($_POST['CANDIDAT_ADR_ACT'])					? trim($_POST['CANDIDAT_ADR_ACT'])			: "";
$ca_num_tel 			=isset($_POST['CANDIDAT_NUM_TEL'])					? trim($_POST['CANDIDAT_NUM_TEL'])			: "";
$ca_num_gsm		 		=isset($_POST['CANDIDAT_NUM_GSM'])					? trim($_POST['CANDIDAT_NUM_GSM'])		: "";
$ca_email 				=isset($_POST['CANDIDAT_EMAIL'])					? trim($_POST['CANDIDAT_EMAIL'])			: "";
$ca_permis 				=isset($_POST['CANDIDAT_PERMIS'])					? trim($_POST['CANDIDAT_PERMIS'])			: "";
$ca_is_fam 				=isset($_POST['CANDIDAT_IS_FAMILLE'])				? trim($_POST['CANDIDAT_IS_FAMILLE'])		: "";
$ca_mot_poste	 		=isset($_POST['CANDIDAT_MOTIV_POSTE'])				? trim($_POST['CANDIDAT_MOTIV_POSTE'])				: "";

$fa_nom 				=isset($_POST['FAMILLE_NOM[]'])						? trim($_POST['FAMILLE_NOM[]'])						: "";
$fa_prenom 				=isset($_POST['FAMILLE_PRENOM[]'])					? trim($_POST['FAMILLE_PRENOM[]'])					: "";
$fa_structure 			=isset($_POST['FAMILLE_STRUCTURE[]'])					? trim($_POST['FAMILLE_STRUCTURE[]'])					: "";
$fa_degre 				=isset($_POST['FAMILLE_DEGRE[]'])						? trim($_POST['FAMILLE_DEGRE[]'])						: "";
$fo_an_deb 				=isset($_POST['FORMATION_AN_DEB[]'])					? trim($_POST['FORMATION_AN_DEB[]'])					: "";
$fo_an_fin 				=isset($_POST['FORMATION_AN_FIN[]'])					? trim($_POST['FORMATION_AN_FIN[]'])					: "";
$etab_nom 				=isset($_POST['ETABLISSEMENT_NOM[]'])					? trim($_POST['ETABLISSEMENT_NOM[]'])					: "";
$fo_lieu 				=isset($_POST['FORMATION_LIEU[]'])					? trim($_POST['FORMATION_LIEU[]'])					: "";
$fo_diplome 			=isset($_POST['FORMATION_DIPLOME[]'])					? trim($_POST['FORMATION_DIPLOME[]'])					: "";
$fo_dom_princ_etud 		=isset($_POST['FORMATION_DOM_PRINC_ETUD[]'])			? trim($_POST['FORMATION_DOM_PRINC_ETUD[]'])			: "";
$fo_cycle 				=isset($_POST['FORMATION_CYCLE[]'])					? trim($_POST['FORMATION_CYCLE[]'])					: "";
$fo_diplome_fichier 	=isset($_POST['FORMATION_DIPLOME_FICHIER[]'])			? trim($_POST['FORMATION_DIPLOME_FICHIER[]'])			: "";
$real_lib 				=isset($_POST['REAL_LIB'])							? trim($_POST['REAL_LIB'])							: "";
$af_an_deb 				=isset($_POST['FORMATION_AN_DEB[]'])					? trim($_POST['FORMATION_AN_DEB[]'])					: "";
$af_lib 				=isset($_POST['FORM_LIB[]'])							? trim($_POST['FORM_LIB[]'])							: "";
$af_nom 				=isset($_POST['FORM_NOM[]'])							? trim($_POST['FORM_NOM[]'])							: "";
$af_intitule 			=isset($_POST['FORM_INTITULE[]'])						? trim($_POST['FORM_INTITULE[]'])						: "";
$af_dip_fic 			=isset($_POST['AUTRE_FORMATION_DIPLOME_FICHIER[]'])	? trim($_POST['AUTRE_FORMATION_DIPLOME_FICHIER[]'])	: "";
$exp_ent_nom 			=isset($_POST['EXP_ENT_NOM[]'])						? trim($_POST['EXP_ENT_NOM[]'])			: "";
$exp_sec_act 			=isset($_POST['EXP_SEC_ACT[]'])						? trim($_POST['EXP_SEC_ACT[]'])				: "";
$exp_poste 				=isset($_POST['EXP_POSTE[]'])							? trim($_POST['EXP_POSTE[]'])				: "";
$exp_deb_travail 		=isset($_POST['EXP_DEBUT_TRAVAIL[]'])					? trim($_POST['EXP_DEBUT_TRAVAIL[]'])			: "";
$exp_fin_travail 		=isset($_POST['EXP_FIN_TRAVAIL[]'])					? trim($_POST['EXP_FIN_TRAVAIL[]'])			: "";
$exp_salaire 			=isset($_POST['EXP_SALAIRE[]'])						? trim($_POST['EXP_SALAIRE[]'])				: "";
$exp_nbre_pers_sord 	=isset($_POST['EXP_NBRE_PERS_SORD[]'])				? trim($_POST['EXP_NBRE_PERS_SORD[]'])		: "";
$exp_tache 				=isset($_POST['EXP_TACHE[]'])							? trim($_POST['EXP_TACHE[]'])				: "";
$exp_motif_dep 			=isset($_POST['EXP_MOTIF_DEP[]'])						? trim($_POST['EXP_MOTIF_DEP[]'])			: "";
$logiciels 				=isset($_POST['LOGICIELS[]'])							? trim($_POST['LOGICIELS[]'])				: "";
$infor_niv 				=isset($_POST['INFORMATIQUE_NIV[]'])					? trim($_POST['INFORMATIQUE_NIV[]'])			: "";
$lan_nom 				=isset($_POST['LANGUE_NOM[]'])						? trim($_POST['LANGUE_NOM[]'])			: "";
$lan_orale 				=isset($_POST['LANGUE_ORALE[]'])						? trim($_POST['LANGUE_ORALE[]'])			: "";
$lan_ecrite 			=isset($_POST['LANGUE_ECRITE[]'])						? trim($_POST['LANGUE_ECRITE[]'])			: "";
$lan_lecture 			=isset($_POST['LANGUE_LECTURE[]'])					? trim($_POST['LANGUE_LECTURE[]'])			: "";
$lettre_motivation 		=isset($_POST['LETTRE_MOTIVATION'])					? trim($_POST['LETTRE_MOTIVATION'])			: "";
$qual_lib 				=isset($_POST['QUAL_LIB'])							? trim($_POST['QUAL_LIB'])				: "";
$ref_nom_ent 			=isset($_POST['REF_NOM_ENT[]'])						? trim($_POST['REF_NOM_ENT[]'])			: "";
$ref_pers_cont 			=isset($_POST['REF_PERS_CONT[]'])						? trim($_POST['REF_PERS_CONT[]'])			: "";
$ref_post_occ 			=isset($_POST['REF_POST_OCC[]'])						? trim($_POST['REF_POST_OCC[]'])			: "";
$ref_tel 				=isset($_POST['REF_TEL[]'])							? trim($_POST['REF_TEL[]'])				: "";
$ref_email 				=isset($_POST['REF_EMAIL[]'])							? trim($_POST['REF_EMAIL[]'])				: "";


?>