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
//$test1=$_GET['id_annonce'];

$sql ='SELECT * FROM candidat WHERE FK_UTIL_ID='.$test;

$exereq= mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$result = mysql_fetch_array($exereq);

$fk_candidat_id=$result['CANDIDAT_ID'];
$sql2 ='SELECT * FROM lettre_motivation WHERE FK_CANDIDAT_ID='.$fk_candidat_id;

$exereq2= mysql_query ($sql2) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$resultat = mysql_fetch_array($exereq2);


if($var <> ""){

if($_POST["LETTRE_MOTIVATION"]!='')
{
    $sql ='UPDATE lettre_motivation SET
                   Motiv_poste="'.htmlentities($_POST["Motiv_poste"]).'",
			       LETTRE_MOTIVATION="'.htmlentities($_POST["LETTRE_MOTIVATION"]).'"
			       WHERE FK_CANDIDAT_ID='.$fk_candidat_id;

    mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());


    header('Location:index.php?url=formMotivation');


}
}





?>


<article class="art-post art-article">
    <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Profil </a> ><a href="#">Motivation </a></h3>

    <div class="art-postcontent art-postcontent-0 clearfix">

        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell layout-item-0" style="width: 100%" >
                    <p style="text-align: justify;">
		<span style="font-family: Arial;">

<!-- contenu à mettre  -->

<form action="index.php?url=formMotivation"   name="annonce" method="post" enctype="multipart/form-data" id="SignupForm>

    <fieldset>
        <p style="text-align: left"><b>1- Veuillez saisir votre motivation pour le poste </b></p>
        <textarea id="Motiv_poste" name="CANDIDAT_MOTIV_POSTE" rows="6" cols="100" nowrapplaceholder="" >
            <?php echo $resultat['Motiv_poste'];?>
        </textarea>
        <p style="text-align: left"><b>11-Lettre de motivation </b></p>
        <textarea id="LETTRE_MOTIVATION" name="LETTRE_MOTIVATION" rows="20" cols="60" wrap="off" placeholder="" id="LETTRE_MOTIVATION" required size="30"><?php echo $resultat['LETTRE_MOTIVATION'];?></textarea>
                <input type="submit" name="envoyer" value="Valider" style="margin-top:20px; margin-left: 200px;">


                </fieldset>



                </form>


                <!-- fin contenu à mettre  -->



                </span>
                </p>

            </div>
        </div>
    </div>
    </div>
</article>
<script type="application/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
<script type="text/javascript" src="js/jquery.livequery.js"></script>
<script type="text/javascript">
    jQuery("#datepicker_annonce_un, #datepicker_annonce_deux, .datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: "1960:2015",
        showOn: 'button',
        buttonImageOnly: true,
        buttonImage: 'images/calendar_icon.png'
    });


</script>