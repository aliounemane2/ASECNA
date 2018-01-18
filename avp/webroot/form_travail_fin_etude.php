<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);

$fk_annonce_id="";

$obj_candidat=new Candidat_class();
$obj_realisation=new Realisation_class();
$obj_postulation=new Postulation_class();


	if(!@$_SESSION["id_user"])
	{
	   $obj_postulation->session_valide();	
	}

if(isset($_GET["annonce_id"]))
{
	$fk_annonce_id=@$_GET["annonce_id"];
}



$fk_util_id=@$_SESSION["id_user"];
$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
$candidat_id=@$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];

$liste_realisation=$obj_realisation->lister_real_By_CAND_ID($candidat_id);

$btn="Enregistrer";
$joker="1";
$realisation_id="";
$realisation="";

if(!empty($liste_realisation))
{
   $realisation=$liste_realisation[0][$obj_realisation->GetCh_REAL_LIB()];
   $realisation_id=$liste_realisation[0][$obj_realisation->GetCh_REAL_ID()];
   $joker="2";	
}


?>

<center>
<div class="span10"  style="float:left;">
<?php
include(WEBROOT_DIR."menu_gauche.php");
?>
<div class="container">
<form  class="form-horizontal" action="controler/Realisation_controler.php" method="POST"  name="form" id="form">
                <fieldset  class="col-sm-9">
                    <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
               		<span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
               		<span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
                   <legend>3- Travail de fin d'&eacute;tude</legend>
                   
                    <span>Quel &eacute;tait le titre de votre travail de fin d'&eacute;tudes(Licence,Ma&icirc;trise,Master,DEA,th&egravese; de doctorat...) pour le plus haut dipl&ocirc;me obtenu? </span><br/><br/>
                    
                    <div class="form-group">
                      
                       <label class="col-sm-3">Travail de fin d'etude : </label>
                       <div class="col-sm-8">
                    <textarea name="REAL_LIB" id="REAL_LIB" rows="10"  maxlength="255" placeholder=" Saisissez le titre du travail" class="form-control" ><?php echo @$realisation; ?></textarea>
                       <input type="hidden" name="joker" id="joker" value="<?php echo $joker; ?>" />
                       <input type="hidden" name="id_user" id="id_user" value="<?php echo @$_SESSION["id_user"]; ?>" />
                       <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
                       <input type="hidden" name="REAL_ID" id="REAL_ID" value="<?php echo @$realisation_id; ?>" />
                      </div>
                   </div>
                    <div class="form-group">
                       <div class="col-sm-12"></div>
                       </div>
                   <div class="form-group">
                     <div class="col-sm-8">
                        <div class="modal-footer">
                            <a class="btn btn-info col-sm-4" id="next" href="index.php?page=form_autres_form&annonce_id=" >Passer cet etape</a>
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