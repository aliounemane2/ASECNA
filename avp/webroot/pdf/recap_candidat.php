<?php 
@session_start();
require_once($_SESSION['AVP_CONFIG']);

$annonce_id="";

if(isset($_GET["annonce_id"]))
{
	 $annonce_id=$_GET["annonce_id"];
}

$fk_util_id=@$_SESSION["id_user"];


$obj_candidat=new Candidat_class();
$obj_autre_formation=new Autre_formation_class();
$obj_connaissances_informatiques=new Connaissances_informatiques_class();
$obj_competence=new Competences_class();
$obj_connaissances_linguistique=new Connaissances_linguistiques_class();
$obj_dossier=new Dossier_class();
$obj_experience_professionnelle=new Experience_professionnelle_class();
$obj_famille=new Famille_class();
$obj_formation=new Formation_class();
$obj_lettre_motiv=new Lettre_motivation_class();
$obj_qualite=new Qualites_class();
$obj_Realisation=new Realisation_class();
$obj_reference=new Reference_class();


//*******************recuperation des info du candidat ********************//

//@$liste_candidat=$obj_candidat->fct_candidat_info($annonce_id,$fk_util_id);
@$liste_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
//print_r(@$liste_candidat);

$candidat_id=@$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];

//************************************************************************//

if($candidat_id!="" && !empty($candidat_id))
{
	@$liste_autre_form=$obj_autre_formation->lister_autre_formBy_CAN_ID($candidat_id);
	@$liste_competence=$obj_competence->lister_comp_By_CAN_ID($candidat_id);
	@$liste_con_inf=$obj_connaissances_informatiques->lister_connaissances_inf_By_CAND_ID($candidat_id);
	@$liste_con_ling=$obj_connaissances_linguistique->lister_connaissances_ling_By_CAND_ID($candidat_id);
	@$liste_dossier=$obj_dossier->lister_dossier_By_CAND_ID($candidat_id);
	
	@$liste_experience=$obj_experience_professionnelle->lister_experience_prof_By_CAND_ID($candidat_id);
	@$liste_famille=$obj_famille->lister_famille_By_CAND_ID($candidat_id);
	@$liste_formation=$obj_formation->lister_form_By_CAND_ID($candidat_id);
	@$liste_lettre_motiv=$obj_lettre_motiv->lister_lettre_motiv_By_CAND_ID($candidat_id);
	@$liste_qualite=$obj_qualite->lister_qualites_By_CAND_ID($candidat_id);
	
	@$liste_realisation=$obj_Realisation->lister_real_By_CAND_ID($candidat_id);
	@$liste_reference=$obj_reference->lister_ref_By_CAND_ID($candidat_id);

?>
<!-- CSS goes in the document HEAD or added to your external stylesheet -->

<style type="text/css">
    .photo{
        position: absolute;
        top: 165px;
        right: 50px;
    }
    h1 {
        color: green;
        text-align: center;
        font-weight: bold;
        font-size: 30pt;
    }
    h3 {
        font-familly :  Verdana,Arial,san-serif;
        color: #1E1565;
        border-bottom: #1E1565 1px solid;
		background:#CCC;
		width:100%;
    }
    div {
        font: 10pt "Verdana";
    }
</style>
<!-- Table goes in the document BODY -->


<?php
$ROOT_DIR ='avp';
?>

<page>
<div class="container" id="cv">
    <h1>RECAPITULATIF DU CV</h1>
    <br />
    <h3>INFORMATIONS PERSONNELLES</h3>
   <br />
    <div class="infos_perso">
        <form>
            <b>Type   : &nbsp; &nbsp;</b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_TYPE()] ;?> <br />
            <b>Civilité :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_CIVILITE()]?> <br />
            <b>Nom :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_NOM()]?> <br />
            <b>Prénom :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_PRENOM()]?> <br />
            <b>Matricule :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_MATRICULE()]?> <br />
            <b>Date de naissance :&nbsp; &nbsp; </b>
			<?php 
			 ($obj_candidat->La_date_est_en($liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_DATE_NAISSANCE()])==true) ? $date_naiss=$obj_candidat->dateswitch($liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_DATE_NAISSANCE()]) : $date_naiss=$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_DATE_NAISSANCE()];
			echo $date_naiss; 
			?> <br />
            <b>Lieu de naissance :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_LIEU_NAISSANCE()]?> <br />
            <b>Nationalité :&nbsp; &nbsp;</b> <?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_NATIONALITE()]?> <br />
            <b> Situation matrimoniale :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_SIT_MAT()]?> <br />
            <b>Nombre d'enfants &agrave; charge :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_NBRE_ENF()]?><br /> 
            <b>Sexe :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_CIVILITE()]?> <br />

            <b>Adresse habituelle :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_ADR_PERM()]?> <br />
            <b>Adresse actuelle :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_ADR_ACT()]?> <br />
            <b>Num&eacute;ro de t&eacute;l&eacute;phone :&nbsp; &nbsp;</b> <?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_NUM_TEL()]?><br />
            <b>Numéro de GSM :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_NUM_GSM()]?> <br />
            <b>Permis de conduire B :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_PERMIS()]?> <br />
            <b>Famille :&nbsp; &nbsp; </b><?php echo @$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_IS_FAMILLE()]?> <br />
        </form>
       <br />
        <div class="photo_droite"></div> 
         <?php echo "<img class='photo' src='".PHOTO_DIR.@$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_PHOTO()]."' width='100' height='100' >"; ?>
       
         
    </div>
    <h3>FAMILLE</h3>
     <br />
    <div>
        <?php foreach($liste_famille as $row) { ?>
            <b>Nom :&nbsp; &nbsp;</b><?php echo @$row[$obj_famille->GetCh_FAMILLE_NOM()]; ?> <br />
            <b>Prénom :&nbsp; &nbsp;</b><?php echo @$row[$obj_famille->GetCh_FAMILLE_PRENOM()]?> <br />
            <b>Structure :&nbsp; &nbsp;</b><?php echo @$row[$obj_famille->GetCh_FAMILLE_STRUCTURE()]?> <br />
            <b>Lien de parenté :&nbsp; &nbsp;</b><?php echo @$row[$obj_famille->GetCh_FAMILLE_DEGRE()]?> <br />
        <?php } ?>
    </div>
     <br />
    <h3>FORMATION</h3>
     <br />
    <div>
        <?php foreach($liste_formation as $row) 
		{ ?>
            <b>Ann&eacute;e d'&eacute;tude de :&nbsp; &nbsp;</b><?php echo @$row[$obj_formation->GetCh_FORMATION_AN_DEB()]; ?> <br />
            <b>à :&nbsp; &nbsp;</b><?php echo @$row[$obj_formation->GetCh_FORMATION_AN_FIN()]?> <br />
            <b>Nom de l'&eacute;tablissement :&nbsp; &nbsp;</b><?php echo @$row[$obj_formation->GetCh_ETABLISSEMENT_NOM()];?> <br />
            <b>Adresse de l'&eacute;tablissement :&nbsp; &nbsp;</b><?php echo @$row[$obj_formation->GetCh_FORMATION_LIEU()]?> <br />
            <b>Dipl&ocirc;mes obtenus :&nbsp; &nbsp;</b><?php echo @$row[$obj_formation->GetCh_FORMATION_DIPLOME()]?> <br />
            <b>Domaine Principal d'&eacute;tude :&nbsp; &nbsp;</b><?php echo @$row[$obj_formation->GetCh_FORMATION_DOM_PRINC_ETUD()]?> <br />
            <b>Formation cycle :&nbsp; &nbsp;</b><?php echo @$row[$obj_formation->GetCh_FORMATION_CYCLE()]?> <br />
            <b>Dipl&ocirc;me:&nbsp; &nbsp;</b><?php echo '<a href="http://localhost/'.$ROOT_DIR.'/'.@$row[$obj_formation->GetCh_FORMATION_DIPLOME_FICHIER()].'">'.@$row[$obj_formation->GetCh_FORMATION_DIPLOME()].'</a>'; ?> <br />
        <?php } ?>
    </div>
    <br />


 

