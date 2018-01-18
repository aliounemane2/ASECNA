<?php 
echo $_SESSION["role"];
echo $_SESSION["id_user"];
if(isset($_SESSION["login"] )) echo '<p  align="center" style="border:5px solid;margin-left: 400px;padding:1px;background-color:#000080; color:#FFFFFF; id="connected_as"><font color="#FFFFFF"> Bienvenue <br> <span>'.$_SESSION["login"].'</span></font></p>';




if(isset($_POST['envoyer']))
{
// Début Transfert des fichiers
$cheminAvis = "avis/" . basename( $_FILES['avis_lien']['name']); 
if(move_uploaded_file($_FILES['avis_lien']['tmp_name'], $cheminAvis)) {
    echo "L'avis  ".  basename( $_FILES['avis_lien']['name']). 
    " a ete bien sauvegarde.".'<br />';
} 
else
	echo "Erreur dans la sauvegarde de l'avis!.".'<br />';
// Fin transfert des fichiers

// lancement de la requete
      $sql = 'INSERT INTO avis 
	  (	avis_ID,avis_etablissement,avis_cycle,avis_num,avis_titre,avis_description,avis_lien,avis_date_deb,avis_date_fin,avis_age,avis_delai_age)
	  VALUES (" ",
	  	"'.$_POST["avis_etablissement"].'",
	  	"'.$_POST["avis_cycle"].'",
		"'.$_POST["avis_num"].'",
		"'.$_POST["avis_titre"].'",
		"'.$_POST["avis_description"].'",
		"'.$cheminAvis.'",
		"'.$_POST["avis_date_deb"].'",
		"'.$_POST["avis_date_fin"].'",
		"'.$_POST["avis_age"].'", 
		"'.$_POST["avis_delai_age"].'")';
	
	  // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	  header('Location:index.php?url=afficheavis');
}
	
?>


 <article class="art-post art-article">
                                <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">creation d'avis</a></h3>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
				
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style="text-align: justify;">
		<span style="font-family: Arial;">  
		
<!-- contenu à mettre  -->

<form action="index.php?url=avis"  id="myformannonce" name="avis" method="post" enctype="multipart/form-data"> 	


			<fieldset>
				<table>
				<tr>
					<th><div align="right">Etablissement; : </div></th>
					<td><SELECT required="true" name="avis_etablissement">
					<option value="">S&eacute;lectionnez</option>
					<OPTION VALUE="EAMAC">EAMAC</OPTION>
					<OPTION VALUE="ERSI">ERSI</OPTION>
					<OPTION VALUE="ERNAM">ERNAM</OPTION>
					</SELECT></td>								  
				</tr>
				<tr>
					<th><div align="right">Cycle; : </div></th>
					<td><SELECT required="true" name="avis_cycle">
					<option value="">S&eacute;lectionnez</option>
					<OPTION VALUE="INGENIEUR">INGENIEUR</OPTION>
					<OPTION VALUE="TECHN SUP">TECHN SUP</OPTION>
					<OPTION VALUE="POMPIER">POMPIER</OPTION>
					</SELECT></td>
					</tr>
					<tr>
						<th>R&eacute;f&eacute;rence</th>
						<td><input type="text" name="avis_num" value=""></td>
					</tr>
				<tr>
					<th>Titre</th>
					<td><input type="text" name="avis_titre" value=""></td>
                </tr>
				
				<tr>
					<th>Description</th>
					<td><textarea name="avis_description" rows="10" cols="70" wrap="off"> Saisissez la description de l'avis </textarea></td>
			
				</tr>
				
				<tr>
					<th>Date limite de réception des inscription</th>
					<td><input type="text" name="avis_date_fin" value="" class="datepicker"></td>
                 </tr>
                    
                 <tr>
					<th>Poste à pourvoir</th>
					<td><input type="text" name="avis_date_deb" value="" class="datepicker"></td>
                </tr>
				
                <tr>
					<th>Age</th>
					<td><input type="text" name="avis_age" value=""></td>
				</tr>
				<tr>
					<th>Date d&eacute;lai age</th>
					<td><input type="text" name="avis_delai_age" value="" class="datepicker"></td>
				</tr>
				
				<tr>
					<th>Lien</th> 
					<td><input type="file" name="avis_lien" value="" ></td>
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