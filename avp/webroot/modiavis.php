<?php 
if(isset($_SESSION["login"] )) echo '<p align="right" id="connected_as">Bienvenue <span>'.$_SESSION["login"].'</span></p>';
$ROOT_DIR = 'ac1';
$id= $_GET["id_avis"];

// On place dans une variable l'id transmit dans l'url


if(isset($_POST['modifier']))
{
// on attribut une variable pour chaque champ du formulaire

				
		$NOM= $_POST["avis_etablissement"];
		$CYCLE = $_POST["avis_cycle"];
	  	$NUMERO = $_POST["avis_num"];
		$TITRE = $_POST["avis_titre"];
		$DESCRIPTION= $_POST["avis_description"];
		$LIEN = $_FILES['avis_lien']['name'];
		$DATE_DEB = $_POST["avis_date_deb"];
		$DATE_FIN = $_POST["avis_date_fin"];
		$AGE = $_POST["avis_age"];
		$delai = $_POST["avis_delai_age"];
		
	
		$add_link='';
		if($LIEN!='')
		{
			$cheminAvis = "avis/" . basename($LIEN); 
			if(move_uploaded_file($LIEN, $cheminAvis)) {
				echo "L'avis  ".  basename($LIEN). 
				" a ete bien sauvegarde.".'<br />';
			} 
			$add_link='avis_lien="'.$cheminAnnonce.'", ';
		}

//on enregistre les données modifiées
	    	  
	  $sql = 'UPDATE avis SET 
	  avis_etablissement = "'.$_POST["avis_etablissement"].'" ,
	  avis_cycle = "'.$CYCLE.'",
	  avis_num = "'.$NUMERO.'",
	  avis_titre = "'.$TITRE.'",
	  avis_description = "'.$DESCRIPTION.'",
      avis_date_deb = "'.$DATE_DEB.'",
	  avis_date_fin = "'.$DATE_FIN.'",
	  avis_age = "'.$AGE.'" ,'.$add_link.'
	  avis_delai_age = "'.$delai.'"
	  where avis_id = '.$id;
	  $result = mysql_query($sql);
	  
	  
	  // Si il ya une erreur on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      if(!$result)
	  {
	  die ('Requete invalide:'.mysql_error());
      }else 
      {
 echo '<p>la modification à été effectué avec succés.</p>';
	  header('Location:index.php?url=afficheavis');
      }
	  }
//$('#avis_lien').click();
 
//On sélectionne tout dans la table correspondant à l'id
$result = mysql_query("SELECT * FROM avis where avis_id =$id");

while($affiche_commentaire_data = mysql_fetch_array($result))
 {

 ?>
 

<article class="art-post art-article">
                                <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">maj avis</a></h3>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
				
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style="text-align: justify;">
		<span style="font-family: Arial;">  
		<b><h3><a href="index.php?url=avis ">Ajouter un avis</a></h3></b>
		
<!-- contenu à mettre  -->

 	
<form action="index.php?url=modiavis&id_avis=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
			<fieldset>
				<table>
				<tr>
					<th><div align="right">Etablissement;: </div></th>
					<td><SELECT  name="avis_etablissement">
					<option value="">S&eacute;lectionnez</option>
					<OPTION <?php if($affiche_commentaire_data['avis_etablissement']=='EAMAC') echo $affiche_commentaire_data['avis_etablissement']; ?>" <?php if($affiche_commentaire_data['avis_etablissement']=='EAMAC') echo 'selected'; ?>  >EAMAC</OPTION>
					<OPTION <?php if($affiche_commentaire_data['avis_etablissement']=='ERSI') echo $affiche_commentaire_data['avis_etablissement']; ?>" <?php if($affiche_commentaire_data['avis_etablissement']=='ERSI') echo 'selected'; ?>  >ERSI</OPTION>
					<OPTION <?php if($affiche_commentaire_data['avis_etablissement']=='ERNAM') echo $affiche_commentaire_data['avis_etablissement']; ?>" <?php if($affiche_commentaire_data['avis_etablissement']=='ERNAM') echo 'selected'; ?>  >ERNAM</OPTION>
					</SELECT></td>								  
				</tr>
				<tr>
					<th><div align="right">Cycle: </div></th>
					<td><SELECT name="avis_cycle">
					
					<option value="">S&eacute;lectionnez</option>
					<OPTION <?php if($affiche_commentaire_data['avis_cycle']=='INGENIEUR') echo $affiche_commentaire_data['avis_cycle']; ?>" <?php if($affiche_commentaire_data['avis_cycle']=='INGENIEUR') echo 'selected'; ?>  >INGENIEUR</OPTION>
					<OPTION <?php if($affiche_commentaire_data['avis_cycle']=='TECHN SUP') echo $affiche_commentaire_data['avis_cycle']; ?>" <?php if($affiche_commentaire_data['avis_cycle']=='TECHN SUP') echo 'selected'; ?>  >TECHN SUP</OPTION>
					<OPTION <?php if($affiche_commentaire_data['avis_cycle']=='POMPIER') echo $affiche_commentaire_data['avis_cycle']; ?>" <?php if($affiche_commentaire_data['avis_cycle']=='POMPIER') echo 'selected'; ?>  >POMPIER</OPTION>
					</SELECT></td>
					</tr>
					<tr>
						<th>R&eacute;f&eacute;rence</th>
						<td><input name="avis_num" size="22" value="<?php echo $affiche_commentaire_data["avis_num"];?>" type="text"/></td>
					</tr>
				<tr>
					<th>Titre</th>
					<td><input name="avis_titre" size="22" value="<?php echo $affiche_commentaire_data["avis_titre"];?>" type="text"/></td>
					
                </tr>
				
				<tr>
					<th>Description</th>
					<td><textarea name="avis_description" rows="3" cols="20"> <?php echo ' '.$affiche_commentaire_data["avis_description"].' ';?></textarea></td>
				</tr>
				
				<tr>
					<th>Date limite de réception des inscription</th>
					<td><input name="avis_date_fin" size="22" value="<?php echo $affiche_commentaire_data["avis_date_fin"];?>" class="datepicker"/></td>
				
                 </tr>
                    
                 <tr>
					<th>Poste à pourvoir</th>
					<td><input name="avis_date_deb" size="22" value="<?php echo $affiche_commentaire_data["avis_date_deb"];?>" class="datepicker"/></td>
				
                </tr>
				
                <tr>
					<th>Age</th>
					<td><input name="avis_age" size="22" value="<?php echo $affiche_commentaire_data["avis_age"];?>" type="text"/></td>
					</tr>
				<tr>
					<th>Date d&eacute;lai age</th>
					</tr>
				
				<tr>
					<th>Modifier lien</th> 
					<td><input name="avis_lien" id="avis_lien" size="22" type="file"/></td>
				</tr>
				
              </table>
			  
			 <input type="submit" name="modifier" value="modifier" style="margin-top:20px; margin-left: 110px;">
         
				
			  </fieldset>
			  
			     
            
</form>	
<?php
//On ferme la boucle while
 }
	
?>
<!-- fin contenu à mettre  -->


		</span>
	   </p>

    </div>
    </div>
</div>
</div>
</article>