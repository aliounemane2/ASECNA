 <?php
function age($annee_naissance, $mois_naissance, $jour_naissance, $timestamp =0) {

	if(empty($timestamp))
		$timestamp = time();
	//On evalue l'age, à un an par exces
	$age = date('Y',$timestamp) - $annee_naissance;
 
	//On retire un an si l'anniversaire n'est pas encore passé
	if($mois_naissance > date('n', $timestamp) || ( $mois_naissance== date('n', $timestamp) && $jour_naissance > date('j', $timestamp)))
		$age--;
 
	return $age;
}

?>
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
$ca_sexe 				=isset($_POST['CANDIDAT_SEXE'])						? trim($_POST['CANDIDAT_SEXE'])			: "";
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


/*$_POST["CANDIDAT_TYPE"]=mysql_escape_string($_POST["CANDIDAT_TYPE"]);	
$_POST["CANDIDAT_CIVILITE"]=mysql_escape_string($_POST["CANDIDAT_CIVILITE"]);		
$_POST["CANDIDAT_NOM"]=mysql_escape_string($_POST["CANDIDAT_NOM"]);
$_POST["CANDIDAT_PRENOM"]=mysql_escape_string($_POST["CANDIDAT_PRENOM"]);
$_POST["CANDIDAT_LOGIN"]=mysql_escape_string($_POST["CANDIDAT_LOGIN"]);
$_POST["CANDIDAT_MDP"]=mysql_escape_string($_POST["CANDIDAT_MDP"]);
$_POST["CANDIDAT_IS_ADMIN"]=mysql_escape_string($_POST["CANDIDAT_IS_ADMIN"]);
$_POST["CANDIDAT_MATRICULE"]=mysql_escape_string($_POST["CANDIDAT_MATRICULE"]);
$_POST["CANDIDAT_DATE_NAISSANCE"]=mysql_escape_string($_POST["CANDIDAT_DATE_NAISSANCE"]);
$_POST["CANDIDAT_LIEU_NAISSANCE"]=mysql_escape_string($_POST["CANDIDAT_LIEU_NAISSANCE"]);
$_POST["CANDIDAT_NATIONALITE"]=mysql_escape_string($_POST["CANDIDAT_NATIONALITE"]);
$_POST["CANDIDAT_SIT_MAT"]=mysql_escape_string($_POST["CANDIDAT_SIT_MAT"]);
$_POST["CANDIDAT_NBRE_ENF"]=mysql_escape_string($_POST["CANDIDAT_NBRE_ENF"]);
$_POST["CANDIDAT_SEXE"]=mysql_escape_string($_POST["CANDIDAT_SEXE"]);
$_POST["CANDIDAT_ADR_PERM"]=mysql_escape_string($_POST["CANDIDAT_ADR_PERM"]);
$_POST["CANDIDAT_ADR_ACT"]=mysql_escape_string($_POST["CANDIDAT_ADR_ACT"]);
$_POST["CANDIDAT_NUM_TEL"]=mysql_escape_string($_POST["CANDIDAT_NUM_TEL"]);
$_POST["CANDIDAT_NUM_GSM"]=mysql_escape_string($_POST["CANDIDAT_NUM_GSM"]);
$_POST["CANDIDAT_EMAIL"]=mysql_escape_string($_POST["CANDIDAT_EMAIL"]);
$_POST["CANDIDAT_PERMIS"]=mysql_escape_string($_POST["CANDIDAT_PERMIS"]);
$_POST["CANDIDAT_IS_FAMILLE"]=mysql_escape_string($_POST["CANDIDAT_IS_FAMILLE"]);
$_POST["CANDIDAT_MOTIV_POSTE"]=mysql_escape_string($_POST["CANDIDAT_MOTIV_POSTE"]);
$_POST["FAMILLE_NOM"]=mysql_escape_string($_POST["FAMILLE_NOM"]);
$_POST["FAMILLE_PRENOM"]=mysql_escape_string($_POST["FAMILLE_PRENOM"]);
$_POST["FAMILLE_STRUCTURE"]=mysql_escape_string($_POST["FAMILLE_STRUCTURE"]);
$_POST["FAMILLE_DEGRE"]=mysql_escape_string($_POST["FAMILLE_DEGRE"]);
$_POST["FORMATION_AN_DEB"]=mysql_escape_string($_POST["FORMATION_AN_DEB"]);
$_POST["FORMATION_AN_FIN"]=mysql_escape_string($_POST["FORMATION_AN_FIN"]);
$_POST["ETABLISSEMENT_NOM"]=mysql_escape_string($_POST["ETABLISSEMENT_NOM"]);
$_POST["FORMATION_LIEU"]=mysql_escape_string($_POST["FORMATION_LIEU"]);
$_POST["FORMATION_DIPLOME"]=mysql_escape_string($_POST["FORMATION_DIPLOME"]);
$_POST["FORMATION_DOM_PRINC_ETUD"]=mysql_escape_string($_POST["FORMATION_DOM_PRINC_ETUD"]);
$_POST["FORMATION_CYCLE"]=mysql_escape_string($_POST["FORMATION_CYCLE"]);
$_POST["FORMATION_DIPLOME_FICHIER"]=mysql_escape_string($_POST["FORMATION_DIPLOME_FICHIER"]);
$_POST["REAL_LIB"]=mysql_escape_string($_POST["REAL_LIB"]);
$_POST["FORMATION_AN_DEB"]=mysql_escape_string($_POST["FORMATION_AN_DEB"]);
$_POST["FORM_LIB"]=mysql_escape_string($_POST["FORM_LIB"]);
$_POST["FORM_NOM"]=mysql_escape_string($_POST["FORM_NOM"]);
$_POST["FORM_INTITULE"]=mysql_escape_string($_POST["FORM_INTITULE"]);
$_POST["AUTRE_FORMATION_DIPLOME_FICHIER"]=mysql_escape_string($_POST["AUTRE_FORMATION_DIPLOME_FICHIER"]);
$_POST["EXP_ENT_NOM"]=mysql_escape_string($_POST["EXP_ENT_NOM"]);
$_POST["EXP_SEC_ACT"]=mysql_escape_string($_POST["EXP_SEC_ACT"]);
$_POST["EXP_POSTE"]=mysql_escape_string($_POST["EXP_POSTE"]);
$_POST["EXP_DEBUT_TRAVAIL"]=mysql_escape_string($_POST["EXP_DEBUT_TRAVAIL"]);
$_POST["EXP_FIN_TRAVAIL"]=mysql_escape_string($_POST["EXP_FIN_TRAVAIL"]);
$_POST["EXP_SALAIRE"]=mysql_escape_string($_POST["EXP_SALAIRE"]);
$_POST["EXP_NBRE_PERS_SORD"]=mysql_escape_string($_POST["EXP_NBRE_PERS_SORD"]);
$_POST["EXP_TACHE"]=mysql_escape_string($_POST["EXP_TACHE"]);
$_POST["EXP_MOTIF_DEP"]=mysql_escape_string($_POST["EXP_MOTIF_DEP"]);
$_POST["LOGICIELS"]=mysql_escape_string($_POST["LOGICIELS"]);
$_POST["INFORMATIQUE_NIV"]=mysql_escape_string($_POST["INFORMATIQUE_NIV"]);
$_POST["LANGUE_NOM"]=mysql_escape_string($_POST["LANGUE_NOM"]);
$_POST["LANGUE_ORALE"]=mysql_escape_string($_POST["LANGUE_ORALE"]);
$_POST["LANGUE_ECRITE"]=mysql_escape_string($_POST["LANGUE_ECRITE"]);
$_POST["LANGUE_LECTURE"]=mysql_escape_string($_POST["LANGUE_LECTURE"]);
$_POST["LETTRE_MOTIVATION"]=mysql_escape_string($_POST["LETTRE_MOTIVATION"]);
$_POST["QUAL_LIB"]=mysql_escape_string($_POST["QUAL_LIB"]);
$_POST["REF_NOM_ENT"]=mysql_escape_string($_POST["REF_NOM_ENT"]);
$_POST["REF_PERS_CONT"]=mysql_escape_string($_POST["REF_PERS_CONT"]);
$_POST["REF_POST_OCC"]=mysql_escape_string($_POST["REF_POST_OCC"]);
$_POST["REF_TEL"]=mysql_escape_string($_POST["REF_TEL"]);
$_POST["REF_EMAIL"]=mysql_escape_string($_POST["REF_EMAIL"]);*/




 
$erreur="";
$var=isset($_POST["envoyer"]);
$nom=isset($_POST["CANDIDAT_NOM"]) ? trim($_POST["CANDIDAT_NOM"]): "";
$prenom=isset($_POST["CANDIDAT_PRENOM"]) ? trim($_POST["CANDIDAT_PRENOM"]): "";
$test=$_SESSION["id_user"];
$test1=$_GET['id_avis'];
if($var <> ""){
$exereq = mysql_query("select count(FK_UTIL_ID) as nblogin from  candidat where FK_UTIL_ID ='" . $_SESSION["id_user"] . "'");
//$exereq=mysql_query("select count(CANDIDAT_LOGIN) as nblogin from  candidat where CANDIDAT_LOGIN ='".$_POST["CANDIDAT_LOGIN"]."'");
$nblogin = mysql_fetch_array($exereq);
$nblogin = $nblogin['nblogin']; 
if($nblogin >=1 ){
	$erreur="<center><font color='#FF000'>Le login existe deja!</font></center>"; 
	}else{

	
	  // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
		 if((isset($_POST["CANDIDAT_NOM"]))&&($_POST["CANDIDAT_NOM"]!=''))
		 {
		
			$sql ='INSERT INTO candidat VALUES ("",
			"'.htmlentities($_POST["CANDIDAT_TYPE"]).'",
			"'.htmlentities($_POST["CANDIDAT_CIVILITE"]).'",
			"'.htmlentities($_POST["CANDIDAT_NOM"]).'",
			"'.htmlentities($_POST["CANDIDAT_PRENOM"]).'",
			"'.htmlentities($_POST["CANDIDAT_MATRICULE"]).'",
			"'.htmlentities($_POST["CANDIDAT_DATE_NAISSANCE"]).'",
			"'.htmlentities($_POST["CANDIDAT_LIEU_NAISSANCE"]).'",
			"'.htmlentities($_POST["CANDIDAT_NATIONALITE"]).'",
			"'.htmlentities($_POST["CANDIDAT_SIT_MAT"]).'",
			"'.htmlentities($_POST["CANDIDAT_NBRE_ENF"]).'",
			"'.htmlentities($_POST["CANDIDAT_SEXE"]).'",
			"'.htmlentities($_POST["CANDIDAT_ADR_PERM"]).'",
			"'.htmlentities($_POST["CANDIDAT_ADR_ACT"]).'",
			"'.htmlentities($_POST["CANDIDAT_NUM_TEL"]).'",
			"'.htmlentities($_POST["CANDIDAT_NUM_GSM"]).'",
			"'.htmlentities($_POST["CANDIDAT_PERMIS"]).'",
			"",
			"",
			"",
			"",
			"",
			"",
			"",
			"",
			"",
			"",
			"'.htmlentities($_POST["CANDIDAT_IS_FAMILLE"]).'",
			"",
			"'.$test.'")';
		 
			mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
			// on récupère le dernier numéro inséré, soit le numéro de tibo
			$numero_insere = mysql_insert_id();	  

			/// Pour les uploads
			if(empty($_POST['CANDIDAT_MATRICULE'])) 
				$_SESSION['identifiant'] = $numero_insere."-".$_POST['CANDIDAT_NOM']."-".$_POST['CANDIDAT_PRENOM'];
			else
				$_SESSION['identifiant'] = $numero_insere."-".$_POST['CANDIDAT_MATRICULE']."-".$_POST['CANDIDAT_NOM']."-".$_POST['CANDIDAT_PRENOM'];
				
			$_SESSION['id_candidat'] = $numero_insere;
			$_SESSION['identifiant'] = $_SESSION['identifiant'];
			
			/************INSERTION DANS LA TABLE FAMILLE***********/
			for($i=0; $i<sizeof($_POST["FAMILLE_NOM"]); $i++)
			{	
				if($_POST["FAMILLE_NOM"][$i]='')
				{
					$sql= 'INSERT INTO famille VALUES ("",
					"'.htmlentities($_POST["FAMILLE_NOM"][$i]).'",
					"'.htmlentities($_POST["FAMILLE_PRENOM"][$i]).'",
					"'.htmlentities($_POST["FAMILLE_STRUCTURE"][$i]).'",
					"'.htmlentities($_POST["FAMILLE_DEGRE"][$i]).'",
					"'.$numero_insere.'")';
					// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
					mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
				}
			}
		}
		
	/***************INSERTION DANS LA TABLE FORMATION AVEC AJOUT MULTIPLES**********/
