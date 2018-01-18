
<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
$fk_annonce_id="";

     $obj_candidat=new Candidat_class();
	 $obj_competence=new Competences_class();

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
	 
	 
	 $liste_competence=@$obj_competence->lister_competences_cand_id_annonce($candidat_id,$fk_annonce_id);
	 
	 $competence_libelle="";
	 $comp_id="";
	 $btn="Enregistrer";
	 $joker="4";
	 
	 if(!empty($liste_competence))
	 {
	    $competence_libelle=$liste_competence[0][$obj_competence->GetCh_COMP_LIB()];
		$comp_id=$liste_competence[0][$obj_competence->GetCh_COMP_ID()];
	    $joker="5";
	 }
	 
?>
<!--script type="text/javascript" src="js/validation_formulaire.js"> </script>
<script type="text/javascript" src="js/traitement_formulaire.js"> </script-->

<center>
<div class="span10" style="float:left;">
<?php
include(WEBROOT_DIR."menu_postvalide.php");
?>

<div class="container">
<form  class="form-horizontal" action="controler/Competences_controler.php" method="POST" name="form" id="form" >
        <fieldset class="col-sm-9">
            <legend>8-Competences</legend>
           
              <div class="form-group">
               
                <label class="col-sm-3">Saisissez vos competences:</label>
                <div class="col-sm-7">
            <textarea name="COMP_LIB" id="COMP_LIB" rows="5" cols="50"  maxlength="255" placeholder="Saisissez vos competences" class="form-control"><?php echo @$competence_libelle; ?></textarea>
            <input type="hidden" name="joker" id="joker" value="<?php echo @$joker; ?>" />
            <input type="hidden" name="id_user" id="id_user" value="<?php echo @$_SESSION["id_user"]; ?>" />
            <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
            <input type="hidden"  name="COMP_ID" id="COMP_ID" value="<?php echo @$comp_id; ?>" />
            <input type="hidden"  name="after_postul" id="after_postul" value="OUI" />
                     
                   </div>
            </div>
            <div class="form-group">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-2">
                     <button type="submit" class="btn btn-info"  name="enregistrer_continue"  id="submit"><?php echo $btn; ?></button>
                  </div>
                  <div class="col-sm-2">
                     <?php if($btn=="Enregistrer"){ echo  '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit"  value="Enregistrer et Continuer">Enregistrer et Continuer</button>';} ?>
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