<h3>TRAVAIL DE FIN D'ETUDE</h3>
  <br />
<div>
  <?php echo @$liste_realisation[0][$obj_Realisation->GetCh_REAL_LIB()]; ?><br />
</div>
 <br />
<h3>AUTRES FORMATIONS</h3>
 <br /> 
<div>
    <?php foreach($liste_autre_form as $row) { ?>
        <b>Année :&nbsp; &nbsp;</b><?php echo @$row[$obj_autre_formation->GetCh_FORMATION_AN_DEB()]; ?><br /> 
        <b>Intitule de la formation :&nbsp; &nbsp;</b><?php echo @$row[$obj_autre_formation->GetCh_FORM_LIB()];?> <br />
        <b>Centre de formation :&nbsp; &nbsp;</b><?php echo @$row[$obj_autre_formation->GetCh_FORM_NOM()];?> <br />
        <b>Utilité pour les fonctions:&nbsp; &nbsp;</b><?php echo @$row[$obj_autre_formation->GetCh_FORM_INTITULE()];?> <br />
        <b>Dipl&ocirc;me:&nbsp; &nbsp;</b><?php echo '<a href="http://localhost/'.$ROOT_DIR.'/'.@$row[$obj_autre_formation->GetCh_AUTRE_FORMATION_DIPLOME_FICHIER()].'">'.@$row[$obj_autre_formation->GetCh_FORM_NOM()].'</a>'; ?> <br />
    <?php } ?>
