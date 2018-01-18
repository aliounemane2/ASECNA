<?php 
echo $_SESSION["role"];
echo $_SESSION["id_user"];

if(isset($_POST['envoyer']))
{
// Début Transfert des fichiers
$cheminAnnonce = "annonce/" . basename( $_FILES['ANNONCE_LIEN']['name']); 
if(move_uploaded_file($_FILES['ANNONCE_LIEN']['tmp_name'], $cheminAnnonce)) {
    echo "L'annonce  ".  basename( $_FILES['ANNONCE_LIEN']['name']). 
    " a ete bien sauvegarde.".'<br />';
} 
else
	echo "Erreur dans la sauvegarde de l'annonce!.".'<br />';
// Fin transfert des fichiers

// lancement de la requete
      $sql = 'INSERT INTO annonce 
	  (	ANNONCE_ID, ANNONCE_NUM, ANNONCE_TITRE, ANNONCE_DESCRIPTION, ANNONCE_LIEN, ANNONCE_DATE_DEB, ANNONCE_DATE_FIN, ANNONCE_AGE, ANNONCE_DELAI_AGE)
	  VALUES (" ",
	  	"'.$_POST["ANNONCE_NUM"].'",
	  	"'.$_POST["ANNONCE_TITRE"].'",
		"'.$_POST["ANNONCE_DESCRIPTION"].'",
		"'.$cheminAnnonce.'",
		"'.$_POST["ANNONCE_DATE_DEB"].'",
		"'.$_POST["ANNONCE_DATE_FIN"].'",
		"'.$_POST["ANNONCE_AGE"].'", 
		"'.$_POST["ANNONCE_DELAI_AGE"].'")';
	
	  // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	  header('Location:index.php?url=afficheavp');
}
	
?>


 <article class="art-post art-article">
                                <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Insertion d'avis de poste vacant</a></h3>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
				
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style="text-align: justify;">
		<span style="font-family: Arial;">  
		
<!-- contenu à mettre  -->

<form action="index.php?url=annonce"  id="myformannonce" name="annonce" method="post" enctype="multipart/form-data"> 	

			<fieldset>
				<table>
					<tr>
						<th>R&eacute;f&eacute;rence</th>
						<td><input type="text" name="ANNONCE_NUM" value=""></td>
					</tr>
				<tr>
					<th>Titre</th>
					<td><input type="text" name="ANNONCE_TITRE" value=""></td>
                </tr>
				
				<tr>
					<th>Description</th>
					<td><textarea name="ANNONCE_DESCRIPTION" rows="10" cols="70" wrap="off"> Saisissez la motivation pour le poste </textarea></td>
			
				</tr>
				
				<tr>
					<th>Date de d&eacute;but</th>
					<td><input type="text" name="ANNONCE_DATE_DEB" value="" class="datepicker"></td>
                 </tr>
                    
                 <tr>
					<th>Date de fin</th>
					<td><input type="text" name="ANNONCE_DATE_FIN" value="" class="datepicker"></td>
                </tr>
				
                <tr>
					<th>Age</th>
					<td><input type="text" name="ANNONCE_AGE" value=""></td>
				</tr>
				<tr>
					<th>Date d&eacute;lai age</th>
					<td><input type="text" name="ANNONCE_DELAI_AGE" value="" class="datepicker"></td>
				</tr>
				
				<tr>
					<th>Lien</th> 
					<td><input type="file" name="ANNONCE_LIEN" value="" ></td>
				</tr>
                
				
              </table>
			  
			 <input type="submit" name="envoyer" value="Valider" style="margin-top:20px; margin-left: 110px;">
         
				
			  </fieldset>
			  
			     
            
</form>	


<!-- fin contenu à mettre  -->



		</span>
	   </p>

    </div>
    </div>
</div>
</div>
</article>