<?php
  @session_start();
  require_once("_Init_file.php");
  
  $obj_postulation=new Postulation_class();
  
  $joker="false"; 
  
  if(isset($_SESSION["login"]) && $_SESSION["login"]!="" )
  {
	  $joker="true";  
  }
  $id_user=@$_SESSION["id_user"];

?>

<!DOCTYPE html>
<html lang="fr" >
<meta name="viewport" content="width=device-width"  charset="UTF-8"/>
<head>
<title></title>
<link rel="stylesheet" href="css/main_style.css">
<link rel="stylesheet" href="css/bootstrap3.3.1.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/jquery.dataTables.css">

<link rel="stylesheet" href="css/date_picker_bootstrap.css">


 <!--link rel="stylesheet" href="css/bootstrap-responsive.css"-->
<script src="js/jquery.min.1.11.1.js"></script>
<script src="js/bootstrap.min.3.3.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
<script type="text/javascript" src="js/date_picker_bootstrap.js"> </script>
<script type="text/javascript" src="js/jquery.validate.min.js"> </script>
<script type="text/javascript" src="js/additional-methods.js"> </script>


<script type="text/javascript" src="js/validation_formulaire.js"> </script>
<script type="text/javascript" src="js/traitement_formulaire.js"> </script>

<style type="text/css">
    .bs-example
	{
    	margin: 20px;
    }
	/* Fix alignment issue of label on extra small devices in Bootstrap 3.2 */
    .form-horizontal .control-label{
        padding-top: 7px;
    }
	
	body 
	{
	  background: #fcfcfc url('images/page.png') top center no-repeat fixed;
	}
	
	
	.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
	.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
	.autocomplete-selected { background: #F0F0F0; }
	.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
</style>

</head>
<body>
    <center>
        <div style="align:center;margin-left:0px;margin-bottom:0px; height:148px;">
            <img src="images/header.jpg" alt="logo"> 
        </div>
    </center>
    
<div style="margin-left:240px;float:left;">
<nav class="navbar navbar-default col-lg-12">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <a class="navbar-brand" href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <?php 
	 if(!empty($_SESSION["role"]) && $_SESSION["role"]=="1")
	 {
    ?>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class="dropdown active"><a href="#">Accueil</a></li>
          <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Stage <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                <li><a href="#">Demande de Stage</a></li>
                <li class="divider"></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Recrutements<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="?page=liste_d_avps">Postes Vacants</a></li>
             <li class="divider"></li>
            <li><a href="?page=annonces">Annonce</a></li>
             <li class="divider"></li>
            
             <li class="divider"></li>
            <li><a href="?page=liste_des_avps">Liste des AVP</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Concours <span class="caret"></span></a>
             <ul class="dropdown-menu" role="menu">
                <li><a href="#">Eamac</a></li>
                 <li class="divider"></li>
                <li><a href="#">Emam</a></li>
                 <li class="divider"></li>
                <li><a href="#">Ersi</a></li>
             </ul>
        </li>
        <li></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
 
       <?php if(!$_SESSION["login"])
	   {
	   ?>
            <li><a href="?page=inscription">S'inscrire</a></li>
            <li><a href="?page=login">Connexion</a></li>
        <?php
	   }
		?>
        
       <?php if(@$_SESSION["login"]!="" && @$joker=="true" )
	   {
	   ?>
         <li><a href="?page=deconnexion">Deconnexion</a></li>
       <?php
	   }
	   ?>  
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          
		  <?php if($_SESSION["login"]!="")
		  { 
		     echo @$_SESSION["login"]; 
		  } 
		 ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
               <li><a href="index.php?page=changer_pass">Changer mote de passe</a></li>
               <li class="divider"></li>
            </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
    
    <?php 
	 }
	 else
	 {
	?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class="dropdown active"><a href="#">Accueil</a></li>
          <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Stage <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                <li><a href="#">Demande de Stage</a></li>
                <li class="divider"></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Recrutements<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="?page=liste_des_avps">Poste Vacants</a></li>
             <li class="divider"></li>
          </ul>
        </li>
        
        <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Concours <span class="caret"></span></a>
             <ul class="dropdown-menu" role="menu">
                <li><a href="#">Eamac</a></li>
                 <li class="divider"></li>
                <li><a href="#">Emam</a></li>
                 <li class="divider"></li>
                <li><a href="#">Ersi</a></li>
             </ul>
        </li>
        <li></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php if(!isset($_SESSION["login"]))
	   {
	   
	   ?>
            <li><a href="?page=inscription">S'inscrire</a></li>
            <li><a href="?page=login">Connexion</a></li>
        <?php
		
	   }
		?>
        
       <?php if(@$_SESSION["login"]!="" && @$joker=="true" )
	   {
	   ?>
         <li><a href="?page=deconnexion">Deconnexion</a></li>
       <?php
	   }
	   ?>  
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          
			 <?php if(isset($_SESSION["login"])!="")
             { 
                 echo @$_SESSION["login"]; 
             ?>
              <span class="caret"></span>
          <?php
			 }
		  ?>
          </a>
          <ul class="dropdown-menu" role="menu">
               <li><a href="index.php?page=changer_pass">Changer mote de passe</a></li>
               <li class="divider"></li>
              <?php
			     if(@$_SESSION["role"]=="0" && @$obj_postulation->check_nbrepostule($id_user)==true)
				 {
			   ?>
               <li><a href="index.php?page=postvalide">Modifier Profile</a></li>
               <?php
				}
			   ?>
            </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
    
    <?php
	 }
	?>
  </div><!-- /.container-fluid -->
</nav>
 </div> 
    <div style="margin-top:1px;"></div>
   <center>
   <div class="container-fluid">
          <div style="float:left;border:1px solid  #000;width:280px;height:500px;margin-right:10px; "></div>
           <div class="row-fluid"  style="float:left;height:auto;text-align:left;" class="col-sm-10" >
             
              <?php
              $pg=@$_GET["page"];
              
              if($pg!="")
              {
                   include(WEBROOT_DIR.$pg.".php");
              }
              else
              {
                  include(WEBROOT_DIR."accueil.php");
              }
              
              ?>
                
          </div>
</div>
</center>
</body>
</html>