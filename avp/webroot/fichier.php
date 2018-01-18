<?php
/**
 * Created by PhpStorm.
 * User: jeanwodia
 * Date: 08/12/14
 * Time: 20:03
 */

    if(isset($_GET['CANDIDAT_INDICATIF']))
    {
       // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['CANDIDAT_INDICATIF']);

        // Connexion à la base de données


        // Requête SQL
        $requete = "SELECT code, nom_pays From pays Where nom_pays  LIKE '". $q ."%' LIMIT 0, 30";

        // Exécution de la requête SQL
        $resultat = mysql_query($requete) or die();

        // On parcourt les résultats de la requête SQL
        while($donnees = mysql_fetch_assoc($resultat))
        {
            // On ajoute les données dans un tableau
            $suggestions['code'][] = $donnees['code'];
            //$suggestions['nom_pays'][] = $donnees['nom_pays'];
        }

        // On renvoie le données au format JSON pour le plugin


        echo json_encode($suggestions);
    }
