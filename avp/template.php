<?php
   @session_start();
  require_once($_SESSION['AVP_CONFIG']);
 
  /*if(isset($_SESSION['id_user']) && $_SESSION["id_user"]!="")
  {
	  $obj_postulation=new Postulation_class();
	  
	  $have_postulated =$obj_postulation->test_postulation($_SESSION['id_user']);
	  
	  if(time() - $_SESSION['lastaccess'] > 600) 
	  {
		  throw new Exception("Votre session a expiré", 13);
	  }
	  
  }
  */
?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil> Ressources Humaines > Politique de ressources humaines</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <!--[if lt IE 9]><!--<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> --><![endif]-->
    <!--[if lt IE 9]><script type="text/javascript" src="js/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">

    <title>Candidature</title>

        <script src="js/validation_formulaire.js"></script>
	    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery-1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
		<script type="text/javascript" src="js/jquery.sheepItPlugin.js"></script>
		<!-- <script type="text/javascript" src="js/jquery-1.4.4.min.js"></script> -->
		<!-- <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script> -->
		<!-- <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script> -->
		<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
		<script type="text/javascript" src="js/jquery.livequery.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>


        <!--link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.all.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.core.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.datepicker.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.progressbar.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.slider.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.tabs.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.theme.css">
        <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" -->
        
    
	    <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
		<script type="text/javascript" src="js/jquery.sheepItPlugin.js"></script>
		<script src="js/SpryValidationSelect.js" type="text/javascript"></script>
		<script src="js/SpryValidationTextField.js" type="text/javascript"></script>
		
		<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
		<script type="text/javascript" src="js/jquery.livequery.js"></script>
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> -->
        
        <script type="text/javascript" src="js/jquery.dataTables.js"></script>
        
        <script type="text/javascript">

$(document).ready(function() 
{
    $('#dataTable').dataTable();
} );

</script>

<script type='text/javascript' src='js/jquery.simplemodal.js'></script>

<script type='text/javascript'>

$(document).ready(function() 
{
	$('#basic-modal .basic').click(function (e) 
	{
		$('#basic-modal-content').modal();
		return false;
		
	});
	
});
</script>
        <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
		<script type="text/javascript" src="js/jquery.sheepItPlugin.js"></script>
		<script src="js/SpryValidationSelect.js" type="text/javascript"></script>
		<script src="js/SpryValidationTextField.js" type="text/javascript"></script>
	
		<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
		<script type="text/javascript" src="js/jquery.livequery.js"></script>
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> -->
        <script type="text/javascript" src="js/jquery.dataTables.js"></script>

<script type="text/javascript">

$(document).ready(function() 
{
		$('#dataTable').dataTable();
		
		var tab=[];
		
		$("#lien_export").click( function()
		{
			$("input[type=checkbox]:checked").each(
				function()
				{
				  tab.push($(this).val());
				}
			);
	
			var originalHref =$("#lien_export").attr("href");
			$("#lien_export").attr('href',originalHref+'&tab='+tab);
	
		});
		
		
} );

</script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript'>

$(document).ready(function() 
{
      $('#basic-modal .basic').click(function (e) 
      {
		  $('#basic-modal-content').modal();
		  return false;
		  
	  });
	  
} );

</script>

		<!--link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.all.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.core.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.datepicker.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.progressbar.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.slider.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.tabs.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.theme.css">

		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" >


		<link href="css/SpryValidationSelect.css" rel="stylesheet" type="text/css">
		<link href="css/SpryValidationTextField.css" rel="stylesheet" type="text/css">

		<link type='text/css' href='css/demo.css' rel='stylesheet' media='screen' /-->

        <!-- Contact Form CSS files -->
        <!--link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' /-->