if(isset($_POST["FORMATION_AN_DEB"]))
{
	
	for($i=0; $i<sizeof($_POST["FORMATION_LIEU"]); $i++){
		if($_POST["ETABLISSEMENT_NOM"][$i]!='')
		{
			$P= rand(10,10000);
			$extension = substr($_FILES['FORMATION_DIPLOME_FICHIER']['name'][$i],-4,4);
			$chemin = "diplome/".$P."-".$_SESSION['identifiant'].$extension; 
			if(move_uploaded_file($_FILES['FORMATION_DIPLOME_FICHIER']['tmp_name'][$i], $chemin)) {
				echo "Le diplome ".  basename( $_FILES['FORMATION_DIPLOME_FICHIER']['name'][$i]). 
				" a ete bien sauvegarde.".'<br />';
			} 
			else
				echo "Erreur dans la sauvegarde du diplome!.".'<br />';

				$sql= 'INSERT INTO formation VALUES ("",
								"'.$_POST["FORMATION_AN_DEB"][$i].'",
								"'.$_POST["FORMATION_AN_FIN"][$i].'",
								"'.$_POST["ETABLISSEMENT_NOM"][$i].'",
								"'.$_POST["FORMATION_LIEU"][$i].'",
								"'.$_POST["FORMATION_DIPLOME"][$i].'",
								"'.$_POST["FORMATION_DOM_PRINC_ETUD"][$i].'",
								"'.$numero_insere.'",
								"'.$_POST["FORMATION_CYCLE"][$i].'",
								"'.$chemin.'")';

				// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
				mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		}
							
	}
}


