
<div class="container">
<form class="form-horizontal"  action="controler/Utilisateurs_controler.php" method="POST"  id="form">

  <div class="form-group">
 <div class="col-sm-3"></div>
 <div class="col-sm-3"></div>
 </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="UTIL_LOGIN" id="UTIL_LOGIN" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" name="UTIL_MDP" id="UTIL_MDP" placeholder="Password">

                <p style="padding:0;margin:0;padding-top:10px;"><a href="#" id="passoublie"> Vous avez oublié votre Mot de Passe ? </a></p>


    </div>
  </div>
  
         <div class="form-group">

            <div class="col-sm-2"></div>


                  <div class="col-sm-1">
                   <button type="submit" class="btn btn-info" id="submit">Connexion</button>
                  </div>
                  <div class="col-sm-1">
                   <button type="reset" class="btn btn-info ">Annuler</button>
                  </div>
           </div>
           <input type="hidden" name="joker" id="joker"  value="4" />
</form>
</div>