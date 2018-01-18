<?php
   
   @session_start();
   require_once($_SESSION['AVP_CONFIG']);
   
   $token=addslashes($_GET['token']);
   $obj_util=new Utilisateurs_class();
   

?>

<div class="container"  class="col-sm-11">

<div class="col-sm-11" style="margin-left:-25px;">

 <!--h2 class="art-postheader"> <a href='#' >Accueil  </a> > <a href='#' >Ressources humaines </a ><a href='#' > inscription</a></h2-->
  <ol class="breadcrumb" >
      <li><a href="#">Accueil</a></li>
      <li><a href="#">Ressources humaines</a></li>
      <li class="active">Inscription</li>
   </ol>
                                                
     
<?php
if(!empty($_GET))
{
        
		if($obj_util->check_token($token)==false)
		{
			 $error_active='<font color="#FF000">Le compte est déjà activé! Vueillez vous connectez SVP </font>';
			 echo  $error_active;
		}
		else
		{
			
			if($obj_util->update_token($token)==true)
			{
			
			   $message_activation='<p style="text-align: center;vertical-align: middle;margin-top:3%">
<span style="font-family: Arial;color:#000077;font-weight: bold;">
Votre compte est bien activé! veuillez vous authentifier pour se connecter </span></p>';
			   echo $message_activation;
		    }

		}
}

?>

	
		<!--/span>
		</p>

	</div>
    </div>
</div>
</div>
                                
</article></div>
    </div>
</div-->

</div>
</div>