</div>
 <br />
<h3>EXPERIENCES</h3>
  <br />
<div>
    <?php foreach($liste_experience as $row) 
	{ 
	    $expr_str_deb=explode("##",@$row[$obj_experience_professionnelle->GetCh_EXP_DEBUT_TRAVAIL()]);
	    $expr_str_fin=explode("##",@$row[$obj_experience_professionnelle->GetCh_EXP_FIN_TRAVAIL()]);
	?>
      
        <b>Poste occupé :&nbsp; &nbsp;</b><?php echo @$row[$obj_experience_professionnelle->GetCh_EXP_POSTE()];?><br /> 
        <b>Nom et adresse de l'employeur :&nbsp; &nbsp;</b><?php echo @$row[$obj_experience_professionnelle->GetCh_EXP_ENT_NOM()];?><br /> 
        <b>Domaine d'activit&eacute;  :&nbsp; &nbsp; </b><?php echo @$row[$obj_experience_professionnelle->GetCh_EXP_SEC_ACT()];?> <br />
        <b>Dur&eacute;e de l'emploi de :&nbsp; &nbsp; </b><?php echo @$obj_experience_professionnelle->getNomMois($expr_str_deb[1])."  ".$expr_str_deb[0] ;?> <br />
        <b>à :</b><?php echo @$obj_experience_professionnelle->getNomMois($expr_str_fin[1])."  ".$expr_str_fin[0];?> <br />
        <b>Salaire brut moyen mensuel(CFA) :&nbsp; &nbsp;</b><?php echo @$row[$obj_experience_professionnelle->GetCh_EXP_SALAIRE()];?><br /> 
        <b>Nombre de personnes plac&eacute;es sous vos ordres :&nbsp; &nbsp;</b><?php echo @$row[$obj_experience_professionnelle->GetCh_EXP_NBRE_PERS_SORD()];?> <br />
        <b>Description de vos t&acirc;ches,responsabilit&eacute;s et accomplissements  :&nbsp; &nbsp;</b><?php echo @$row[$obj_experience_professionnelle->GetCh_EXP_TACHE()];?> <br />
        <b>Motif du d&eacute;part  :&nbsp; &nbsp;</b><?php echo @$row[$obj_experience_professionnelle->GetCh_EXP_MOTIF_DEP()];?> <br />
    <?php } ?>
