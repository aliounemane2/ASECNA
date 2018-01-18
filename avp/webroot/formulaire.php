<script type="text/javascript">

    function test_annee()
	{
        var ann1=$('#FORMATION_AN_DEB').val();
        var ann2=$('#FORMATION_AN_FIN').val();

        if(ann1>ann2)
		{
            alert('Annee debut de formation doit etre inferieure a Annee fin de formation');
            return false;
        }
    }

    function verif_indicatif()
    {
        var val= $('#CANDIDAT_INDICATIF').val();

        if(val=="")
        {
            alert("Indicatif obligatoire");
            return false;

        }

    }

</script>
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
$ca_ind 			=isset($_POST['CANDIDAT_INDICATIF'])					? trim($_POST['CANDIDAT_INDICATIF'])			: "";
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

$erreur="";
$var=isset($_POST["envoyer"]);
$nom=isset($_POST["CANDIDAT_NOM"]) ? trim($_POST["CANDIDAT_NOM"]): "";
$prenom=isset($_POST["CANDIDAT_PRENOM"]) ? trim($_POST["CANDIDAT_PRENOM"]): "";
$test=$_SESSION["id_user"];
$test1=$_GET['id_annonce'];


if($var <> ""){
    $exereq = mysql_query("select count(FK_UTIL_ID) as nblogin from  candidat where FK_UTIL_ID ='" . $_SESSION["id_user"] . "'");
//$exereq=mysql_query("select count(CANDIDAT_LOGIN) as nblogin from  candidat where CANDIDAT_LOGIN ='".$_POST["CANDIDAT_LOGIN"]."'");
    $nblogin = mysql_fetch_array($exereq);
    $nblogin = $nblogin['nblogin'];
    if($nblogin >=1 ){
        $erreur="<center><font color='#FF000'>Le login existe deja!</font></center>";
    }else{
        // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        if((isset($_POST["CANDIDAT_NOM"]))&&($_POST["CANDIDAT_NOM"]!='')){
            $sql ='INSERT INTO candidat VALUES ("",
		"'.htmlentities($_POST["CANDIDAT_TYPE"]).'",
		"'.htmlentities($_POST["CANDIDAT_CIVILITE"]).'",
		"'.htmlentities($_POST["CANDIDAT_NOM"]).'",
		"'.htmlentities($_POST["CANDIDAT_PRENOM"]).'",
		"'.htmlentities($_POST["CANDIDAT_MATRICULE"]).'",
		"'.mysql_real_escape_string($_POST["CANDIDAT_DATE_NAISSANCE"]).'",
		"'.htmlentities($_POST["CANDIDAT_LIEU_NAISSANCE"]).'",
		"'.htmlentities($_POST["CANDIDAT_NATIONALITE"]).'",
		"'.htmlentities($_POST["CANDIDAT_SIT_MAT"]).'",
		"'.htmlentities($_POST["CANDIDAT_NBRE_ENF"]).'",
		"'.htmlentities($_POST["CANDIDAT_ADR_PERM"]).'",
		"'.htmlentities($_POST["CANDIDAT_ADR_ACT"]).'",
		"'.htmlentities($_POST["CANDIDAT_INDICATIF"]).'",
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
                if($_POST["FAMILLE_NOM"][$i]!='')
                {
                    $sql= 'INSERT INTO famille VALUES ("",
				"'.htmlentities($_POST["FAMILLE_NOM"][$i]).'",
				"'.htmlentities($_POST["FAMILLE_PRENOM"][$i]).'",
				"'.htmlentities($_POST["FAMILLE_STRUCTURE"][$i]).'",
				"'.htmlentities($_POST["FAMILLE_DEGRE"][$i]).'",
				"'.htmlentities($numero_insere).'")';
                    // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
                    mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                }
            }
        }

        /***************INSERTION DANS LA TABLE FORMATION AVEC AJOUT MULTIPLES**********/
        if(isset($_POST["FORMATION_AN_DEB"])){

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
									"'.htmlentities($_POST["FORMATION_AN_DEB"][$i]).'",
									"'.htmlentities($_POST["FORMATION_AN_FIN"][$i]).'",
									"'.htmlentities($_POST["ETABLISSEMENT_NOM"][$i]).'",
									"'.htmlentities($_POST["FORMATION_LIEU"][$i]).'",
									"'.htmlentities($_POST["FORMATION_DIPLOME"][$i]).'",
									"'.htmlentities($_POST["FORMATION_DOM_PRINC_ETUD"][$i]).'",
									"'.htmlentities($numero_insere).'",
									"'.htmlentities($_POST["FORMATION_CYCLE"][$i]).'",
									"'.htmlentities($chemin).'")';

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
									"'.htmlentities($numero_insere).'")';

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
				"'.htmlentities($_POST["FORMATION_AN_DEB"][$i]).'",
				"'.htmlentities($_POST["FORM_LIB"][$i]).'",
				"'.htmlentities($_POST["FORM_NOM"][$i]).'",
				"'.htmlentities($_POST["FORM_INTITULE"][$i]).'",
				"'.htmlentities($numero_insere).'",
				"'.htmlentities($chemin).'")';

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
			"'.htmlentities($_POST["EXP_ENT_NOM"][$i]).'",
			"'.htmlentities($_POST["EXP_SEC_ACT"][$i]).'",
			"'.htmlentities($_POST["EXP_POSTE"][$i]).'",
			"'.htmlentities($_POST["EXP_DEBUT_TRAVAIL"][$i]).'",
			"'.htmlentities($_POST["EXP_FIN_TRAVAIL"][$i]).'",
			"'.htmlentities($_POST["EXP_SALAIRE"][$i]).'",
			"'.htmlentities($_POST["EXP_NBRE_PERS_SORD"][$i]).'",
			"'.htmlentities($_POST["EXP_TACHE"][$i]).'",
			"'.htmlentities($_POST["EXP_MOTIF_DEP"][$i]).'",
			"'.htmlentities($numero_insere).'")';
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
			"'.htmlentities($_POST["LOGICIELS"][$i]).'",
			"'.htmlentities($_POST["INFORMATIQUE_NIV"]).'",
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
			"'.htmlentities($_POST["AUTRE_LOGICIELS"][$i]).'",
			"'.htmlentities($_POST["AUTRE_INFORMATIQUE_NIV"]).'",
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
			"'.htmlentities($_POST["LANGUE_NOM"][$i]).'",
			"'.htmlentities($_POST["LANGUE_ORALE"][$i]).'",
			"'.htmlentities($_POST["LANGUE_ECRITE"][$i]).'",
			"'.htmlentities($_POST["LANGUE_LECTURE"][$i]).'",
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
			"'.htmlentities($_POST["AUTRE_LANGUE_NOM"][$i]).'",
			"'.htmlentities($_POST["AUTRE_LANGUE_ORALE"][$i]).'",
			"'.htmlentities($_POST["AUTRE_LANGUE_ECRITE"][$i]).'",
			"'.htmlentities($_POST["AUTRE_LANGUE_LECTURE"][$i]).'",
			"'.$numero_insere.'")';
                // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
                mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
            }
        }

        if($_POST["COMP_LIB"]!='')
        {
            $sql= 'INSERT INTO COMPETENCES  VALUES ("",
		"'.htmlentities($_POST["COMP_LIB"]).'",
		"'.$numero_insere.'")';
            // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        }

        if($_POST["QUAL_LIB"]!='')
        {
            $sql= 'INSERT INTO QUALITES  VALUES ("",
		"'.htmlentities($_POST["QUAL_LIB"]).'",
		"'.$numero_insere.'")';
            // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        }

        if($_POST["LETTRE_MOTIVATION"]!='')
        {


            $sql= 'INSERT INTO lettre_motivation VALUES ("",
		"'.htmlentities($_POST["LETTRE_MOTIVATION"]).'",
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
			"'.htmlentities($_POST["REF_NOM_ENT"][$i]).'",
			"'.htmlentities($_POST["REF_PERS_CONT"][$i]).'",
			"'.htmlentities($_POST["REF_POST_OCC"][$i]).'",
			"'.htmlentities($_POST["REF_TEL"][$i]).'",
			"'.htmlentities($_POST["REF_EMAIL"][$i]).'",
			"'.$numero_insere.'")';

                // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
                mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
            }
        }

