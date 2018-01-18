<?php
/**
 * Created by PhpStorm.
 * User: jeanwodia
 * Date: 11/12/14
 * Time: 16:39
 */

if(isset($_POST['ac_field']))
{
    // Mot tapé par l'utilisateur
    $q = htmlentities($_POST['ac_field']);

    // Connexion à la base de données


    // Requête SQL

     mysql_query("SET NAMES 'utf8'");
    $requete = "SELECT code, nom_pays From pays Where nom_pays  LIKE '". $q ."%' LIMIT 0, 30";


    // Exécution de la requête SQL
    $resultat = mysql_query($requete) ;

    // On parcourt les résultats de la requête SQL

    $chaine="";
    while($donnees = mysql_fetch_assoc($resultat))
    {

       $chaine.=$donnees['nom_pays']."|".$donnees['code']."\n" ;
    }

    // On renvoie le données au format JSON pour le plugin


    echo $chaine;
}
