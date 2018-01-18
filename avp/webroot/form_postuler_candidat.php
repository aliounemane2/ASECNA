<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);

$fk_annonce_id="";

if(isset($_GET["annonce_id"]))
{
	$fk_annonce_id=$_GET["annonce_id"];
	
}
?>
<!--script type="text/javascript" src="js/validation_formulaire.js"> </script>
<script type="text/javascript" src="js/traitement_formulaire.js"> </script-->
<?php

include(WEBROOT_DIR."menu_gauche.php");
?>

<div class="span10"  style="float:left;">

<div class="container">
<form class="form-horizontal"  action="controler/Lettre_motivation_controler.php" method="POST"  name="form" id="form">
                <fieldset>
                    <legend1>Lettre de motivation</legend1>
                    <legend>12 - Lettre de motivation : <font color=red>*</font></legend>
                    
                    <div class="form-group">
                       <div class="col-sm-1"></div>
                       <div class="col-sm-5">
                    <textarea name="LETTRE_MOTIVATION" rows="20" cols="60" placeholder=" Saisissez vottre lettre de  motivation pour le poste" id="LETTRE_MOTIVATION" required OnBlur="return validite('form','LETTRE_MOTIVATION','AN',2,80);"></textarea>
                       </div>
                    </div>
                    
                    <div class="form-group">
                          <div class="col-sm-1"></div>
                          <div class="col-sm-1">
                           <button type="submit" class="btn btn-info ">Enregistre</button>
                          </div>
                          <div class="col-sm-2">
                           <button type="submit" class="btn btn-info ">Enregistrer et Continuer</button>
                          </div>
                   </div>
                   
                   
                       <input type="hidden" name="joker" id="joker" value="1" />
                       <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION["id_user"]; ?>" />
                       <input type="hidden" name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo $fk_annonce_id; ?>" />
                </fieldset>
</form>
</div>
</div>