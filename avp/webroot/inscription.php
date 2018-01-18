<?php
$cryptinstall="crypt/cryptographp.fct.php";
include $cryptinstall;

if(!$_SESSION )
{
	 $_SESSION = array();
     session_destroy();
	 header("Location:/avp/index.php");
}

?>

<center>
<div class="span10" style="float:left;">
<div class="container">

<form  class="form-horizontal" action="controler/Utilisateurs_controler.php"  name="form"  id="form" method="POST" enctype="multipart/form-data"   >
 <fieldset class="col-sm-10">
          <div class="form-group">
          <div class="col-sm-1"></div>
               <div class="col-sm-11">
                   <legend >Inscription</legend>
               </div>
           </div>
      <div class="form-group">
       <div class="col-sm-1"></div>
        <label for="inputEmail"  class="col-sm-3">Login:<font color=red>*</font></label>
        <div class="col-sm-3">
        <input type="text" name="EMAIL"  id="EMAIL"  value="<?php if(isset($_POST['EMAIL'])){ echo $_POST['EMAIL'];} ?>"  class="form-control" placeholder="Adresse Mail"   onblur="return check_exist_mail();"/>
        
      </div>
      </div>
      
      <div class="form-group">
            <div class="col-sm-1"></div>
              <label for="inputEmail" class="col-sm-3">Mot de passe:<font color=red>*</font></label>
            <div class="col-sm-3">
            <input type="password" name="UTIL_MDP"  id="UTIL_MDP"  value="<?php if(isset($_POST['UTIL_MDP'])){ echo $_POST['UTIL_MDP'];} ?>"  class="form-control" id="UTIL_MDP" placeholder="Mot de passe"/>
      </div>
      </div>
       <div class="form-group">
             <div class="col-sm-1"></div>
            
              <label for="inputEmail" class="col-sm-3">Confirmer le mot de passe:<font color=red>*</font></label>
            
            <div class="col-sm-3">
            <input type="password" name="RE_UTIL_MDP" value="<?php if(isset($_POST['RE_UTIL_MDP'])){ echo $_POST['RE_UTIL_MDP'];} ?>"  class="form-control" id="RE_UTIL_MDP" placeholder="Confirmer mot de passe" onblur="return check_pw('form','UTIL_MDP','RE_UTIL_MDP');"/>
            <?php if(isset($error_password)){ echo $error_password;} ?>
      </div>
      </div>
      
       <div class="form-group">
           <div class="col-sm-1"></div>
           <label for="inputEmail" class="col-sm-3">Saisissez le code:<font color=red>*</font></label>
           <div class="col-sm-3">
           <input type="text" name="code" value="" id="code"  class="form-control"  onblur="return check_code_valide();" />
		   <input type="hidden" name="hcode" id="hcode" value="" /><br/>
           <?php echo dsp_crypt(0,1);?>
          </div>
       </div>
       
       <div class="form-group">
            <div class="col-sm-4"></div>
                  <div class="col-sm-2">
                   <button type="submit" class="btn btn-info" id="submit">S'Inscrire</button>
                  </div>
                  <div class="col-sm-2">
                   <button type="reset" class="btn btn-info ">Annuler</button>
                  </div>
           </div>
    
       <input type="hidden" name="joker" value="1"  />
     
     </fieldset>  
</form>
</div>
</div>
</center>
<!-- fin contenu à mettre  -->


		


        