</div>
 <br />
<h3>CONNAISSANCES INFORMATIQUES</h3>
  <br />
<div>
<?php
     foreach($liste_con_inf as $row)
	 {
        echo "Logiciel :" . @$row[$obj_connaissances_informatiques->GetCh_LOGICIELS()]."<br />";
        echo "Niveau : " . @$row[$obj_connaissances_informatiques->GetCh_INFORMATIQUE_NIV()]."<br />";
        echo " ";
     }
    ?>
</div>
  <br />
<h3>CONNAISSANCES LINGUISTIQUES</h3>
<br /><br />
<div>
<?php
    foreach($liste_con_ling as $row) 
	{
        echo "Langue: " . @$row[$obj_connaissances_linguistique->GetCh_LANGUE_NOM()]."<br />" ;
        echo "Expression orale: " .@$row[$obj_connaissances_linguistique->GetCh_LANGUE_ORALE()]."<br />" ;
        echo "Expression ecrite: " .@$row[$obj_connaissances_linguistique->GetCh_LANGUE_ECRITE()]."<br />";
        echo "Lecture: " .@$row[$obj_connaissances_linguistique->GetCh_LANGUE_LECTURE()]."<br />";
        echo " ";
    }
    ?>
</div>
<br />
 
<h3>COMPETENCES</h3>
  <br />
<div>
  <?php echo @$liste_competence[0][$obj_competence->GetCh_COMP_LIB()]." ; "; ?>
</div>
 <br />
<h3>QUALITES</h3>
<br /><br />
<div>
   <?php
    foreach($liste_qualite as $row) 
	{
        echo @$row[$obj_qualite->GetCh_QUAL_LIB()]." ; <br />";
    }
    ?>
</div>
 <br />
<h3>MOTIVATION</h3>
 <br />

   <?php
    $lettre_motiv="";
	
    foreach($liste_lettre_motiv as $row) 
	{
       $lettre_motiv.=$row[$obj_lettre_motiv->GetCh_LETTRE_MOTIVATION()]." ;<br /> ";
	}
	
    ?>
   <div><?php echo $lettre_motiv; ?></div>
 
<h3>REFERENCES</h3>
  <br />
<div>
      <?php foreach($liste_reference as $row) 
	{ 
	?>
        <b>Nom Entreprise :&nbsp; &nbsp;</b><?php echo @$row[$obj_reference->GetCh_REF_NOM_ENT()];?> <br />
        <b>Nom de la personne &agrave; contacter:&nbsp; &nbsp;</b><?php echo @$row[$obj_reference->GetCh_REF_PERS_CONT()]?> <br />
        <b>Poste occup&eacute; :&nbsp; &nbsp;</b><?php echo @$row[$obj_reference->GetCh_REF_POST_OCC()]?> <br />
        <b>T&eacute;l&eacute;phone :&nbsp; &nbsp;</b><?php echo @$row[$obj_reference->GetCh_REF_TEL()]?> <br />
        <b>Email :&nbsp; &nbsp;</b><?php echo @$row[$obj_reference->GetCh_REF_EMAIL()];?> <br />
        
    <?php } ?>
</div>
<br />
  

<?php

$dossier_data='';
$i=0;

foreach($liste_dossier as $row ) 
{
	$type_doss=@$row[$obj_dossier->GetCh_Type_doss()];
	$path_dir=$obj_dossier->getPath_dir($type_doss);
	$dossier_data.= '<a href="'.PATH_URL_SITE.$path_dir.$row[$obj_dossier->GetCh_DOSSIER_LIEN()].'">'.@$row[$obj_dossier->GetCh_DOSSIER_LIEN()].'</a><br/>';
}

?>

<h3>PIECES JOINTES</h3><br />
<div><?php echo @$dossier_data; ?></div>

<?php
}  

else
{
  echo '<div>Pas de données </div>';	
}

?>
</div>
</page>