/*********INSERTION DANS LA TABLE realisation ********/
if((isset($_POST["REAL_LIB"]))&&($_POST["REAL_LIB"]!=''))
{
	$_POST["REAL_LIB"]=($_POST["REAL_LIB"]);
	$sql= 'INSERT INTO realisation  VALUES ("",
									"'.htmlentities($_POST["REAL_LIB"]).'",
									"'.$numero_insere.'")';
									
	// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
}


	/*********INSERTION DANS LA TABLE AUTRE FORMATION ********/
if(isset($_POST["FORMATION_AN_DEB"]))
{
	$_POST["FORMATION_AN_DEB"]=($_POST["FORMATION_AN_DEB"]);
	$_POST["FORM_LIB"]=($_POST["FORM_LIB"]);
	$_POST["FORM_NOM"]=($_POST["FORM_NOM"]);
	$_POST["FORM_INTITULE"]=($_POST["FORM_INTITULE"]);
	$_POST["AUTRE_FORMATION_DIPLOME_FICHIER"]=($_POST["AUTRE_FORMATION_DIPLOME_FICHIER"]);
	
	for($i=0; $i<sizeof($_POST["FORM_AN_DEB"]); $i++){
		if($_POST["FORM_NOM"][$i]!='')
		{
			$o= rand(10,10000);
			$extension = substr($_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name'][$i],-4,4);
			$chemin = "diplome/".$o."-".$_SESSION['identifiant'].$extension; 
			if(move_uploaded_file($_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['tmp_name'][$i], $chemin)) {
				echo "Le diplome ".  basename( $_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name'][$i]). 
				" a ete bien sauvegarde.".'<br />';
			} 
			else
				echo "Erreur dans la sauvegarde du diplome!.".'<br />';	
				$sql= 'INSERT INTO AUTRE_FORMATION  VALUES ("",
				"'.$_POST["FORMATION_AN_DEB"][$i].'",
				"'.$_POST["FORM_LIB"][$i].'",
				"'.$_POST["FORM_NOM"][$i].'",
				"'.$_POST["FORM_INTITULE"][$i].'",
				"'.$numero_insere.'",
				"'.$chemin.'")';

				// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
				mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
			}
	}
}
		
		// on récupère le dernier numéro inséré, soit le numéro de tibo
	//$_SESSION['id_candidat'] = mysql_insert_id();	  

	// Pour les uploads
	if(empty($_POST['CANDIDAT_MATRICULE'])) 
		$_SESSION['identifiant'] = $_SESSION['id_candidat']."-".$_POST['CANDIDAT_NOM']."-".$_POST['CANDIDAT_PRENOM'];
	else
		$_SESSION['identifiant'] = $_SESSION['id_candidat']."-".$_POST['CANDIDAT_MATRICULE']."-".$_POST['CANDIDAT_NOM']."-".$_POST['CANDIDAT_PRENOM'];

	/************INSERTION DES PIECES JOINTES***********/


	/*******************INSERTION DANS LA TABLE EXPERIENCES PROFESSIONNELLES*******************/
	for($i=0; $i<sizeof($_POST["EXP_ENT_NOM"]); $i++)
	{
		if($_POST["EXP_ENT_NOM"][$i]!='')
		{
			$sql= 'INSERT INTO experience_professionnelle VALUES ("",
			"'.$_POST["EXP_ENT_NOM"][$i].'",
			"'.$_POST["EXP_SEC_ACT"][$i].'",
			"'.$_POST["EXP_POSTE"][$i].'",
			"'.$_POST["EXP_DEBUT_TRAVAIL"][$i].'",
			"'.$_POST["EXP_FIN_TRAVAIL"][$i].'",
			"'.$_POST["EXP_SALAIRE"][$i].'",
			"'.$_POST["EXP_NBRE_PERS_SORD"][$i].'",
			"'.$_POST["EXP_TACHE"][$i].'",
			"'.$_POST["EXP_MOTIF_DEP"][$i].'",
			"'.$numero_insere.'")';
			// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
				  mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
		}
	}


	/*******************INSERTION DANS LA TABLE CONNAISSANCE INFORMATIQUE*******************/
	for($i=0; $i<sizeof($_POST["LOGICIELS"]); $i++)
	{
		if($_POST["INFORMATIQUE_NIV"][$i]!='')
		{
			$sql= 'INSERT INTO connaissances_informatiques VALUES ("",
			"'.$_POST["LOGICIELS"][$i].'",
			"'.$_POST["INFORMATIQUE_NIV"].'",
			"'.$numero_insere.'")';
			// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
			mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
		}	  
	}

		
	/*******************INSERTION DANS LA TABLE AUTRE CONNAISSANCE INFORMATIQUE*******************/
	for($i=0; $i<sizeof($_POST["AUTRE_LOGICIELS"]); $i++)
	{
		if($_POST["AUTRE_INFORMATIQUE_NIV"][$i]!='')
		{
			$sql= 'INSERT INTO connaissances_informatiques VALUES ("",
			"'.$_POST["AUTRE_LOGICIELS"][$i].'",
			"'.$_POST["AUTRE_INFORMATIQUE_NIV"].'",
			"'.$numero_insere.'")';
			// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
				  mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
		}	 
	}

	/*******************INSERTION DANS LA TABLE CONNAISSANCE LINGUISTIQUE*******************/
	for($i=0; $i<sizeof($_POST["LANGUE_NOM"]); $i++)
	{
		if($_POST["LANGUE_NOM"][$i]!='')
		{
			$sql= 'INSERT INTO connaissances_linguistiques VALUES ("",
			"'.$_POST["LANGUE_NOM"][$i].'",
			"'.$_POST["LANGUE_ORALE"][$i].'",
			"'.$_POST["LANGUE_ECRITE"][$i].'",
			"'.$_POST["LANGUE_LECTURE"][$i].'",
			"'.$numero_insere.'")';
			// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
			mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		}
	}

	/*******************INSERTION DANS LA TABLE AUTRE CONNAISSANCE LINGUISTIQUE*******************/
	for($i=0; $i<sizeof($_POST["AUTRE_LANGUE_NOM"]); $i++)
	{
		if($_POST["AUTRE_LANGUE_NOM"][$i]!='')
		{
			$sql= 'INSERT INTO connaissances_linguistiques VALUES ("",
			"'.$_POST["AUTRE_LANGUE_NOM"][$i].'",
			"'.$_POST["AUTRE_LANGUE_ORALE"][$i].'",
			"'.$_POST["AUTRE_LANGUE_ECRITE"][$i].'",
			"'.$_POST["AUTRE_LANGUE_LECTURE"][$i].'",
			"'.$numero_insere.'")';
			// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
			mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		}
	}

	if($_POST["COMP_LIB"]!='')
	{
		$sql= 'INSERT INTO COMPETENCES  VALUES ("",
		"'.$_POST["COMP_LIB"].'",
		"'.$numero_insere.'")';
		// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
	}

	if($_POST["QUAL_LIB"]!='')
	{
		$sql= 'INSERT INTO QUALITES  VALUES ("",
		"'.$_POST["QUAL_LIB"].'",
		"'.$numero_insere.'")';
		// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
	}

	if($_POST["LETTRE_MOTIVATION"]!='')
	{
	
	
		$sql= 'INSERT INTO lettre_motivation VALUES ("",
		"'.$_POST["MOTIV_POSTE"].'",
		"'.$_POST["LETTRE_MOTIVATION"].'",
		"'.$numero_insere.'",
		"'.$test1.'")';
		
		
		
		// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	}
		  
	/*******************INSERTION DANS LA TABLE REFERENCE*******************/
	for($i=0; $i<sizeof($_POST["REF_NOM_ENT"]); $i++)
	{
		if($_POST["REF_NOM_ENT"][$i]!='')
		{
			$sql= 'INSERT INTO reference VALUES ("",
			"'.$_POST["REF_NOM_ENT"][$i].'",
			"'.$_POST["REF_PERS_CONT"][$i].'",
			"'.$_POST["REF_POST_OCC"][$i].'",
			"'.$_POST["REF_TEL"][$i].'",
			"'.$_POST["REF_EMAIL"][$i].'",
			"'.$numero_insere.'")';

			// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
			mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		}
	}

