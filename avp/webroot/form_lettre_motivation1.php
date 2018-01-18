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
	$fk_annonce_id=$_GET["annonce_id"];
	
}


 $fk_util_id=@$_SESSION['id_user'];
 $obj_candidat=new Candidat_class();
 $obj_lettre_motivation=new Lettre_motivation_class();
	   
 $lister_cand=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
 $candidat_id=@$lister_cand[0][$obj_candidat->GetCh_CANDIDAT_ID()];
 
  $liste_motivation=$obj_lettre_motivation->lister_motivation_cand_id_annonce($candidat_id,$fk_annonce_id);
 

 //---------------------------------------------------------------//
 
 
		$candidat_motiv_poste="";
		$candidat_id="";
		$joker="4";
		$btn_enreg="Enregistrer";
   
   if(!empty($liste_motivation))
   {
		
		 $lettre_motiv_id=$liste_motivation[0][$obj_lettre_motivation->GetCh_LETTRE_MOTIVATION_ID()];
		 $lettre_motiv_poste=$liste_motivation[0][$obj_lettre_motivation->GetCh_LETTRE_MOTIVATION()];
		 $joker="5";
   }

?>
<!--script type="text/javascript" src="js/validation_formulaire.js"> </script>
<script type="text/javascript" src="js/traitement_formulaire.js"> </script-->
<center>
<div class="span10"  style="float:left;">
<?php
include(WEBROOT_DIR."menu_postvalide.php");
?>



<div class="container">
<form class="form-horizontal"  action="controler/Lettre_motivation_controler.php" method="POST"  name="form" id="form">
                <fieldset  class="col-sm-9">
                  <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
               	  <span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
               	  <span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
                    <legend>9- Lettre de motivation : <font color=red>*</font></legend>
                    <div class="form-group">
                       <label class="col-sm-3">Saisissez vos motivations:</label>
                       <div class="col-sm-8">
                    <textarea name="LETTRE_MOTIVATION" rows="15" cols="70" placeholder=" Saisissez vottre lettre de  motivation pour le poste" id="LETTRE_MOTIVATION" class="form-control"><?php echo @$lettre_motiv_poste; ?></textarea>
                       </div>
                    </div>
                    
                    <div class="form-group">
                          <div class="col-sm-2"></div>
                          <div class="col-sm-2">
                           <button type="submit" class="btn btn-info" name="enregistrer_continue"  id="submit"><?php echo @$btn_enreg;?></button>
                          </div>
                          <div class="col-sm-2">
                           <?php if($btn_enreg=="Enregistrer"){echo '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit"  value="Enregistrer et Continuer">Enregistrer et Continuer</button>'; } ?>
                          </div>
                   </div>
                       <input type="hidden" name="joker" id="joker" value="<?php echo @$joker; ?>" />
                       <input type="hidden" name="id_user" id="id_user" value="<?php echo @$_SESSION["id_user"]; ?>" />
                       <input type="hidden" name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
                       <input type="hidden" name="CANDIDAT_ID" id="CANDIDAT_ID" value="<?php echo @$candidat_id; ?>" />
                       <input type="hidden" name="LETTRE_MOTIVATION_ID" id="LETTRE_MOTIVATION_ID" value="<?php echo @$lettre_motiv_id; ?>" />
                       <input type="hidden"  name="after_postul" id="after_postul" value="OUI" />
                </fieldset>
</form>
</div>
</div>
</center>