<!-- IE6 "fix" for the close png image -->
<!--[if lt IE 7]>
<link type='text/css' href='css/basic_ie.css' rel='stylesheet' media='screen' />
<![endif]-->

        <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
		<script type="text/javascript" src="js/jquery.sheepItPlugin.js"></script>
		<script src="js/SpryValidationSelect.js" type="text/javascript"></script>
		<script src="js/SpryValidationTextField.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.dataTables.js"></script>
	
		<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
		<script type="text/javascript" src="js/jquery.livequery.js"></script>
        <script type="text/javascript" src="js/jquery.bpopup.min.js"></script>
        <script type="text/javascript" src="js/jquery.DOMWindow.js"></script>

<script type="text/javascript">
jQuery('.datatable').dataTable({"sPaginationType": "full_numbers",
								/*"bJQueryUI": true,"oLanguage":
								{
									"sProcessing":     "Traitement en cours...",
    "sSearch":         "Rechercher&nbsp;:",
    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
    "sInfo":           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    "sInfoEmpty":      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
    "sInfoPostFix":    "",
    "sLoadingRecords": "Chargement en cours...",
    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
    "sEmptyTable":     "Aucune donnée disponible dans le tableau",
    "oPaginate": {
        "sFirst":      "Premier",
        "sPrevious":   "Pr&eacute;c&eacute;dent",
        "sNext":       "Suivant",
        "sLast":       "Dernier"
    },
    "oAria": {
        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
        "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
    }
								}*/

	});
	
      </script>
      
		<!--link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.all.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.core.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.datepicker.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.progressbar.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.slider.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.tabs.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.theme.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css"-->
		
	</head>

