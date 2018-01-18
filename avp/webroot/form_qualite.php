<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
$fk_annonce_id="";
$obj_postulation=new Postulation_class();


if(!@$_SESSION["id_user"])
{
   $obj_postulation->session_valide();	
}

if(isset($_GET["annonce_id"]))
{
	$fk_annonce_id=@$_GET["annonce_id"];
	
}


 $fk_util_id=@$_SESSION['id_user'];
 $obj_candidat=new Candidat_class();
 $obj_postulation=new Postulation_class();
	   
 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
 $candidat_id=@$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
 $ob_qualite=new Qualites_class();
 $liste_qualite=@$ob_qualite->lister_qualites_By_CAND_ID($candidat_id);
 
 $qualite="";
 $id_qualite="";
 
 
 if(!empty($liste_qualite))
 {
	 $qualite=$liste_qualite[0][$ob_qualite->GetCh_QUAL_LIB()];
	 $id_qualite=$liste_qualite[0][$ob_qualite->GetCh_QUAL_ID()];
 }

?>
<!--script type="text/javascript" src="js/validation_formulaire.js"> </script>
<script type="text/javascript" src="js/traitement_formulaire.js"> </script-->
<?php

include(WEBROOT_DIR."menu_gauche.php");
?>

 <div class="span10"  style="float:left;">
 <div class="container">

<form  class="form-horizontal"  name="form" id="form">
               <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
               <span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
               <span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
            <fieldset  class="col-sm-9">
                <legend>11 - Qualit&eacute;s personnelles</legend>
                <br>
                <textarea name="QUAL_LIB" id="QUAL_LIB" rows="5" cols="50" maxlength="255" placeholder="Saisissez vos qualites personnelles" OnBlur="return validite('form','QUAL_LIB','AN',2,80);"><?php echo @$qualite; ?></textarea>
                
                <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />

            </fieldset>
</form>
</div>
</div>