<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);

 $obj_postulation=new Postulation_class();

	if(!@$_SESSION["id_user"])
	{
	    $obj_postulation->session_valide();	
	}

?>

<script type="text/javascript" src="js/validation_formulaire.js"> </script> 
<div class="container">
<form class="form-horizontal"  action="controler/Utilisateurs_controler.php" method="POST" id="form" name="form">
<fieldset>
 
          <div class="form-group">
          <div class="col-sm-1"></div>
               <div class="col-sm-11">
                   <legend>Changer mot de passe</legend>
               </div>
           </div>

 
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Ancien mot de pass:</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" name="OLD_PASS" id="OLD_PASS" placeholder="ancien mot de  pass">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Nouveau mot de pass:</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" name="NEW_PASS" id="NEW_PASS" placeholder="nouveau mot de Password">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Confirm mot de pass:</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" name="CONFIRM_PASS" id="CONFIRM_PASS" placeholder="confirm mot de Password">
    </div>
  </div>
  
  </div>
         <div class="form-group">
            <div class="col-sm-3"></div>
                  <div class="col-sm-1">
                   <button type="submit" class="btn btn-info " id="submit">Changer</button>
                  </div>
                  <div class="col-sm-1">
                   <button type="reset" class="btn btn-info">Annuler</button>
                  </div>
           </div>
           <input type="hidden" name="joker" id="joker"  value="5" />
           <input type="hidden" name="id_user" id="id_user" value="<?php echo @$_SESSION["id_user"]; ?>" />
            <input type="hidden" name="login_user" id="login_user" value="<?php echo @$_SESSION["login"]; ?>" />
           </fieldset>
</form>
</div>