<!--body leftmargin="0" topmargin="10" marginheight="0" marginwidth="0"-->
<!-- script menu deroulant-->
<script type="text/javascript">
    $(document).ready(function()
    {
        /*$('.openCandidat').openDOMWindow({
         height:100,
         width:500,
         positionType:'absolute',
         positionTop:100,
         eventType:'click',
         positionLeft:100,
         windowSourceID:'.art-content-layout',
         windowPadding:20,
         draggable:1,
         windowBGColor:'#FFFF00',
         borderColor:'#990000',
         overlayOpacity:0
         });*/
        // $('.openCandidat').bPopup();


        /* $(".openCandidat").bPopup({
         content:'iframe',
         contentContainer:'.content',
         loadUrl:'pdf/listeCandidat.php'
         });*/
        $(".openCandidat").click(function()
		{

            //.post("listCandidat.php", {variable: "test"}, function(data){
            $('.art-layout-cell').bPopup();
            alert("Ok");
        });
        //alert (requete.responseText);

        //slides the element with class "menu_body" when paragraph with class "menu_head" is clicked
        $("#firstpane p.menu_head").click(function()
        {
            $(this).css({backgroundImage:"url(down.png)"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
            $(this).siblings().css({backgroundImage:"url(left.png)"});
        });
        //slides the element with class "menu_body" when mouse is over the paragraph
        $("#secondpane p.menu_head").mouseover(function()
        {
            $(this).css({backgroundImage:"url(down.png)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
            $(this).siblings().css({backgroundImage:"url(left.png)"});
        });
    });
	
	
	BootstrapDialog.show({message: 'Hi Apple!'});
	

</script>

		
       
</head>

<!--body leftmargin="0" topmargin="10" marginheight="0" marginwidth="0"-->
<!-- script menu deroulant-->

<style type="text/css">
    .menu_list {
        width: 257px;
    }

    .menu_head {
        padding: 5px 10px;
        cursor: pointer;
        position: relative;
        margin:1px;

        background: #eef4d3 url(left.png) center right no-repeat;
    }
    .menu_body {
        display:none;
    }
    .menu_body a{
        display:block;
        /*color:#006699;*/
        color:#3688C7;
        background-color:#EFEFEF;
        padding-left:10px;

        text-decoration:none;
    }
    .menu_body a:hover{
        color: #000000;
        text-decoration:underline;
    }
</style>

<style>
    .art-content .art-postcontent-0 .layout-item-0 { padding: 3px;  }
    .ie7 .post .layout-cell {border:none !important; padding:0 !important; }
    .ie6 .post .layout-cell {border:none !important; padding:0 !important; }

</style>

</head>
<body>
<div id="art-main">
    <header class="art-header clearfix">

        <div class="art-shapes"> </div>
 </header>
    <nav class="art-nav clearfix">
        <!--<ul class="art-hmenu">
            <li><a class="space" href="home.html">Accueil</a></li>
            <li><a class="space" href="home.html">Nos prestations </a></li>
            <li><a class="space" href="home.html">Ecole</a></li>
            <li><a class="space" href="home.html">Redevances de route</a></li>
            <li><a class="space" href="home.html">Espace professionnel</a></li>
            <li><a class="space" href="index.php?url=ressources" class="active">Ressources humaines</a></li>
            <li><a class="space" href="home.html">Actualité</a></li>

        </ul>-->
    </nav>
    <div class="art-sheet clearfix">
        <div class="art-layout-wrapper clearfix">
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-sidebar1 clearfix">
                        <div class="art-block clearfix">
                            <div class="art-blockheader">
                                <h3 class="t">Ressources Humaines</h3>
                            </div>

                            <div style="float:left" > <!--This is the first division of left-->

                                <div id="firstpane" class="menu_list"> <!--Code for menu starts here-->

                                    <p class="menu_head">Stage</p>
                                    <div class="menu_body">
                                        <a href="#">Demande de stage</a>
                                    </div>
                                    <p class="menu_head">Recrutement</p>
                                    <div class="menu_body">
                                            <a href="index.php?url=pvacants">Postes vacants</a>
                                        <?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])) && $_SESSION['role'] == 1) : ?>
                                            <a  href="index.php?url=annonce">Annonce</a>
                                            <a  href="index.php?url=postulants">Listes des candidats</a>
                                            <a  href="index.php?url=afficheavp">Listes des AVP</a>
                                        <?php endif ?>
                                    </div>
                                    <p class="menu_head">Concours</p>
                                    <div class="menu_body">
                                        <?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])) && $_SESSION['role'] == 2) : ?>
                                            <a  href="index.php?url=avis">avis</a>
                                        <?php endif ?>
                                        <a href="#">Eamac</a>
                                        <a href="#">Ernam</a>
                                        <a href="#">Ersi</a>
                                    </div>
                                    <?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])) && $_SESSION['role'] == 0 && $have_postulated): ?>
                                        <p class="menu_head">Profil</p>
                                        <div class="menu_body">
                                            <a href="index.php?url=form1">Coordonnées personnelles</a>
                                            <a href="index.php?url=afficheformations">Formations</a>
                                            <a href="index.php?url=afficheexperiencespro">Experiences professionnelles</a>
                                            <a href="index.php?url=formMotivation">Motivation</a>
                                            <a href="index.php?url=affichedossiers">Dossier</a>
                                            <a href="index.php?url=afficheAutresformations">Autres formations</a>
                                            <a href="index.php?url=afficheReferences">Références</a>
                                            <a href="index.php?url=suivicand">Suivi Candidature</a>
                                        </div>
                                    <?php endif; ?>
                                </div>  <!--Code for menu ends here-->
                            </div>


                        </div>

                        <?php
                        if(isset($_GET["url"]) &&  $_GET["url"]=="pvacants")
                        {
                        ?>
                        <!--- recherche -->
                        <div class="art-block clearfix">
                            <div class="art-blockheader">
                                <h3 class="t">Recherche</h3>
                            </div>
                            <div class="art-blockcontent">
                                <form action="#" method="post" name="login" id="form-login">

                                    <fieldset class="input" style="border: 0 none;">
                                        <p id="form-login-username">

                                            <label for="modlgn_username">Secteur</label>
                                            <br />
                                            <SELECT name="SECTEUR">
                                                <?php
                                                $sql='SELECT domaine FROM secteur';
                                                $list = mysql_query($sql);
                                                ?>

                                                <option value="" >Selectionnez un secteur</option>
                                                <?php
                                                while ($data = mysql_fetch_array($list))
                                                {
                                                    ?>
                                                    <option value="<?php echo $data['domaine']; ?>" ><?php echo $data['domaine']; ?></option>

                                                <?php
                                                }
                                                ?>
                                            </SELECT>
                                        </p>
                                        <input type="hidden" name="joker" value="enable">
                                        </br>
                                        <input type="submit" value="Rechercher" name="rechercher" class="art-button button-color" />
                                    </fieldset>

                                </form>
                            </div>
                        </div>

                        <?php
                        }
                        ?>
                        <!-- test connexion-->

                        <?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login']))) : ?>
                            <div class="art-block clearfix">
                                <div class="art-blockcontent">
                                    <ul>
                                        <li>	<a href="index.php?url=deconnexion" title="Déconnexion">Se déconnecter</a>
                                        <li>	<a href="index.php?url=changer" title="changer">Changer votre mot de passe</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php elseif ($_GET['url']=="inscription") : ?>
                            <div class="art-block clearfix">
                                <div class="art-blockcontent">

                                </div>
                            </div>

                        <?php else : ?>

                            <div class="art-block clearfix">
                                <div class="art-blockheader">
                                    <h3 class="t">Connexion</h3>
                                </div>
                                <div class="art-blockcontent">
                                    <form action="controler/Utilisateurs_controler.php" method="post" name="login" id="form-login">
                                        <?php if(isset($error_connexion)){ echo $error_connexion;} ?>
                                        <fieldset class="input" style="border: 0 none;">
                                            <p id="form-login-username">
                                                <P><b><h3>Vous êtes déjà inscrit?</b></P>
                                                <label for="modlgn_username">Login</label>
                                                <br />
                                                <input id="modlgn_username" type="text" name="UTIL_LOGIN" class="inputbox" alt="username" size="18" />
                                            </p>
                                            <p id="form-login-password">
                                                <label for="modlgn_passwd">Mot de passe</label>
                                                <br />
                                                <input id="modlgn_passwd" type="password" name="UTIL_MDP" class="inputbox" size="18" alt="password" />
                                            </p>
                                            <input type="hidden" name="joker" id="joker"  value="4" />
                                            <!--<p id="form-login-remember">
                                                <label class="art-checkbox">
                                                    <input type="checkbox" id="modlgn_remember" name="remember" value="yes" alt="Remember Me" />Se souvenir de moi
                                                </label>
                                            </p>-->
                                            <br/>
                                            <input type="submit" value="Me connecter" name="envoyer" class="art-button button-color" />
                                        </fieldset>
                                        <ul>
                                            <li>
                                                <a href="index.php?url=oublier">Mot de passe oublié ?</a>
                                            </li>
                                            <li>
                                                <P><b><h3>Vous n'êtes pas encore inscrit?</b></P>
                                                <a href="index.php?url=inscription">Créer votre compte</a>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>

                        <?php endif ?>

                        <!-- fin text connexion-->
                        <?php if(isset($_SESSION["login"] )) echo '<p style="margin-left:30px; " id="connected_as">Bienvenue <span>'.$_SESSION["login"].'</span></p>'; ?>


                <!-- debut -->    
                    
                   

                    </div>
                    <div class="art-layout-cell art-content clearfix">

                        <!-- contenu pages -->
          
                        <?php
                        echo @$content;
                        ?>

                        <!-- fin contenu pages -->

                    </div>
                </div>
            </div>
        </div>

        <footer class="art-footer clearfix">
            <p><span style="font-size: 12px;">Copyright © 2013. All Rights Reserved.</span><br></p>
        </footer>

    </div>
</div>


</body>
</html>







