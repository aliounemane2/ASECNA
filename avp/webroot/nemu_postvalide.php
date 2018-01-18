
<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
$fk_annonce_id="";

if(isset($_GET["annonce_id"]))
{
	$fk_annonce_id=$_GET["annonce_id"];
}

	 $fk_util_id=@$_SESSION['id_user'];
	 $obj_candidat=new Candidat_class();
	 $obj_competence=new Competences_class();
		   
	 $lister_cand=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
	 $candidat_id=@$lister_cand[0][$obj_candidat->GetCh_CANDIDAT_ID()];
	 
	 
	 $liste_competence=@$obj_competence->lister_comp_By_CAN_ID($candidat_id);
	 
	 $competence_libelle="";
	 $comp_id="";
	 $btn="Enregistrer";
	 $joker="1";
	 
	 if(!empty($liste_competence))
	 {
	    $competence_libelle=$liste_competence[0][$obj_competence->GetCh_COMP_LIB()];
		$comp_id=$liste_competence[0][$obj_competence->GetCh_COMP_ID()];
	    $btn="Modifier";
	    $joker="2";
	 }
	 
?>
<script type="text/javascript" src="js/validation_formulaire.js"> </script>

<?php

include(WEBROOT_DIR."menu_postvalide.php");
?>
<div class="span10"  style="float:left;">
<div class="container">
<form  class="form-horizontal" action="controler/Competences_controler.php" method="POST" name="form">
        <fieldset>
            <legend1>Competences</legend1>
            <legend>10 - Competences</legend>
            <span>Saisissez vos competences</span> <br>
            
            <div class="form-group">
                <div class="col-sm-1"></div>
                   <div class="col-sm-5">
            <textarea name="COMP_LIB" id="COMP_LIB" rows="5" cols="50"  maxlength="255" placeholder="Saisissez vos competences" OnBlur="return validite('form','COMP_LIB','AN',2,200);"><?php echo @$competence_libelle; ?></textarea>
            <input type="hidden" name="joker" id="joker" value="<?php echo @$joker; ?>" />
            <input type="hidden" name="id_user" id="id_user" value="<?php echo @$_SESSION["id_user"]; ?>" />
            <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
            <input type="hidden"  name="COMP_ID" id="COMP_ID" value="<?php echo @$comp_id; ?>" />
                     
                   </div>
            </div>
            <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-2">
                     <button type="submit" class="btn btn-info "   name="enregistrer"><?php echo $btn; ?></button>
                  </div>
                  <div class="col-sm-2">
                     <?php if($btn=="Enregistrer"){ echo  '<button type="submit" class="btn btn-info" name="enregistrer_continue">Enregistrer et Continuer</button>';} ?>
                  </div>
            </div>
        </fieldset>
</form>
</div>
</div>