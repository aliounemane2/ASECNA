<?php
   @session_start();
   require_once("../_Init_file.php");
   
        
    $obj_pays=new Pays_class();
	$Cnn=$obj_pays->ma_connexion();
	
	$liste_pays=$obj_pays->lister_pays();
	$chaine="";
	
	foreach($liste_pays as $row)
	{
		$chaine.= $row[$obj_pays->GetCh_code()]."|||".$row[$obj_pays->GetCh_nom_pays()]."###";
	}
	
	
	 echo $chaine;
	

?>