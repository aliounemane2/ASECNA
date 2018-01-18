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
   $pg=@$_GET["page"];
   
   
   $actv1='active'; //index
   $actv2='';       // inscription
   $actv3='';       //recrutement
   $actv4='';      // connexion
   
   $act_page=$obj_postulation->getActiveMenu($pg);
   
   switch($act_page)
   {
	  case "index":
	  {
		$actv1="active"; //index
	    $actv2='';       // inscription
	    $actv3=''; 
		$actv4=''; 
		break;     //recrutement  
	  }
	  case "recrutement":
	  {
		$actv1=''; //index
	    $actv2='';       // inscription
	    $actv3="active";
		$actv4='';
		break;      //recrutement  
	  }
	  
	  case "inscription":
	  {
		$actv1=''; //index
	    $actv2="active";       // inscription
	    $actv3=''; 
		$actv4='';      //recrutement 
		break; 
	  }
	  
	  case "connexion":
	  {
		$actv1=''; //index
	    $actv2='';       // inscription
	    $actv3='';
		$actv4="active";
		break;      //recrutement  
	  }
	   
   }
   
   

?>

<!DOCTYPE html>
<html lang="fr" >
<meta name="viewport" content="width=device-width"  charset="UTF-8"/>
<?php
if($pg!="synthese")
{
?>
<head>
            <title></title>
            <link rel="stylesheet" href="css/main_style.css">
            <link rel="stylesheet" href="css/bootstrap3.3.1.css">
            <link rel="stylesheet" href="css/bootstrap-theme.min.css">
            <link rel="stylesheet" href="css/jquery.dataTables.css">
            <link rel="stylesheet" href="css/date_picker_bootstrap.css">
            <link rel="stylesheet" href="css/css_additional.css">
            <!--link rel="stylesheet" href="css/bootstrap-responsive.css"-->
   
            <script src="js/jquery.min.1.11.1.js"></script>
            <script src="js/bootstrap.min.3.3.1.js"></script>
            <script src="js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
          
            <script type="text/javascript" src="js/date_picker_bootstrap.js"> </script>
            <script type="text/javascript" src="js/jquery.validate.min.js"> </script>
            <script type="text/javascript" src="js/additional-methods.js"> </script>
            <?php 
			
			if($pg!="liste_des_postulants")
			{
			?>
            <script type="text/javascript" src="js/validation_formulaire.js"> </script>
            
            <?php
			}
			?>
            <script type="text/javascript" src="js/traitement_formulaire.js"> </script>
          
        <!--script src="js/jquery.min.1.9.1.js"></script> 
        <script type="text/javascript" src="js/jquery.livequery.js"></script>   
        <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
        <script type="text/javascript" src="js/jquery.livequery.js"></script>
        <script type="text/javascript">
            jQuery(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                yearRange: "1960:2015",
                showOn: 'button',
                buttonImageOnly: true,
                buttonImage: '/avp/images/calendar_icon.png'
            });


       </script-->     
            
            
  <script>
   /* $(document).onscroll( function( e)
	{
		 $(body).css('z-index',-99999999);
	});*/
	
  </script>
</head>
<body>
    <center>
        <div style="margin-left:-1px;margin-bottom:0px; height:148px; z-index:-9999999">
            <img src="images/header.jpg" alt="logo"> 
        </div>
    </center>