// Début Transfert des fichiers

// Création du répertoire de l'agent




//mkdir($numero_insere);	
$extensionDemandeEmloi = substr($_FILES['CANDIDAT_DEMANDE_EMPLOI']['name'],-4,4);
$cheminPhotoDemandeEmloi = "demande_emploi/".$_SESSION['identifiant'].$extension; 
$nomfichierDemandeEmloi = $numero_insere."-demande_emploi";
if(move_uploaded_file($_FILES['CANDIDAT_DEMANDE_EMPLOI']['tmp_name'], $cheminPhotoDemandeEmloi)) {
    echo "La demande d'emploi  ".  basename( $_FILES['CANDIDAT_DEMANDE_EMPLOI']['name']). 
    " a ete bien sauvegarde.".'<br />';
} 
else
	echo "Erreur dans la sauvegarde de la demande d'emploi!.".'<br />';

$sql= 'INSERT INTO dossier VALUES ("",
"'.$nomfichierDemandeEmloi.'",
"'.$cheminPhotoDemandeEmloi.'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 


$extensionCV = substr($_FILES['CANDIDAT_CV']['name'],-4,4);
$cheminPhotoCV = "cv/".$_SESSION['identifiant'].$extensionCV; 
$nomfichierCV = $numero_insere."-cv";

if(move_uploaded_file($_FILES['CANDIDAT_CV']['tmp_name'], $cheminPhotoCV)) {
    echo "Le cv  ".  basename( $_FILES['CANDIDAT_CV']['name']). 
    " a ete bien sauvegarde.".'<br />';
} 
else
	echo "Erreur dans la sauvegarde du cv!.".'<br />';	
	
$sql= 'INSERT INTO dossier VALUES ("",
"'.$nomfichierCV.'",
"'.$cheminPhotoCV.'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 

