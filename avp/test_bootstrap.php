<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>

        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link href="css/css_additional.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
        
        
        <script>
		
		  $('.btnNext').click(function()
		  {
               $('.nav-tabs > .active').next('li').find('a').trigger('click');
          });

		  $('.btnPrevious').click(function()
		  {
			   $('.nav-tabs > .active').prev('li').find('a').trigger('click');
		  });
		
		</script>
</head>

<body>

<form  class="form-horizontal" action="controler/Utilisateurs_controler.php" id="myform" name="annonce" method="POST" enctype="multipart/form-data" >

      <div class="form-group">
            <div class="col-xs-2">
               <label for="inputEmail">Login</label>
            </div>
        <div class="col-xs-4">
        <input type="text" name="UTIL_LOGIN" value="<?php if(isset($_POST['UTIL_LOGIN'])){ echo $_POST['UTIL_LOGIN'];} ?>"  class="form-control" id="UTIL_LOGIN" placeholder="Login"/><?php if(isset($error_login)){ echo $error_login;} ?>
        </div>
      </div>
      <div class="form-group">
       <div class="col-xs-2">
        <label for="inputEmail">Adresse email</label>
        </div>
        <div class="col-xs-10">
        <input type="text" name="EMAIL" value="<?php if(isset($_POST['EMAIL'])){ echo $_POST['EMAIL'];} ?>"  class="form-control" id="EMAIL" placeholder="Adresse Mail" />
        <?php if(isset($error_email)){ echo $error_email;} ?>
      </div>
      </div>
      
      <div class="form-group">
            <div class="col-xs-2">
              <label for="inputEmail">Mot de passe</label>
            </div>
            <div class="col-sm-10">
            <input type="password" name="UTIL_MDP" value="<?php if(isset($_POST['UTIL_MDP'])){ echo $_POST['UTIL_MDP'];} ?>"  class="form-control" id="UTIL_MDP" placeholder="Mot de passe"/>
      </div>
      </div>
       <div class="form-group">
             <div class="col-xs-2">
              <label for="inputEmail">Confirmer le mot de passe:</label>
            </div>
            <div class="col-xs-10">
            <input type="password" name="RE_UTIL_MDP" value="<?php if(isset($_POST['RE_UTIL_MDP'])){ echo $_POST['RE_UTIL_MDP'];} ?>"  class="form-control" id="RE_UTIL_MDP" placeholder="Confirmer mot de passe"/>
            <?php if(isset($error_password)){ echo $error_password;} ?>
      </div>
      </div>
      
       <div class="form-group">
           <div class="col-xs-2">
              <label for="inputEmail">Saisissez le code:</label>
           </div>
           <div class="col-xs-10">
           <input type="text" name="code" value=""><?php if(isset($error_code)){ echo $error_code;} ?>
           
        
          </div>
       </div>
       
       <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            <button type="submit" name="inscrire" value="M'inscrire"  class="btn btn-primary">M'inscrire</button>
        </div>
    </div>
    
     <input type="hidden" name="joker" value="1"  />
     
       
</form>

<ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Shipping</a>

    </li>
    <li><a href="#tab2" data-toggle="tab">Quantities</a>

    </li>
    <li><a href="#tab3" data-toggle="tab">Summary</a>

    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="tab1"> <a class="btn btn-primary btnNext">Next</a>

    </div>
    <div class="tab-pane" id="tab2"> <a class="btn btn-primary btnNext">Next</a>
         <a class="btn btn-primary btnPrevious">Previous</a>

    </div>
    <div class="tab-pane" id="tab3"> <a class="btn btn-primary btnPrevious">Previous</a>

    </div>
</div>
</body>
</html>