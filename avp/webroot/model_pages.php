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
$test1=$_GET['id_annonce'];
if($var <> ""){
    $exereq=mysql_query("select count(CANDIDAT_LOGIN) as nblogin from  candidat where CANDIDAT_LOGIN ='".$_POST["CANDIDAT_LOGIN"]."'");
    $nblogin = mysql_fetch_array($exereq);
    $nblogin = $nblogin['nblogin'];
    if($nblogin >=1 ){
        $erreur="<center><font color='#FF000'>Le login existe deja!</font></center>";
    }else{


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




        // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

        // on récupère le dernier numéro inséré, soit le numéro de tibo
        $numero_insere = mysql_insert_id();

/// Pour les uploads
        if(empty($_POST['CANDIDAT_MATRICULE']))
            $identifiant = $numero_insere."-".$_POST['CANDIDAT_NOM']."-".$_POST['CANDIDAT_PRENOM'];
        else
            $identifiant = $numero_insere."-".$_POST['CANDIDAT_MATRICULE']."-".$_POST['CANDIDAT_NOM']."-".$_POST['CANDIDAT_PRENOM'];

        /************INSERTION DES PIECES JOINTES***********/


        /************INSERTION DANS LA TABLE FAMILLE***********/
        for($i=0; $i<sizeof($_POST["FAMILLE_NOM"]); $i++){
            $sql= 'INSERT INTO famille VALUES ("",
"'.$_POST["FAMILLE_NOM"][$i].'",
"'.$_POST["FAMILLE_PRENOM"][$i].'",
"'.$_POST["FAMILLE_STRUCTURE"][$i].'",
"'.$_POST["FAMILLE_DEGRE"][$i].'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        }


        /***************INSERTION DANS LA TABLE FORMATION AVEC AJOUT MULTIPLES**********/
        for($i=0; $i<sizeof($_POST["FORMATION_LIEU"]); $i++){
            $P= rand(10,10000);
            $extension = substr($_FILES['FORMATION_DIPLOME_FICHIER']['name'][$i],-4,4);
            $chemin = "diplome/".$P."-".$identifiant.$extension;
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
        $sql= 'INSERT INTO realisation  VALUES ("",
								"'.$_POST["REAL_LIB"].'",
								"'.$numero_insere.'")';

// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

        /*********INSERTION DANS LA TABLE AUTRE FORMATION ********/
        for($i=0; $i<sizeof($_POST["FORM_AN_DEB"]); $i++){
            $o= rand(10,10000);
            $extension = substr($_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name'][$i],-4,4);
            $chemin = "diplome/".$o."-".$identifiant.$extension;
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

        /*******************INSERTION DANS LA TABLE EXPERIENCES PROFESSIONNELLES*******************/
        for($i=0; $i<sizeof($_POST["EXP_ENT_NOM"]); $i++){

            $sql= 'INSERT INTO experience_professionnelle VALUES ("",
"'.$_POST["EXP_ENT_NOM"][$i].'",
"'.$_POST["EXP_SEC_ACT"][$i].'",
"'.$_POST["EXP_POSTE"][$i].'",
"'.date($_POST["EXP_DEBUT_TRAVAIL"][$i], 'Y-m').'",
"'.date($_POST["EXP_FIN_TRAVAIL"][$i], 'Y-m').'",
"'.$_POST["EXP_SALAIRE"][$i].'",
"'.$_POST["EXP_NBRE_PERS_SORD"][$i].'",
"'.$_POST["EXP_TACHE"][$i].'",
"'.$_POST["EXP_MOTIF_DEP"][$i].'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        }
        /*******************INSERTION DANS LA TABLE CONNAISSANCE INFORMATIQUE*******************/
        for($i=0; $i<sizeof($_POST["LOGICIELS"]); $i++){

            $sql= 'INSERT INTO connaissances_informatiques VALUES ("",
"'.$_POST["LOGICIELS"][$i].'",
"'.$_POST["INFORMATIQUE_NIV"].'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        }

        /*******************INSERTION DANS LA TABLE AUTRE CONNAISSANCE INFORMATIQUE*******************/
        for($i=0; $i<sizeof($_POST["AUTRE_LOGICIELS"]); $i++){
            $sql= 'INSERT INTO connaissances_informatiques VALUES ("",
"'.$_POST["AUTRE_LOGICIELS"][$i].'",
"'.$_POST["AUTRE_INFORMATIQUE_NIV"].'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        }


        /*******************INSERTION DANS LA TABLE CONNAISSANCE LINGUISTIQUE*******************/
        for($i=0; $i<sizeof($_POST["LANGUE_NOM"]); $i++){
            $sql= 'INSERT INTO connaissances_linguistiques VALUES ("",
"'.$_POST["LANGUE_NOM"][$i].'",
"'.$_POST["LANGUE_ORALE"][$i].'",
"'.$_POST["LANGUE_ECRITE"][$i].'",
"'.$_POST["LANGUE_LECTURE"][$i].'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        }

        /*******************INSERTION DANS LA TABLE AUTRE CONNAISSANCE LINGUISTIQUE*******************/
        for($i=0; $i<sizeof($_POST["AUTRE_LANGUE_NOM"]); $i++){
            $sql= 'INSERT INTO connaissances_linguistiques VALUES ("",
"'.$_POST["AUTRE_LANGUE_NOM"][$i].'",
"'.$_POST["AUTRE_LANGUE_ORALE"][$i].'",
"'.$_POST["AUTRE_LANGUE_ECRITE"][$i].'",
"'.$_POST["AUTRE_LANGUE_LECTURE"][$i].'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        }


        $sql= 'INSERT INTO COMPETENCES  VALUES ("",
"'.$_POST["COMP_LIB"].'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

        $sql= 'INSERT INTO QUALITES  VALUES ("",
"'.$_POST["QUAL_LIB"].'",
"'.$numero_insere.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

        $sql= 'INSERT INTO lettre_motivation VALUES ("",
		"'.$_POST["LETTRE_MOTIVATION"].'",
		"'.$_POST["Motiv_poste"].'",
		"'.$numero_insere.'",
		"'.$test1.'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        /*******************INSERTION DANS LA TABLE REFERENCE*******************/
        for($i=0; $i<sizeof($_POST["REF_NOM_ENT"]); $i++){
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


// Début Transfert des fichiers

// Création du répertoire de l'agent




//mkdir($numero_insere);
        $extensionDemandeEmloi = substr($_FILES['CANDIDAT_DEMANDE_EMPLOI']['name'],-4,4);
        $cheminPhotoDemandeEmloi = "demande_emploi/".$identifiant.$extension;
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
        $cheminPhotoCV = "cv/".$identifiant.$extensionCV;
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
        $cheminPhotoCertificatTravail = "certificat_travail/".$identifiant.$extensionCertificatTravail;
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
        $cheminPhoto = "photos/".$identifiant.$extensionPhoto;
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
        $cheminActeNaissance = "acteNaissance/".$identifiant.$extensionActeNaissance;
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
        $cheminFicheFamille = "ficheFamille/".$identifiant.$extensionFicheFamille;
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
        $chemincertificatNationalite = "certificatNationalite/".$identifiant.$extensioncertificatNationalite;
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
        $chemincertificatDomicile = "certificatDomicile/".$identifiant.$extensioncertificatDomicile;
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
        $chemincertificatMedical = "certificatMedical/".$identifiant.$extensioncertificatMedical;
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
        $chemincasierJudiciaire = "casierJudiciaire/".$identifiant.$extensioncasierJudiciaire;
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

        $_SESSION['message'] = "Postulation savegargées";
        header('Location:index.php?url=pvacants');

    }
}

?>
 <article class="art-post art-article">
                                <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Inscription</a></h3>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
				
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style="text-align: justify;">
		<span style="font-family: Arial;">  
		
<!-- contenu à mettre  -->	
<form action="index.php?url=formulaire&titre_annonce=<?php echo $_GET["titre_annonce"]; ?>&id_annonce=<?php echo $_GET["id_annonce"]; ?>&date_delai_annonce=<?php echo $_GET["date_delai_annonce"]; ?>" method="post" enctype="multipart/form-data" id="myform"  required name="formulaire">
<table>
<tr>
<td valign=top>
<table cellspacing=0 cellpadding=0 border=0 width=580>
<tr>
    <td valign=top colspan=2 class=fond4 height=1></td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=5></td>
</tr>
<tr class="fond4">
    <td valign=top colspan=2 class=txt background="images/pages/fond_zone_chapeau.gif" style="background-repeat:no-repeat;" width=579>
        <center>
            <table cellspacing=0 cellpadding=0 border=0 width=559>
                <tr>
                    <td valign=top><img src="images/home/pixel.gif" width=1 height=5></td>
                </tr>
                <tr>
                    <td valign=top colspan=2 class="titre1"><b>Candidature au poste de <?php  echo $_GET['titre_annonce']; ?> </b></td>
                </tr>



                <tr>
                    <td valign=top><img src="images/home/pixel.gif" width=1 height=5/></td>
                </tr>
            </table>
        </center>
    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=10></td>
</tr>
<tr><td><b><?php if($erreur) echo $erreur; ?> </b></td></tr>
<tr>
    <td>
        <a id="displayBlocCoordonnes" href="#">Coordonnees</a>
        <div style="border:solid;" class="resized" id="monBlocCoordonnes">
            <!--  debut tableau Coordonnees personnelles -->
            <fieldset>
                <legend>1-Coordonnees personnelles</legend>
                <p>Indiquez ci-dessous vos coordonnées personnelles.</p>

                <table >
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
                        <th><div align="right">Civilit&eacute; : </div></th>
                        <td><SELECT required="true" name="CANDIDAT_CIVILITE">
                                <option value="">S&eacute;lectionnez</option>
                                <OPTION VALUE="M.">M.</OPTION>
                                <OPTION VALUE="Mme">Mme</OPTION>
                                <OPTION VALUE="Melle">Melle</OPTION>
                            </SELECT></td>
                    </tr>
                    <tr>
                        <th><div align="right">Nom <font color=red>*</font> : </div></th>
                        <td><input required="true" type="text" name="CANDIDAT_NOM" placeholder="" id="CANDIDAT_NOM"   maxlength="10"  OnBlur="validite('formulaire','CANDIDAT_NOM','AN',3,25);"/></td>
                    </tr>
                    <tr>
                        <th><div align="right">Pr&eacute;nom <font color=red>*</font> : </div></th>
                        <td><INPUT required="true" type="text" name="CANDIDAT_PRENOM" placeholder="" id="CANDIDAT_PRENOM"  size="30" maxlength="10"  "OnBlur="validite('formulaire','CANDIDAT_PRENOM','AN',3,25);"/></td>
                    </tr>
                    <tr>
                        <th><div align="right">Num&eacute;ro matricule : </div></th>
                        <td><INPUT type="text" name="CANDIDAT_MATRICULE" placeholder="" size="30" maxlength="6" value="<?php if($ca_matricule) echo $ca_matricule; ?>" OnBlur="validite('formulaire','CANDIDAT_MATRICULE','N',6,6);"/></td>
                    </tr>
                    <tr>
                        <th><div align="right">Date de naissance <font color=red>*</font> : </div></th>
                        <td><INPUT required="true" type="text" name="CANDIDAT_DATE_NAISSANCE" class="datepicker"/></td>
                    </tr>
                    <tr>
                        <th><div align="right">Lieu de naissance  : </div></th>
                        <td><INPUT type="text" name="CANDIDAT_LIEU_NAISSANCE" placeholder="" value="<?php if($ca_lieu_nais) echo $ca_lieu_nais; ?>" size="30" maxlength="10"/></td>
                    </tr>
                    <tr>
                        <th><div align="right">Nationalit&eacute; : </div></th>
                        <td><SELECT name="CANDIDAT_NATIONALITE">
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
                            </SELECT></td>
                    </tr>
                    <tr>
                        <th><div align="right">Situation matrimoniale <font color=red>*</font> : </div></th>
                        <td><SELECT  required="true" name="CANDIDAT_SIT_MAT">
                                <option value="">S&eacute;lectionnez</option>
                                <OPTION VALUE="CELIBATAIRE">C&eacute;libataire</OPTION>
                                <OPTION VALUE="DIVORCE">Divorc&eacute;(e)</OPTION>
                                <OPTION VALUE="MARIE">Mari&eacute;(e)</OPTION>
                                <OPTION VALUE="SEPARE">S&eacute;par&eacute;(e)</OPTION>
                                <OPTION VALUE="VEUF">Veuf(Veuve)</OPTION>
                            </SELECT></td>
                    </tr>
                    <tr>
                        <th><div align="right">Nombre d'enfants &aacute; charge : </div></th>
                        <td><SELECT name="CANDIDAT_NBRE_ENF"> value="<?php if($ca_nbre_enf) echo $$ca_nbre_enf; ?>"
                                <option value="">S&eacute;lectionnez</option>
                                <OPTION VALUE="0">0</OPTION>
                                <OPTION VALUE="1">1</OPTION>
                                <OPTION VALUE="2">2</OPTION>
                                <OPTION VALUE="3">3</OPTION>
                                <OPTION VALUE="4">4</OPTION>
                                <OPTION VALUE="5">5</OPTION>
                                <OPTION VALUE="6">6</OPTION>
                            </SELECT></td>
                    </tr>
                    <tr>
                        <th><div align="right">Sexe : </div></th>
                        <td><SELECT name="CANDIDAT_SEXE">
                                <option value="">S&eacute;lectionnez</option>
                                <OPTION VALUE="F&Eacute;MININ">F&eacute;minin</OPTION>
                                <OPTION VALUE="MASCULIN">Masculin</OPTION>
                            </SELECT></td>
                    </tr>
                    <tr>
                        <th><div align="right">Adresse habituelle <font color=red>*</font> : </div></th>
                        <td><textarea required="true" name="CANDIDAT_ADR_PERM" cols="30" rows="2" id="CANDIDAT_ADR_PERM"  placeholder="" ></textarea></td>
                    </tr>
                    <tr>
                        <th><div align="right">Adresse actuelle : </div></th>
                        <td><textarea name="CANDIDAT_ADR_ACT" cols="30" rows="2" value="<?php if($ca_adr_act) echo $ca_adr_act; ?>" placeholder=""></textarea></td>
                    </tr>
                    <tr>
                        <th><div align="right">Num&eacute;ro de t&eacute;l&eacute;phone  : </div></th>
                        <td><INPUT type="text" name="CANDIDAT_NUM_TEL" placeholder="" value="<?php if($ca_num_tel) echo $ca_num_tel; ?>" size="30" maxlength="10"/></td>
                    </tr>
                    <tr>
                        <th><div align="right">Num&eacute;ro de GSM : </div></th>
                        <td><INPUT type="text" name="CANDIDAT_NUM_GSM" placeholder="" value="<?php if($ca_num_gsm) echo $ca_num_gsm; ?>" size="30" maxlength="10"/></td>
                    </tr>
                    <tr>
                        <th><div align="right">Permis de conduire B<font color=red>*</font> : </div></th>
                        <td><SELECT required="true" name="CANDIDAT_PERMIS">
                                <option value="">S&eacute;lectionnez</option>
                                <OPTION VALUE="Oui">Oui</OPTION>
                                <OPTION VALUE="Non">Non</OPTION>
                            </SELECT></td>
                    </tr>
                    <tr>
                        <th><div align="right">Avez vous des parents &agrave; l'ASECNA <font color=red>*</font> : </div></th>
                        <td><SELECT required="true" name="CANDIDAT_IS_FAMILLE">
                                <option value="">S&eacute;lectionnez</option>
                                <OPTION VALUE="Oui">Oui</OPTION>
                                <OPTION VALUE="Non">Non</OPTION>
                            </SELECT></td>
                    </tr>
                </table>

                <p>Si affirmatif, veuillez saisir les informations sur les liens de parent&eacute;</p>
            </fieldset>
            <!--  fin tableau Coordonnees personnelles -->
            <div id="famille">
                <div id="famille_template">
                    <fieldset>
                        <legend><b> <?php echo "1.#index#"?>-Infos famille</b> </legend>
                        <table>
                            <tr>
                                <th align="right">Nom :</th>
                                <td><input type="text" name="FAMILLE_NOM[]" placeholder="" value="<?php if($fa_nom) echo $fa_nom; ?>" size="30" maxlength="10" ></td>
                            </tr>
                            <tr>
                                <th align="right">Pr&eacute;noms :</th>
                                <td><input type="text" name="FAMILLE_PRENOM[]" placeholder="" value="<?php if($fa_prenom) echo $fa_prenom; ?>" size="30" maxlength="10"></td>
                            </tr>
                            <tr>
                                <th align="right">Structure :</th>
                                <td><input type="text" name="FAMILLE_STRUCTURE[]" placeholder="" value="<?php if($fa_structure) echo $fa_structure; ?>" size="30" maxlength="10"></td>
                            </tr>
                            <tr>
                                <th align="right">Degr&eacute; :</th>
                                <td><input type="text" name="FAMILLE_DEGRE[]" placeholder="" value="<?php if($fa_degre) echo $fa_degre; ?>" size="30" maxlength="10"></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div id="famille_noforms_template">Aucune information famille renseign&eacute;e</div>
                <div id="famille_controls">
                    <table>
                        <tr>
                            <td><div id="famille_add"><a><span>Ajouter une autre famille<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                            <td><div id="famille_remove_last"><a><span>Supprimer une famille<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>
        <a id="displayBlocFormation" href="#">Formation</a>
        <div style="border:solid;"id="monBlocFormation">
            <div id="sheepItForm_template" >
                <fieldset id="displayBlocFormation">
                    <legend><?php echo "2.#index#"?>- Formations</legend>
                    <table>
                        <tr>
                            <th><div align="right">Formation cycle<font color=red>*</font> : </div></th>
                            <td><SELECT name="FORMATION_CYCLE[]">
                                    <option value="">S&eacute;lectionnez</option>
                                    <OPTION VALUE="Universitaires">Universitaires</OPTION>
                                    <OPTION VALUE="Secondaires">Secondaires</OPTION>
                                </SELECT>
                            </td>
                        </tr>
                        <tr>
                            <th> <div align="right">Ann&eacute;e d'&eacute;tude de <font color=red>*</font> : </div></th>
                            <td><SELECT name="FORMATION_AN_DEB[]">
                                    <option value="">S&eacute;lectionnez</option>
                                    <?php for ($i=1960; $i<date('Y'); $i++):
                                        echo '<OPTION VALUE='.$i.'>'.$i.'</OPTION>';
                                    endfor; ?>
                                </SELECT></td>
                        </tr>
                        <tr>
                            <th> <div align="right">&agrave;</div></th>
                            <td><SELECT name="FORMATION_AN_FIN[]">
                                    <option value="">S&eacute;lectionnez</option>
                                    <?php for ($i=1960; $i<date('Y'); $i++):
                                        echo '<OPTION VALUE='.$i.'>'.$i.'</OPTION>';
                                    endfor; ?>
                                </SELECT></td>
                        </tr>
                        <tr>
                            <th><div align="right">Nom de l'&eacute;tablissement <font color=red>*</font> : </div></th>
                            <td><INPUT type="text" name="ETABLISSEMENT_NOM[]" placeholder="" id="ETABLISSEMENT_NOM[]" value="<?php if($etab_nom) echo $etab_nom; ?>" required size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th><div align="right">Adresse de l'&eacute;tablissement <font color=red>*</font> : </div></th>
                            <td><INPUT type="text" name="FORMATION_LIEU[]" placeholder="" id="FORMATION_LIEU[]" value="<?php if($fo_lieu) echo $fo_lieu; ?>" required size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th><div align="right">Dipl&ocirc;mes obtenus <font color=red>*</font> : </div></th>
                            <td><INPUT type="text" name="FORMATION_DIPLOME[]" placeholder="" id="FORMATION_DIPLOME[]" value="<?php if($fo_diplome) echo $fo_diplome; ?>" required size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th><div align="right">Domaine Principal d'&eacute;tude <font color=red>*</font> : </div></th>
                            <td><INPUT type="text" name="FORMATION_DOM_PRINC_ETUD[]" placeholder="" id="FORMATION_DOM_PRINC_ETUD[]" value="<?php if($fo_dom_princ_etud) echo $fo_dom_princ_etud; ?>" required size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th><div align="right">Diplôme <font color=red>*</font> : </div></th>
                            <td><input type="file"  name="FORMATION_DIPLOME_FICHIER[]" value="<?php if($fo_diplome_fichier) echo $fo_diplome_fichier; ?>"></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div id="sheepItForm_noforms_template">Aucune formation renseign&eacute;e</div>
            <div id="sheepItForm_controls">
                <table>
                    <tr>
                        <td><div id="sheepItForm_add"><a><span>Ajouter une formation<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                        <td><div id="sheepItForm_remove_last"><a><span>Supprimer une formation<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                    </tr>
                </table>
            </div>
        </div>
    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td><a id="displayBlocTravail" href="#">Travail de fin d'etudes</a>
        <div style="border:solid;" id="monBlocTravail">
            <fieldset>
                <legend>3- Travail de fin d'&eacute;tude</legend>
                <span>Quel &eacute;tait le titre de votre travail de fin d'&eacute;tudes(Licence,Ma&icirc;trise,Master,DEA,th&egravese; de doctorat...) pour le plus haut dipl&ocirc;me obtenu? </span> <br>
                <textarea name="REAL_LIB" rows="5" cols="50" wrap="off"> Saisissez le titre du travail</textarea>
            </fieldset>
        </div></td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td><a id="displayBlocAutreFormation" href="#">Autres Formations</a>
        <div style="border:solid;"id="monBlocAutreFormation">
            <div id="blocs">
                <div id="blocs_template">
                    <fieldset>
                        <legend><?php echo "4.#index#"?>-Autres formations</legend>
                        <span>Renseignez ci-dessous d'autres formations et/ou cours qui sont pertinents pour  le poste.</span> <br/>
                        &nbsp;&nbsp;
                        <table>
                            <tr>
                                <th><div align="right">Intitul&eacute; de la formation   : </div></th>
                                <td><INPUT type="text" name="FORM_LIB[]" placeholder=""   size="30" maxlength="10"/></td>
                            </tr>
                            <tr>
                                <th><div align="right">Ann&eacute;e   : </div></th>
                                <td><SELECT name="FORM_AN_DEB[]">
                                        <option value="">S&eacute;lectionnez</option>
                                        <?php for ($i=1960; $i<date('Y'); $i++):
                                            echo '<OPTION VALUE='.$i.'>'.$i.'</OPTION>';
                                        endfor; ?>
                                    </SELECT></td>
                            </tr>
                            <tr>
                                <th><div align="right">Centre de formation   : </div></th>
                                <td><INPUT type="text" name="FORM_NOM[]" placeholder="" size="30" maxlength="10"/></td>
                            </tr>
                            <tr>
                                <th><div align="right">Utilit&eacute; pour les fonctions   : </div></th>
                                <td><INPUT type="text" name="FORM_INTITULE[]"/ placeholder="" size="30" maxlength="10"></td>
                            </tr>
                            <tr>
                                <th align="right">Diplôme   : </th>
                                <td><input type="file"  name="AUTRE_FORMATION_DIPLOME_FICHIER[]"></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div id="blocs_noforms_template">Aucune autre formation renseign&eacute;e</div>
                <div id="blocs_controls">
                    <table>
                        <tr>
                            <td><div id="blocs_add"><a><span>Ajouter une autre formation<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                            <td><div id="blocs_remove_last"><a><span>Supprimer une autre formation<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>
        <a id="displayBlocExperience" href="#">Exp&eacute;riences professionnelles pass&eacute;es</a>
        <div style="border:solid;"id="monBlocExperience">
            <div id="experiences">
                <div id="experiences_template">
                    <fieldset>
                        <legend><?php echo "5.#index#"?>-Exp&eacute;riences professionnelles pass&eacute;es</legend>
                        <p>Veuillez commencer par l'emploi le plus r&eacute;cent</p>
                        <table>
                            <tr>
                                <th align="right">Poste occupé   : </th>
                                <td><INPUT type="text" name="EXP_POSTE[]" placeholder="" size="30" maxlength="10"/></td>
                            </tr>
                            <tr>
                                <th align="right">Nom et adresse de l'employeur   : </th>
                                <td><INPUT type="text" name="EXP_ENT_NOM[]" placeholder="" size="30" maxlength="10"/></td>
                            </tr>
                            <tr>
                                <th align="right">Domaine d'activit&eacute;   : </th>
                                <td><INPUT type="text" name="EXP_SEC_ACT[]" placeholder="" size="30" maxlength="10"/></td>
                            </tr>
                            <tr>
                                <th align="right">Dur&eacute;e de l'emploi de   : </th>
                                <td><INPUT type="text" name="EXP_DEBUT_TRAVAIL[]" value="" class="monthPicker"/></td>
                            </tr>
                            <tr>
                                <th>&agrave;</th>
                                <td><INPUT type="text" name="EXP_FIN_TRAVAIL[]" value="" class="monthPicker"/></td>
                            </tr>
                            <tr>
                                <th align="right">Salaire brut moyen mensuel(CFA)   : </th>
                                <td><INPUT type="text" name="EXP_SALAIRE[]" placeholder="" size="30" maxlength="10"/></td>
                            </tr>
                            <tr>
                                <th align="right">Nombre de personnes plac&eacute;es sous vos ordres   : </th>
                                <td><INPUT type="text" name="EXP_NBRE_PERS_SORD[]" placeholder="" size="30" maxlength="10"/></td>
                            </tr>
                            <tr>
                                <th align="right">Description de vos t&acirc;ches,responsabilit&eacute;s et accomplissements   : </th>
                                <td><INPUT type="text" name="EXP_TACHE[]" placeholder="" size="30" maxlength="10"/></td>
                            </tr>
                            <tr>
                                <th align="right">Motif du d&eacute;part   : </th>
                                <td><INPUT type="text" name="EXP_MOTIF_DEP[]" placeholder="" size="30" maxlength="10"/></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div id="experiences_noforms_template">Aucune experience professionnelle passee renseignee</div>
                <div id="experiences_controls">
                    <table>
                        <tr>
                            <td><div id="experiences_add"><a><span>Ajouter une experience professionnelle<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                            <td><div id="experiences_remove_last"><a><span>Supprimer une experience professionnelle<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>

        <a id="displayBlocInformatique" href="#">Connaissances Informatiques</a>
        <div style="border:solid;"id="monBlocInformatique">
            <div id="connaissancesInformatiques">
                <div id="connaissancesInformatiques_template">
                    <fieldset>
                        <legend><?php echo "6.#index#"?>-Précisez ci-dessous vos connaissances pour: </legend>
                        <table>
                            <tr>
                                <th align="right">Logiciels bureautique   : </th>
                                <td><SELECT name="LOGICIELS[]">
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Traitement de texte">Traitement de texte</OPTION>
                                        <OPTION VALUE="Tableur">Tableur</OPTION>
                                        <OPTION VALUE="Outils collaboratif">Outils collaboratif</OPTION>
                                        <OPTION VALUE="Outils de presentation">Outils de presentation</OPTION>
                                        <OPTION VALUE="Messagerie">Messagerie</OPTION>
                                        <OPTION VALUE="Base de donnees">Base de donnees</OPTION>
                                        <OPTION VALUE="Base de donnees">Autres</OPTION>
                                    </SELECT></td>
                            </tr>
                            <tr>
                                <th align="right">Connaissance</th>
                                <td><SELECT name="INFORMATIQUE_NIV">
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Base">Base</OPTION>
                                        <OPTION VALUE="Moyen">Moyen</OPTION>
                                        <OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
                                    </SELECT></td>
                            </tr>


                        </table>
                    </fieldset>
                </div>
                <div id="connaissancesInformatiques_noforms_template">Aucune connaissance informatique renseignee</div>
                <div id="connaissancesInformatiques_controls">
                    <table>
                        <tr>
                            <td><div id="connaissancesInformatiques_add"><a><span>Ajouter une connaissance informatique<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                            <td><div id="connaissancesInformatiques_remove_last"><a><span>Supprimer une connaissance informatique<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="autreconInfo">
                <div id="autreconInfo_template">
                    <fieldset>
                        <legend><?php echo "7.#index#"?>-Précisez d'autres Connaissances Informatique</legend>
                        <span>Mentionnez éventuellement d'autres logiciels qui sont pertinents pour la fonction souhaitée.</span><br/>
                        &nbsp;&nbsp;
                        <table>
                            <tr>
                                <th align="right">Outils   : </th>
                                <td><INPUT type="text" name="AUTRE_LOGICIELS[]" placeholder="" size="30" maxlength="10"/></td>
                            </tr>
                            <tr>
                                <th align="right">Connaissance : </th>
                                <td><SELECT name="AUTRE_INFORMATIQUE_NIV">
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Base">Base</OPTION>
                                        <OPTION VALUE="Moyen">Moyen</OPTION>
                                        <OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
                                    </SELECT></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div id="autreconInfo_noforms_template">Aucune autre connaissance informatique renseignee</div>
                <div id="autreconInfo_controls">
                    <table>
                        <tr>
                            <td><div id="autreconInfo_add"><a><span>Ajouter une autre connaissance informatique<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                            <td><div id="autreconInfo_remove_last"><a><span>Supprimer une autre connaissance informatique<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </td>

</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>

        <a id="displayBlocLangue" href="#">Connaissances Linguistiques</a>
        <div style="border:solid;"id="monBlocLangue">

            <div id="conLinguistiques">
                <div id="conLinguistiques_template">
                    <fieldset>
                        <legend><?php echo "8.#index#"?>- Indiquez dans quelle mesure vous maîtrisez les langues ci-dessous</legend>
                        <table>
                            <tr>
                                <th align="right">Langue : </th>
                                <td><SELECT name="LANGUE_NOM[]">
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Francais">Francais</OPTION>
                                        <OPTION VALUE="Anglais">Anglais</OPTION>
                                    </SELECT></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th align="right">Expression orale : </th>
                                <td><SELECT name="LANGUE_ORALE[]">
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Base">Base</OPTION>
                                        <OPTION VALUE="Moyen">Moyen</OPTION>
                                        <OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
                                    </SELECT></td>
                            </tr>
                            <tr>
                                <th align="right">Expression ecrite : </th>
                                <td><SELECT name="LANGUE_ECRITE[]">
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Base">Base</OPTION>
                                        <OPTION VALUE="Moyen">Moyen</OPTION>
                                        <OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
                                    </SELECT></td>
                            </tr>
                            <tr>
                                <th align="right">Lecture : </th>
                                <td><SELECT name="LANGUE_LECTURE[]">
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Base">Base</OPTION>
                                        <OPTION VALUE="Moyen">Moyen</OPTION>
                                        <OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
                                    </SELECT></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div id="conLinguistiques_noforms_template">Aucune connaissance linguistique renseign&eacute;e</div>
                <div id="conLinguistiques_controls">
                    <table>
                        <tr>
                            <td><div id="conLinguistiques_add"><a><span>Ajouter une langue<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                            <td><div id="conLinguistiques_remove_last"><a><span>Supprimer une langue<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="autreConLing">




                <div id="autreConLing_template">

                    <fieldset>
                        <legend><?php echo "9.#index#"?> Quelle(s) autre(s) langue(s) maîtrisez-vous?</legend>
                        <span>commentez brièvement dans quelle mesure vous maîtrisez ces langues</span><br/>
                        <table>
                            <tr>
                                <th align="right"><b>Langue : </b></th>
                                <td><input type="text"  name="AUTRE_LANGUE_NOM[]" placeholder="" size="30" maxlength="10"></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th align="right">Expression orale : </th>
                                <td><SELECT name="AUTRE_LANGUE_ORALE[]">
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Base">Base</OPTION>
                                        <OPTION VALUE="Moyen">Moyen</OPTION>
                                        <OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
                                    </SELECT></td>
                            </tr>
                            <tr>
                                <th align="right">Expression ecrite : </th>
                                <td><SELECT name="AUTRE_LANGUE_ECRITE[]">
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Base">Base</OPTION>
                                        <OPTION VALUE="Moyen">Moyen</OPTION>
                                        <OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
                                    </SELECT></td>
                            </tr>
                            <tr>
                                <th align="right">Lecture : </th>
                                <td><SELECT name="AUTRE_LANGUE_LECTURE[]">
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Base">Base</OPTION>
                                        <OPTION VALUE="Moyen">Moyen</OPTION>
                                        <OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
                                    </SELECT></td>
                            </tr>
                        </table>
                    </fieldset>

                </div>

                <div id="autreConLing_noforms_template">Aucune autre connaissance linguistique renseignee</div>
                <div id="autreConLing_controls">
                    <table>
                        <tr>
                            <td><div id="autreConLing_add"><a><span>Ajouter une autre connaissance linguistique<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                            <td><div id="autreConLing_remove_last"><a><span>Supprimer une autre connaissance linguistique<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </td>

</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td><a id="displayBlocCompetence" href="#">Competences</a>
        <div style="border:solid;"id="monBlocCompetence">
            <fieldset>
                <legend>10 - Competences</legend>
                <span>Saisissez vos competences</span> <br>
                <textarea name="COMP_LIB" rows="5" cols="50" wrap="off" placeholder="" size="30" maxlength="10"> Saisissez vos competences</textarea>
            </fieldset>
        </div></td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td><a id="displayBlocQualite" href="#">Qualites</a>
        <div style="border:solid;"id="monBlocQualite">
            <fieldset>
                <legend>3- Qualit&eacute;s personnelles</legend>
                <br>
                <textarea name="QUAL_LIB" rows="5" cols="50" wrap="off"> Saisissez vos qualites personnelles</textarea>
            </fieldset>
        </div></td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td><a id="displayBlocMotivation" href="#">Motivation</a>
        <div style="border:solid;"id="monBlocMotivation">
            <fieldset>
                <legend>.Motivation<font color=red>*</font></legend>
                <p><b>1- Veuillez saisir votre motivation pour le poste </b></p>
                <textarea name="CANDIDAT_MOTIV_POSTE" rows="6" cols="60" maxlength="255" nowrapplaceholder="" size="30"  >
                    Saisissez la motivation pour le poste
                </textarea>
                <p><b>11-Lettre de motivation </b></p>
                <textarea name="LETTRE_MOTIVATION" rows="20" cols="60" wrap="off" placeholder="" id="LETTRE_MOTIVATION" required size="30" maxlength="10"> Saisissez vottre lettre de  motivation pour le poste</textarea>
            </fieldset>
        </div></td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>
        <a id="displayBlocReference" href="#">R&eacute;f&eacute;rences</a>
        <div style="border:solid;"id="monBlocReference">
            <div id="reference">
                <div id="reference_template">
                    <fieldset>
                        <legend><?php echo "12.#index#"?>-R&eacute;f&eacute;rences</legend>
                        <table>
                            <tr>Veuillez donner le nom et les coordonn&eacute;es de trois personnes n'ayant avec vous aucun lien de parent&eacute; et connaissant vos aptitudes professionnelles et vos qualit&eacute;s personnelles. </tr>
                            <tr>
                                <th align="right">Nom Entreprise : </th>
                                <td><input type="text" name="REF_NOM_ENT[]" placeholder="" size="30" maxlength="10">
                                    : </td>
                            </tr>
                            <tr>
                                <th align="right">Nom de la personne &agrave; contacter : </th>
                                <td><input type="text" name="REF_PERS_CONT[]" placeholder="" size="30" maxlength="10"></td>
                            </tr>
                            <tr>
                                <th align="right">Poste occup&eacute; : </th>
                                <td><input type="text" name="REF_POST_OCC[]" placeholder="" size="30" maxlength="10"></td>
                            </tr>
                            <tr>
                                <th align="right">T&eacute;l&eacute;phone : </th>
                                <td><input type="text" name="REF_TEL[]" placeholder="" size="30" maxlength="10"></td>
                            </tr>
                            <tr>
                                <th align="right">Email : </th>
                                <td><input type="text" name="REF_EMAIL[]" placeholder="" size="30" maxlength="10"></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div id="reference_noforms_template">Aucune autre r&eacute;f&eacute;rence renseign&eacute;e</div>
                <div id="reference_controls">
                    <table>
                        <tr>
                            <td><div id="reference_add"><a><span>Ajouter une autre r&eacute;f&eacute;rence<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                            <td><div id="reference_remove_last"><a><span>Supprimer une autre r&eacute;f&eacute;rence<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td><a id="displayBlocPiece" href="#">P&egrave;ces jointes</a>
        <div style="border:solid;"id="monBlocPiece">
            <fieldset>
                <legend>13. P&egrave;ces jointes</legend>
                <table>
                    <tr>
                        <th align="right">Demande d'emploi <font color=red>*</font> : </th>
                        <td><input type="file" value="photo" name="CANDIDAT_DEMANDE_EMPLOI" required="true"></td>
                    </tr>
                    <tr>
                        <th align="right">CV <font color=red>*</font> : </th>
                        <td><input type="file" value="photo" name="CANDIDAT_CV" required="true"></td>
                    </tr>
                    <tr>
                        <th align="right">Certificat du dernier emploi <font color=red>*</font> : </th>
                        <td><input type="file" value="photo" name="CANDIDAT_CERTIFICAT_TRAVAIL" ></td>
                    </tr>
                    <tr>
                        <th align="right">Photo <font color=red>*</font> : </th>
                        <td><input type="file" value="photo" name="CANDIDAT_PHOTO" required="true"></td>
                    </tr>
                    <tr>
                        <th align="right">Extrait de l'acte de naissance <font color=red>*</font> : </th>
                        <td><input type="file" value="acte_naissance" name="CANDIDAT_ACTE_NAISS" required="true"></td>
                    </tr>
                    <tr>
                        <th align="right">Livret de famille ou Fiche Famille <font color=red>*</font> : </th>
                        <td><input type="file" value="fiche_famille" name="CANDIDAT_FICHE_FAMILLE" required="true"></td>
                    </tr>
                    <tr>
                        <th align="right">Certificat de nationalit&eacute;<font color=red>*</font> : </th>
                        <td><input type="file" value="certif_nat" name="CANDIDAT_CERTIF_NAT" required="true"></td>
                    </tr>
                    <tr>
                        <th align="right">Certificat de domicile <font color=red>*</font> : </th>
                        <td><input type="file" value="certificat_domicile" name="CANDIDAT_CERTIF_DOMICILE" required="true"></td>
                    </tr>
                    <tr>
                        <th align="right">Certificat m&eacute;dical <font color=red>*</font> : </th>
                        <td><input type="file" value="certificat_medical" name="CANDIDAT_CERTIF_MEDICAL" required="true"></td>
                    </tr>
                    <tr>
                        <th align="right">Casier judiciaire <font color=red>*</font> : </th>
                        <td><input type="file" value="casier_judiciaire" name="CANDIDAT_CASIER_JUDICIAIRE" required="true"></td>
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
        <input type="submit" name="envoyer" value="Envoyer"></td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
</table>
</td></tr>
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