// Début Transfert des fichiers

// Création du répertoire de l'agent




//mkdir($numero_insere);

        if(isset($_FILES['CANDIDAT_DEMANDE_EMPLOI']) && !empty($_FILES['CANDIDAT_DEMANDE_EMPLOI']['name'])){
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
            "'.$numero_insere.'"
            )';
            // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        }

        if(isset($_FILES['CANDIDAT_CV']) && !empty($_FILES['CANDIDAT_CV']['name'])){
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
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        }

        if(isset($_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']) && !empty($_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name'])){
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
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        }

        if(isset($_FILES['CANDIDAT_PHOTO']) && !empty($_FILES['CANDIDAT_PHOTO']['name'])){
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
        }

        if(isset($_FILES['CANDIDAT_ACTE_NAISS']) && !empty($_FILES['CANDIDAT_ACTE_NAISS']['name'])){
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
        }

        if(isset($_FILES['CANDIDAT_FICHE_FAMILLE']) && !empty($_FILES['CANDIDAT_FICHE_FAMILLE']['name'])){
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
        }

        if(isset($_FILES['CANDIDAT_CERTIF_NAT']) && !empty($_FILES['CANDIDAT_CERTIF_NAT']['name'])){
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
        }

        if(isset($_FILES['CANDIDAT_CERTIF_DOMICILE']) && !empty($_FILES['CANDIDAT_CERTIF_DOMICILE']['name'])){
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
        }

        if(isset($_FILES['CANDIDAT_CERTIF_MEDICAL']) && !empty($_FILES['CANDIDAT_CERTIF_MEDICAL']['name'])){
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
        }

        if(isset($_FILES['CANDIDAT_CASIER_JUDICIAIRE']) && !empty($_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name'])){
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
        }
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




        header('Location:index.php?url=formulaire_valide');

    }
}
/*}*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Turn plain webform into a powerful wizard with jQuery</title>
    <style type="text/css">
        /* body { font-family:Lucida Sans, Arial, Helvetica, Sans-Serif; font-size:13px; margin:20px;}
         #main { width:600px; margin: 0px auto; border:solid 1px #b2b3b5; -moz-border-radius:10px; padding:20px; background-color:#f6f6f6;}
         #header { text-align:center; border-bottom:solid 1px #b2b3b5; margin: 0 0 20px 0; }
         fieldset { border:none; width:320px;}
         legend { font-size:18px; margin:0px; padding:10px 0px; color:#b0232a; font-weight:bold;}
         label { display:block; margin:15px 0 5px;}
         input[type=text], input[type=password] { width:300px; padding:5px; border:solid 1px #000;}*/
        .first, .next, .last, .prev { margin-top: 2px; }
        .first, .next,.last { background-color:#102D84; padding:5px 10px; color:#fff; text-decoration:none;}
        .first:hover, .next:hover,.last:hover { background-color:#000; text-decoration:none;}
        .first { float:left; }
        .prev, .next { background-color:#102D84; padding:5px 10px; color:#fff; text-decoration:none;}
        .prev:hover, .next:hover { background-color:#000; text-decoration:none;}
        .prev { position:absolute; right:43%;}
        .next { position:absolute; right:20%;}
        .last { float:right;}
        #steps { list-style:none; width:100%; overflow:hidden; margin:0px; padding:0px;}
        #steps li {font-size:15px; float:left; padding:10px; color:#b0b1b3;}
        #steps li span {font-size:11px; display:block;}
        #steps li.current { color:#000;}
        #makeWizard { background-color:#102D84; color:#fff; padding:5px 10px; text-decoration:none; font-size:18px;}
        #makeWizard:hover { background-color:#000;}
		
    </style>
    <script type="text/javascript" src="formToWizard.js"></script>
    <script type="text/javascript">
        function valider()
        {
            if(event.keyCode==13)
            {
                alert("ok");
                //return false;
            }

        }
        var fin=false;
        $(document).ready(function(){
            $("#SignupForm").formToWizard({ submitButton: 'SaveAccount' })
        });
    </script>


</head>
<body>
<div id="main">

<!--form id="SignupForm" action=""-->
<form action="index.php?url=formulaire&titre_annonce=<?php echo $_GET["titre_annonce"]; ?>&id_annonce=<?php echo $_GET["id_annonce"]; ?>&date_delai_annonce=<?php echo $_GET["date_delai_annonce"]; ?>" method="post" enctype="multipart/form-data" id="SignupForm"  required name="formulaire">

<tr>
    <center><td valign=top colspan=2 class="titre1"><b><center></center><h2>Candidature au poste de <?php  echo $_GET['titre_annonce']; ?></h2></b></td></center><br/>
</tr>
<tr><td><b><?php if($erreur) echo $erreur; ?> </b></td></tr>
<tr>
    <td>
        <debut>
            <!--<a id="displayBlocCoordonnes" href="#">Coordonnees</a>-->
            <div style="border:solid;"id="monBlocCoordonnes">
                <!--  debut tableau Coordonnees personnelles -->
                <fieldset>
                    <legend1>Coordonnées</legend1>
                    <legend>1-Coordonnées personnelles</legend>
                    <p>Indiquez ci-dessous vos coordonnées personnelles.</p>

                    <table >
                        <tr>
                            <th><div align="right">Type de candidature : <font color=red>*</font></div></th>
                            <td><select required name="CANDIDAT_TYPE" id="id_CANDIDAT_TYPE">
                                    <option value="">S&eacute;lectionnez</option>
                                    <option value="Interne">Interne</option>
                                    <option value="Externe">Externe</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><div align="right">Civilit&eacute; : <font color=red>*</font></div></th>
                            <td><SELECT required name="CANDIDAT_CIVILITE">
                                    <option value="">S&eacute;lectionnez</option>
                                    <OPTION VALUE="M.">M.</OPTION>
                                    <OPTION VALUE="Mme">Mme</OPTION>
                                    <OPTION VALUE="Melle">Melle</OPTION>
                                </SELECT></td>
                        </tr>
                        <tr>
                            <th><div align="right">Nom : <font color=red>*</font> </div></th>
                            <td><input required type="text" name="CANDIDAT_NOM" placeholder="" id="CANDIDAT_NOM"   maxlength="30"  OnBlur="validite('formulaire','CANDIDAT_NOM','AN',2,30);"/></td>
                        </tr>
                        <tr>
                            <th><div align="right">Pr&eacute;nom : </div></th>
                            <td><INPUT  type="text" name="CANDIDAT_PRENOM" placeholder="" id="CANDIDAT_PRENOM"  size="30" maxlength="30" /></td>
                        </tr>
                        <tr id="MAT">
                            <th><div align="right">Num&eacute;ro matricule : </div></th>
                            <td><INPUT type="text" name="CANDIDAT_MATRICULE" placeholder="" size="30" maxlength="6" value="<?php if($ca_matricule) echo $ca_matricule; ?>" <!--OnBlur="validite('formulaire','CANDIDAT_MATRICULE','N',6,6);"--></td>
                        </tr>
                        <tr>
                            <th><div align="right">Date de naissance : <font color=red>*</font></div></th>
                            <td><INPUT required type="text" name="CANDIDAT_DATE_NAISSANCE" placeholder="aaaa-mm-jj" class="datepicker" /></td>
                        </tr>
                        <tr>
                            <th><div align="right">Lieu de naissance  : </div></th>
                            <td><INPUT type="text" name="CANDIDAT_LIEU_NAISSANCE" placeholder="" value="<?php if($ca_lieu_nais) echo $ca_lieu_nais; ?>" size="30" maxlength="30"/></td>
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
                            <th><div align="right">Situation matrimoniale : <font color=red>*</font></div></th>
                            <td><SELECT  required name="CANDIDAT_SIT_MAT">
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
                            <th><div align="right">Adresse habituelle : <font color=red>*</font></div></th>
                            <td><textarea required name="CANDIDAT_ADR_PERM" cols="30" rows="2" id="CANDIDAT_ADR_PERM"  placeholder="" ></textarea></td>
                        </tr>
                        <tr>
                            <th><div align="right">Adresse actuelle : </div></th>
                            <td><textarea name="CANDIDAT_ADR_ACT" cols="30" rows="2" value="<?php if($ca_adr_act) echo $ca_adr_act; ?>" placeholder=""></textarea></td>
                        </tr>


                        <tr>
                            <th><div align="right">Indicatif du pays  : </div></th>
                            <td><select name="CANDIDAT_INDICATIF" id="CANDIDAT_INDICATIF">
                                <?php
                               $sql='SELECT code,nom_pays FROM pays';
                                $list = mysql_query($sql);
                                ?>

                             <option value="" >Selectionnez un indicatif</option>
                             <?php
                             while ($data = mysql_fetch_array($list))
                                {
                               ?>
                                   <option value="<?php echo $data['code']; ?>" ><?php echo "(+ ".$data['code']." ) ".$data['nom_pays']; ?></option>

                              <?php
                                }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                            <th><div align="right">Num&eacute;ro de t&eacute;l&eacute;phone  : </div></th>
                            <td><INPUT type="text" name="CANDIDAT_NUM_TEL" placeholder="" value="<?php if($ca_num_tel) echo $ca_num_tel; ?>" size="30" maxlength="15" onKeyPress="return verif_indicatif();"/></td>
                        </tr>
                        <tr>
                            <th><div align="right">Num&eacute;ro de GSM : </div></th>
                            <td><INPUT type="text" name="CANDIDAT_NUM_GSM" placeholder="" value="<?php if($ca_num_gsm) echo $ca_num_gsm; ?>" size="30" maxlength="15"  onkeypress="return verif_indicatif();"/></td>
                        </tr>
                        <tr>
                            <th><div align="right">Permis de conduire :</div></th>
                            <td><SELECT name="CANDIDAT_PERMIS">
                                    <option value="">S&eacute;lectionnez</option>
                                    <OPTION VALUE="A1">A1</OPTION>
                                    <OPTION VALUE="A">A</OPTION>
                                    <OPTION VALUE="B">B</OPTION>
                                    <OPTION VALUE="C">C</OPTION>
                                    <OPTION VALUE="D">D</OPTION>
                                    <OPTION VALUE="E">E</OPTION>
                                    <OPTION VALUE="F">F</OPTION>
                                </SELECT></td>
                        </tr>
                        <tr>
                            <th><div align="right">Avez vous des parents &agrave; l'ASECNA : <font color=red>*</font></div></th>
                            <td><SELECT  required name="CANDIDAT_IS_FAMILLE" id="id_CANDIDAT_IS_FAMILLE">
                                    <option value="">S&eacute;lectionnez</option>
                                    <OPTION VALUE="Oui">Oui</OPTION>
                                    <OPTION VALUE="Non">Non</OPTION>
                                </SELECT></td>
                        </tr>
                    </table>

                    <p>Si affirmatif, veuillez saisir les informations sur les liens de parent&eacute;</p>
                </fieldset>
                <!--  fin tableau Coordonnees personnelles -->
                <div class="display_famille" style="display: none;">
                    <div id="famille">
                        <div id="famille_template">
                            <fieldset>
                                <legend><b> <?php echo "1.#index#"?>-Infos famille</b> </legend>
                                <table>
                                    <tr>
                                        <th align="right">Nom :</th>
                                        <td><input type="text" name="FAMILLE_NOM[]" placeholder="" value="<?php if($fa_nom) echo $fa_nom; ?>" size="30" maxlength="30" ></td>
                                    </tr>
                                    <tr>
                                        <th align="right">Pr&eacute;noms :</th>
                                        <td><input type="text" name="FAMILLE_PRENOM[]" placeholder="" value="<?php if($fa_prenom) echo $fa_prenom; ?>" size="30" maxlength="30"></td>
                                    </tr>
                                    <tr>
                                        <th align="right">Structure :</th>
                                        <td><input type="text" name="FAMILLE_STRUCTURE[]" placeholder="" value="<?php if($fa_structure) echo $fa_structure; ?>" size="30" maxlength="30"></td>
                                    </tr>
                                    <tr>
                                        <th align="right">Degr&eacute; :</th>
                                        <td><input type="text" name="FAMILLE_DEGRE[]" placeholder="" value="<?php if($fa_degre) echo $fa_degre; ?>" size="30" maxlength="30"></td>
                                    </tr>
                                </table>
                            </fieldset>
                        </div>
                        <div id="famille_noforms_template">Aucune information famille renseign&eacute;e</div>
                        <div id="famille_controls">
                            <table>
                                <tr>
                                    <td><div id="famille_add"><a><span>Ajouter <img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                                    <td><div id="famille_remove_last"><a><span>Supprimer<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </debut>
    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>
        <debut>
            <!--<a id="displayBlocFormation" href="#">Formation</a>-->
            <div style="border:solid;"id="monBlocFormation">
                <div id="sheepItForm_template" >
                    <fieldset id="displayBlocFormation">
                        <legend1>Formations</legend1>
                        <legend><?php echo "2.#index#"?>- Formations</legend>
                        <table>
                            <tr>
                                <th><div align="right">Formation cycle : <font color=red>*</font></div></th>
                                <td><SELECT required name="FORMATION_CYCLE[]">
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Universitaires">Universitaires</OPTION>
                                        <OPTION VALUE="Secondaires">Secondaires</OPTION>
                                    </SELECT>
                                </td>
                            </tr>
                            <tr>
                                <th> <div align="right">Ann&eacute;e d'&eacute;tude de : <font color=red>*</font></div></th>
                                <td><SELECT required name="FORMATION_AN_DEB[]"  id="FORMATION_AN_DEB">
                                        <option value="">S&eacute;lectionnez</option>
                                        <?php for ($i=1960; $i<date('Y'); $i++):
                                            echo '<OPTION VALUE='.$i.'>'.$i.'</OPTION>';
                                        endfor; ?>
                                    </SELECT></td>
                            </tr>
                            <tr>
                                <th> <div align="right">&agrave; : <font color=red>*</font></div></th>
                                <td><SELECT required name="FORMATION_AN_FIN[]"  id="FORMATION_AN_FIN"  >
                                        <option value="">S&eacute;lectionnez</option>
                                        <?php for ($i=1960; $i<date('Y'); $i++):
                                            echo '<OPTION VALUE='.$i.'>'.$i.'</OPTION>';
                                        endfor; ?>
                                    </SELECT></td>
                            </tr>
                            <tr>
                                <th><div align="right">Nom de l'&eacute;tablissement : <font color=red>*</font></div></th>
                                <td><INPUT type="text" name="ETABLISSEMENT_NOM[]" placeholder="" id="ETABLISSEMENT_NOM[]" value="<?php if($etab_nom) echo $etab_nom; ?>" required size="30" maxlength="30"/></td>
                            </tr>
                            <tr>
                                <th><div align="right">Adresse de l'&eacute;tablissement : <font color=red>*</font></div></th>
                                <td><INPUT type="text" name="FORMATION_LIEU[]" placeholder="" id="FORMATION_LIEU[]" value="<?php if($fo_lieu) echo $fo_lieu; ?>" required size="30" maxlength="30"/></td>
                            </tr>
                            <tr>
                                <th><div align="right">Niveau de formation : <font color=red>*</font></div></th>
                                <td><SELECT required name="FORMATION_DIPLOME[]">
                                        <option value="">S&eacute;lectionnez un niveau de diplôme</option>
<!--                                        <OPTION VALUE="Bac non valid&#233;">Bac non valid&#233;</OPTION>-->
                                        <OPTION VALUE="Lyc&#233;e, Niveau Bac">Lyc&#233;e, Niveau Bac</OPTION>
                                        <OPTION VALUE="Bac Professionnel, BEP, CAP">Bac Professionnel, BEP, CAP</OPTION>
                                        <OPTION VALUE="DUT, BTS, Bac + 2">DUT, BTS, Bac + 2</OPTION>
<!--                                        <OPTION VALUE="Dipl&#244;me non valid&#233;">Dipl&#244;me non valid&#233;</OPTION>-->
                                        <OPTION VALUE="Licence, Bac + 3">Licence, Bac + 3</OPTION>
                                        <OPTION VALUE="Ma&#238;trise,Master 1, IEP, IUP,Ingénieur Bac + 4">Ma&#238;trise, Master 1, IEP, IUP, Ingénieur, Bac + 4</OPTION>
                                        <OPTION VALUE="DESS, DEA, Master 2,Ingénieur, Bac + 5">DESS, DEA, Master 2,Ingénieur, Bac + 5</OPTION>
                                        <OPTION VALUE="Doctorat, 3&#232;me cycle">Doctorat, 3&#232;me cycle</OPTION>
                                        <OPTION VALUE="Expert, Recherche">Expert, Recherche</OPTION>
                                    </SELECT>

                                </td>
                            </tr>
                            <tr>
                                <th><div align="right">Domaine Principal d'&eacute;tude : <font color=red>*</font></div></th>
                                <td><INPUT type="text" name="FORMATION_DOM_PRINC_ETUD[]" placeholder="" id="FORMATION_DOM_PRINC_ETUD[]" value="<?php if($fo_dom_princ_etud) echo $fo_dom_princ_etud; ?>" required size="30" maxlength="30"/></td>
                            </tr>
                            <tr>
                                <th><div align="right">Diplôme : <font color=red>*</font></div></th>
                                <td><input type="file" class="required checkinput" accept="image/*,pdf" name="FORMATION_DIPLOME_FICHIER[]" value="<?php if($fo_diplome_fichier) echo $fo_diplome_fichier; ?>">*.jpg;*.png; taille= 5Mo</td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div id="sheepItForm_noforms_template">Aucune formation renseign&eacute;e</div>
                <div id="sheepItForm_controls">
                    <table>
                        <tr>
                            <td><div id="sheepItForm_add"><a><span>Ajouter <img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                            <td><div id="sheepItForm_remove_last"><a><span>Supprimer <img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                        </tr>
                    </table>
                </div>
            </div></debut>
    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>
        <debut>
            <!--<a id="displayBlocTravail" href="#">Travail de fin d'etudes</a>-->
            <div style="border:solid;"id="monBlocTravail">
                <fieldset>
                    <legend1>Travail de fin d'&eacute;tude</legend1>
                    <legend>3- Travail de fin d'&eacute;tude</legend>
                    <span><p>Quel &eacute;tait le titre de votre travail de fin d'&eacute;tudes(Licence,Ma&icirc;trise,Master,DEA,th&egravese; de doctorat...) pour le plus haut dipl&ocirc;me obtenu? </span></fieldset> <br>
                    <textarea name="REAL_LIB" id="REAL_LIB" rows="5" cols="25"  maxlength="255" placeholder=" Saisissez le titre du travail"></textarea>
                </fieldset>
            </div></debut>
    </td>
</tr>
<tr>
    <td>
        <debut>
            <!--<a id="displayBlocAutreFormation" href="#">Autres Formations</a>-->
            <div style="border:solid;"id="monBlocAutreFormation">
                <div id="blocs">
                    <div id="blocs_template">
                        <fieldset>
                            <legend1>Autres formations</legend1>
                            <legend><?php echo "4.#index#"?>-Autres formations</legend>
                            <span>Renseignez ci-dessous d'autres formations et/ou cours qui sont pertinents pour  le poste.</span> <br/>
                            &nbsp;&nbsp;
                            <table>
                                <tr>
                                    <th><div align="right">Intitul&eacute; de la formation   : </div></th>
                                    <td><INPUT type="text" name="FORM_LIB[]" placeholder=""   size="30" maxlength="30"/></td>
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
                                    <td><INPUT type="text" name="FORM_NOM[]" placeholder="" size="30" maxlength="30"/></td>
                                </tr>
                                <tr>
                                    <th><div align="right">Utilit&eacute; pour les fonctions   : </div></th>
                                    <td><INPUT type="text" name="FORM_INTITULE[]"/ placeholder="" size="30" maxlength="30"></td>
                                </tr>
                                <tr>
                                    <th align="right">Diplôme   : </th>
                                    <td><input type="file"  accept="image/*,pdf"  name="AUTRE_FORMATION_DIPLOME_FICHIER[]">*.pdf; *.jpeg; *.png</td>
                                </tr>
                            </table>
                        </fieldset>
                    </div>
                    <div id="blocs_noforms_template">Aucune autre formation renseign&eacute;e</div>
                    <div id="blocs_controls">
                        <table>
                            <tr>
                                <td><div id="blocs_add"><a><span>Ajouter <img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                                <td><div id="blocs_remove_last"><a><span>Supprimer <img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </debut>
    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>
        <debut>
            <!--<a id="displayBlocExperience" href="#">Exp&eacute;riences professionnelles pass&eacute;es</a>-->
            <div style="border:solid;"id="monBlocExperience">
                <div id="experiences">
                    <div id="experiences_template">
                        <fieldset>
                            <legend1>Exp&eacute;riences</legend1>
                            <legend><?php echo "5.#index#"?>-Exp&eacute;riences professionnelles pass&eacute;es</legend>
                            <p>Veuillez commencer par l'emploi le plus r&eacute;cent</p>
                            <table>
                                <tr>
                                    <th align="right">Poste occupé   : <font color=red>*</font></th>
                                    <td><INPUT type="text" name="EXP_POSTE[]" placeholder="" required size="30" maxlength="30"/></td>
                                </tr>
                                <tr>
                                    <th align="right">Nom et adresse de l'employeur   :<font color=red>*</font> </th>
                                    <td><INPUT type="text" name="EXP_ENT_NOM[]" placeholder=""  required size="30" maxlength="30"/></td>
                                </tr>
                                <tr>
                                    <th align="right">Domaine d'activit&eacute;   : <font color=red>*</font></th>
                                    <td><INPUT type="text" name="EXP_SEC_ACT[]" placeholder="" required size="30" maxlength="30"/></td>
                                </tr>
                                <tr>
                                    <th align="right">Dur&eacute;e de l'emploi de   :<font color=red>*</font> </th>
                                    <td><INPUT type="text" required name="EXP_DEBUT_TRAVAIL[]" value="" class="monthpicker"/></td>
                                </tr>
                                <tr>
                                    <th>&agrave;<font color=red>*</font></th>
                                    <td><INPUT type="text" required name="EXP_FIN_TRAVAIL[]" value="" class="monthpicker"/></td>
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
                                    <th align="right">Description de vos t&acirc;ches,responsabilit&eacute;s et accomplissements   :<font color=red>*</font> </th>
                                    <td><textarea  required name="EXP_TACHE[]" cols="30" rows="5" id="EXP_TACHE[]"  placeholder="" ></textarea></td>
                                </tr>
                                <tr>
                                    <th align="right">Motif du d&eacute;part   : <font color=red>*</font> </th>
                                    <td><INPUT type="text" required name="EXP_MOTIF_DEP[]" placeholder="" size="30" maxlength="50"/></td>
                                </tr>
                            </table>
                        </fieldset>
                    </div>
                    <div id="experiences_noforms_template">Aucune experience professionnelle passee renseignee</div>
                    <div id="experiences_controls">
                        <table>
                            <tr>
                                <td><div id="experiences_add"><a><span>Ajouter <img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                                <td><div id="experiences_remove_last"><a><span>Supprimer <img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div></debut>
    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>
        <debut>
            <!--<a id="displayBlocInformatique" href="#">Connaissances Informatiques</a>-->
            <div style="border:solid;"id="monBlocInformatique">
                <div id="connaissancesInformatiques">
                    <div id="connaissancesInformatiques_template">
                        <fieldset>
                            <legend1>Informatiques</legend1>
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
                                <td><div id="connaissancesInformatiques_add"><a><span>Ajouter <img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                                <td><div id="connaissancesInformatiques_remove_last"><a><span>Supprimer <img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
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
                                    <td><INPUT type="text" name="AUTRE_LOGICIELS[]" placeholder="" size="30" maxlength="30"/></td>
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
                                <td><div id="autreconInfo_add"><a><span>Ajouter <img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                                <td><div id="autreconInfo_remove_last"><a><span>Supprimer <img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </debut>
    </td>

</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>
        <debut>
            <!--<a id="displayBlocLangue" href="#">Connaissances Linguistiques</a>-->
            <div style="border:solid;"id="monBlocLangue">

                <div id="conLinguistiques">
                    <div id="conLinguistiques_template">
                        <fieldset>
                            <legend1>Linguistiques</legend1>
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
                                <td><div id="conLinguistiques_add"><a><span>Ajouter <img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                                <td><div id="conLinguistiques_remove_last"><a><span>Supprimer <img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
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
                                <td><div id="autreConLing_add"><a><span>Ajouter <img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                                <td><div id="autreConLing_remove_last"><a><span>Supprimer <img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </debut>
    </td>

</tr>
<tr>
    <td>
        <debut>
            <!--<a id="displayBlocCompetence" href="#">Competences</a>-->
            <div style="border:solid;"id="monBlocCompetence">
                <fieldset>
                    <legend1>Competences</legend1>
                    <legend>10 - Competences</legend>
                    <span>Saisissez vos competences</span> <br>
                    <textarea name="COMP_LIB" id="COMP_LIB" rows="5" cols="50"  maxlength="255" placeholder="Saisissez vos competences"></textarea>
                </fieldset>
            </div></td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>
        <!-- <a id="displayBlocQualite" href="#">Qualites</a>-->
        <div style="border:solid;"id="monBlocQualite">
            <fieldset>
                <legend>11 - Qualit&eacute;s personnelles</legend>
                <br>
                <textarea name="QUAL_LIB" id="QUAL_LIB" rows="5" cols="50" maxlength="255"placeholder="Saisissez vos qualites personnelles"></textarea>
            </fieldset>
        </div>
        </debut>
    </td>
</tr>
<tr>
    <td>
        <debut>
            <!--<a id="displayBlocMotivation" href="#">Motivation</a>-->
            <div style="border:solid;"id="monBlocMotivation">
                <fieldset>
                    <legend1>Lettre de motivation</legend1>
                    <legend>12 - Lettre de motivation : <font color=red>*</font></legend>
                    <textarea name="LETTRE_MOTIVATION" rows="20" cols="60" placeholder=" Saisissez vottre lettre de  motivation pour le poste" id="LETTRE_MOTIVATION" required ></textarea>
                </fieldset>
            </div>
        </debut>
    </td>
</tr>
<tr>
    <td>
        <debut>
            <!--<a id="displayBlocReference" href="#">R&eacute;f&eacute;rences</a>-->
            <div style="border:solid;"id="monBlocReference">
                <div id="reference">
                    <div id="reference_template">
                        <fieldset>
                            <legend1>R&eacute;f&eacute;rences</legend1>
                            <legend><?php echo "13.#index#"?>-R&eacute;f&eacute;rences</legend>
                            <table>
                                <tr>Veuillez donner le nom et les coordonn&eacute;es de trois personnes n'ayant avec vous aucun lien de parent&eacute; et connaissant vos aptitudes professionnelles et vos qualit&eacute;s personnelles. </tr>
                                <tr>
                                    <th align="right">Nom Entreprise : </th>
                                    <td><input type="text" name="REF_NOM_ENT[]" placeholder="" size="30" maxlength="30">
                                        : </td>
                                </tr>
                                <tr>
                                    <th align="right">Nom de la personne &agrave; contacter : </th>
                                    <td><input type="text" name="REF_PERS_CONT[]" placeholder="" size="30" maxlength="10"></td>
                                </tr>
                                <tr>
                                    <th align="right">Poste occup&eacute; : </th>
                                    <td><input type="text" name="REF_POST_OCC[]" placeholder="" size="30" maxlength="30"></td>
                                </tr>
                                <tr>
                                    <th align="right">T&eacute;l&eacute;phone : </th>
                                    <td><input type="text" name="REF_TEL[]" placeholder="" size="30" maxlength="10"></td>
                                </tr>
                                <tr>
                                    <th align="right">Email : </th>
                                    <td><input type="mail" name="REF_EMAIL[]"  OnBlur="validite('formulaire','REF_MAIL','EMAIL');" placeholder="" size="30" maxlength="30"></td>
                                </tr>
                            </table>
                        </fieldset>
                    </div>
                    <div id="reference_noforms_template">Aucune autre r&eacute;f&eacute;rence renseign&eacute;e</div>
                    <div id="reference_controls">
                        <table>
                            <tr>
                                <td><div id="reference_add"><a><span>Ajouter <img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                                <td><div id="reference_remove_last"><a><span>Supprimer <img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </debut>
    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td>
        <debut>
            <!-- <a id="displayBlocPiece" href="#">P&egrave;ces jointes</a>-->
            <div style="border:solid;"id="monBlocPiece">
                <fieldset>
                    <legend1>P&egrave;ces jointes</legend1>
                    <legend>14. P&egrave;ces jointes</legend>
                    <table>
                        <tr>
                            <th align="right">Demande d'emploi : <font color=red>*</font></th>
                            <td><input type="file" class="required checkinput" accept="image/*,pdf" value="photo" name="CANDIDAT_DEMANDE_EMPLOI">*.pdf; *.jpeg; *.jpg</td>
                        </tr>
                        <tr>
                            <th align="right">CV : <font color=red>*</font></th>
                            <td><input type="file" class="required checkinput" accept="image/*,pdf" value="photo" name="CANDIDAT_CV">*.pdf; *.jpeg; *.jpg</td>
                        </tr>
                        <tr class="is_externe">
                            <th align="right">Certificat du dernier emploi : <font color=red>*</font></th>
                            <td><input type="file" class="required checkinput" accept="image/*,pdf" value="photo" name="CANDIDAT_CERTIFICAT_TRAVAIL">*.pdf; *.jpeg; *.jpg</td>
                        </tr>
                        <tr>
                            <th align="right">Photo : <font color=red>*</font></th>
                            <td><input type="file" class="required checkinput" accept="image/*" value="photo" name="CANDIDAT_PHOTO">*.jpeg; *.jpg</td>
                        </tr>
                        <tr class="is_externe">
                            <th align="right">Extrait de l'acte de naissance : <font color=red>*</font></th>
                            <td><input type="file" class="required checkinput" accept="image/*,pdf" value="acte_naissance" name="CANDIDAT_ACTE_NAISS">*.pdf; *.jpeg; *.jpg</td>
                        </tr>
                        <tr class="is_externe">
                            <th align="right">Livret de famille ou Fiche Famille : <font color=red>*</font></th>
                            <td><input type="file" class="required checkinput" accept="image/*,pdf" value="fiche_famille" name="CANDIDAT_FICHE_FAMILLE">*.pdf; *.jpeg; *.jpg</td>
                        </tr>
                        <tr class="is_externe">
                            <th align="right">Certificat de nationalit&eacute; : <font color=red>*</font></th>
                            <td><input type="file" class="required checkinput" accept="image/*,pdf" value="certif_nat" name="CANDIDAT_CERTIF_NAT">*.pdf; *.jpeg; *.jpg</td>
                        </tr>
                        <tr class="is_externe">
                            <th align="right">Certificat de domicile : <font color=red>*</font></th>
                            <td><input type="file" class="required checkinput" accept="image/*" value="certificat_domicile" name="CANDIDAT_CERTIF_DOMICILE">*.pdf; *.jpeg; *.jpg</td>
                        </tr>
                        <tr class="is_externe">
                            <th align="right">Certificat m&eacute;dical : <font color=red>*</font></th>
                            <td><input type="file" class="required checkinput" accept="image/*,pdf" value="certificat_medical" name="CANDIDAT_CERTIF_MEDICAL">*.pdf; *.jpeg; *.jpg</td>
                        </tr>
                        <tr class="is_externe">
                            <th align="right">Casier judiciaire : <font color=red>*</font></th>
                            <td><input type="file" class="required checkinput" accept="image/*,pdf" value="casier_judiciaire" name="CANDIDAT_CASIER_JUDICIAIRE">*.pdf; *.jpeg; *.jpg</td>
                        </tr>
                    </table>
                </fieldset>
            </div>

    </td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>
<tr align="center">

    <td>
        <p align="justify">
            <input type="checkbox" required name="cr" id="id_cr"
                   style="width: 20px; margin-top:-13px;"/>
            Je certifie que les déclarations faites par moi en réponse aux questions ci-dessus sont, dans toute la mesure où je puis en être certain, vraies, complètes et exactes. Je prends note du fait que toute déclaration inexacte ou omission importante dans une notice personnelle ou toute autre pièce requise par l'ASECNA constitue, soit un rejet de la candidature, soit un motif de licenciement sans préavis ni indemnité si cela est décelé après l'engagement. </p>

        <!--input type="submit" id="RECAP" name="RECAP" value="RACP"-->
        <!--input type="submit" id="envoyer" name="envoyer" value="Envoyer"></td-->

</tr>
<tr>
    <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
</tr>

<p>
    <!--input id="SaveAccount" type="button" value="Submit form" /-->
    <input id="SaveAccount" type="submit" value="Soumettre" name="envoyer" style=" width:80px;margin-top:-5px; margin-left: 500px;" />
</p></debut>
<div id="sheepItForm"></div>
<div id="reference"><div id="reference_template"></div>
</form>
</div>
<script type="application/javascript" src="js/messages_fr.js"></script>
<script type="application/javascript" src="js/jquery.validate.min.js"></script>
<script type="application/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>

<script type="application/javascript" src="js/formulaire.js"></script>


<script>
    $(document).ready(function() {
        /*$("#ac_field").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '/avp/webroot/dataautocomplete.php',
                    data: "{ 'prefix': '" + request.term + "'}",
                    dataType: "json",
                    type: "POST",
                    contentType: "application/json; charset=utf-8",
                    success: function(data) {
                        response($.map(data.d, function(item) {
                            return {
                                label: item.split('|')[0],
                                val: item.split('|')[1]
                            }
                        }))
                    },
                    error: function(response) {
                        alert(response.responseText);
                    },
                    failure: function(response) {
                        alert(response.responseText);
                    }
                });
            },
            select: function(e, i) {
                $("#ac_field").val(i.item.val);
            },
            minLength: 1
        });


*/

    });




</script>


</body>
</html>

