<?php
   @session_start();
   require_once("../_Init_file.php");
   
   
    if(isset($_GET['query'])) 
	{
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['query']);
 
        // Connexion à la base de données
       
	   $obj_pays=new Pays_class();
	   $donnees= $obj_pays->getPaysBy_nom_pays();
    
        // On parcourt les résultats de la requête SQL
        foreach($donnees as $row)
	    {
            // On ajoute les données dans un tableau
            $suggestions['suggestions'][] = $row[$obj_pays->GetCh_nom_pays()];
			//$suggestions['suggestions']["code"] = $row[$obj_pays->GetCh_code()];
        }
 
        // On renvoie le données au format JSON pour le plugin
        echo json_encode($suggestions);
		
    }
?>