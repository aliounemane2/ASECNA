<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);

if($_SESSION['reussie']=='ok')
{
   
?>

    <article class="art-post art-article">
        <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Inscription</a></h3>

        <div class="art-postcontent art-postcontent-0 clearfix">
             <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-0" style="width: 100%" >
                        <p style="text-align: justify;">
		<span style="font-family: Arial;">

<!-- contenu à mettre  -->
<p style="text-align: center;vertical-align: middle;margin-top:3%">
<span style="font-family: Arial;color:#000077;font-weight: bold;">

	                    Un email vous a été envoyé dans votre compte.
                        
		</span></p>

<!-- fin contenu à mettre  -->


		</span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </article>
    

<?php
}
else
{
    header('Location:index.php');
}
?>