$extensionCertificatTravail = substr($_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name'],-4,4);
$cheminPhotoCertificatTravail = "certificat_travail/".$_SESSION['identifiant'].$extensionCertificatTravail; 
$nomfichierCertificatTravail = $numero_insere."-certificat-travail";

if(move_uploaded_file($_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['tmp_name'], $cheminPhotoCertificatTravail)) {
    echo "Le certificat de travail  ".  basename( $_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name']). 
    " a ete bien sauvegarde.".'<br />';
} 
else
	echo "Erreur dans la sauvegarde du certificat de travail!.".'<br />';	
$sql= 'INSERT INTO dossier VALUES ("",
"'.$nomfichierCertificatTravail.'",
"'.$cheminPhotoCertificatTravail.'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 

$extensionPhoto = substr($_FILES['CANDIDAT_PHOTO']['name'],-4,4);
$cheminPhoto = "photos/".$_SESSION['identifiant'].$extensionPhoto; 
$nomfichierPhoto = $numero_insere."-photo";

if(move_uploaded_file($_FILES['CANDIDAT_PHOTO']['tmp_name'], $cheminPhoto)) {
    echo "La photo  ".  basename( $_FILES['CANDIDAT_PHOTO']['name']). 
    " a ete bien sauvegarde.".'<br />';
} 
else
	echo "Erreur dans la sauvegarde de la photo!.".'<br />';
$sql= 'INSERT INTO dossier VALUES ("",
"'.$nomfichierPhoto.'",
"'.$cheminPhoto.'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 


$extensionActeNaissance = substr($_FILES['CANDIDAT_ACTE_NAISS']['name'],-4,4);
$cheminActeNaissance = "acteNaissance/".$_SESSION['identifiant'].$extensionActeNaissance; 
$nomfichierActeNaissance = $numero_insere."-acte-naissance";

if(move_uploaded_file($_FILES['CANDIDAT_ACTE_NAISS']['tmp_name'], $cheminActeNaissance)) {
    echo "L'acte de naissance  ".  basename( $_FILES['CANDIDAT_ACTE_NAISS']['name']). 
    " a ete bien sauvegarde.".'<br />';
} 
else
	echo "Erreur dans la sauvegarde de l'acte de naissance!".'<br />';
$sql= 'INSERT INTO dossier VALUES ("",
"'.$nomfichierActeNaissance.'",
"'.$cheminActeNaissance.'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 

$extensionFicheFamille = substr($_FILES['CANDIDAT_FICHE_FAMILLE']['name'],-4,4);
$cheminFicheFamille = "ficheFamille/".$_SESSION['identifiant'].$extensionFicheFamille; 
$nomfichierFicheFamille = $numero_insere."-fiche-famille";

if(move_uploaded_file($_FILES['CANDIDAT_FICHE_FAMILLE']['tmp_name'], $cheminFicheFamille)) {
    echo "La fiche famille  ".  basename( $_FILES['CANDIDAT_FICHE_FAMILLE']['name']). 
    " a ete bien sauvegarde.".'<br />';
} 
else
	echo "Erreur dans la sauvegarde de la fiche famille!".'<br />';
$sql= 'INSERT INTO dossier VALUES ("",
"'.$nomfichierFicheFamille.'",
"'.$cheminFicheFamille.'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 

	
$extensioncertificatNationalite = substr($_FILES['CANDIDAT_CERTIF_NAT']['name'],-4,4);
$chemincertificatNationalite = "certificatNationalite/".$_SESSION['identifiant'].$extensioncertificatNationalite; 	
$nomfichiercertificatNationalite = $numero_insere."-certificat-nationalite";

if(move_uploaded_file($_FILES['CANDIDAT_CERTIF_NAT']['tmp_name'], $chemincertificatNationalite)) {
    echo "Le certificat de nationalite  ".  basename( $_FILES['CANDIDAT_CERTIF_NAT']['name']). 
    " a ete bien sauvegarde.".'<br />';
} 
else
	echo "Erreur dans la sauvegarde du certficat de nationalite!".'<br />';
$sql= 'INSERT INTO dossier VALUES ("",
"'.$nomfichiercertificatNationalite.'",
"'.$chemincertificatNationalite.'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 


$extensioncertificatDomicile = substr($_FILES['CANDIDAT_CERTIF_DOMICILE']['name'],-4,4);
$chemincertificatDomicile = "certificatDomicile/".$_SESSION['identifiant'].$extensioncertificatDomicile;	
$nomfichiercertificatDomicile = $numero_insere."-certificat-domicile";

if(move_uploaded_file($_FILES['CANDIDAT_CERTIF_DOMICILE']['tmp_name'], $chemincertificatDomicile)) {
    echo "Le certificat de domicile  ".  basename( $_FILES['CANDIDAT_CERTIF_DOMICILE']['name']). 
    " a ete bien sauvegarde.".'<br />';
} 
else
	echo "Erreur dans la sauvegarde du certificat de domicile!".'<br />';
$sql= 'INSERT INTO dossier VALUES ("",
"'.$nomfichiercertificatDomicile.'",
"'.$chemincertificatDomicile.'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 

	
$extensioncertificatMedical = substr($_FILES['CANDIDAT_CERTIF_MEDICAL']['name'],-4,4);
$chemincertificatMedical = "certificatMedical/".$_SESSION['identifiant'].$extensioncertificatMedical;		
$nomfichiercertificatMedical = $numero_insere."-certificat-medical";

if(move_uploaded_file($_FILES['CANDIDAT_CERTIF_MEDICAL']['tmp_name'], $chemincertificatMedical)) {
    echo "Le certificat medical  ".  basename( $_FILES['CANDIDAT_CERTIF_MEDICAL']['name']). 
    " a ete bien sauvegarde".'<br />';
} 
else
	echo "Erreur dans la sauvegarde du certificat medical!".'<br />';
$sql= 'INSERT INTO dossier VALUES ("",
"'.$nomfichiercertificatMedical.'",
"'.$chemincertificatMedical.'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 

$extensioncasierJudiciaire = substr($_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name'],-4,4);
$chemincasierJudiciaire = "casierJudiciaire/".$_SESSION['identifiant'].$extensioncasierJudiciaire;	
$nomfichiercasierJudiciaire = $numero_insere."-casier-judiciaire";

if(move_uploaded_file($_FILES['CANDIDAT_CASIER_JUDICIAIRE']['tmp_name'], $chemincasierJudiciaire)) {
    echo "Le casier judiciaire  ".  basename( $_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name']). 
    " a ete bien sauvegarde .".'<br />';
} 
else
	echo "Erreur dans la sauvegarde du casier judiciaire!".'<br />';
$sql= 'INSERT INTO dossier VALUES ("",
"'.$nomfichiercasierJudiciaire.'",
"'.$chemincasierJudiciaire.'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 

// Fin transfert des fichiers

/********INSERTION DANS LA TABLE POSTULATION********/
//$agenaissance = str_replace('."-."' ,'."-."',"'.$_POST["CANDIDAT_DATE_NAISSANCE"].'"); echo $agenaissance; 
$annonce = mysql_query('SELECT * FROM annonce where ANNONCE_ID = '.$_GET["id_annonce"]);
$annonce = mysql_fetch_array($annonce);

$agenaissance = str_replace('-',',',$_POST["CANDIDAT_DATE_NAISSANCE"]); 
$annonce_age = $annonce['ANNONCE_DELAI_AGE'];
$annonce_age = date("m/d/Y ", strtotime($annonce_age));
$agecandidat = age(date('Y',strtotime($_POST["CANDIDAT_DATE_NAISSANCE"])),date('m',strtotime($_POST["CANDIDAT_DATE_NAISSANCE"])), date('d',strtotime($_POST["CANDIDAT_DATE_NAISSANCE"])), strtotime ($annonce_age)); 
 
$sql = 'INSERT INTO postulation VALUES ("", NOW(),"'.$test.'", "'.$agecandidat.'" , "'.$_GET["id_annonce"].'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 




header('Location:index.php?url=index');
	
	}
}
/*}*/
$var1=isset($_POST["RECAP"]);
if($var1 <> "")

	
	include ('webroot/moncv.php');
		
	


?>

<script type="text/javascript" src="js/jquery.sheepItPlugin.js"></script>

<script type='text/javascript'>
$(document).ready(function() {
	var sheepItForm = $('#sheepItForm').sheepIt({
        separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        //allowRemoveAll: true,
        allowAdd: true,
        //allowAddN: true,
        maxFormsCount: 10,
        minFormsCount: 0,
        iniFormsCount: 1
    });
	
	jQuery('#blocs').sheepIt({
		separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        //allowRemoveAll: true,
        allowAdd: true,
        //allowAddN: true,
        maxFormsCount: 10,
        minFormsCount: 0,
        iniFormsCount: 1
	});
	
	jQuery('#experiences').sheepIt({
		separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        //allowRemoveAll: true,
        allowAdd: true,
        //allowAddN: true,
        maxFormsCount: 5,
        minFormsCount: 0,
        iniFormsCount: 1
	});
	
	jQuery('#connaissancesInformatiques').sheepIt({
		separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        //allowRemoveAll: true,
        allowAdd: true,
        //allowAddN: true,
        maxFormsCount: 10,
        minFormsCount: 0,
        iniFormsCount: 1
	});
	
	jQuery('#autreconInfo').sheepIt({
		separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        //allowRemoveAll: true,
        allowAdd: true,
        //allowAddN: true,
        maxFormsCount: 10,
        minFormsCount: 0,
        iniFormsCount: 1
	});
	
	jQuery('#famille').sheepIt({
		separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        //allowRemoveAll: true,
        allowAdd: true,
        //allowAddN: true,
        maxFormsCount: 10,
        minFormsCount: 0,
        iniFormsCount: 1
	});
	
	jQuery('#conLinguistiques').sheepIt({
		separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        //allowRemoveAll: true,
        allowAdd: true,
        //allowAddN: true,
        maxFormsCount: 10,
        minFormsCount: 0,
        iniFormsCount: 1
	});
	
	jQuery('#autreConLing').sheepIt({
		separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        //allowRemoveAll: true,
        allowAdd: true,
        //allowAddN: true,
        maxFormsCount: 10,
        minFormsCount: 0,
        iniFormsCount: 1
	});
	
	jQuery('#reference').sheepIt({
		separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        //allowRemoveAll: true,
        allowAdd: true,
        //allowAddN: true,
        maxFormsCount: 3,
        minFormsCount: 0,
        iniFormsCount: 1
	});
} );
</script>
 
 <article class="art-post art-article">
                                <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Formulaire</a></h3>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
				
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style="text-align: justify;">
		<span style="font-family: Arial;">  
		
<!-- contenu à mettre  -->	
	<form action="index.php?url=concours&titre_avis=<?php echo $_GET["titre_avis"]; ?>&id_avis=<?php echo $_GET["id_avis"]; ?>&date_delai_avis=<?php echo $_GET["date_delai_aavis"]; ?>" method="post" enctype="multipart/form-data" id="myform"  required name="concours">  

		<!--form action="index.php?url=formulaire&titre_annonce=<!--?php echo $_GET["titre_annonce"]; ?>&id_annonce=<!--?php echo $_GET["id_annonce"]; ?>&date_delai_annonce=<!--?php echo $_GET["date_delai_annonce"]; ?>" method="post" enctype="multipart/form-data" id="myform"  required name="formulaire"-->  



			
			<table cellspacing=0 cellpadding=0 border=0 >
								 <b>Ce formulaire a été conçu pour vous aider à rédiger votre cv. il vous permet d'exploiter toutes vos expériences. Renseignez au maximun les rubriques, plus votre cv sera rempli, plus il sera interressant pour l'employeur. </b><br>
														 <b>Candidature au poste de <?php  echo $_GET['titre_annonce']; ?> </b>
							
									
										<tr><td><b><?php if($erreur) echo $erreur; ?> </b></td></tr>
										<tr>
											<td>
												<a id="displayBlocCoordonnes" href="#"></a>
												<div style="border:solid;"id="monBlocCoordonnes">
													<!--  debut tableau Coordonnees personnelles -->
                                                    <p class="error"></p>
													<fieldset>
														<legend><b>1.	Coordonnees personnelles</legend>
														<p>Indiquez ci-dessous vos coordonnées personnelles.</p>
														
														<table >
															<tr>
															  <th><div align="right">Civilit&eacute; <font color=red>*</font> : </div></th>
															  <td><SELECT required="true" name="CANDIDAT_CIVILITE">
																  <option value="">S&eacute;lectionnez</option>
																  <OPTION VALUE="M.">M.</OPTION>
																  <OPTION VALUE="Mme">Mme</OPTION>
																  <OPTION VALUE="Melle">Melle</OPTION>
																</SELECT></td>
															</tr>
															<tr>
																<th><div align="right">Type <font color=red>*</font> : </div></th>
																<td><select required="true" name="CANDIDAT_TYPE">
																  <option value="">S&eacute;lectionnez</option>
																  <option value="Interne">Interne</option>
																  <option value="Externe">Externe</option>
																	</select>
																</td>
															</tr>
															<tr>
															  <th><div align="right">Num&eacute;ro matricule : </div></th>
															  <td><INPUT required="true" type="text" name="CANDIDAT_MATRICULE" placeholder="" size="30" maxlength="6" OnBlur="validite('formulaire','CANDIDAT_MATRICULE','N',6,6);"/></td>
															</tr>
															<tr>
																<th><div align="right">Cycle <font color=red>*</font> : </div></th>
																<td><select required="true" name="CANDIDAT_CYCLE">
																  <option value="">S&eacute;lectionnez</option>
																  <option value="INGENIEUR">Ingénieur</option>
																  <option value="TECHNICIEN SUPERIEUR ">Technicien supérieur</option>
																  <option value="POMPIER D'AERODROME ">Pompier d'aérodrome</option>
																	</select>
																</td>
															</tr>
															<tr>
																<th><div align="right">Spécialité <font color=red>*</font> : </div></th>
																<td><select required="true" name="CANDIDAT_SPECIALITE">
																  <option value="">S&eacute;lectionnez</option>
																  <option value="NA">NA</option>
																  <option value="IRE ">IRE</option>
																  <option value="MTO ">MTO</option>
																  <option value="SLI ">SLI</option>
																	</select>
																</td>
															</tr>
															<tr>
															  <th><div align="right">Nom <font color=red>*</font> : </div></th>
															  <td><input required="true" type="text" name="CANDIDAT_NOM" placeholder="" id="CANDIDAT_NOM"   maxlength="10" value""/></td>
															</tr>
															<tr>
															  <th><div align="right">Pr&eacute;nom <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="CANDIDAT_PRENOM" placeholder="" id="CANDIDAT_PRENOM"  size="30" maxlength="10" OnBlur="validite('formulaire','CANDIDAT_PRENOM','AN',3,25);"/></td>
															</tr>
															<tr>
															  <th><div align="right">Login <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="CANDIDAT_LOGIN" placeholder="" id="CANDIDAT_LOGIN" size="30" maxlength="10" OnBlur="validite('formulaire','CANDIDAT_LOGIN','AN',3,25);"/></td>
															</tr>
															<tr>
															  <th><div align="right">Adresse &eacute;lectronique <font color=red>*</font> : </div></th>
															  <td><input required="true" type="text" name="CANDIDAT_EMAIL" placeholder="" id="CANDIDAT_EMAIL"  size="30" maxlength="10" onBlur="validite('formulaire','CANDIDAT_EMAIL','EMAIL',1,10);"/></td>
															</tr>
															<tr>
															  <th><div align="right">Mot de passe <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="password" name="CANDIDAT_MDP" placeholder="" id="CANDIDAT_MDP"  size="30" maxlength="10" OnBlur="validite('formulaire','CANDIDAT_MDP','AN',3,25);"/></td>
															</tr>
															<tr>
															  <th><div align="right">Num&eacute;ro de t&eacute;l&eacute;phone  <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="CANDIDAT_TEL" placeholder="" size="30" maxlength="10"/></td>
															</tr>
															<tr>
															  <th><div align="right">Date de naissance <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="CANDIDAT_DATE_NAISSANCE" class="datepicker"/></td>
															</tr>
															<tr>
															  <th><div align="right">Lieu de naissance  <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="CANDIDAT_LIEU_NAISSANCE" placeholder="" size="30" maxlength="10"/></td>
															</tr>
															<tr>
															  <th><div align="right">Sexe <font color=red>*</font> : </div></th>
															  <td><SELECT required="true" name="CANDIDAT_SEXE">
																  <option value="">S&eacute;lectionnez</option>
																  <OPTION VALUE="F&Eacute;MININ">F&eacute;minin</OPTION>
																  <OPTION VALUE="MASCULIN">Masculin</OPTION>
																</SELECT></td>
															</tr>
															<tr>
															  <th><div align="right">Nationalit&eacute; <font color=red>*</font> : </div></th>
															  <td><SELECT required="true" name="CANDIDAT_NATIONALITE">
																  <option value="">S&eacute;lectionnez</option>
																  <OPTION VALUE="BENINOISE">B&eacute;ninoise</OPTION>
																  <OPTION VALUE="BISSAO-GUINEENNE">Bissao-guin&eacute;enne</OPTION>
																  <OPTION VALUE="BURKINABE">Burkinab&eacute;</OPTION>
																  <OPTION VALUE="CAMEROUNAISE">Camerounaise</OPTION>
																  <OPTION VALUE="CENTRAFRICAINE">Centrafricaine</OPTION>
																  <OPTION VALUE="COMORIENNE">Comorienne</OPTION>
																  <OPTION VALUE="CONGOLAISE">Congolaise</OPTION>
																  <OPTION VALUE="EQUATO-GUINEENNE">Equato-guin&eacute;enne</OPTION>
																  <OPTION VALUE="FRANCAISE">Fran&ccedil;aise</OPTION>
																  <OPTION VALUE="GABONAISE">Gabonaise</OPTION>
																  <OPTION VALUE="IVOIRIENNE">Ivoirienne</OPTION>
																  <OPTION VALUE="MALGACHE">Malgache</OPTION>
																  <OPTION VALUE="MALIENNE">Malienne</OPTION>
																  <OPTION VALUE="MAURITANIENNE">Mauritanienne</OPTION>
																  <OPTION VALUE="NIGERIENNE">Nig&eacute;rienne</OPTION>
																  <OPTION VALUE="SENEGALAISE">S&eacute;n&eacute;galaise</OPTION>
																  <OPTION VALUE="TCHADIENNE">Tchadienne</OPTION>
																  <OPTION VALUE="TOGOLAISE">Togolaise</OPTION>
																</SELECT>
                                                                </td>
															</tr>
                                                            <tr>
															  <th><div align="right">Adresse dans le pays d'origine <font color=red>*</font> : </div></th>
															  <td><textarea required="true" name="CANDIDAT_ADRR_PERM" cols="30" rows="2" id="CANDIDAT_ADRR_PERM" placeholder="" ></textarea></td>
															</tr>
															</table>
											  </fieldset>
											            </div>
											    </td>
										             </tr>
											</tr>
                                                            <tr>
                                                          <td><a id="displayBlocPiece" href="#"></a><br/>
                                                          <div style="border:solid;"id="monBlocPiece">
											  <fieldset>
												<legend><b>2. reference piece d'identite</legend>
												<table>
														  <tr>
															<tr>
															  <th><div align="right">Carte d'identité ou Passport n° <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="CANDIDAT_N_IDENTITE" cols="30" rows="2" id="CANDIDAT_ADR_PERM" placeholder="" ></td>
															</tr>
															<tr>
															  <th><div align="right">Délivré le <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="IDENT_DATE" cols="30" rows="2" placeholder=""></td>
															</tr>
															<tr>
															  <th><div align="right">Validité jusqu'au <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="IDENT_VALIDITE" placeholder="" size="30" maxlength="10"/></td>
															</tr>
															</table>
											  </fieldset>
											            </div>
											    </td>
										             </tr>
											</tr>
                                                            <tr>
                                                          <td><a id="displayBlocPiece" href="#"></a><br/>
                                                          <div style="border:solid;"id="monBlocPiece">
											  <fieldset>
												<legend><b>3. coordonnées personne à prevenir en cas d'accident</legend>
												<table>
														  <tr>
															<tr>
															  <th><div align="right">Nom <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="CANDIDAT_TUTEUR" cols="30" rows="2" placeholder=""></td>
															</tr>
															<tr>
															<th align="right">T&eacute;l&eacute;phone <font color=red>*</font> : </th>
															<td><input required="true" type="text" name="TUTEUR_TEL" placeholder="" size="30" maxlength="10"></td>
														  </tr>
															<tr>
															<th align="right">Adresse <font color=red>*</font> : </th>
															<td><textarea  required="true" name="TUTEUR_ADR" placeholder="" size="30" maxlength="10"></textarea></td>
														  </tr>
														  </table>
											  </fieldset>
											            </div>
											    </td>
										             </tr>
											</tr>
                                            <tr>
                                                <td><a id="displayBlocPiece" href="#"></a><br/>
                                                        <div style="border:solid;"id="monBlocPiece">
											<fieldset>
											<legend><b>4. Diplôme</legend>
												         <table>
												    <tr>
														  <tr>
															<th align="right">Dernier diplome obtenu (ou en préparation)<font color=red>*</font> : </th>
															<td><input required="true" type="text" name="CANDIDAT_DIPLOME" placeholder="" size="30" maxlength="10"></td>
														  </tr>
														  <tr>
															<th align="right">Année <font color=red>*</font> : </th>
															<td><input type="text" name="CANDIDAT_DATE_DIPLO" placeholder="" size="30" maxlength="10"></td>
														  </tr>
														  <tr>
															<th align="right">Etablissement <font color=red>*</font> : </th>
															<td><input required="true" type="text" name="ETAB_NOM" placeholder="" size="30" maxlength="10"></td>
														  </tr>
													     </table>
											  </fieldset>
											            </div>
											    </td>
										             </tr>
											</tr>
                                                          <tr>
                                                          <td><a id="displayBlocPiece" href="#"></a><br/>
                                                          <div style="border:solid;"id="monBlocPiece">
											  <fieldset>
												<legend><b>5.Permis de conduire </legend>
												<table>
														  <tr>
															  <th><div align="right">N° permis de conduire catégorie B : <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="CANDIDAT_NUM_PERMIS" cols="30" rows="2" id="CANDIDAT_ADR_PERM" placeholder="" ></td>
															</tr>
															<tr>
															  <th><div align="right">Délivré le <font color=red>*</font> : </div></th>
															  <td><INPUT type="text" name="PERMIS_DATE" cols="30" rows="2" placeholder=""></td>
															</tr>
															<tr>
															  <th><div align="right">à <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="PERMIS_LIEU" cols="30" rows="2" placeholder=""></td>
															</tr>
															<tr>
															  <th><div align="right">Validité jusqu'au <font color=red>*</font> : </div></th>
															  <td><INPUT required="true" type="text" name="PERMIS_VALIDITE" placeholder="" size="30" maxlength="10"/></td>
															</tr>
                                                            		</table>
											  </fieldset>
											</div></td>
										</tr>
															<tr>
										  <td><a id="displayBlocPiece" href="#"></a><br/>
											<div style="border:solid;"id="monBlocPiece">
											  <fieldset>
												<legend><b>6. P&egrave;ces jointes</legend>
												<table>
																								  <tr>
													<th align="right">CV <font color=red>*</font> : </th>
													<td><input required="true" type="file" value="photo" name="CANDIDAT_CV"></td>
												  </tr>
												  <tr>
													<th><div align="right">Diplôme <font color=red>*</font> : </div></th>
													<td><input type="file"  name="CANDIDAT_SCAN_DIPLOME"></td>
												  </tr>
												  <tr>
													<th align="right">Extrait de l'acte de naissance <font color=red>*</font> : </th>
													<td><input required="true" type="file" value="acte_naissance" name="CANDIDAT_ACTE_NAISS"></td>
												  </tr>
												  <tr>
													<th align="right">Casier judiciaire <font color=red>*</font> : </th>
													<td><input required="true" type="file" value="casier_judiciaire" name="CANDIDAT_CASIER_JUDICIAIRE"></td>
												  </tr>
												  <tr>
													<th align="right">Certificat de nationalit&eacute;<font color=red>*</font> : </th>
													<td><input required="true" type="file" value="certif_nat" name="CANDIDAT_CERTIF_NAT"></td>
												  </tr>
												  <tr>
													<th align="right">Certificat m&eacute;dical <font color=red>*</font> : </th>
													<td><input required="true" type="file" value="certificat_medical" name="CANDIDAT_CERTIF_MEDICAL"></td>
												  </tr>
												  <tr>
													<th align="right">Photo <font color=red>*</font> : </th>
													<td><input required="true" type="file" value="photo" name="CANDIDAT_PHOTO"></td>
												  </tr>												  				  
												</table>
											  </fieldset>
                                              </div></td>
										</tr>
										<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										<tr align="center">
										  <td><p align="justify">Je certifie que les déclarations faites par moi en réponse aux questions ci-dessus sont, dans toute la mesure où je puis en être certain, vraies, complètes et exactes. Je prends note du fait que toute déclaration inexacte ou omission importante dans une notice personnelle ou toute autre pièce requise par l'ASECNA constitue, soit un rejet de la candidature, soit un motif de licenciement sans préavis ni indemnité si cela est décelé après l'engagement. </p>
                                          
											<input type="submit" name="envoyer" value="Envoyer" ></td>
										</tr>	
										<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
								</table>
	
	<div id="sheepItForm"></div>
	<div id="reference"><div id="reference_template"></div>
           
</form>

<!-- fin contenu à mettre  -->


		</span>
	   </p>

    </div>
    </div>
</div>
</div>
</article>