<center>
<div style="margin-left:292px;float:left;width:1030px;z-index:-99999">
<nav class="navbar navbar-custom col-sm-12" >
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <?php 
	 if(!empty($_SESSION["role"]) && @$_SESSION["role"]=="1")
	 {	 
    ?>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li class="dropdown <?php if($actv1=='active') echo 'active';?> "><a href="?page=accueil">Accueil</a></li>
              <li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Stage <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Demande de Stage</a></li>
                    <!--<li class="divider"></li>-->
              </ul>
            </li>
            <li class="dropdown <?php if($actv3=="active")echo 'active';?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Recrutements<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                 <li><a href="?page=liste_d_avps">Postes Vacants</a></li>
                 <li class="divider"></li>
                 <li><a href="?page=annonces">Annonce</a></li>
                 <li class="divider"></li>
                 <li><a href="?page=ajout_ponderation">Ponderation</a></li>
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
          </ul>
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input type="text" id="input_btn" class="form-control" placeholder="Recherche">
            </div>
            <button type="submit" class="btn btn-default" id="search_btn">Recherche</button>
          </form>
          <ul class="nav navbar-nav navbar-right" >
     
                   <?php if(!$_SESSION["login"])
                   {
                   ?>
                        <li class="<?php if($actv2=="active")echo 'active';?>"><a href="?page=inscription">S'inscrire</a></li>
                        <li class="<?php if($actv4=="active")echo 'active';?>"><a href="?page=login">Connexion</a></li>
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
                             echo $obj_postulation->afficher_profile(@$_SESSION["login"]); 
                         ?>
                         <span class="caret"></span>
                         <?php
                          }
                         /* else
                          {*/
                         ?>
                         
                   </a>
                       <?php
                         if(@$_SESSION["role"]=="1")
                         {
                        ?>
                             <ul class="dropdown-menu" role="menu"  id="profile_btn">
                               <li style="margin-left:-7px;"><a href="index.php?page=changer_pass" style="width:155px;margin-left:4px;">Changer mot de passe</a></li>
                               <li class="divider"></li>
                             </ul>
						<?php
                         } 
                        ?>
                 
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
          <li class="dropdown <?php if($actv1=='active')echo 'active';?>"><a href="?page=accueil">Accueil</a></li>
          <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Stage <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                <li><a href="#">Demande de Stage</a></li>
                <!--<li class="divider"></li>-->
          </ul>
        </li>
        <li class="dropdown <?php if($actv3=='active')echo 'active';?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Recrutements<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="?page=liste_des_avps">Poste Vacants</a></li>
             <!--<li class="divider"></li>-->
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
              <input type="text" id="input_btn" class="form-control" placeholder="Recherche">
            </div>
            <button type="submit" class="btn btn-default" id="search_btn">Recherche</button>
      </form>
     
      <ul class="nav navbar-nav navbar-right">
      
		   <?php if(!@isset($_SESSION["login"]))
           {
           ?>
                <li class="<?php if($actv2=='active')echo 'active';?>"><a href="?page=inscription">S'inscrire</a></li>
                <li class="<?php if($actv4=="active")echo 'active';?>"><a href="?page=login">Connexion</a></li>
            <?php
           }
            ?>
        
		   <?php if(@$_SESSION["login"]!="" && @$joker=="true" )
           {
           ?>
             <!--<li><a href="?page=deconnexion">Deconnexion</a></li>-->
           <?php
           }
           ?>  
           <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          
				 <?php if(isset($_SESSION["login"])!="")
                 { 
                     echo $obj_postulation->afficher_profile(@$_SESSION["login"]); 
                 ?>
                 <span class="caret"></span>
				 <?php
                  }
				  else
				  {
                 ?>
                 <span class="separator_vide">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 </span>
                 <?php
				  }
				 ?>
          </a>
          <ul class="dropdown-menu" role="menu" id="profile_btn_touche">
             
                        <li id="chpagss_li"><a href="index.php?page=changer_pass">Changer mot de passe</a></li>
					    <?php
                         if(@$_SESSION["role"]=="0" && @$obj_postulation->check_nbrepostule($id_user)==true)
                         {
                        ?>
                         
                            <li class="divider"></li>
                            <li><a href="index.php?page=form_coord_personnelles">Modifier Profile</a></li>
                            
                        <?php
                          }
                         ?>
                        <li><a href="?page=deconnexion">Deconnexion</a></li>
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
 </center>
 <div style="margin-top:1px;width:10px;">&nbsp;</div>
  
<?php
}
?>
   <center>
   <div class="container-fluid">
      <div style="float:left;margin-top:-50px;width:272px;height:500px;margin-right:2px;"></div>
          
           <div class="row-fluid" id="template_div">
           <center> 
              <?php
              
              if($pg!="" && file_exists(WEBROOT_DIR.$pg.".php")==true)
              {
                   include(WEBROOT_DIR.$pg.".php");
              }
			
              else
              {  
                  include(WEBROOT_DIR."accueil.php");
              }
			  
              
              ?>
           </center>     
          </div>
</div>
</center>
</body>
</html>