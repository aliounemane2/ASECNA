
<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
$fk_annonce_id="";

 $obj_candidat=new Candidat_class();
 $obj_competence=new Competences_class();
 $obj_postulation=new Postulation_class();

if(!@$_SESSION["id_user"])
{
  $obj_postulation->session_valide();	
}

if(isset($_GET["annonce_id"]))
{
	$fk_annonce_id=$_GET["annonce_id"];
}

	 $fk_util_id=@$_SESSION['id_user'];
	 
		   
	 $lister_cand=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
	 $candidat_id=@$lister_cand[0][$obj_candidat->GetCh_CANDIDAT_ID()];
	 
	 
	
	// $liste_competence=@$obj_competence->lister_competences_cand_id_annonce($candidat_id,$fk_annonce_id);
	$liste_competence=@$obj_competence->lister_comp_By_CAN_ID($candidat_id);
	 
	 $competence_libelle="";
	 $comp_id="";
	 $btn="Enregistrer";
	 $joker="1";
	 
	 if(!empty($liste_competence))
	 {
	    $competence_libelle=$liste_competence[0][$obj_competence->GetCh_COMP_LIB()];
		$comp_id=$liste_competence[0][$obj_competence->GetCh_COMP_ID()];
	    $joker="2";
	 }
	 
?>

<!--script type="text/javascript" src="js/validation_formulaire.js"> </script>
<script type="text/javascript" src="js/traitement_formulaire.js"> </script-->
<center>
<div class="span10" style="float:left;">
<?php

include(WEBROOT_DIR."menu_gauche.php");
?>

<div class="container">
<form  class="form-horizontal" action="controler/Competences_controler.php" method="POST" name="form" id="form" >
        <fieldset class="col-sm-9">
              <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
              <span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
              <span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
            <legend>8-Competences</legend>
           
              <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="col-sm-3">Saisissez vos competences: </label>
                <div class="col-sm-7">
            <textarea name="COMP_LIB" id="COMP_LIB" rows="10" cols="80"  maxlength="255" placeholder="Saisissez vos competences" class="form-control"><?php echo @$competence_libelle; ?></textarea>
            <input type="hidden" name="joker" id="joker" value="<?php echo @$joker; ?>" />
            <input type="hidden" name="id_user" id="id_user" value="<?php echo @$_SESSION["id_user"]; ?>" />
            <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
            <input type="hidden"  name="COMP_ID" id="COMP_ID" value="<?php echo @$comp_id; ?>" />
                     
                   </div>
            </div>
            <div class="form-group">
                     <div class="col-sm-8">
                        <div class="modal-footer">
							<a class="btn btn-info col-sm-4" id="next" href="index.php?page=form_lettre_motivation&annonce_id=" >Passer cet etape</a>
                         <button type="submit" class="btn btn-info" id="submit" <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?> name="enregistrer_continue" value="<?php  echo $btn; ?>" ><?php  echo $btn; ?></button>
                       <?php  if(@$btn=="Enregistrer"){ echo '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" '?> <?php if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?> <?php echo ' value="Enregistrer et Continuer">Enregistrer et Continuer</button>';} ?>
                           
                        </div>
                      </div>
                    </div>
        </fieldset>
</form>
</div>
</div>
</center>
<script>
function compte_number_ligne_autorize(champ_nbre,autorize,libelle)
		  {
				var val_courante=parseInt($('#'+champ_nbre).val());
				
				if(!isNaN(val_courante) && !isNaN(autorize) )
				{
					if(val_courante<autorize)
					{
						return true;
					}
					else
					{
						return false;
						alert("Vous devez ajouter que "+autorize+"  "+libelle);
						
					}
				}
			}

</script>